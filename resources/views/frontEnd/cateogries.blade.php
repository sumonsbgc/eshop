@extends('frontEnd.templateParts.master')


@section('title', 'Category Page')

@section('content')
    <div class="page-banner-section section">
        <div class="page-banner-wrap row row-0 d-flex align-items-center ">

            <!-- Page Banner -->
            <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
                <div class="page-banner">
                    <h1>Shop Category</h1>
                    <p>similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita</p>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Category</a></li>
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

    <div class="product-section section mt-90 mb-90">
        <div class="container">

            <div class="row">
                <div class="col mb-50">
                    <div class="category-page-title"><h4>CATEGORIES  -  {{$category_name->name}}</h4></div>

                </div>
            </div>

            <div class="row">

                @if($categories->toArray() != null)

                    @foreach($categories as $category)

                        <div class="col-xl-3 col-lg-4 col-md-6 col-12 pb-30 pt-10">
                            <!-- Product Start -->
                            <div class="ee-product">

                                <!-- Image -->
                                <div class="image">

                                    <a href="{{route('singleProductView',$category->id)}}" class="img">

                                        @php

                                            $images = explode('|',$category->product_images);

                                        @endphp
                                        <img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="Product Image">
                                    </a>

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

                                        <a href="{{url('categories/'.$category_name->id)}}" class="cat">{{$category_name->name}}</a>
                                        <h5 class="title"><a href="{{route('singleProductView',$category->id)}}">{{$category->product_name}}</a></h5>

                                    </div>

                                    <!-- Price & Ratting -->
                                    <div class="price-ratting">

                                        <h5 class="price">{{$category->product_price}}</h5>
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
                    <div class="col-12 Empty-message text-center d-flex align-items-center">

                        <span class="text-center w-100">This Category Has No Product</span>

                    </div>

                @endif





            </div>

            <!-- Pagination -->
            <div class="row mt-30">
                <div class="col">

                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i>Back</a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li> - - - - - </li>
                        <li><a href="#">18</a></li>
                        <li><a href="#">18</a></li>
                        <li><a href="#">20</a></li>
                        <li><a href="#">Next<i class="fa fa-angle-right"></i></a></li>
                    </ul>

                </div>
            </div>

        </div>
    </div><!-- Single Product Section End -->

    <!-- Brands Section Start -->
    <div class="brands-section section mb-90">
        <div class="container">
            <div class="row">

                <!-- Brand Slider Start -->
                <div class="brand-slider col">

                    @foreach($Brands as $brand)


                        <div class="brand-item col brand-img-body"><a href="" class="brand-img"><img src="{{asset('storage/upload/brands/'.$brand->image)}}" alt="Brands"></a></div>

                        @endforeach
                </div><!-- Brand Slider End -->

            </div>
        </div>
    </div><!-- Brands Section End -->


    @endsection