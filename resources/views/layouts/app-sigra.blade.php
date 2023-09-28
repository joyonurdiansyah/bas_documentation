<!DOCTYPE html>
<html>

<head>
    @include('includes.meta')
    <title>@yield('title') | User Manual My PAS Online</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="image/x-icon" href="">

    @stack('before-style')
    {{-- style --}}
    @include('includes.style')

    @stack('after-style')

    <style>
        @media print {
            #sidebar {
                display: none
            }

            #content-wrapper {
                padding-left: 0 !important
            }

            .btn-scroll-top {
                display: none
            }

            [data-aos] {
                display: block !important;
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }

            .action-button-container {
                display: none !important
            }

            #contact {
                display: none !important
            }

            #footer-wrapper {
                display: none !important
            }
        }
    </style>
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
