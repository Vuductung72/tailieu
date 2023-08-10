@extends('web.layouts.master')
@section('page_og:url',request()->url())
@section('page_title', 'Thông tin tài khoản')

@section('content')
    <section id="account">
        <div class="container">
            <div class="row">
                @include('web.account.sidebar')
                <div class="col-lg-9">
                    <div class="account-infomation">
                        <div class="header-page">
                            <h5 class="title-page">Thông tin tài khoản</h5>
                        </div>
                        <form action="{{route('w.account_update', Auth::guard('user')->user())}}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="name">Họ và tên *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::guard('user')->user()->name}}" required>
                                    <div class="invalid-tooltip">
                                        Họ và tên không được để trống!
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::guard('user')->user()->email}}" readonly>
                                    <div class="invalid-tooltip">
                                        Email không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="phone">Số điện thoại *</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{Auth::guard('user')->user()->phone}}" required>
                                    <div class="invalid-tooltip">
                                        Số điện thoại không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="address">Địa chỉ *</label>
                                    <input type="address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{Auth::guard('user')->user()->address}}" required>
                                    <div class="invalid-tooltip">
                                        Địa chỉ không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Giới tính *</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="male" name="gender" value="1" {{Auth::guard('user')->user()->gender == 1 ? 'checked' : ''}} required>
                                        <label class="custom-control-label" for="male">Nam</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" class="custom-control-input" id="female" name="gender" value="0" {{Auth::guard('user')->user()->gender == 0 ? 'checked' : ''}} required>
                                        <label class="custom-control-label" for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


