@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')

@extends('frontend.layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
@endsection

@section('content')
    <div class="container max-w-6xl px-0 shadow-md mb-64">
        <div class="h-32 md:h-48 w-full relative overflow-hidden">
            <img src="{{ asset('assets/images/inner-banner.png') }}" class="absolute object-cover w-full h-full"
                alt="cover-profile" />
        </div>
        <div class="bg-white">
            <div class="px-3 lg:px-4 border-bottom">
                <div class="flex items-center justify-between py-3 pb-3">
                    <div class="grow pl-20 md:pl-28 relative">
                        <div class="absolute left-0 bottom-0">
                            <picture class="border rounded-full block relative h-16 w-16 md:h-24 md:w-24 overflow-hidden">
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}"
                                    class="bg-white absolute object-cover w-full h-full" />
                            </picture>
                        </div>
                        <div>
                            <div class="md:text-2xl font-bold capitalize mb-1">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('frontend.logout') }}" content="{{ csrf_token() }}"
                            class="text-xs font-medium border-[1px] border-red-500 text-red-500 px-2.5 py-1.5 rounded-full hover:bg-red-100/25">
                            <i class="las la-sign-in-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:flex divide-x divide-slate-100 min-h-[320px]">
                <div class="grow px-3 md:px-8 pb-10">
                    <div class="py-6">
                        <div class="text-xs mb-4 text-center uppercase tracking-[1px] text-slate-500">Sertifikasi Bimbingan
                            Teknis Sosial</div>
                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-8">
                            @foreach ($peserta_bts as $row)
                                <div class="bg-slate-100/25 h-full w-full border rounded-md hover:bg-white hover:shadow-lg">
                                    <figure class="aspect-video relative">
                                        <img class="absolute object-cover w-full h-full"
                                            src="{{ asset('storage/bts-schedule/' . $row->cover) }}"
                                            alt="{{ $row->judul }}" />
                                    </figure>
                                    <div class="p-3">
                                        <div class="text font-bold text-center capitalize mb-3">{{ $row->judul }}</div>
                                        <div class="mb-3">
                                            <div class="text-xs uppercase tracking-[1px] text-slate-500"><i
                                                    class="las la-calendar"></i> Mulai</div>
                                            <div class="text-sm font-medium">
                                                {{ date('d-m-Y H:i:s', strtotime($row->pelaksanaan_awal)) }}</div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="text-xs uppercase tracking-[1px] text-slate-500"><i
                                                    class="las la-calendar-check"></i> Selesai</div>
                                            <div class="text-sm font-medium">
                                                {{ date('d-m-Y H:i:s', strtotime($row->pelaksanaan_akhir)) }}</div>
                                        </div>
                                        <div class="py-2">
                                            @if ($row->pelaksanaan_akhir < date('Y-m-d H:i:s'))
                                                <a href="{{ route('frontend.bts-certificate', $row->uuid) }}"
                                                    target="_blank"
                                                    class="text-sm lg:text-[15px] w-full block text-center font-medium border-[1px] border-slate-500 text-slate-600 px-2.5 py-2 rounded-full hover:text-teal-800 hover:bg-teal-100/25">
                                                    <i class="las la-file-pdf"></i> Lihat Sertifikat
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="paginationGroup">
                            @if ($peserta_bts->lastPage() > 1)
                                <ul class="pagination">
                                    {!! $PaginateGlobal->getPrevious($peserta_bts->currentPage(), $peserta_bts->currentPage() - 1) !!}
                                    @if ($peserta_bts->currentPage() > 2)
                                        <li class="page-item"><a class="page-link paginate" href="javacript:void(0)"
                                                data-page="{{ '1' }}">1</a></li>
                                    @endif
                                    @if ($peserta_bts->currentPage() > 3)
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    @endif
                                    @foreach (range(1, $peserta_bts->lastPage()) as $i)
                                        @if ($i >= $peserta_bts->currentPage() - 1 && $i <= $peserta_bts->currentPage() + 1)
                                            @if ($i == $peserta_bts->currentPage())
                                                <li class="page-item"><a class="page-link active"
                                                        href="javascript:void(0)">{{ $i }}</a>
                                                </li>
                                            @else
                                                <li class="page-item"><a class="page-link paginate"
                                                        href="javascript:void(0)"
                                                        data-page="{{ $i }}">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($peserta_bts->currentPage() < $peserta_bts->lastPage() - 2)
                                        <li class="page-item">...</li>
                                    @endif
                                    @if ($peserta_bts->currentPage() < $peserta_bts->lastPage() - 1)
                                        <li class="page-item"><a class="page-link paginate" href="javascript:void(0)"
                                                data-page="{{ $peserta_bts->lastPage() }}">{{ $peserta_bts->lastPage() }}</a>
                                        </li>
                                    @endif
                                    {!! $PaginateGlobal->getNext(
                                        $peserta_bts->currentPage(),
                                        $peserta_bts->lastPage(),
                                        $peserta_bts->currentPage() + 1,
                                    ) !!}
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
