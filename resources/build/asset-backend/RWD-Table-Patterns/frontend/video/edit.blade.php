<input type="hidden" name="id" value="{{ $tag->id }}">
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Name</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="name" value="{{ $tag->name }}" placeholder="Masukkan Name" autocomplete="off">
        <span style="color: red" class="error"></span>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Status</label>
    <div class="col-sm-12">
        <select name="status" class="form-control type select2" style="width:100%;">
            <option value="1" {{ $tag->status == '1' ? 'selected':'' }}>Aktitf</option>
            <option value="0" {{ $tag->status == '0' ? 'selected':'' }}>Tidak Aktif</option>
        </select>
        <span style="color: red" class="error"></span>
    </div>
</div>
