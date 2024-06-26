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
                                    <h3>@lang('frontend.login.forgot_password')</h3>
                                    <p>@lang('frontend.login.welcome_desc_forget_pass')</p>
                                </div>
                            </div>
                            <div class="loginRegisterTab">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="forget-password">
                                        <div class="loginTabInner">
                                            <form action="{{ route('frontend.forget-password-submit') }}" method="POST"
                                                id="form-forget-pass">
                                                @csrf
                                                <div class="logFormGroup" id="message-validation">

                                                </div>
                                                <div class="logFormGroup">
                                                    <label class="form-label">@lang('frontend.login.telp')</label>
                                                    <div class="input-group">
                                                        {{ Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control border-1', 'autocomplete' => 'off', 'placeholder' => __('frontend.login.place_holder_telp'), 'pattern' => '\d*', 'minlength' => 8, 'maxlength' => 13, 'inputmode' => 'numeric']) }}
                                                        <div class="input-group-text bg-white border-1">
                                                            <i class="fa-solid fa-envelope fa-xl"></i>
                                                        </div>
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
        let timeoutId;

        document.getElementById('phone').oninvalid = function(event) {
            event.target.setCustomValidity('Harap masukkan nomor telepon yang valid');
        };

        document.getElementById('phone').oninput = function(event) {
            event.target.setCustomValidity('');
        };

        $(document).on('submit', '#form-forget-pass', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            let url = '{{ route('frontend.forget-password-submit') }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(resp) {
                    if (resp.status) {
                        $('input[name="phone"]').val('')
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
