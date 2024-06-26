{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    @permission($can_edit)
        <a href="{{ $edit_url }}" class="btn btn-space btn-primary btn-sm"> <i class="fas fa-pencil-alt"></i> </a> |
    @endpermission
    @permission($can_show)
        <a href="{{ $show_url }}" class="btn btn-space btn-warning btn-sm"> <i class="fas fa-eye"></i> </a> |
    @endpermission
    @permission($can_delete)
        <button type="submit" class="btn btn-space btn-danger btn-sm"><i class="fas fa-trash"></i></button>
    @endpermission
{!! Form::close()!!}

