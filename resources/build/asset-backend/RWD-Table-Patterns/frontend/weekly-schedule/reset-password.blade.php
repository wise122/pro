@extends('backend.layouts.app')

@section('page-title')
{{'Update Password '.$title}}
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
                        <li class="breadcrumb-item active">Update Password {{ $title }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->
        <div class="row">
            <div class="col-6">
                <div class="card faq-box border-primary">
                    <div class="card-body">
                        <div class="faq-icon float-right">
                            <i class="fas fa-question-circle font-24 mt-2 text-primary"></i>
                        </div>
                        <h5 class="font-16 mb-3 mt-4">Update Password {{ $title }}</h5>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>Nama User</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td>{{$data->no_hp}}</td>
                                </tr>
                                <tr>
                                    <td>Email User</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Hak Akses</td>
                                    <td>{{$data->display_name}}</td>
                                </tr>
                            </table>
                            <form action="{{ route($route.'update-password', $data->id) }}" method="POST">
                                @csrf
                                <div class="form-group xs-pt-10">
                                    <label class="control-label">Masukan Password Baru</label>
                                    <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Masukkan Password Baru">
                                </div>
                                <div class="col-xs-6">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                                        <a href="{{route('user.index')}}" class="btn btn-space btn-secondary">Kembali</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
