<input type="hidden" name="id" value="{{ $category->id }}">
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Title</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="title" value="{{ $category->title }}" placeholder="Masukkan Nama " autocomplete="off">
        <span style="color: red" class="error"></span>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Status</label>
    <div class="col-sm-12">
        <select name="status" class="form-control type select2" style="width:100%;">
            <option value="">Status</option>
            <option value="1" {{ $category->status == '1' ? 'selected':'' }}>Aktitf</option>
            <option value="0" {{ $category->status == '0' ? 'selected':'' }}>Tidak Aktif</option>
        </select>
        <span style="color: red" class="error"></span>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="fa fa-save btn btn-success save"> Simpan</button>
</div>
