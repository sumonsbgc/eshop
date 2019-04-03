@extends('frontEnd.templateParts.master')

@section('title','Product Details')


@section('content')

    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">

            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Product Details</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-1">
                <div class="banner"><a href="#"><img src="{{asset('frontEndResource/assets/images/banner/banner-15.jpg')}}" alt="Banner"></a></div>
            </div>

            <!-- Banner -->
            <div class="col-lg-4 col-md-6 col-12 order-lg-3">
                <div class="banner"><a href="#"><img src="{{asset('frontEndResource/assets/images/banner/banner-14.jpg')}}" alt="Banner"></a></div>
            </div>

        </div>
    </div><!-- Page Banner Section End -->

    <!-- Single Product Section Start -->
    <div class="product-section section mt-120 mb-10">
        <div class="container">

            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12 order-2 order-lg-1 mb-60">

                    <div class="row mb-40">

                        <div class="col-lg-6 col-12 mb-50">

                            <!-- Image -->
                            <div class="single-product-image">

                                <div class="tab-content">

                                    @php

                                        $images = explode('|',$product->product_images);
                                        $id = 0;

                                    @endphp
                                    @foreach ($images as $img)
                                        @php $id++; @endphp
                                        <div id="single-image-{{$id}}" class="tab-pane fade big-image-slider @php if ($id == 1) echo 'active' @endphp">

                                            <div class="big-image"><img src="{{asset('storage/upload/product_image/'.$img)}}" alt="Big Image"><a href="{{asset('storage/upload/product_image/'.$img)}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a></div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="thumb-image-slider nav">

                                    @php
                                        $images = explode('|',isset($product->product_images) ? $product->product_images : '');
                                        $id = 0;
                                    @endphp
                                    @foreach ($images as $img)

                                        @php $id++; @endphp


                                        <a class="thumb-image img-fluid @php if ($id == 1) echo 'active' @endphp" data-toggle="tab" href="#single-image-{{$id}}"><img src="{{asset('storage/upload/product_image/'.$img)}}" alt="Thumbnail Image"></a>
                                    @endforeach

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-6 col-12 mb-50">

                            <!-- Content -->
                            <div class="single-product-content p-0">

                                <!-- Category & Title -->
                                <div class="head-content">

                                    <div class="category-title">
                                        <a href="#" class="cat">{{$product->cat_name}}</a>
                                        <h5 class="title">{{$product->product_name}}</h5>
                                    </div>

                                    @php

                                        $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                        ->where('best_deals.product_id','=',$product->id)->first();

                                        if ($product_discount !=null){
                                        date_default_timezone_set("Asia/Dhaka");
                                        $current_time = date_create(date('Y-m-d H:i:s'));
                                        $start_time = date_create($product_discount->start_time);
                                        $end_time = date_create($product_discount->end_time);

                                        }

                                    @endphp


                                    @if(isset($start_time ,$end_time) && $start_time <= $current_time && $end_time > $current_time)



                                        <h5 class="price-ul"><img src="{{asset('frontEndResource/assets/images/taka.svg')}}" class="img-fluid" style="display: inline; width: 20px; height: 20px"><del>{{$product->product_price}}</del></h5>

                                        @php

                                            $a = ($product->product_price * $product_discount->product_discount)/100;

                                            $new_price = $product->product_price - $a;

                                        @endphp

                                        <h5 class="price"><img src="{{asset('frontEndResource/assets/images/taka.svg')}}" class="img-fluid" style="display: inline; width: 20px; height: 20px">{{$new_price}}</h5>

                                    @elseif( is_null($product->product_special_price) )

                                        <h5 class="price"><img src="{{asset('frontEndResource/assets/images/taka.svg')}}" class="img-fluid" style="display: inline; width: 20px; height: 20px">{{$product->product_price}}</h5>

                                    @else

                                        <h5 class="price-ul-s"><del><img src="{{asset('frontEndResource/assets/images/taka.svg')}}" class="img-fluid" style="display: inline; width: 20px; height: 20px">{{$product->product_price}}</del></h5>
                                        <h5 class="price"><img src="{{asset('frontEndResource/assets/images/taka.svg')}}" class="img-fluid" style="display: inline; width: 20px; height: 20px">{{$product->product_special_price}}</h5>

                                    @endif


                                </div>

                                <div class="single-product-description">

                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>



                                    <span class="availability">Availability:
                                        <span>

                                            @php
                                                if ($product->product_quantity > 0){
                                                    echo "In Stock";
                                                }
                                                else{
                                                    echo "Out Of Stock";
                                                }
                                            @endphp

                                        </span>
                                    </span>

                                    <div class="quantity-colors">

                                        <div class="quantity">
                                            <h5>Quantity</h5>
                                            <div class="pro-qty"><input type="number" id="quantity" value="1"></div>
                                        </div>

                                        <div class="colors">
                                            <h5>Color</h5>
                                            <div class="color-options">

                                                @php
                                                    $colors = explode('|',$product->product_color);
                                                @endphp
                                                @foreach ($colors as $color)

                                                    <label class="containers">
                                                        <input type="radio" id="product_color" checked="checked" class="product_color" value="{{$color}}" name="color">
                                                        <span class="checkmark" style="background-color: {{'#'.$color}}"></span>
                                                    </label>


                                                @endforeach


                                            </div>
                                        </div>

                                        @if($product->product_size != null)
                                            <div class="sizes">

                                                <h5>Size</h5>



                                                    @php

                                                    $sizes  = explode('|', $product->product_size);

                                                    @endphp

                                                    @foreach($sizes as $size)

                                                    <div class="all-size">

                                                        <input type="radio" checked="checked" id="product_size" class="product_size" name="size" value="{{$size}}">
                                                        <span class="marks">{{$size}}</span>
                                                    </div>
                                                    @endforeach



                                            </div>

                                        @endif

                                    </div>

                                    <div class="actions">

                                        <a href="#" class="add-to-cart" id="{{$product->id}}" onclick="addToCart(this)"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>


                                    </div>


                                    <div class="share">

                                        <h5>Share: </h5>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 mb-90">

                            <ul class="single-product-tab-list nav">
                                <li><a href="#product-description" class="active" data-toggle="tab" >description</a></li>
                                <li><a href="#product-specifications" data-toggle="tab" >specifications</a></li>
                                <li><a href="#product-reviews" data-toggle="tab" >reviews</a></li>
                            </ul>

                            <div class="single-product-tab-content tab-content">
                                <div class="tab-pane fade show active" id="product-description">

                                    <div class="row">
                                        <div class="single-product-description-content col-lg-12 col-12">
                                            <h4>Introducing {{$product->product_name}}</h4>
                                            <p>{{$product->product_description}}</p>

                                            <div class="product-category mb-2">
                                                <h5 class="bold">Product Category </h5>
                                                <p>{{$product->cat_name}}</p>
                                            </div>

                                            <div class="product-brand mb-2">
                                                <h5 class="bold">Product Brand </h5>
                                                <p>{{$product->brand_name}}</p>
                                            </div>

                                            <div class="product-code mb-2">
                                                <h5 class="bold">Product Code </h5>
                                                <p>{{$product->product_code}}</p>
                                            </div>


                                            <div class="product-model mb-2">
                                                <h5 class="bold">Product Model No </h5>
                                                <p>{{$product->product_model_no}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="product-specifications">
                                    <div class="single-product-specification">
                                        <ul>
                                            <li>Full HD Camcorder</li>
                                            <li>Dual Video Recording</li>
                                            <li>X type battery operation</li>
                                            <li>Full HD Camcorder</li>
                                            <li>Dual Video Recording</li>
                                            <li>X type battery operation</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-reviews">

                                    <div class="product-ratting-wrap">
                                        <div class="pro-avg-ratting">
                                            <h4>4.5 <span>(Overall)</span></h4>
                                            <span>Based on 9 Comments</span>
                                        </div>
                                        <div class="ratting-list">
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(3)</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(1)</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(0)</span>
                                            </div>
                                            <div class="sin-list float-left">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="rattings-wrapper">

                                            <div class="sin-rattings">
                                                <div class="ratting-author">
                                                    <h3>Cristopher Lee</h3>
                                                    <div class="ratting-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </div>
                                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                            </div>

                                            <div class="sin-rattings">
                                                <div class="ratting-author">
                                                    <h3>Nirob Khan</h3>
                                                    <div class="ratting-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </div>
                                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                            </div>

                                            <div class="sin-rattings">
                                                <div class="ratting-author">
                                                    <h3>MD.ZENAUL ISLAM</h3>
                                                    <div class="ratting-star">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </div>
                                                <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p>
                                            </div>

                                        </div>
                                        <div class="ratting-form-wrapper fix">
                                            <h3>Add your Comments</h3>
                                            <form action="#">
                                                <div class="ratting-form row">
                                                    <div class="col-12 mb-15">
                                                        <h5>Rating:</h5>
                                                        <div class="ratting-star fix">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-15">
                                                        <label for="name">Name:</label>
                                                        <input id="name" placeholder="Name" type="text">
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-15">
                                                        <label for="email">Email:</label>
                                                        <input id="email" placeholder="Email" type="text">
                                                    </div>
                                                    <div class="col-12 mb-15">
                                                        <label for="your-review">Your Review:</label>
                                                        <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <input value="add review" type="submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <!-- Section Title Start -->
                        <div class="col-12 mb-40">
                            <div class="section-title-one" data-title="RELATED PRODUCT"><h1>RELATED PRODUCT</h1></div>
                        </div><!-- Section Title End -->

                        <!-- Product Tab Content Start -->
                        <div class="col-12">

                            <!-- Product Slider Wrap Start -->
                            <div class="product-slider-wrap product-slider-arrow-two">
                                <!-- Product Slider Start -->
                                <div class="product-slider product-slider-3">

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">

                                                <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-1.png" alt="Product Image"></a>

                                                <div class="wishlist-compare">
                                                    <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>

                                                <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                            </div>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Category & Title -->
                                                <div class="category-title">

                                                    <a href="#" class="cat">Laptop</a>
                                                    <h5 class="title"><a href="single-product.html">Zeon Zen 4 Pro</a></h5>

                                                </div>

                                                <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    <h5 class="price">$295.00</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>

                                                </div>

                                            </div>

                                        </div><!-- Product End -->
                                    </div>

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">

                                                <span class="label sale">sale</span>

                                                <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-2.png')}}" alt="Product Image"></a>

                                                <div class="wishlist-compare">
                                                    <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>

                                                <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                            </div>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Category & Title -->
                                                <div class="category-title">

                                                    <a href="#" class="cat">Drone</a>
                                                    <h5 class="title"><a href="single-product.html">Aquet Drone D 420</a></h5>

                                                </div>

                                                <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    <h5 class="price"><span class="old">$350</span>$275.00</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>

                                                </div>

                                            </div>

                                        </div><!-- Product End -->
                                    </div>

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">

                                                <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-3.png')}}" alt="Product Image"></a>

                                                <div class="wishlist-compare">
                                                    <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>

                                                <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                            </div>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Category & Title -->
                                                <div class="category-title">

                                                    <a href="#" class="cat">Games</a>
                                                    <h5 class="title"><a href="single-product.html">Game Station X 22</a></h5>

                                                </div>

                                                <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    <h5 class="price">$295.00</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>

                                                </div>

                                            </div>

                                        </div><!-- Product End -->
                                    </div>

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">

                                                <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-4.png" alt="Product Image"></a>

                                                <div class="wishlist-compare">
                                                    <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>

                                                <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                            </div>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Category & Title -->
                                                <div class="category-title">

                                                    <a href="#" class="cat">Accessories</a>
                                                    <h5 class="title"><a href="single-product.html">Roxxe Headphone Z 75</a></h5>

                                                </div>

                                                <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    <h5 class="price">$110.00</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>

                                                </div>

                                            </div>

                                        </div><!-- Product End -->
                                    </div>

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">

                                                <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-5.png" alt="Product Image"></a>

                                                <div class="wishlist-compare">
                                                    <a href="#" data-tooltip="Compare"><i class="ti-control-shuffle"></i></a>
                                                    <a href="#" data-tooltip="Wishlist"><i class="ti-heart"></i></a>
                                                </div>

                                                <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a>

                                            </div>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Category & Title -->
                                                <div class="category-title">

                                                    <a href="#" class="cat">Camera</a>
                                                    <h5 class="title"><a href="single-product.html">Mony Handycam Z 105</a></h5>

                                                </div>

                                                <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    <h5 class="price">$110.00</h5>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>

                                                </div>

                                            </div>

                                        </div><!-- Product End -->
                                    </div>

                                </div><!-- Product Slider End -->
                            </div><!-- Product Slider Wrap End -->

                        </div><!-- Product Tab Content End -->

                    </div>

                </div>

                <div class="shop-sidebar-wrap col-xl-3 col-lg-4 col-12 order-1 order-lg-2 mb-50">

                    <div class="shop-sidebar mb-30">

                        <h4 class="title">CATEGORIES</h4>

                        <ul class="sidebar-category">
                            <li><a href="#">Tv & Audio System</a></li>
                            <li><a href="#">Computer & Laptop</a>
                                <ul class="children">
                                    <li><a href="#">Smartphone</a></li>
                                    <li><a href="#">headphone</a></li>
                                    <li><a href="#">accessories</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Phones & Tablets</a>
                                <ul class="children">
                                    <li><a href="#">Samsome</a></li>
                                    <li><a href="#">GL Stylus</a></li>
                                    <li><a href="#">Uawei</a></li>
                                    <li><a href="#">Cherry Berry</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Home Appliances</a></li>
                            <li><a href="#">Kitchen appliances</a>
                                <ul class="children">
                                    <li><a href="#">Power Bank</a></li>
                                    <li><a href="#">Data Cable</a></li>
                                    <li><a href="#">Power Cable</a></li>
                                    <li><a href="#">Battery</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Printer & Scanner</a>
                                <ul class="children">
                                    <li><a href="#">Desktop Headphone</a></li>
                                    <li><a href="#">Mobile Headphone</a></li>
                                    <li><a href="#">Wireless Headphone</a></li>
                                    <li><a href="#">LED Headphone</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Camera & CC Camera</a></li>
                            <li><a href="#">Smart Watch</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>

                    </div>

                    <div class="shop-sidebar mb-30">

                        <h4 class="title">Brand</h4>

                        <ul class="sidebar-brand">
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Sumsang</a></li>
                            <li><a href="#">Phillips</a></li>
                            <li><a href="#">Zeon</a></li>
                            <li><a href="#">Panasonic</a></li>
                            <li><a href="#">Uawei</a></li>
                        </ul>

                    </div>

                    <div class="shop-sidebar mb-30">

                        <h4 class="title">Price</h4>

                        <div class="sidebar-price">
                            <div id="price-range"></div>
                            <input type="text" id="price-amount" readonly>
                        </div>

                    </div>

                    <div class="shop-sidebar mb-30">

                        <div class="banner"><a href="#"><img src="../../../../public/frontEndResource/assets/images/banner/banner-41.jpg" alt="Banner"></a></div>

                    </div>

                    <div class="shop-sidebar mb-30">

                        <h4 class="title">Color</h4>

                        <ul class="sidebar-brand">
                            <li><a href="#">White</a></li>
                            <li><a href="#">Black</a></li>
                            <li><a href="#">Cosmic Black</a></li>
                            <li><a href="#">Rose Gold</a></li>
                            <li><a href="#">Spacegrey</a></li>
                        </ul>

                    </div>

                    <div class="shop-sidebar mb-30">

                        <h4 class="title">Tags</h4>

                        <div class="sidebar-tags">
                            <a href="#">smartphone</a>
                            <a href="#">Iron</a>
                            <a href="#">Trimer</a>
                            <a href="#">Smart Watch</a>
                            <a href="#">Play Station</a>
                            <a href="#">Oven</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div><!-- Single Product Section End -->

    @endsection