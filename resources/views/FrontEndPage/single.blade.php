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
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-11.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-10.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-2.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-3.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-4.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-5.png')}}" class="img-fluid" alt="image"></li>
                                            <li><img src="{{asset('FrontEndPageResource/image/products/product-6.png')}}" class="img-fluid" alt="image"></li>
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
                                            <h3>Hp Laptop GH</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="product-availity">
                                            <span>Available : In Stock</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 pb-5">
                                        <div class="single-product-price">
                                            <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                            <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                            <span class="discount">-3%</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pb-5">
                                        <div class="product-color-option">
                                            <span>Color : Green</span>
                                            <div class="color-family">
                                                <ul>
                                                    <li><img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image"></li>
                                                    <li><img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image"></li>
                                                    <li><img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" class="img-fluid" alt="image"></li>
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
                                            <button type="button" class="product-add-to-cart">Add To Cart</button>
                                            <button type="button" class="product-buy-now">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                                        <div class="product-cart text-center recommended-item px-1">
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
                        </div>
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
                                            <h3>Hp Laptop GH</h3>
                                        </div>
                                        <div class="all-description pl-4">
                                            <ul>
                                                <li>Generation - 8th Gen</li>
                                                <li>Processor - Intel Core i5 8250U</li>
                                                <li>Processor Clock Speed - 1.60-3.40GHz</li>
                                                <li>Display Size - 14.1"</li>
                                                <li>RAM - 4GB</li>
                                                <li>RAM Type - DDR4</li>
                                                <li>Storage - 1TB HDD.</li>
                                            </ul>
                                        </div>
                                        <div class="product-description-image">
                                            <img src="{{asset('FrontEndPageResource/image/hp.jpg')}}" class="img-fluid" alt="image">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">

                                    <div class="specification p-4">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>SKU</td>
                                                <td>KJBMHVV3</td>
                                            </tr>
                                            <tr>
                                                <td>Graphics</td>
                                                <td>Intel HD Graphics</td>
                                            </tr>
                                            <tr>
                                                <td>CPU Speed</td>
                                                <td>2.5</td>
                                            </tr>
                                            <tr>
                                                <td>Ram</td>
                                                <td>4GB</td>
                                            </tr>
                                            <tr>
                                                <td>Hard Disk</td>
                                                <td>1TB</td>
                                            </tr>
                                            <tr>
                                                <td>Display</td>
                                                <td>19" LED</td>
                                            </tr>
                                            <tr>
                                                <td>Connectivity</td>
                                                <td>Intel® 802.11a/b/g/n/ac (1x1) Wi-Fi® and Bluetooth® 4.2 Combo</td>
                                            </tr>
                                            <tr>
                                                <td>Processor</td>
                                                <td>Core i3</td>
                                            </tr>
                                            <tr>
                                                <td>Battery mAh</td>
                                                <td>3-cell, 41 Wh Li-ion</td>
                                            </tr>
                                            </tbody>
                                        </table>
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
                                    <tr class="pb-5 single-person-comment">
                                        <td width="20%">Jhon Deo</td>
                                        <td>
                                            <table>
                                                <tbody class="ratting-table">
                                                <tr>
                                                    <th>Value</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </td>
                                        <td width="50%">

                                            <p class="mb-2 ratting-summery"><b>Good balance between price, performance and design</b></p>
                                            <p class="details-summery">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                        </td>
                                    </tr>
                                    <tr class="pb-5 single-person-comment">
                                        <td width="20%">Freddi Marcuri</td>
                                        <td>
                                            <table>
                                                <tbody class="ratting-table">
                                                <tr>
                                                    <th>Value</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </td>
                                        <td width="50%">

                                            <p class="mb-2 ratting-summery"><b>Good balance between price, performance and design</b></p>
                                            <p class="details-summery">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                        </td>
                                    </tr>
                                    <tr class="pb-5 single-person-comment">
                                        <td width="20%">Jhon Deo</td>
                                        <td>
                                            <table>
                                                <tbody class="ratting-table">
                                                <tr>
                                                    <th>Value</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td>
                                                        <div class="ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </td>
                                        <td width="50%">

                                            <p class="mb-2 ratting-summery"><b>Good balance between price, performance and design</b></p>
                                            <p class="details-summery">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 pb-5">
                            <div class="single-product-section-heading">
                                <h5>Write Your Own Review</h5>
                            </div>

                            <div class="write-own-comments">
                                <form action="" method="post">
                                    <span class="review-product-name">You're Reviewing: HP Laptop GH</span>
                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nick Name</label>
                                                <input type="text" name="nickname" class="form-control" value="jhon deo">
                                            </div>
                                            <div class="form-group">
                                                <label>Summery Of Your Review</label>
                                                <input type="text" name="summery" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Review</label>
                                                <textarea class="form-control" name="review"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product-review-table">
                                                <label>How do you rate this product? </label>

                                                <table class="data-table" id="product-review-table">
                                                    <thead>
                                                    <tr>
                                                        <th>&nbsp;</th>
                                                        <th><span class="nobr">1 star</span></th>
                                                        <th><span class="nobr">2 stars</span></th>
                                                        <th><span class="nobr">3 stars</span></th>
                                                        <th><span class="nobr">4 stars</span></th>
                                                        <th><span class="nobr">5 stars</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td class="value"><input type="radio" name="ratings[3]" id="Price_1" value="11" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[3]" id="Price_2" value="12" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[3]" id="Price_3" value="13" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[3]" id="Price_4" value="14" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[3]" id="Price_5" value="15" class="radio"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Value</th>
                                                        <td class="value"><input type="radio" name="ratings[2]" id="Value_1" value="6" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[2]" id="Value_2" value="7" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[2]" id="Value_3" value="8" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[2]" id="Value_4" value="9" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[2]" id="Value_5" value="10" class="radio"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quality</th>
                                                        <td class="value"><input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio"></td>
                                                        <td class="value"><input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="comment-btn">Comment</button>
                                </form>
                            </div>
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
                        <div class="best-sells-product">
                            <div class="product-image">
                                <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>HP Laptop GH</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (20)
                                </div>
                                <div class="best-sells-product-price">
                                    <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                    <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                </div>
                            </div>
                        </div>
                        <div class="best-sells-product">
                            <div class="product-image">
                                <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>HP Laptop GH</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (20)
                                </div>
                                <div class="best-sells-product-price">
                                    <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                    <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                </div>
                            </div>
                        </div>
                        <div class="best-sells-product">
                            <div class="product-image">
                                <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>HP Laptop GH</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (20)
                                </div>
                                <div class="best-sells-product-price">
                                    <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                    <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                </div>
                            </div>
                        </div>
                        <div class="best-sells-product">
                            <div class="product-image">
                                <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>HP Laptop GH</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (20)
                                </div>
                                <div class="best-sells-product-price">
                                    <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                    <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                </div>
                            </div>
                        </div>
                        <div class="best-sells-product">
                            <div class="product-image">
                                <img src="{{asset('FrontEndPageResource/image/products/product-1.png')}}" alt="image" class="img-fluid">
                            </div>
                            <div class="best-sells-product-details">
                                <h5>HP Laptop GH</h5>
                                <div class="ratting text-left">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    (20)
                                </div>
                                <div class="best-sells-product-price">
                                    <span class="old-price"><del><i class="icofont-taka"></i>70000</del></span>
                                    <span class="new-price"><i class="icofont-taka"></i>68000</span>
                                </div>
                            </div>
                        </div>
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

@endsection