@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp
@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif
<?php
$url = Request::url();
$subdomain = parse_url($url, PHP_URL_HOST);
$subdomainParts = explode('.', $subdomain);
$languageSubdomain = $subdomainParts[0];
$languages = ['en', 'fr', 'de', 'es', 'it'];
$isLanguageSubdomain = in_array($languageSubdomain, $languages);
?>
<?php if (!$isLanguageSubdomain): ?>
<div x-data="{ modelOpen: false, languages: [
    {code: 'en', name: 'English', flag: 'gb'},
    {code: 'fr', name: 'Français', flag: 'fr'},
    {code: 'de', name: 'German', flag: 'de'},
    {code: 'es', name: 'Español', flag: 'es'},
    {code: 'it', name: 'Italian', flag: 'it'}
    ], isMobile: window.innerWidth <= 768 }" x-init="modelOpen = !localStorage.getItem('languageSelected')">

    <template x-if="!localStorage.getItem('languageSelected')">
        <!-- Modale -->
        <div x-show="modelOpen" @click.away="modelOpen = false" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center px-4 text-center sm:block sm:p-0">
                <div class="fixed inset-0 w-screen transition-opacity bg-gray-900 bg-opacity-60"
                     aria-hidden="true"></div>
                <div class="inline-block w-full max-w-4xl pt-32 mx-auto overflow-hidden transition-all transform">
                    <div class="flex flex-col mt-6 mb-0 bg-gray-800 rounded-md shadow-2xl">
                        <div class="flex justify-between w-full border-b">
                            <h1 class="py-6 mx-auto text-white text-lg font-bold">SELECT LANGUAGE</h1>
                        </div>
                        <div class="bg-gray-700 rounded-b-md">
                            <div class="flex items-center justify-center pb-8 mx-20 mt-8">
                                <ul class="flex flex-wrap justify-center">
                                    <template x-for="lang in languages" :key="lang.code">
                                        <li>
                                            <a rel="alternate" data-barba-prevent="self"
                                               :class="`block px-4 py-3 text-sm font-bold text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white`"
                                               :href="`/language/${lang.code}`"
                                               @click="localStorage.setItem('languageSelected', true)">
                                                <img :src="`https://flagicons.lipis.dev/flags/4x3/${lang.flag}.svg`"
                                                     :alt="lang.name" :width="isMobile ? 8 : 10"
                                                     :height="isMobile ? 8 : 10"
                                                     :class="isMobile ? 'w-8 h-8 mr-1' : 'w-10 h-10 mr-1'">
                                            </a>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@endif


