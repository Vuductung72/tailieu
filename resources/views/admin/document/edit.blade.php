@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Sửa tài liệu')
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
                        <a class="btn btn-circle btn-default" href="{{ route('ad.document.index') }}" title="">Quay lại</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title="Toàn màn hình"></a>
                    </div>
                </div>
                <div class="portlet-body mb-3">
                    <h2 class="text-center">Danh sách tài liệu hiện có</h2>
                    <table class="table table-striped table-bordered table-hover" id="admin-table">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Ngôn ngữ</th>
                            <th>Thứ tự hiện thị(trên trang danh sách tài liệu theo từng ngôn ngữ)</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($languages as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if ($item->type == 1)
                                            Tiếng Việt
                                        @elseif ($item->type == 2)
                                            Tiếng Anh
                                        @else
                                            Tiếng Trung
                                        @endif
                                    </td>
                                    <td>{{$item->position}}</td>
                                    <td>
                                        <form action=" {{route('ad.language.delete', $item)}} "method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button title="Xóa tài liệu" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="portlet-body form">
                    <h2 class="text-center mb-2">Sửa mã tài liệu</h2>
                    <form action="{{ route('ad.document.update', $document) }}" method="POST" @submit.prevent="onSubmit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('code') ? 'has-error' : '']">
                                            <label for="code">Mã tài liệu <span class="required">*</span></label>
                                            <input type="text" id="code" class="form-control" name="code" v-validate="'required'" data-vv-as="&quot;Mã tài liệu&quot;" value="{{ old('code', $document->code) }}">
                                            <span class="help-block" v-if="errors.has('code')">@{{ errors.first('code') }}</span>
                                        </div>

                                        <div class="form-group" :class="[errors.has('author') ? 'has-error' : '']">
                                            <label for="author">Tên tác giả <span class="required">*</span></label>
                                            <input type="text" id="author" class="form-control" name="author" v-validate="'required'" data-vv-as="&quot;Tác giả&quot;" value="{{ old('author', $document->author) }}">
                                            <span class="help-block" v-if="errors.has('author')">@{{ errors.first('author') }}</span>
                                        </div>
                                        <div class="form-group" :class="[errors.has('id_category') ? 'has-error' : '']">
                                            <label for="id_category">Danh mục <span class="required">*</span></label>
                                            <select name="id_category" class="form-control" id="id_category" v-validate="'required'" data-vv-as="&quot;Danh mục&quot;" >
                                                <option value="">Chọn danh mục...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{$document->id_category == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block" v-if="errors.has('id_category')">@{{ errors.first('id_category') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="hot">Hiện thị trên trang chủ tài liệu bán chạy <span class="required">*</span></label>
                                            <select name="hot" class="form-control" id="hot" v-validate="'required'">
                                                <option value="0" {{$document->hot == 0 ? 'selected' : '' }}>Ẩn</option>
                                                <option value="1" {{$document->hot == 1 ? 'selected' : '' }}>Hiện</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="new">Hiện thị trên trang chủ tài liệu mới nhất <span class="required">*</span></label>
                                            <select name="new" class="form-control" id="new" v-validate="'required'">
                                                <option value="0" {{$document->new == 0 ? 'selected' : '' }}>Ẩn</option>
                                                <option value="1" {{$document->new == 1 ? 'selected' : '' }}>Hiện</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Hình ảnh<span class="required">*</span></label>
                                            <div>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px;">
                                                        <img class="img-responsive" src="{{ asset($document->image) }}" alt="" />
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="height: 200px"></div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new">Chọn ảnh</span>
                                                            <span class="fileinput-exists">Đổi ảnh</span>
                                                            <input type="file" accept="image/*" name="image" >
                                                        </span>
                                                        <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block" v-if="errors.has('image')">@{{ errors.first('image') }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-language">
                                <h2 class="text-center mb-1">Tài liệu tiếng việt</h2>
                                {{-- <form action=" {{route('ad.language.delete', $language_vn)}} "method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Xóa tài liệu" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('name_vn') ? 'has-error' : '']">
                                            <label for="name_vn">Tên tài liệu <span class="required">*</span></label>
                                            <input type="text" id="name_vn" class="form-control" name="name_vn" value="{{ old('name_vn', $language_vn->name ?? '') }}">
                                            <span class="help-block" v-if="errors.has('name_vn')">@{{ errors.first('name_vn') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('price_vn') ? 'has-error' : '']">
                                            <label for="price_vn">Giá <span class="required">*</span></label>
                                            <input type="text" id="price_vn" class="form-control" name="price_vn" value="{{ old('price_vn', $language_vn->price ?? '') }}">
                                            <span class="help-block" v-if="errors.has('price_vn')">@{{ errors.first('price_vn') }}</span>
                                        </div>
                                        <div class="input-convert-amount-vn">
                                            <p>= <span>{{number_format($language_vn->price ?? '0')}}</span> VND</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="position_vn">Ưu tiên hiển thị <span class="required">*</span></label>
                                            <input type="text" id="position_vn" class="form-control" name="position_vn" placeholder="Nhập độ ưu tiên hiện thị...." value="{{ old('position_vn', $language_vn->position ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="[errors.has('description_vn') ? 'has-error' : '']">
                                            <label for="description_vn">Mô tả ngắn <span class="required">*</span></label>
                                            <textarea  type="text" id="description_vn" class="form-control" name="description_vn">{{ old('description_vn', $language_vn->description ?? '') }}</textarea>
                                        </div>

                                        <div class="form-group" >
                                            <label for="content_vn">Nội dung <span class="required">*</span></label>
                                            <textarea  type="text" id="content_vn" class="form-control tinymce" name="content_vn" >{!! old('content_vn', $language_vn->content ?? '') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-language">
                                <h2 class="text-center mb-1">Tài liệu tiếng Anh</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('name_en') ? 'has-error' : '']">
                                            <label for="name_en">Tên tài liệu <span class="required">*</span></label>
                                            <input type="text" id="name_en" class="form-control" name="name_en" value="{{ old('name_en', $language_en->name ?? '') }}">
                                            <span class="help-block" v-if="errors.has('name_en')">@{{ errors.first('name_en') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('price_en') ? 'has-error' : '']">
                                            <label for="price_en">Giá <span class="required">*</span></label>
                                            <input type="text" id="price_en" class="form-control" name="price_en" value="{{ old('price_en', $language_en->price ?? '') }}">
                                            <span class="help-block" v-if="errors.has('price_en')">@{{ errors.first('price_en') }}</span>
                                        </div>
                                        <div class="input-convert-amount-en">
                                            <p>= <span>{{number_format($language_en->price ?? '0')}}</span> VND</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="position_en">Ưu tiên hiển thị <span class="required">*</span></label>
                                            <input type="text" id="position_en" class="form-control" name="position_en" placeholder="Nhập độ ưu tiên hiện thị...." value="{{ old('position_en', $language_en->position ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" :class="[errors.has('description_en') ? 'has-error' : '']">
                                            <label for="description_en">Mô tả ngắn <span class="required">*</span></label>
                                            <textarea  type="text" id="description_en" class="form-control" name="description_en">{{ old('description_en', $language_en->description ?? '') }}</textarea>
                                        </div>

                                        <div class="form-group" >
                                            <label for="content_en">Nội dung <span class="required">*</span></label>
                                            <textarea  type="text" id="content_en" class="form-control tinymce" name="content_en" >{!! old('content_en', $language_en->content ?? '') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-language">
                                <h2 class="text-center mb-1">Tài liệu tiếng Trung</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('name_cn') ? 'has-error' : '']">
                                            <label for="name_cn">Tên tài liệu <span class="required">*</span></label>
                                            <input type="text" id="name_cn" class="form-control" name="name_cn" value="{{ old('name_cn', $language_cn->name ?? '') }}">
                                            <span class="help-block" v-if="errors.has('name_cn')">@{{ errors.first('name_cn') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" :class="[errors.has('price_cn') ? 'has-error' : '']">
                                            <label for="price_cn">Giá <span class="required">*</span></label>
                                            <input type="text" id="price_cn" class="form-control" name="price_cn" value="{{ old('price_cn', $language_cn->price ?? '') }}">
                                            <span class="help-block" v-if="errors.has('price_cn')">@{{ errors.first('price_cn') }}</span>
                                        </div>
                                        <div class="input-convert-amount-cn">
                                            <p>= <span>{{number_format($language_cn->price ?? '0')}}</span> VND</p>
                                          </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="position_cn">Ưu tiên hiển thị <span class="required">*</span></label>
                                            <input type="text" id="position_cn" class="form-control" name="position_cn" placeholder="Nhập độ ưu tiên hiện thị...." value="{{ old('position_cn', $language_cn->position ?? '') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group" :class="[errors.has('description_cn') ? 'has-error' : '']">
                                            <label for="description_cn">Mô tả ngắn <span class="required">*</span></label>
                                            <textarea  type="text" id="description_cn" class="form-control" name="description_cn">{{ old('description_cn', $language_cn->description ?? '') }}</textarea>
                                        </div>

                                        <div class="form-group" >
                                            <label for="content_cn">Nội dung <span class="required">*</span></label>
                                            <textarea  type="text" id="content_cn" class="form-control tinymce" name="content_cn" >{!! old('content_cn', $language_cn->content ?? '') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary">Sửa</button>
                            <a href="{{ route('ad.document.index') }}" class="btn btn-default">Quay lại</a>
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

<script>
    $(document).ready(function () {
        var format = function(num){
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
            if(str[j] != ",") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                output.push(",");
                }
                i++;
            }
            }
            formatted = output.reverse().join("");
            return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $("#price_vn").keyup(function () {
            var money = $(this).val();
            $('.input-convert-amount-vn span').html(format(money));
            if(money == ''){
                $('.input-convert-amount-vn span').html('0');
            }
        });

        $("#price_en").keyup(function () {
            var money = $(this).val();
            $('.input-convert-amount-en span').html(format(money));
            if(money == ''){
                $('.input-convert-amount-en span').html('0');
            }
        });

        $("#price_cn").keyup(function () {
            var money = $(this).val();
            $('.input-convert-amount-cn span').html(format(money));
            if(money == ''){
                $('.input-convert-amount-cn span').html('0');
            }
        });
    });

</script>

@endprepend

