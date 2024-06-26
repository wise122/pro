@extends('backend.layouts.app')

@section('page-title')
{{$title}}
@endsection

@section('css')
    <style>
        span.select2-container {
            z-index: 9999;
        }
    </style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{$title}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Management</li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <a class="btn btn-primary waves-effect waves-light add-narsum" href="#">
                            <i class="mdi mdi-gamepad-round"></i> Moderator/Narsum
                        </a>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td>{{ $jadwal_bts->judul }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Awal</td>
                                        <td>:</td>
                                        <td>{{ $jadwal_bts->pelaksanaan_awal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Akhir</td>
                                        <td>:</td>
                                        <td>{{ $jadwal_bts->pelaksanaan_akhir }}</td>
                                    </tr>
                                    <tr>
                                        <td>ID Youtube</td>
                                        <td>:</td>
                                        <td>{{ $jadwal_bts->id_youtube }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <table class="table-sm table-striped table-bordered dt-responsive data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Instansi</th>
                                    <th>Nama Instansi</th>
                                    <th>Nama Peserta</th>
                                    <th>Peran</th>
                                    <th>Keahlian</th>
                                    <th>Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
{{-- Modal Instansi --}}
<div id="modal-peran" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-6">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Narasumber atau Moderator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" id="form">
                <div class="modal-body data-form-Instansi">
                    @csrf
                    <input type="hidden" value="{{ $jadwal_bts->id }}" name="id">
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Nama Narsum / Moderator</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="user_id" id="select-user" aria-hidden="true">
                                <option selected="selected" disabled>Silahkan Pilih Nama Narasum / Moderator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Instansi</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="instansi_id" tabindex="-1" aria-hidden="false">
                                <option selected="selected" value="">Silahkan Pilih Instansi</option>
                                @foreach ($instansi as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Nama Instansi</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_instansi" class="form-control" placeholder="Masukkan Nama Instansi" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Nama Di Sertifikat</label>
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Peran</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="peran" tabindex="-2" aria-hidden="true">
                                <option selected="selected" value="">Silahkan Peran</option>
                                <option value="narsum">Narasumber</option>
                                <option value="moderator">Moderator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Keahlian</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="keahlian" tabindex="-1" aria-hidden="true">
                                <option selected="selected" value="">Silahkan Keahlian</option>
                                @foreach ($keahlians as $keahlian)
                                <option value="{{ $keahlian->id }}">{{ $keahlian->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="fa fa-save btn btn-success save"> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal Instansi --}}
@endsection
@section('script')
<script type="text/javascript">
    var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route($route.'get-peserta', $jadwal_bts->id) }}",
                    columns: [
                        { data: 'instansi', name: 'instansi' },
                        { data: 'nama_instansi', name: 'nama_instansi' },
                        { data: 'nama', name: 'nama' },
                        { data: 'peran', name: 'peran' },
                        { data: 'keahlian', name: 'keahlian' },
                        { data: 'action', name: 'action', searchable: true, orderable: false },
                    ],
                    searching: false
                });
        $(".add-narsum").on( "click", function(e) {
            e.preventDefault();
            $('input[name="user_id"]').val('').trigger('change');
            $('select[name="instansi_id"]').val('').trigger('change');
            $('select[name="peran"]').val('').trigger('change');
            $('select[name="keahlian"]').val('').trigger('change');
            $('input[name="nama_instansi"]').val("");
            $('input[name="name"]').val("");
            $('#modal-peran').modal('show');
		
        });

	$('#modal-peran').on('show.bs.modal', function(event) {
            $(document).ready(function() {
                $('#select-user').select2({
                    width: '100%',
                    dropdownParent: $('#modal-peran'),
                    ajax: {
                        url: "{{ route('user.get-user') }}",
                        contentType: 'application/json',
                        dataType: 'json',
                        minimumInputLength: 2,
                        delay: 250,
                        placeholder: 'Cari user',
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.items
                            };
                        },
                        cache: true
                    }
                });
            });
        });
	
	$(document).on('click', '.save', function(e){
            e.preventDefault();
            let url = '{{ route($route.'store-peserta')}}';
            let data = $('#form').serialize();
            $.ajax({
                url:url,
                type: 'POST',
                data: data,
                success: function(res){
                    if(res.status){
                    table.draw();
                    $('#modal-peran').modal('hide');
                        swal({
                            title: 'Berhasil !',
                            text: res.data.message,
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#4fa7f3',
                            cancelButtonColor: '#d57171',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        });
                    }else{
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
        });
</script>
@endsection
