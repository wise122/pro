@extends('frontend.layouts.app')

@section('css')
    <style>
        .select2-container--open {
            z-index: 9999999;
        }
    </style>
@endsection

@section('content')
    <!--banner start-->
    <section class="w-100 clearfix bannerSec" id="bannerSec"
        style="background-image: url({{ asset('assets/images/inner-banner.png') }});">
        <div class="container">
            <div class="bannerContent">
                <h1>{{ $bts_schedule->judul }}</h1>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Jadwal BTS</li>
                </ul>
            </div>
        </div>
    </section>
    <!--banner end-->
    <!--Shop Single start-->
    <section class="w-100 clearfix shopSingle" id="shopSingle">
        <div class="container">
            <div class="shopSingleInner">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="productThumbnailsSlider">
                            <div id="custCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="carouselItem">
                                            @if (!empty($bts_schedule->cover))
                                                <img src="{{ asset('storage/bts-schedule/' . $bts_schedule->cover) }}"
                                                    alt="img" class="img-fluid">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt="img"
                                                    class="img-fluid">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="productDetail">
                            <h2>{{ $bts_schedule->judul }}</h2>
                            <div class="productPrice">
                                <ins>Pelaksanaan {{ $bts_schedule->pelaksanaan_awal }} -
                                    {{ $bts_schedule->pelaksanaan_akhir }}</ins>
                            </div>
                            <br>
                            <div class="stockLeftprogress">
                                <div class="progress">
                                    <div class="progress-bar" style="width:70%"></div>
                                </div>
                            </div>
                            <div class="productQty">
                                <div class="add-cart-container">

                                    @if ($checkLogin && $isEligibleCertificate)
                                        @if ($cekKepesertaan)
                                            <div>
                                                <a href="{{ route('frontend.bts-certificate', $cekKepesertaan->uuid) }}"
                                                    class="btn btn-primary btn-6" target="_blank">Unduh Sertifikat</a>
                                            </div>
                                        @endif
                                    @endif

                                    <form action="{{ route('frontend.daftar-peserta', $bts_schedule->id) }}" method="post">
                                        @csrf
                                        @if ($checkLogin)
                                            @if ($jadwal_absen)
                                                @if ($isiDaftarHadir)
                                                    @if ($old_peserta == null)
                                                        <button class="btnCustom5 btn-1 hover-slide-down attendance-user"
                                                            type="submit">
                                                            <span class="d-flex justify-content-between">
                                                                Isi Daftar Hadir <img
                                                                    src="{{ asset('assets/images/icon10.png') }}"
                                                                    alt="right" class="img-fluid">
                                                            </span>
                                                        </button>
                                                    @else
                                                        <button class="btnCustom5 btn-1 hover-slide-down attendance-user"
                                                            type="submit">
                                                            <span class="d-flex justify-content-between">
                                                                Isi Daftar Hadir
                                                            </span>
                                                        </button>
                                                    @endif
                                                @else
                                                    <a href="javascript:void(0)" class="btnCustom5 btn-1 hover-slide-down">
                                                        <span class="d-flex justify-content-between">
                                                            Berhasil Absen <img
                                                                src="{{ asset('assets/images/icon10.png') }}"
                                                                alt="right" class="img-fluid">
                                                        </span>
                                                    </a>
                                                @endif
                                            @endif
                                        @else
                                            <p>Silahkan Login / Registrasi terlebih dahulu !</p>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($checkLogin)
                <div class="modal fade" id="ajaxModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h1 class="modal-title fs-5" style="color: #24a0a0">Data Peserta BTS</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="btsForm" class="form-horizontal">
                                <div class="modal-body">
                                    <input type="hidden" name="status" value="daftar">
                                    <div class="mb-3">
                                        <label>Instansi</label>
                                        {!! Form::select(
                                            'instansi',
                                            ['' => 'Silahkan Pilih Instansi !'] + $instansi->toArray(),
                                            $old_peserta != null ? $old_peserta->instansi_id : null,
                                            [
                                                'class' => 'form-control border-0 select2',
                                            ],
                                        ) !!}
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Instansi</label>
                                        <input type="text" name="nama_instansi" class="form-control"
                                            placeholder="Masukkan Nama Instansi" autocomplete="off"
                                            value="{{ $old_peserta != null ? $old_peserta->nama_instansi : '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Peserta</label>
                                        <input type="text" name="nama_peserta" class="form-control"
                                            placeholder="Masukkan Nama Peserta" autocomplete="off"
                                            value="{{ $old_peserta != null ? $old_peserta->nama : auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn save-peserta-bts"
                                        style="background: #24a0a0;color: #fff">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--Shop Single end-->
@endsection
@section('script')
    <script type="text/javascript">
        $(document).on('click', '.attendance-user', function(e) {
            e.preventDefault();
            $('#ajaxModel').modal('show');
            $('#ajaxModel').modal({
                backdrop: 'static',
                keyboard: false
            });
            $(".select2").select2({
                width: '100%'
            });
        });

        $(document).on('click', '.save-peserta-bts', function(e) {
            e.preventDefault();
            var el = $(this).parent().parent()
            var url = "{{ route('frontend.daftar-peserta', $bts_schedule->slug) }}"
            var formData = new FormData()
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            formData.append('nama_peserta', $(el.find('input[name="nama_peserta"]')).val())
            formData.append('nama_instansi', $(el.find('input[name="nama_instansi"]')).val())
            formData.append('instansi', $(el.find('select[name="instansi"]')).find(":selected").val())
            swal({
                title: "{{ __('frontend.notif_confirm') }}",
                text: "{{ __('frontend.desc_notif_confirm') }}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Ya, Posting !',
                allowOutsideClick: false
            }).then((isConfirm) => {
                if (isConfirm.value === true) {
                    $.ajax({
                        url: url,
                        data: formData,
                        type: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            if (res.status) {
                                swal({
                                    title: res.data.title,
                                    text: res.data.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#4fa7f3',
                                    cancelButtonColor: '#d57171',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'Error !',
                                    text: res.data.message,
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#4fa7f3',
                                    cancelButtonColor: '#d57171',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
