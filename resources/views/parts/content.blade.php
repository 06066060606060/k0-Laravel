<div class="z-0 one"></div>
<!-- HOME -->
<container id="home">
    <section>

        <div
            class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18 ">
            <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                    <div>
                        <div class="relative w-full max-w-lg">

                            <div class="relative">
                                @php $imagesd =  $starred->image[0] ?? null; @endphp
                                <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                    src="{{ asset('storage/' . $imagesd) }}" onerror="this.src='/img/empty.png'">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md"> Selection de la
                        semaine:
                    </span>
                    <h1
                        class="mb-4 text-4xl font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                        {{ $starred->name }}</h1>
                    <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description }}</p>
                    <div class="">
                        @if (backpack_auth()->check())
                            <a href="game?id={{ $starred->id }}"
                                class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">Jouer
                                    Maintenant</span>
                            </a>
                        @else
                            <a onclick="alert('Vous devez ??tre connect?? pour jouer ?? un jeu !')"
                                class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">Jouer
                                    Maintenant</span>
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

</container>

<!-- FREE GAMES -->
<container id="game" class="block px-4 mx-auto md:pt-8 max-w-7xl">
    <section class="text-gray-400 border-b border-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Jeux gratuits</h1>
                <p class="mx-auto text-base leading-relaxed text-gray-300 lg:w-2/3">GoKdo est un site de jeux gratuits
                    permettant de <a href="winner" class="text-blue-500"> gagner des cadeaux</a> !<br>
                    <a href="/admin/register" class="text-blue-500 prevent">Inscrivez-vous gratuitement</a> pour jouer ?? plus
                    d'une dizaine de jeux gratuits multijoueurs originaux et amusants et remporter des cadeaux !.
                </p>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($freegames as $freegame)
                    <div class="p-4 lg:w-1/3 sm:w-1/2">
                        <div class="relative flex overflow-hidden">
                            <div class="absolute top-0 right-0 w-16 h-16">
                                <div
                                    class="border z-20 absolute transform select-none rotate-45 bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                    Gratuit
                                </div>
                            </div>
                            @php $images =  $freegame->image[0] ?? null; @endphp
                            <img alt="gallery"
                                class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                src="{{ asset('storage/' . $images) }}" onerror="this.src='/img/empty.png'">

                            <div
                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                    {{ $freegame->name }}</h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">{{ $freegame->category }}
                                </h1>
                                <p class="text-sm leading-relaxed text-gray-800">{{ $freegame->description }}</p>

                                @if (backpack_auth()->check())
                                    <a href="game?id={{ $freegame->id }}"
                                        class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span
                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span
                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                        <span class="relative">Jouer</span>
                                    </a>
                                @else
                                    <a onclick="alert('Vous devez ??tre connect?? pour jouer ?? un jeu !')"
                                        class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span
                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span
                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                        <span class="relative">Jouer</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 lg:w-1/3 sm:w-1/2">
                        <div class="relative flex overflow-hidden">
                            <div class="absolute top-0 right-0 w-16 h-16">
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                    Aucun jeu
                                </div>
                            </div>
                            <img alt="gallery"
                                class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                src="./img/empty.png">
                            <div
                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                </h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk cold-pressed
                                    sriracha leggings
                                    jianbing microdosing tousled waistcoat.</p>
                                <a href="game"
                                    class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <a href="allgames">
                <h1
                    class="pt-12 mb-4 text-2xl font-medium text-center text-blue-700 sm:text-3xl title-font hover:text-blue-600">
                    Voir la liste complete</h1>
            </a>
        </div>
    </section>
</container>


<!-- WINNER -->
<winner class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="px-4 pt-16 mx-auto max-w-7xl">
            <h2 class="text-3xl font-bold tracking-tight text-center text-gray-100 ">
                Derniers Bonus
            </h2>

            <div class="pb-16 mt-4 border-b border-gray-600 md:mt-6 swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/gem10.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            Jenny001<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/gem5b.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            JohnDohn<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 5 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/gem5.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            FrankD<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 5 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/gem6.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            DanB38<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 5 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/coin10.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            User3366<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 5 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <div class="swiper-slide">
                        <blockquote>
                            <div
                                class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                <div class="flex">
                                    <img alt="" class="inline-block object-center w-12 h-12"
                                        src="./img/food.png">
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            Yann007<br>
                                            <span href="#"
                                                class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 5 ???</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                </div>
            </div>
        </div>
    </section>
