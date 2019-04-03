@extends('backEnd.templateParts.master')
@section('title','Show Product')
@section('content')
    {{--{{dd($oneProduct)}}--}}

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Basic Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index-2.html">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Basic Form</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>



    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label>Product Name</label>
                                <input type="text" disabled class="form-control" name="product_name" value="{{$product->product_name}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" disabled value="{{$product->cat_name}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control" disabled value="{{$product->brand_name}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Total Product Entry</label>
                                <input type="text" class="form-control" disabled value="{{$product->product_quantity}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Product Model</label>
                                <input type="text" class="form-control" disabled value="{{$product->product_model_no}}">
                            </div>
                            <div class="col-lg-4 form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" disabled value="{{$product->product_code}}">
                            </div>
                            <div class="col-lg-4 form-group control-label">
                                <label>Product Color</label><br>
                                {{--<input type="text" class="form-control" disabled value="{{$product->product_color}}">--}}
                                @php
                                    $colors = explode('|',$product->product_color);
                                @endphp
                                @foreach ($colors as $color)
                                    <div class="color" style="background-color: {{'#'.$color}}"></div>
                                @endforeach

                            </div>
                            <div class="col-lg-6 form-group control-label">
                                <label>Product Price</label>
                                <input type="text" class="form-control" disabled value="{{$product->product_price}}">
                            </div>
                            <div class="col-lg-6 form-group control-label">
                                <label>Special Price</label>
                                <input type="text" class="form-control" disabled value="{{$product->product_special_price}}">
                            </div>
                            <div class="col-lg-12 form-group control-label">
                                <label>Product Description </label>
                                <textarea type="text" class="form-control" name="product_description" class="form-control" style="width: 100%; height: 200px">{{$product->product_description}}</textarea>
                            </div>
                            <div class="col-lg-12 form-group control-label">
                                <label>Product Images </label>
                                <div class="image-box">

                                    @php
                                        $images = explode('|',$product->product_images);
                                    @endphp
                                    @foreach ($images as $img)
                                        <img src="{{asset('/storage/upload/product_image').'/'.$img}}" class="img-responsive col-lg-3">
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary">Edit Product</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection