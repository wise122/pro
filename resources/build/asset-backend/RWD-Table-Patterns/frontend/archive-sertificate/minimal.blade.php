<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
</head>

<body class="antialiased">
    <div class="relative flex items-center justify-center h-full sm:items-center sm:pt-0">
        <div class="flex items-center max-w-xl mx-auto sm:px-6 lg:px-8 flex-col">
            <div class="flex items-center divide-x">
                <div class="pr-4 text-lg text-black">
                    @yield('code')
                </div>

                <div class="pl-4 text-lg text-black uppercase tracking-wider">
                    @yield('message')
                </div>
            </div>
            <div class="pt-6 text-lg text-black uppercase font-bold tracking-wider">
                <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset(mix('assets/js/app.js')) }}"></script>

</html>
