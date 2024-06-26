@extends('backend.layouts.app')

@section('page-title')
{{'Ubah '.$title}}
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
                        <li class="breadcrumb-item active"><a href="{{ route($route.'index') }}">{{ $title }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->
        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="{{ route($route.'update', $data->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Nama Permission</label>
                                <div class="col-8">
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Permission" disabled value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Nama Display</label>
                                <div class="col-8">
                                    <input type="text" name="display_name" class="{{$errors->has('display_name') ? 'form-control is-invalid' : 'form-control'}}" placeholder="Masukkan Nama Display" value="{{ $data->display_name }}">
                                    @error('display_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Deskripsi</label>
                                <div class="col-8">
                                    <input type="text" name="description" class="{{$errors->has('description') ? 'form-control is-invalid' : 'form-control'}}" placeholder="Masukkan Deskripsi" value="{{ $data->description }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-offset-2 text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route($route.'index')}}" class="btn btn-secondary"> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
@endsection
