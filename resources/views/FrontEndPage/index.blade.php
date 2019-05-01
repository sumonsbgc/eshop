@extends('FrontEndPage.templateParts.master')
@section('title','Ecommerce')
@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-demo">
                    <div class="slide-progress"></div>
                    <div class="owl-carousel owl-theme">

                        @foreach($allSlider as $slider)
                        <div class="item">
                            <a href=""><img src="{{asset('storage/upload/slider_image/'.$slider->image)}}" class="img-fluid" alt="slide"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="slider-item-list">
                    <ul id='carousel-custom-dots' class='owl-dots menu-list'>
                        @foreach($allSlider as $slider)
                        <li class='owl-dot'>{{$slider->slider_target}}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-banner py-sm-4 py-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-sm-0 pt-3">
                <div class="banner">
                    <img src="{{asset('FrontEndPageResource/image/banner-14.jpg')}}" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 py-sm-0 pt-3">
                <div class="banner">
                    <img src="{{asset('FrontEndPageResource/image/banner-15.jpg')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hot-deals py-sm-0 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head">
                    <h2>Hot Deals</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row syn-row justify-content-center">
                    @foreach($flash_products as $product)
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item col-6">
                        <div class="product-cart text-center hot-items-product">
                            <a href="{{route('singleProductView',$product->id)}}">
                                <div class="product-image">
                                    @php
                                        $images = explode('|',$product->product_images);
                                    @endphp
                                    <img src="{{asset('storage/upload/product_image/'.$images[0])}}" class="img-fluid" alt="image">
                                </div>
                            </a>
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fa fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="product-info text-center">

                                <a href="{{route('singleProductView',$product->id)}}"><h4 class="product-name">{{$product->product_name}}</h4></a>

                                @if($product->product_discount != null)

                                    <span class="hot-deals-old-price"><del><i class="icofont-taka"></i> {{$product->product_price}}</del></span>

                                    @php
                                        $product_price = round(($product->product_price * $product->product_discount) / 100);
                                    @endphp
                                    <span class="product-price hot-deals-new-price"><i class="icofont-taka"></i> {{$product_price}}</span>


                                @elseif($product->product_special_price != null)

                                    <span class="hot-deals-old-price"><del><i class="icofont-taka"></i> {{$product->product_price}}</del></span>
                                    <span class="product-price hot-deals-new-price"><i class="icofont-taka"></i> {{$product->product_special_price}}</span>

                                @else

                                    <span class="product-price"><i class="icofont-taka"></i> {{$product->product_price}}</span>

                                @endif

                            </div>
                            <a role="button" class="product-btn" href="{{ route('singleProductView',$product->id) }}">Buy Now</a>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <div class="col-lg-12">
                <div class="section-bottom"></div>
            </div>
        </div>
    </div>
</div>




@php

    $c = 1;

@endphp
@foreach($mainCat as $cat)
    @php
        $c ++;
    @endphp

    <div class="category-product py-sm-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-border-top bg-border-{{$c}}"></div>
                </div>
            </div>
            <div class="row syn-row">
                <div class="col-lg-3 px-0 sub-cat-list">
                    <div class="cat-name text-center my-2">
                        <h3>{{$cat->name}}</h3>
                    </div>
                    <div class="sub-cat bg-cat-{{$c}}">
                        @php
                            $sub_cats = get_sub_cat($cat->id);
                        @endphp
                        @foreach($sub_cats as $sub_cat)
                        <ul>
                            <li><a href="{{url('category', $sub_cat->name)}}">{{$sub_cat->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 px-0 border-bottom">
                    <div class="row syn-row">

                        @php

                            $sub_Cat_first= isset($sub_cats[0]->id) ? $sub_cats[0]->id : null;

                        @endphp

                        @if(get_products($sub_Cat_first,6) == null)

                            @if(get_products($cat->id,6) == null)

                            <div class="col-lg-12 d-flex justify-content-center align-items-center empty-products-list">
                                <h6>{{isset($sub_cats[0]->name) ? $sub_cats[0]->name : null}} Does not have any products</h6>
                            </div>

                                @else
                                
                                @php
                                    $cat_products = get_products($cat->id,6);
                                @endphp

                                @foreach($cat_products as $Cat_product)
                                    <div class="col-lg-4 px-0 cat-item col-6">
                                        <div class="product-cart text-center">
                                            <a href="{{route('singleProductView',$Cat_product->id)}}">
                                                <div class="product-image">

                                                    @php
                                                        $images = explode('|',$Cat_product->product_images);
                                                    @endphp

                                                    <img src="{{asset('storage/upload/product_image/'.$images[0])}}" class="img-fluid" alt="image">
                                                </div>
                                            </a>
                                            <div class="ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fa fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="product-info text-center">

                                                <a href="{{route('singleProductView',$Cat_product->id)}}"><h4 class="product-name">{{$Cat_product->product_name}}</h4></a>
                                                <span class="product-price"><i class="icofont-taka"></i> {{$Cat_product->product_price}}</span>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @endif

                        @else
                            @php
                                $cat_products = get_products($sub_Cat_first,6);
                            @endphp

                            @foreach($cat_products as $Cat_product)
                                <div class="col-lg-4 px-0 cat-item col-6">
                                    <div class="product-cart text-center">
                                        <a href="{{route('singleProductView',$Cat_product->id)}}">
                                            <div class="product-image">

                                                @php
                                                    $images = explode('|',$Cat_product->product_images);
                                                @endphp

                                                <img src="{{asset('storage/upload/product_image/'.$images[0])}}" class="img-fluid" alt="image">
                                            </div>
                                        </a>
                                        <div class="ratting">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="product-info text-center">

                                            <a href="{{route('singleProductView',$Cat_product->id)}}"><h4 class="product-name">{{$Cat_product->product_name}}</h4></a>
                                            <span class="product-price"><i class="icofont-taka"></i> {{$Cat_product->product_price}}</span>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 px-0 cat-image">
                    <img src="{{asset('FrontEndPageResource/image/y6-pro-category-bannerddd.jpg')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    @endforeach

<div class="footer-banner py-sm-5 pt-3 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="">
                <div class="footer-banner-img">
                    <img src="{{asset('FrontEndPageResource/image/banner-3.jpg')}}" alt="banner" class="img-fluid">
                </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>

    //Init the carousel
    initSlider();
    var owl = $('.owl-carousel');

    function initSlider() {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            dots: true,
            dotsContainer: '#carousel-custom-dots',
            nav: false,
            onInitialized: startProgressBar,
            onTranslate: resetProgressBar,
            onTranslated: startProgressBar
        });
    }

    function startProgressBar() {
        // apply keyframe animation
        $(".slide-progress").css({
            width: "100%",
            transition: "width 5000ms"
        });
    }

    function resetProgressBar() {
        $(".slide-progress").css({
            width: 0,
            transition: "width 0s"
        });
    }
    $('.owl-dot').click(function () {
        owl.trigger('to.owl.carousel', [$(this).index(), 600]);
    });

</script>
@endsection