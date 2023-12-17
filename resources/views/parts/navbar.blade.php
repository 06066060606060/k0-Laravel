@php
use \App\Http\Controllers\GlobalController;
$isMobile = GlobalController::isMobile();
@endphp

<header class="z-10 flex px-4 pt-6 pb-2 md:px-0 md:mx-auto max-w-7xl border-x-1 justify-between">
    <nav x-data="{ isOpen: false }" class="container py-6 pl-2 pr-4 mx-auto lg:flex lg:justify-between lg:items-center">
        <div class="flex items-center justify-between">
            <div>
                <a class="text-2xl font-bold text-gray-700 lg:text-3xl hover:text-gray-400" href="/">
                    <img src="/img/logo-mobile.webp" alt="Gokdo" width="354" title="Gokdo Sondages rémunérés" height="96" class="w-auto h-24">
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button"
                    class="text-gray-500 hover:text-gray-400 focus:outline-none focus:text-gray-400 "
                    aria-label="toggle menu">
                    <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>

                    <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
            class="absolute inset-x-0 z-50 w-screen px-6 py-4 mt-12 transition-all duration-300 ease-in-out bg-blue-100 shadow-md lg:bg-transparent lg:shadow-none lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
            <div class="flex flex-col pb-4 space-y-4 align-baseline mynav lg:mt-0 lg:flex-row lg:space-y-0 md:pb-0">
                @php $locale = app()->getLocale(); @endphp
                @include('partials.nav-link', ['url' => '/', 'text' => backpack_auth()->check() ? __('Sondages') : __('Accueil'), 'icon' => backpack_auth()->check() ? 'fa-poll' : 'fa-house', 'hide' => false, 'close' => true])
                @unless(backpack_auth()->check())
                    @include('partials.nav-link', ['url' => '/#concept', 'text' => __('Concept'), 'icon' => 'fa-gamepad', 'hide' => false, 'close' => true])
                @endunless
                <!-- Add other nav links here -->
            </div>

            @includeWhen(backpack_auth()->check(), 'partials.dropdown-menu')

            @unless(backpack_auth()->check())
                @include('partials.auth-buttons')
            @endunless
        </div>
    </nav>
</header>


@if (backpack_auth()->check())
    <div class="welcome-container py-2 mx-8 mb-4 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-70 max-w-7xl">
    <div class="flex flex-wrap items-center justify-center py-2 mx-auto md:justify-between max-w-7xl">
        @unless($isMobile)
            <p class="welcome-message pb-2 ml-4 mr-2 font-bold text-gray-200 capitalize lg:ml-8 md:pb-0">
                {{__('Bienvenue')}} {{ backpack_auth()->user()->name }}</p>
        @endunless

        <div class="resources-info flex items-center pr-4 mt-1">
            <div class="resource-item flex px-2">
                <img src="/img/diamond5.png" class="w-8 h-6">
                <p class="resource-quantity pt-1 text-white">&nbsp; x {{ backpack_auth()->user()->trophee1 }}</p>
            </div>
            <div class="resource-item flex px-2">
                <img src="/img/coin10.png" class="w-8 h-6">
                <p class="resource-quantity pt-1 text-white">&nbsp; x {{ backpack_auth()->user()->trophee3 }}</p>
            </div>
        </div>
    </div>
</div>

@else
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('.mynav a');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = 'text-sm font-bold lg:mx-4 text-blue-600';
            }
        }
    });
</script>
