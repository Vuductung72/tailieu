@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Thông tin chi tiết khách hàng')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-default" href="{{ route('ad.user.index') }}" title="">Quay lại</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title="Toàn màn hình"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{route('ad.user.update', $user)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                    <label for="name">Tên <span class="required">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" v-validate="'required'" data-vv-as="&quot;Tên&quot;" value="{{ old('name', $user->name) }}">
                                    <span class="help-block" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                                </div>
                                <div class="form-group" :class="[errors.has('email') ? 'has-error' : '']">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" id="email" class="form-control" name="email" data-vv-as="&quot;Email&quot;" value="{{ old('email', $user->email) }}">
                                    <span class="help-block" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                                </div>
                                <div class="form-group" :class="[errors.has('phone') ? 'has-error' : '']">
                                    <label for="phone">Số điện thoại <span class="required">*</span></label>
                                    <input type="text" id="phone" class="form-control" name="phone" data-vv-as="&quot;Số điện thoại&quot;" value="{{ old('phone', $user->phone) }}">
                                    <span class="help-block" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                                </div>
                                <div class="form-group" :class="[errors.has('address') ? 'has-error' : '']">
                                    <label for="address">Địa chỉ <span class="required">*</span></label>
                                    <input type="text" id="address" class="form-control" name="address" data-vv-as="&quot;Địa chỉ&quot;" value="{{ old('address', $user->address) }}">
                                    <span class="help-block" v-if="errors.has('address')">@{{ errors.first('address') }}</span>
                                </div>
                                <div class="form-group" :class="[errors.has('password') ? 'has-error' : '']">
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <input type="password" id="password" class="form-control" name="password" v-validate="'required'" data-vv-as="&quot;Mật khẩu&quot;" value="{{ old('password') }}">
                                    <span class="help-block" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                            <a href="{{ route('ad.user.index') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@prepend('scripts')
@endprepend

