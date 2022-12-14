<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-gray-900 pattern overflow-x-hidden" data-barba="wrapper">
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
    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <script>
       barba.init();
    </script>
</body>
</html>
