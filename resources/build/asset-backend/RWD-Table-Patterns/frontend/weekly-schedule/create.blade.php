@extends('backend.layouts.app')

@section('page-title')
{{'Tambah '.$title}}
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
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card faq-box border-primary m-b-30">
                    <div class="card-body">
                        <form action="{{ route($route.'store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Nama Pengguna</label>
                                <div class="col-8">
                                    {{ Form::text('name',null,array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Nama Pengguna')) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">No Telepon</label>
                                <div class="col-8">
                                    {{ Form::text('no_hp',null,array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Masukkan No Telepon')) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Email</label>
                                <div class="col-8">
                                    {{ Form::email('email',null,array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Email')) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Hak Akses</label>
                                <div class="col-8">
                                    {!! Form::select('role_id', ['' => 'Silahkan Pilih Hak Akses !']+$role, null,['class' => 'form-control select2']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Password</label>
                                <div class="col-8">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Konfirmasi Password</label>
                                <div class="col-8">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan Konfirmasi Password" autocomplete="off">
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
