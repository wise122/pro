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
                    <h4 class="page-title">{{ $title }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Management</li>
                        <li class="breadcrumb-item active"><a href="{{ route($route.'index') }}">{{ $title }}</a></li>
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
                                <label class="col-4 col-form-label" for="example-input-normal">Nama Pengguna</label>
                                <div class="col-8">
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Pengguna" autocomplete="off" value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Email</label>
                                <div class="col-8">
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" autocomplete="off" value="{{ $data->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Hak Akses</label>
                                <div class="col-8">
                                    <select name="role_id" class="form-control select2">
                                        <option value="">Silahkan Pilih Hak Akses</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}" {{ $data->role_id == $item->id ? 'selected':'' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
        </div>
    </div>
</div>

@endsection
