@extends('FrontEndPage.templateParts.master')
@section('title','Category')

@section('content')

<div class="page-badge mb-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Library</li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>

</div>



<div class="category-filter my-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="filter-body py-5 px-3">

                    <h5 class="mb-3">Filter</h5>

                    <ul>

                        <li><button type="button" data-filter="all">All</button></li>

                        <li><button type="button" data-filter=".smart-phone">Smart Phone</button></li>

                        <li><button type="button" data-filter=".feature-phone">Feature Phone</button></li>

                        <li><button type="button" data-filter=".mobile-accessories">Mobile Accessories</button></li>

                    </ul>

                    <ul class="my-5">

                        <li><button type="button" data-filter=".apple"><img src="{{asset('FrontEndPageResource/image/brands/apple.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".samsung"><img src="{{asset('FrontEndPageResource/image/brands/samsung.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".nokia"><img src="{{asset('FrontEndPageResource/image/brands/nok.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".blackberry"><img src="{{asset('FrontEndPageResource/image/brands/blackberry.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".huawei"><img src="{{asset('FrontEndPageResource/image/brands/Huawei.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".asus"><img src="{{asset('FrontEndPageResource/image/brands/ASUS-logo.jpg')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".micromax"><img src="{{asset('FrontEndPageResource/image/brands/icromax.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".mi"><img src="{{asset('FrontEndPageResource/image/brands/mi.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".lava"><img src="{{asset('FrontEndPageResource/image/brands/lava.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".oneplus"><img src="{{asset('FrontEndPageResource/image/brands/one_plus.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".symphony"><img src="{{asset('FrontEndPageResource/image/brands/symphony.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".oppo"><img src="{{asset('FrontEndPageResource/image/brands/opp0.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".lenovo"><img src="{{asset('FrontEndPageResource/image/brands/lenovo.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".tecno"><img src="{{asset('FrontEndPageResource/image/brands/tecno-l.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".vivo"><img src="{{asset('FrontEndPageResource/image/brands/vivo-l.png')}}" class="img-fluid" alt="brand-image"></button></li>

                        <li><button type="button" data-filter=".we"><img src="{{asset('FrontEndPageResource/image/brands/we.png')}}" class="img-fluid" alt="brand-image"></button></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>



<div class="category-product">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="row">

                    <div class="col-lg-6">

                    </div>

                    <div class="col-lg-6 pb-3">

                        <div class="price-range">

                            <div id="left-price"><i class="icofont-taka"></i><span id="start-amount"></span></div>

                            <div id="right-price"><i class="icofont-taka"></i><span id="end-amount"></span></div>

                        </div>

                        <div id="slider-range"></div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row syn-row justify-content-center all-products-category">
                        
            @if(isset($products))
                @foreach ($products as $product )
                    <div class="col-md-15 col-sm-15 col-6 px-0 cat-page-item mix smart-phone nokia">
                        <div class="product-cart text-center">
                            <a href="{{ route('singleProductView', $product->id)}}">
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
                                <a href=""><h4 class="product-name">{{ $product->product_name }}</h4></a>
                                <span class="product-price"><i class="icofont-taka"></i> {{ $product->product_price }}</span>
                            </div>
                            <button type="button" class="product-btn">Buy Now</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card" style="100%">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>



        <div class="row">

            <div class="col-lg-12">

                <div class="row">

                    <div class="col-lg-6 pt-2 pb-5">

                        <div class="pagination-links">

                            <nav aria-label="Page navigation example">
                                @if(isset($products))
                                    {{ $products->links() }}
                                @endif
                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>



    </div>

</div>



@endsection





@section('scripts')

<script>

    var mixer = mixitup('.all-products-category');

</script>



<script>



    $( function() {

        $( "#slider-range" ).slider({

            range: true,

            min: 0,

            max: 500,

            values: [ 0, 300 ],

            slide: function( event, ui ) {

                $( "#start-amount" ).text( ui.values[ 0 ] );

                $( "#end-amount" ).text( ui.values[ 1 ] );

            }

        });

        $( "#start-amount" ).text( $( "#slider-range" ).slider( "values", 0 ));



        $('#end-amount').text($( "#slider-range" ).slider( "values", 1 ));



    } );

</script>



@endsection