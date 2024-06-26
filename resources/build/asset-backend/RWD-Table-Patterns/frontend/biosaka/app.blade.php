<!DOCTYPE html>
<html lang="id" dir="ltr">

<head>
    @include('frontend.layouts.head')
</head>

<body>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.script')
</body>

</html>
