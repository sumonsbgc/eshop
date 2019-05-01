@php

$sub_total = session('sub_total');
$discount_amounts = session('discount_amount');



$coupon = session('coupon');


@endphp
@extends('FrontEndPage.templateParts.master')


@section('title','Checkout')

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

    <div class="checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <form action="{{route('store_order')}}" method="post">
                            @csrf
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"> Your Address </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="checkout_name" placeholder="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Mobile no</label>
                                            <input type="text" name="phone" class="form-control" id="checkout_mobile_no" placeholder="Mobile No" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" name="address" id="checkout_addr" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address}}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">State</label>
                                            <input type="text" name="state" class="form-control" id="checkout_state" value="{{\Illuminate\Support\Facades\Auth::user()->state}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">City</label>
                                            <input type="text" name="city" class="form-control" id="checkout_city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="button" id="continue_to_shipping" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    Shipping Method
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping_method" onclick="shipping_method_check(this)" value="regular" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Regular Shipping(<i class="icofont-taka"></i>80)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="shipping_method" onclick="shipping_method_check(this)" value="office_collection">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Office Collection
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Back
                                    </button>
                                    <button class="btn btn-primary" type="button" id="continue_to_payment" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Continue
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    Payment Information
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_option" value="cash" onclick="change_payment_method(this)" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Cash On Delivery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_option" value="bkash" onclick="change_payment_method(this)">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        bKash Payment
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Back
                                    </button>
                                    <button class="btn btn-primary" type="button" id="continue_to_review" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Continue
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    Order Review
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table mycart-page-table">
                                        <tbody>
                                        <tr>
                                            <td class="mycart-table-head" width="15%">Product Image</td>
                                            <td class="mycart-table-head" width="50%">Product Name</td>
                                            <td class="mycart-table-head" width="15%">Unit Price</td>
                                            <td class="mycart-table-head" width="5%">Qty</td>
                                            <td class="mycart-table-head" width="15%">Subtotal</td>
                                        </tr>
                                        @php $i =0;

                                            $all = session('return_data');
                                        @endphp
                                        @foreach($all as $value)
                                            <input type="hidden" name="pro_id[]" value="{{$value['product_id']}}">
                                            <input type="hidden" name="pro_color[]" value="{{$value['product_color']}}">
                                            <input type="hidden" name="pro_quantity[]" value="{{$value['product_quantity']}}">
                                            @if(isset($value['product_size']))
                                                <input type="hidden" name="pro_size" value="{{$value['product_size']}}">
                                                @endif
                                            <tr id="cart-table-{{$i}}">
                                                <td width="15%">
                                                    <div class="selected-product-image">
                                                        <img src="{{asset('storage/upload/product_image/'.$value['product_image'])}}" class="img-fluid" alt="image">
                                                    </div>
                                                </td>
                                                <td width="50%">
                                                    <h5>{{$value['product_name']}}</h5>
                                                    <span class="selected-product-color">Color : {{$value['product_color']}}</span>
                                                </td>
                                                <td width="15%">
                                                    <i class="icofont-taka"></i><span class="selected-product-price" id="price-{{$value['product_id']}}">{{$value['product_price']}}</span>
                                                </td>
                                                <td width="5%">
                                                    <input type="text" name="qty" class="form-control" value="{{$value['product_quantity']}}" onkeyup="update_my_cart_qty(this)" id="{{$value['product_id']}}" readonly>
                                                </td>
                                                <td width="15%">
                                                    <i class="icofont-taka"></i><span class="selected-product-subtotal-price" id="mycart-single_prodct_total_{{$value['product_id']}}">{{$value['product_quantity'] * $value['product_price']}}</span>
                                                </td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-3 pb-5">
                                            <div class="order-total">
                                                <div class="order-total-head">
                                                    <h4>Order Total</h4>
                                                </div>
                                                <div class="order-total-body">
                                                    <div class="sub-total-checkout mb-3">
                                                        <span class="mr-5 pr-2">SubTotal </span>: <i class="icofont-taka"></i><span id="my-cart-subtotal">
                                                            {{--@if($sub_total != null)--}}
                                                                {{--{{$sub_total}}--}}
                                                            {{--@endif--}}
                                                        </span>
                                                    </div>
                                                    <div class="shipping-fee mb-3" id="shipping_fees">
                                                        <span class="mr-4 pr-1">Shipping Fee</span>:<i class="icofont-taka"></i>

                                                        <span id="shipping_fee">80</span>
                                                        <input type="hidden" name="shipping_fee" value="80">
                                                    </div>
                                                    <div class="discount-order-total mb-3">
                                                        <span class="mr-1 pr-1">Discount Amount</span>:<i class="icofont-taka"></i>

                                                        <span id="discount_amount">
                                                            @if($discount_amounts != null)
                                                                {{$discount_amounts}}

                                                            @else
                                                                {{0}}
                                                                @endif

                                                        </span>
                                                        <input type="hidden" name="discount_amount" value="@if($discount_amounts !=null) {{$discount_amounts}} @endif">
                                                        <input type="hidden" name="coupon" value="@if($coupon !=null) {{$coupon}} @endif">
                                                    </div>
                                                    <div class="total-checkout mb-3">
                                                        <span class="mr-5 pr-4">Total </span>: <i class="icofont-taka"></i><span id="mycart-total"></span>
                                                        <input type="hidden" value="" id="mycart-total-input" name="total_payment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Back
                                            </button>

                                            <button class="btn btn-danger" type="submit" id="cash_payment">Proceed To CheckOut</button>
                                            <button class="btn btn-danger" type="button" data-toggle="modal" id="bkash_payment" data-target="#exampleModal">Proceed To CheckOut</button>



                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Mobile No</label>
                                                                <input type="number" name="bkash_mobile_no" class="form-control" placeholder="01xxxxxxxxx">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Transaction ID</label>
                                                                <input type="text" name="transaction_id" class="form-control" placeholder="TRXID">
                                                            </div>


                                                            <div class="form-group text-center">
                                                                <input type="checkbox" name="agree" id="agree"><span>I agree with the trems & condition</span>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Check Out</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection


