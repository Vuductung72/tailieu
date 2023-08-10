@extends('web.layouts.master')
@section('page_title', 'Tin tức '.((isset($category)) ?  ucfirst($category->name) : '') )
@section('page_keywords',config('constant.page_keywords_category'))
@section('page_description', ((isset($category)) ?  ucfirst($category->description) : config('constant.page_description_category')))
@section('page_og:image', ((isset($category)) ?  ucfirst($category->image) : config('constant.page_images_category')))

@section('content')
    <section id="list-blog">
        <div class="banner">
        </div>
        <div class="container">
            <div class="blog-new">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider-text-left">
                            <h3 class="slider-header text-center" style="padding-left: 40px">
                                Hành trình <img src="{{asset('web/asset/images/paper-airplane-icon.png')}}" alt="" style="margin-left: 2px">
                            </h3>
                        </div>
                        <div class="slider mt-2">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($sliders as $key => $slider)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ $slider->image }}" alt="Sliders">
                                        <div class="slider-content">
                                            <h5>{{$slider->name}}</h5>
                                            <span>{{$slider->content}}</span>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="slider-text-right">
                            <h3 class="slider-header text-center" style="padding-left: 65px">
                                Đề xuất <img src="{{asset('web/asset/images/icon-khung.png')}}" alt="" style="height: 35px; margin-left: 12px">
                            </h3>
                        </div>
                        @foreach ($blog_new as $item)
                            <a class="blog-item mt-2" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
                                <div class="blog-image">
                                    <img src="{{asset($item->image)}}" alt="" class="w-100">
                                </div>
                                <div class="blog-content">
                                    <p class="blog-category">{{$item->categoryBlog->name}}</p>
                                    <h5 class="blog-name">{{$item->name}}</h5>
                                    <div class="is-divider"></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- @foreach ($blogsByCategory as $categorySlug => $blogs)
                <div class="blog-category-box">
                    <a href="{{route('w.blog_category', $category->slug)}}" class="category-name">{{ $categorySlug }}</a>
                    <div class="category-image">
                        <a href="#">
                            <img src="{{$category->image}}" alt="">
                        </a>
                    </div>
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-4">
                                <a href="{{route('w.blog', ['category_slug' => $blog->categoryBlog->slug, 'slug' => $blog->slug])}}" class="blog-item">
                                    <div class="blog-image">
                                        <img src="{{$blog->image}}" alt="" class="w-100">
                                    </div>
                                    <div class="blog-content">
                                        <h5 class="blog-name">{{$blog->name}}</h5>
                                        <div class="is-divider"></div>
                                        <p class="blog-decription">{{$blog->description}}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach --}}


        </div>

        @foreach ($categories as $category)
                <div class="blog-category-box mt-2">
                    <div class="background-image"></div>
                    <a href="{{route('w.blog_category', $category->slug)}}" class="category-name">{{$category->name}}</a>

                    <div class="container">
                        <div class="category-image">
                            <a href="{{route('w.blog_category', $category->slug)}}">
                                <img src="{{$category->image}}" alt="">
                            </a>
                        </div>
                        <div class="row">
                            @php
                                $count = 0; // Biến đếm số lượng bài viết đã được hiển thị
                            @endphp
                            @foreach ($blogs as $blog)
                                @if ($blog->category_blog_id == $category->id)
                                    @if ($count < 6) <!-- Chỉ hiển thị 6 bài viết -->
                                        <div class="col-lg-4">
                                            <a href="{{route('w.blog', ['category_slug' => $blog->categoryBlog->slug, 'slug' => $blog->slug])}}" class="blog-item">
                                                <div class="blog-image">
                                                    <img src="{{$blog->image}}" alt="" class="w-100">
                                                </div>
                                                <div class="blog-content">
                                                    <h5 class="blog-name">{{$blog->name}}</h5>
                                                    <div class="is-divider"></div>
                                                    <p class="blog-decription">{{$blog->description}}</p>
                                                </div>
                                            </a>
                                        </div>
                                        @php
                                            $count++; // Tăng biến đếm sau khi hiển thị một bài viết
                                        @endphp
                                    @else
                                        @break <!-- Thoát khỏi vòng lặp khi đã hiển thị đủ 6 bài viết -->
                                    @endif

                                    @endif
                            @endforeach
                        </div>
                    </div>


                </div>
            @endforeach
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">

    </script>

@endpush


