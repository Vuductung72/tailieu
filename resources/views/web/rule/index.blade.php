@extends('web.layouts.master')
@section('page_title', $rule->name)
@section('page_og:url',request()->url())

@section('content')
    <section id="blog">
        <div class="banner">
            <h3 class="title-rule">{{$rule->name}}</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('w.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$rule->name}}</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            {!! $rule->content ?  $rule->content : 'Nội dung bài viết đang được cập nhật'!!}
        </div>
    </section>
@endsection


