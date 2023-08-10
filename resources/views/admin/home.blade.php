@extends('admin.layouts.master')
@section('page_og:url', request()->url())
@section('page_title', 'Trang Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cog"></i>
                        <span class="caption-subject bold uppercase">@yield('page_title')</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">



        </div>


    </div>

@endsection
@push('scripts')

@endpush
