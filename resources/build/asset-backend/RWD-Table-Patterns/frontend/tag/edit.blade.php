@extends('backend.layouts.app')

@section('page-title')
{{'Edit '.$title}}
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
                        <li class="breadcrumb-item active"><a href="{{ route($route.'index') }}">{{$title}}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card faq-box border-primary m-b-30">
                    <div class="card-body">
                        <form action="{{ route($route.'update', $data->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Nama</label>
                                <div class="col-8">
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Role" autocomplete="off" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Display Name</label>
                                <div class="col-8">
                                    <input type="text" name="display_name" class="form-control" placeholder="Masukkan Nama Display" autocomplete="off" value="{{ $data->display_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Deskripsi</label>
                                <div class="col-8">
                                    <input type="text" name="description" class="form-control" placeholder="Masukkan Deskripsi" autocomplete="off" value="{{ $data->description }}">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 text-right">
                                <button type="submit" class="btn btn-primary save">Simpan</button>
                                <a href="{{ route($route.'index')}}" class="btn btn-secondary"> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card faq-box border-primary m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">{{$title}} Management</h4>
                        <p class="sub-title">Silahkan Pilih Module-module Role Untuk Mengatur Permission</p>
                            @php
                                $accordion = 0;
                            @endphp
                        <div id="accordion">
                            @foreach ($data_module as $item)
                                <div class="card mb-0">
                                    <div class="card-header" id="headingOne{{$item->id}}">
                                        <h5 class="mb-0 mt-0 font-14">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseOne{{$item->id}}" aria-expanded="{{ ($accordion == 0) ? 'true' : 'false'}}"
                                                aria-controls="collapseOne{{$item->id}}" class="text-dark">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne{{$item->id}}" class="collapse false{{ ($accordion == 0) ? 'show' : ''}}"
                                            aria-labelledby="headingOne{{$item->id}}" style="" data-parent="#accordion">
                                        <div class="card-body">
                                            @foreach ($item->permission as $row)
                                                <div class="checkbox-inline checkbox-success form-check-inline">
                                                    @php
                                                        $permission_with_role = $row->permission_with_role($row->id, $data->id);
                                                    @endphp
                                                </div>
                                                <div class="checkbox-inline checkbox-success form-check-inline">
                                                    @if (!empty($permission_with_role))
                                                        @if ($row->id == $permission_with_role->permission_id)
                                                            <input type="checkbox" id="inlineCheckbox{{$row->id}}" value="{{$row->id}}" checked="" data-permission="{{ $row->name }}">
                                                            <label for="inlineCheckbox{{$row->id}}"> {{ $row->display_name }} </label>
                                                        @endif
                                                    @else
                                                        <input type="checkbox" id="inlineCheckbox{{$row->id}}" value="option{{$row->id}}" data-permission="{{ $row->name }}">
                                                        <label for="inlineCheckbox{{$row->id}}"> {{ $row->display_name }} </label>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $accordion++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', 'input[type=checkbox]', function(e){
        if($(this).is(':checked')){
            $.ajax({
                type:'POST',
                url: '{{ route('permission.active', $data->id) }}',
                data: {
                    permission: $(this).data('permission')
                },
                success: function(data){
                    toastr.success('Telah Diberikan Permission !');
                }
            })
        } else {
            $.ajax({
                type:'POST',
                url: '{{ route('permission.nonactive', $data->id) }}',
                data: {
                    permission: $(this).data('permission')
                },
                success: function(data){
                    toastr.error('Permission Telah Dicabut !');
                }
            })
        }
    });
</script>
@endsection
