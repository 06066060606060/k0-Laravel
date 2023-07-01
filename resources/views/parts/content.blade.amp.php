@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp

@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif

<script async src="https://cdn.ampproject.org/v0.js"></script>

<amp-state id="languageSelected" src="https://your-api-endpoint.com/check-language"></amp-state>

<div id="languageModal" class="fixed inset-0 z-50 overflow-y-auto" [class]="{ 'hidden': languageSelected || !showLanguageModal }">
    <div class="flex items-center justify-center px-4 text-center sm:block sm:p-0">
        <div class="fixed inset-0 w-screen transition-opacity bg-gray-900 bg-opacity-60" aria-hidden="true"></div>
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
                                    <a rel="alternate" data-barba-prevent="self" class="block px-4 py-3 text-sm font-bold text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white" :href="'language/' + lang.code" on="tap:AMP.setState({ languageSelected: true })">
                                        <amp-img src="'https://flagicons.lipis.dev/flags/4x3/' + lang.flag + '.svg'" alt="lang.name" width="[isMobile ? 8 : 10]" height="[isMobile ? 8 : 10]" [class]="isMobile ? 'w-8 h-8 mr-1' : 'w-10 h-10 mr-1'"></amp-img>
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

<template [hidden]="languageSelected">
    <div class="{{ $containerClass }} mx-8 mb-4 bg-gray-500 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl">
        <div class="flex flex-wrap items-center justify-center py-0 mx-auto md:justify-between max-w-7xl">
            <div class="marquee-container">
                <p class="{{ $textClass }} ml-4 mr-2 text-gray-200 lg:ml-8 md:pb-0 marquee">
                    <i class="fas fa-solid fa-rocket pr-2 fa-lg" style="color: yellow;"></i>
                    @php
                        $randomNumbers = rand(1, 2);
                    @endphp
                    @if($randomNumbers == 1)
                        {!! __("<b>Le saviez-vous :</b> Les <amp-img src='img/gem10.png' class='w-5 h-5 inline-block'></amp-img> vous permettent de jouer plus de parties, vous pouvez en acheter via le lien Packs de notre menu.") !!}
                    @elseif($randomNumbers == 2)
                        {!! __("<b>Le saviez-vous :</b> 1 <amp-img src='img/coin10.png' class='w-5 h-5 inline-block'></amp-img> équivaut en réalité sur le site Gokdo.com à 1€, vous pouvez les cumuler dans certains jeux ou sur le concours.") !!}
                    @endif
                </p>
            </div>
        </div>
    </div>
</template>

@if (backpack_auth()->check())
<style amp-custom>
.marquee-container {
    overflow: hidden;
    width: 100%;
}

.marquee {
    animation: marquee 20s linear infinite;
    white-space: nowrap;
    display: inline-block;
}

@keyframes marquee {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

@media (max-width: 768px) {
    .marquee {
        animation-duration: 13s;
    }
}
</style>

@php
    $containerClass = $isMobile ? 'py-0' : 'py-2';
    $textClass = $isMobile ? 'py-2' : 'py-0';
@endphp

<div class="{{ $containerClass }} mx-8 mb-4 bg-gray-500 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl">
    <div class="flex flex-wrap items-center justify-center py-0 mx-auto md:justify-between max-w-7xl">
        <div class="marquee-container">
            <p class="{{ $textClass }} ml-4 mr-2 text-gray-200 lg:ml-8 md:pb-0 marquee">
                <i class="fas fa-solid fa-rocket pr-2 fa-lg" style="color: yellow;"></i>
                @php
                    $randomNumbers = rand(1, 2);
                @endphp
                @if($randomNumbers == 1)
                    {!! __("<b>Le saviez-vous :</b> Les <amp-img src='img/gem10.png' class='w-5 h-5 inline-block'></amp-img> vous permettent de jouer plus de parties, vous pouvez en acheter via le lien Packs de notre menu.") !!}
                @elseif($randomNumbers == 2)
                    {!! __("<b>Le saviez-vous :</b> 1 <amp-img src='img/coin10.png' class='w-5 h-5 inline-block'></amp-img> équivaut en réalité sur le site Gokdo.com à 1€, vous pouvez les cumuler dans certains jeux ou sur le concours.") !!}
                @endif
            </p>
        </div>
    </div>
</div>

@isset($count)
    @if($count <= 2)
        @if($isMobile)
            <container class="mx-auto max-w-7xl" id="win">
                <section>
                    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                        <div class="flex flex-col w-full text-center">
                            <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                        </div>
                        <table class="mt-2 mx-auto m-full text-xs">
                            <tbody>
                                <tr>
                                    <td class="pr-2">
                                        <i class="fas fa-2x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-2 text-white">{{__('Remportez')}} 20 <amp-img src='img/gem10.png'  style='display:inline-block;' class=' w-5 h-5 align-middle'></amp-img> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}" data-barba-prevent="self" id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </container>
        @else
            <container class="mx-auto max-w-7xl" id="win">
                <section>
                    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                        <div class="flex flex-col w-full text-center">
                            <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-4xl title-font">{{__('Parrainage')}}</h1>
                        </div>
                        <table class="mt-2 mx-auto m-full text-s">
                            <tbody>
                                <tr>
                                    <td class="pr-4">
                                        <i class="fas fa-3x fa-user-group text-white"></i>
                                    </td>
                                    <td style="display:inline-block;" class="pl-4 text-white">{{__('Remportez')}} 20 <amp-img src='img/gem10.png'  style='display:inline-block;' class=' w-5 h-5 align-middle'></amp-img> {{__('par ami parrainé ! (MAX : 3)')}}<br>
                                        <b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}" data-barba-prevent="self" id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Toute triche sera synonyme d'exclusion du site")}}</i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </container>
        @endif
    @endif
