<?php declare(strict_types=1);

namespace  App\Http\Controllers;

use Exception;

class ProductSimilarity
{
    protected $products       = [];
    protected $featureWeight  = 1;
    protected $priceWeight    = 1;
    protected $categoryWeight = 1;
    protected $priceHighRange = 10000000;
    protected $productFeartures = ['screen', 'operation_system', 'rear_camera', 'front_camera', 'cpu', 'ram', 'rom', 'sim_card', 'pin_capacity'];

    public function __construct(array $products)
    {
    
        $this->products       = $products;
        $this->priceHighRange = max(array_column($products, 'price'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setPriceWeight(float $weight): void
    {
        $this->priceWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function getProductFeaturesValue($product): array
    {
        $array = [];
        foreach($this->productFeartures as $value){
            array_push($array,$product->{$value});
        }
        return $array; 
    }


    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->products as $product) {

            $similarityScores = [];

            foreach ($this->products as $_product) {
                if ($product->id === $_product->id) {
                    continue;
                }
                $similarityScores['product_id_' . $_product->id] = $this->calculateSimilarityScore($product, $_product);
            }
            $matrix['product_id_' . $product->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getProductsSortedBySimularity(int $productId, array $matrix): array
    {
        $similarities   = $matrix['product_id_' . $productId] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find product with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $productIdKey => $similarity) {
            $id       = intval(str_replace('product_id_', '', $productIdKey));
            $products = array_filter($this->products, function ($product) use ($id) { return $product->id === $id; });
            if (! count($products)) {
                continue;
            }
            $product = $products[array_keys($products)[0]];
            $product->similarity = $similarity;
            $sortedProducts[] = $product;
        }
        return $sortedProducts;
    }

    protected function calculateSimilarityScore($productA, $productB)
    {
        $productAFeatures = implode('',  $this->getProductFeaturesValue($productA));
        $productBFeatures = implode('',  $this->getProductFeaturesValue($productB));

        return array_sum([
            (Similarity::hamming($productAFeatures, $productBFeatures) * $this->featureWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$productA->price], 0, $this->priceHighRange),
                Similarity::minMaxNorm([$productB->price], 0, $this->priceHighRange)
            ) * $this->priceWeight),
            // (Similarity::jaccard($productA->brand_id->, $productB->brand_id) * $this->categoryWeight)
        ]) / ($this->featureWeight + $this->priceWeight
        // + $this->categoryWeight
    );
    }
}