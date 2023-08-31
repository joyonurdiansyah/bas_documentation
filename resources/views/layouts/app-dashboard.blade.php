<!DOCTYPE html>
<html>

<head>
    @include('includes.meta')
    <title>@yield('title') | Dashboard</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="image/x-icon" href="">

    @stack('before-style')
    {{-- style --}}
    @include('includes.style')

    @stack('after-style')
</head>

<body>

    @yield('content')

    @stack('before-script')
    {{-- script --}}
    @include('includes.script')

    @stack('after-script')
</body>

</html>
