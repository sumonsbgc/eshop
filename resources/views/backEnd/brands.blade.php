
@extends('backEnd.templateParts.master')


@section('title','Brands')


@section('content')





    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Brands</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Brands</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add Brand </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-inline" action="{{route('brands.store')}}" enctype="multipart/form-data" method="post">

                            @csrf

                            <div class="form-group" style="width: 100%;">
                                <input type="text" placeholder="Brand Name" name="name"
                                       class="form-control" style="width: 100%">
                            </div>
                            <div class="form-group m-t" style="width: 100%">
                                <label>Select Category</label>
                                <select style="width: 100%" class="form-control" name="category_id" id="product_category" onchange="goToSub(this.value)">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group m-t" style="width: 100%">
                                <label>Select Sub-Category</label>
                                <select style="width: 100%" class="form-control" name="category_id" id="subCategory">
                                    @foreach($subCategories as $sub_cat)
                                        <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="fileinput fileinput-new m-t" data-provides="fileinput">
                                <label class="block">Brand Image</label>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
    <span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                <span class="fileinput-filename"></span>
                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                            </div>
                            <button class="btn btn-primary m-t block" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Brand List <small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($all as $brand)

                                    <tr>
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td class="brand-image-column"><img src="{{asset('storage/upload/brands/'.$brand->image)}}" class="img-responsive brand-image" alt="image"></td>
                                        <td>
                                            <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$brand->id}}"><i class="fa fa-list"></i>
                                            </button>
                                            <button class="btn btn-success btn-circle" type="button"><i class="fa fa-link"></i>
                                            </button>

                                            <form class="form-inline inline" method="post" action="{{route('brands.destroy',$brand->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div id="modal-form{{$brand->id}}" class="modal fade" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <form role="form" enctype="multipart/form-data" class="form-inline" action="{{route('brands.update',$brand->id)}}" method="post">

                                                            @method('PATCH')
                                                            @csrf

                                                            <div class="form-group" style="width: 100%;">
                                                                <input type="text" placeholder="Category" name="name" value="{{$brand->name}}"
                                                                       class="form-control" style="width: 100%">
                                                            </div>
                                                            <div class="form-group" style="width: 100%;">
                                                                <img src="{{asset('storage/upload/brands/'.$brand->image)}}" style="width:150px; height: 100px" class="img-responsive">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="img_name" value="{{$brand->image}}">
                                                            </div>
                                                            <div class="fileinput fileinput-new m-t" data-provides="fileinput">
                                                                <label class="block">Brand Image</label>
                                                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
    <span class="fileinput-exists">Change</span><input type="file" name="image"/></span>
                                                                <span class="fileinput-filename"></span>
                                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                                            </div>

                                                            <button class="btn btn-primary m-t block" type="submit">Add</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection