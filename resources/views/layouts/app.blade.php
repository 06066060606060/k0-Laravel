<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="overflow-x-hidden bg-gray-900 pattern" data-barba="wrapper">
    <navbar>
        @include('parts.navbar')
    </navbar>
    <main>
        @yield('main')
    </main>
    @php
    @if(request()->path()=='admin/login')
    @else
    <footer>
        @include('parts.footer')
    </footer>
    @endif
    @endphp    
    @vite('resources/js/app.js')

    <script></script>
</body>

</html>
