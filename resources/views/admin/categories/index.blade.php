@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Danh sách danh mục tài liệu')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('ad.category.create') }}" class="btn btn-circle btn-sm btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:void(0);" title=""></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="admin-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Slug</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td >{{ $key+1 }}</td>
                                <td ><img src="{{asset($category->image)}}" alt="" style="width: 200px"></td>
                                <td >{{ $category->name}}</td>
                                <td >{{ $category->slug}}</td>
                                <td >
                                    {{-- <a class="btn btn-circle btn-sm btn-primary" href="{{ route('ad.user.show', $user->id) }}">Xem chi tiết</a> --}}
                                    <a class="btn btn-circle btn-sm btn-warning" href="{{ route('ad.category.edit', $category->id) }}"><i class="fa fa-pencil"></i></a>
                                    {{-- <form action="{{ route('ad.category.destroy', $category->id) }}" id="delete-course-item-form" style="display: inline-block" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $categories->withQueryString()->links('web.layouts.paginate') }}
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
@endpush
