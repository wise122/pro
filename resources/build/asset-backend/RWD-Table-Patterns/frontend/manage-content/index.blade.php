@extends('backend.layouts.app')

@section('page-title')
    keahlian
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Keahlian</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">Keahlian</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @permission('create-Keahlian')
                                <p><a href="javascipt:void(0)" class="btn btn-primary btn-add create-keahlian" type="button"
                                        id="keahlian">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a></p>
                                <hr>
                            @endpermission
                            <br>
                            <br>
                            <table class="table-sm table-striped table-bordered dt-responsive nowrap data-table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Urutan</th>
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
    {{-- Modal Keahlian --}}
    <div id="modal-keahlian" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg-6">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-name mt-0" id="name-keahlian"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body data-form-Keahlian">
                        <div id="content">
                            <input type="hidden" value="" name="id">
                            <div class="form-group">
                                <label for="" class="col-sm-8 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Masukkan Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-8 control-label">Urutan</label>
                                <div class="col-sm-12">
                                    <input type="text" name="urutan" class="form-control urutan"
                                        placeholder="Masukkan Urutan" autocomplete="off">
                                </div>
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
    {{-- End MOdal Keahlian --}}
@endsection
@section('script')
    <script src="{{ asset('asset-backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('keahlian.index') }}",
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
                    data: 'urutan',
                    name: 'uerutan'
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
            ],
        });

        $(".create-keahlian").on("click", function(e) {
            e.preventDefault();
            $('#name-keahlian').html("Tambah Keahlian");
            $('input[name="id"]').val("");
            $('input[name="name"]').val("");
            $('input[name="urutan"]').val("");
            $("#modal-keahlian").modal("show");
        });

        $(document).on('click', '.save', function(e) {
            e.preventDefault();
            var el = $(this).parent().parent();
            var url = "{{ route('keahlian.store') }}";
            var form = new FormData()
            form.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form.append('id', $('input[name="id"]').val())
            form.append('name', $('input[name="name"]').val())
            form.append('urutan', $('input[name="urutan"]').val())
            $.ajax({
                url: url,
                type: 'post',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    if (res.status) {
                        table.draw();
                        $('#modal-keahlian').modal('hide');
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
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('keahlian.edit', ':id') }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    $('#name-keahlian').html("Edit Keahlian");
                    $('#content').html(res.data.view)
                    $('#modal-keahlian').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            });
        });
    </script>
@endsection
