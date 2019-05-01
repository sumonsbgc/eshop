@extends('backEnd.templateParts.master')





@section('title','Categories')





@section('content')











    <div class="row wrapper border-bottom white-bg page-heading">

        <div class="col-lg-10">

            <h2>All Categories</h2>

            <ol class="breadcrumb">

                <li>

                    <a href="{{url('/')}}">Home</a>

                </li>

                <li class="active">

                    <strong>Categories</strong>

                </li>

            </ol>

        </div>

        <div class="col-lg-2">



        </div>

    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

            <div class="col-lg-4">
                
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-title">
        
                                <h5>Category form <small>add category here</small></h5>
        
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
        
                                <form role="form" class="form-inline" action="{{route('categories.store')}}" method="post">
        
                                    @csrf
        
                                    <div class="form-group" style="width: 100%;">
                                        <input type="text" placeholder="Category" name="name" id="cat_name"
                                               class="form-control" style="width: 100%">
                                    </div>
        
                                    <div class="form-group m-t" style="width: 100%;">
                                        <input type="text" placeholder="Category Name In Bangla" name="bn_cat_name" id="bn_cat_name"
                                               class="form-control" style="width: 100%">
                                    </div>
        
                                    <div class="form-group" style="width: 100%;">
                                        <select class="form-control m-t" name="post_type" style="width: 100%;">
                                            <option value="post">Post</option>
                                            <option value="product">Product</option>
                                        </select>
                                    </div>

                                    <div class="form-group" style="width: 100%;">
                                        <input type="hidden" name="parent_status"
                                                class="form-control" style="width: 100%" value="0">
                                    </div>
        
                                    <button class="btn btn-primary mt-1" type="submit">Add</button>
        
                                </form>
        
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-title">
        
                                <h5>Sub-Category form <small>add sub-category here</small></h5>
        
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
        
                                <form role="form" class="form-inline" action="{{route('categories.store')}}" method="post">        
                                    @csrf
                                    <div class="form-group" style="width: 100%;">
                                        <input type="text" placeholder="Sub-Category" name="name" id="exampleInputEmail2"
                                               class="form-control" style="width: 100%">
                                    </div>
                                    <div class="form-group m-t" style="width: 100%;">
                                        <input type="text" placeholder="Sub Category Name In Bangla" name="bn_cat_name" id="bn_cat_name"
                                                class="form-control" style="width: 100%">
                                    </div>
                                    <div class="form-group" style="width: 100%;">
                                        <select class="form-control m-t" name="post_type" style="width: 100%;">
                                            <option value="post">Post</option>
                                            <option value="product">Product</option>
                                        </select>
                                    </div>
        
                                    <div class="form-group" style="width: 100%;">
                                        <select class="form-control m-t m-b" name="parent_status" style="width: 100%;">
                                            @foreach($parentLists as $parentlist)
                                            <option value="{{$parentlist->id}}">{{$parentlist->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                    <button class="btn btn-primary mt-1" type="submit">Add</button>
        
                                </form>
        
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        <h5>Category List <small>all category here</small></h5>

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

                            <th>Category Parents</th>

                            <th>Action</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($all as $category)



                        <tr>

                            <td>{{$category->id}}</td>

                            <td>{{$category->name}}</td>

                            <td class="parent-status" id="{{$category->parent_status}}">
                                
                                @php
                                    if ($category->parent_status == 0){
                                        echo "Main Category";
                                    }else{
                                        $name = get_category_name($category->parent_status);
                                        echo $name['name'];
                                    }

                                @endphp
                                
                            </td>

                            <td>

                                <button class="btn btn-primary btn-circle" type="button" data-toggle="modal" data-target="#modal-form{{$category->id}}"><i class="fa fa-list"></i>

                                </button>



                                <form class="form-inline inline" method="post" action="{{route('categories.destroy',$category->id)}}">

                                    @method('DELETE')

                                    @csrf

                                    <button class="btn btn-warning btn-circle" type="submit"><i class="fa fa-times"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>



                        <div id="modal-form{{$category->id}}" class="modal fade" aria-hidden="true">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <div class="modal-body">

                                        <div class="row">

                                            <form role="form" class="form-inline" action="{{route('categories.update',$category->id)}}" method="post">
                                                @method('PATCH')
                                                @csrf



                                                <div class="form-group" style="width: 100%;">
                                                    <label for="">Category Name</label>
                                                    <input type="text" placeholder="Category" name="name" value="{{$category->name}}"
                                                           class="form-control" style="width: 100%">
                                                </div>

                                                <div class="form-group m-t" style="width: 100%;">
                                                    <input type="text" placeholder="Category Name In Bangla" name="bn_cat_name" id="bn_cat_name"
                                                            class="form-control" style="width: 100%" value="{{$category->bn_cat_name}}">
                                                </div>
                                                
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="">Post Type</label>
                                                    {{ $category->post_type }}
                                                    <select class="form-control m-b" name="post_type" style="width: 100%;">
                                                        <?php $post_types = ['Post', 'Product'] ?>
                                                        @foreach($post_types as $type)
                                                            <option value="{{$type}}" @if(ucwords($type) === ucwords($category->post_type)) {{'selected'}} @endif>{{ $type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group" style="width: 100%;">
                                                    <label for="">Main Category</label>
                                                    <select class="form-control m-b" name="parent_status" style="width: 100%;">
                                                        <option value="0">{{'Main Category'}}</option>
                                                        @foreach($parentLists as $parentlist)
                                                            <option value="{{$parentlist->id}}" @if($parentlist->id == $category->parent_status) {{'selected'}} @endif>{{$parentlist->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button class="btn btn-primary mt-1" type="submit">Add</button>

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

                            <th>Category Parents</th>

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