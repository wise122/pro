@extends('frontend.layouts.app')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/prof.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
@endsection

@section('content')
    <div class="container max-w-6xl px-0 shadow-md">
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
                <div class="w-full md:w-72 flex-none">
                    @include('frontend.layouts.side-menu')
                </div>
                <div class="grow px-3 md:px-8 pb-10">
                    <div class="border-t py-4">
                        <div class="text-xs mb-2.5 uppercase tracking-[1px] text-slate-500">Komoditas</div>
                        @if ($komoditasInvestor)
                            <div class="grid md:grid-cols-2 gap-x-6 lg:gap-x-10 gap-y-10">
                                @foreach ($komoditasInvestor as $key => $komoditas)
                                    <div class="bg-white h-full border rounded-lg hover:shadow-md">
                                        <a class="imgDetailKomoditas" href="#modalDetailKomoditas" data-bs-toggle="modal"
                                            data-key="{{ $key }}">
                                            <figure class="block relative aspect-video overflow-hidden">
                                                <img class="detailKomoditasPhoto-{{ $key }} absolute object-cover w-full h-full transition hover:scale-105"
                                                    src="{{ asset('storage/komoditas/' . $komoditas->photo) }}" />
                                                <figcaption
                                                    class="absolute z-[2] w-full left-0 bottom-0 text-white bg-black/50 text-xs py-2.5 px-2 flex space-x-2">
                                                    <i class="las la-map-marker"></i>
                                                    <span class="grow detailKomoditasLokasi-{{ $key }}">
                                                        {{ $komoditas->alamat }}
                                                    </span>
                                                </figcaption>
                                            </figure>
                                        </a>
                                        <div class="p-3">
                                            <div class="mb-2">
                                                <div
                                                    class="font-bold mb-0.5 text-xl detailKomoditasNama-{{ $key }}">
                                                    {{ $komoditas->nama_komoditas }}</div>
                                                <div class="text-xs font-medium text-slate-500">
                                                    <ul
                                                        class="list-none list-inside flex flex-col flex-wrap space-y-1 lg:flex-row lg:space-y-0 lg:space-x-2">
                                                        <li class="flex items-center">
                                                            <i class="las la-angle-right mr-1"></i>
                                                            <span
                                                                class="detailKomoditasJenis-{{ $key }}">{{ $komoditas->jenis_komoditas }}</span>
                                                        </li>
                                                        <li class="flex items-center">
                                                            <i class="las la-angle-right mr-1"></i>
                                                            <span
                                                                class="detailKomoditasKategori-{{ $key }}">{{ $komoditas->kategori_komoditas }}</span>
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
                                                        <span
                                                            class="detailKomoditasKuantitas-{{ $key }}">{{ $komoditas->produksi_kuantitas }}</span>
                                                    </div>
                                                    <div class="font-medium flex items-center">
                                                        <span class="text-lg text-slate-500 mr-1">
                                                            <i class="las la-calendar"></i>
                                                        </span>
                                                        <span
                                                            class="detailKomoditasWaktu-{{ $key }}">{{ $komoditas->produksi_waktu }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-xs meta-postdescription line-clamp-2 mb-3">
                                                <p class="detailKomoditasDeskripsi-{{ $key }}">
                                                    {{ $komoditas->deskripsi }}
                                                </p>
                                            </div>
                                            <div class="flex justify-between mb-2.5">
                                                <button type="button"
                                                    class="btnDetailKomoditas btnDetailKomoditas-{{ $key }} link-proweb-outline link-sm"
                                                    data-bs-toggle="modal" data-bs-target="#modalDetailKomoditas"
                                                    data-key="{{ $key }}"
                                                    data-komoditas-id="{{ $komoditas->id }}">
                                                    Lihat detail
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="bg-slate-100/25 h-full border rounded-md">
                                    <button type="button"
                                        class="text-sm h-full w-full font-medium text-slate-600 px-2.5 py-3 hover:text-slate-800 hover:bg-slate-100/25"
                                        data-bs-toggle="modal" data-bs-target="#modalKomoditasTambah">
                                        <i class="las la-plus"></i> Tambah komoditas
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKomoditasTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="nameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable max-w-2xl">
            <form method="post" action="{{ route('frontend.submit-komoditas-investor') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Tambah Komoditas</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Jenis Komoditas</label>
                            <select name="jenis_komoditas" id="selectJenisKomoditas"
                                class="form-control selectModal-komoditas-nosearch" aria-hidden="true"
                                data-placeholder="Pilih">
                                <option value=""></option>
                                @foreach ($jenisKomoditas as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Kategori</label>
                            <select name="kategori_komoditas" id="selectKategoriKomoditas"
                                class="form-control selectModal-komoditas-nosearch" aria-hidden="true"
                                data-placeholder="Pilih">
                                <option></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="NamaKomoditas" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Nama
                                Komoditas</label>
                            <input name="nama_komoditas" type="text" class="form-control" id="NamaKomoditas"
                                placeholder="Contoh: Beras">
                        </div>
                        <div class="mb-3">
                            <label for="Alamat"
                                class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Lokasi</label>
                            <select name="propinsi" id="selectPropinsi"
                                class="form-control selectModal-propinsi-nosearch" aria-hidden="true"
                                data-placeholder="Pilih Propinsi">
                                <option>Pilih Propinsi</option>
                                @foreach ($propinsi as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <select name="kota" id="selectKota" class="form-control selectModal-kota-nosearch"
                                aria-hidden="true" data-placeholder="Pilih Kota">
                                <option>Pilih Kota/Kabupaten</option>
                            </select>
                            <input name="alamat" type="text" class="form-control" id="Alamat"
                                placeholder="Contoh: Nama Daerah">
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        <div class="grid md:grid-cols-3 gap-x-10 items-center">
                            <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">
                                Produksi Komoditas
                            </div>
                            <div>
                                <label class="text-xs text-slate-600">Kuantitas</label>
                                <div class="input-group mb-3">
                                    <input name="produksi_kuantitas" type="number" class="form-control px-[10px] py-0"
                                        value="1" placeholder="1">
                                    <div class="relative">
                                        <select name="produksi_kuantitas_unit"
                                            class="form-select form-control selectModal-komoditas-nosearch">
                                            <option value="Ton">Ton</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ekor">Ekor</option>
                                            <option value="Unit">Unit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="text-xs text-slate-600">Waktu</label>
                                <div class="input-group mb-3">
                                    <input name="produksi_waktu" type="number" class="form-control px-[10px] py-0"
                                        value="1" placeholder="1">
                                    <div class="relative">
                                        <select name="produksi_waktu_unit"
                                            class="form-select form-control selectModal-komoditas-nosearch">
                                            <option value="hari">hari</option>
                                            <option value="bulan">bulan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        <div class="text-xs mb-2 uppercase tracking-[1px] text-slate-600">Deskripsi</div>
                        <textarea name="deskripsi" class="form-control" rows="3"
                            placeholder="Tuliskan detail produksi komoditas Anda"></textarea>
                    </fieldset>
                    <fieldset class="mb-3">
                        <div class="text-xs mb-2 uppercase tracking-[1px] text-slate-600">Foto produksi</div>
                        <div class="grid grid-cols-2 gap-x-8 gap-y-8">
                            <div class="bg-white h-full border rounded-md ratio ratio-16x9">
                                <label class="h-full w-full flex flex-col place-content-center items-center">
                                    <span class="sr-only">Tambah foto</span>
                                    <input name="photo" type="file" class="hidden" />
                                    <span class="mb-1">
                                        <i class="las la-image mr-2"></i> Tambahkan foto
                                    </span>
                                    <span class="italic text-[10px] text-slate-500">
                                        * Maksimal file 10 Mb, Ukuran 720 x 405 pixel
                                    </span>
                                </label>
                                <!-- <button
                    type="button"
                    class="text-sm h-full w-full font-medium text-slate-600 px-2.5 py-3 hover:text-green-800 hover:bg-slate-100/25"
                    data-bs-toggle="modal" data-bs-target="#modalKomoditasTambah">
                    <i class="las la-image"></i> Tambahkan foto
                   </button> -->
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer space-x-4 px-4">
                    <button type="button" class="text-slate-500 px-3 hover:text-slate-700"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit"
                        class="font-medium border-[1px] bg-green-100/25 border-green-800 text-green-800 px-4 py-2 rounded-full hover:text-white hover:bg-green-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalInformasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="nameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable max-w-2xl">
            <form class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Informasi</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Institusi</label>
                        <select class="form-control selectModal-institusi" aria-hidden="true" data-placeholder="Pilih">
                            <option></option>
                            <option value="opt-institusi-1">Perorangan</option>
                            <option value="opt-institusi-2">Poktan</option>
                            <option value="opt-institusi-3">UMKM</option>
                            <option value="opt-institusi-4">Yayasan</option>
                            <option value="opt-institusi-5">Koperasi</option>
                            <option value="opt-institusi-6">PT</option>
                            <option value="opt-institusi-7">CV</option>
                            <option value="opt-institusi-8">Korporasi</option>
                            <option value="opt-institusi-9">Petani</option>
                            <option value="opt-institusi-10">Lainnya</option>
                        </select>
                    </fieldset>
                    <fieldset class="mb-3">
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Alamat</label>
                            <select id="searchModal-address" class="form-control" aria-hidden="true"
                                data-placeholder="Cari kelurahan atau kecamatan">
                                <option></option>
                                <option value="opt-address-1">Buyungsari, Kabupaten Purwakarta, Jawa Barat</option>
                                <option value="opt-address-2">Leuwiliang, Kabupaten Bogor, Jawa Barat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="detailAlamat" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Detail
                                alamat</label>
                            <textarea rows="3" class="form-control " id="detailAlamat" placeholder="Contoh: Jalan kelak kelok, No.20"></textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer space-x-4 px-4">
                    <button type="button" class="text-slate-500 px-3 hover:text-slate-700"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit"
                        class="font-medium border-[1px] bg-green-100/25 border-green-800 text-green-800 px-4 py-2 rounded-full hover:text-white hover:bg-green-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="nameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable max-w-2xl">
            <form class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Profil</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <label for="NamaLengkap" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Nama
                            lengkap</label>
                        <input type="text" class="form-control" id="NamaLengkap">
                    </fieldset>
                    <fieldset class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Peran</label>
                        <select class="form-control selectModal-profil-nosearch" aria-hidden="true"
                            data-placeholder="Peran">
                            <option></option>
                            <option value="opt-peran-1">Produsen</option>
                            <option value="opt-peran-2">Konsumen</option>
                            <option value="opt-peran-3">Investor</option>
                            <option value="opt-peran-4">Lainnya</option>
                        </select>
                    </fieldset>
                    <fieldset class="mb-3">
                        <label for="iptEmail" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Email</label>
                        <input type="email" class="form-control" id="iptEmail">
                    </fieldset>
                    <fieldset class="mb-3">
                        <label for="PhoneNumber" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">No.
                            Handphone</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">08</span>
                            <input id="PhoneNumber" type="text" class="form-control" aria-label="PhoneNumber">
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer space-x-4 px-4">
                    <button type="button" class="text-slate-500 px-3 hover:text-slate-700"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit"
                        class="font-medium border-[1px] bg-green-100/25 border-green-800 text-green-800 px-4 py-2 rounded-full hover:text-white hover:bg-green-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalDetailKomoditas" tabindex="-1" aria-labelledby="nameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable max-w-2xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Detail Komoditas</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <label class="text-xs uppercase tracking-[1px] text-slate-600">Nama Komoditas</label>
                        <div class="py-0.5 text-lg font-medium modalDetailKomoditasNama">
                            Beras
                        </div>
                    </fieldset>
                    <div class="grid md:grid-cols-2 gap-x-8">
                        <fieldset class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-600">Jenis Komoditas</label>
                            <div class="font-medium text-sm modalDetailKomoditasJenis">
                                Tanaman Pangan
                            </div>
                        </fieldset>
                        <fieldset class="mb-3">
                            <label class="text-xs uppercase tracking-[1px] text-slate-600">Kategori</label>
                            <div class="font-medium text-sm modalDetailKomoditasKategori">
                                Olahan
                            </div>
                        </fieldset>
                    </div>
                    <fieldset class="mb-3">
                        <figure class="block relative aspect-video overflow-hidden">
                            <img class="modalDetailKomoditasPhoto absolute object-cover w-full h-full transition hover:scale-105"
                                src="{{ asset('assets/images/sample-img-produsen-tanamanpangan.jpg') }}" />
                        </figure>
                    </fieldset>
                    <div class="grid md:grid-cols-3 gap-x-10 items-center">
                        <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">
                            Produksi Komoditas
                        </div>
                        <fieldset class="mb-3">
                            <label class="text-xs text-slate-600">Kuantitas</label>
                            <div class="font-medium text-sm modalDetailKomoditasKuantitas">
                                1 Ton
                            </div>
                        </fieldset>
                        <fieldset class="mb-3">
                            <label class="text-xs text-slate-600">Waktu</label>
                            <div class="font-medium text-sm modalDetailKomoditasWaktu">
                                25 Hari
                            </div>
                        </fieldset>
                    </div>
                    <fieldset class="mb-3">
                        <label class="text-xs uppercase tracking-[1px] text-slate-600">Lokasi</label>
                        <div class="font-medium text-sm modalDetailKomoditasLokasi">
                            Alamat disini
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        <label class="text-xs uppercase tracking-[1px] text-slate-600">Deskripsi</label>
                        <div class="text-sm py-0.5 mb-3">
                            <p class="modalDetailKomoditasDeskripsi">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived
                                not only five centuries, but also the leap into electronic typesetting, remaining
                                essentially unchanged
                            </p>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer !justify-between px-2">
                    <a href="" onclick="return confirm('Yakin ingin menghapus ini?')"
                        class="bg-red-500 text-white px-3 hover:bg-red-700 py-2 rounded-md modalDetailKomoditasHapus">
                        <i class="las la-trash-alt"></i> Hapus
                    </a>
                    <button type="button" class="text-slate-500 px-3 hover:text-slate-700"
                        data-bs-dismiss="modal">Tutup</button>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Select 2 load on modal informasi
            $('#searchModal-address').select2({
                dropdownParent: $('#modalInformasi'),
                placeholder: $(this).data('placeholder'),
                width: '100%',
                theme: 'bootstrap-5',
            });
            $('.selectModal-institusi').select2({
                dropdownParent: $('#modalInformasi'),
                placeholder: $(this).data('placeholder'),
                width: '100%',
                theme: 'bootstrap-5',
            });
            // Select 2 load on modal profil
            $('.selectModal-profil-nosearch').select2({
                dropdownParent: $('#modalProfil'),
                placeholder: $(this).data('placeholder'),
                width: '100%',
                theme: 'bootstrap-5',
            });
            // Select 2 load on modal komoditas
            $('.selectModal-komoditas').select2({
                dropdownParent: $('#modalKomoditasTambah'),
                placeholder: $(this).data('placeholder'),
                width: '100%',
                theme: 'bootstrap-5',
            });
            $('.selectModal-komoditas-nosearch').select2({
                dropdownParent: $('#modalKomoditasTambah'),
                placeholder: $(this).data('placeholder'),
                width: '100%',
                theme: 'bootstrap-5',
                minimumResultsForSearch: -1,
            });


            $('#selectJenisKomoditas').on('change', function() {
                const selectedJeniKomoditas = $('#selectJenisKomoditas').val();
                $.ajax({
                    url: '/api/jenis-komoditas-filter?key=' + selectedJeniKomoditas,
                    success: function(result) {
                        const arrOptions = $.parseJSON(result);
                        $("#selectKategoriKomoditas").empty();
                        arrOptions.forEach((element) => {
                            const optionItem = '<option value="' + element + '">' +
                                element + '</option>';
                            $("#selectKategoriKomoditas").append(optionItem);
                        });
                    }
                });
            });

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

            $('.btnDetailKomoditas').on('click', function() {
                const key = $(this).data('key');
                const komoditasId = $(this).data('komoditas-id');

                const detailKomoditasPhoto = $('.detailKomoditasPhoto-' + key).attr('src');
                const detailKomoditasNama = $('.detailKomoditasNama-' + key).text();
                const detailKomoditasJenis = $('.detailKomoditasJenis-' + key).text();
                const detailKomoditasKategori = $('.detailKomoditasKategori-' + key).text();
                const detailKomoditasKuantitas = $('.detailKomoditasKuantitas-' + key).text();
                const detailKomoditasWaktu = $('.detailKomoditasWaktu-' + key).text();
                const detailKomoditasDeskripsi = $('.detailKomoditasDeskripsi-' + key).text();
                const detailKomoditasLokasi = $('.detailKomoditasLokasi-' + key).text();

                $('.modalDetailKomoditasPhoto').attr('src', detailKomoditasPhoto);
                $('.modalDetailKomoditasNama').text(detailKomoditasNama);
                $('.modalDetailKomoditasJenis').text(detailKomoditasJenis);
                $('.modalDetailKomoditasKategori').text(detailKomoditasKategori);
                $('.modalDetailKomoditasKuantitas').text(detailKomoditasKuantitas);
                $('.modalDetailKomoditasWaktu').text(detailKomoditasWaktu);
                $('.modalDetailKomoditasDeskripsi').text(detailKomoditasDeskripsi);
                $('.modalDetailKomoditasLokasi').text(detailKomoditasLokasi);
                $('.modalDetailKomoditasHapus').attr('href', '/delete-komoditas-investor/' + komoditasId);
            });

            $('.imgDetailKomoditas').on('click', function() {
                const key = $(this).data('key');
                $('.btnDetailKomoditas-' + key).trigger('click');
            });
        });
    </script>
@endsection
