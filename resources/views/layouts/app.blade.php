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
        <div x-data="{ modelOpen: false }" class="flex justify-center">

            <button @click="modelOpen =!modelOpen" id="primary_button" class="hidden">
            </button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-80" aria-hidden="true"></div>

                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block w-full max-w-4xl pt-32 mx-4 overflow-hidden transition-all transform">

                        <div class="flex flex-col max-w-md mx-auto mt-6 mb-0 bg-gray-800 rounded-md shadow-2xl">
                        <div class="flex flex-row-reverse pr-4">
                                <img class="w-6 h-6 mt-4 transition-colors duration-100 transform opacity-25 hover:opacity-100"
                                    src="/img/iconclose.png" @click="modelOpen = false">
                            </div>
                            <form action="admin/login" class="m-4 space-y-6" method="post">
                                @csrf
                           <h1 class="text-3xl font-bold text-center text-gray-100">Se connecter</h1>
                                <div class="space-y-1 text-sm">
                                    <label for="email" class="block text-gray-400">email</label>
                                    <input type="email" name="email" id="email" placeholder="exemple@mail.com"
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                                </div>
                                <div class="space-y-1 text-sm">
                                    <label for="password" class="block text-gray-400">Mot de passe</label>
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                                </div>
                                <button
                                    class="block w-full p-3 font-bold text-center text-white transition-colors duration-200 rounded bg-emerald-500 hover:bg-emerald-400 focus:bg-emerald-400">Se
                                    Connecter</button>
                            </form>
                            <p class="pb-4 text-xs text-center text-gray-400 sm:px-6">Pas encore de compte? &zwnj;
                                <a rel="noopener noreferrer" href="#" @click="modelOpen = false"
                                    onclick="document.getElementById('secondaryButton').click()"
                                    class="text-gray-100 underline"> Inscrivez-vous</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{ modelOpen: false }" class="flex justify-center">

            <button @click="modelOpen =!modelOpen" id="secondaryButton" class="hidden">
            </button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-80" aria-hidden="true"></div>

                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block w-full max-w-4xl pt-32 mx-4 overflow-hidden transition-all transform">

                        <div class="flex flex-col max-w-md mx-auto mt-6 mb-0 bg-gray-800 rounded-md shadow-2xl">
                        <div class="flex flex-row-reverse pr-4">
                                <img class="w-6 h-6 mt-4 transition-colors duration-100 transform opacity-25 hover:opacity-100"
                                    src="/img/iconclose.png" @click="modelOpen = false">
                            </div>
                            <form action="admin/register" class="m-4 space-y-6" method="post">
                                @csrf
                           <h1 class="text-3xl font-bold text-center text-gray-100">Inscription</h1>
                              <div class="space-y-1 text-sm">
                                    <label for="" class="block text-gray-400">Pseudo</label>
                                    <input type="text" name="name" id="name" placeholder=""
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                                </div>
                                <div class="space-y-1 text-sm">
                                    <label for="email" class="block text-gray-400">email</label>
                                    <input type="email" name="email" id="email" placeholder="exemple@mail.com"
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">
                                </div>
                                <div class="space-y-1 text-sm">
                                    <label for="password" class="block text-gray-400">Mot de passe</label>
                                    <input type="password" name="password" id="password" placeholder=""
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                                </div>
                                 <div class="space-y-1 text-sm">
                                    <label for="password" class="block text-gray-400">Confirmation du mot de passe</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder=""
                                        class="w-full px-4 py-3 text-gray-100 bg-gray-900 border-gray-700 rounded-md focus:border-emerald-400">

                                </div>
                                <button
                                    class="block w-full p-3 font-bold text-center text-white transition-colors duration-200 rounded bg-emerald-500 hover:bg-emerald-400 focus:bg-emerald-400">S'enregistrer</button>
                            </form>
          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        @include('parts.footer')
    </footer>
    @vite('resources/js/app.js')

    <script src="https://cdn.jsdelivr.net/npm/@barba/core"></script>
    <script>
        barba.init();
        barba.hooks.afterEnter((data) => {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1.5,
                spaceBetween: 24,
                centeredSlides: true,
                autoplay: {
                    delay: 8000,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    800: {
                        slidesPerView: 3,
                    },
                    1100: {
                        slidesPerView: 4,
                    },
                },
            })
        });

        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1.5,
                spaceBetween: 24,
                centeredSlides: true,
                autoplay: {
                    delay: 8000,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    800: {
                        slidesPerView: 3,
                    },
                    1100: {
                        slidesPerView: 4,
                    },
                },
            })
        })
    </script>
</body>

</html>
