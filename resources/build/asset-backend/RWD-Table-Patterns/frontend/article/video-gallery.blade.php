@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')
@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix blogArticles blogPg" id="blogArticles">
        <div class="container">
            <div class="blogArticlesInner">
                <div class="d-flex row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card">
                            <form class="p-3" action="{{ route('frontend.bts') }}" method="get">
                                <div class="row">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        {{ Form::text('judul', request()->judul, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Silahkan Masukkan Judul']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Episode</label>
                                        {{ Form::text('episode', request()->episode, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Silahkan Masukkan Episode']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        {{ Form::date('tanggal', request()->tanggal, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Silahkan Masukkan Tanggal', 'id' => 'date']) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button type="submit" class="btnCustom5 btn-1 hover-slide-down"
                                            style="margin-top: 30px">
                                            <span class="center">
                                                <samp class="btnInnerTxt">Filter</samp>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-9">
                        <div class="latestNewsCard">
                            <div class="row blogWithSidebarRow">
                                @foreach ($data_bts as $video)
                                    <div class="col-md-12 col-lg-4 blogWithSidebarCol">
                                        <div class="latestNewsCardInner mb-4">
                                            <div class="latestNewsCardImg">
                                                <a href="javascript:void(0)" class="flVideo youtube-link"
                                                    youtubeid="{{ $video->youtube_id }}">
                                                    @if ($video->cover != 'no-cover.png')
                                                        <img src="{{ asset('storage/bts/' . $video->cover) }}"
                                                            alt="banner" class="w-100 img-fluid">
                                                    @else
                                                        <img src="{{ asset('assets/images/propaktani12.jpg') }}"
                                                            alt="banner" class="w-100 img-fluid">
                                                    @endif
                                                </a>
                                                <div class="latestNewsDate">
                                                    <a href="javascript:void(0);" class="flVideo youtube-link"
                                                        youtubeid="{{ $video->youtube_id }}">
                                                        <h5>Eps</h5>
                                                        <span>{{ $video->episode }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="latestNewsCardInnerContent">
                                                <div class="latestNewsList">
                                                    <div class="latestNewsUser">
                                                        <a href="javascript:void(0);" class="flVideo youtube-link"
                                                            youtubeid="{{ $video->youtube_id }}">
                                                            <img src="{{ asset('assets/images/icon/calendar.png') }}"
                                                                alt="calendar"
                                                                class="img-fluid"><span>{{ date('d M Y', strtotime($video->tanggal)) }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="latestNewsTxt">
                                                    <h4><a href="javascript:void(0)" class="flVideo youtube-link"
                                                            youtubeid="{{ $video->youtube_id }}">{{ $video->judul }}</a>
                                                    </h4>
                                                </div>
                                                <div class="latestNewBtn">
                                                    <a href="javascript:void(0)"
                                                        class="btnCustom5 btn-3 hover-slide-down flVideo youtube-link"
                                                        youtubeid="{{ $video->youtube_id }}">
                                                        <span>Play <img
                                                                src="{{ asset('assets/images/icon/white-play.png') }}"
                                                                alt="play" class="img-fluid"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="paginationGroup">
                    @if ($data_bts->lastPage() > 1)
                        <ul class="pagination">
                            {!! $PaginateGlobal->getPrevious($data_bts->currentPage(), $data_bts->currentPage() - 1) !!}
                            @if ($data_bts->currentPage() > 2)
                                <li class="page-item"><a class="page-link paginate" href="javacript:void(0)"
                                        data-page="{{ '1' }}">1</a></li>
                            @endif
                            @if ($data_bts->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                            @endif
                            @foreach (range(1, $data_bts->lastPage()) as $i)
                                @if ($i >= $data_bts->currentPage() - 1 && $i <= $data_bts->currentPage() + 1)
                                    @if ($i == $data_bts->currentPage())
                                        <li class="page-item"><a class="page-link active"
                                                href="javascript:void(0)">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                                data-page="{{ $i }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if ($data_bts->currentPage() < $data_bts->lastPage() - 2)
                                <li class="page-item">...</li>
                            @endif
                            @if ($data_bts->currentPage() < $data_bts->lastPage() - 1)
                                <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                        data-page="{{ $data_bts->lastPage() }}">{{ $data_bts->lastPage() }}</a></li>
                            @endif
                            {!! $PaginateGlobal->getNext($data_bts->currentPage(), $data_bts->lastPage(), $data_bts->currentPage() + 1) !!}
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        // Pagination
        $(document).on('click', '.paginate', function(e) {
            e.preventDefault();
            var searchParams = new URLSearchParams(window.location.search);
            searchParams.set('page', '1');
            var newUrl = '?' + searchParams.toString();
            window.history.pushState({}, '', newUrl);

            let page = $(this).data('page');
            let queryString = 'page';
            getQueryString(queryString, page);
        });

        function getQueryString(queryString = '', value = '') {
            let currentUrl = window.location.href;
            if (currentUrl.indexOf("?page=") > -1) {
                if (currentUrl.indexOf(queryString) > -1) {
                    let parameters = new URLSearchParams(window.location.search);
                    let val = parameters.get(queryString);
                    if (value === '') {
                        let searchParams = new URLSearchParams(window.location.search);
                        let newURL = removeParam(queryString, currentUrl);
                        window.history.pushState({}, '', newURL);
                        getData(newURL);
                        location.reload();
                    } else {
                        if (val !== value) {
                            let searchParams = new URLSearchParams(window.location.search);
                            searchParams.set(queryString, value);
                            let newUrl = '?' + searchParams.toString();
                            window.history.pushState({}, '', newUrl);
                            getData(newUrl);
                            location.reload();
                        }
                    }
                } else {
                    let newUrl = currentUrl + '&' + queryString + '=' + value;
                    window.history.pushState({}, '', newUrl);
                    getData(newUrl);
                    location.reload();
                }
            } else {
                let newUrl = currentUrl + '?page=1&' + queryString + '=' + value;
                window.history.pushState({}, '', newUrl);
                getData(newUrl);
                location.reload();
            }
        }

        function getData(url = '') {
            if (url.indexOf("?page=1") > -1) {
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(data) {
                        $('#data').html('data');
                    }
                })
            } else {
                let currentUrl = window.location.href;
                $.ajax({
                    url: currentUrl,
                    method: "GET",
                    success: function(data) {
                        $('#data').html(data);
                    }
                });
            }
        }

        function removeParam(key, sourceURL) {
            var rtn = sourceURL.split("?")[0],
                param,
                params_arr = [],
                queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
            if (queryString !== "") {
                params_arr = queryString.split("&");
                for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                    param = params_arr[i].split("=")[0];
                    if (param === key) {
                        params_arr.splice(i, 1);
                    }
                }
                if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
            }
            return rtn;
        }
    </script>
@endsection
