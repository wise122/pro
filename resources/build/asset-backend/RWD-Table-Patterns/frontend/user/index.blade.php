@extends('backend.layouts.app')

@section('page-title')
{{$title}}
@endsection

@section('content')
<div class="content">
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Pengaturan</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Management</li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Pengaturan</h4>
                            <p class="sub-title">Silahkan Atur Pengaturan Sesuai Dengan Yang diinginkan</p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-toggle="tab" href="#logo" role="tab">
                                        <span class="d-none d-md-block">Logo</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                        <span class="d-none d-md-block">Profile Perusahaan</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#email-setting" role="tab">
                                        <span class="d-none d-md-block">Email Perusahaan</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#social-media" role="tab">
                                        <span class="d-none d-md-block">Social Media</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="logo" role="tabpanel">
                                    {!! Form::model($data,array('route' => $route.'logo', 'method'=>'POST','enctype' => "multipart/form-data")) !!}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h5>Logo <small>(200 x 200)</small></h5>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                                            <img src="{{$logo.'/logo.png'}}" alt="">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                                <span class="fileinput-exists"> Ubah </span>
                                                                <input type="file" name="logo">
                                                            </span>
                                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5>Small Logo <small>(86 x 25)</small></h5>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                                            <img src="{{$logo.'/small_logo.png'}}" alt="">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                                <span class="fileinput-exists"> Ubah </span>
                                                                <input type="file" name="small_logo">
                                                            </span>
                                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5>Favicon <small>(80 x 80)</small></h5>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                                            <img src="{{$logo.'/favicon.png'}}" alt="">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                                <span class="fileinput-exists"> Ubah </span>
                                                                <input type="file" name="favicon">
                                                            </span>
                                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h5>Logo Atas <small>(235 x 50)</small></h5>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                                            <img src="{{ $logo.'/logo_atas.png' }}" alt="">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                                <span class="fileinput-exists"> Ubah </span>
                                                                <input type="hidden">
                                                                <input type="file" name="logo_atas">
                                                            </span>
                                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5>Logo Bawah <small>(235 x 50)</small></h5>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="height: 150px;">
                                                            <img src="{{ $logo.'/logo_bwh.png' }}" alt="">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                                <span class="fileinput-exists"> Ubah </span>
                                                                <input type="hidden">
                                                                <input type="file" name="logo_bwh">
                                                            </span>
                                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                                <div class="form-group col-md-6">
                                                    <label>Title Text</label>
                                                    {{ Form::text('title_text',null,array('class'=>'form-control','placeholder' => 'Masukkan Title Text', 'autocomplete' => 'off'))}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Footer Text</label>
                                                    {{ Form::text('footer_text',null,array('class'=>'form-control','placeholder' => 'Masukkan Footer Text', 'autocomplete' => 'off' )) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane p-3" id="profile" role="tabpanel">
                                    <div class="row">
                                        {{Form::model($data,array('route'=> $route.'profile','method'=>'post'))}}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nama Perusahaan</label>
                                                        {{ Form::text('company_name',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Nama Perusahaan')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Alamat Perusahaan</label>
                                                        {{ Form::textarea('company_address',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Alamat Perusahaan', 'rows'=> '3')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>No Telp Perusahaan</label>
                                                        {{ Form::text('company_phone',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan No Telp Perusahaan')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Email Perusahaan</label>
                                                        {{ Form::text('company_email',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Email Perusahaan')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Kode Pos Perusahaan</label>
                                                        {{ Form::text('postal_code',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Kode Pos Perusahaan')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>No Hp (WA)</label>
                                                        {{ Form::text('phone_wa',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan No Hp (WA) Perusahaan')) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Default Text (WA)</label>
                                                        {{ Form::textarea('text_wa',null,array('class' => 'form-control font-style', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Default Text (WA) Perusahaan', 'rows'=> '3')) }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-offset-2 text-right">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="email-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="email-setting-wrap">
                                        {{Form::open(array('route' => $route.'email','method'=>'post'))}}
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Mail Driver</label>
                                                {{Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=> 'Masukkan Mail Driver', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail Host</label>
                                                {{Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=> 'Masukkan Mail Driver', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail Port</label>
                                                {{Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control', 'placeholder' => 'Masukkan Mail Port', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail Username</label>
                                                {{Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder' => 'Masukkan Mail Username', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail Password</label>
                                                {{Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder' => 'Masukkan Mail Password', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail Encryption</label>
                                                {{Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=> 'Masukkan Mail Encryption', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail From Address</label>
                                                {{Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>'Masukkan Mail From Address', 'autocomplete' => 'off'))}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mail From Name</label>
                                                {{Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>'Masukkan Mail Encryption', 'autocomplete' => 'off'))}}
                                            </div>
                                        </div>
                                        @permission('create'.$permission)
                                        <div class="col-sm-offset-2 text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        @endpermission
                                        {{Form::close()}}
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="social-media" role="tabpanel">
                                    {{Form::model($data,array('route' => $route.'sosmed','method'=>'post'))}}
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Nama Facebook *</label>
                                                    {{Form::text('company_fb',null,array('class'=>'form-control font-style', 'placeholder'=> 'Masukkan Nama Facebook', 'autocomplete' => 'off'))}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama Instagram *</label>
                                                    {{Form::text('company_ig',null,array('class'=>'form-control font-style', 'placeholder'=> 'Masukkan Nama Instagram', 'autocomplete' => 'off'))}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama Twitter</label>
                                                    {{Form::text('company_twitter',null,array('class'=>'form-control font-style', 'placeholder'=> 'Masukkan Nama Twitter', 'autocomplete' => 'off'))}}
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Nama Youtube</label>
                                                    {{Form::text('company_yt',null,array('class'=>'form-control font-style', 'placeholder'=> 'Masukkan Nama Instagram', 'autocomplete' => 'off'))}}
                                                </div>
                                            </div>
                                            <div class="col-sm-offset-2 text-right">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    {{Form::close()}}
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
