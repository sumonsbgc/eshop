<nav class="navbar-default navbar-static-side" role="navigation">

    <div class="sidebar-collapse">

        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header">

                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="{{asset('backEndResource/img/profile_small.jpg')}}">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                        </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Dada Bangla
                </div>
            </li>

            <li class="active">
                <a href="{{url('/admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>


            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Posts</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('posts.create') }}"><i class="fa fa-diamond"></i> <span class="nav-label"> Add New Post</span></a></li>
                    <li><a href="{{ route('posts.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label"> All Posts</span></a></li>
                    <li><a href="{{ route('posts.comments') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Comments</span></a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Pages</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('pages.create') }}"><i class="fa fa-diamond"></i> <span class="nav-label"> Add New Page</span></a></li>
                    <li><a href="{{ route('pages.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label"> All Pages</span></a></li>
                </ul>
            </li>

            <li>
                <a href="{{url('/admin/brands/create')}}"><i class="fa fa-diamond"></i> <span class="nav-label">All Brands</span></a>
            </li>

            <li>
                <a href="{{url('/admin/categories/create')}}"><i class="fa fa-diamond"></i> <span class="nav-label"> All Categories</span></a>
            </li>



            <li>
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{url('admin/product/create')}}"><i class="fa fa-diamond"></i> <span class="nav-label"> Add Product</span></a></li>
                    <li><a href="{{url('admin/product')}}"><i class="fa fa-diamond"></i> <span class="nav-label"> Show Product</span></a></li>
                </ul>
            </li>



            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Page Options</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{url('admin/PageBanner')}}"><i class="fa fa-archive"></i> <span class="nav-label">Page Banner</span></a></li>
                    <li>
                        <a href="#">Slider Options<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="{{url('admin/SliderItem/create')}}">Create Slider</a>
                            </li>
                            <li><a href="{{url('admin/SliderItem')}}">Show All Slider</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('admin/featuredItems')}}"><i class="fa fa-archive"></i> <span class="nav-label">Featured Items</span></a></li>
                    <li><a href="{{url('admin/bestDeals/create')}}"><i class="fa fa-anchor"></i> <span class="nav-label">Best Deals</span></a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>