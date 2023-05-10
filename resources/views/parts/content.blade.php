@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp
@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif
@if (backpack_auth()->check())
<!-- JOUEZ UNE FOIS CONNECTE -->
<container class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">

            <div class="flex flex-col w-full text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Jeux Multijoueurs</h1>
                
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($allgames as $allgame)
                    <div class="w-1/2 p-4 lg:w-1/2">
                     
                        <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                        <a href="game?id={{ $allgame->id }}">
                            <div class="absolute top-0 right-0 w-16 h-16">
                                @if($allgame->prix == 0)
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                @else
                                <div
                                    class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                @endif
                                @if($allgame->prix == 0)
                                10 par 24h
                                @else
                                {{ $allgame->prix }}
                                @endif
                                @if($allgame->prix > 0)
                                @if ($allgame->type_prix == 'Diamants' && $allgame->prix == 0)
                                 <img src="img/diamond5.png" class="w-4" style="display:inline;">
                                @elseif ($allgame->type_prix == 'Rubis')
                                 <img src="img/gem10.png" class="w-4" style="display:inline;">
                                @else
                                 <img src="img/coin10.png" class="w-4" style="display:inline;">
                                 @endif
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
                                    {{ $allgame->category }}</h1>
                                <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $allgame->description }}</p>
                                    <a href="game?id={{ $allgame->id }}" onclick="event.preventDefault(); window.location.reload(true); window.location.href='game?id={{ $allgame->id }}';"
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
            <!--<a href="jeux"
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
            </a>-->
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



                    @forelse ($scores as $score)
                        <div class="swiper-slide">
                            <blockquote>
                                <div
                                    class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                    <div class="flex">
                                    @if($score->data > 0)
                                        <img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/diamond5.png') }}">
                                    @elseif($score->data2 > 0)
                                        <img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/gem10.png') }}">
                                    @elseif($score->data3 > 0)
                                        <img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/coin10.png') }}">
                                    @endif
                                        <div class="flex flex-col">
                                            <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                             {{-- {{ $concour->user->name }}  --}}
                                            </h2>
                                              <span href="#" class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">{{-- {{ $concour->cadeau->name }} --}}</span>
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

@else

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
                    @if($starred->name != 'GoFRUITS')
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md"> JEU 100% GAGNANT
                    </span>
                    @else
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md"> JOUEZ GRATUITEMENT A
                    </span>
                    @endif                    
                    <h1
                        class="mb-4 text-4xl font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                        {{ $starred->name }}</h1>
                    <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description }}</p>
                    <div class="">
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
                    </div>

                </div>
            </div>
        </div>
    </section>
</container>

<!-- CADEAU -->
<div id="concept"></div>
<container id="how" class="block py-16 mx-8 border-gray-600 max-w-7xl md:mx-auto">
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
                        <p class="leading-relaxed text-gray-300">Chaque jour, vous avez la possibilité de jouer gratuitement 10 parties sur la grille GoFRUITS en multijoueur, avec la possibilité de gagner des lots instantanés. Vos scores vous donnent la possibilité de participer à notre concours mensuel, où le gros lot de 500€ (500 Coins) est en jeu ! Cette offre est une excellente occasion de profiter d'un jeu amusant tout en ayant la chance de gagner de superbes prix.</p>
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
                        <p class="leading-relaxed text-gray-300">Pool est une grille de jeux instantanées que vous pouvez jouer pour booster vos chances de participer au concours mensuel. De plus, vous avez la possibilité de remporter des Diamants, Rubis et Coins en jouant à ce jeu ! En cumulant vos scores, vous pouvez améliorer vos chances de remporter le gros lot de 500€ (500 Coins) offert dans le concours mensuel. Cette offre est une excellente opportunité pour les joueurs de s'amuser tout en ayant la chance de gagner de superbes récompenses.</p>
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
                        <p class="leading-relaxed text-gray-300">Notre site offre une variété de cadeaux attrayants, tels que la Playstation 5, le Cookéo, la plancha, la barre de son, les Rubis, ainsi que des cartes-cadeaux Amazon et de la cryptomonnaie (crypto satoshi). De plus, vous pouvez retirer votre gain via Paypal gratuitement. Cette offre est une excellente opportunité pour les joueurs de remporter des prix incroyables tout en profitant d'une expérience de jeu amusante et excitante.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</container>

<!-- FREE GAMES -->
<container id="game" class="block px-2 pb-8 mx-auto md:px-4 md:pt-8 max-w-7xl">
    <section id="video" class="text-gray-400 border-gray-600 body-font">
        <div
            class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18 ">
            <div class="flex flex-col w-full mb-0 text-left">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Jeux gratuits</h1>
                <p class="mb-8 mx-0 text-base leading-relaxed text-gray-300 lg:w-3/3">
                Notre site GoKDO vous offre la possibilité de jouer gratuitement à des jeux divertissants et 
                de remporter des cadeaux ! <br><a href="admin/register" class="text-blue-500 prevent">L'inscription est gratuite</a> et vous bénéficiez même de 150 Diamants 
                offerts dès votre inscription. Cette offre est une excellente occasion de s'amuser tout en 
                ayant la chance de remporter des cadeaux intéressants. En jouant sur notre site, 
                vous pouvez profiter d'une expérience de jeu passionnante tout en augmentant vos chances de 
                gagner de superbes prix.
                </p>
            <center>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>            </center>
            </div>
        </div>    
    </section>
</container>
@endif