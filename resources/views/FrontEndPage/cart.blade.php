@php

$all= session('return_data');



@endphp

@extends('FrontEndPage.templateParts.master')


@section('title','My Cart')


@section('content')
    <div class="page-badge mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="mycart-page">
        <div class="container">
            <div class="row justify-content-between">

                @if($all != null)

                <div class="col-lg-12">
                    <div class="mycart-page-head py-2">
                        <div class="mycart-heading">
                            <i class="icofont-shopping-cart"></i>
                            <span>Shopping Cart</span>
                        </div>
                        <div class="mycart-heading-button">
                            <a class="processed-to-checkout" href="{{url('/checkout')}}">Proceed To Check Out</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <table class="table mycart-page-table">
                        <tbody>
                        <tr>
                            <td class="mycart-table-head" width="15%">Product Image</td>
                            <td class="mycart-table-head" width="50%">Product Name</td>
                            <td class="mycart-table-head" width="15%">Unit Price</td>
                            <td class="mycart-table-head" width="5%">Qty</td>
                            <td class="mycart-table-head" width="15%">Subtotal</td>
                        </tr>
                        @php $i =0; @endphp
                        @foreach($all as $value)

                        <tr id="cart-table-{{$i}}">
                            <td width="15%">
                                <div class="selected-product-image">
                                    <img src="{{asset('storage/upload/product_image/'.$value['product_image'])}}" class="img-fluid" alt="image">
                                </div>
                            </td>
                            <td width="50%">
                                <h5>{{$value['product_name']}}</h5>
                                <span class="selected-product-color">Color : {{$value['product_color']}}</span>
                                <br>
                                <span class="selected-product-remove" onclick="remove_cart_product({{$i}})">Remove</span>
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-price" id="price-{{$value['product_id']}}">{{$value['product_price']}}</span>
                            </td>
                            <td width="5%">
                                <input type="text" name="qty" class="form-control" value="{{$value['product_quantity']}}" onkeyup="update_my_cart_qty(this,{{$i}})" id="{{$value['product_id']}}">
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-subtotal-price" id="mycart-single_prodct_total_{{$value['product_id']}}">{{$value['product_quantity'] * $value['product_price']}}</span>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-3">
                    <a class="processed-to-checkout d-block text-center" href="{{url('/')}}">Continue Shopping</a>
                </div>

                <div class="col-lg-3 pb-5">
                    <div class="order-total">
                        <div class="order-total-head">
                            <h4>Order Total</h4>
                        </div>
                        <div class="order-total-body">
                            <h6>Order Summery</h6>
                            <div class="sub-total-checkout mb-3">
                                <span class="mr-4 ">SubTotal </span>: <i class="icofont-taka"></i><span id="my-cart-subtotal"></span>
                            </div>
                            <div class="discount-order-total mb-3">




                                <span class="mr-4 ">Discount</span>: <i class="icofont-taka"></i><span id="coupon-discount">0</span>
                            </div>
                            <div class="total-checkout mb-3">
                                <span class="mr-5 ">Total </span>: <i class="icofont-taka"></i><span id="mycart-total"></span>
                            </div>

                            <div class="apply-coupon mb-3">
                                <input type="text" name="coupon" id="coupon-name" class="form-control" placeholder="Apply The Coupon">
                                <button type="button" class="apply-coupon-button" onclick="apply_coupon()">Apply</button>
                            </div>
                            <a class="processed-to-checkout d-block text-center" href="{{url('/checkout')}}">Proceed To Check Out</a>
                        </div>
                    </div>
                </div>
                @else
                    <h3 class="mycart-message">You didn't select any cart yet</h3>
                @endif
            </div>
        </div>
    </div>

    @endsection


@section('scripts')

    <script>

        function update_my_cart_qty(val,indx){

            var p_id =val.id;
            var qty = val.value;


            var price = $('#price-'+p_id).text();

            var c = parseInt(price)*qty;


            $('#mycart-single_prodct_total_'+p_id).text(c);

            var b = $('.selected-product-subtotal-price');

            total =0;
            $.each(b, function (i,cv) {
                total+= parseInt($(cv).text());
            });

            $('#my-cart-subtotal').text(total);
            $('#mycart-total').text(total);


            $.ajax({

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/updateCart')}}" + "/" + indx,
                type: 'GET',

                data: {
                    'product_quantity': qty,
                    'product_id': p_id,
                },

                success: function (response) {
                    console.log(response);
                }
            });



        }


        var b = $('.selected-product-subtotal-price');

        total =0;
        $.each(b, function (i,cv) {
            total+= parseInt($(cv).text());
        });

        $('#my-cart-subtotal').text(total);
        $('#mycart-total').text(total);


    </script>

    <script>

        function apply_coupon() {

            var coupon_name = $('#coupon-name').val();

            var total= parseInt($('#mycart-total').text());

            $.ajax({

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/apply_coupon')}}"+"/"+coupon_name,
                type: 'GET',

                data:{
                    'total': total
                },


                success: function (response) {
                    $('#coupon-discount').text(response);

                    var discount_amount = parseInt(response);

                    after_total = parseInt($('#my-cart-subtotal').text()) - discount_amount;

                    $('#mycart-total').text(after_total);

                    document.cookie = `sub_total = ${after_total}`;
                    document.cookie = `coupon = ${coupon_name}`;
                    document.cookie = `discount_amount = ${discount_amount}`;

                    console.log(document.cookie);

                    @php
                        if (isset($_COOKIE['sub_total']) && isset($_COOKIE['coupon']) && isset($_COOKIE['discount_amount'])){
                            session()->put('sub_total',$_COOKIE['sub_total']);
                            session()->put('coupon',$_COOKIE['coupon']);
                            session()->put('discount_amount',$_COOKIE['discount_amount']);
                        }
                    @endphp

                    location.reload();
                }
            });


        }

        @if(isset($_COOKIE['sub_total']) && isset($_COOKIE['coupon']) && $_COOKIE['discount_amount'])
        var x ="{{$_COOKIE['sub_total']}}";
        var y ="{{$_COOKIE['coupon']}}";
        var z ="{{$_COOKIE['discount_amount']}}";

        $('#mycart-total').text(x);
        $('#coupon-name').text(y);
        $('#coupon-discount').text(z);

        @endif

    </script>

    @endsection
