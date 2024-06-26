@extends('backend.layouts.app')

@section('page-title')
{{$title}}
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
                        @permission('create'.$permission)
                            <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" id="createNew">
                                <i class="mdi mdi-gamepad-round"></i> Tambah
                            </a>
                            <hr>
                        @endpermission
                        <br>
                        <br>
                        <table class="table-sm table-striped table-bordered dt-responsive nowrap data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Nama</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="ajaxModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalHeading"></h4>
                            </div>
                            <div class="modal-body">
                                <form id="moduleForm" name="moduletForm" class="form-horizontal">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-8 control-label">Nama Module</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Module" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route($route.'index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createNew').click(function () {
        $('#saveBtn').val('create-module');
        $('#saveBtn').html('Simpan');
        $('#id').val('');
        $('#moduleForm').trigger("reset");
        $('#modalHeading').html("Tambah Module");
        $('#ajaxModal').modal('show');
    });

    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $('#saveBtn').html('Simpan');
        $.get("{{ route($route.'index') }}" +'/' + id +'/edit', function (res) {
            if (res.status) {
                $('#modalHeading').html("Edit Module");
                $('#saveBtn').val("edit-module");
                $('#ajaxModal').modal('show');
                $('#id').val(res.data.id);
                $('#name').val(res.data.name);
            } else {
                toastr.error(response.data.message);
            }
      })
   });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('<span class="spinner-grow spinner-grow-sm"></span> Loading . . .');
        $.ajax({
            data: $('#moduleForm').serialize(),
            url: "{{ route($route.'store') }}",
            type: "POST",
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    toastr.success(response.data.message);
                    $('#ajaxModal').modal('hide');
                    table.draw();
                } else {
                    toastr.error(response.data.message);
                }
            }
        });
    });

    $('body').on('click', '.delete', function(e) {
        e.preventDefault()
        var id = $(this).data("id");
        var url = "{{ route($route.'delete', 'id')}}"
        url = url.replace('id', id)
        swal({
            title: 'Apakah Anda Yakin ?',
            text: 'Ingin menghapus data ini',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Ya, Hapus !',
            allowOutsideClick: false
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'delete',
                    success: function(res) {
                        table.draw()
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
            }
        });
    });
</script>
@endsection
