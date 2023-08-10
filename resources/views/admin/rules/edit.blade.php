@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Sửa bài viết')
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
                        <a class="btn btn-circle btn-default" href="{{ route('ad.rule.index') }}" title="">Quay lại</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title="Toàn màn hình"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ route('ad.rule.update', $rule) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" :class="[errors.has('name') ? 'has-error' : '']">
                                    <label for="name">Tiêu đề <span class="required">*</span></label>
                                    <input type="text" id="name" class="form-control" name="name" v-validate="'required'" data-vv-as="&quot;Tiêu đề&quot;" value="{{ old('name', $rule->name) }}">
                                    <span class="help-block" v-if="errors.has('name')">@{{ errors.first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="type">Danh mục <span class="required">*</span></label>
                                    <select name="type" class="form-control" id="type">
                                        <option value="">Chọn danh mục...</option>
                                        <option value="1" {{$rule->type == 1 ? 'selected' : ''}}>Giới thiệu</option>
                                        <option value="2" {{$rule->type == 1 ? '' : 'selected'}}>Điều khoản dịch vụ</option>

                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="type">Dạng bài viết</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="0">Tin tức</option>
                                        <option value="1">Điều khoản dịch vụ</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label for="content">Nội dung <span class="required">*</span></label>
                                    <textarea  type="text" id="content" class="form-control tinymce" name="content" >{!! old('content', $rule->content) !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary">Sửa</button>
                            <a href="{{ route('ad.rule.index') }}" class="btn btn-default">Quay lại</a>
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

