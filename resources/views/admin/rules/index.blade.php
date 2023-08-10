@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Điều khoản dịch vụ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('ad.rule.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Tạo mới</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title=""></a>
                    </div>
                </div>
                <div class="portlet-body" style="background: #fff">
                    <table class="table table-striped table-bordered table-hover" id="admin-table">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Slug</th>
                            <th>Dạng bài</th>
                            <th width="150">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rules as $key => $rule)
                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $rule->name }}</td>
                                <td>{{ $rule->slug }}</td>
                                <td>{{ $rule->type == 1 ? 'Giới thiệu' : 'Điều khoản dịch vụ' }}</td>

                                <td>
                                    <a title="Chỉnh sửa bài viết" class="btn btn-circle btn-sm btn-warning" href="{{ route('ad.rule.edit', $rule) }}"><i class="fa fa-pencil"></i></a>
                                    {{-- <form action="{{ route('ad.rule.update_status', $rule) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn @php echo $rule->status == 1 ?  'ẩn' : 'hiện' @endphp bài viết?');">
                                        @csrf
                                        @method('PATCH')
                                        <button title="Cập nhật trạng thái bài viết" class="btn btn-circle btn-sm {{ $rule->status == 1 ? 'btn-primary' : 'btn-info' }}  ">
                                            @if ($rule->status == 1)
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            @endif
                                        </button>
                                    </form> --}}
                                    <form action="{{ route('ad.rule.destroy', $rule) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Xóa bài viết" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $rules->links('web.layouts.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
@endpush

@push('scripts')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('global/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