@endisset

<amp-script src="https://cdn.ampproject.org/v0/amp-script-0.1.js" layout="fixed-height" height="50">
<script type="text/javascript">
    const copyLink = document.getElementById('copyLink');
    const notificationText = "{{ $notificationText }}";
    const errorText = "{{ $errorText }}";

    copyLink.addEventListener('click', function(event) {
        event.preventDefault();
        var link = this.href;
        navigator.clipboard.writeText(link)
            .then(function() {
                Toastify({
                    text: notificationText,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #4bb543, #006400)",
                    className: "toastify-custom",
                }).showToast();
            })
            .catch(function() {
                Toastify({
                    text: errorText,
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
</amp-script>

@php
    $locale = app()->getLocale();
    $descriptionField = 'description_' . $locale;
@endphp

@if($countevent > 0)
    <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeu Event')}}</h1>
                </div>
                <div class="flex-wrap m-full">
                    @forelse ($eventsgames as $eventsgame)
                        <div class="w-1/1 p-4 lg:w-1/1">
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                <a href="game?id={{ $eventsgame->id }}">
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        <div class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            @if($eventsgame->prix == 0)
                                                1 {{__('par 24h')}}
                                            @else
                                                {{ $eventsgame->prix }}
                                            @endif
                                            @if($eventsgame->prix > 0)
                                                @if ($eventsgame->type_prix == 'Diamants' && $eventsgame->prix == 0)
                                                    <amp-img src="img/diamond5.png" class="w-4" style="display:inline;"></amp-img>
                                                @elseif ($eventsgame->type_prix == 'Rubis')
                                                    <amp-img src="img/gem10.png" class="w-4" style="display:inline;"></amp-img>
                                                @else
                                                    <amp-img src="img/coin10.png" class="w-4" style="display:inline;"></amp-img>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @php
                                        $imagesb = $eventsgame->image[0] ?? null;
                                        $imgiUrl = asset('storage/' . $imagesb);
                                        $gifiUrl = str_replace(".mp4", ".gif", $imgiUrl);
                                    @endphp
                                    <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse" src="{{ $gifiUrl }}" onerror="this.src='/img/empty.png'"></amp-img>
                                    <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $eventsgame->name }}</h2>
                                        @if($isMobile == false)
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $eventsgame->$descriptionField }}</p>
                                        @endif
                                        <a href="game?id={{ $eventsgame->id }}" onclick="event.preventDefault(); window.location.reload(true); window.location.href='game?id={{ $eventsgame->id }}';" class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                            <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                            <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                            <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                            <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
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
                                    <div class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                        {{__('Aucun jeu')}}
                                    </div>
                                </div>
                                <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse" src="./img/empty.png"></amp-img>
                                <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                    <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                    <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                    <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                    <a href="game" class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">{{__('Jouer')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </container>
@endif
<!-- WINNER -->
<winner class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                {{__('DERNIERS GAGNANTS')}}
            </h2>
            <div class="pb-4 mt-4 border-gray-600 md:mt-4">
                <amp-carousel width="auto" height="250" layout="responsive" type="slides">
                    @forelse ($scores as $score)
                        <div class="px-4">
                            <div class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl">
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
                                    <amp-img alt="" class="inline-block object-center w-auto h-{{ $isMobile ? '9' : '12' }}" src="{{ asset('img/'.$image) }}" layout="fixed" width="auto" height="100"></amp-img>
                                    <div class="flex flex-col">
                                        @if($isMobile)
                                            <h2 class="pb-0 pl-4 font-semibold text-xs">{{ $score->name }}</h2>
                                        @else
                                            <h2 class="pb-0 pl-4 font-semibold text-s">{{ $score->name }}</h2>
                                        @endif
                                        @if($amount > 0)
                                            <span class="ml-4 text-m font-bold text-blue-700">{{ $amount }}</span>
                                        @endif
                                        @if($isMobile)
                                            <span class="ml-4 text-xs font-bold text-orange-600">{{ $gameName }}</span>
                                        @else
                                            <span class="ml-4 text-s font-bold text-orange-600">{{ $gameName }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-4">
                            <div class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl">
                                <div class="flex">
                                    <amp-img alt="" class="inline-block object-center w-12 h-12" src="{{ asset('img/gem10.png') }}" layout="fixed" width="auto" height="100"></amp-img>
                                    <div class="flex">
                                        <h2 class="pb-2 pl-4 font-semibold md:text-xl">
                                            Dummy<br>
                                            <span class="ml-4 text-xs font-bold text-blue-700">Bonus 10 ✧</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </amp-carousel>
            </div>
        </div>
    </section>
</winner>


<!-- JOUEZ UNE FOIS CONNECTE -->
<container class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="flex flex-col w-full text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux Multijoueurs')}}</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($allgames as $allgame)
                    <div class="w-1/2 p-4 lg:w-1/2">
                        <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                            <a href="game?id={{ $allgame->id }}">
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    @php
                                        $borderColor = $allgame->prix == 0 ? 'blue-700' : 'orange-800';
                                        $price = $allgame->prix == 0 ? '10 ' . __('par 24h') : $allgame->prix;
                                        $imagePath = $allgame->type_prix == 'Diamants' && $allgame->prix == 0 ? 'img/diamond5.png' : 'img/coin10.png';
                                    @endphp
                                    <div class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                        {{ $price }}
                                        @if ($allgame->prix > 0)
                                            <amp-img src="{{ $imagePath }}" class="w-4" width="16" height="16"></amp-img>
                                        @endif
                                    </div>
                                </div>
                                @php
                                    $imagesbb = $allgame->image[0] ?? null;
                                    $imgibUrl = asset('storage/' . $imagesbb);
                                    $gifibUrl = str_replace(".mp4", ".gif", $imgibUrl);
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
                                <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse" src="{{ $gifibUrl }}" fallback="{{ asset('img/empty.png') }}" layout="responsive" width="auto" height="100"></amp-img>
                                <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                    <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $allgame->name }}</h2>
                                    @if ($isMobile == false && !empty($description))
                                        <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                    @endif
                                    <a href="game?id={{ $allgame->id }}" on="tap:AMP.navigateTo(url='game?id={{ $allgame->id }}'); AMP.setState({ reload: true })" class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
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
                                <div class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                    {{__('Aucun jeu')}}
                                </div>
                            </div>
                            <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse" src="{{ asset('img/empty.png') }}" layout="responsive" width="auto" height="100"></amp-img>
                            <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font"></h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                <a href="game" on="tap:AMP.navigateTo(url='game'); AMP.setState({ reload: true })" class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</container>

<!-- JOUEZ UNE FOIS CONNECTE -->
<container class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="flex flex-col w-full text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux en Solo')}}</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($sologames as $sologame)
                    <div class="w-1/2 p-4 lg:w-1/2">
                        <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                            <a href="game?id={{ $sologame->id }}">
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($sologame->prix == 0)
                                    <div class="border z-20 absolute transform rotate-45 select-none bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                    @else
                                    <div class="border z-20 absolute transform rotate-45 select-none bg-orange-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                    @endif
                                    @if($sologame->prix == 0)
                                    1 {{__('par 24h')}}
                                    @else
                                    {{ $sologame->prix }}
                                    @endif
                                    @if($sologame->prix > 0)
                                    @if ($sologame->type_prix == 'Diamants')
                                     <amp-img src="img/diamond5.png" class="w-4" width="16" height="16"></amp-img>
                                    @elseif ($sologame->type_prix == 'Rubis')
                                     <amp-img src="img/gem10.png" class="w-4" width="16" height="16"></amp-img>
                                    @else
                                     <amp-img src="img/coin10.png" class="w-4" width="16" height="16"></amp-img>
                                     @endif
                                     @endif
                                    </div>
                                </div>
                                @php $imagesb =  $sologame->image[0] ?? null; @endphp
                                <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse" src="{{ asset('storage/' . $imagesb) }}" fallback="{{ asset('img/empty.png') }}" layout="responsive" width="auto" height="100"></amp-img>
                                <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                    <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $sologame->name }}</h2>
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
                                    <a href="game?id={{ $sologame->id }}" on="tap:AMP.navigateTo(url='game?id={{ $sologame->id }}'); AMP.setState({ reload: true })" class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                        <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                        <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
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
                                <div class="border z-20 absolute transform rotate-45 select-none bg-red-800 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px]">
                                    {{__('Aucun jeu')}}
                                </div>
                            </div>
                            <amp-img alt="gallery" class="absolute inset-0 object-cover object-center w-full h-full rounded-md animate__animated animate__pulse" src="{{ asset('img/empty.png') }}" layout="responsive" width="auto" height="100"></amp-img>
                            <div class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0">
                                <h2 class="mb-1 text-sm font-bold tracking-widest text-indigo-500 title-font">
                                </h2>
                                <h1 class="mb-1 text-lg font-medium text-gray-700 title-font">Shooting Stars</h1>
                                <p class="text-sm leading-relaxed text-gray-800">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                                <a href="game" on="tap:AMP.navigateTo(url='game'); AMP.setState({ reload: true })" class="flex justify-center w-20 px-4 py-2 mx-auto mt-2 text-white bg-green-700 rounded-full hover:bg-green-600 active:bg-green-800">Jouer</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</container>


