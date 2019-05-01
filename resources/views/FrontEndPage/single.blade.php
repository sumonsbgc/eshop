@extends('FrontEndPage.templateParts.master')

@section('title','Single')
@section('content')
<div class="page-badge mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Single Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-section">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-image-slider">
                                <div class="exzoom hidden" id="exzoom">
                                    <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul'>
                                            @php
                                                $images = explode('|',$product->product_images);
                                            @endphp

                                            @foreach($images as $image)

                                            <li><img src="{{asset('storage/upload/product_image/'.$image)}}" class="img-fluid" alt="image"></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="thumbnail-img">
                                        <div class="exzoom_nav"></div>
                                        <p class="exzoom_btn">
                                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="icofont-rounded-left"></i> </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="icofont-rounded-right"></i> </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-view-details">
                                <div class="row pb-5">
                                    <div class="col-lg-8">
                                        <div class="product-name">
                                            <h3>{{$product->product_name}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="product-availity">
                                            @if($product->product_quantity >0)
                                                <span>Available : In Stock</span>
                                            @else
                                                <span>Available : Out Of Stock</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 pb-5">
                                        <div class="single-product-price">

                                            @if($product->product_special_price != null)

                                                <span class="old-price"><del><i class="icofont-taka"></i>{{$product->product_price}}</del></span>
                                                <span class="new-price"><i class="icofont-taka"></i>{{$product->product_special_price}}</span>

                                                <span class="discount">

                                                    @php
                                                        echo "-".$discount_parcent = round((100*($product->product_price - $product->product_special_price))/$product->product_price) ."%";
                                                    @endphp

                                                </span>

                                            @else
                                                <span class="new-price"><i class="icofont-taka"></i>{{$product->product_price}}</span>
                                            @endif



                                        </div>
                                    </div>
                                    <div class="col-2 text-right">
                                        <button class="wishlist-button" id="wishbtn" onclick="wishlist({{$product->id}})">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                    <div class="col-lg-12 pb-5">
                                        <div class="product-color-option">
                                            @php
                                                $colors = explode('|',$product->product_color);
                                                $images = explode('|',$product->product_images);
                                            @endphp
                                            <span>Color : <span id="p-color">{{$colors[0]}}</span></span>
                                            <div class="color-family">
                                                <ul>
                                                    @foreach($colors as $color)
                                                    <li id="{{$color}}" onclick="select_color(this)"><img src="{{asset('storage/upload/product_image/'.$images[0])}}" class="img-fluid" alt="image"></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pb-5">
                                        <div class="product-quantity">
                                            <span>Quantity : </span>
                                            <br>
                                            <div class="qty_cart">
                                                <div class="qty-ctl">
                                                    <button title="decrease" onclick="changeQty(0); return false;" class="decrease">decrease</button>
                                                </div>
                                                <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                                <div class="qty-ctl">
                                                    <button title="increase" onclick="changeQty(1); return false;" class="increase">increase</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="product-buttons">
                                            @if($product->product_quantity > 0)

                                            <button type="button" class="product-add-to-cart" onclick="addToCart({{$product->id}})">Add To Cart</button>
                                            <button type="button" class="product-buy-now" onclick="buynow({{$product->id}})">Buy Now</button>


                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(!is_null(get_products_by_cat_id($product->product_category)))
                        <div class="col-lg-12 pt-5 pb-3">
                            <div class="recommanded-product owl-demo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-product-section-heading">
                                            <h5>You May Also Like</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row syn-row justify-content-center  pb-3">
                                    <div class="col-md-12 all-recommended-product owl-carousel owl-theme px-0">
                                        @foreach(get_products_by_cat_id($product->product_category) as $prod)
                                            <div class="product-cart text-center recommended-item px-1">
                                                <a href="{{ url('singleProduct', $prod->id) }}">
                                                    @php
                                                        $images = explode('|',$product->product_images);
                                                    @endphp
                                                    <div class="product-image">
                                                        <img src="{{asset('storage/upload/product_image/'.$images[0])}}">
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
                                                    <a href=""><h4 class="product-name">{{ $prod->product_name }}</h4></a>
                                                    @if(isset($prod->product_special_price))
                                                        <span class="hot-deals-old-price"><del><i class="icofont-taka"></i> {{ $prod->product_price }}</del></span>
                                                        <span class="product-price hot-deals-new-price"><i class="icofont-taka"></i> {{ $prod->product_special_price }}</span>
                                                    @else
                                                        <span class="product-price"><i class="icofont-taka"></i> {{ $prod->product_price }}</span>
                                                    @endif
                                                </div>
                                            </div>                                            
                                        @endforeach                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12 py-5">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">

                                    <div class="description p-4">
                                        <div class="product-name mb-3">
                                            <h3>{{$product->product_name}}</h3>
                                        </div>
                                        <div class="all-description pl-4">
                                            @php
                                                printf(html_entity_decode($product->product_description),'UTF-8');
                                            @endphp
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">

                                    <div class="specification p-4">
                                        @php
                                                printf(html_entity_decode($product->product_specification),'UTF-8');
                                            @endphp
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 py-5">
                            <div class="customer-reviews">
                                <div class="single-product-section-heading">
                                    <h5>Customer Review</h5>
                                </div>
                                <table class="table table-borderless review-table">
                                    <tbody>
                                        @if(null !== get_reviews_by_product_id($product->id))                                        
                                        @foreach ( get_reviews_by_product_id($product->id) as $review )
                                                                                   
                                        <tr class="pb-5 single-person-comment">
                                            <td width="20%">
                                                <strong>{{ App\User::find($review->user_id)->name }}</strong>
                                                <p>{{ date('d F, Y', strtotime($review->created_at)) }}</p>                                                
                                                <div class="starts">
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($i <= $review->rating)
                                                        <a class="star fullStar" title="{{$i}}"></a>
                                                        @else
                                                        <a class="star" title="{{$i}}"></a>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </td>
                                            <td width="50%">
                                                <p class="details-summery">{{$review->review}}</p>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            {{ __('Still There is no review of this product') }}
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 pb-5">
                            <div class="single-product-section-heading">
                                <h5>Write Your Own Review</h5>
                            </div>

                            @auth
                            <div class="write-own-comments">
                                    <form action="{{ url('review') }}" method="post">
                                        @csrf
                                        <span class="review-product-name">You're Reviewing: HP Laptop GH</span>
                                        <div class="row my-4">
                                            <div class="col-lg-12">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="form-group">
                                                    <label>Review</label>
                                                    <textarea class="form-control" name="review" rows="6">{{ old('review') }}</textarea>
                                                </div>
                                                <div class="from-group">
                                                    <label>How do you rate this product?</label>
                                                    <div class="rating_container">
                                                        <input type="radio" name="rating" class="rating" value="1" />
                                                        <input type="radio" name="rating" class="rating" value="2" />
                                                        <input type="radio" name="rating" class="rating" value="3" />
                                                        <input type="radio" name="rating" class="rating" value="4" />
                                                        <input type="radio" name="rating" class="rating" value="5" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="comment-btn">Comment</button>
                                    </form>
                                </div>
                            @else
                                <div class="card">
                                    <div class="card-body">
                                        You have to <a href="{{route('login')}}">Login</a> Before Reviewing
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single-product-avg-review">
                    <div class="single-ave-review">
                        <span>Product Review</span>
                        <div class="ratting text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fa fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            (5)
                        </div>
                    </div>
                </div>
                <div class="payment-method">
                    <span>Payment Method</span>
                    <p>Cash On Delivery</p>
                    <p>bKash Online Payment</p>
                    <div class="payment-method-image text-center py-3">
                        <img src="{{asset('FrontEndPageResource/image/BKash_Limited_logo.png')}}" class="img-fluid">
                    </div>
                </div>

                <div class="best-seller">
                    <div class="best-seller-heading">
                        <h4>Best Sellers</h4>
                    </div>
                    <div class="best-seller-all-product">
                        
                    @foreach($best_sellers as $seller)
                        @php
                            $seller_data = get_best_seller($seller->product_id);
                        @endphp

                        <div class="best-sells-product">
                            <div class="product-image">

                                @php
                                    $images = explode('|',$seller_data->product_images)
                                @endphp

                                <img src="{{asset('storage/upload/product_image/'.$images[0])}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>{{$seller_data->product_name}}</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    {{--({{$seller->counting}})--}}
                                </div>
                                <div class="best-sells-product-price">

                                    @if($seller_data->product_special_price != null)

                                        <span class="old-price"><del><i class="icofont-taka"></i>{{$seller_data->product_price}}</del></span>
                                        <span class="new-price"><i class="icofont-taka"></i>{{$seller_data->product_special_price}}</span>
                                    @else
                                        <span class="new-price"><i class="icofont-taka"></i>{{$seller_data->product_price}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')


    <script type="text/javascript">

        $("#exzoom").exzoom({
            autoPlay: false,
        });
        $("#exzoom").removeClass('hidden')

    </script>

    <script>
        $('.all-recommended-product').owlCarousel({
            loop:true,
            nav:true,
            dots:false,
            margin:10,
            items:5,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    <script>
        function changeQty(val) {
            var range = val;
            var qty = parseInt($('#qty').val());
            if (range == 0){
                if (qty == 1){
                    $('#qty').val(1);
                } else{
                    qty = qty-1;
                    $('#qty').val(qty);
                }
            }else{
                qty = qty+1;
                $('#qty').val(qty);
            }
        }
    </script>
    <script>
        
        function select_color(e) {
            var color = e.id;

            $('#p-color').text(color);


        }
        
    </script>


@endsection