</winner>

<!-- GAMES BOOSTER -->
<container id="game" class="block px-4 mx-auto max-w-7xl">
    <section class="text-gray-400 border-b border-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Nos jeux boosters</h1>
                <p class="mx-auto text-base leading-relaxed text-gray-300 lg:w-2/3">Whatever cardigan tote bag tumblr
                    hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
                    heard of them man bun deep jianbing selfies heirloom.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($boostergames as $boostergame)
                    <div class="p-4 lg:w-1/3 sm:w-1/2">
                        <div class="relative flex overflow-hidden">
                            <div class="absolute top-0 right-0 w-16 h-16">
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                    Booster
                                </div>
                            </div>
                            @php $imagesb =  $boostergame->image[0] ?? null; @endphp
                            <img alt="gallery"
                                class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                src="{{ asset('storage/' . $imagesb) }}" onerror="this.src='/img/empty.png'">
                            <div
                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                    {{ $boostergame->name }}</h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">
                                    {{ $boostergame->category }}</h1>
                                <p class="text-sm leading-relaxed text-gray-800">{{ $boostergame->description }}</p>
                                @if (backpack_auth()->check())
                                    <a href="game?id={{ $boostergame->id }}"
                                        class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span
                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span
                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                        <span class="relative">Jouer</span>
                                    </a>
                                @else
                                    <a onclick="alert('Vous devez ??tre connect?? pour jouer ?? un jeu !')"
                                        class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span
                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span
                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                        <span class="relative">Jouer</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 lg:w-1/3 sm:w-1/2">
                        <div class="relative flex overflow-hidden">
                            <div class="absolute top-0 right-0 w-16 h-16">
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                    Aucun jeu
                                </div>
                            </div>
                            <img alt="gallery"
                                class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                src="./img/empty.png">
                            <div
                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                </h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk cold-pressed
                                    sriracha leggings
                                    jianbing microdosing tousled waistcoat.</p>
                                <a href="game"
                                    class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
            <a href="allgames">
                <h1
                    class="pt-12 mb-4 text-2xl font-medium text-center text-blue-700 sm:text-3xl title-font hover:text-blue-600">
                    Voir la liste complete</h1>
            </a>
        </div>
    </section>
</container>


<!-- CADEAU -->
<container id="how" class="block py-16 mx-8 border-b border-gray-600 max-w-7xl md:mx-auto">
    <section class="text-gray-400 body-font">
        <div class="flex flex-col items-center">
            <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Gagner des cadeaux</h1>
        </div>
        <div class="container flex flex-wrap px-5 py-8 mx-auto">
            <div class="relative flex pt-10 pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                    <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                    1</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                        <i class="fa-solid fa-user fa-2x"></i>
                    </div>
                    <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Inscrivez-vous gratuitement</h2>
                        <p class="leading-relaxed text-gray-300">VHS cornhole pop-up, try-hard 8-bit iceland helvetica.
                            Kinfolk</p>
                    </div>
                </div>
            </div>
            <div class="relative flex pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                    <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                    2</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                        <i class="fa-solid fa-gamepad fa-2x"></i>
                    </div>
                    <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Jouez vos parties gratuites
                            quotidiennes</h2>
                        <p class="leading-relaxed text-gray-300">VHS cornhole pop-up, try-hard 8-bit iceland helvetica.
                            Kinfolk</p>
                    </div>
                </div>
            </div>
            <div class="relative flex pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                    <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                    3</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                        <i class="fa-regular fa-gem fa-2x"></i>
                    </div>
                    <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Gagnez des Diamants, pi??ces, gemmes
                        </h2>
                        <p class="leading-relaxed text-gray-300">VHS cornhole pop-up, try-hard 8-bit iceland helvetica.
                            Kinfolk</p>
                    </div>
                </div>
            </div>
            <div class="relative flex pb-10 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                    <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div
                    class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                    4</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                        <i class="fa-solid fa-gift fa-2x"></i>
                    </div>
                    <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Convertisser les en cadeaux</h2>
                        <p class="leading-relaxed text-gray-300">VHS cornhole pop-up, try-hard 8-bit iceland helvetica.
                            Kinfolk</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</container>
