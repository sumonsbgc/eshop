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
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/1553153028_0_AC-Sale-Big-Banner-updated.jpg')}}" class="img-fluid" alt="slide"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/samsung.jpg')}}" class="img-fluid" alt="slide"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/headphone.jpg')}}" class="img-fluid" alt="slide"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/vivo.jpg')}}" class="img-fluid" alt="slide"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/purid.png')}}" class="img-fluid" alt="slide"></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{asset('FrontEndPageResource/image/hoco.jpg')}}" class="img-fluid" alt="slide"></a>
                        </div>
                    </div>
                </div>
                <div class="slider-item-list">
                    <ul id='carousel-custom-dots' class='owl-dots menu-list'>
                        <li class='owl-dot'>AC </li>
                        <li class='owl-dot'>Samsung</li>
                        <li class='owl-dot'>Headphone</li>
                        <li class='owl-dot'>vivo</li>
                        <li class='owl-dot'>Puried</li>
                        <li class='owl-dot'>Hoco</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-banner py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner py-3">
                    <img src="{{asset('FrontEndPageResource/image/banner-14.jpg')}}" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner py-3">
                    <img src="{{asset('FrontEndPageResource/image/banner-15.jpg')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hot-deals">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-head">
                    <h2>Hot Deals</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row syn-row justify-content-center">
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-md-15 col-sm-15 col-sm-4 px-0 hot-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="section-bottom"></div>
            </div>
        </div>
    </div>
</div>

<div class="category-product py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-border-top bg-border-1"></div>
            </div>
        </div>
        <div class="row syn-row">
            <div class="col-lg-3 px-0 sub-cat-list">
                <div class="cat-name text-center my-2">
                    <h3>Mobile</h3>
                </div>
                <div class="sub-cat bg-cat-1">
                    <ul>
                        <li><a href="{{url('category')}}">Smart Phone</a></li>
                        <li><a href="{{url('category')}}">Feature Phone</a></li>
                        <li><a href="{{url('category')}}">Mobile Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="row syn-row">
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 px-0 cat-image">
                <img src="{{asset('FrontEndPageResource/image/y6-pro-category-bannerddd.jpg')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="category-product py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-border-top bg-border-2"></div>
            </div>
        </div>
        <div class="row syn-row">
            <div class="col-lg-3 px-0 sub-cat-list">
                <div class="cat-name text-center my-2">
                    <h3>Mobile</h3>
                </div>
                <div class="sub-cat bg-cat-2">
                    <ul>
                        <li><a href="{{url('category')}}">Smart Phone</a></li>
                        <li><a href="{{url('category')}}">Feature Phone</a></li>
                        <li><a href="{{url('category')}}">Mobile Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="row syn-row">
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 px-0 cat-image">
                <img src="{{asset('FrontEndPageResource/image/y6-pro-category-bannerddd.jpg')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="category-product py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-border-top bg-border-3"></div>
            </div>
        </div>
        <div class="row syn-row">
            <div class="col-lg-3 px-0 sub-cat-list">
                <div class="cat-name text-center my-2">
                    <h3>Mobile</h3>
                </div>
                <div class="sub-cat bg-cat-3">
                    <ul>
                        <li><a href="{{url('category')}}">Smart Phone</a></li>
                        <li><a href="{{url('category')}}">Feature Phone</a></li>
                        <li><a href="{{url('category')}}">Mobile Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="row syn-row">
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="{{url('/single')}}">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href="{{url('/single')}}"><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 px-0 cat-image">
                <img src="{{asset('FrontEndPageResource/image/y6-pro-category-bannerddd.jpg')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="category-product py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-border-top"></div>
            </div>
        </div>
        <div class="row syn-row">
            <div class="col-lg-3 px-0 sub-cat-list">
                <div class="cat-name text-center my-2">
                    <h3>Mobile</h3>
                </div>
                <div class="sub-cat">
                    <ul>
                        <li><a href="">Smart Phone</a></li>
                        <li><a href="">Feature Phone</a></li>
                        <li><a href="">Mobile Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="row syn-row">
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0 cat-item">
                        <div class="product-cart text-center">
                            <a href="">
                                <div class="product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}">
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

                                <a href=""><h4 class="product-name">HP Laptop GH</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> 78000</span>

                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 px-0 cat-image">
                <img src="{{asset('FrontEndPageResource/image/y6-pro-category-bannerddd.jpg')}}" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<div class="footer-banner py-5">
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