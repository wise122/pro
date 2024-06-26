@inject('PaginateGlobal', 'App\Traits\PaginateGlobal')

@extends('frontend.layouts.app')

@section('content')
    <section class="container-lg">
        <div class="d-flex row g-4 g-md-4 justify-content-center">
            <div class="col-12 col-lg-2">
                <div class="bg-white rounded-lg shadow-md">
                    <form method="get" action="{{ route('frontend.jejaring-produsen') }}">
                        <div class="lg:flex space-y-3 lg:space-y-0">
                            <input name="keyword" type="text" value="{{ $keyword }}" class="form-control w-100"
                                placeholder="Cari nama komoditas atau lokasi">
                            <div class="relative mt-2">
                                <select name="jenisKomoditas" class="rounded-full select2-proweb-nosearch">
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
                            <div class="relative mt-2">
                                <select name="propinsi" id="selectPropinsi" class="rounded-full select2-proweb-nosearch">
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
                            <div class="relative mt-2">
                                <select name="kota" id="selectKota" class="rounded-full select2-proweb-nosearch">
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
                        </div>
                        <button type="submit" class="mt-2 btn btn-success w-100">
                            Terapkan
                        </button>
                    </form>
                </div>
            </div>
            @if (count($komoditas_produsen) > 0)
                <div class="col-12 col-lg-10 product-section">
                    <div class="row g-2 g-md-3 g-lg-3">
                        @foreach ($komoditas_produsen as $komoditas)
                            <a class="product-container col-12 col-md-6 col-lg-2"
                                href="{{ route('frontend.jejaring-produsen-komoditas', $komoditas->id) }}">
                                <div class="card d-flex flex-column h-100">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/komoditas/' . $komoditas->photo) }}"
                                            alt="{{ $komoditas->photo }}">
                                    </div>
                                    <div class="card-body d-flex flex-column flex-grow-1">
                                        <span class="product-title">{{ $komoditas->nama_komoditas }}</span>
                                        <span class="product-price">Rp. 100.000 / kg</span>
                                        <div class="seller-info mt-auto">
                                            <span>{{ $komoditas->kota }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-12 col-lg-10">
                    <div class="alert alert-warning" role="alert">
                        Tidak ada data yang ditemukan
                    </div>
                </div>
            @endif
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
