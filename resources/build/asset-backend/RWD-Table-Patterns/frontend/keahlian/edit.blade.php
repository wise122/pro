<input type="hidden" value="{{ $instansi->id }}" name="id">
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Name</label>
    <div class="col-sm-12">
        <input type="text" name="name" class="form-control name" placeholder="Masukkan Nama Instansi"
            autocomplete="off" value="{{ $instansi->name }}">
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="fa fa-save btn btn-success save"> Simpan</button>
</div>
