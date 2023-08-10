@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Thêm mới danh mục bài viết')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-default" href="{{ route('ad.category-blog.index') }}" title="">Quay lại</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title="Toàn màn hình"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ route('ad.category-blog.store') }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                    <label for="name">Tên danh mục bài viết<span class="required">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Nhập tên danh mục bài viết...." v-validate="'required'" data-vv-as="&quot;Tên&quot;" value="{{ old('name') }}">
                                    <span class="help-block" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" :class="[errors.has('image') ? 'has-error' : '']">
                                    <label for="image">Hình ảnh<span class="required">*</span></label>
                                    <div>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px;">
                                                <img class="img-responsive" src="{{ asset('images/no_image.png') }}" alt="" />
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new">Chọn ảnh</span>
                                                    <span class="fileinput-exists">Đổi ảnh</span>
                                                    <input type="file" accept="image/*" name="image" v-validate="'required'" data-vv-as="&quot;Ảnh&quot;" >
                                                </span>
                                                <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="help-block" v-if="errors.has('image')">@{{ errors.first('image') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary">Tạo mới</button>
                            <a href="{{ route('ad.category-blog.index') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link href="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
@endpush

@prepend('scripts')
<script src="{{ asset('global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@include('admin.lib.tinymce-setup')

@endprepend

