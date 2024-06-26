<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <section class="w-100 clearfix loginSec" id="loginSec">
        <div class="loginSecRow">
            <div class="loginSecCol loginSecCol2"
                style="background-image: url({{ asset('assets/images/bg-img6.png') }});">
                <div class="loginSecColInner">
                    <div class="loginFormBox">
                        <div class="loginFormGroup">
                            <div class="loginSecHead">
                                <div class="commonHeading">
                                    <h3>@lang('frontend.login.welcome')</h3>
                                    <p>@lang('frontend.login.welcome_desc')</p>
                                </div>
                            </div>
                            <div class="loginRegisterTab">
                                <div class="registerTabInner">
                                    <div class="loginTabInner">
                                        <form action="{{ route('frontend.register') }}" method="POST"
                                            id="form-register">
                                            @csrf
                                            <div class="logFromGroup" id="validation-register"></div>
                                            <div class="logFormGroup">
                                                <label class="form-label">@lang('frontend.login.name')</label>
                                                <div class="input-group">
                                                    {{ Form::text('name', null, [
                                                        'class' => 'form-control border-1',
                                                        'autocomplete' => 'off',
                                                        'placeholder' => __('frontend.login.place_holder_name'),
                                                    ]) }}
                                                    <a class="input-group-text bg-white border-1">
                                                        <i class="fa-regular fa-user"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="logFormGroup mt-3">
                                                <label class="form-label">@lang('frontend.login.telp')</label>
                                                <div class="input-group">
                                                    {{ Form::text('no_telepon', null, [
                                                        'class' => 'form-control border-1',
                                                        'autocomplete' => 'off',
                                                        'placeholder' => __('frontend.login.place_holder_telp'),
                                                    ]) }}
                                                    <a class="input-group-text bg-white border-1">
                                                        <i class="fa-regular fa-phone"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="logFormGroup mt-3">
                                                <label class="form-label">@lang('frontend.login.password')</label>
                                                <div class="input-group">
                                                    {{ Form::password('pswd', [
                                                        'class' => 'form-control border-1',
                                                        'autocomplete' => 'off',
                                                        'placeholder' => __('frontend.login.place_holder_password'),
                                                    ]) }}
                                                    <a class="input-group-text passwordEye bg-white border-1">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="logFormGroup mt-3">
                                                <label class="form-label">@lang('frontend.login.confirm_password')</label>
                                                <div class="input-group">
                                                    {{ Form::password('confirm_pswd', [
                                                        'class' => 'form-control border-1',
                                                        'autocomplete' => 'off',
                                                        'placeholder' => __('frontend.login.place_holder_confirm_pass'),
                                                    ]) }}
                                                    <a class="input-group-text passwordEyes bg-white border-1">
                                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="logFormGroup mt-3">
                                                <label for="roles" class="form-label">@lang('frontend.login.role')</label>
                                                <div class="input-group">
                                                    {!! Form::select('roles', ['' => __('frontend.login.place_holder_role')] + $role, null, [
                                                        'class' => 'form-select border-1',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="checkFormBtn mt-3">
                                                <button type="submit" class="btnCustom5 btn-1 hover-slide-down w-100">
                                                    <span class="justify-content-center">@lang('frontend.login.register')
                                                        <i class="fa-solid fa-arrow-right fa-xl"
                                                            style="color: #ffffff;"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.layouts.script')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            console.log('test doc');
        });
        $(document).on('submit', '#form-login', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = '{{ route('frontend.login') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(resp) {
                    if (resp.status) {
                        window.location.href = resp.data.url;
                    } else {
                        let content = `<div class="alert-section-1 wow fadeInUp">` +
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">` +
                            `<p class="m-0"> <span class="alert-icon"><i class="fas fa-exclamation-triangle triangle-color"></i></span><span>` +
                            resp.data.message + `</span></p>` +
                            `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>` +
                            `</div>` +
                            `</div>`;
                        $('#message-validation').html(content);
                    }
                }
            });
        });

        $(document).on('submit', '#form-register', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = '{{ route('frontend.register') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(resp) {
                    window.location.href = resp.data.url;
                },
                error: function(err, status, xhr) {
                    let content = `<div class="alert-section-1 wow fadeInUp">` +
                        `<div class="alert alert-danger alert-dismissible fade show" role="alert">` +
                        `<p class="m-0"> <span class="alert-icon"><i class="fas fa-exclamation-triangle triangle-color"></i></span><span>` +
                        err.responseJSON.message + `</span></p>` +
                        `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>` +
                        `</div>` +
                        `</div>`;
                    $('#validation-register').html(content);
                }
            });
        });
    </script>
</body>

</html>
