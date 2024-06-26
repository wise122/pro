@extends('backend.layouts.app')

@section('page-title')
    category
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Category</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @permission('create-Category')
                                <p><a href="javascript:void(0)" class="btn btn-primary btn-add create-category" type="button"
                                        id="category">
                                        <i class="fa fa-plus"></i> Tambah
                                    </a></p>
                                <hr>
                            @endpermission
                            <br>
                            <br>
                            <table id="category"
                                class="table-sm table-striped table-bordered dt-responsive nowrap data-table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Seotitle</th>
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
    {{-- Modal category --}}
    <div id="modal-category" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="title-category"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal">
                    <div id="content" class="modal-body data-form-Category">
                        <input type="hidden" value="" name="id">
                        <div class="form-group">
                            <label for="" class="col-sm-8 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" name="title" class="form-control name" placeholder="Masukkan Title"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-8 control-label">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="">Silahkan Pilih Status</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
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
    {{-- End Modal Category --}}
@endsection
@section('script')
    <script src="{{ asset('asset-backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('category.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'seotitle',
                    name: 'seotitle'
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

        $(".create-category").on("click", function(e) {
            e.preventDefault();
            $('#title-category').html("Tambah Category");
            $('input[name="title"]').val("");
            $('select[name="status"]').val("");
            $('input[name="id"]').val("");
            $('#modal-category').modal('show');
        });


        $(document).on('click', '.save', function(e) {
            e.preventDefault();
            var el = $(this).parent().parent();
            var url = "{{ route('category.store') }}";
            var form = new FormData()
            form.append('_token', $('meta[name="csrf-token"]').attr('content'));
            form.append('id', $('input[name="id"]').val())
            form.append('title', $('input[name="title"]').val())
            form.append('status', $('select[name="status"]').val())
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
                        $('#modal-category').modal('hide');
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
            var url = "{{ route('category.edit', ':id') }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'get',
                success: function(res) {
                    $('#title-category').html("Edit Category");
                    $('#content').html(res.data.view)
                    $('#modal-category').modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                }
            });
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            console.log("tesss");
            var id = $(this).data('id');
            var url = "{{ route('category.destroy', 'id') }}";
            url = url.replace('id', id);
            var form = new FormData();
            form.append('_token', $('meta[name="csrf-token"]').attr('contnt'));
            form.append('id', id)
            swal({
                title: 'Apakah Anda Yakin ?',
                text: 'Ingin menghapus data ini',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa773',
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
                        category.draw()
                        swal({
                            title: 'Berhsil !',
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
