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
                            <li class="breadcrumb-item active"><a href="{{ route($route . 'index') }}">{{ $title }}</a>
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
                            <form action="{{ route($route . 'update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Judul</label>
                                    <div class="col-8">
                                        {!! Form::text('title', $data->title, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Masukkan Judul',
                                            'autocomplete' => 'off',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Kategori</label>
                                    <div class="col-8">
                                        {!! Form::select('category', ['' => 'Silahkan Pilih Kategori'] + $category, $data->category_id, [
                                            'class' => 'form-control select2',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Tag</label>
                                    <div class="col-8">
                                        {!! Form::select('tag[]', $tag, json_decode($data->tag_id), [
                                            'class' => 'form-control select2',
                                            'multiple' => 'multiple',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Meta Desc</label>
                                    <div class="col-8">
                                        {!! Form::textarea('metadesc', $data->metadesc, ['class' => 'form-control', 'rows' => 2]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Meta Data</label>
                                    <div class="col-8">
                                        {!! Form::textarea('metadata', $data->metadata, ['class' => 'form-control', 'rows' => 2]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Meta Key</label>
                                    <div class="col-8">
                                        {!! Form::textarea('metakey', $data->metakey, ['class' => 'form-control', 'rows' => 2]) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Aktif</label>
                                    <div class="col-sm-8">
                                        <label>
                                            <input type="radio" value="yes" name="active"
                                                {{ $data->active == 'yes' ? 'checked' : '' }}>
                                            <span>Ya</span>
                                        </label>
                                        <label>
                                            <input type="radio" value="no" name="active"
                                                {{ $data->active == 'no' ? 'checked' : '' }}>
                                            <span>Tidak</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Status</label>
                                    <div class="col-sm-8">
                                        <label>
                                            <input type="radio" value="publish" name="status"
                                                {{ $data->status == 'publish' ? 'checked' : '' }}>
                                            <span>Publish</span>
                                        </label>
                                        <label>
                                            <input type="radio" value="draft" name="status"
                                                {{ $data->status == 'draft' ? 'checked' : '' }}>
                                            <span>Draft</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Gambar</label>
                                    <div class="col-8">
                                        <span style="color: red">* Ukuran Gambar Harus 900 x 616</span>
                                        <br>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="height: 150px;">
                                                <img src="{{ asset('storage/articles/' . $data->image) }}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new"> Pilih Gambar </span>
                                                    <span class="fileinput-exists"> Ubah </span>
                                                    <input type="file" name="image">
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
                                <div class="form-group row">
                                    <label class="col-4 col-form-label" for="example-input-normal">Konten</label>
                                    <div class="col-8">
                                        {!! Form::textarea('content', $data->content, ['class' => 'form-control summernote']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-offset-2 text-right">
                                    <button type="submit" class="btn btn-primary save">Simpan</button>
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
