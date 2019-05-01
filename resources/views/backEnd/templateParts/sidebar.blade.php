<nav class="navbar-default navbar-static-side" role="navigation">

    <div class="sidebar-collapse">

        <ul class="nav metismenu" id="side-menu">

            <li class="nav-header">

                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="backend_logo"
                             src="{{ asset('FrontEndPageResource/image/dadabangla.png')}}">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Dada Bangla</strong>
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

            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{url('/admin')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li class="{{ request()->is('admin/posts*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Posts</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse {{ request()->is('admin/posts*') ? 'in' : ''}}">
                    <li class="{{ request()->is('admin/posts/create') ? 'active' : '' }}"><a
                                href="{{ route('posts.create') }}"><i class="fa fa-diamond"></i> <span
                                    class="nav-label"> Add New Post</span></a></li>
                    <li class="{{ request()->is('admin/posts') ? 'active' : '' }}"><a href="{{ route('posts.index') }}"><i
                                    class="fa fa-diamond"></i> <span class="nav-label"> All Posts</span></a></li>
                    <li class="{{ request()->is('admin/posts/comments') ? 'active' : '' }}"><a
                                href="{{ route('posts.comments') }}"><i class="fa fa-diamond"></i> <span
                                    class="nav-label">Comments</span></a></li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/pages*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Pages</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse {{ request()->is('admin/pages*') ? 'in' : ''}}">
                    <li class="{{ request()->is('admin/pages/create') ? 'active' : ''}}"><a
                                href="{{ route('pages.create') }}"><i class="fa fa-diamond"></i> <span
                                    class="nav-label"> Add New Page</span></a></li>
                    <li class="{{ request()->is('admin/pages') ? 'active' : ''}}"><a
                                href="{{ route('pages.index') }}"><i class="fa fa-diamond"></i> <span class="nav-label"> All Pages</span></a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/brands*') ? 'active' : '' }}">
                <a href="{{url('admin/brands/create')}}"><i class="fa fa-diamond"></i> <span class="nav-label">All Brands</span></a>
            </li>

            <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                <a href="{{url('admin/categories/create')}}"><i class="fa fa-diamond"></i> <span class="nav-label"> All Categories</span></a>
            </li>


            <li class="{{ request()->is('admin/product*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Products</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse {{ request()->is('admin/product*') ? 'in' : '' }}">
                    <li class="{{ request()->is('admin/product/create') ? 'active' : '' }}"><a
                                href="{{url('admin/product/create')}}"><i class="fa fa-diamond"></i> <span
                                    class="nav-label"> Add Product</span></a></li>
                    <li class="{{ request()->is('admin/product') ? 'active' : '' }}"><a href="{{url('admin/product')}}"><i
                                    class="fa fa-diamond"></i> <span class="nav-label">Show Product</span></a></li>
                    <li class="{{ request()->is('admin/reviews') ? 'active' : '' }}"><a href="{{url('admin/reviews')}}"><i
                                    class="fa fa-diamond"></i> <span class="nav-label">Product Reviews</span></a></li>
                    <li class="{{ request()->is('admin/sold_product') ? 'active' : '' }}"><a href="{{url('admin/sold_product')}}"><i
                                    class="fa fa-diamond"></i> <span class="nav-label">Sold Product</span></a></li>
                </ul>
            </li>


            <li class="{{ request()->is('admin/coupon*') ? 'active' : '' }}">
                <a href="{{url('admin/coupon')}}"><i class="fa fa-diamond"></i> <span
                            class="nav-label">Coupons</span></a>
            </li>
            
            <li class="{{ request()->is('admin/menus*') ? 'active' : '' }}">
                <a href="{{url('admin/menus')}}">
                    <i class="fa fa-diamond"></i> 
                    <span class="nav-label">Menu</span>
                </a>
            </li>


            <li class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Orders</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse {{ request()->is('admin/product*') ? 'in' : '' }}">
                    <li class="{{ request()->is('admin/orderlist') ? 'active' : '' }}"><a
                                href="{{url('admin/orderlist')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Pending Orders</span></a>
                    </li>
                    <li class="{{ request()->is('admin/approvelist') ? 'active' : '' }}"><a
                                href="{{url('admin/approvelist')}}"><i class="fa fa-diamond"></i> <span
                                    class="nav-label">Approve Orders</span></a></li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/PageBanner*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Page Options</span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse {{ request()->is('admin/PageBanner*') ? 'in' : '' }}">
                    <li class="{{ request()->is('admin/PageBanner') ? 'active' : '' }}"><a
                                href="{{url('admin/PageBanner')}}"><i class="fa fa-archive"></i> <span
                                    class="nav-label">Page Banner</span></a></li>
                    <li class="{{ request()->is('admin/SliderItem*') ? 'active' : '' }}">
                        <a href="#">Slider Options<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse {{ request()->is('admin/sliderItem*') ? 'in' : '' }}">
                            <li class="{{ request()->is('admin/SliderItem/create') ? 'active' : '' }}">
                                <a href="{{url('admin/SliderItem/create')}}">Create Slider</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('admin/featuredItems') ? 'active' : '' }}"><a
                                href="{{url('admin/featuredItems')}}"><i class="fa fa-archive"></i> <span
                                    class="nav-label">Featured Items</span></a></li>
                    <li class="{{ request()->is('admin/bestDeals/create') ? 'active' : '' }}"><a
                                href="{{url('admin/bestDeals/create')}}"><i class="fa fa-anchor"></i> <span
                                    class="nav-label">Hot Deals</span></a></li>
                </ul>
            </li>

            <li>
                <a href="{{url('/admin/themeOptions')}}"><i class="fa fa-cog"></i> <span class="nav-label"> Theme Options</span></a>
            </li>
            
            <li>
                <a href="{{url('/admin/reports')}}"><i class="fa fa-cog"></i> <span class="nav-label"> Reports</span></a>
            </li>

        </ul>
    </div>
</nav>