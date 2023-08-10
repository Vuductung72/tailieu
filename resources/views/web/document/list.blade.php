@extends('web.layouts.master')
@section('page_title', ((isset($category)) ?  ucfirst($category->name) : 'Danh sách tài liệu'))
@section('page_keywords', config('constant.page_keywords_course'))
@section('page_description', config('constant.page_description_course'))
@section('page_og:image',config('constant.page_images_course'))

@section('content')
    <section id="list-document">
        <div class="container">
            <div class="subject">
                <div class="container">
                    <h2 class="title">Duyệt theo chủ đề</h2>
                    <div class="subject-list">
                        <div class="row">
                            @foreach ($categories as $item)
                                <div class="col-12 col-md-6 col-lg-3 subject-item-box">
                                    @if (isset($category))
                                        <a href="{{route('w.list_document_category', $item->slug)}}" class="subject-item {{$category->id == $item->id ? 'active' : ''}}">{{$item->name}}</a>
                                    @else
                                        <a href="{{route('w.list_document_category', $item->slug)}}" class="subject-item">{{$item->name}}</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-banner">
                @if (isset($category))
                    <img src="{{$category->image}}" alt="">
                @else
                    <img src="{{asset('web/asset/images/tailieuluyenkim.jpg')}}" alt="">
                @endif
            </div>
        </div>
        <div class="documents">
            <div class="container">
                <h5>Danh sách tài liệu{{isset($category) ?': ' . $category->name : ''}}</h5>
                @if (isset($document))
                    <span><b>Từ khoá tìm kiếm:</b> {{$document}}</span>
                @endif
                {{-- <div class="row">
                    @foreach ($documents as $item)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="product-item">
                                <figure class="product-media">
                                    <a href="{{route('w.document', ['slug' => $item->category->slug , 'document_slug' => $item->slug])}}">
                                        <img src="{{asset($item->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                                <div class="product-body">
                                    <div class="product-title">
                                        <a href="{{route('w.document', ['slug' => $item->category->slug , 'document_slug' => $item->slug])}}">{{$item->code}}</a>
                                    </div><!-- End .product-cat -->
                                    <p class="product-decription">
                                        by {{$item->author}}
                                    </p>
                                </div><!-- End .product-body -->
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @if (isset($category))
                            <a class="nav-item nav-link {{$type == 1 ? 'active' : ''}}" id="nav-vn-tab" href="{{route('w.list_document_category_type', ['slug' => $category->slug, 'type' => 1])}}">Tiếng Việt</a>
                            <a class="nav-item nav-link {{$type == 2 ? 'active' : ''}}" id="nav-en-tab" href="{{route('w.list_document_category_type', ['slug' => $category->slug, 'type' => 2])}}">Tiếng Anh</a>
                            <a class="nav-item nav-link {{$type == 3 ? 'active' : ''}}" id="nav-cn-tab" href="{{route('w.list_document_category_type', ['slug' => $category->slug, 'type' => 3])}}">Tiếng Trung</a>
                        @else
                            <a class="nav-item nav-link {{$type == 1 ? 'active' : ''}}" id="nav-vn-tab" href="{{route('w.list_document_type', 1)}}">Tiếng Việt</a>
                            <a class="nav-item nav-link {{$type == 2 ? 'active' : ''}}" id="nav-en-tab" href="{{route('w.list_document_type', 2)}}">Tiếng Anh</a>
                            <a class="nav-item nav-link {{$type == 3 ? 'active' : ''}}" id="nav-cn-tab" href="{{route('w.list_document_type', 3)}}">Tiếng Trung</a>
                        @endif

                    </div>
                  </nav>
                  <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            @if ($languages->count() > 0)
                                @foreach ($languages as $item)
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="product-item">
                                            <figure class="product-media">
                                                <a href="{{route('w.document', ['slug' => $item->document->category->slug , 'document_slug' => $item->document->slug])}}">
                                                    <img src="{{asset($item->document->image)}}" alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                            <div class="product-body">
                                                <div class="product-title">
                                                    <a href="{{route('w.document', ['slug' => $item->document->category->slug , 'document_slug' => $item->document->slug])}}">
                                                        <h5>{{$item->document->code}}</h5>
                                                        <span>{{$item->name}}</span>
                                                    </a>
                                                </div><!-- End .product-cat -->
                                                <p class="product-decription">
                                                    <b>Tác giả:</b> {{$item->document->author}}
                                                </p>
                                                <p class="product-decription" id="product-decription">
                                                    <b>Mô tả:</b> {{$item->description}}
                                                </p>
                                            </div><!-- End .product-body -->
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $languages->links()}}
                                </div>
                            @else
                                <div class="col-12">
                                    <span><b>Không có tài liệu phù hợp!</b></span>
                                </div>
                            @endif

                        </div>

                    </div>
                  </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush


