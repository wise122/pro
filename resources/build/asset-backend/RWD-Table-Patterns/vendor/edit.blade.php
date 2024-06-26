@extends('backend.layouts.app')

@section('page-title')
{{'Edit '.$title}}
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
                        <form action="{{ route($route.'update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Cover</label>
                                <div class="col-8">
                                    <div class="fileinput-new" id="lfm" data-input="thumbnail" data-preview="holder">
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new"> Pilih Gambar </span>
                                            </span>
                                        </div>
                                        <input id="thumbnail" class="form-control" type="hidden" name="cover" value="{{ $data->cover }}">
                                    </div>
                                    <br>
                                    <div id="holder">
                                        <a href="{{ $data->cover }}" target="_blank">Lihat Gambar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Dari Tanggal</label>
                                <div class="col-8">
                                    {!! Form::text('start_date', $data->start_date, ['class'=>'form-control weeklyDatePicker', 'placeholder' => 'Pilih Tanggal', 'autocomplete' => 'off']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label" for="example-input-normal">Sampai Tanggal</label>
                                <div class="col-8">
                                    {!! Form::text('end_date', $data->end_date, ['class'=>'form-control from_date', 'placeholder' => 'Pilih Tanggal Dari', 'autocomplete' => 'off', 'readonly']) !!}
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
    $('.weeklyDatePicker').datetimepicker({
        format: 'DD-MM-YYYY',
        icons: {
            previous: "fas fa-chevron-left",
            next: "fas fa-chevron-right",
        },
        showClose: true
    });
    $('.weeklyDatePicker').on('dp.change', function (e) {
        var value = $(".weeklyDatePicker").val();
        var firstDate = moment(value, "DD-MM-YYYY").day(0).format("DD-MM-YYYY");
        var lastDate =  moment(value, "DD-MM-YYYY").day(6).format("DD-MM-YYYY");
        if ((firstDate !== 'Invalid date') && (lastDate !== 'Invalid date')) {
            $(".weeklyDatePicker").val(firstDate);
            $(".from_date").val(lastDate);
        } else {
            $(".weeklyDatePicker").val('Pilih Tanggal');
            $(".from_date").val('Pilih Tanggal Dari');
        }
    });
</script>
@endsection
