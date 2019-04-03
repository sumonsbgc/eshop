<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 justify-content-center align-self-center text-left py-2">
                <div class="site-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('FrontEndPageResource/image/dadabangla.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="search-option">
                    <div class="form">
                        <form action="" method="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search-product" placeholder="Search Here....">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right py-2">
                <div class="cart-and-auth">
                    <div class="shopping-cart">
                        <div class="cart">
                            <i class="icofont-shopping-cart"></i>
                            <span class="badge badge-secondary">0</span>

                            <div class="cart-body">
                                <div class="cart-product-list">
                                    <div class="cart-product mb-3">
                                        <div class="cart-product-image">
                                            <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                                        </div>
                                        <div class="cart-product-details">
                                            <h5>HP Laptop GH</h5>
                                            <p>Color : Blue</p>
                                            <span>1* <i class="icofont-taka"></i>68000</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="button" onclick=""><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-product mb-3">
                                        <div class="cart-product-image">
                                            <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                                        </div>
                                        <div class="cart-product-details">
                                            <h5>HP Laptop GH</h5>
                                            <p>Color : Blue</p>
                                            <span>1* <i class="icofont-taka"></i>68000</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="button" onclick=""><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-product mb-3">
                                        <div class="cart-product-image">
                                            <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                                        </div>
                                        <div class="cart-product-details">
                                            <h5>HP Laptop GH</h5>
                                            <p>Color : Blue</p>
                                            <span>1* <i class="icofont-taka"></i>68000</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="button" onclick=""><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-product mb-3">
                                        <div class="cart-product-image">
                                            <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                                        </div>
                                        <div class="cart-product-details">
                                            <h5>HP Laptop GH</h5>
                                            <p>Color : Blue</p>
                                            <span>1* <i class="icofont-taka"></i>68000</span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="button" onclick=""><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-footer">
                                    <div class="subtotal">
                                        <p>Sub Total : <span>100000</span></p>
                                    </div>
                                    <div class="cart-button">
                                        <a href="{{url('')}}" class="cart-checkout">Check Out</a>
                                        <a href="{{url('/cartpage')}}" class="my-cart">My Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="login-register">
                        @if(auth()->check())
                            <a href="{{route('myAccount')}}" class="sign-in">My Account</a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sign-up">Log Out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        @else

                        <a href="{{url('login')}}" class="sign-in">Sign In</a>
                        <a href="{{url('register')}}" class="sign-up">Sign Up</a>
                            @endif
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Navbar -->
                <div class="mega-menu">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li class="sub-item">
                            <a class="has-sub" href="">Abc</a>
                            <div class="sub-menu">
                                <ul>
                                    <li>
                                        <a href="">Sub Menu</a>
                                        <ul class="has-child">
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li>
                                        <a href="">Sub Menu</a>
                                    </li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a></li>
                                    <li><a href="">Sub Menu</a>

                                        <ul class="has-child">
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                            <li><a href="">Sub menu item</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{url('category')}}">Category Page</a></li>
                        <li><a href="{{url('single')}}">Single Page</a></li>
                        <li><a href="">Form</a></li>
                        <li><a href="">Form</a></li>
                        <li><a href="">Form</a></li>
                        <li><a href="">Form</a></li>
                    </ul>
                </div>
                <!-- Navbar -->
            </div>
        </div>
    </div>
</div>