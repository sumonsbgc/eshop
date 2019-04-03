<?php
$cart_data ="";

if (session()->has('return_data')){
    $cart_data = session()->get('return_data');
}

$total = session()->get('total');
$count = session()->get('count');

if (isset($_COOKIE['sum'])){
    echo $_COOKIE['sum'];
}else{

    echo "no cookie";
}


?>

<!-- Header Section Start -->
<div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-two header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-10 mb-10">
                    <!-- Header Links Start -->
                    <div class="header-links">
                        <a href=""><img src="{{asset('frontEndResource/assets/images/icons/car.png')}}" alt="Car Icon"> <span>Track your order</span></a>
                        <a href=""><img src="{{asset('frontEndResource/assets/images/icons/marker.png')}}" alt="Car Icon"> <span>Locate Store</span></a>
                    </div><!-- Header Links End -->
                </div>

                <div class="col order-12 order-xs-12 order-md-2 mt-10 mb-10 ml-auto">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">
                        <!-- Cart -->
                        <a href="cart.html" class="header-cart"><i class="ti-shopping-cart"></i> <span class="number" id="number">
                            @php
                                if ($count != null){
                                    echo $count;
                                }
                                else{
                                    echo "0";
                                }
                            @endphp

                            </span></a>
                            {{--@php--}}
                                {{--var_dump(session()->all());--}}
                            {{--@endphp--}}
                    </div><!-- Header Shop Links End -->
                </div>
                <div class="col order-2 order-xs-2 order-md-12 mt-10 mb-10">
                    <!-- Header Account Links Start -->
                    <div class="header-account-links">
                        @if(\Illuminate\Support\Facades\Auth::check())

                            <a href="{{route('myAccount')}}"><i class="icofont icofont-user-alt-7"></i> <span class="d-block">my account</span></a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="d-block">Log Out</span>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        @else

                            <a href="{{route('login')}}"><span class="d-block">Log In</span></a>
                            <a href="{{route('register')}}"><span class="d-block">Sign Up</span></a>

                        @endif


                    </div><!-- Header Account Links End -->
                </div>

            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Top Start -->
    <div class="header-bottom header-bottom-two header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('frontEndResource/assets/images/logo.png')}}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                            <img class="theme-dark" src="{{asset('frontEndResource/assets/images/logo-light.png')}}" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-12 order-lg-2 order-xl-2 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="active"><a href="">HOME</a></li>
                                <li class="menu-item-has-children"><a href="shop-grid.html">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children"><a href="shop-grid.html">shop grid</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop-grid.html">shop grid</a></li>
                                                <li><a href="shop-grid-left-sidebar.html">shop grid Left Sidebar</a></li>
                                                <li><a href="shop-grid-right-sidebar.html">shop grid Right Sidebar</a></li>
                                                <li><a href="shop-grid-extended.html">shop grid Extended</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="shop-list.html">shop List</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop-list.html">shop List</a></li>
                                                <li><a href="shop-list-left-sidebar.html">shop List Left Sidebar</a></li>
                                                <li><a href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="category-1.html">shop Category</a>
                                            <ul class="sub-menu">
                                                <li><a href="category-1.html">Shop Category 1</a></li>
                                                <li><a href="category-2.html">Shop Category 2</a></li>
                                                <li><a href="category-3.html">Shop Category 3</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="single-product.html">Single Product</a>
                                            <ul class="sub-menu">
                                                <li><a href="single-product.html">Single Product 1</a></li>
                                                <li><a href="single-product-2.html">Single Product 2</a></li>
                                                <li><a href="single-product-3.html">Single Product 3</a></li>
                                                <li><a href="single-product-4.html">Single Product 4</a></li>
                                                <li><a href="single-product-5.html">Single Product 5</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">PAGES</a>
                                    <ul class="mega-menu three-column">
                                        <li><a href="#">Column One</a>
                                            <ul>
                                                <li><a href="about-us.html">About us</a></li>
                                                <li><a href="banner.html">Banner</a></li>
                                                <li><a href="best-deals.html">Best Deals</a></li>
                                                <li><a href="buttons.html">Buttons</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="clients.html">Clients</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Two</a>
                                            <ul>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="feature.html">Feature</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="store.html">Store</a></li>
                                                <li><a href="tabs.html">Tabs</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Column Three</a>
                                            <ul>
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                                <li><a href="testimonial.html">Testimonial</a></li>
                                                <li><a href="track-order.html">Track Order</a></li>
                                                <li><a href="typography.html">Typography</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="blog-3-column.html">BLOG</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-1-column-left-sidebar.html">Blog 1 Column Left Sidebar</a></li>
                                        <li><a href="blog-1-column-right-sidebar.html">Blog 1 Column Right Sidebar</a></li>
                                        <li><a href="blog-2-column-left-sidebar.html">Blog 2 Column Left Sidebar</a></li>
                                        <li><a href="blog-2-column-right-sidebar.html">Blog 2 Column Right Sidebar</a></li>
                                        <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                        <li><a href="single-blog-left-sidebar.html">Single Blog Left Sidebar</a></li>
                                        <li><a href="single-blog-right-sidebar.html">Single Blog Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col order-2 order-lg-12 order-xl-12">
                    <div class="row justify-content-between align-items-center">

                        <div class="col">
                            <!-- Header Call Us Start -->
                            <div class="header-call-us">

                                <h4>call us <br> <span><a href="tel:01254568987">01254  568  987</a></span></h4>

                            </div><!-- Header Call Us End -->
                        </div>

                        <div class="col">
                            <!-- Header Search Start -->
                            <div class="header-search">

                                <!-- Search Toggle -->
                                <button class="search-toggle"><i class="icofont icofont-search-alt-1"></i></button>

                            </div><!-- Header Search End -->
                        </div>

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="header-search-container">
                        <form action="#" class="header-search-form">
                            <input type="text" placeholder="Search your product">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- Header Top End -->

