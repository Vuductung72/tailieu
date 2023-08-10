<div class="col-lg-3">
    <div class="sidebar-account">
        <div class="name">
            <h3>{{Auth::guard('user')->user()->name}}</h3>
        </div>
        <ul class="nav-links">
            <li class="nav-tab {{request()->routeIs('w.account') ? 'active' : ''}}">
                <a href="{{route('w.account')}}">
                    <i class="fa-solid fa-user"></i>
                    Thông tin tài khoản
                </a>
            </li>
            <li class="nav-tab {{request()->routeIs('w.password') ? 'active' : ''}}">
                <a href="{{route('w.password')}}"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a>
            </li>
        </ul>
    </div>
</div>
