<meta charset="utf-8">
<title>PROPAKTANI -
    {{ Setting::getValByName('title_text') ? Setting::getValByName('title_text') : config('app.name', 'AccountGo') }}
</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/bootstrap.min.css')) }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/owl.carousel.min.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/owl.theme.default.min.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/grt-youtube-popup.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/style.css')) }}">
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/css/responsive.css')) }}">
<link rel="shortcut icon" type="image/png" href="{{ asset(Storage::url('logo')) . '/favicon.png' }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/font-awesome/css/all.min.css')) }}">
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset(mix('assets/vendor/sweet-alert2/sweetalert2.min.css')) }}">
@yield('stylesheet')
<style>
    .select2-container .select2-selection--single {
        height: 40px;
    }
</style>

@yield('css')

