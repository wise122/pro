<input type="hidden" name="id" value="{{ $keahlian->id }}">
<div class="form-group">
    <label for="" class="col-sm-8 control-label">Name</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="name" value="{{ $keahlian->name }}" placeholder="Masukkan Name" autocomplete="off">
        <span style="color: red" class="error"></span>
    </div>
    <label for="" class="col-sm-8 control-label">Urutan</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" name="urutan" value="{{ $keahlian->urutan }}" placeholder="Masukkan Urutan" autocomplete="off">
        <span style="color: red" class="error"></span>
    </div>
</div>
