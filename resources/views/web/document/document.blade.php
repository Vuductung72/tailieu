@extends('web.layouts.master')
@section('page_title', 'Thông tin chi tiết ' . $language->document->code)
@section('page_keywords', config('constant.page_keywords_contact'))
@section('page_description', config('constant.page_description_contact'))
@section('page_og:image',asset(config('constant.page_images_contact')))


@section('content')
    <section id="document">
        <div class="top-img">
            <img src="{{asset('web/asset/images/banner-book.jpeg')}}" alt="">
        </div>
        <div class="container">
            <div class="box-header">
                <div class="box-img">
                    <img src="{{$language->document->image}}" alt="">
                </div>
                <div class="box-details">
                    {{-- <h3 class="code-document">{{$language->document->code}}</h3> --}}
                    <h2 class="name-document">{{$language->name}}</h2>
                    <div class="languege-type">
                        <b>Ngôn ngữ: </b>
                        <div class="radio-inputs">
                            @foreach ($type_language as $item)
                                <label class="type">
                                    <input type="radio" name="type" id="type" value="{{$item->type}}" {{$item->type == $language->type ? 'checked' : ''}} onclick="call_language('{{$language->document->slug}}', {{$item->type}})">
                                    <span class="name">
                                        @if ($item->type == 1)
                                            Tiếng Việt
                                        @elseif ($item->type ==2)
                                            Tiếng Anh
                                        @else
                                            Tiếng Trung
                                        @endif
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>



                    <div class="details">
                        <p class="author">
                            <b>Tác giả:</b> {{$language->document->author}}
                        </p>
                        <p class="author">
                            <b>Danh mục:</b> {{$language->document->category->name}}
                        </p>
                        <p class="price">
                            <b>Giá:</b> <span class="price-document">{{number_format($language->price)}}</span> VND
                        </p>
                        <p class="description">
                            <b>Mô tả ngắn:</b> <span class="description-document">{{$language->description}}</span>
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".buy-document">Mua sách</button>


                </div>
            </div>

            <div class="box-decription">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active content-document" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! $language->content ?  $language->content : 'Nội dung bài viết đang được cập nhật'!!}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade buy-document" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <h2 class="title text-center">Liên hệ</h2>
                    <ul>
                        <li>
                            <span>Số điện thoại:</span>
                            <a href="tel:{{$phone->value}}" target="_blank">
                                <i class="fa-solid fa-phone"></i> {{$phone->value}}
                            </a>
                        </li>
                        <li>
                            <span>Zalo:</span>
                            <a href="{{$zalo->value}}" target="_blank">
                                <img src="{{asset('web/asset/images/zalo-icon.png')}}" alt="" style="width: 16px;"> Zalo
                            </a>
                        </li>
                        <li>
                            <span>Facebook:</span>
                            <a href="{{$facebook->value}}" target="_blank">
                                <i class="fa-brands fa-facebook"></i> Facebook</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Large modal -->


@endsection

@push('scripts')
    <script type="text/javascript">
    console.log('abc');
        function call_language(document_slug, type){
            $.ajax({
                    type: 'get',
                    url: '{{route('w.document_type')}}',
                    data: {
                        'document_slug': document_slug,
                        'type': type
                    },
                    success:function(data){
                        var res = JSON.parse(data);
                        console.log(res);
                        $(".name-document").html(res.name);
                        $(".price-document").html(format(res.price));
                        $(".description-document").html(res.description);
                        $(".content-document").html(res.content);

                    }
            });
            // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        }
    </script>

@endpush


