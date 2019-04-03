@extends('backEnd.templateParts.master')

@section('title','Edit Product')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Basic Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('\')}}">Home</a>
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
                                <div class="col-lg-3 form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="product_category" id="product_category" onchange="goToSub(this.value)">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>Select Sub-Category</label>
                                    <select class="form-control" name="product_brand" id="subCategory">
                                        @foreach($subCategories as $sub_cat)
                                            <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>Select Brand</label>
                                    <select class="form-control" name="product_brand" id="product_brand">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
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
                                    <label>Product Color</label>
                                    <input type="text" name="product_color" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group control-label">
                                    <label>Product Price</label>
                                    <input type="text" name="product_price" class="form-control">
                                </div>
                                <div class="col-lg-6 form-group control-label">
                                    <label>Special Price</label>
                                    <input type="text" name="product_special_price" class="form-control">
                                </div>
                                <div class="col-lg-12 form-group control-label">
                                    <label>Product Description </label>
                                    <textarea type="text" name="product_description" class="form-control" style="width: 100%; height: 200px"></textarea>
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