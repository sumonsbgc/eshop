@php
$cart_all_data = session('return_data');
$total_amount = session('sum');
$total_quantity =session('quantity');
// dd($cart_all_data);
@endphp
<div class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cart-and-auth clearfix mobile-cart-auth">
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
                    <div class="translate_help_section">
                        <form style="display: inline-block;">
                            <ul class="language">
                                <li>
                                    @if(app()->getLocale() === 'en')
                                    <a href="{{ url('lang/en') }}"><img src="{{ asset('FrontEndPageResource/image/english.png') }}" /></a>
                                    @else
                                    <a href="{{ url('lang/bn') }}"><img src="{{ asset('FrontEndPageResource/image/bangla.png') }}" /></a>
                                    @endif
                                    <ul class="lang-dropdown">
                                        <li class="@if(app()->getLocale() === 'en' ) {{ 'active' }} @endif">  
                                            <a href="{{ url('lang/en') }}"><img src="{{ asset('FrontEndPageResource/image/english.png') }}" /></a></li>
                                        <li class="@if(app()->getLocale() === 'bn' ) {{ 'active' }} @endif">
                                            <a href="{{ url('lang/bn') }}"><img src="{{ asset('FrontEndPageResource/image/bangla.png') }}" /></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </form>
                    </div>
                    
                </div>
                <div class="site-logo text-center">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('FrontEndPageResource/image/dadabangla.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 justify-content-center align-self-center text-left py-2">
                <div class="site-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('FrontEndPageResource/image/dadabangla.png')}}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-sm-5 text-center">
                <div class="search-option">
                    <div class="form">
                        <form action="{{ route('search') }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <input type="search" class="form-control" name="key" placeholder="Search Here...." value="{{ old('key') }}">
                                <button type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 text-right py-2">
                <div class="cart-and-auth">
                    <div class="shopping-cart">
                        <div class="cart">
                            <i class="icofont-shopping-cart"></i>
                                <span class="badge badge-secondary" id="t-quantity">
                                    @if($total_quantity != null && $total_quantity > 0)
                                        {{$total_quantity}}
                                    @endif
                                </span>

                            <div class="cart-body">
                                <div class="cart-product-list" id="cart-product-list">
                                    @if($cart_all_data !=null)
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($cart_all_data as $cart_data)

                                    <div class="cart-product mb-3" id="cart-{{$i}}">
                                        <div class="cart-product-image">
                                            <img src="{{asset('storage/upload/product_image/'.$cart_data['product_image'])}}" alt="image" class="img-fluid">
                                        </div>
                                        <div class="cart-product-details">
                                            <h5>{{$cart_data['product_name']}}</h5>
                                            <p>Color : {{$cart_data['product_color']}}</p>
                                            <span>
                                                <p class="d-inline quantities" id="quantities">{{$cart_data['product_quantity']}}</p> *<i class="icofont-taka"></i>{{$cart_data['product_price']}}
                                            </span>
                                            <span class="total-sub-amount">Total : <i class="icofont-taka"></i><span id="total-sub-amount" class="t-sub-amnt">{{$cart_data['product_price']*$cart_data['product_quantity']}}</span></span>
                                        </div>
                                        <div class="cart-product-remove">
                                            <button type="button" onclick="remove_cart_product({{$i}})"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>

                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach

                                    @else
                                    <h6 class="cart-message">You Don't cart any product yet</h6>
                                    @endif
                                </div>
                                <div class="cart-footer">
                                    <div class="subtotal">
                                        <p>Sub Total : <span id="total_sum">

                                                @if($total_amount != null)
                                                {{$total_amount}}
                                                @else
                                                {{0}}
                                                @endif
                                            </span></p>
                                    </div>
                                    <div class="cart-button">
                                        <a href="{{url('/checkout')}}" class="cart-checkout">Check Out</a>
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
                    <div class="translate_help_section">
                        <ul class="need_help_link">
                            <li>
                                <a href="{{url('/contact-us')}}" class="need_help">
                                    Need Help                           
                                </a>
                                <ul class="need_help_menu">
                                    <li><a href="/returns-replacement">Returns and Replacement</a></li>
                                    <li><a href="/warranty-policy">Warranty policy</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="/cookie-policy">Cookie Policy</a></li>
                                    <li><a href="/contact-us">Contact us</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form style="display: inline-block;">
                            <!--<div id="lang_options" data-input-name="country" data-selected-country="US"></div>-->
                            <ul class="language">
                                <li>
                                    @if(app()->getLocale() === 'en')
                                    <a href="{{ url('lang/en') }}"><img src="{{ asset('FrontEndPageResource/image/english.png') }}" /> English</a>
                                    @else
                                    <a href="{{ url('lang/bn') }}"><img src="{{ asset('FrontEndPageResource/image/bangla.png') }}" /> Bangla</a>
                                    @endif
                                    
                                    <ul class="lang-dropdown">
                                        <li class="@if(app()->getLocale() === 'en' ) {{ 'active' }} @endif">  
                                            <a href="{{ url('lang/en') }}"><img src="{{ asset('FrontEndPageResource/image/english.png') }}" /> English</a></li>
                                        <li class="@if(app()->getLocale() === 'bn' ) {{ 'active' }} @endif">
                                            <a href="{{ url('lang/bn') }}"><img src="{{ asset('FrontEndPageResource/image/bangla.png') }}" /> Bangla</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="responsive_menu clearfix">
    
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Navbar -->
                <div id="menu-wrapper">

                    <ul class="nav" id="db_nav_menu">
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>
                            <a href="{{ url('categories') }}">@lang('category.all_categories')</a>
                            <div>
                                <div class="nav-column">
                                    <h3><a href="{{ url('category', 'Jewelry') }}">@lang('category.jewelry')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Necklace st') }}">{{ __('Necklace st') }}</a></li>
                                        <li><a href="{{ url('category', 'Earrings') }}">{{ __('Earrings') }}</a></li>
                                        <li><a href="{{ url('category', 'Rings') }}">{{ __('Rings') }}</a></li>
                                        <li><a href="{{ url('category', 'Anklet') }}">{{ __('Anklet') }}</a></li>
                                        <li><a href="{{ url('category', 'Locket Pen dust') }}">{{ __('Locket Pen dust') }}</a></li>
                                        <li><a href="{{ url('category', 'Fair Sticks') }}">{{ __('Fair Sticks') }}</a></li>
                                        <li><a href="{{ url('category', 'Bracelet') }}">{{ __('Bracelet') }}</a></li>
                                        <li><a href="{{ url('category', 'Bras less') }}">{{ __('Bras less') }}</a></li>
                                        <li><a href="{{ url('category', 'Nose Pin') }}">{{ __('Nose Pin') }}</a></li>
                                        <li><a href="{{ url('category', 'Jewelry Box') }}">{{ __('Jewelry Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Stone Jewelry') }}">{{ __('Stone Jewelry') }}</a></li>
                                    </ul>
                                    <h3><a href="{{ url('category', 'Entertainment') }}">@lang('category.entertainment')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Bye Cycle') }}">{{ __('Bye Cycle') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Sofa') }}">{{ __('Inflatable Sofa') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Chair') }}">{{ __('Inflatable Chair') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Bathtub') }}">{{ __('Inflatable Bathtub') }}</a></li>
                                    </ul>

                                </div>
                                <div class="nav-column">
                                    <h3><a href="{{ url('category', 'Mobile') }}">@lang('category.mobile')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Samsung') }}">{{ __('Samsung') }}</a></li>
                                        <li><a href="{{ url('category', 'Huawei') }}">{{ __('Huawei') }}</a></li>
                                        <li><a href="{{ url('category', 'Xiomi') }}">{{ __('Xiomi') }}</a></li>
                                        <li><a href="{{ url('category', 'Mei8u') }}">{{ __('Mei8u') }}</a></li>
                                        <li><a href="{{ url('category', 'Vivo') }}">{{ __('Vivo') }}</a></li>
                                        <li><a href="{{ url('category', 'Oppo') }}">{{ __('Oppo') }}</a></li>
                                    </ul>

                                    <h3><a href="{{ url('category', 'Kids') }}">@lang('category.kids')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Boys') }}">{{ __('Boys') }}</a></li>
                                        <li><a href="{{ url('category', 'Girls') }}">{{ __('Girls') }}</a></li>
                                    </ul>
                                    
                                    <h3><a href="{{ url('category', 'Toys') }}">@lang('category.toys')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Electronics Toys') }}">{{ __('Electronics Toys') }}</a></li>
                                        <li><a href="{{ url('category', 'Manual Toys') }}">{{ __('Manual Toys') }}</a></li>
                                        <li><a href="{{ url('category', 'Educational Toys') }}">{{ __('Educational Toys') }}</a></li>
                                    </ul>
                                </div>                
                                <div class="nav-column">
                                    <h3><a href="{{ url('category', 'Men') }}">@lang('category.men')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Belt') }}">{{ __('Belt') }}</a></li>
                                        <li><a href="{{ url('category', 'Wallet') }}">{{ __('Wallet') }}</a></li>
                                        <li><a href="{{ url('category', 'Shirt') }}">{{ __('Shirt') }}</a></li>
                                        <li><a href="{{ url('category', 'T-Shirt') }}">{{ __('T-Shirt') }}</a></li>
                                        <li><a href="{{ url('category', 'Shoes') }}">{{ __('Shoes') }}</a></li>
                                        <li><a href="{{ url('category', 'Bag') }}">{{ __('Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Jewelry') }}">{{ __('Jewelry') }}</a></li>
                                        <li><a href="{{ url('category', 'Mobile') }}">{{ __('Mobile') }}</a></li>
                                    </ul>
                                    <h3><a href="{{ url('category', 'Sports') }}">@lang('category.sports')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Football') }}">{{ __('Football') }}</a></li>
                                        <li><a href="{{ url('category', 'Swimming Glass') }}">{{ __('Swimming Glass') }}</a></li>
                                        <li><a href="{{ url('category', 'Swimming Cap') }}">{{ __('Swimming Cap') }}</a></li>
                                        <li><a href="{{ url('category', 'Skating') }}">{{ __('Skating') }}</a></li>
                                        <li><a href="{{ url('category', 'Others') }}">{{ __('Others') }}</a></li>
                                    </ul>
                                </div>
                                <div class="nav-column">
                                    <h3><a href="{{ url('category', 'Women') }}">@lang('category.women')</a></h3>                                    
                                    <ul>
                                        <li><a href="{{ url('category', 'Vanity Bag') }}">{{ __('Vanity Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Purse') }}">{{ __('Purse') }}</a></li>
                                        <li><a href="{{ url('category', 'Shari') }}">{{ __('Shari') }}</a></li>
                                        <li><a href="{{ url('category', 'Three Piece') }}">{{ __('Three Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'Two Piece') }}">{{ __('Two Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'One Piece') }}">{{ __('One Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'Jamdani') }}">{{ __('Jamdani') }}</a></li>
                                        <li><a href="{{ url('category', 'Hand Sties') }}">{{ __('Hand Sties') }}</a></li>
                                    </ul>
                                    <h3><a href="{{ url('category', 'Electronics Devices') }}">@lang('category.electronic_devices')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'TV') }}">{{ __('TV') }}</a></li>
                                        <li><a href="{{ url('category', 'Ovan Freeze') }}">{{ __('Ovan Freeze') }}</a></li>
                                        <li><a href="{{ url('category', 'Computer') }}">{{ __('Computer') }}</a></li>
                                        <li><a href="{{ url('category', 'Iron') }}">{{ __('Iron') }}</a></li>
                                        <li><a href="{{ url('category', 'Air Driver') }}">{{ __('Air Driver') }}</a></li>
                                        <li><a href="{{ url('category', 'Shaver') }}">{{ __('Shaver') }}</a></li>
                                        <li><a href="{{ url('category', 'Others') }}">{{ __('Others') }}</a></li>
                                    </ul>
                                </div>
                                <div class="nav-column">
                                    <h3><a href="{{ url('category', 'Jute & Craft') }}">@lang('category.jute_craft')</a></h3>
                                    <ul>
                                        <li><a href="{{ url('category', 'Vanity Bag') }}">{{ __('Vanity Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Travel Bag') }}">{{ __('Travel Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Shopping Bag') }}">{{ __('Shopping Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Carrying Bag') }}">{{ __('Carrying Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Floor Mate') }}">{{ __('Floor Mate') }}</a></li>
                                        <li><a href="{{ url('category', 'Table Mate') }}">{{ __('Table Mate') }}</a></li>
                                        <li><a href="{{ url('category', 'Dining Table Runner') }}">{{ __('Dining Table Runner') }}</a></li>
                                        <li><a href="{{ url('category', 'Pen Holder') }}">{{ __('Pen Holder') }}</a></li>
                                        <li><a href="{{ url('category', 'Tissue Box') }}">{{ __('Tissue Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Ornament Box') }}">{{ __('Ornament Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Busket') }}">{{ __('Busket') }}</a></li>
                                        <li><a href="{{ url('category', 'Show Piece') }}">{{ __('Show Piece') }}</a></li>
                                    </ul>
                                </div>                            
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>
                            <a href="{{url('category', 'Jewelry')}}">@lang('category.jewelry')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Necklace st') }}">{{ __('Necklace st') }}</a></li>
                                        <li><a href="{{ url('category', 'Earrings') }}">{{ __('Earrings') }}</a></li>
                                        <li><a href="{{ url('category', 'Rings') }}">{{ __('Rings') }}</a></li>
                                        <li><a href="{{ url('category', 'Anklet') }}">{{ __('Anklet') }}</a></li>
                                        <li><a href="{{ url('category', 'Locket Pen dust') }}">{{ __('Locket Pen dust') }}</a></li>
                                        <li><a href="{{ url('category', 'Fair Sticks') }}">{{ __('Fair Sticks') }}</a></li>
                                        <li><a href="{{ url('category', 'Bracelet') }}">{{ __('Bracelet') }}</a></li>
                                        <li><a href="{{ url('category', 'Bras less') }}">{{ __('Bras less') }}</a></li>
                                        <li><a href="{{ url('category', 'Nose Pin') }}">{{ __('Nose Pin') }}</a></li>
                                        <li><a href="{{ url('category', 'Jewelry Box') }}">{{ __('Jewelry Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Stone Jewelry') }}">{{ __('Stone Jewelry') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>
                            <a href="{{url('category', 'Mobile')}}">@lang('category.mobile')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Samsung') }}">{{ __('Samsung') }}</a></li>
                                        <li><a href="{{ url('category', 'Huawei') }}">{{ __('Huawei') }}</a></li>
                                        <li><a href="{{ url('category', 'Xiomi') }}">{{ __('Xiomi') }}</a></li>
                                        <li><a href="{{ url('category', 'Mei8u') }}">{{ __('Mei8u') }}</a></li>
                                        <li><a href="{{ url('category', 'Vivo') }}">{{ __('Vivo') }}</a></li>
                                        <li><a href="{{ url('category', 'Oppo') }}">{{ __('Oppo') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Women')}}">@lang('category.women')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Vanity Bag') }}">{{ __('Vanity Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Purse') }}">{{ __('Purse') }}</a></li>
                                        <li><a href="{{ url('category', 'Shari') }}">{{ __('Shari') }}</a></li>
                                        <li><a href="{{ url('category', 'Three Piece') }}">{{ __('Three Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'Two Piece') }}">{{ __('Two Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'One Piece') }}">{{ __('One Piece') }}</a></li>
                                        <li><a href="{{ url('category', 'Jamdani') }}">{{ __('Jamdani') }}</a></li>
                                        <li><a href="{{ url('category', 'Hand Sties') }}">{{ __('Hand Sties') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Kids')}}">@lang('category.kids')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Boys') }}">{{ __('Boys') }}</a></li>
                                        <li><a href="{{ url('category', 'Girls') }}">{{ __('Girls') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Toys')}}">@lang('category.toys')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Electronics Toys') }}">{{ __('Electronics Toys') }}</a></li>
                                        <li><a href="{{ url('category', 'Manual Toys') }}">{{ __('Manual Toys') }}</a></li>
                                        <li><a href="{{ url('category', 'Educational Toys') }}">{{ __('Educational Toys') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Jute & Craft')}}">@lang('category.jute_craft')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Vanity Bag') }}">{{ __('Vanity Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Travel Bag') }}">{{ __('Travel Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Shopping Bag') }}">{{ __('Shopping Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Carrying Bag') }}">{{ __('Carrying Bag') }}</a></li>
                                        <li><a href="{{ url('category', 'Floor Mate') }}">{{ __('Floor Mate') }}</a></li>
                                        <li><a href="{{ url('category', 'Table Mate') }}">{{ __('Table Mate') }}</a></li>
                                        <li><a href="{{ url('category', 'Dining Table Runner') }}">{{ __('Dining Table Runner') }}</a></li>
                                        <li><a href="{{ url('category', 'Pen Holder') }}">{{ __('Pen Holder') }}</a></li>
                                        <li><a href="{{ url('category', 'Tissue Box') }}">{{ __('Tissue Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Ornament Box') }}">{{ __('Ornament Box') }}</a></li>
                                        <li><a href="{{ url('category', 'Busket') }}">{{ __('Busket') }}</a></li>
                                        <li><a href="{{ url('category', 'Show Piece') }}">{{ __('Show Piece') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Electronics Devices')}}">@lang('category.electronic_devices')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Earrings') }}">{{ __('TV') }}</a></li>
                                        <li><a href="{{ url('category', 'Ovan Freeze') }}">{{ __('Ovan Freeze') }}</a></li>
                                        <li><a href="{{ url('category', 'Computer') }}">{{ __('Computer') }}</a></li>
                                        <li><a href="{{ url('category', 'Iron') }}">{{ __('Iron') }}</a></li>
                                        <li><a href="{{ url('category', 'Air Driver') }}">{{ __('Air Driver') }}</a></li>
                                        <li><a href="{{ url('category', 'Shaver') }}">{{ __('Shaver') }}</a></li>
                                        <li><a href="{{ url('category', 'Others') }}">{{ __('Others') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Sports')}}">@lang('category.sports')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Football') }}">{{ __('Football') }}</a></li>
                                        <li><a href="{{ url('category', 'Swimming Glass') }}">{{ __('Swimming Glass') }}</a></li>
                                        <li><a href="{{ url('category', 'Swimming Cap') }}">{{ __('Swimming Cap') }}</a></li>
                                        <li><a href="{{ url('category', 'Skating') }}">{{ __('Skating') }}</a></li>
                                        <li><a href="{{ url('category', 'Others') }}">{{ __('Others') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
                        <li>
                            <i class="xs-show fas fa-angle-double-right"></i>                            
                            <a href="{{url('category', 'Entertainment')}}">@lang('category.entertainment')</a>
                            <div>                                                
                                <div class="nav-column">
                                    <ul>
                                        <li><a href="{{ url('category', 'Bye Cycle') }}">{{ __('Bye Cycle') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Sofa') }}">{{ __('Inflatable Sofa') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Chair') }}">{{ __('Inflatable Chair') }}</a></li>
                                        <li><a href="{{ url('category', 'Inflatable Bathtub') }}">{{ __('Inflatable Bathtub') }}</a></li>
                                    </ul>
                                </div>                                
                            </div>
                        </li>
	
                    </ul>
                
                </div>                
                <!-- Navbar -->
            </div>
        </div>
    </div>
</div>