@extends('backEnd.templateParts.master')
@section('title','New Page')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <h2>Add New Page</h2>
    </div>

    <div class="col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif       
    </div>
    <div class="col-sm-12">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>



<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" class="form-control" name="post_type" id="post_type" value="{{'page'}}">
                                <div class="col-lg-12 form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                                </div>

                                <div class="col-lg-12 form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{old('sub_title')}}">
                                </div>

                                <div class="col-lg-12 form-group control-label">
                                    <label for="post_content">Content</label>
                                    <textarea type="text" name="content" id="post_content" class="form-control" style="width: 100%; height: 200px">{{old('content')}}</textarea>
                                </div>

                                <div class="col-lg-12 form-group control-label">
                                    <label>Post Thumbnail </label>
                                    <input type="file" name="post_thumbnail" class="form-control">
                                </div>

                                {{-- <div class="col-sm-6 form-group">
                                    <label for="post_category">Category Name</label>
                                    <select class="form-control" name="post_category" style="width: 100%;">
                                        @foreach($category as $cate)
                                        <option value="{{old('post_category', $cate->name)}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="col-sm-6 form-group">
                                    <label for="post_category">Parent Post</label>
                                    <select class="form-control" name="post_category" style="width: 100%;">
                                        @foreach($category as $cate)
                                        <option value="{{old('post_category', $cate->name)}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="post_category">Post Status</label>
                                    <select class="form-control" name="post_status" style="width: 100%;">
                                        <?php $post_status = ['publish', 'draft'] ?>
                                        @foreach($post_status as $status)
                                        <option value="{{old('post_status', $status)}}">{{ucwords($status)}}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">New Page</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection