 <div x-data="{ isOpen: false }" class="relative inline-block mb-2">
                    <!-- Dropdown toggle button -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 flex items-center p-2 mt-4 text-white bg-gray-800 border border-transparent rounded-md lg:mt-2 focus:border-blue-800 focus:ring-opacity-40 focus:ring-blue-300 focus:blue-400 focus:ring focus:outline-none">
        <span class="mr-1">@if($current_locale === 'en')
            <img src="https://flagicons.lipis.dev/flags/4x3/gb.svg" alt="English" class="w-4 h-4 mr-1">
        @elseif($current_locale === 'fr')
            <img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="Français" class="w-4 h-4 mr-1">
        @elseif($current_locale === 'es')
            <img src="https://flagicons.lipis.dev/flags/4x3/es.svg" alt="Español" class="w-4 h-4 mr-1">
        @endif</span>
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
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
                </li>
            @else
                <li>
                    <a data-barba-prevent="self" class="block px-4 py-3 text-sm font-bold text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white" href="language/{{ $available_locale }}">
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
