<!DOCTYPE html>
<html>

<head>
    @include('includes.meta')
    <title>@yield('title') | Documentasi PT BUMI ALAM SEGAR</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="image/x-icon" href="">

    @stack('before-style')
    {{-- style --}}
    @include('includes.style')

    @stack('after-style')
</head>

<body>

    @include('includes.sidebar')
    @yield('content')
    @include('includes.footer')

    @stack('before-script')
    {{-- script --}}
    @include('includes.script')

    @stack('after-script')
</body>

</html>