</div>
<!-- Header Section End -->

<!-- Mini Cart Wrap Start -->
<div class="mini-cart-wrap">

    <!-- Mini Cart Top -->
    <div class="mini-cart-top">

        <button class="close-cart">Close Cart<i class="icofont icofont-close"></i></button>

    </div>

    <!-- Mini Cart Products -->
    <ul class="mini-cart-products" id="cart_product">

        @if($cart_data != null)

        @foreach($cart_data as $data)

            @php


                date_default_timezone_set("Asia/Dhaka");
                $current_time = date_create(date('Y-m-d H:i:s'));

                if (isset($data['start_time']) && isset($data['end_time'])){
                $start_time = date_create($data['start_time']);
                $end_time = date_create($data['end_time']);
                }


            @endphp

            @if(isset($data['start_time'],$data['end_time']) && $start_time <= $current_time && $end_time > $current_time)
            <li>
                <a class="image"><img src="{{asset('storage/upload/product_image/'.$data['product_image'])}}" alt="Product"></a>
                <div class="content">
                    <a href="" class="title">{{$data['product_name']}}</a>
                    <span>Price : </span>
                    <span>

                        @php

                            $a = ($data['product_price'] * $data['product_discount'])/100;

                            echo $new_price = $data['product_price'] - $a;

                        @endphp

                    </span>
                    <br>
                    <span>Qty : </span><span class="qty d-inline qnt">{{$data['product_quantity']}}</span><br>
                    <span>Total : </span><span class="qty d-inline cart-price">{{$data['product_quantity'] * $new_price}}</span>
                </div>
                <button class="remove"><i class="fa fa-trash-o"></i></button>
            </li>

            @elseif($data['product_special_price'] != null)

                <li>
                    <a class="image"><img src="{{asset('storage/upload/product_image/'.$data['product_image'])}}" alt="Product"></a>
                    <div class="content">
                        <a href="" class="title">{{$data['product_name']}}</a>
                        <span>Price : </span><span>{{$data['product_special_price']}}</span><br>
                        <span>Qty : </span><span class="qty d-inline qnt">{{$data['product_quantity']}}</span><br>
                        <span>Total : </span><span class="qty d-inline cart-price">{{$data['product_quantity'] * $data['product_special_price']}}</span>
                    </div>
                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                </li>

            @else
                <li>
                    <a class="image"><img src="{{asset('storage/upload/product_image/'.$data['product_image'])}}" alt="Product"></a>
                    <div class="content">
                        <a href="" class="title">{{$data['product_name']}}</a>
                        <span>Price : </span><span>{{$data['product_price']}}</span><br>
                        <span>Qty : </span><span class="qty d-inline qnt">{{$data['product_quantity']}}</span><br>
                        <span>Total : </span><span class="qty d-inline cart-price">{{$data['product_quantity'] * $data['product_price']}}</span>
                    </div>
                    <button class="remove"><i class="fa fa-trash-o"></i></button>
                </li>

            @endif

        @endforeach

        @else

            <p class="text-center">You Don't Select Any Product Yet</p>

        @endif

    </ul>

    <!-- Mini Cart Bottom -->
    <div class="mini-cart-bottom">

        <h4 class="sub-total">Total:
            @if(isset($total) && $total != null)

                <span id="total_sum">
                    @php
                        echo $total;
                    @endphp
                </span>

            @else

                <span id="total_sum">00</span>

            @endif
        </h4>

        <div class="button">
            <a href="">CHECK OUT</a>
        </div>
    </div>

</div><!-- Mini Cart Wrap End -->

<!-- Cart Overlay -->
<div class="cart-overlay"></div>