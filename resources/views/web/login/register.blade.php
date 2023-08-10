@extends('web.layouts.master')
@section('page_title', 'Đăng kí')
@section('page_keywords', config('constant.page_keywords_register'))
@section('page_description', config('constant.page_description_register'))
@section('page_og:image',config('constant.page_images_register'))

@section('content')
    <section id="register">
        <div class="title-box">
            <div class="container">
                <h2 class="title">Đăng kí tài khoản</h2>
            </div>
        </div>
        <div class="container">
            <form class="needs-validation" action="{{route('w.register')}}" method="POST" novalidate>
                @csrf
                <div class="form-row">
                  <div class="form-group col-12 col-md-6">
                    <label for="name">Họ và tên *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                    <div class="invalid-tooltip" id="name-invalid-tooltip">
                        {{-- Họ và tên không được để trống! --}}
                    </div>

                  </div>
                  <div class="form-group col-12 col-md-6">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                    <div class="invalid-tooltip" id="email-invalid-tooltip">

                    </div>
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="phone">Số điện thoại *</label>
                        <input type="text" class="form-control input-number" id="phone" name="phone" required>
                        <div class="invalid-tooltip" id="phone-invalid-tooltip">

                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="address">Địa chỉ *</label>
                        <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required>
                        <div class="invalid-tooltip" id="address-invalid-tooltip">
                        </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="password">Mật khẩu *</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        <div class="invalid-tooltip" id="password-invalid-tooltip">
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="re_password">Nhập lại mật khẩu *</label>
                        <input type="password" class="form-control @error('re_password') is-invalid @enderror" id="re_password" name="re_password" required>
                        <div class="invalid-tooltip" id="re_password-invalid-tooltip">
                        </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="">Giới tính *</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="male" name="gender" value="1" required>
                            <label class="custom-control-label" for="male">Nam</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input type="radio" class="custom-control-input" id="female" name="gender" value="0" required>
                            <label class="custom-control-label" for="female">Nữ</label>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox" required>
                          <label class="form-check-label" for="checkbox">
                            Tôi đồng ý tất cả các điều khoản trong <a href="#">điều khoản dịch vụ</a>
                           *</label>
                        </div>
                      </div>
                  </div>


                <button type="submit" class="btn btn-primary">Đăng kí</button>
              </form>
        </div>
    </section>
@endsection


