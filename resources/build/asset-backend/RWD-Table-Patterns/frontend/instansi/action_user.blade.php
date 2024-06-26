<form action="{{ $form_url }}" method="post" class="form-inline js-confirm" data-confirm="{{ $confirm_message }}">
    @method('delete')
    @permission($reset_password)
    <a href="{{ $reset_url }}" class="btn btn-success btn-action ml-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Ganti Password">
        <i class="mdi mdi-car-brake-parking"></i></a>
    @endpermission
    @permission($edit_user)
    <a href="{{ $edit_url }}" class="btn btn-primary btn-action ml-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
        <i class="fas fa-pencil-alt"></i></a>
    @endpermission
    @permission($delete_user)
    <a href="{{ $edit_url }}" class="btn btn-danger btn-action ml-2 btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" type="submit">
        <i class="fas fa-trash"></i>
    </a>
    @endpermission
</form>
