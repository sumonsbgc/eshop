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
            <div class="row justify-content-end">
                <div class="col-lg-12">
                    <div class="mycart-page-head py-2">
                        <div class="mycart-heading">
                            <i class="icofont-shopping-cart"></i>
                            <span>Shopping Cart</span>
                        </div>
                        <div class="mycart-heading-button">
                            <a class="processed-to-checkout" href="#">Proceed To Check Out</a>
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
                        <tr>
                            <td width="15%">
                                <div class="selected-product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image">
                                </div>
                            </td>
                            <td width="50%">
                                <h5>Hp Laptop GH</h5>
                                <span class="selected-product-color">Color : Dark Black</span>
                                <br>
                                <span class="selected-product-remove">Remove</span>
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-price">68000</span>
                            </td>
                            <td width="5%">
                                <input type="text" name="qty" class="form-control" value="1">
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-subtotal-price">68000</span>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <div class="selected-product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image">
                                </div>
                            </td>
                            <td width="50%">
                                <h5>Hp Laptop GH</h5>
                                <span class="selected-product-color">Color : Dark Black</span>
                                <br>
                                <span class="selected-product-remove">Remove</span>
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-price">68000</span>
                            </td>
                            <td width="5%">
                                <input type="text" name="qty" class="form-control" value="1">
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-subtotal-price">68000</span>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <div class="selected-product-image">
                                    <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image">
                                </div>
                            </td>
                            <td width="50%">
                                <h5>Hp Laptop GH</h5>
                                <span class="selected-product-color">Color : Dark Black</span>
                                <br>
                                <span class="selected-product-remove">Remove</span>
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-price">68000</span>
                            </td>
                            <td width="5%">
                                <input type="text" name="qty" class="form-control" value="1">
                            </td>
                            <td width="15%">
                                <i class="icofont-taka"></i><span class="selected-product-subtotal-price">68000</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 pb-5">
                    <div class="order-total">
                        <div class="order-total-head">
                            <h4>Order Total</h4>
                        </div>
                        <div class="order-total-body">
                            <h6>Order Summery</h6>
                            <div class="sub-total-checkout mb-3">
                                <span class="mr-4 ">SubTotal</span><span>: <i class="icofont-taka"></i> 245000</span>
                            </div>
                            <div class="discount-order-total mb-3">
                                {{--<span class="mr-4 ">Discount</span><span>: <i class="icofont-taka"></i>245000</span>--}}
                            </div>
                            <div class="total-checkout mb-3">
                                <span class="mr-5 ">Total </span><span>: <i class="icofont-taka"></i> 245000</span>
                            </div>

                            <div class="apply-coupon mb-3">
                                <input type="text" name="coupon" class="form-control" placeholder="Apply The Coupon">
                                <button type="button" class="apply-coupon-button">Apply</button>
                            </div>
                            <a class="processed-to-checkout d-block text-center" href="#">Proceed To Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection