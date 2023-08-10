@extends('web.layouts.master')
@section('page_title', $blog->name)
@section('page_keywords', $blog->keyword)
@section('page_description', $blog->description)
@section('page_og:image',asset($blog->image))

@section('content')
    <section id="blog">
        <div class="container">
            <div class="blog-content">
                <div class="row">
                    <div class="col-lg-9">
                        <a href="{{route('w.blog_category', $blog->categoryBlog->slug)}}" class="category-name">{{$blog->categoryBlog->name}}</a>
                        <h3 class="title">{{$blog->name}}</h3>
                        <div class="is-divider"></div>
                        <p class="date">
                            <i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::createFromDate($blog->created_at)->format('d/m/Y') }}
                        </p>
                        <div class="blog-img">
                            <img src="{{$blog->image}}" alt="">
                        </div>

                        <div>
                            {!! $blog->content ?  $blog->content : 'Nội dung bài viết đang được cập nhật'!!}
                        </div>

                        <div class="blog-category">
                            <h3 class="mb-3">Có thể bạn quan tâm</h3>
                            <div class="row">
                                @foreach ($blogs_relates as $item)
                                    <div class="col-lg-4">
                                        <a class="blog-item" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
                                            <div class="blog-image">
                                                <img src="{{asset($item->image)}}" alt="" class="w-100">
                                            </div>
                                            <div class="blog-content">
                                                <h5 class="blog-name">{{$item->name}}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 blog-border">
                        <div class="list-blog">
                            <div class="blog-new">
                                <h3>{{$blog->categoryBlog->name}}</h3>
                                <div class="is-divider"></div>
                                <ul>
                                    @foreach ($blogs_relate as $item)
                                        <li>
                                            <a class="blog-item" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
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
                            <div class="blog-new">
                                <h3>Bài viết mới nhất</h3>
                                <div class="is-divider"></div>
                                <ul>
                                    @foreach ($blogs_new->take(1) as $item)
                                        <li>
                                            <a class="blog-item" href="{{route('w.blog', ['category_slug' => $item->categoryBlog->slug, 'slug' => $item->slug])}}">
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

        </div>
        {{-- <div class="blog-comment">
            <div class="container">
                <div class="form-comment">
                    <h4>Chia sẻ cảm nghĩ của bạn!</h4>
                    <form action="{{route('w.blog_comment', $blog->slug)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="content">Bình luận</label>
                            <textarea name="content" id="content" cols="30" rows="4" class="form-control" placeholder="">
                                {{ old('content') }}
                            </textarea>
                            <button type="submit" class="btn btn-primary w-100 mt-lg-2">Gửi đi</button>
                        </div>
                    </form>
                </div>
                <div class="list-comments">
                    <h4>Bình luận gần nhất</h4>
                    <ul>
                        @foreach ($comments as $comment)
                            <li>
                                <h5>{{$comment->user->name}}</h5>
                                {{ \Carbon\Carbon::createFromDate($comment->created_at)->format('d/m/Y H:i:s') }}
                                <p>{{$comment->content}}</p>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div> --}}
        <div class="progress"></div>

    </section>
@endsection


