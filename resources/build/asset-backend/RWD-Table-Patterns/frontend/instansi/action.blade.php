{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    @permission($can_edit)
        <a href="{{ $edit_url }}" class="btn btn-space btn-primary active btn-sm"> <i class="fas fa-pencil-alt"></i> </a> |
    @endpermission
    @permission($can_delete)
        <button type="submit" class="btn btn-space btn-danger active btn-sm"><i class="fas fa-trash"></i></button>
    @endpermission
{!! Form::close()!!}