@section('scripts')

    <script>

        $(document).ready(function (){
            validate();
            $('#checkout_name, #checkout_mobile_no, #checkout_addr, #checkout_state, #checkout_city').change(validate);
        });

        function validate(){
            if ($('#checkout_name').val().length   >   0   &&
                $('#checkout_mobile_no').val().length  >   0   &&
                $('#checkout_addr').val().length  >   0   &&
                $('#checkout_state').val().length  >   0   &&
                $('#checkout_city').val().length    >   0) {
                $("#continue_to_shipping").prop("disabled", false);
            }
            else {
                $("#continue_to_shipping").prop("disabled", true);
            }
        }




       var payment_info= $('input[name="payment_option"]').val();

       if (payment_info == 'cash'){
            $('#bkash_payment').hide()
       }

       function change_payment_method(val) {

           var value = val.value;

           payment_info = value;

           if (payment_info == 'cash'){
               $('#bkash_payment').hide();
               $('#cash_payment').show();
           }else {
               $('#cash_payment').hide();
               $('#bkash_payment').show();
           }

       }



       var shipping = $('input[name="shipping_method"]').val();

       if (shipping != 'regular'){
           $('#shipping_fees').remove();
       }

       function shipping_method_check(val){
            var fee = val.value;

            shipping = fee;

            if (shipping != 'regular'){
                $('#shipping_fee').text(0);
            }else{
                $('#shipping_fee').text(80);
            }

           add_total_product_amount();
       }

       function add_total_product_amount() {
           var b = $('.selected-product-subtotal-price');

           sub_total =0;

           $.each(b, function (i,cv) {
               sub_total+= parseInt($(cv).text());
           });




           // if(sub != null){
           //     sub_total = parseInt(sub);
           // }else{
           //     $.each(b, function (i,cv) {
           //         sub_total+= parseInt($(cv).text());
           //     });
           // }

           var shipping_fee = $('#shipping_fee').text();

           var discount_amount = parseInt($('#discount_amount').text());


           var total =(sub_total + parseInt(shipping_fee)) - discount_amount;


           $('#my-cart-subtotal').text(sub_total);
           $('#mycart-total').text(total);
           $('#mycart-total-input').val(total);
       }

       add_total_product_amount();




    </script>

    @endsection