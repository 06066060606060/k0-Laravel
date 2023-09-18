<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('parts.head')
</head>
<body class="overflow-x-hidden bg-gray-900 pattern" data-barba="wrapper">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLHCZTD3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <navbar>
        @include('parts.navbar')
    </navbar>
    <main>
        @yield('main')
    </main>
    <footer>
        @include('parts.footer')
    </footer>
    @vite('resources/js/app.js')

    <script></script>
</body>

</html>
