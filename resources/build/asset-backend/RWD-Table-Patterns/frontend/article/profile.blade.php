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
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ $user->name }}"
                                    class="bg-white absolute object-cover w-full h-full" />
                            </picture>
                        </div>
                        <div>
                            <div class="md:text-2xl font-bold capitalize mb-1">
                                {{ $user->name }}
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
                    <div class="py-6">
                        <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Nama</div>
                                <div class="text-sm">
                                    {{ $user->name }}
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Telepon</div>
                                <div class="text-sm">
                                    {{ $user->no_hp }}
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Email</div>
                                <div class="text-sm">
                                    {{ $user->email }}
                                </div>
                            </fieldset>
                            <fieldset>
                                <button type="button"
                                    class="text-xs font-medium border-[1px] border-slate-500 text-slate-600 px-2.5 py-1.5 rounded-full hover:text-slate-800 hover:bg-slate-100/25"
                                    data-bs-toggle="modal" data-bs-target="#modalProfil">
                                    <i class="las la-pen"></i> Lengkapi profil
                                </button>
                            </fieldset>
                            <fieldset>
                                <form action="{{ route('update.avatar') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <label for="avatar" class="btn btn-primary">Update Foto Profile</label>
                                    <input type="file" id="avatar" name="avatar" style="display: none;"
                                        onchange="form.submit()">
                                </form>
                            </fieldset>

                        </div>
                    </div>
                    <div class="border-t py-6">
                        <fieldset class="mb-4">
                            <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Propinsi</div>
                            <div class="text-sm">
                                {{ $user->propinsi }}
                            </div>
                        </fieldset>
                        <fieldset class="mb-4">
                            <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Kota / Kabupaten</div>
                            <div class="text-sm">
                                {{ $user->kota }}
                            </div>
                        </fieldset>
                        <fieldset class="mb-4">
                            <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Alamat</div>
                            <div class="text-sm">
                                {{ $user->alamat }}
                            </div>
                        </fieldset>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Jenis Usaha</div>
                                <div class="text-sm">
                                    {{ $user->institusi }}
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Nama Usaha</div>
                                <div class="text-sm">
                                    {{ $user->nama_usaha }}
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="text-xs mb-1 uppercase tracking-[1px] text-slate-500">Alamat Usaha</div>
                                <div class="text-sm">
                                    {{ $user->alamat_usaha }}
                                </div>
                            </fieldset>
                            {{-- <fieldset>
                            <button type="button"
                                class="text-xs font-medium border-[1px] border-slate-500 text-slate-600 px-2.5 py-1.5 rounded-full hover:text-slate-800 hover:bg-slate-100/25"
                                data-bs-toggle="modal" data-bs-target="#modalInformasi">
                                <i class="las la-marker"></i> Ubah informasi
                            </button>
                        </fieldset> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalInformasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="nameModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable max-w-2xl">
            <form class="modal-content" method="post" action="{{ route('frontend.profile-update-information') }}">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Informasi</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Institusi</label>
                        <select name="institusi" class="form-control selectModal-institusi" aria-hidden="true"
                            data-placeholder="Pilih">
                            <option>Pilih Institusi</option>
                            <option value="Perorangan"{{ $user->institusi == 'Perorangan' ? ' selected="selected"' : '' }}>
                                Perorangan</option>
                            <option value="Poktan"{{ $user->institusi == 'Poktan' ? ' selected="selected"' : '' }}>Poktan
                            </option>
                            <option value="UMKM"{{ $user->institusi == 'UMKM' ? ' selected="selected"' : '' }}>UMKM
                            </option>
                            <option value="Yayasan"{{ $user->institusi == 'Yayasan' ? ' selected="selected"' : '' }}>
                                Yayasan</option>
                            <option value="Koperasi"{{ $user->institusi == 'Koperasi' ? ' selected="selected"' : '' }}>
                                Koperasi</option>
                            <option value="PT"{{ $user->institusi == 'PT' ? ' selected="selected"' : '' }}>PT
                            </option>
                            <option value="CV"{{ $user->institusi == 'CV' ? ' selected="selected"' : '' }}>CV
                            </option>
                            <option value="Korporasi"{{ $user->institusi == 'Korporasi' ? ' selected="selected"' : '' }}>
                                Korporasi</option>
                            <option value="Petani"{{ $user->institusi == 'Petani' ? ' selected="selected"' : '' }}>Petani
                            </option>
                            <option value="Lainnya"{{ $user->institusi == 'Lainnya' ? ' selected="selected"' : '' }}>
                                Lainnya</option>
                        </select>
                    </fieldset>
                    <fieldset class="mb-3">
                        {{--
                    <div class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Alamat</label>
                        <select id="searchModal-address" class="form-control" aria-hidden="true"
                            data-placeholder="Cari kelurahan atau kecamatan">
                            <option></option>
                            <option value="opt-address-1">Buyungsari, Kabupaten Purwakarta, Jawa Barat</option>
                            <option value="opt-address-2">Leuwiliang, Kabupaten Bogor, Jawa Barat</option>
                        </select>
                    </div>
                    --}}
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Propinsi</label>
                            <select name="propinsi" id="selectPropinsi" class="form-control selectModal-propinsi"
                                aria-hidden="true" data-placeholder="Pilih Propinsi">
                                <option>Pilih Propinsi</option>
                                @foreach ($propinsi as $item)
                                    <option
                                        value="{{ $item }}"{{ $item == $user->propinsi ? ' selected="selected"' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Kota/Kabupaten</label>
                            <select name="kota" id="selectKota" class="form-control selectModal-kota-nosearch"
                                aria-hidden="true" data-placeholder="Pilih Kota">
                                <option>Pilih Kota/Kabupaten</option>
                                @foreach ($kota as $item)
                                    <option
                                        value="{{ $item }}"{{ $item == $user->kota ? ' selected="selected"' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="detailAlamat" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Detail
                                alamat</label>
                            <textarea name="alamat" rows="3" class="form-control " id="detailAlamat"
                                placeholder="Contoh: Jalan kelak kelok, No.20">{{ $user->alamat }}</textarea>
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
            <form method="post" action="{{ route('frontend.profile-update') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title text-lg font-bold" id="nameModal">Profil</h1>
                    <button type="button" class="px-2.5 text-2xl font-medium" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body bg-slate-100/50 pb-10">
                    <fieldset class="mb-3">
                        <label for="NamaLengkap" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Nama
                            lengkap</label>
                        <input type="text" name="name" class="form-control" id="NamaLengkap"
                            value="{{ $user->name }}">
                    </fieldset>
                    {{-- <fieldset class="mb-3">
                    <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Peran</label>
                    <select class="form-control selectModal-profil-nosearch" aria-hidden="true"
                        data-placeholder="Peran">
                        <option></option>
                        <option value="opt-peran-1">Produsen</option>
                        <option value="opt-peran-2">Konsumen</option>
                        <option value="opt-peran-3">Investor</option>
                        <option value="opt-peran-4">Lainnya</option>
                    </select>
                </fieldset> --}}
                    <fieldset class="mb-3">
                        <label for="iptEmail" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Email</label>
                        <input type="email" name="email" class="form-control" id="iptEmail"
                            value="{{ $user->email }}">
                    </fieldset>
                    <fieldset class="mb-3">
                        <label for="PhoneNumber" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">No.
                            Handphone</label>
                        <div class="input-group mb-3">
                            {{-- <span class="input-group-text" id="basic-addon1">08</span> --}}
                            <input id="PhoneNumber" type="text" name="no_hp" class="form-control"
                                aria-label="PhoneNumber" value="{{ $user->no_hp }}">
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        {{--
                    <div class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Alamat</label>
                        <select id="searchModal-address" class="form-control" aria-hidden="true"
                            data-placeholder="Cari kelurahan atau kecamatan">
                            <option></option>
                            <option value="opt-address-1">Buyungsari, Kabupaten Purwakarta, Jawa Barat</option>
                            <option value="opt-address-2">Leuwiliang, Kabupaten Bogor, Jawa Barat</option>
                        </select>
                    </div>
                    --}}
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Propinsi</label>
                            <select name="propinsi" id="selectPropinsi" class="form-control selectModal-propinsi"
                                aria-hidden="true" data-placeholder="Pilih Propinsi">
                                <option>Pilih Propinsi</option>
                                @foreach ($propinsi as $item)
                                    <option
                                        value="{{ $item }}"{{ $item == $user->propinsi ? ' selected="selected"' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Kota/Kabupaten</label>
                            <select name="kota" id="selectKota" class="form-control selectModal-kota-nosearch"
                                aria-hidden="true" data-placeholder="Pilih Kota">
                                <option>Pilih Kota/Kabupaten</option>
                                @foreach ($kota as $item)
                                    <option
                                        value="{{ $item }}"{{ $item == $user->kota ? ' selected="selected"' : '' }}>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="detailAlamat" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Detail
                                alamat</label>
                            <textarea name="alamat" rows="3" class="form-control " id="detailAlamat"
                                placeholder="Contoh: Jalan kelak kelok, No.20">{{ $user->alamat }}</textarea>
                        </div>
                    </fieldset>
                    <fieldset class="mb-3">
                        <label class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Jenis Usaha</label>
                        <select name="institusi" class="form-control selectModal-institusi" aria-hidden="true"
                            data-placeholder="Pilih">
                            <option>Pilih Jenis Usaha</option>
                            <option
                                value="Perorangan"{{ $user->institusi == 'Perorangan' ? ' selected="selected"' : '' }}>
                                Perorangan</option>
                            <option value="Poktan"{{ $user->institusi == 'Poktan' ? ' selected="selected"' : '' }}>
                                Poktan</option>
                            <option value="UMKM"{{ $user->institusi == 'UMKM' ? ' selected="selected"' : '' }}>UMKM
                            </option>
                            <option value="Yayasan"{{ $user->institusi == 'Yayasan' ? ' selected="selected"' : '' }}>
                                Yayasan</option>
                            <option value="Koperasi"{{ $user->institusi == 'Koperasi' ? ' selected="selected"' : '' }}>
                                Koperasi</option>
                            <option value="PT"{{ $user->institusi == 'PT' ? ' selected="selected"' : '' }}>PT
                            </option>
                            <option value="CV"{{ $user->institusi == 'CV' ? ' selected="selected"' : '' }}>CV
                            </option>
                            <option value="Korporasi"{{ $user->institusi == 'Korporasi' ? ' selected="selected"' : '' }}>
                                Korporasi</option>
                            <option value="Petani"{{ $user->institusi == 'Petani' ? ' selected="selected"' : '' }}>
                                Petani</option>
                            <option value="Lainnya"{{ $user->institusi == 'Lainnya' ? ' selected="selected"' : '' }}>
                                Lainnya</option>
                        </select>
                    </fieldset>
                    <fieldset class="mb-3">
                        <label for="inputNamaUsaha" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Nama
                            Usaha</label>
                        <input type="text" name="nama_usaha" class="form-control" id="inputNamaUsaha"
                            value="{{ $user->nama_usaha }}">
                    </fieldset>
                    <fieldset class="mb-3">
                        <label for="detailAlamatUsaha" class="text-xs mb-1 uppercase tracking-[1px] text-slate-600">Alamat
                            Usaha</label>
                        <textarea name="alamat_usaha" rows="3" class="form-control " id="detailAlamatUsaha"
                            placeholder="Contoh: Jalan kelak kelok, No.20">{{ $user->alamat_usaha }}</textarea>
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
            // $('.selectModal-institusi').select2({
            //     dropdownParent: $('#modalInformasi'),
            //     placeholder: $(this).data('placeholder'),
            //     width: '100%',
            //     theme: 'bootstrap-5',
            // });
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
                $('.modalDetailKomoditasHapus').attr('href', '/delete-komoditas-produsen/' + komoditasId);
            });

            $('.imgDetailKomoditas').on('click', function() {
                const key = $(this).data('key');
                $('.btnDetailKomoditas-' + key).trigger('click');
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
        });
    </script>
@endsection
