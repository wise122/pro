@extends('backend.layouts.app')

@section('page-title')
    {{ 'Edit ' . $title }}
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
                            <li class="breadcrumb-item active"><a
                                    href="{{ route($route . 'index') }}">{{ $title }}</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card faq-box border-primary m-b-30">
                        <div class="card-body">
                            <form action="{{ route($route . 'update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Judul</label>
                                    <div class="col-8">
                                        {!! Form::text('judul', $data->judul, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Masukkan Judul',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Pelaksanaan Awal</label>
                                    <div class="col-8">
                                        {!! Form::text('pelaksanaan_awal', $data->pelaksanaan_awal, [
                                            'class' => 'form-control datetimepicker',
                                            'placeholder' => 'Masukkan Pelaksaan Awal',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Pelaksanaan Akhir</label>
                                    <div class="col-8">
                                        {!! Form::text('pelaksanaan_akhir', $data->pelaksanaan_akhir, [
                                            'class' => 'form-control datetimepicker',
                                            'placeholder' => 'Masukkan Pelaksaan Akhir',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Youtube Id</label>
                                    <div class="col-8">
                                        {!! Form::text('video_id', $data->id_youtube, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Masukkan Video Id',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Zoom</label>
                                    <div class="col-8">
                                        {!! Form::textarea('zoom', $data->zoom, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Masukkan Link Zoom',
                                            'rows' => 2,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Cover</label>
                                    <div class="col-8">
                                        <span style="color: red">* Ukuran Gambar Harus 900 x 616</span>
                                        <br>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="height: 150px;">
                                                <img class="h-100"
                                                    src="{{ asset('storage/bts-schedule/' . $data->cover) }}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new"> Pilih Gambar </span>
                                                    <span class="fileinput-exists"> Ubah </span>
                                                    <input type="file" name="cover">
                                                </span>
                                                <a href="javascript:void(0);" class="btn btn-danger fileinput-exists"
                                                    data-dismiss="fileinput"> Hapus </a>
                                            </div>
                                            <p>
                                                <small class="text-muted">Biarkan Kosong jika tidak ingin mengubah
                                                    gambar</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route($route . 'index') }}" class="btn btn-secondary"> Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
