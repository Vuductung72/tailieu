@extends('web.layouts.master')
@section('page_og:url',request()->url())
@section('page_title', 'Đổi mật khẩu')

@section('content')
    <section id="account">
        <div class="container">
            <div class="row">
                @include('web.account.sidebar')
                <div class="col-lg-9">
                    <div class="account-infomation">
                        <div class="header-page">
                            <h5 class="title-page">Đổi mật khẩu</h5>
                        </div>
                        <form action="{{route('w.password_update', Auth::guard('user')->user())}}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="password">Mật khẩu mới:</label>
                                    <div style="position: relative">
                                        <input type="password" class="form-control" placeholder="Mật khẩu mới..." id="password"  name="password">
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <div class="invalid-tooltip" id="password-invalid-tooltip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="re_password">Nhập lại mật khẩu:</label>
                                    <div style="position: relative">
                                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu..." id="re_password"  name="re_password">
                                        <span toggle="#re_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        <div class="invalid-tooltip" id="re_password-invalid-tooltip">
                                        </div>
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


