    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>

    @if (config('backpack.base.meta_robots_content'))<meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'index, follow') }}"> @endif
    <link rel="shortcut icon" href=".././img/favicon.png" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}" /> {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name') : config('backpack.base.project_name') }}</title>
    @vite('resources/css/app.css')
    @yield('before_styles')
    
    @stack('before_styles')
    
    @if (config('backpack.base.styles') && count(config('backpack.base.styles')))
    @foreach (config('backpack.base.styles') as $path)
    <link rel="stylesheet" type="text/css" href="{{ asset($path).'?v='.config('backpack.base.cachebusting_string') }}">
    
    @endforeach
    @endif
    
    @if (config('backpack.base.mix_styles') && count(config('backpack.base.mix_styles')))
    @foreach (config('backpack.base.mix_styles') as $path => $manifest)
    <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">
        @endforeach
    @endif

    @if (config('backpack.base.vite_styles') && count(config('backpack.base.vite_styles')))
        @vite(config('backpack.base.vite_styles'))
    @endif

    @yield('after_styles')
    @stack('after_styles')
    @vite('resources/js/app.js')
    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>
* label{
    color: gray;
}
</style>
<!--Lang multi widget-->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings = {"default_language":"fr","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","alt_flags":{"en":"usa"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>