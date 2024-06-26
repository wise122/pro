<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Propaktani"/>
        @section('page-title')
        Login
        @endsection
        @include('backend.layouts.head')
    </head>

    <body>
        <!-- Begin page -->
        <div class="accountbg"></div>
            <div class="wrapper-page">
                <div class="card card-pages shadow-none">
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                            <a href="#" class="logo logo-admin">
                                <img class="img-fluid logo-img" src="{{ $logo.'/logo.png' }}" alt="image" height="80">
                            </a>
                        </div>
                        <h5 class="font-18 text-center">Sign in to Propaktani</h5>
                        <form method="POST" action="{{ route('backend.login') }}" class="form-horizontal m-t-30">
                            @csrf
                            <div class="form-group">
                                <div class="col-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>">
                <footer class="footer">
                    {{(Setting::getValByName('footer_text')) ? Setting::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}
                </footer>

        @include('backend.layouts.script')
    </body>
</html>