@if (backpack_auth()->check())

    @php
        $locale = app()->getLocale();
        $descriptionField = 'description_' . $locale;
    @endphp

    @if($countevent > 0)
        <container class="mx-auto max-w-7xl" id="win">
            <section>
                <div
                    class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                    <div class="flex flex-col w-full text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeu Event')}}</h1>
                    </div>
                    <div class="flex-wrap m-full">
                        @forelse ($eventsgames as $eventsgame)
                            <div class="w-1/1 p-4 lg:w-1/1">
                                <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                    <a href="/game/{{ $eventsgame->id }}">
                                        <div class="absolute top-0 right-0 w-16 h-16">
                                        @if($isMobile ==true)
                                        @else
                                            <div
                                                class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                @if($eventsgame->prix == 0)
                                                    1 {{__('par 24h')}}
                                                @else
                                                    {{ $eventsgame->prix }}
                                                @endif
                                                @if($eventsgame->prix > 0)
                                                    @if ($eventsgame->type_prix == 'Diamants' && $eventsgame->prix == 0)
                                                        <img src="img/diamond5.png" class="w-4" style="display:inline;">
                                                    @elseif ($eventsgame->type_prix == 'Rubis')
                                                        <img src="img/gem10.png" class="w-4" style="display:inline;">
                                                    @else
                                                        <img src="img/coin10.png" class="w-4" style="display:inline;">
                                                    @endif
                                                @endif
                                            </div>
                                            @endif
                                        </div>
                                        @php
                                            $imagesb = $eventsgame->image[0] ?? null;
                                            $imgiUrl = asset('storage/' . $imagesb);
                                        @endphp
                                        <img alt="gallery"
                                             class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                             src="{{ $imgiUrl }}" onerror="this.src='/img/empty.png'">
                                        <div
                                            class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                            <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $eventsgame->name }}</h2>
                                            @if($isMobile == true)
                                            @else
                                         @php
                                        $locale = app()->getLocale();   
                                           if ($locale == 'fr') {
                                            $description = $eventsgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $eventsgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $eventsgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $eventsgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $eventsgame->description_it;
                                        }
                                        @endphp
                                                <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                            @endif
                                            <a href="/game/{{ $eventsgame->id }}"
                                               onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $eventsgame->id }}';"
                                               class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                                <span
                                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                                <span
                                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                                <span class="relative">{{__('Jouer')}}</span>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 lg:w-1/3 sm:w-1/2">
                                <div class="relative flex overflow-hidden">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                            {{__('Aucun jeu')}}
                                        </div>
                                    </div>
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                         src="./img/empty.png">
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                        <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                        <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting
                                            Stars</h1>
                                        <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                            cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                        <a href="game"
                                           class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">{{__('Jouer')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
        </container>
    @endif

    <!-- WINNER 
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                    {{__('DERNIERS GAGNANTS')}}
                </h2>
                <div
                    class="pb-4 mt-4 border-gray-600 md:mt-4 swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper">
                        @forelse ($scores as $score)
                            <div class="swiper-slide">
                                <blockquote>
                                    <div
                                        class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                        <div class="flex">
                                            @php
                                                $image = '';
                                                $amount = 0;
                                                $gameName = '';
                                                $gameId = $score->game_id;
                                                if ($score->data > 0) {
                                                    $image = 'diamond5.png';
                                                    $amount = $score->data;
                                                } elseif ($score->data2 > 0) {
                                                    $image = 'gem10.png';
                                                    $amount = $score->data2;
                                                } elseif ($score->data3 > 0) {
                                                    $image = 'coin10.png';
                                                    $amount = $score->data3;
                                                }

                                                if ($isMobile) {
                                                    if ($gameId == 39) {
                                                        $gameName = 'POOL';
                                                    } elseif ($gameId == 46) {
                                                        $gameName = 'GoFRUITS';
                                                    } elseif ($gameId == 51) {
                                                        $gameName = 'PLINKO';
                                                    } elseif ($gameId == 50) {
                                                        $gameName = 'GoWIN';
                                                    } elseif ($gameId == 49) {
                                                        $gameName = 'BINGO';
                                                    } elseif ($gameId == 52) {
                                                        $gameName = 'GoSCRATCH';
                                                    }
                                                } else {
                                                    if ($gameId == 39) {
                                                        $gameName = 'POOL';
                                                    } elseif ($gameId == 46) {
                                                        $gameName = 'GoFRUITS';
                                                    } elseif ($gameId == 51) {
                                                        $gameName = 'PLINKO';
                                                    } elseif ($gameId == 50) {
                                                        $gameName = 'GoWIN';
                                                    } elseif ($gameId == 49) {
                                                        $gameName = 'BINGO';
                                                    } elseif ($gameId == 52) {
                                                        $gameName = 'GoSCRATCH';
                                                    }
                                                }
                                            @endphp
                                            <img alt=""
                                                 class="inline-block object-center w-auto h-{{ $isMobile ? '9' : '12' }}"
                                                 src="{{ asset('img/'.$image) }}">
                                            <div class="flex flex-col">
                                                @if($isMobile)
                                                    <h2 class="pb-0 pl-4 font-semibold text-xs">{{ $score->name }}</h2>
                                                @else
                                                    <h2 class="pb-0 pl-4 font-semibold text-s">{{ $score->name }}</h2>
                                                @endif
                                                @if($amount > 0)
                                                    <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $amount }}</span>
                                                @endif
                                                @if($isMobile)
                                                    <span href="#"
                                                          class="ml-4 text-xs font-bold text-orange-600 lg:mb-0">{{ $gameName }}</span>
                                                @else
                                                    <span href="#"
                                                          class="ml-4 text-s font-bold text-orange-600 lg:mb-0">{{ $gameName }}</span>
                                                @endif
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
                                                    <span href="#" class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10 ✧</span>
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
-->

    <!-- JOUEZ UNE FOIS CONNECTE -->
    <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux Multijoueurs')}}</h1>
                </div>
    
                @if($isMobile == true)
                <div class="flex-wrap m-full">
                @else
                <div class="flex flex-wrap -m-4">
                @endif
                    @forelse ($allgames as $allgame)
                        @if($isMobile == true)
                        <div class="w-1/1 p-4 lg:w-1/1">
                        @else
                        <div class="w-1/2 p-4 lg:w-1/2">
                        @endif
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                <a href="/game/{{ $allgame->id }}">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($isMobile ==true)
                                        @else
                                        @php
                                            $borderColor = $allgame->prix == 0 ? 'blue-700' : 'orange-800';
                                            $price = $allgame->prix == 0 ? '10 ' . __('par 24h') : $allgame->prix;
                                            $imagePath = $allgame->type_prix == 'Diamants' && $allgame->prix == 0 ? 'img/diamond5.png' : 'img/gem10.png';
                                        @endphp
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $price }}
                                            @if ($allgame->prix > 0)
                                                <img src="{{ $imagePath }}" class="w-4" style="display:inline;">
                                            @endif
                                        </div>@endif
                                    </div>
                                    @php
                                        $imagesbb = $allgame->image[0] ?? null;
                                        $imgibUrl = asset('storage/' . $imagesbb);
                                        $locale = app()->getLocale();
                                        $description = '';
                                        if ($locale == 'fr') {
                                            $description = $allgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $allgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $allgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $allgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $allgame->description_it;
                                        }
                                    @endphp
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" onerror="this.src='/img/empty.png'">
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $allgame->name }}</h2>
                                        @if ($isMobile == false && !empty($description))
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                        @endif
                                        <a href="/game/{{ $allgame->id }}"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $allgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                            <span class="relative">{{__('Jouer')}}</span>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 lg:w-1/3 sm:w-1/2">
                            <div class="relative flex overflow-hidden">
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    <div
                                        class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                        {{__('Aucun jeu')}}
                                    </div>
                                </div>
                                <img alt="gallery"
                                     class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                     src="./img/empty.png">
                                <div
                                    class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                    <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                    <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                    <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                        cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                    <a href="game"
                                       class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </container>

    <!-- JOUEZ UNE FOIS CONNECTE -->
   <!-- <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">

                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux en Solo')}}</h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($sologames as $sologame)
                        <div class="w-1/2 p-4 lg:w-1/2">
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                <a href="{{ $locale }}/game/{{ $sologame->id }}">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        @if($sologame->prix == 0)
                                            <div
                                                class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                @else
                                                    <div
                                                        class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                                        @endif
                                                        @if($sologame->prix == 0)
                                                            1 {{__('par 24h')}}
                                                        @else
                                                            {{ $sologame->prix }}
                                                        @endif
                                                        @if($sologame->prix > 0)
                                                            @if ($sologame->type_prix == 'Diamants')
                                                                <img src="img/diamond5.png" class="w-4"
                                                                     style="display:inline;">
                                                            @elseif ($sologame->type_prix == 'Rubis')
                                                                <img src="img/gem10.png" class="w-4"
                                                                     style="display:inline;">
                                                            @else
                                                                <img src="img/coin10.png" class="w-4"
                                                                     style="display:inline;">
                                                            @endif
                                                        @endif
                                                    </div>
                                            </div>
                                            @php $imagesb =  $sologame->image[0] ?? null; @endphp
                                            <img alt="gallery"
                                                 class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                                 src="{{ asset('storage/' . $imagesb) }}"
                                                 onerror="this.src='/img/empty.png'">
                                            <div
                                                class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                                <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">
                                                    {{ $sologame->name }}</h2>
                                                @if($isMobile == false)
                                                    @php $locale = app()->getLocale(); @endphp
                                                    @if($locale=='fr')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description }}</p>
                                                    @elseif($locale=='en')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_en }}</p>
                                                    @elseif($locale=='de')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_de }}</p>
                                                    @elseif($locale=='es')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_es }}</p>
                                                    @elseif($locale=='it')
                                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $sologame->description_it }}</p>
                                                    @else
                                                    @endif
                                                @endif
                                                <a href="/game/{{ $sologame->id }}"
                                                   onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $sologame->id }}';"
                                                   class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span
                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                                    <span
                                                        class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                                    <span
                                                        class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                                    <span
                                                        class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                                    <span class="relative">{{__('Jouer')}}</span>
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
                                                {{__('Aucun jeu')}}
                                            </div>
                                        </div>
                                        <img alt="gallery"
                                             class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse"
                                             src="./img/empty.png">
                                        <div
                                            class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                            <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                            </h2>
                                            <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting
                                                Stars</h1>
                                            <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk
                                                cold-pressed
                                                sriracha leggings
                                                jianbing microdosing tousled waistcoat.</p>
                                            <a href="/"
                                               class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                                        </div>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                        
                </div>
        </section>
    </container>
    -->    
        @isset($count)
        @if($count <= 2)
            @if($isMobile)
                <container class="mx-auto max-w-7xl" id="win">
                    <section>
                        <div
                            class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                            <div class="flex flex-col w-full text-center">
                                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                            </div>
                            <table class="mt-2 mx-auto m-full text-xs">
                                <tbody>
                                <tr>
                                    <td class="pr-2">
                                        <i class="fas fa-2x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-2 text-white">{{__('Remportez')}} 20
                                        <img src='img/gem10.png' style='display:inline-block;'
                                             class=' w-5 h-5 align-middle'
                                             alt='Gem 10'> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </container>
            @else
                <container class="mx-auto max-w-7xl" id="win">
                    <section>
                        <div
                            class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                            <div class="flex flex-col w-full text-center">
                                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                            </div>
                            <table class="mt-2 mx-auto m-full text-s">
                                <tbody>
                                <tr>
                                    <td class="pr-4">
                                        <i class="fas fa-3x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-4 text-white">{{__('Remportez')}} 20
                                        <img src='img/gem10.png' style='display:inline-block;'
                                             class=' w-5 h-5 align-middle'
                                             alt='Gem 10'> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </container>
            @endif
        @endif
    @endisset
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @php
        $locale = app()->getLocale();
        $notificationText = '';
        $errorText = '';
        switch ($locale) {
            case 'fr':
                $notificationText = "Le lien a été copié !";
                $errorText = "Erreur lors de la copie du lien.";
                break;
            case 'en':
                $notificationText = "Link copied !";
                $errorText = "Error when copy link";
                break;
            case 'es':
                $notificationText = "¡Enlace copiado!";
                $errorText = "Error al copiar!";
                break;
            case 'de':
                $notificationText = "Link kopiert!";
                $errorText = "Fehler beim Kopieren!";
                break;
            case 'it':
                $notificationText = "Link copiato!";
                $errorText = "Errore durante la copia!";
                break;
            default:
                break;
        }
    @endphp

    <script>
        document.getElementById("copyLink").addEventListener("click", function (event) {
            event.preventDefault();
            var link = this.href;
            navigator.clipboard.writeText(link)
                .then(function () {
                    Toastify({
                        text: "{{ $notificationText }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "linear-gradient(to right, #4bb543, #006400)",
                        className: "toastify-custom",
                    }).showToast();
                })
                .catch(function () {
                    Toastify({
                        text: "{{ $errorText }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff6347",
                        className: "toastify-custom",
                    }).showToast();
                });
        });
    </script>

@else

    <container id="home">
        <section>
            <div
                class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                    <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                        <div class="relative w-full max-w-lg">
                            <div class="relative">
                                @php
                                    $imagesd =  $starred->image[0] ?? null;
                                    $imgUrl = asset('storage/' . $imagesd);
                                @endphp
                               
                                    <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                         src="{{ $imgUrl }}" width="920" height="420"
                                         onerror="this.src='/img/empty.png'">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
                    <span class="mb-4 font-bold tracking-widest text-blue-600 uppercase text-md">
                        @if($starred->name != 'GoFRUITS')
                            {{__('JEU 100% GAGNANT !')}}
                        @else
                            {{__('JOUEZ GRATUITEMENT A')}}
                        @endif
                    </span>
                        <h1 class="mb-4 text-4xl font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                            {{ $starred->name }}</h1>
                        @php $locale = app()->getLocale(); @endphp
                        @if ($locale=='fr')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description }}</p>
                        @elseif ($locale=='en')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_en }}</p>
                        @elseif ($locale=='de')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_de }}</p>
                        @elseif ($locale=='es')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_es }}</p>
                        @elseif ($locale=='it')
                            <p class="mb-4 text-base leading-relaxed text-left text-gray-300">{{ $starred->description_it }}</p>
                        @endif
                        <div>
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
                                <span class="relative">{{__('Jouez Maintenant')}}</span>
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
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Gagnez des cadeaux')}}</h1>
            </div>
            <div class="container flex flex-wrap px-5 py-8 mx-auto">
                @php $steps = [
                [
                    'icon' => 'fa-solid fa-user fa-2x',
                    'title' => __('Inscrivez-vous gratuitement'),
                    'description' => __("L'inscription est rapide, gratuite et on vous offre 150 diamants pour bien commencer.")
                ],
                [
                    'icon' => 'fa-solid fa-gamepad fa-2x',
                    'title' => __('Jouez vos parties gratuites quotidiennes'),
                    'description' => __("Chaque jour, vous avez la possibilité de jouer gratuitement 10 parties sur la grille GoFRUITS en multijoueur, avec la possibilité de gagner des lots instantanés. Vos scores vous donnent la possibilité de participer à notre concours mensuel, où le gros lot de 500€ (500 Coins) est en jeu ! Cette offre est une excellente occasion de profiter d'un jeu amusant tout en ayant la chance de gagner de superbes prix.")
                ],
                [
                    'icon' => 'fa-regular fa-gem fa-2x',
                    'title' => __('Gagnez des Diamants, Rubis, Coins'),
                    'description' => __("Pool est une grille de jeux instantanées que vous pouvez jouer pour booster vos chances de participer au concours mensuel. De plus, vous avez la possibilité de remporter des Diamants, Rubis et Coins en jouant à ce jeu ! En cumulant vos scores, vous pouvez améliorer vos chances de remporter le gros lot de 500€ (500 Coins) offert dans le concours mensuel. Cette offre est une excellente opportunité pour les joueurs de s'amuser tout en ayant la chance de gagner de superbes récompenses.")
                ],
                [
                    'icon' => 'fa-solid fa-gift fa-2x',
                    'title' => __('Convertissez les en cadeaux'),
                    'description' => __("Notre site offre une variété de cadeaux attrayants, tels que la Playstation 5, le Cookéo, la plancha, la barre de son, les Rubis, ainsi que des cartes-cadeaux Amazon et de la cryptomonnaie (crypto satoshi). De plus, vous pouvez retirer votre gain via Paypal gratuitement. Cette offre est une excellente opportunité pour les joueurs de remporter des prix incroyables tout en profitant d'une expérience de jeu amusante et excitante.")
                ]
            ]; @endphp
                @foreach($steps as $index => $step)
                    <div
                        class="relative flex pb-{{ $index == count($steps) - 1 ? '10' : '20' }} mx-auto sm:items-center md:w-2/3">
                        <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                            <div
                                class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
                                <i class="{{ $step['icon'] }}"></i>
                            </div>
                            <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{ $step['title'] }}</h2>
                                <p class="leading-relaxed text-gray-300">{{ $step['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </container>

    <!-- FREE GAMES -->
    <container id="game" class="block px-2 pb-8 mx-auto md:px-4 md:pt-8 max-w-7xl">
        <section id="video" class="text-gray-400 border-gray-600 body-font">
            <div
                class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="w-full text-left">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux gratuits')}}</h1>
                    <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/3">
                        {{__("Notre site GoKDO vous offre la possibilité de jouer gratuitement à des jeux divertissants et de remporter des cadeaux !")}}
                        <br>
                        <a href="admin/register"
                           class="text-blue-500 prevent">{{__("L'inscription est gratuite")}}</a> {{__("et vous bénéficiez même de 150 Diamants offerts dès votre inscription. Cette offre est une excellente occasion de s'amuser tout en ayant la chance de remporter des cadeaux intéressants. En jouant sur notre site, vous pouvez profiter d'une expérience de jeu passionnante tout en augmentant vos chances de gagner de superbes prix.")}}
                    </p>
                </div>
            </div>
        </section>
    </container>
@endif
