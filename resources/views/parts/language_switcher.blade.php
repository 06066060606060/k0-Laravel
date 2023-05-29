<div x-data="{ isOpen: false }" class="relative inline-block">
    <!-- Dropdown toggle button -->
    <button @click="isOpen = !isOpen" class="flex items-center p-2 mt-4 text-gray-700 bg-gray-200 border border-transparent rounded-md focus:outline-none">
        <svg class="w-5 h-5 mr-1 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
        <span>{{ ucfirst($current_locale) }}</span>
    </button>
    <!-- Dropdown menu -->
    <ul x-show="isOpen" @click.away="isOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute z-10 w-40 py-2 mt-2 bg-white border border-gray-200 rounded-md shadow-xl left-0">
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <li class="px-4 py-2 text-gray-700 cursor-not-allowed">{{ $locale_name }}</li>
            @else
                <li>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-barba-prevent="self" href="language/{{ $available_locale }}">
                        {{ $locale_name }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>



                    