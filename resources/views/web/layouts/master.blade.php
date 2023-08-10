<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">
    <link rel="icon" type="image/x-icon" href="{{asset('web/asset/images/icon.png')}}">
    <link rel="stylesheet" href="{{ asset('web/asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/asset/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{asset('web/asset/css/normalize.min.css')}}">
    <link rel="stylesheet" href="{{ asset('web/asset/animate/animate.min.css') }}" />

    {{--    owlCarousel--}}
    <link rel="stylesheet" href="{{ asset('web/asset/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/asset/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('web/asset/fonts/roboto.css') }}">
    <link rel="stylesheet" href="{{ asset('web/asset/fonts/montserrat.css') }}">
    <link rel="stylesheet" href="{{ asset('web/asset/fonts/quicksand.css') }}">
    <link rel="stylesheet" href="{{ asset('web/asset/fonts/poppins.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('web/asset/css/style.css') }}">

    @if ($__env->yieldContent('page_keywords'))
        <meta name="keywords" content="@yield('page_keywords')" />
    @else
        <meta name="keywords" content="{{ config('constant.page_keywords')}}" />
    @endif

    <meta name="description" content="@yield('page_description')" />
    <meta property="og:title" content="@yield('page_title')" />
    <meta property="og:site_name" content="tailieuluyenkim.com" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:description" content="@yield('page_description')" />
    <meta property="og:url" content="{{request()->url()}}" />

    @if ($__env->yieldContent('page_og:image'))
        <meta property="og:image" content="@yield('page_og:image')" />
    @else
        <meta property="og:image" content="{{ asset('web/asset/images/logo.jpg') }}" />
    @endif

    @stack('css')

    <script src="{{ asset('global/plugins/sweetalert2@11.js') }}"></script>


</head>
<body>

        {{-- check alerts of web  --}}
        @include('web.components.alerts')

        {{-- check erorrs of web  --}}
        @include('web.components.errors')

    <div class="page-wrapper">
        @include('web.layouts.includes.header')

        <div class="content">
            @yield('content')
        </div>

        @include('web.layouts.includes.footer')

        @if (!Auth::guard('user')->check())
            @include('web.login.login')
        @endif

        <div class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

        <div id="btn-contact">
            <div id="contact-button" class="wave">
              <i class="fas fa-comments"></i>
            </div>
            <a href="tel:{{$phone->value}}" class="phone-color">
                <i class="fas fa-phone-alt"></i>
            </a>
            <a href="{{$facebook->value}}" class="telegram-color">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="{{$zalo->value}}" class="zalo-color">
                <img src="{{ asset('web/asset/images/zalo-icon.png') }}" alt="">
            </a>
        </div>

    </div>
</body>

    <script src="{{ asset('web/asset/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('web/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('web/asset/js/popper.min.js') }}"></script>

    <script src="{{ asset('web/asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('web/asset/js/wow.min.js')}}"></script>
    <script src="{{ asset('web/asset/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/asset/select2/select2.min.js') }}"></script>
    <script src="{{ asset('web/asset/js/lazysizes.min.js')}}"></script>

    <script>
        // Kích hoạt tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.needs-validation').on('submit', function(event) {
                if (this.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(this).addClass('was-validated');
            });
        })

    </script>
    <script>
        $(document).ready(function(){
            new WOW().init();
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="{{ asset('web/asset/js/main.js') }}"></script>



    @stack('scripts')

</html>
