<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    <section class="w-100 clearfix loginSec" id="loginSec">
        <div class="loginSecRow">
            <div class="loginSecCol loginSecCol1">
                <div class="loginSecColInner">
                    <div class="loginLogo">
                        <img src="{{ asset(Storage::url('logo')) . '/logo_bwh.png' }}" alt="logo" class="img-fluid">
                    </div>
                    <div class="loginImage">
                        <img src="{{ asset('assets/images/agrikultur.jpeg') }}" alt="logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="loginSecCol loginSecCol2"
                style="background-image: url({{ asset('assets/images/bg-img6.png') }});">
                <div class="loginSecColInner">
                    <div class="loginFormBox">
                        <div class="loginFormGroup">
                            <div class="loginSecHead">
                                <div class="commonHeading">
                                    <h3>@lang('frontend.login.reset_password')</h3>
                                    <p>@lang('frontend.login.welcome_desc_reset_pass')</p>
                                </div>
                            </div>
                            <div class="loginRegisterTab">
                                <div class="tab-content">
                                    {{-- reset Password --}}
                                    <div class="tab-pane active" id="reset-password">
                                        <div class="loginTabInner">
                                            <form action="{{ route('frontend.forget-password-submit') }}" method="POST"
                                                id="form-reset-pass">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $checkToken->token }}">
                                                <input type="hidden" name="phone" value="{{ $checkToken->phone }}">
                                                <div class="logFormGroup" id="message-validation">

                                                </div>
                                                <div class="logFormGroup">
                                                    <label class="form-label">@lang('frontend.login.password')</label>
                                                    <div class="input-group">
                                                        {{ Form::password('pswd', ['class' => 'form-control border-0', 'autocomplete' => 'off', 'placeholder' => __('frontend.login.place_holder_password')]) }}
                                                        <a href="javascript:void(0)"
                                                            class="input-group-text passwordEye bg-white border-0">
                                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="logFormGroup">
                                                    <label class="form-label">@lang('frontend.login.confirm_password')</label>
                                                    <div class="input-group">
                                                        {{ Form::password('confirm_pswd', ['class' => 'form-control border-0', 'autocomplete' => 'off', 'placeholder' => __('frontend.login.place_holder_confirm_pass')]) }}
                                                        <a href="javascript:void(0)"
                                                            class="input-group-text passwordEyes bg-white border-0"
                                                            style="color:#1FCAC9">
                                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="checkFormBtn">
                                                    <button type="submit"
                                                        class="btnCustom5 btn-1 hover-slide-down w-100 login">
                                                        <span class="justify-content-center">@lang('frontend.login.send')
                                                            <i class="fa-solid fa-arrow-right fa-xl"
                                                                style="color: #ffffff;"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- End Reset Password --}}
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
        $(document).on('submit', '#form-reset-pass', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = '{{ route('frontend.reset-password-submit') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(resp) {
                    if (resp.status) {
                        let content =
                            `
                                    <div class="alert-section-1 wow fadeInUp">
                                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                            <p>
                                                <span class="alert-icon"><i class="fas fa-check check-color"></i></span><span>` +
                            resp.data.message + `</span>
                                            </p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>`;
                        $('#message-validation').html(content);
                        window.location.href = resp.data.url;
                    } else {
                        let content = `<div class="alert-section-1 wow fadeInUp">` +
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">` +
                            `<p> <span class="alert-icon"><i class="fas fa-exclamation-triangle triangle-color"></i></span><span>` +
                            resp.data.message + `</span></p>` +
                            `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>` +
                            `</div>` +
                            `</div>`;
                        $('#message-validation').html(content);
                    }
                }
            });
        });
    </script>
</body>

</html>
