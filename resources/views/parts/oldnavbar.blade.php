
<nav x-data="{ isOpen: false }" class="shadow ">
    <div class="container px-6 mx-auto">
        <div class="py-2 lg:flex lg:items-center lg:justify-between">
            <div class="flex items-center justify-between">

                <div class="flex">
                    <img  src="./img/logo.png" alt="SLS" class="flex mx-4 h-[52px] w-auto pt-1 z-10">
                    <a class="z-10 pt-3 text-2xl font-bold text-white lg:text-3xl hover:text-gray-300"
                        href="/">Cercle Invest SLS</a>
                </div>


                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
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
                class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-gray-900 shadow-md lg:bg-transparent lg:shadow-none lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0">
                <div class="-mx-4 lg:flex lg:items-center">
                    @if (backpack_auth()->user())
                        <i class="pt-2 ml-4 mr-2 text-gray-200 capitalize lg:mt-0">Bienvenue
                            {{ backpack_auth()->user()->name }}</i>
                        <div class="z-50 pl-5 md:pl-2">
                            <div x-data="{ isOpen: false }" class="relative inline-block">
                                <!-- Dropdown toggle button -->
                                <button @click="isOpen = !isOpen"
                                    class="relative z-10 block p-2 mt-4 text-white bg-gray-800 border border-transparent rounded-md lg:mt-0 focus:border-green-500 focus:ring-opacity-40 focus:ring-green-300 focus:green-blue-400 focus:ring focus:outline-none">
                                    <svg class="w-5 h-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div x-show="isOpen" @click.away="isOpen = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="absolute z-20 w-48 py-2 mt-2 bg-gray-800 rounded-md shadow-xl left:0 lg:right-0">
                                    @if (backpack_auth()->user()->role == "admin")
                                    <a href="/admin"
                                        class="block px-4 py-3 text-sm text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white">
                                        Dashboard </a>
                                        <a href="/profil"
                                        class="block px-4 py-3 text-sm text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white">
                                        Profil </a>
                                    @else
                                    <a href="/profil"
                                    class="block px-4 py-3 text-sm text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white">
                                    Profil </a>
                                    @endif
                                    <a href="/logout"
                                        class="block px-4 py-3 text-sm text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white">
                                        Déconnection </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="/admin/register"
                            class="block mx-4 mt-4 text-gray-200 capitalize lg:mt-0 hover:text-green-400">Inscription</a>
                        <a href="/admin"
                            class="block mx-4 mt-4 text-gray-200 capitalize lg:mt-0 hover:text-green-400">Login</a>
                    @endif


                </div>
            </div>
        </div>

    </div>
</nav>