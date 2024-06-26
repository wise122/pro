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
                        <table class="table-sm table-striped table-bordered dt-responsive nowrap data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Module</th>
                                <th>Nama Permission</th>
                                <th>Display</th>
                                <th>Deskripsi</th>
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
        ajax: '{{ route($route.'index')}}',
        columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'module.name', name: 'module.name' },
                { data: 'name', name: 'name' },
                { data: 'display_name', name: 'display_name' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        order: [[ 0, 'desc' ]]
    });
</script>
@endsection
