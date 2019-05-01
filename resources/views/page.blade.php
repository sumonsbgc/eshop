@extends('FrontEndPage.templateParts.master')
@section("title", "| {$page->title}")


@section('content')
<div class="container py-sm-5 py-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @if($page->sub_title !== null && $page->sub_title !== "")
                <div class="card-header"><h4 class="text-center">{{ $page->title.' - '.$page->sub_title }}</h4></div>                    
                @else
                <div class="card-header"><h4 class="text-center">{{ $page->title }}</h4></div>
                @endif
                <div class="card-body">                    
                    @php
                        printf('%s',html_entity_decode($page->content));
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection