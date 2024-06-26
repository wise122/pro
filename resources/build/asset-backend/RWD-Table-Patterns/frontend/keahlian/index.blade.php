@extends('backend.layouts.app')

@section('page-title')
    instansi
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Instansi</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">Instansi</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @permission('create-Instansi')
                                <p><a href="javascript:void(0)" class="btn btn-primary btn-add" type="button"><i
                                            class="fa fa-plus"></i> Tambah</a></p>
                                <hr>
                            @endpermission
                            <br>
                            <br>
                            <table id="instansi"
                                class="table-sm table-striped table-bordered dt-responsive nowrap data-table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
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
    <div id="modal-Instansi" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="title-instansi"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body data-form-Instansi">
                        <div id="content">
                            <input type="hidden" value="" name="id">
                            <div class="form-group">
                                <label for="" class="col-sm-8 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Masukkan Nama Instansi" autocomplete="off">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="fa fa-save btn btn-success save"> Simpan</button>
                            </div>
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
        let instansi = $('#instansi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('instansi.index') }}"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [3, 'desc']
            ]
        });

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            $('#title-instansi').html("Tambah Instansi");
            $('#modal-Instansi').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            $('input[name="id"]').val("");
            $('.name').val("");
        });

        $(document).on('click', '.save', function(e) {
            e.preventDefault()
            var el = $(this).parent().parent();
            var url = "{{ route('instansi.store') }}";
            var form = new FormData()
            form.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form.append('id', $('input[name="id"]').val())
            form.append('name', $('.name').val())
            $.ajax({
                url: url,
                type: 'post',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status) {
                        instansi.draw();
                        $('#modal-Instansi').modal('hide');
                        swal({
                            title: 'Berhasil !',
                            text: res.data.message,
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#4fa7f3',
                            cancelButtonColor: '#d57171',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        })
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
                        })
                    }
                }
            });
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('instansi.edit', ':id') }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    $('#title-instansi').html("Edit Instansi");
                    $('#content').html(res.data.view)
                    $('#modal-Instansi').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            });
        });


        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('instansi.destroy', 'id') }}";
            url = url.replace('id', id);
            var form = new FormData();
            form.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form.append('id', id)
            swal({
                title: 'Apakah Anda Yakin ?',
                text: 'Ingin menghapus data ini',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Ya, Hapus !',
                allowOutsideClick: false
            }).then(function() {
                $.ajax({
                    url: url,
                    type: 'post',
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        instansi.draw()
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
                    }
                })
            });
        });
    </script>
@endsection