@else

<amp-container id="home">
    <section>
        <div class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                    <div class="relative w-full max-w-lg">
                        <div class="relative">
                            @php
                                $imagesd =  $starred->image[0] ?? null;
                                $imgUrl = asset('storage/' . $imagesd);
                                $gifUrl = str_replace(".mp4", ".gif", $imgUrl);
                            @endphp
                            @if($isMobile)
                                <amp-video class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero" autoplay loop>
                                    <source src="{{ asset('storage/' . $imagesd) }}" type="video/mp4">
                                    <div fallback>
                                        Votre navigateur ne prend pas en charge la lecture de vidéos au format MP4.
                                    </div>
                                </amp-video>
                            @else
                                <amp-img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero" src="{{ $gifUrl }}" width="920" height="420" onerror="this.src='/img/empty.png'"></amp-img>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
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
                        <a href="admin/register" class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group prevent">
                            <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                            <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                            <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                            <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                            <span class="relative">{{__('Jouez Maintenant')}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</amp-container>

<!-- CADEAU -->
<div id="concept"></div>
<amp-container id="how" class="block py-16 mx-8 border-gray-600 max-w-7xl md:mx-auto">
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
                <div class="relative flex pb-{{ $index == count($steps) - 1 ? '10' : '20' }} mx-auto sm:items-center md:w-2/3">
                    <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                        <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-blue-500 rounded-full sm:mt-0 title-font">
                        {{ $index + 1 }}
                    </div>
                    <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-blue-500 bg-indigo-100 rounded-full">
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
</amp-container>

<!-- FREE GAMES -->
<amp-container id="game" class="block px-2 pb-8 mx-auto md:px-4 md:pt-8 max-w-7xl">
    <section id="video" class="text-gray-400 border-gray-600 body-font">
        <div class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="w-full text-left">
                <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux gratuits')}}</h1>
                <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/3">
                    {{__("Notre site GoKDO vous offre la possibilité de jouer gratuitement à des jeux divertissants et de remporter des cadeaux !")}} <br>
                    <a href="admin/register" class="text-blue-500 prevent">{{__("L'inscription est gratuite")}}</a> {{__("et vous bénéficiez même de 150 Diamants offerts dès votre inscription. Cette offre est une excellente occasion de s'amuser tout en ayant la chance de remporter des cadeaux intéressants. En jouant sur notre site, vous pouvez profiter d'une expérience de jeu passionnante tout en augmentant vos chances de gagner de superbes prix.")}}
                </p>
            </div>
        </div>
    </section>
</amp-container>
@endif