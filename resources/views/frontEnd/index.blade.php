@extends('frontEnd.templateParts.master')


@section('title', 'Ecommerce')


@section('content')

    <!-- Hero Section Start -->
    <div class="hero-section section mb-30">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Header Category -->
                    <div class="hero-side-category">

                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle">Categories <i class="ti-menu"></i></button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                @foreach($mainCat as $cat)


                                    <li
                                    @foreach($subs as $sub)
                                        @if($sub->parent_status == $cat->id) {{"class=menu-item-has-children"}}

                                                @endif

                                        @endforeach>



                                        <a href="{{url('categories/'.$cat->id)}}">{{$cat->name}}</a>


                                        <!-- Mega Category Menu Start -->
                                        <ul @foreach($subs as $sub)
                                                @if($sub->parent_status == $cat->id) {{"class=category-mega-menu"}} @endif
                                                @endforeach>

                                            @foreach($subs as $sub)

                                                @if($sub->parent_status == $cat->id)

                                                    <li><a href="{{url('categories/'.$sub->id)}}">{{$sub->name}}</a></li>

                                                @endif

                                            @endforeach

                                        </ul><!-- Mega Category Menu End -->

                                    </li>
                                @endforeach
                            </ul>
                        </nav>

                    </div><!-- Header Bottom End -->

                    <!-- Hero Slider Start -->
                    <div class="hero-slider hero-slider-two fix">

                        @foreach($allSlider as $slider)

                            @php

                                $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                ->where('best_deals.product_id','=',$slider->product_id)->first();

                                if ($product_discount != null){


                                date_default_timezone_set("Asia/Dhaka");
                                $current_time = date_create(date('Y-m-d H:i:s'));
                                $start_time = date_create($product_discount->start_time);
                                $end_time = date_create($product_discount->end_time);
                                }
                            @endphp


                        <!-- Hero Item Start -->
                        <div class="hero-item-two">
                            <div class="row align-items-center justify-content-between">

                                <!-- Hero Content -->
                                <div class="hero-content-two col-6">

                                    <h2 class="offer">
                                        @if($product_discount !=null && $start_time <= $current_time && $end_time > $current_time)

                                            {{$product_discount->product_discount}} %<span>OFF</span>

                                        @else
                                            {{floor($slider->discount)}} %<span>OFF</span>
                                        @endif
                                    </h2>
                                    <h1>{{$slider->caption}}</h1>
                                    <a href="{{route('singleProductView',$slider->product_id)}}">get it now</a>

                                </div>

                                <!-- Hero Image -->
                                <div class="hero-image-two col-6">
                                    <img src="{{asset('storage/upload/product_image/'.$slider->image)}}" class="img-fluid" alt="Hero Image">
                                </div>

                            </div>
                        </div><!-- Hero Item End -->


                        @endforeach


                    </div><!-- Hero Slider End -->

                </div>
            </div>
        </div>
    </div><!-- Hero Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section section mb-60">
        <div class="container">
            <div class="row row-10">

                <!-- Banner -->
                @foreach($hero_banner as $banner)
                <div class="col-md-6 col-12 mb-30">
                    <div class="banner"><a href="#"><img src="{{asset('storage/upload/banner/'.$banner->images)}}" alt="Banner"></a></div>
                </div>

                @endforeach


            </div>
        </div>
    </div><!-- Banner Section End -->

    <!-- Feature Product Section Start -->
    <div class="product-section section mb-70">
        <div class="container">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="FEATURED ITEMS"><h1>FEATURED ITEMS</h1></div>
                </div><!-- Section Title End -->

                <!-- Product Tab Filter Start -->
                <div class="col-12 mb-30">
                    <div class="product-tab-filter">

                        <!-- Tab Filter Toggle -->
                        <button class="product-tab-filter-toggle">showing: <span></span><i class="icofont icofont-simple-down"></i></button>

                        <!-- Product Tab List -->
                        <ul class="nav product-tab-list">
                            <li><a class="active" data-toggle="tab" href="#tab-one">all</a></li>

                            @foreach($featured_items as $featured_item)

                            <li><a data-toggle="tab" href="#tab-{{$featured_item->id}}">{{$featured_item->cat_name}}</a></li>

                            @endforeach
                        </ul>

                    </div>
                </div><!-- Product Tab Filter End -->

                <!-- Product Tab Content Start -->
                <div class="col-12">
                    <div class="tab-content">

                        <!-- Tab Pane Start -->
                        <div class="tab-pane fade show active" id="tab-one">

                            <!-- Product Slider Wrap Start -->
                            <div class="product-slider-wrap product-slider-arrow-one">
                                <!-- Product Slider Start -->
                                <div class="product-slider product-slider-4">


                                    @foreach($allProducts as $allProduct)

                                    <div class="col pb-20 pt-10">
                                        <!-- Product Start -->
                                        <div class="ee-product">

                                            <!-- Image -->
                                            <div class="image">
                                                @php
                                                    $images = explode('|',$allProduct->product_images);
                                                @endphp
                                                <a href="{{route('singleProductView',$allProduct->id)}}" class="img"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image" class="img-fluid"></a>

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

                                                    <a href="{{route('CategoryProductView',$allProduct->product_category)}}" class="cat">{{$allProduct->cat_name}}</a>
                                                    <h5 class="title"><a href="{{route('singleProductView',$allProduct->id)}}">{{$allProduct->product_name}}</a></h5>

                                                </div>

                                            @php

                                                $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                                ->where('best_deals.product_id','=',$allProduct->id)->first();

                                                if ($product_discount != null){

$s = isset($product_discount->start_time) ? $product_discount->start_time : '';
                                                date_default_timezone_set("Asia/Dhaka");
                                                $current_time = date_create(date('Y-m-d H:i:s'));
                                                $start_time = date_create($s);
                                                $end_time = date_create($product_discount->end_time);
                                                }
                                            @endphp


                                            <!-- Price & Ratting -->
                                                <div class="price-ratting">

                                                    @if($product_discount != null && $start_time <= $current_time && $end_time > $current_time)



                                                        <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>

                                                        @php

                                                            $a = ($allProduct->product_price * $product_discount->product_discount)/100;

                                                            $new_price = $allProduct->product_price - $a;

                                                        @endphp

                                                        <h5 class="price"><i class="icofont-taka"></i>{{$new_price}}</h5>

                                                    @elseif( is_null($allProduct->product_special_price) )

                                                        <h5 class="price"><i class="icofont-taka"></i>{{$allProduct->product_price}}</h5>

                                                    @else

                                                        <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>
                                                        <h5 class="price"><i class="icofont-taka"></i>{{$allProduct->product_special_price}}</h5>

                                                    @endif
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
                                    @endforeach


                                </div><!-- Product Slider End -->
                            </div><!-- Product Slider Wrap End -->

                        </div><!-- Tab Pane End -->

                        @foreach($featured_items as $featured_item)

                        <!-- Tab Pane Start -->
                        <div class="tab-pane fade" id="tab-{{$featured_item->id}}">

                            <!-- Product Slider Wrap Start -->
                            <div class="product-slider-wrap product-slider-arrow-one">
                                <!-- Product Slider Start -->
                                <div class="product-slider product-slider-4">

                                    @php


                                    $data = \Illuminate\Support\Facades\DB::table('products')
                                    ->join('categories','products.product_category','=','categories.id')
                                    ->select('products.*','categories.name AS cat_name')
                                    ->where('products.product_category','=',$featured_item->category_id)->limit(10)->get();

                                    @endphp

                                    @if ($data->toArray() != null)

                                        @foreach($data as $datum)

                                            <div class="col pb-20 pt-10">
                                                <!-- Product Start -->
                                                <div class="ee-product">

                                                    <!-- Image -->
                                                    <div class="image">
                                                        @php
                                                            $images = explode('|',$datum->product_images);
                                                        @endphp

                                                        <a href="{{route('singleProductView',$datum->id)}}" class="img"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image"></a>

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

                                                            <a href="{{route('CategoryProductView',$datum->product_category)}}" class="cat">{{$datum->cat_name}}</a>
                                                            <h5 class="title"><a href="{{route('singleProductView',$datum->id)}}">{{$datum->product_name}}</a></h5>

                                                        </div>

                                                    @php

                                                        $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                                        ->where('best_deals.product_id','=',$datum->id)->first();

                                                        if ($product_discount != null){

                                                        date_default_timezone_set("Asia/Dhaka");
                                                        $current_time = date_create(date('Y-m-d H:i:s'));
                                                        $start_time = date_create($product_discount->start_time);
                                                        $end_time = date_create($product_discount->end_time);
                                                        }
                                                    @endphp


                                                    <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            @if($product_discount != null && $start_time <= $current_time && $end_time > $current_time)



                                                                <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>

                                                                @php

                                                                    $a = ($datum->product_price * $product_discount->product_discount)/100;

                                                                    $new_price = $datum->product_price - $a;

                                                                @endphp

                                                                <h5 class="price"><i class="icofont-taka"></i>{{$new_price}}</h5>

                                                            @elseif( is_null($datum->product_special_price) )

                                                                <h5 class="price"><i class="icofont-taka"></i>{{$datum->product_price}}</h5>

                                                            @else

                                                                <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$datum->product_price}}</del></h5>
                                                                <h5 class="price"><i class="icofont-taka"></i>{{$datum->product_special_price}}</h5>

                                                            @endif
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

                                            @endforeach


                                    @else

                                        {{"There Is No Data Here"}}

                                    @endif


                                </div><!-- Product Slider End -->
                            </div><!-- Product Slider Wrap End -->

                        </div><!-- Tab Pane End -->

                            @endforeach

                    </div>
                </div><!-- Product Tab Content End -->

            </div>
        </div>
    </div><!-- Feature Product Section End -->

    <!-- Best Deals Product Section Start -->
    <div class="product-section section mb-40">
        <div class="container">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="BEST DEALS"><h1>BEST DEALS</h1></div>
                </div><!-- Section Title End -->

                <!-- Product Tab Filter Start-->
                <div class="col-12">
                    <div class="offer-product-wrap row">

                        <!-- Product Tab Filter Start -->
                        <div class="col mb-30">
                            <div class="product-tab-filter">
                                <!-- Tab Filter Toggle -->
                                <button class="product-tab-filter-toggle">showing: <span></span><i class="icofont icofont-simple-down"></i></button>

                            </div>
                        </div><!-- Product Tab Filter End -->

                        <!-- Offer Time Wrap Start -->
                        <div class="col mb-30">
                            <div class="offer-time-wrap" style="background-image: url({{asset('frontEndResource/assets/images/bg/offer-products.jpg')}})">
                                <h1><span>UP TO</span> 50%</h1>
                                <h3>QUALITY & EXCLUSIVE <span>PRODUCTS</span></h3>
                                <h4><span>LIMITED TIME OFFER</span> GET YOUR PRODUCT</h4>

                                {{--@foreach($flash_product as $product)--}}

                                    @php

                                        $count = count($flash_product);

                                        for ($i=0; $i < $count; $i++){

                                            date_default_timezone_set("Asia/Dhaka");
                                            $current_time = date_create(date('Y-m-d H:i:s'));
                                            $start_time = date_create($flash_product[$i]->start_time);
                                            $end_time = date_create($flash_product[$i]->end_time);

                                            if ($start_time <= $current_time && $end_time > $current_time){

                                                printf('<div class="countdown" data-countdown="%s"></div>',$flash_product[$i]->end_time);
                                                break;

                                            }


                                        }

                                    @endphp


                            </div>
                        </div><!-- Offer Time Wrap End -->

                        <!-- Product Tab Content Start -->
                        <div class="col-12 mb-30">
                            <div class="tab-content">

                                <!-- Tab Pane Start -->
                                <div class="tab-pane fade show active" id="tab-three">

                                    <!-- Product Slider Wrap Start -->
                                    <div class="product-slider-wrap product-slider-arrow-two">
                                        <!-- Product Slider Start -->
                                        <div class="product-slider product-slider-3">

                                            @foreach($flash_product as $product)


                                                @php

                                                    date_default_timezone_set("Asia/Dhaka");

                                                    $current_time = date_create(date('Y-m-d H:i:s'));

                                                    $start_time = date_create($product->start_time);
                                                    $end_time = date_create($product->end_time);
                                                @endphp
                                                    @if ($start_time <= $current_time && $end_time > $current_time)

                                                    <div class="col pb-20 pt-10">
                                                        <!-- Product Start -->
                                                        <div class="ee-product">
                                                            <!-- Image -->
                                                            <div class="image">
                                                                <span class="label sale">{{$product->product_discount}}% off</span>
                                                                @php

                                                                    $images = explode('|',$product->product_images)

                                                                @endphp

                                                                <a href="{{route('singleProductView',$product->id)}}" class="img"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image"></a>

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

                                                                    <a href="{{route('CategoryProductView',$product->product_category)}}" class="cat">{{$product->cat_name}}</a>
                                                                    <h5 class="title"><a href="{{route('singleProductView',$product->id)}}">{{$product->product_name}}</a></h5>

                                                                </div>

                                                                <!-- Price & Ratting -->
                                                                <div class="price-ratting">
                                                                    @php

                                                                    $discount_price = ($product->product_price * $product->product_discount)/100;
                                                                    $without_float = floor($discount_price);

                                                                    $new_price = $product->product_price - $without_float;

                                                                    @endphp

                                                                    <h5 class="price"><span class="old">${{$product->product_price}}</span>{{$new_price}}</h5>
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

                                                    @else

                                                    @endif

                                            @endforeach


                                        </div><!-- Product Slider End -->
                                    </div><!-- Product Slider Wrap End -->

                                </div><!-- Tab Pane End -->

                                <!-- Tab Pane Start -->
                                <div class="tab-pane fade" id="tab-four">

                                    <!-- Product Slider Wrap Start -->
                                    <div class="product-slider-wrap product-slider-arrow-two">
                                        <!-- Product Slider Start -->
                                        <div class="product-slider product-slider-3">

                                            <div class="col pb-20 pt-10">
                                                <!-- Product Start -->
                                                <div class="ee-product">

                                                    <!-- Image -->
                                                    <div class="image">

                                                        <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-18.png')}}" alt="Product Image"></a>

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

                                                            <a href="#" class="cat">Tv & Audio</a>
                                                            <h5 class="title"><a href="single-product.html">Xonet Speaker P 9</a></h5>

                                                        </div>

                                                        <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            <h5 class="price">$185.00</h5>
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

                                                        <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-24.png')}}" alt="Product Image"></a>

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

                                                            <a href="#" class="cat">Smartphone</a>
                                                            <h5 class="title"><a href="single-product.html">Sany Experia Z5</a></h5>

                                                        </div>

                                                        <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            <h5 class="price">$360.00</h5>
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

                                                        <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-20.png')}}" alt="Product Image"></a>

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

                                                            <a href="#" class="cat">Kitchen Appliances</a>
                                                            <h5 class="title"><a href="single-product.html">Jackson Toster V 27</a></h5>

                                                        </div>

                                                        <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            <h5 class="price"><span class="old">$185</span>$135.00</h5>
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

                                                        <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-21.png')}}" alt="Product Image"></a>

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

                                                            <a href="#" class="cat">Kitchen Appliances</a>
                                                            <h5 class="title"><a href="single-product.html">mega Juice Maker</a></h5>

                                                        </div>

                                                        <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            <h5 class="price">$125.00</h5>
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

                                                        <span class="label new">new</span>

                                                        <a href="single-product.html" class="img"><img src="{{asset('frontEndResource/assets/images/product/product-22.png')}}" alt="Product Image"></a>

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

                                                            <a href="#" class="cat">Kitchen Appliances</a>
                                                            <h5 class="title"><a href="single-product.html">shine Microwave Oven</a></h5>

                                                        </div>

                                                        <!-- Price & Ratting -->
                                                        <div class="price-ratting">

                                                            <h5 class="price"><span class="old">$389</span>$245.00</h5>
                                                            <div class="ratting">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div><!-- Product End -->
                                            </div>

                                        </div><!-- Product Slider End -->
                                    </div><!-- Product Slider Wrap End -->

                                </div><!-- Tab Pane End -->

                            </div>
                        </div><!-- Product Tab Content End -->

                    </div>
                </div><!-- Product Tab Filter End-->

            </div>
        </div>
    </div><!-- Best Deals Product Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section section mb-90">
        <div class="container">
            <div class="row">

                @foreach($mid_banner as $banner)
                <!-- Banner -->
                <div class="col-12">
                    <div class="banner"><a href="#"><img src="{{asset('storage/upload/banner/'.$banner->images)}}" alt="Banner"></a></div>
                </div>

                    @endforeach

            </div>
        </div>
    </div><!-- Banner Section End -->

    <!-- Best Sell Product Section Start -->
    <div class="product-section section mb-60">
        <div class="container">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="ALL BRANDS"><h1>ALL BRANDS</h1></div>
                </div><!-- Section Title End -->

                <div class="col-12">
                    <div class="row">
                        <!-- Product Tab Filter Start -->
                        <div class="col-12 mb-30">
                            <div class="product-tab-filter">

                                <!-- Tab Filter Toggle -->
                                <button class="product-tab-filter-toggle">showing: <span></span><i class="icofont icofont-simple-down"></i></button>

                                <!-- Product Tab List -->
                                <ul class="nav product-tab-list">
                                    <li><a class="active" data-toggle="tab" href="#tab-B-one">all</a></li>

                                    @foreach($brands_items as $brands_item)

                                        <li><a data-toggle="tab" href="#tab-B-{{$brands_item->id}}">{{$brands_item->name}}</a></li>

                                    @endforeach
                                </ul>

                            </div>
                        </div><!-- Product Tab Filter End -->

                    </div>
                </div>

                <!-- Product Tab Content Start -->
                <div class="col-12">
                    <div class="tab-content">

                        <!-- Tab Pane Start -->
                        <div class="tab-pane fade show active" id="tab-B-one">

                            <!-- Product Slider Wrap Start -->
                            <div class="product-slider-wrap product-slider-arrow-one">
                                <!-- Product Slider Start -->
                                <div class="product-slider product-slider-4">


                                    @foreach($allProducts as $allProduct)

                                        <div class="col pb-20 pt-10">
                                            <!-- Product Start -->
                                            <div class="ee-product">

                                                <!-- Image -->
                                                <div class="image">
                                                    @php
                                                        $images = explode('|',$allProduct->product_images);
                                                    @endphp
                                                    <a href="{{route('singleProductView',$allProduct->id)}}" class="img"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image" class="img-fluid"></a>

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

                                                        <a href="{{route('CategoryProductView',$allProduct->product_category)}}" class="cat">{{$allProduct->cat_name}}</a>
                                                        <h5 class="title"><a href="{{route('singleProductView',$allProduct->id)}}">{{$allProduct->product_name}}</a></h5>

                                                    </div>

                                                @php

                                                    $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                                    ->where('best_deals.product_id','=',$allProduct->id)->first();



                                                    if ($product_discount != null){

                                                    date_default_timezone_set("Asia/Dhaka");
                                                    $current_time = date_create(date('Y-m-d H:i:s'));
                                                    $start_time = date_create($product_discount->start_time);
                                                    $end_time = date_create($product_discount->end_time);

                                                    }
                                                @endphp


                                                <!-- Price & Ratting -->
                                                    <div class="price-ratting">

                                                        @if($product_discount != null && $start_time <= $current_time && $end_time > $current_time)



                                                            <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>

                                                            @php

                                                                $a = ($allProduct->product_price * $product_discount->product_discount)/100;

                                                                $new_price = $allProduct->product_price - $a;

                                                            @endphp

                                                            <h5 class="price"><i class="icofont-taka"></i>{{$new_price}}</h5>

                                                        @elseif( is_null($allProduct->product_special_price) )

                                                            <h5 class="price"><i class="icofont-taka"></i>{{$allProduct->product_price}}</h5>

                                                        @else

                                                            <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>
                                                            <h5 class="price"><i class="icofont-taka"></i>{{$allProduct->product_special_price}}</h5>

                                                        @endif
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
                                    @endforeach


                                </div><!-- Product Slider End -->
                            </div><!-- Product Slider Wrap End -->

                        </div><!-- Tab Pane End -->

                    @foreach($brands_items as $brands_item)

                        <!-- Tab Pane Start -->
                            <div class="tab-pane fade" id="tab-B-{{$brands_item->id}}">

                                <!-- Product Slider Wrap Start -->
                                <div class="product-slider-wrap product-slider-arrow-one">
                                    <!-- Product Slider Start -->
                                    <div class="product-slider product-slider-4">

                                        @php


                                            $brands_datas = \Illuminate\Support\Facades\DB::table('products')
                                            ->join('brands','products.product_brand','=','brands.id')
                                            ->join('categories','products.product_category','=','categories.id')
                                            ->select('products.*','brands.name AS brand_name','categories.name AS cat_name')
                                            ->where('products.product_brand','=',$brands_item->id)->limit(10)->get();


                                        @endphp

                                        @if ($brands_datas->toArray() != null)

                                            @foreach($brands_datas as $datum)

                                                <div class="col pb-20 pt-10">
                                                    <!-- Product Start -->
                                                    <div class="ee-product">

                                                        <!-- Image -->
                                                        <div class="image">
                                                            @php
                                                                $images = explode('|',$datum->product_images);
                                                            @endphp

                                                            <a href="{{route('singleProductView',$datum->id)}}" class="img"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image"></a>

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

                                                                <a href="{{route('CategoryProductView',$datum->product_category)}}" class="cat">{{$datum->cat_name}}</a>
                                                                <h5 class="title"><a href="{{route('singleProductView',$datum->id)}}">{{$datum->product_name}}</a></h5>

                                                            </div>

                                                        @php

                                                            $product_discount =  Illuminate\Support\Facades\DB::table('best_deals')
                                                            ->where('best_deals.product_id','=',$allProduct->id)->first();

                                                            if ($product_discount != null){

                                                            date_default_timezone_set("Asia/Dhaka");
                                                            $current_time = date_create(date('Y-m-d H:i:s'));
                                                            $start_time = date_create($product_discount->start_time);
                                                            $end_time = date_create($product_discount->end_time);

                                                            }

                                                        @endphp


                                                        <!-- Price & Ratting -->
                                                            <div class="price-ratting">

                                                                @if($start_time <= $current_time && $end_time > $current_time)



                                                                    <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$allProduct->product_price}}</del></h5>

                                                                    @php

                                                                        $a = ($datum->product_price * $product_discount->product_discount)/100;

                                                                        $new_price = $datum->product_price - $a;

                                                                    @endphp

                                                                    <h5 class="price"><i class="icofont-taka"></i>{{$new_price}}</h5>

                                                                @elseif( is_null($datum->product_special_price) )

                                                                    <h5 class="price"><i class="icofont-taka"></i>{{$datum->product_price}}</h5>

                                                                @else

                                                                    <h5 class="price-ul"><del><i class="icofont-taka"></i>{{$datum->product_price}}</del></h5>
                                                                    <h5 class="price"><i class="icofont-taka"></i>{{$datum->product_special_price}}</h5>

                                                                @endif
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

                                            @endforeach


                                        @else

                                            {{"There Is No Data Here"}}

                                        @endif


                                    </div><!-- Product Slider End -->
                                </div><!-- Product Slider Wrap End -->

                            </div><!-- Tab Pane End -->

                        @endforeach

                    </div>
                </div><!-- Product Tab Content End -->

            </div>
        </div>
    </div><!-- Best Sell Product Section End -->


    <!-- Feature Section Start -->
    <div class="feature-section section mb-60">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <!-- Feature Start -->
                    <div class="feature-two" style="background-image: url({{asset('frontEndResource/assets/images/icons/feature-van-2-bg.png')}})">
                        <div class="feature-wrap">
                            <div class="icon"><img src="{{asset('frontEndResource/assets/images/icons/feature-van-2.png')}}" alt="Feature"></div>
                            <h4>FREE SHIPPING</h4>
                            <p>Start from $100</p>
                        </div>
                    </div><!-- Feature End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <!-- Feature Start -->
                    <div class="feature-two" style="background-image: url({{asset('frontEndResource/assets/images/icons/feature-walet-2-bg.png')}})">
                        <div class="feature-wrap">
                            <div class="icon"><img src="{{asset('frontEndResource/assets/images/icons/feature-walet-2.png')}}" alt="Feature"></div>
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p>Back within 15 days</p>
                        </div>
                    </div><!-- Feature End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <!-- Feature Start -->
                    <div class="feature-two" style="background-image: url({{asset('frontEndResource/assets/images/icons/feature-shield-2-bg.png')}})">
                        <div class="feature-wrap">
                            <div class="icon"><img src="{{asset('frontEndResource/assets/images/icons/feature-shield-2.png')}}" alt="Feature"></div>
                            <h4>SECURE PAYMENTS</h4>
                            <p>Payment Security</p>
                        </div>
                    </div><!-- Feature End -->
                </div>

            </div>
        </div>
    </div><!-- Feature Section End -->

    <!-- New Arrival Product Section Start -->
    <div class="product-section section mb-60">
        <div class="container">
            <div class="row">

                <!-- Section Title Start -->
                <div class="col-12 mb-40">
                    <div class="section-title-one" data-title="NEW ARRIVAL"><h1>NEW ARRIVAL</h1></div>
                </div><!-- Section Title End -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-xl-9 col-lg-8 col-12">
                            <div class="row">

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <span class="label sale">sale</span>

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-16.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Tv & Audio</a>
                                                <h5 class="title"><a href="single-product.html">Nexo Andriod TV Box</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price"><span class="old">$360 </span>$250.00</h5>
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

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <span class="label new">new</span>

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-17.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Smartphone</a>
                                                <h5 class="title"><a href="single-product.html">Ornet Note 9</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price"><span class="old">$285</span>$230.00</h5>
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

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-18.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Tv & Audio</a>
                                                <h5 class="title"><a href="single-product.html">Xonet Speaker P 9</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price">$185.00</h5>
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

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <span class="label sale">sale</span>

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-20.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Kitchen Appliances</a>
                                                <h5 class="title"><a href="single-product.html">Jackson Toster V 27</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price"><span class="old">$185</span>$135.00</h5>
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

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-21.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Kitchen Appliances</a>
                                                <h5 class="title"><a href="single-product.html">mega Juice Maker</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price">$125.00</h5>
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

                                <div class="col-xl-4 col-md-6 col-12 pb-30 pt-10">
                                    <!-- Product Start -->
                                    <div class="ee-product">

                                        <!-- Image -->
                                        <div class="image">

                                            <span class="label new">new</span>

                                            <a href="single-product.html" class="img"><img src="../../../../public/frontEndResource/assets/images/product/product-22.png" alt="Product Image"></a>

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

                                                <a href="#" class="cat">Kitchen Appliances</a>
                                                <h5 class="title"><a href="single-product.html">shine Microwave Oven</a></h5>

                                            </div>

                                            <!-- Price & Ratting -->
                                            <div class="price-ratting">

                                                <h5 class="price"><span class="old">$389</span>$245.00</h5>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>

                                            </div>

                                        </div>

                                    </div><!-- Product End -->
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-12 mb-25 mt-5">
                            <div class="row">

                                <div class="col-lg-12 col-md-4 col-12 mt-5"><div class="banner"><a href="#"><img src="../../../../public/frontEndResource/assets/images/banner/banner-17.jpg" alt="Banner"></a></div></div>
                                <div class="col-lg-12 col-md-4 col-12 mt-5"><div class="banner"><a href="#"><img src="../../../../public/frontEndResource/assets/images/banner/banner-18.jpg" alt="Banner"></a></div></div>
                                <div class="col-lg-12 col-md-4 col-12 mt-5"><div class="banner"><a href="#"><img src="../../../../public/frontEndResource/assets/images/banner/banner-19.jpg" alt="Banner"></a></div></div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div><!-- New Arrival Product Section End -->


    <!-- Brands Section Start -->
    <div class="brands-section section mb-90">
        <div class="container">
            <div class="row">

                <!-- Brand Slider Start -->
                <div class="brand-slider col">

                    @foreach($Brands as $brand)


                        <div class="brand-item col brand-img-body"><a href="" class="brand-img"><img src="{{asset('storage/upload/brands/'.$brand->image)}}" class="img-fluid" alt="Brands" style="width: 100%; height: 100%"></a></div>

                    @endforeach
                </div><!-- Brand Slider End -->

            </div>
        </div>
    </div><!-- Brands Section End -->


    @endsection