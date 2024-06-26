@extends('backend.layouts.app')

@section('page-title')
    tag
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Tag</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">Tag</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @permission('create-Tag')
                                <p><a href="javascipt:void(0)" class="btn btn-primary btn-add create-tag" type="button"
                                        id="tag">
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
                                        <th>Slug</th>
                                        <th>Status</th>
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
    {{-- Modal Tag --}}
    <div id="modal-tag" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg-6">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-name mt-0" id="name-tag"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body data-form-Tag">
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
                                <label for="" class="col-sm-8 control-label">Status</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="status" tabindex="1" aria-hidden="true">
                                        <option selected="selected" value="">Silahkan Pilih Status</option>
                                        <option value="1">Aktif</option>
                                        <option value="0">Titak Aktif</option>
                                    </select>
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
    {{-- End MOdal Tag --}}
@endsection
@section('script')
    <script src="{{ asset('asset-backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tag.index') }}",
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
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'status',
                    name: 'status'
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

        $(".create-tag").on("click", function(e) {
            e.preventDefault();
            $('#name-tag').html("Tambah Tag");
            $('input[name="id"]').val("");
            $('input[name="name"]').val("");
            $('select[name="status"]').val("");
            $("#modal-tag").modal("show");
        });

        $(document).on('click', '.save', function(e) {
            e.preventDefault();
            var el = $(this).parent().parent();
            var url = "{{ route('tag.store') }}";
            var form = new FormData()
            form.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form.append('id', $('input[name="id"]').val())
            form.append('name', $('input[name="name"]').val())
            form.append('status', $('select[name="status"]').val())
            $.ajax({
                url: url,
                type: 'post',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res);
                    if (res.status) {
                        table.draw();
                        $('#modal-tag').modal('hide');
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
            var url = "{{ route('tag.edit', ':id') }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    $('#name-tag').html("Edit Tag");
                    $('#content').html(res.data.view)
                    $('#modal-tag').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            });
        });
    </script>
@endsection
