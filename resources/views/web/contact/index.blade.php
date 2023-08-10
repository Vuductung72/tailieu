@extends('web.layouts.master')
@section('page_title', 'Liên hệ')
@section('page_keywords', config('constant.page_keywords_contact'))
@section('page_description', config('constant.page_description_contact'))
@section('page_og:image',asset(config('constant.page_images_contact')))

@section('content')
    <section id="contact">
        <div class="slider">
            <h3 class="slider-title">Liên hệ</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('w.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="banner">
                        <img src="{{asset('web/asset/images/contact.png')}}" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-center">
                        <h2 class="title mb-1">Liên hệ với chúng tôi</h2><!-- End .title mb-2 -->
                        {{-- <p class="lead text-primary">
                            We collaborate with ambitious brands and people; we’d love to build something great together.
                        </p><!-- End .lead text-primary -->
                        <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p> --}}
                    </div><!-- End .text-center -->

                    <form action="{{route('w.post_contact')}}" class="needs-validation" novalidate method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="name">Họ và tên *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên..." required>
                                <div class="invalid-tooltip" id="name-invalid-tooltip">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập đỉa chỉ email..." required>
                                <div class="invalid-tooltip" id="email-invalid-tooltip">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="phone">Số điện thoại *</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại..." required>
                                <div class="invalid-tooltip" id="phone-invalid-tooltip">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="phone">Ghi chú *</label>
                                <textarea name="content" id="content" cols="30" class="form-control" rows="10" placeholder="Ghi chú của bạn..." required></textarea>
                                <div class="invalid-tooltip" id="content-invalid-tooltip">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-outline-primary-2 w-100">
                                <span>Gửi</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div><!-- End .text-center -->
                    </form><!-- End .contact-form -->
                </div>
                <div class="col-3">
                    <div class="banner">
                        <img src="{{asset('web/asset/images/contact.png')}}" alt="" class="w-100">
                    </div>
                </div>
            </div><!-- End .row -->
        </div>
    </section>
@endsection


