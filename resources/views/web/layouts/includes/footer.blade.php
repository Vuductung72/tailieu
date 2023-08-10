<footer class="footer">
    <div class="footer-top">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="logo">
                        <img src="{{asset('web/asset/images/logo-1.jpg')}}" alt="" class="w-100">
                    </div>
                    <ul class="contact-list">
                        <li>
                            <a href="{{$facebook->value}}"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        {{-- <li>
                            <a href="#">
                                <img src="{{ asset('web/asset/images/zalo-icon.png') }}" alt="">
                            </a>
                        </li> --}}
                        <li>
                            <a href="mailto:{{$mail->value}}"><i class="fa-solid fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
                <div class=" col-12 col-sm-6 col-lg-4">
                    <h5 class="border-top footer-title">Điều khoản dịch vụ</h5>
                    <ul class="rlist">
                        @if ($rules->count() > 0)
                            @foreach ($rules as $item)
                                <li class="mikefooterlist"><a href="{{route('w.rule', $item->slug)}}">{{$item->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class=" col-12 col-sm-6 col-lg-4">
                    <h5 class="border-top footer-title">Về chúng tôi</h5>
                    <ul class="rlist">
                        <li class="mikefooterlist">
                            <a href="{{route('w.rule',$introduce->slug)}}">Giới thiệu</a>
                        </li>
                        <li class="mikefooterlist">
                            <a href="{{route('w.list_blog')}}">Tin tức</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-bottom">
        <p class="text-center p-0 m-0">Copyright 2023 © Website thuộc bản quyền của Net5s</p>
    </div>
</footer>
