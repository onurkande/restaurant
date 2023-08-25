@extends('layouts.main')
@section('title','BLOGS')
@section('content')
    <!--=============================
        BLOG PAGE START
    ==============================-->
    <section class="tf__blog_page mt_75 xs_mt_45 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                @foreach ($records as $record)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__single_blog">
                            <div class="tf__single_blog_img">
                                <img src="{{asset('site/blogimage/'.$record->titleImage)}}" alt="author" class="img-fluid w-100">
                            </div>
                            <div class="tf__single_blog_author">
                                <div class="img">
                                    <img src="{{asset('admin/userimage/'.$record->user->image)}}" alt="author" class="img-fluid w-100">
                                </div>
                                <div class="text">
                                    <h5>{{$record->user->name}}</h5>
                                    <p>{{$record->created_at}}</p>
                                </div>
                            </div>
                            <div class="tf__single_blog_text">
                                <a class="category" href="#">{{$record->category->name}}</a>
                                <a class="title" href="{{url('/blog-details/'.$record->id)}}">{{$record->title}}</a>
                                <p>{{ Str::limit($record->content, 73) }}</p>
                                <div class="tf__single_blog_footer">
                                    <a class="read_btn" href="{{url('/blog-details/'.$record->id)}}">read more <i
                                            class="far fa-long-arrow-right"></i></a>
                                    <span><i class="far fa-comments"></i> 120</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="tf__single_blog">
                        <div class="tf__single_blog_img">
                            <img src="images/blog_1.jpg" alt="author" class="img-fluid w-100">
                        </div>
                        <div class="tf__single_blog_author">
                            <div class="img">
                                <img src="images/client_1.png" alt="author" class="img-fluid w-100">
                            </div>
                            <div class="text">
                                <h5>israt sultana</h5>
                                <p>21 Mar 2023</p>
                            </div>
                        </div>
                        <div class="tf__single_blog_text">
                            <a class="category" href="#">party</a>
                            <a class="title" href="blog_details.html">Flowers, candles and menu cards are provided</a>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam eos, odit beatae
                                sequi
                                tenetur quidem.</p>
                            <div class="tf__single_blog_footer">
                                <a class="read_btn" href="blog_details.html">read more <i
                                        class="far fa-long-arrow-right"></i></a>
                                <span><i class="far fa-comments"></i> 120</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="tf__pagination mt_50">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BLOG PAGE END
    ==============================-->
@endsection