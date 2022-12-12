<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-gray-900 pattern overflow-x-hidden">
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
</body>
</html>
