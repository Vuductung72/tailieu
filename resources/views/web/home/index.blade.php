@extends('web.layouts.master')
@section('page_title', 'Tài liệu luyện kim')
@section('page_keywords', config('constant.page_keywords'))
@section('page_description', config('constant.page_description'))

@section('content')
    @include('web.layouts.includes.slider')

    <section id="home-new-product" class="mt-2">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('w.list_document')}}"><h2 class="title">Tài liệu mới nhất</h2></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('w.list_document')}}">Xem tất cả</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="new-product">
            <div class="container">
                <div class="row">
                    @foreach ($document_new as $item)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="product-item">
                                <figure class="product-media">
                                    <a href="{{route('w.document', ['slug' => $item->category->slug, 'document_slug' => $item->slug])}}">
                                        <img src="{{asset($item->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                                <div class="product-body">
                                    <div class="product-title">
                                        <a href="{{route('w.document', ['slug' => $item->category->slug, 'document_slug' => $item->slug])}}">{{$item->code}}</a>
                                    </div><!-- End .product-cat -->
                                    <p class="product-decription">
                                        <b>Tác giả:</b> {{$item->author}}
                                    </p>
                                </div><!-- End .product-body -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="home-reviews">
        <div class="container">
            <h2 class="title">Đánh giá mới</h2>
            <div class="review-product">
                <div class="row">

                    @foreach ($language_new as $item)
                        <div class="col-lg-6">
                            <div class="product-item">
                                <figure class="product-media">
                                    <a href="{{route('w.document', ['slug' => $item->document->category->slug, 'document_slug' => $item->document->slug])}}">
                                        <img src="{{asset($item->document->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                                <div class="product-body">
                                    <div class="product-title">
                                        <a href="{{route('w.document', ['slug' => $item->document->category->slug, 'document_slug' => $item->document->slug])}}">{{$item->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <div class="product-decription-languagef">
                                        <span><b>Tác giả:</b> {{$item->document->author}}</span> <br>
                                        <p style="font-style: italic;">"{{$item->description}}"</p>

                                    </div>
                                </div><!-- End .product-body -->
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <section id="home-subject">
        <div class="container">
            <h2 class="title">Duyệt theo chủ đề</h2>
            <div class="subject-list">
                <div class="row">
                    @foreach ($categories as $item)
                        <div class="col-12 col-md-6 col-lg-3 p-0">
                            <a href="{{route('w.list_document_category', $item->slug)}}" class="subject-item">{{$item->name}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="home-bestsellers">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('w.home')}}"><h2 class="title">Bán chạy nhất</h2></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('w.list_document')}}">Xem tất cả</a></li>
                </ol>
            </nav><!-- End .breadcrumb-nav -->
            <div class="product-bestsellers">
                <div class="row">
                    @foreach ($document_show as $item)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="product-item">
                                <figure class="product-media">
                                    <a href="{{route('w.document', ['slug' => $item->category->slug, 'document_slug' => $item->slug])}}">
                                        <img src="{{asset($item->image)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->
                                <div class="product-body text-center">
                                    <div class="product-title">
                                        <a href="{{route('w.document', ['slug' => $item->category->slug, 'document_slug' => $item->slug])}}">{{$item->code}}</a>
                                    </div><!-- End .product-cat -->
                                    <p class="product-decription">
                                        <b>Tác giả:</b> {{$item->author}}
                                    </p>
                                </div><!-- End .product-body -->
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

{{--
    products
    - id
    - name
    - slug
    - description
    1
    ...
    products_options
    - id
    - product_id
    - price
    - image
    - position
    - ...
    nhiều
    --- select ---

    slect * from products join products_options where products_options.position = 1;
    => click vào sp option -> thì đổi where position = 1 -> products_options.id  -> bằng khách hàng click

--}}
