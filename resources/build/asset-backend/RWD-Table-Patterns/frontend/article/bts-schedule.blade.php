@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')
@extends('frontend.layouts.app')

@section('content')
    <section class="w-100 clearfix shopSection" id="shopSection">
        <div class="container">
            <div class="shopInner">
                <div class="shopProductCard">
                    <div class="row">
                        @foreach ($bts_schedule as $bs)
                            <div class="col-sm-6 col-md-6 col-xl-3">
                                <div class="owlSlideItem">
                                    <div class="owlSlideItemImg">
                                        <div class="sliderIconMenu">
                                            <div class="sliderHotBadge"></div>
                                            <div class="heartIcon"></div>
                                        </div>
                                        <a href="{{ route('frontend.bts-schedule-detail', $bs->slug) }}">
                                            @if (!empty($bs->cover))
                                                <img src="{{ asset('storage/bts-schedule/' . $bs->cover) }}" alt=""
                                                    class="img-fluid">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt=""
                                                    class="img-fluid">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="owlSlideItemContent">
                                        <a href="{{ route('frontend.bts-schedule-detail', $bs->slug) }}">
                                            <div class="owlProductHeading">
                                                <h4>{{ $bs->judul }}</h4>
                                            </div>
                                        </a>
                                        <div class="productPrice">
                                            <ins>{{ date('j F Y', strtotime($bs->pelaksanaan_awal)) }}</ins> -
                                            <ins>{{ date('j F Y', strtotime($bs->pelaksanaan_akhir)) }}</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="paginationGroup">
                    @if ($bts_schedule->lastPage() > 1)
                        <ul class="pagination">
                            {!! $PaginateGlobal->getPrevious($bts_schedule->currentPage(), $bts_schedule->currentPage() - 1) !!}
                            @if ($bts_schedule->currentPage() > 2)
                                <li class="page-item"><a class="page-link paginate" href="javacript:void(0)"
                                        data-page="{{ '1' }}">1</a></li>
                            @endif
                            @if ($bts_schedule->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                            @endif
                            @foreach (range(1, $bts_schedule->lastPage()) as $i)
                                @if ($i >= $bts_schedule->currentPage() - 1 && $i <= $bts_schedule->currentPage() + 1)
                                    @if ($i == $bts_schedule->currentPage())
                                        <li class="page-item"><a class="page-link active"
                                                href="javascript:void(0)">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                                data-page="{{ $i }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if ($bts_schedule->currentPage() < $bts_schedule->lastPage() - 2)
                                <li class="page-item">...</li>
                            @endif
                            @if ($bts_schedule->currentPage() < $bts_schedule->lastPage() - 1)
                                <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                        data-page="{{ $bts_schedule->lastPage() }}">{{ $bts_schedule->lastPage() }}</a>
                                </li>
                            @endif
                            {!! $PaginateGlobal->getNext(
                                $bts_schedule->currentPage(),
                                $bts_schedule->lastPage(),
                                $bts_schedule->currentPage() + 1,
                            ) !!}
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--shop product end-->
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
                    var parameters = new URLSearchParams(window.location.search);
                    let val = parameters.get(queryString)
                    if (value === '') {
                        var searchParams = new URLSearchParams(window.location.search);
                        var newUrl = removeParam(queryString, currentUrl);
                        window.history.pushState({}, '', newUrl);
                        getData(newUrl);
                        location.reload();
                    } else {
                        if (val !== value) {
                            var searchParams = new URLSearchParams(window.location.search);
                            searchParams.set(queryString, value);
                            var newUrl = '?' + searchParams.toString();
                            window.history.pushState({}, '', newUrl)
                            getData(newUrl);
                            location.reload();
                        }
                    }
                } else {
                    let newUrl = currentUrl + '&' + queryString + '=' + value;
                    window.history.pushState({}, '', newUrl)
                    getData(newUrl);
                    location.reload();
                }
            } else {
                let newUrl = currentUrl + '?page=1&' + queryString + '=' + value;
                window.history.pushState({}, '', newUrl)
                getData(newUrl);
                location.reload();
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

        function getData(url = '') {
            if (url.indexOf("?page=1") > -1) {
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(data) {
                        $('#data').html(data);
                    }
                });
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
    </script>
@endsection
