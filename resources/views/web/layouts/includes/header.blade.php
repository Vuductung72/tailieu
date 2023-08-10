<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="{{route('w.home')}}" title="trang chủ" >
                    <img src="{{asset('web/asset/images/logo-1.jpg')}}" alt="" >
                </a>
            </div>
            <div class="header-right">
                <ul>
                    <li>
                        <a href="#" class="btn" id="btn-search">
                            <i class="fa fa-magnifying-glass"></i>
                            <span>Tìm kiếm</span>
                        </a>

                    </li>
                    {{-- <li>
                        <a href="#" class="btn">
                            <i class="fa-solid fa-cart-shopping btn-header"></i>
                            <span>Giỏ hàng</span>
                        </a>
                    </li> --}}

                    @if (Auth::guard('user')->check())
                        <li class="nav-item dropdown">
                            <a class="btn" href="{{route('w.account')}}">
                                <i class="fa-regular fa-user btn-header"></i>
                                <span>{{Auth::guard('user')->user()->name}}</span>
                            </a>
                            <div class="dropdown-menu" style="left: -50px !important">
                                <ul style="flex-direction: column">
                                    <li>
                                        <a class="dropdown-item" href="{{route('w.account')}}">Thông tin tài khoản</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('w.logout')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a class="btn" href="#signin-modal" data-toggle="modal">
                                <i class="fa-regular fa-user btn-header"></i>
                                <span>Đăng nhập</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
              <button class="mobile-menu-toggler navbar-toggler">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('w.home')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('w.rule', $introduce->slug)}}">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('w.list_document')}}">
                            Tài liệu
                        </a>
                        <div class="dropdown-menu">
                            <ul class="list-category">
                                @if ($list_category->count() > 0)
                                    @foreach ($list_category as $item)
                                        <li>
                                            <a class="dropdown-item" href="{{route('w.list_document_category', $item->slug)}}">{{$item->name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('w.list_blog')}}">
                            Bài viết
                        </a>
                        <div class="dropdown-menu">
                            <ul class="list-category">
                                @if ($list_category->count() > 0)
                                    @foreach ($list_category_blog as $item)
                                        <li>
                                            <a class="dropdown-item" href="{{route('w.blog_category', $item->slug)}}">{{$item->name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('w.contact')}}">Liên hệ</a>
                    </li>
                </ul>
              </div>
            </div>
        </nav>
    </div>

    <div class="header-search">
        <div class="container">
            <form action="{{route('w.document_search')}}" class="form-search" action="GET">
                <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="text" class="form-control-plaintext" id="document" name="document" value="{{ isset($document) ? $document : ''}}" placeholder="Nhập mã tài liệu...">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn">Tìm kiếm <i class="fa fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa-solid fa-xmark"></i></span>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{route('w.home')}}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{route('w.rule', $introduce->slug)}}">Giới thiệu</a>
                </li>
                <li>
                    <a href="{{route('w.list_document')}}" class="sf-with-ul">Tài liệu</a>

                    <ul>
                        @if ($list_category->count() > 0)
                            @foreach ($list_category as $item)
                                <li>
                                    <a href="{{route('w.list_document_category', $item->slug)}}">{{$item->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{route('w.list_blog')}}" class="sf-with-ul">Bài viết</a>

                    <ul>
                        @if ($list_category->count() > 0)
                            @foreach ($list_category_blog as $item)
                                <li>
                                    <a href="{{route('w.blog_category', $item->slug)}}">{{$item->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{route('w.contact')}}">Liên hệ</a>

                </li>
            </ul>
        </nav><!-- End .mobile-nav -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

