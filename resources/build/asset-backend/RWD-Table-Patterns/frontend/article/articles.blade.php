@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')
@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix blogArticles blogPg" id="blogArticles">
        <div class="container">
            <div class="blogArticlesInner">
                <div class="latestNewsCard">
                    <div class="row blogWithSidebarRow">
                        @foreach ($data_articles as $da)
                            <div class="col-md-12 col-lg-4 blogWithSidebarCol">
                                <div class="latestNewsCardInner mb-4">
                                    <div class="latestNewsCardImg">
                                        <a href="{{ route('frontend.articles-detail', $da->slug) }}">
                                            <img src="{{ asset('storage/articles/' . $da->image) }}" alt="img"
                                                class="w-100 img-fluid">
                                        </a>
                                        <div class="latestNewsDate">
                                            <a href="javascript:void(0);">
                                                <h5>{{ date('d', strtotime($da->date)) }}</h5>
                                                <span>{{ date('M', strtotime($da->date)) }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="latestNewsCardInnerContent">
                                        <div class="latestNewsList">
                                            <div class="latestNewsUser">
                                                <a href="javascript:void(0);">
                                                    <i class="fa-solid fa-user"></i>
                                                    <span>by {{ $da->username }}</span>
                                                </a>
                                            </div>
                                            <div class="latestNewsMessage">
                                                <a href="javascript:void(0);">
                                                    <i class="fa-duotone fa-messages"></i><span>2 comments</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="latestNewsTxt">
                                            <h4><a
                                                    href="{{ route('frontend.articles-detail', $da->slug) }}">{{ $da->title }}</a>
                                            </h4>
                                            <p>{!! strlen($da->content) > 150 ? substr($da->content, 0, 150) . '...' : $da->content !!}</p>
                                        </div>
                                        <div class="latestNewBtn">
                                            <a class="btnCustom5 btn-1 hover-slide-down"
                                                href="{{ route('frontend.articles-detail', $da->slug) }}">
                                                <span>Read More <i class="fa-solid fa-arrow-right fa-xl"
                                                        style="color: #ffffff;"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="paginationGroup">
                    @if ($data_articles->lastPage() > 1)
                        <ul class="pagination">
                            {!! $PaginateGlobal->getPrevious($data_articles->currentPage(), $data_articles->currentPage() - 1) !!}
                            @if ($data_articles->currentPage() > 2)
                                <li class="page-item"><a class="page-link paginate" href="javacript:void(0)"
                                        data-page="{{ '1' }}">1</a></li>
                            @endif
                            @if ($data_articles->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                            @endif
                            @foreach (range(1, $data_articles->lastPage()) as $i)
                                @if ($i >= $data_articles->currentPage() - 1 && $i <= $data_articles->currentPage() + 1)
                                    @if ($i == $data_articles->currentPage())
                                        <li class="page-item"><a class="page-link active"
                                                href="javascript:void(0)">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                                data-page="{{ $i }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if ($data_articles->currentPage() < $data_articles->lastPage() - 2)
                                <li class="page-item">...</li>
                            @endif
                            @if ($data_articles->currentPage() < $data_articles->lastPage() - 1)
                                <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                        data-page="{{ $data_articles->lastPage() }}">{{ $data_articles->lastPage() }}</a>
                                </li>
                            @endif
                            {!! $PaginateGlobal->getNext(
                                $data_articles->currentPage(),
                                $data_articles->lastPage(),
                                $data_articles->currentPage() + 1,
                            ) !!}
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--blog section end-->
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
