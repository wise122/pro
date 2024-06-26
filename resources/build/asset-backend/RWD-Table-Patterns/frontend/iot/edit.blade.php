<input type="hidden" name="id" value="{{ $faq->id }}">
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Title</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="title" value="{{ $faq->title }}" placeholder="Masukkan Nama " autocomplete="off">
        <span style="color: red" class="error"></span>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Status</label>
    <div class="col-sm-12">
        <select name="status" class="form-control type select2" style="width:100%;">
            <option value="">Status</option>
            <option value="1" {{ $faq->status == '1' ? 'selected':'' }}>Aktitf</option>
            <option value="0" {{ $faq->status == '0' ? 'selected':'' }}>Tidak Aktif</option>
        </select>
        <span style="color: red" class="error"></span>
    </div>
</div>
<div class="form-group">
    <label class="col-8 col-form-label" for="example-input-normal">Description</label>
    <div class="col-12">
        {{-- {!! Form::textarea('description', $faq->description, ['class' => 'form-control summernote']) !!} --}}
        <textarea name="description" class="form-control summernote"  rows="5">{{ $faq->description }}</textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="fa fa-save btn btn-success save"> Simpan</button>
</div>
