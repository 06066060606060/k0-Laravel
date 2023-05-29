<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>
        @else
            <a class="ml-1 underline ml-2 mr-2" data-barba-prevent="self" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>
<div x-data="{ isOpen: false }" class="relative inline-block">
    <!-- Dropdown toggle button -->
    <button @click="isOpen = !isOpen" class="relative z-10 flex items-center p-2 mt-4 text-white bg-gray-800 border border-transparent rounded-md lg:mt-2 focus:border-blue-800 focus:ring-opacity-40 focus:ring-blue-300 focus:blue-400 focus:ring focus:outline-none">
        @if($current_locale === 'en')
            <img src="https://flagicons.lipis.dev/flags/4x3/gb.svg" alt="English" class="w-4 h-4 mr-1">
        @elseif($current_locale === 'fr')
            <img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="Français" class="w-4 h-4 mr-1">
        @elseif($current_locale === 'es')
            <img src="https://flagicons.lipis.dev/flags/4x3/es.svg" alt="Español" class="w-4 h-4 mr-1">
        @endif
    </button>
    <!-- Dropdown menu -->
                    <ul x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="absolute flex z-20 w-48 py-2 mt-2 bg-gray-800 border border-gray-500 rounded-md shadow-xl left-0 lg:right-0">

        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <li class="px-4 py-2 text-gray-700 cursor-not-allowed">
                    @if($current_locale === 'en')
                        <img src="https://flagicons.lipis.dev/flags/4x3/gb.svg" alt="English" class="w-4 h-4 mr-1">
                    @elseif($current_locale === 'fr')
                        <img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="Français" class="w-4 h-4 mr-1">
                    @elseif($current_locale === 'es')
                        <img src="https://flagicons.lipis.dev/flags/4x3/es.svg" alt="Español" class="w-4 h-4 mr-1">
                    @endif
                    {{ $locale_name }}
                </li>
            @else
                <li>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-barba-prevent="self" href="language/{{ $available_locale }}">
                        @if($available_locale === 'en')
                            <img src="https://flagicons.lipis.dev/flags/4x3/gb.svg" alt="English" class="w-4 h-4 mr-1">
                        @elseif($available_locale === 'fr')
                            <img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="Français" class="w-4 h-4 mr-1">
                        @elseif($available_locale === 'es')
                            <img src="https://flagicons.lipis.dev/flags/4x3/es.svg" alt="Español" class="w-4 h-4 mr-1">
                        @endif
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
