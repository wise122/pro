@extends('backend.layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">{{ $title }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            @permission('create' . $permission)
                                <a class="btn btn-primary waves-effect waves-light" href="{{ route($route . 'create') }}">
                                    <i class="mdi mdi-gamepad-round"></i> Tambah
                                </a>
                                <hr>
                            @endpermission
                            <br>
                            <br>
                            <table class="table-sm table-striped table-bordered dt-responsive nowrap data-table"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Tipe Buku</th>
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
@endsection
@section('script')
    <script type="text/javascript">
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route($route . 'index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'cover',
                    name: 'cover'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'tipe_buku',
                    name: 'tipe_buku'
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
    </script>
@endsection
