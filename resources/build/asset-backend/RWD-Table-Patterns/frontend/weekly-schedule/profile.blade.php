@extends('backend.layouts.app')

@section('css')
<link href="{{ asset('assets-backend/css/custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('page-title')
{{'Profile Account'.$title}}
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Profile Account {{$title}}</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card faq-box border-primary">
                    <div class="card-body">
                        <div class="faq-icon float-right">
                            <i class="fas fa-user font-24 mt-2 text-success"></i>
                        </div>
                        <div class="profile-sidebar">
                            <div class="portlet light profile-sidebar-portlet text-center">
                                <div class="profile-userpic">
                                    <img alt="image" src="{{ (!empty($userDetail->avatar)) ? $profile.'/'.$userDetail->avatar : $profile.'/avatar.png'}}" class="img-responsive user-profile" class="img-responsive user-profile">
                                </div>
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name font-style"> {{$userDetail->name}}</div>
                                    <div class="profile-usertitle-job"> {{$userDetail->email}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card faq-box border-primary">
                    <div class="card-body">
                        <div class="faq-icon float-right">
                            <i class="fas fa-user font-24 mt-2 text-success"></i>
                        </div>
                        <h5 class="text-primary">Manage Account</h5>
                        <div class="setting-tab">
                            <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#personal_info" role="tab" aria-controls="" aria-selected="true">Informasi Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#change_password" role="tab" aria-controls="" aria-selected="false">Ubah Password</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="personal_info" role="tabpanel" aria-labelledby="home-tab3">
                                    <form action="{{ route($route.'update-profile-user', $userDetail->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nama Pengguna</label>
                                                    <input type="text" name="name" class="form-control font-style" placeholder="Masukkan Nama Pengguna" autocomplete="off" value="{{ $userDetail->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-control-label">Email Pengguna</label>
                                                <input type="email" name="email" class="form-control font-style" placeholder="Masukkan Email Pengguna" autocomplete="off" value="{{ $userDetail->email }}">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                    <div>
                                                        <span class="btn btn-primary btn-file">
                                                            <span class="fileinput-new"> Pilih Gambar </span>
                                                            <span class="fileinput-exists"> Ubah </span>
                                                            <input type="file" name="profile">
                                                        </span>
                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                @permission('edit-account')
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                @endpermission
                                                <a href="{{ route('backend.home') }}" class="btn btn-secondary">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="change_password" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="company-setting-wrap">
                                        <form action="{{ route($route.'password-profile', $userDetail->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Password Saat Ini</label>
                                                        <input type="password" class="form-control" placeholder="Masukkan Password saat ini" autocomplete="off" name="current_password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">Password Baru</label>
                                                    <input type="password" class="form-control" placeholder="Masukkan Password baru" autocomplete="off" name="new_password">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">Konfirmasi Ulang Password baru</label>
                                                    <input type="password" class="form-control" placeholder="Masukkan Ulangi Password baru" autocomplete="off" name="confirm_password">
                                                </div>
                                                <div class="col-lg-12 text-right">
                                                    @permission('change-password-account')
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    @endpermission
                                                    <a href="{{ route('backend.home') }}" class="btn btn-secondary">Kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
