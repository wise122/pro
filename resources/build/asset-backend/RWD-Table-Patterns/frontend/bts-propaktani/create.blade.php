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
            <div class="col-lg-12">
                <div class="card faq-box border-primary m-b-30">
                    <div class="card-body">
                        <form action="{{ route($route.'store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Judul</label>
                                <div class="col-8">
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Judul', 'autocomplete' => 'off', 'autofocus' => 'true']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Tipe Buku</label>
                                <div class="col-8">
                                    {!! Form::select('tipe_buku', ['berbayar' => 'Berbayar', 'gratis' => 'Gratis'], null, ['placeholder' => 'Silahkan Pilih Tipe Buku', 'class' => 'form-control select2']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">File</label>
                                <div class="col-8">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail"></div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new"> Pilih File </span>
                                                <span class="fileinput-exists"> Ubah </span>
                                                <input type="file" name="file">
                                            </span>
                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Cover</label>
                                <div class="col-8">
                                    <div class="fileinput-new" id="lfm" data-input="thumbnail" data-preview="holder">
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new"> Pilih Cover </span>
                                            </span>
                                        </div>
                                        <input id="thumbnail" class="form-control" type="hidden" name="cover">
                                    </div>
                                    <br>
                                    <div id="holder">

                                    </div>
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
@section('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
@endsection
