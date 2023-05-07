@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp
@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif
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
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md"> JOUEZ GRATUITEMENT A
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
                                <span class="relative">Jouez
                                    Maintenant</span>
                            </a>
                        @else
                            <a href="admin/register"
                                class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group prevent">
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">Jouez
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
<container id="game" class="block px-2 pb-8 mx-auto md:px-4 md:pt-8 max-w-7xl">
    <section class="text-gray-400 border-gray-600 body-font">
        <div class="container px-2 py-0 mx-auto md:px-5">
            <div class="flex flex-col w-full mb-0 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Jeux gratuits</h1>
                <p class="mb-10 mx-auto text-base leading-relaxed text-gray-300 lg:w-2/3">GoKDO vous propose des jeux gratuits
                    permettant d'avoir une chance de <a href="cadeaux" class="text-blue-500">gagner des cadeaux</a> !<br>
                    @if (backpack_auth()->check())
                    <a class="text-blue-500 prevent">Jouez aux jeux gratuits</a>, nous proposons gratuitement une grille de jeu instantanée multijoueurs et amusante dans laquelle le but est découvrir des fruits ! Remportez des diamants sur notre jeu gratuit GoFRUITS afin de les échanger contre des cadeaux, de l'argent Paypal ou encore des chèques cadeaux Amazon !
                    @else
                    <a href="admin/register" class="text-blue-500 prevent">Inscrivez-vous gratuitement</a> et bénéficiez de 150 Diamants OFFERTS !
                    @endif                    
                </p>
            <center>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>            </center>
            </div>
        </div>    
    </section>
</container>


<!-- WINNER -->
<winner class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                DERNIERS GAGNANTS
            </h2>

            <div class="pb-4 mt-4 border-gray-600 md:mt-4 swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden">
                <div class="swiper-wrapper">



                    @forelse ($concours as $concour)
                        <div class="swiper-slide">
                            <blockquote>
                                <div
                                    class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                    <div class="flex">
                                        <img alt="" class="inline-block object-center w-auto h-12"
                                            src="storage/{{ $concour->cadeau->image }}">
                                        <div class="flex flex-col">
                                            <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                             {{-- {{ $concour->user->name }}  --}}
                                            </h2>
                                              <span href="#" class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">{{ $concour->cadeau->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                         
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <blockquote>
                                <div
                                    class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">

                                    <div class="flex">
                                        <img alt="" class="inline-block object-center w-12 h-12"
                                            src="./img/gem10.png">
                                        <div class="flex">
                                            <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                                Dummy<br>
                                                <span href="#"
                                                    class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10
                                                    ✧</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    @endforelse




                </div>
            </div>
        </div>
    </section>
</winner>

<!-- GAMES BOOSTER -->
<container id="game" class="block px-4 mx-auto max-w-7xl">
    <section class="text-gray-400 border-b border-gray-600 body-font">
        <div class="container px-2 py-12 mx-auto md:px-4">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Nos jeux booster</h1>
                <p class="mx-auto text-base leading-relaxed text-gray-300 lg:w-2/3"><a class="text-blue-500 prevent">Jouez aux jeux booster</a> et gagnez des diamants / rubis / coins afin de les échanger contre de l'argent réel via Paypal, des chèques cadeaux Amazon ou encore même des cadeaux !
                </p>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($allgames as $allgame)
                    <div class="w-1/2 p-4 lg:w-1/2">
                     
                        <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                        @if (backpack_auth()->check())
                        <a href="game?id={{ $allgame->id }}">
                            @else
                            <a href="admin/register" class="prevent">
                            @endif
                            <div class="absolute top-0 right-0 w-16 h-16">
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                {{ $allgame->prix }}
                                @if ($allgame->type_prix == 'Diamants')
                                 <img src="img/diamond5.png" class="w-4" style="display:inline;">
                                @elseif ($allgame->type_prix == 'Rubis')
                                 <img src="img/gem10.png" class="w-4" style="display:inline;">
                                @else
                                 <img src="img/coin10.png" class="w-4" style="display:inline;">
                                 @endif
                                </div>
                            </div>
                            @php $imagesb =  $allgame->image[0] ?? null; @endphp
                            <img alt="gallery"
                                class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                src="{{ asset('storage/' . $imagesb) }}" onerror="this.src='/img/empty.png'">
                            <div
                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">
                                    {{ $allgame->name }}</h2>
                                <h1 class="text-lg font-medium text-gray-700 md:mb-1 title-font">
                                    {{ $boostergame->category }}</h1>
                                <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $allgame->description }}</p>
                                @if (backpack_auth()->check())
                                    <a href="game?id={{ $allgame->id }}"
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
                                    <a href="admin/register"
                                        class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group prevent">
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
                        </a>
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
            <a href="jeux"
                class="relative flex justify-center w-48 px-5 py-2 mx-auto mt-8 font-medium text-white shadow-lg group">
                <span
                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                <span
                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                <span
                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                <span
                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                <span class="relative">Voir la liste complète</span>
            </a>
        </div>
    </section>
</container>


<!-- CADEAU -->
<container id="how" class="block py-16 mx-8 border-b border-gray-600 max-w-7xl md:mx-auto">
    <section class="text-gray-400 body-font">
        <div class="flex flex-col items-center">
            <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Gagnez des cadeaux</h1>
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
                        <p class="leading-relaxed text-gray-300">L'inscription est rapide, gratuite et on vous offre 150 diamants pour bien commencer.</p>
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
                        <p class="leading-relaxed text-gray-300">Vous disposez chaque jour de 10 parties gratuites à 
                            jouer sur la grille GoFRUITS, en multijoueurs avec gains de lots instantanés. Vos scores vous permettrons de vous faire une place sur notre concours mensuel afin de remporter le gros lot avec 500€ (500 Coins) en jeu !</p>
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
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Gagnez des Diamants, Rubis, Coins
                        </h2>
                        <p class="leading-relaxed text-gray-300">Jouez sur la grille de jeux instantanées "Billard", il s'agit d'un jeu booster vous permettant de participer au concours mensuel, de plus vous pouvez gagner des Diamants / Rubis / Coins sur ce jeu ! Cumulez vos scores pour le concours afin de tenter de gagner 500€ (500 Coins) en jeu !</p>
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
                        <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Convertissez les en cadeaux</h2>
                        <p class="leading-relaxed text-gray-300">Un large choix de cadeaux sont disponible (Playstation 5, Cookéo, Plancha, Barre de son, Rubis...). Des 
                            cartes cadeaux Amazon, de la cryptomonnaie ( crypto satoshi ). Vous pouvez aussi faire des retraits Paypal gratuitement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</container>
