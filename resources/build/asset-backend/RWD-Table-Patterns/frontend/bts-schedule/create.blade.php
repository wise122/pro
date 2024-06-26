@extends('backend.layouts.app')

@section('page-title')
{{'Create '.$title}}
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
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card faq-box border-primary m-b-30">
                    <div class="card-body">
                        <form class="form-create" action="{{ route($route.'store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 control-form-label">Youtube Id</label>
                                <div class="col-sm-10">
                                    {!! Form::text('video_id', null, ['class'=>'form-control', 'placeholder' => 'Masukkan Video Id', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-form-label">Judul</label>
                                <div class="col-sm-10">
                                    {!! Form::text('judul', null, ['class'=>'form-control', 'placeholder' => 'Masukkan Judul', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    {!! Form::text('tgl', null, ['class'=>'form-control datepicker', 'placeholder' => ' Masukkan Tanggal', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-form-label">Episode</label>
                                <div class="col-sm-10">
                                    {!! Form::number('episode', null, ['class'=>'form-control', 'placeholder' => 'Masukkan Episode', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-form-label">Gambar</label>
                                <div class="col-8">
                                    <span style="color: red">* Ukuran Gambar Max 480 x 320</span>
                                    <br>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="height: 150px;"></div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new"> Pilih Gambar </span>
                                                <span class="fileinput-exists"> Ubah </span>
                                                <input type="hidden">
                                                <input type="file" name="cover">
                                            </span>
                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="status" value="publish" checked>
                                        <span>Publish</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="draft">
                                        <span>Draft</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Active</label>
                                <div class="col-sm-10">
                                    <label>
                                        <input type="radio" name="active" value="yes" checked>
                                        <span>Ya</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="active" value="no">
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
