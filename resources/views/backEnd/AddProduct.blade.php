@extends('backEnd.templateParts.master')
@section('title','Add Product')
@section('content')



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

                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif

                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">



                            @csrf



                            <div class="row">



                                <div class="col-lg-12 form-group">

                                    <label>Product Name</label>

                                    <input type="text" class="form-control" name="product_name">

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Select Category</label>

                                    <select class="form-control" name="product_category" id="product_parent" onchange="goToSub(this.value)">

                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                            @endforeach

                                    </select>

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Select Sub-Category</label>

                                    <select class="form-control" name="product_category" id="subCategory" onchange="goToBrands(this.value)">

                                        @foreach($subCategories as $sub_cat)

                                            <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Select Brand</label>

                                    <select class="form-control" name="product_brand" id="product_brand">

                                        @foreach($brands as $brand)

                                            <option value="{{$brand->id}}">{{$brand->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Total Product Entry</label>

                                    <input type="text" name="product_quantity" class="form-control">

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Product Model</label>

                                    <input type="text" name="product_model_no" class="form-control">

                                </div>

                                <div class="col-lg-4 form-group">

                                    <label>Product Code</label>

                                    <input type="text" name="product_code" class="form-control">

                                </div>

                                <div class="col-lg-4 form-group control-label">

                                    <label>Product Price</label>

                                    <input type="text" name="product_price" class="form-control">

                                </div>

                                <div class="col-lg-4 form-group control-label">

                                    <label>Special Price</label>

                                    <input type="text" name="product_special_price" class="form-control">

                                </div>

                                <div class="col-lg-4 form-group control-label">

                                    <label>Product Size</label>

                                    <div>

                                    <label class="checkbox-inline i-checks">

                                        <input type="checkbox" name="product_size[]" value="M">M</label>

                                    <label class="checkbox-inline i-checks">

                                        <input type="checkbox" name="product_size[]" value="L">L</label>

                                    <label class="checkbox-inline i-checks">

                                        <input type="checkbox" name="product_size[]" value="XL">XL</label>

                                    <label class="checkbox-inline i-checks">

                                        <input type="checkbox" name="product_size[]" value="XXL">XXL</label>



                                    </div>

                                </div>

                                <div class="col-lg-12 form-group control-label">

                                    <label>Product Description </label>

                                    <textarea type="text" name="product_description" class="form-control" style="width: 100%; height: 200px"></textarea>

                                </div>



                                <div class="col-lg-12">

                                    <div class="row">

                                        <div class="form-group col-lg-12 contact-repeater">

                                            <div data-repeater-list="product_color" class="row">

                                                <div class="col-lg-3" data-repeater-item>

                                                    <label>Product Color</label>

                                                    <input type="text" name="product_color" class="form-control inline colorpicker-full" id="colorpicker-full1" value="fe9810" style="width: 90%">

                                                    <div class="input-group-append">

                                                <span class="input-group-btn" id="button-addon2">

                                                    <button class="btn btn-danger" type="button" data-repeater-delete><i

                                                                class="fa fa-times"></i></button>

                                                </span>

                                                    </div>

                                                </div>



                                            </div>



                                            <button type="button" data-repeater-create

                                                    class="btn btn-primary" id="more_color">

                                                <i class="icon-plus4"></i> Add More Color

                                            </button>





                                        </div>



                                    </div>

                                </div>



                                <div class="col-lg-12 form-group control-label">

                                    <label>Product Images </label>

                                    <input type="file" name="product_images[]" class="form-control" multiple>

                                </div>



                                <div class="col-lg-12">

                                    <button type="submit" class="btn btn-primary">Upload Product</button>

                                </div>



                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



    @endsection