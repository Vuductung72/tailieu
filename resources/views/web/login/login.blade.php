<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div id="form-login" class="form-box">
                    <div class="form-tab">
                        <h2 class="text-center">Đăng nhập</h2>

                        <div class="form-login">
                            <form action="{{route('w.login')}}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Nhập đỉa chỉ email..." required>
                                        <div class="invalid-tooltip" id="email-invalid-tooltip">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="password">Mật khẩu *</label>
                                        <div style="position: relative">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu mới..." id="password"  name="password">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <div class="invalid-tooltip" id="password-invalid-tooltip">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        </div>
                                    </div><!-- End .form-group -->
                                </div>

                                <a href="{{route('w.forget_password')}}" class="forgot-link">Quên mật khẩu?</a>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-form-login w-100">
                                        <span>Đăng nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                                <a href="{{route('w.register.index')}}" class="btn btn-outline-primary-2 w-100">Đăng kí tài khoản mới</a>
                            </form>
                        </div>
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->
