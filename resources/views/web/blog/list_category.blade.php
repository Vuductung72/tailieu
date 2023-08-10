@extends('web.layouts.master')
@section('page_title', 'Tin tức '.((isset($category)) ?  ucfirst($category->name) : '') )
@section('page_keywords',config('constant.page_keywords_category'))
@section('page_description', ((isset($category)) ?  ucfirst($category->description) : config('constant.page_description_category')))
@section('page_og:image', ((isset($category)) ?  ucfirst($category->image) : config('constant.page_images_category')))

@section('content')
    <section id="article-list">
        <div class="container">
            <div class="list-header text-center">
                <h4>{{$category->name}}</h4>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    @foreach ($blogs as $item)
                        <a class="blog-item mb-3" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
                            <div class="blog-image">
                                <img src="{{asset($item->image)}}" alt="" class="w-100">
                            </div>
                            <div class="blog-content">
                                <h5 class="blog-name">{{$item->name}}</h5>
                                <div class="is-divider"></div>
                                <p class="blog-decription">{{$item->description}}</p>
                            </div>
                        </a>
                    @endforeach
                    <div class="col-12 d-flex justify-content-center">
                        {{ $blogs->links()}}
                    </div>
                </div>
                <div class="col-lg-3 blog-border">
                    <div class="list-blog">
                        <div class="blog-new">
                            <h3>Bài viết mới nhất</h3>
                            <div class="is-divider"></div>
                            <ul>
                                @foreach ($blogs_new as $item)
                                    <li>
                                        <a class="blog-new-item" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
                                            <div class="blog-image">
                                                <img src="{{asset($item->image)}}" alt="" class="w-100">
                                            </div>
                                            <div class="blog-content">
                                                <h5 class="blog-name">{{$item->name}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

@endpush


