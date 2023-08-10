<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item {{ request()->routeIs('ad.index') ? 'active' : '' }}">
                <a href="{{ route('ad.index') }}"><i class="fa fa-home"></i> <span class="title">Dashboard</span></a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.admin.index', 'ad.admin.create', 'ad.admin.edit') ? 'active' : '' }}">
                <a href="{{ route('ad.admin.index') }}"><i class="fa fa-home"></i> <span class="title">Quản lí Admins</span></a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.user.index', 'ad.user.create', 'ad.user.edit') ? 'active' : '' }}">
                <a href="{{ route('ad.user.index') }}"><i class="fa fa-home"></i> <span class="title">Quản lí người dùng</span></a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.contact.index') ? 'active' : '' }}">
                <a href="{{ route('ad.contact.index') }}"><i class="fa fa-home"></i> <span class="title">Quản lí liên hệ</span></a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.category.index', 'ad.category.create', 'ad.category.edit' ,'ad.document.index', 'ad.document.create', 'ad.document.edit') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="nav-link nav-toggle">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span class="title">Tài liệu</span>
                    <span class="arrow {{ request()->routeIs('ad.category.index', 'ad.category.create', 'ad.category.edit') ? 'active' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('ad.category.index') }}" class="nav-link {{ request()->routeIs('ad.category.index', 'ad.category.create', 'ad.category.edit') ? 'active' : '' }}">
                            <span class="title">Danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('ad.document.index')}}" class="nav-link {{ request()->routeIs('ad.document.index', 'ad.document.create', 'ad.document.edit') ? 'active' : '' }}">
                            <span class="title">Mã tài liệu</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item {{ request()->routeIs('ad.category-blog.index', 'ad.category-blog.create', 'ad.category-blog.edit', 'ad.blog.index', 'ad.blog.create', 'ad.blog.edit') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="nav-link nav-toggle">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span class="title">Blog</span>
                    <span class="arrow {{ request()->routeIs('ad.category-blog.index', 'ad.category-blog.create', 'ad.category-blog.edit') ? 'active' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{route('ad.category-blog.index')}}" class="nav-link {{ request()->routeIs('ad.category-blog.index', 'ad.category-blog.create', 'ad.category-blog.edit') ? 'active' : '' }}">
                            <span class="title">Danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('ad.blog.index')}}" class="nav-link {{ request()->routeIs('ad.blog.index', 'ad.blog.create', 'ad.blog.edit') ? 'active' : '' }}">
                            <span class="title">Bài viết</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('ad.slider-blog.index')}}" class="nav-link {{ request()->routeIs('ad.slider-blog.index', 'ad.slider-blog.create', 'ad.slider-blog.edit') ? 'active' : '' }}">
                            <span class="title">Slider Blog</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.slider.index') ? 'active' : '' }}">
                <a href="{{ route('ad.slider.index') }}" class="nav-link nav-toggle">
                    <i class="fa fa-image"></i>
                    <span class="title">Quản lý slider</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.rule.index', 'ad.rule.create', 'ad.rule.edit') ? 'active' : '' }}">
                <a href="{{ route('ad.rule.index') }}"><i class="fa fa-home"></i> <span class="title">Điều khoản dịch vụ</span></a>
            </li>

            <li class="nav-item {{ request()->routeIs('ad.config.index', 'ad.config.create', 'ad.config.edit') ? 'active' : '' }}">
                <a href="{{ route('ad.config.index') }}"><i class="fa fa-home"></i> <span class="title">Config</span></a>
            </li>

            <!-- END SIDEBAR TOGGLE BUTTON -->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
