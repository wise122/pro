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
                                <label class="col-4 col-form-label" for="example-input-normal">Video Banner</label>
                                <div class="col-8">
                                    <div class="fileinput-new" id="lfm" data-input="thumbnail" data-preview="holder">
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new"> Pilih Video Banner </span>
                                            </span>
                                        </div>
                                        <input id="thumbnail" class="form-control" type="hidden" name="cover">
                                    </div>
                                    <br>
                                    <div id="holder">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Link</label>
                                <div class="col-8">
                                    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Link', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Title</label>
                                <div class="col-8">
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Title', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Status</label>
                                <div class="col-8">
                                    {!! Form::select('status', ['0' => 'Tidak Aktif', '1' => 'Aktif'], null, ['placeholder' => 'Silahkan Pilih Status', 'class' => 'form-control select2']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Urutan</label>
                                <div class="col-8">
                                    {!! Form::number('urutan', null, ['class' => 'form-control', 'placeholder' => 'Urutan', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Description</label>
                                <div class="col-8">
                                    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
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
     $('#lfm').filemanager('file');
</script>
@endsection
