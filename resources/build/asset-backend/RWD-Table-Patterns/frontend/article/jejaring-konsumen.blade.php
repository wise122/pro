@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')

@extends('frontend.layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
@endsection

@section('content')
    <section class="py-6 h-32 md:h-48 w-full relative overflow-hidden bg-teal-900 flex items-center">
        <img src="{{ asset('assets/images/inner-banner.png') }}" class="absolute top-0 object-cover w-full h-full opacity-60"
            alt="cover-profile" />
        <div class="container relative z-[2] text-center">
            <div
                class="text-2xl md:text-4xl font-medium tracking-tighter text-white [text-shadow:_0_1px_0_var(--tw-shadow-color)]">
                Jejaring Konsumen</div>
        </div>
    </section>
    <section class="relative -top-10">
        <div class="container">
            <div class="bg-white rounded-lg p-3 shadow-md">
                <form method="get" action="{{ route('frontend.jejaring-konsumen') }}">
                    <div class="lg:flex lg:space-x-8">
                        <div class="grow mb-3 lg:!mb-0">
                            <div>
                                <div class="lg:flex space-y-3 lg:space-y-0">
                                    <div class="relative">
                                        <select name="jenisKomoditas"
                                            class="form-select form-select-lg form-control select2-proweb-nosearch">
                                            <option value="">Semua Komoditas</option>
                                            @if ($jenisKomoditas)
                                                @foreach ($jenisKomoditas as $jenis)
                                                    <option value="{{ $jenis }}"
                                                        {{ $jenis == $selectedJenisKomoditas ? ' selected="selected"' : '' }}>
                                                        {{ $jenis }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="relative">
                                        <select name="propinsi" id="selectPropinsi"
                                            class="form-select form-select-lg form-control select2-proweb-nosearch">
                                            <option value="">Semua Propinsi</option>
                                            @if ($propinsi)
                                                @foreach ($propinsi as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $item == $selectedPropinsi ? ' selected="selected"' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="relative">
                                        <select name="kota" id="selectKota"
                                            class="form-select form-select-lg form-control select2-proweb-nosearch">
                                            <option value="">Semua Kota/Kabupaten</option>
                                            @if ($kota)
                                                @foreach ($kota as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $item == $selectedKota ? ' selected="selected"' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <input name="keyword" type="text" value="{{ $keyword }}"
                                        class="form-control text-lg px-3 py-2.5 lg:px-4 lg:py-[9px]"
                                        placeholder="Cari nama komoditas atau lokasi">
                                </div>
                            </div>
                        </div>
                        <div class="flex-none w-full lg:w-40">
                            <button type="submit" class="link-proweb-primary link-lg w-full !py-2">
                                Terapkan
                            </button>
                        </div>
                    </div>
                </form>
                <div>
                </div>
    </section>
    <section class="py-0 mb-72">
        <div class="container">
            @if (count($komoditas_konsumen) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 lg:gap-x-10 gap-y-10">

                    @foreach ($komoditas_konsumen as $komoditas)
                        <div class="bg-white h-full border rounded-lg hover:shadow-md">
                            <a href="{{ route('frontend.jejaring-konsumen-komoditas', $komoditas->id) }}">
                                <figure class="block relative aspect-video overflow-hidden">
                                    <img class="absolute object-cover w-full h-full transition hover:scale-105"
                                        src="{{ asset('storage/komoditas/' . $komoditas->photo) }}" />
                                    <figcaption
                                        class="absolute z-[2] w-full left-0 bottom-0 text-white bg-black/50 text-xs py-2.5 px-2 flex space-x-2">
                                        <i class="las la-map-marker"></i>
                                        <span class="grow">
                                            {{ $komoditas->alamat }}.
                                            {{ $komoditas->propinsi ? $komoditas->propinsi : '' }}
                                            {{ $komoditas->kota ? $komoditas->kota : '' }}
                                        </span>
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="p-3">
                                <div class="mb-2">
                                    <div class="font-bold mb-0.5 text-xl">{{ $komoditas->nama_komoditas }}</div>
                                    <div class="text-xs font-medium text-slate-500">
                                        <ul
                                            class="list-none list-inside flex flex-col flex-wrap space-y-1 lg:flex-row lg:space-y-0 lg:space-x-2">
                                            <li class="flex items-center">
                                                <i class="las la-angle-right mr-1"></i>
                                                <span>{{ $komoditas->jenis_komoditas }}</span>
                                            </li>
                                            <li class="flex items-center">
                                                <i class="las la-angle-right mr-1"></i>
                                                <span>{{ $komoditas->kategori_komoditas }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="md:flex text-sm md:space-x-4 items-center">
                                        <div>Kapasitas</div>
                                        <div class="font-medium flex items-center">
                                            <span class="text-lg text-slate-500 mr-1">
                                                <i class="las la-cubes"></i>
                                            </span>
                                            {{ $komoditas->produksi_kuantitas }}
                                        </div>
                                        <div class="font-medium flex items-center">
                                            <span class="text-lg text-slate-500 mr-1">
                                                <i class="las la-calendar"></i>
                                            </span>
                                            {{ $komoditas->produksi_waktu }}
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs meta-postdescription line-clamp-2 mb-3">
                                    <p>
                                        {{ $komoditas->deskripsi }}
                                    </p>
                                </div>
                                <div class="flex justify-between mb-2.5">
                                    <a href="{{ route('frontend.jejaring-konsumen-komoditas', $komoditas->id) }}"
                                        class="link-proweb-outline link-sm">
                                        Lihat detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    Komoditas belum ditemukan. Silahkan mencari dengan kriteria berbeda.
                </div>
            @endif
            {{-- <div class="py-12">
            <nav class="paginationGroup">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link paginate" href="javacript:void(0)" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item" aria-current="page">
                        <span class="page-link active">1</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link paginate" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div> --}}
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('#selectPropinsi').on('change', function() {
            const selectedValue = $('#selectPropinsi').val();
            $.ajax({
                url: '/api/cities?province=' + selectedValue,
                success: function(result) {
                    const arrOptions = $.parseJSON(result);
                    $("#selectKota").empty();
                    arrOptions.forEach((element) => {
                        const optionItem = '<option value="' + element + '">' +
                            element + '</option>';
                        $("#selectKota").append(optionItem);
                    });
                }
            });
        });
    </script>
@endsection
