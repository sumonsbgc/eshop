@extends('backEnd.templateParts.master')
@section('title', 'Menu')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title"><h4>Select a menu to edit:</h4></div>
                <div class="ibox-content">                    
                    <form action="{{ url('admin/change_menu') }}" class="form-horizontal" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-5">
                                <select name="menu_name" id="choose_menu_name" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->menu_name }}" @if(Session::get('menu_name') == $menu->menu_name) {{"selected"}} @endif >{{ $menu->menu_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <input type="submit" class="btn btn-primary btn-md" name="select_menu" value="Select">
                            </div>
                            <label class="col-sm-6">Don’t forget to save your changes! Click the Save Menu button to save your changes.</label>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">                            
            <div class="nav-column" style="background-color: #fff">
                <div id="accordion">
                    <form action="{{ url("admin/menu") }}" method="POST" id="addPageMenuForm">
                    <div class="group">
                        <h3>Pages</h3>
                        <div>
                            @csrf
                            @if(isset($pages))
                                @foreach ( $pages as $page)
                                    @if($loop->first)
                                        <input type="hidden" name="menu_type" value="page">
                                        <input type="hidden" name="menu_name" class="menu_name" value="">
                                    @endif
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="page_id" name="page_id[{{ $page->id }}]" value="{{ $page->id }}"> {{ $page->title }}</label>
                                    </div>
                                @endforeach
                            @else
                                <span>There is no pages</span>
                            @endif
                            <input type="submit" class="btn btn-primary btn-sm" name="addPage" id="addPage" value="Add Page">
                        </div>
                    </div>
                    </form>

                    <form action="{{ url("admin/menu") }}" method="POST" id="addCatMenuForm">          
                    <div class="group">
                        <h3>Categories</h3>
                        <div>
                            @csrf
                            @if(null !== getParentCategories() )
                                @foreach (getParentCategories() as $cat)
                                    @if($loop->first)
                                        <input type="hidden" name="menu_type" value="category">
                                        <input type="hidden" name="menu_name" class="menu_name" value="">
                                    @endif
                                    <div class="checkbox">
                                        <label><input type="checkbox" id="cat_id" name="cat_id[{{ $cat->id }}]" value="{{ $cat->id }}"> {{ $cat->name }}</label>
                                    </div>
                                    @if( null !== getChildCategories($cat->id))
                                        @foreach(getChildCategories($cat->id) as $child)
                                        <div class="checkbox" style="margin-left: 16px;">
                                            <label><input type="checkbox" name="cat_id[{{ $child->id }}]" value="{{ $child->id }}"> {{ $child->name }}</label>
                                        </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @else
                                <span>There is no categories available</span>
                            @endif
                            <input type="submit" class="btn btn-primary btn-sm" id="addCategory" name="addCategory" value="Add Category">
                        </div>
                    </div>
                    </form>                
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="ibox ibox-default">
                <form action="{{ url('admin/create_menu') }}" method="POST">
                    @csrf
                    <div class="ibox-title custom-ibox-title">
                        <div class="row">
                        <div class="col-sm-2">
                            <label class="control-label" for="menu_name">Menu Name</label>                        
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control menu_name" name="menu_name" type="text" value="{{ Session::get("menu_name") }}">
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-primary btn-md" name="addPage" value="Save Menu">
                        </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div id="accordion">                            
                        @php
                            $menu = get_the_menu_name(Session::get('menu_name'));
                        @endphp
                        @if(isset($menu))
                        @php
                            $page_id    = unserialize($menu->page_id);
                            $cat_id     = unserialize($menu->cat_id);
                        @endphp

                            @if($page_id)
                                @foreach ( $page_id as $id )
                                    @php
                                        $pages = get_the_pages($id);
                                    @endphp
                                    @if(isset($pages) && null !== $pages )
                                    <div class="group">
                                        <h3>{{ $pages->title }}</h3>
                                        <div>
                                            <input type="hidden" name="page_id[{{ $pages->id}}]" value="{{$pages->id}}">
                                            <div class="form-group">
                                                <label for="navigation_label">Navigation Label</label>
                                                <input type="text" class="form-control" name="navigation_label[{{ $pages->id }}]" id="navigation_label" value="{{ $pages->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="title_attributes">Title Attributes</label>
                                                <input type="text" class="form-control" name="title_attributes[{{ $pages->id }}]" id="title_attributes" value="">
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="new_tab[{{ $pages->id }}]"> Open link in a new tab </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="li_class">CSS li Classes</label>
                                                <input type="text" class="form-control" name="li_class[{{ $pages->id }}]"  id="li_class" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description[{{ $pages->id }}]" class="form-control" rows="4" id="description"></textarea>
                                            </div>
                                        </div>
                                    </div>                            
                                    @endif
                                @endforeach
                            @endif

                            @if(isset($cat_id)  && null !== $cat_id)
                                @foreach ( $cat_id as $id )                                    
                                    @php
                                        $pages = get_category_name($id);
                                    @endphp

                                    @if(isset($pages) && null !== $pages )
                                        <div class="group">
                                            <h3>{{ $pages->name }}</h3>
                                            <div>
                                                <input type="hidden" name="cat_id[{{ $pages->id}}]" value="{{$pages->id}}">
                                                <div class="form-group">
                                                    <label for="navigation_label">Navigation Label</label>
                                                    <input type="text" class="form-control" name="navigation_label[{{ $pages->id }}]" id="navigation_label" value="{{ $pages->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_attributes">Title Attributes</label>
                                                    <input type="text" class="form-control" name="title_attributes[{{ $pages->id }}]" id="title_attributes" value="">
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="new_tab[{{ $pages->id }}]"> Open link in a new tab </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="li_class">CSS li Classes</label>
                                                    <input type="text" class="form-control" name="li_class[{{ $pages->id }}]"  id="li_class" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description[{{ $pages->id }}]" class="form-control" rows="4" id="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                        </div>

                        <div id="accordion" class="menu_container"></div>                        
                    </div>
                    <div class="ibox-footer text-right">
                        <input type="submit" class="btn btn-primary btn-md" name="addMenu" value="Save Menu">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        (function($){
            function addMenu(menu, e){

                e.preventDefault();
                $("#addPage").prop("disabled", true);
                $("#addCategory").prop("disabled", true);

                if(menu === 'page'){
                    var formData = $("#addPageMenuForm").serializeArray();
                }else{
                    var formData = $("#addCatMenuForm").serializeArray();
                }

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{url('admin/menu')}}",
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        if( response.result === null ){
                            swal("You have to first Create a Menu name. Then You can assign menus");
                        }else{
                            var $html = '';
                            $.each(response, function(ind, menu){
                                if(menu.post_type == 'page'){
                                    $html += '<div class="group">'
                                    $html += `<h3> ${menu.title} </h3>`;
                                    $html += '<div>';
                                    $html += '<input type="hidden" name="page_id['+menu.id+']" value="'+ menu.id +'">';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="navigation_label">Navigation Label</label>';
                                    $html +=    '<input type="text" class="form-control" name="navigation_label['+menu.id+']" id="navigation_label" value="'+ menu.title +'">';
                                    $html += '</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="title_attributes">Title Attributes</label>';
                                    $html +='<input type="text" class="form-control" name="title_attributes['+ menu.id +']" id="title_attributes" value="">';
                                    $html +='</div>';
                                    $html += '<div class="checkbox">';
                                    $html +='<label><input type="checkbox" name="new_tab['+ menu.id +']"> Open link in a new tab </label>';
                                    $html +='</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="li_class">CSS li Classes</label>';
                                    $html +=' <input type="text" class="form-control" name="li_class['+ menu.id +']"  id="li_class" value="">';
                                    $html +='</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="description">Description</label>';
                                    $html +='<textarea name="description['+ menu.id +']" class="form-control" rows="4" id="description"></textarea>';
                                    $html +='</div>';
                                    $html += '</div>';
                                    $html += '</div>';
                                }else{
                                    $html += '<div class="group">';
                                    $html += `<h3> ${menu.name} </h3>`;
                                    $html += '<div>';
                                    $html += '<input type="hidden" name="cat_id['+menu.id+']" value="'+ menu.id +'">';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="navigation_label">Navigation Label</label>';
                                    $html +=    '<input type="text" class="form-control" name="navigation_label['+menu.id+']" id="navigation_label" value="'+ menu.name +'">';
                                    $html += '</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="title_attributes">Title Attributes</label>';
                                    $html +='<input type="text" class="form-control" name="title_attributes['+ menu.id +']" id="title_attributes" value="">';
                                    $html +='</div>';
                                    $html += '<div class="checkbox">';
                                    $html +='<label><input type="checkbox" name="new_tab['+ menu.id +']"> Open link in a new tab </label>';
                                    $html +='</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="li_class">CSS li Classes</label>';
                                    $html +=' <input type="text" class="form-control" name="li_class['+ menu.id +']"  id="li_class" value="">';
                                    $html +='</div>';
                                    $html +='<div class="form-group">';
                                    $html +='<label for="description">Description</label>';
                                    $html +='<textarea name="description['+ menu.id +']" class="form-control" rows="4" id="description"></textarea>';
                                    $html +='</div>';
                                    $html += '</div>';
                                    $html += "</div>";
                                }
                            });


                            $('.menu_container').accordion("destroy");

                            $('.menu_container').append($html).accordion({
                                collapsible: true,
                                active: false,
                                heightStyle: 'content',
                                header: 'h3',
                                icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" },
                            }).sortable({
                                items: '.group',
                            });

                            $('.menu_container').on('accordionactivate', function (event, ui) {
                                if (ui.newPanel.length) {
                                    $('.menu_container').sortable('disable');
                                } else {
                                    $('.menu_container').sortable('enable');
                                }
                            });
                        }
                    }
                });

                $(document).ajaxStop(function(){
                    $("#addPage").prop("disabled", false);
                    $("#addCategory").prop("disabled", false);                    
                });
            }
            
            $('#addPage').on("click", function(e){
                addMenu("page", e);
            });
            $('#addCategory').on("click", function(e){
                addMenu("category", e);
            });
            // Important
            $(".menu_name").val($("#choose_menu_name").val());                
            $("#choose_menu_name").on("change", function(){
                $(".menu_name").val($(this).val());
            });
        }(jQuery))
    </script>
@endsection