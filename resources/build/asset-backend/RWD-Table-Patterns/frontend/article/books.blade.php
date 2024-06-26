@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')
@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix blogArticles blogPg" id="blogArticles">
        <div class="container">
            <div class="blogArticlesInner">
                <form action="{{ route('frontend.books') }}" method="get">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Judul</label>
                            {{ Form::text('judul', request()->judul, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Silahkan Masukkan Judul']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="submit" class="btnCustom5 btn-1 hover-slide-down" style="margin-top: 30px">
                                <span class="center">
                                    <samp class="btnInnerTxt">Filter</samp>
                                    <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="latestNewsCard">
                    <div class="row blogWithSidebarRow">
                        @foreach ($books as $book)
                            <div class="col-sm-6 col-md-4 col-lg-3 blogWithSidebarCol">
                                <div class="latestNewsCardInner p-3 mb-4">
                                    <div class="latestNewsCardImg">
                                        <a href="{{ $book->tipe_buku == 'gratis' ? route('frontend.book-detail', $book->file) : 'javascript:void(0)' }}"
                                            target="_blank">
                                            <img src="{{ $book->cover }}" alt="img">
                                        </a>
                                        <div class="latestNewsDate">
                                            <a href="javascript:void(0);">
                                                <h5>{{ date('d', strtotime($book->created_at)) }}</h5>
                                                <span>{{ date('M', strtotime($book->created_at)) }}</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="latestNewsCardInnerContent">
                                        <div class="latestNewsList"></div>
                                        <div class="latestNewsTxt">
                                            <h4><a href="{{ $book->tipe_buku == 'gratis' ? route('frontend.book-detail', $book->file) : 'javascript:void(0)' }}"
                                                    target="_blank">{{ $book->judul }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="paginationGroup">
                    @if ($books->lastPage() > 1)
                        <ul class="pagination">
                            {!! $PaginateGlobal->getPrevious($books->currentPage(), $books->currentPage() - 1) !!}
                            @if ($books->currentPage() > 2)
                                <li class="page-item"><a class="page-link paginate" href="javacript:void(0)"
                                        data-page="{{ '1' }}">1</a></li>
                            @endif
                            @if ($books->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                            @endif
                            @foreach (range(1, $books->lastPage()) as $i)
                                @if ($i >= $books->currentPage() - 1 && $i <= $books->currentPage() + 1)
                                    @if ($i == $books->currentPage())
                                        <li class="page-item"><a class="page-link active"
                                                href="javascript:void(0)">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                                data-page="{{ $i }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if ($books->currentPage() < $books->lastPage() - 2)
                                <li class="page-item">...</li>
                            @endif
                            @if ($books->currentPage() < $books->lastPage() - 1)
                                <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                        data-page="{{ $books->lastPage() }}">{{ $books->lastPage() }}</a></li>
                            @endif
                            {!! $PaginateGlobal->getNext($books->currentPage(), $books->lastPage(), $books->currentPage() + 1) !!}
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
