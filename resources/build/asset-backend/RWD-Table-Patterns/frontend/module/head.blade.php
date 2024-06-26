<title>
    {{ Setting::getValByName('title_text') ? Setting::getValByName('title_text') : config('app.name', 'AccountGo') }}
    - @yield('page-title')</title>
<link rel="icon" href="{{ asset(Storage::url('logo')) . '/favicon.png' }}" type="image" sizes="16x16">
<link href="{{ asset(mix('assets/css/bootstrap.min.css')) }}" rel="stylesheet" type="text/css">
<link href="{{ asset('asset-backend/css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.css"
    integrity="sha512-K0/1AQCY3Ueo90Xbwxoyo70O26FSaNZgnXLLBpXZc/Id+nZEzhE0JZvy9KUJci3jDuqCstr4/wxTIqfoxYeMBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/css/fileinput.min.css"
    integrity="sha512-sHiVTDN234pgseKqjDwH39VjS9DkyffX4S00kuAWWq+FrTq7HlFjPoWbfX/QFAxkdG9i9/1ftdG2sS+XWLcJmw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-chosen@1.4.2/bootstrap-chosen.min.css">
<link href="{{ asset(mix('assets/css/fancybox.min.css')) }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
    integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link href="{{ asset(mix('assets/css/select2.min.css')) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset(mix('assets/vendor/summernote/summernote-bs4.css')) }}" rel="stylesheet" />
<!-- Sweetalert -->
<link href="{{ asset(mix('assets/vendor/sweet-alert2/sweetalert2.min.css')) }}" rel="stylesheet" type="text/css">
<!-- Datepicker -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.min.css"
    integrity="sha512-OWGg8FcHstyYFwtjfkiCoYHW2hG3PDWwdtczPAPUcETobBJOVCouKig8rqED0NMLcT9GtE4jw6IT1CSrwY87uw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{ asset('asset-backend/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('asset-backend/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset-backend/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .select2-container .select2-selection--single {
        height: 33px !important;
    }
</style>

