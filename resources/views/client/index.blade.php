@extends('client.app')
@section('content')
<section id="page-content" class="page-wrapper">

    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Suggested product</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row active-featured-product slick-arrow-2">
                    <!-- product-item start -->
                    @foreach($products as $product)
                    <div class="col-xs-12">
                        <div class="product-item">
                            <div class="product-img">
                                <a href="/product-detail/{{$product->id}}">
                                    <img src="{{$product->image}}" alt="" />
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="#">{{$product->name}}</a>
                                </h6>
                                <div class="pro-rating">
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                </div>
                                @if($product->price == $product->promotion_price)
                                        <b class="pro-price">{{$product->price}}đ</b>
                                        @else
                                        <del>
                                            <b class="pro-price">{{$product->price}}đ </b>
                                        </del>
                                            <b class="pro-price">&nbsp; &nbsp;{{$product->promotion_price}}đ</b>
                                        @endif
                                <ul class="action-button">
                                    <li>
                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                                class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                    </li>
                                    <li>
                                        <a href="/add-to-cart/{{$product->id}}" title="Add to cart"><i
                                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- product-item end -->

                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section mb-80">
        <div class="container">
            <div class="row">
                <!-- up-comming-pro -->
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="up-comming-pro gray-bg clearfix">
                        <div class="up-comming-pro-img f-left">
                            <a href="#">
                                <img src="{{asset('client/assets/img/up-comming/1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="up-comming-pro-info f-left">
                            <h3><a href="#">Dummy Product Name</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod tempor
                                incididunt ut labore et dolores top magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exer citation ullamco laboris nisi ut aliquip ex ea commodo consequat. laborum. </p>
                            <div class="up-comming-time">
                                <div data-countdown="2017/02/02"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span>$ 896.00</span>
                        </div>
                        <div class="banner-img">
                            <a href="#"><img src="{{asset('client/assets/img/banner/1.jpg')}}" alt=""></a>
                        </div>
                        <div class="banner-info">
                            <h3><a href="#">Product Name</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>amet, consectetur</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>adipisicing elitest,</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>labore et dolore.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->

    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">product list</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="pro-tab-menu text-right">
                        <!-- Nav tabs -->
                        <ul class="">
                            <li class="active"><a href="#popular-product" data-toggle="tab">Popular Products </a></li>
                            <li><a href="#new-arrival" data-toggle="tab">New Arrival</a></li>
                            <li><a href="#best-seller" data-toggle="tab">Best Seller</a></li>
                            <li><a href="#special-offer" data-toggle="tab">Special Offer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-tab">
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- popular-product start -->
                    <div class="tab-pane active" id="popular-product">
                        <div class="row">
                            <!-- product-item start -->
                            @foreach($products as $product)
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="/product-detail/{{$product->id}}">
                                            <img src="{{$product->image}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="#">{{$product->name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        @if($product->price == $product->promotion_price)
                                        <b class="pro-price">{{$product->price}}đ</b>
                                        @else
                                        <del>
                                            <b class="pro-price">{{$product->price}}đ</b>
                                        </del>
                                        <span>
                                            <b class="pro-price">&nbsp; &nbsp;{{$product->promotion_price}}đ</b>
                                        </span>
                                        @endif
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#productModal"
                                                    title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="/add-to-cart/{{$product->id}}" title="Add to cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- product-item end -->

                        </div>
                        {{ $products->links() }}
                    </div>
                    <!-- popular-product end -->
                    <!-- special-offer start -->
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB SECTION END -->

    <!-- BLOG SECTION START -->
    <!-- <div class="blog-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Latest blog</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                </div>
            </div>
            <div class="blog">
                <div class="row active-blog">
                    <div class="col-xs-12">
                        <div class="blog-item">
                            <img src="{{asset('client/assets/img/blog/1.jpg')}}" alt="">
                            <div class="blog-desc">
                                <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                <p>There are many variations of passages of psum available, but the majority have
                                    suffered alterat on in some form, by injected humour, randomis words which don't
                                    look even slightly.</p>
                                <div class="read-more">
                                    <a href="single-blog.html">Read more</a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="blog-item">
                            <img src="{{asset('client/assets/img/blog/2.jpg')}}" alt="">
                            <div class="blog-desc">
                                <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                <p>There are many variations of passages of psum available, but the majority have
                                    suffered alterat on in some form, by injected humour, randomis words which don't
                                    look even slightly.</p>
                                <div class="read-more">
                                    <a href="single-blog.html">Read more</a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="blog-item">
                            <img src="{{asset('client/assets/img/blog/3.jpg')}}" alt="">
                            <div class="blog-desc">
                                <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                <p>There are many variations of passages of psum available, but the majority have
                                    suffered alterat on in some form, by injected humour, randomis words which don't
                                    look even slightly.</p>
                                <div class="read-more">
                                    <a href="single-blog.html">Read more</a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="blog-item">
                            <img src="{{asset('client/assets/img/blog/5.jpg')}}" alt="">
                            <div class="blog-desc">
                                <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                <p>There are many variations of passages of psum available, but the majority have
                                    suffered alterat on in some form, by injected humour, randomis words which don't
                                    look even slightly.</p>
                                <div class="read-more">
                                    <a href="single-blog.html">Read more</a>
                                </div>
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- BLOG SECTION END -->
</section>
@endsection
