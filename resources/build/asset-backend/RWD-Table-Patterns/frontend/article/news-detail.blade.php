@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix blogSingle" id="blogSingle">
        <div class="container">
            <div class="blogSingleInner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blogSingleBlog">
                            <div class="latestNewsCardInner">
                                <div class="latestNewsCardImg">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('storage/news/' . $data_news->image) }}" alt="img"
                                            class="h-25 w-100">
                                    </a>
                                    <div class="latestNewsDate">
                                        <a href="javascript:void(0);">
                                            <h5>{{ date('d', strtotime($data_news->date)) }}</h5>
                                            <span>{{ date('M', strtotime($data_news->date)) }}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="latestNewsCardInnerContent">
                                    <div class="latestNewsList">
                                        <div class="latestNewsUser">
                                            <a href="javascript:void(0);">
                                                <i class="fa-solid fa-user"></i><span>by {{ $data_news->username }}</span>
                                            </a>
                                        </div>
                                        <div class="latestNewsMessage">
                                            <a href="javascript:void(0);">
                                                <i class="fa-duotone fa-messages"></i><span>2 comments</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="latestNewsTxt">
                                        <h4><a href="javascript:void(0);">{{ $data_news->title }}</a></h4>
                                        <p>{!! $data_news->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
