@php
    use \App\Http\Controllers\GlobalController;
    $isMobile = GlobalController::isMobile();
@endphp
@if($isMobile == true)
@else
    <div class="z-0 one"></div>
@endif
@if (backpack_auth()->check())
@if(backpack_auth()->user()->jours_gratuits > 0)
@else
@endif
    @php
        $locale = app()->getLocale();
        $descriptionField = 'description_' . $locale;
    @endphp
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <style>
        .notification {
            display: none; /* Ajout de cette ligne */
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #f3f3f3;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            z-index: 10000;
        }
        .close-btn {
            float: right;
            cursor: pointer;
            margin-left:20px;
        }
    </style>
    <div class="notification" id="notification">
        Nouveau concours en cours avec 500€ de gains en jeu ! <span class="close-btn">X</span>
    </div>

    <script>
    $(document).ready(function() {
        
        // Vérifier si le cookie "hideNotification" est défini et si sa valeur est "true"
        if ($.cookie('hideNotification') !== 'true') {
            $('#notification').show();
        } else {
            $('#notification').hide();
        }

        $("#notification .close-btn").click(function() {
            $("#notification").fadeOut();

            // Définir le cookie pour cacher la notification pendant 30 jours (ou le nombre de jours que vous voulez)
            $.cookie('hideNotification', 'true', { expires: 2 });
        });
    });
    </script>
@if($isMobile == true)
<style>
        .marquee-container {
            width: 100%;
            overflow: hidden;
        }

        .marquee-content {
            white-space: nowrap;
            animation: marquee 5s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
@else
<style>
    .marquee-container {
        width: 100%;
        overflow: hidden;
    }

    .marquee-content {
        white-space: nowrap;
        animation: marquee linear infinite; /* Animation infinie avec timing linéaire */
        animation-duration: 16s; /* Durée de l'animation pour couvrir tout le contenu */
    }

    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    </style>
@endif
</head>
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <h2 class="text-2xl font-bold tracking-tight mt-2 text-center text-gray-100 ">
Répondez aux sondages et tentez de gagner 250€ CASH du concours !</h2>
                <h2 class="text-s tracking-tight text-center mb-4 text-gray-100 ">
                <i>Un sondage complété donne 1 point de concours</i>
                </h2>
<iframe width="100%" frameBorder="0" height="500px"  src="https://offers.cpx-research.com/index.php?app_id=20132&ext_user_id={{ backpack_auth()->user()->id }}&secure_hash=0INpuQOyRvhHLJLMd9IPO57IDDbGBbZP&username={{ backpack_auth()->user()->name }}&email={{ backpack_auth()->user()->email }}&subid_1={{ backpack_auth()->user()->name }}&subid_2"></iframe>
</div>
</section>
</winner>
    <!-- WINNER -->
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                   @if($isMobile == true)
                   {{__('LE DERNIER GAGNANT')}}
                    @else
                    {{__('9 DERNIERS GAGNANTS')}}
                   @endif
                </h2>
<div class="marquee-container mt-4 mb-4">
    <div class="marquee-content flex"> <!-- Ajout de la classe "flex" ici -->
        @php
            $winnersText = "";
            foreach ($scores as $score) {
                $winnersText .= '<div class="w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28" style="min-width:' . ($isMobile ? '100' : '200') . 'px;">
                                    <div class="flex">
                                        <img alt="" class="inline-block object-center w-auto h-' . ($isMobile ? '9' : '12') . '" src="https://i.pinimg.com/originals/5c/15/c1/5c15c1539c9c566b5413d98f9cf3592f.png"> 
                                        <div class="flex flex-col"><h2 class="pb-0 pl-4 font-bold text-' . ($isMobile ? 's' : 's') . '">' . $score->name . '</h2> <span href="#"
                                                          class="ml-4 text-m font-bold text-blue-700 lg:mb-0">' . $score->cadeau_name . '</span></div>
                                    </div>
                                </div>';
            }
        @endphp
        {!! $winnersText !!}
    </div>
</div>
</div>
        </section>
    </winner>

 <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux Gratuits')}}</h1>
                </div>
    
                @if($isMobile == true)
                <div class="flex-wrap m-full">
                @else
                <div class="flex flex-wrap -m-4">
                @endif
                    @forelse ($thefree as $freethe)
                        @if($isMobile == true)
                        <div class="w-1/1 p-4 lg:w-1/1">
                        @else
                        <div class="w-1/2 p-4 lg:w-1/2">
                        @endif
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                @if($freethe->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $freethe->prix)
                                        <a href="/pack" data-barba-prevent="self">
                                        @else
                                        <a href="/game/{{ $freethe->id }}" data-barba-prevent="self">
                                        @endif
                                        @else
                                        <a href="/game/{{ $freethe->id }}" data-barba-prevent="self">
                                        @endif
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($isMobile ==true)
                                        @else
                                        @php
                                            $borderColor = $freethe->prix == 0 ? 'blue-700' : 'orange-800';
                                            if ($freethe->name == 'GoFRUITS') {
                                            $price = '10 par 24H';
                                            } else {
                                            $price = '5 par 24H';
                                            }
                                            $imagePath = $freethe->type_prix == 'Diamants' && $freethe->prix == 0 ? 'img/diamond5.png' : 'img/gem10.png';
                                        @endphp
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $price }}
                                            @if ($freethe->prix > 0)
                                                <img src="{{ $imagePath }}" class="w-4" style="display:inline;">
                                            @endif
                                        </div>@endif
                                    </div>
                                    
                                        @php $imagesbs = $freethe->image[0] ?? null;
                                        $filenames = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '.gif'); 
                                        }
                                        $description = '';
                                            $description = $freethe->description;
                                    @endphp
                                    @if($isMobile == true)
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" onerror="this.src='/img/empty.png'">
                                    @else
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" style="object-position:left;" onerror="this.src='/img/empty.png'">
                                    @endif
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $freethe->name }}</h2>
                                        @if ($isMobile == false && !empty($description))
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                        @endif
                                        @if($freethe->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $freethe->prix)
                                        <a href="/pack" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/pack';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @else
                                        <a href="/game/{{ $freethe->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $freethe->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        @else
                                        <a href="/game/{{ $freethe->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $freethe->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
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



    @if($countevent > 0)
        <container class="mx-auto max-w-7xl" id="win">
            <section>
                <div
                    class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                    <div class="flex flex-col w-full text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeu Live')}}</h1>
                    </div>
                   <!-- <p class="text-white text-center text-sm">Achetez des Packs sur le menu <font color="yellow"><b>+ de parties</b></font> pour avoir des Parties de Chasse au Trésor !</p>-->
                   <p class="text-white text-center text-sm">Sur la chasse aux trésor vous pouvez gagner gros avec de la chance !</p>
                    <div class="flex-wrap m-full">
                        @forelse ($eventsgames as $eventsgame)
                            <div class="w-1/1 p-4 lg:w-1/1">
                                <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                    <a href="/game/{{ $eventsgame->id }}" data-barba-prevent="self">                                
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
                                        @if($isMobile == true)
                                        @php $imagesb = $eventsgame->image[0] ?? null;
                                        $filename = pathinfo($imagesb, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_m.gif'); 
                                        } else if($locale == 'en'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_men.gif');     
                                        } else if($locale == 'de'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mde.gif');     
                                        } else if($locale == 'es'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mes.gif');     
                                        } else if($locale == 'it'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_mit.gif');     
                                        }
                                        @endphp
                                        @else
                                        @php $imagesb = $eventsgame->image[0] ?? null;
                                        $filename = pathinfo($imagesb, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgiUrl = asset('storage/uploads/' . $filename . '_it.gif');     
                                        }
                                        @endphp                                        @endif
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
                                        <a href="/game/{{ $eventsgame->id }}" data-barba-prevent="self"
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
<!--
 <container class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-col w-full text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Jeux de Grattage')}}</h1>
                </div>
    
                @if($isMobile == true)
                <div class="flex-wrap m-full">
                @else
                <div class="flex flex-wrap -m-4">
                @endif
                    @forelse ($scratchgames as $scratchgame)
                        @if($isMobile == true)
                        <div class="w-1/1 p-4 lg:w-1/1">
                        @else
                        <div class="w-1/2 p-4 lg:w-1/2">
                        @endif
                            <div class="relative flex overflow-hidden max-h-[150px] md:max-h-full">
                                @if($scratchgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $scratchgame->prix)
                                        <a href="/pack" data-barba-prevent="self">
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self">
                                        @endif
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self">
                                        @endif
                                <div class="absolute top-0 right-0 w-16 h-16">
                                    @if($isMobile ==true)
                                        @else
                                        @php
                                            $borderColor = $scratchgame->prix == 0 ? 'blue-700' : 'orange-800';
                                            $price = $scratchgame->prix == 0 ? '5 ' . __('par 24h') : $scratchgame->prix;
                                            $imagePath = $scratchgame->type_prix == 'Diamants' && $scratchgame->prix == 0 ? 'img/diamond5.png' : 'img/gem10.png';
                                        @endphp
                                        <div
                                            class="border z-20 absolute transform rotate-45 select-none bg-{{ $borderColor }} text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $price }}
                                            @if ($scratchgame->prix > 0)
                                                <img src="{{ $imagePath }}" class="w-4" style="display:inline;">
                                            @endif
                                        </div>@endif
                                    </div>
                                    
                                        @php $imagesbs = $scratchgame->image[0] ?? null;
                                        $filenames = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_it.gif');     
                                        }
                                        $description = '';
                                        if ($locale == 'fr') {
                                            $description = $scratchgame->description;
                                        } elseif ($locale == 'en') {
                                            $description = $scratchgame->description_en;
                                        } elseif ($locale == 'de') {
                                            $description = $scratchgame->description_de;
                                        } elseif ($locale == 'es') {
                                            $description = $scratchgame->description_es;
                                        } elseif ($locale == 'it') {
                                            $description = $scratchgame->description_it;
                                        }
                                    @endphp
                                    @if($isMobile == true)
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" onerror="this.src='/img/empty.png'">
                                    @else
                                    <img alt="gallery"
                                         class="absolute inset-0 object-cover object-center w-full h-full rounded-md imggame animate__animated animate__pulse"
                                         src="{{ $imgibUrl }}" style="object-position:left;" onerror="this.src='/img/empty.png'">
                                    @endif
                                    <div
                                        class="relative z-10 w-full p-4 transition duration-200 bg-blue-100 border-4 border-gray-200 rounded-lg opacity-0 hover:opacity-100">
                                        <h2 class="text-sm font-bold tracking-widest text-indigo-500 md:mb-1 title-font">{{ $scratchgame->name }}</h2>
                                        @if ($isMobile == false && !empty($description))
                                            <p class="text-xs leading-relaxed text-gray-800 md:text-sm">{{ $description }}</p>
                                        @endif
                                        @if($scratchgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $scratchgame->prix)
                                        <a href="/pack" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/pack';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $scratchgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        @else
                                        <a href="/game/{{ $scratchgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $scratchgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
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
                                        @if($allgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $allgame->prix)
                                <a href="/pack" data-barba-prevent="self">
                                        @else
                                <a href="/game/{{ $allgame->id }}" data-barba-prevent="self">
                                        @endif
                                        @else
                                <a href="/game/{{ $allgame->id }}" data-barba-prevent="self">
                                        @endif
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
                                    
                                        @php $imagesbs = $allgame->image[0] ?? null;
                                        $filenames = pathinfo($imagesbs, PATHINFO_FILENAME);
                                        $locale = app()->getLocale();
                                        if($locale == 'fr'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '.gif'); 
                                        } else if($locale == 'en'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_en.gif');     
                                        } else if($locale == 'de'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_de.gif');     
                                        } else if($locale == 'es'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_es.gif');     
                                        } else if($locale == 'it'){
                                        $imgibUrl = asset('storage/uploads/' . $filenames . '_it.gif');     
                                        }
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
                                        @if($allgame->prix > 0)
                                        @if(backpack_auth()->user()->trophee2 < $allgame->prix)
                                        <a href="/pack" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/pack';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @else
                                        <a href="/game/{{ $allgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $allgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
                                        @else
                                        <a href="/game/{{ $allgame->id }}" data-barba-prevent="self"
                                           onclick="event.preventDefault(); window.location.reload(true); window.location.href='/game/{{ $allgame->id }}';"
                                           class="relative flex justify-center w-24 px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                        @endif
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
    </container>-->



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
                                    <td style="display:inline-block;" class="pl-2 text-white">{{__('Gagnez')}} 1
                                        PT de concours {{__('par ami parrainé !')}} <br><i>{{__('(Aucune Limite de parrainage)')}}</i><br>
                                        <br><b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Triche = Exclusion du site")}}</i>
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
                                    <td style="display:inline-block;" class="pl-4 text-white">{{__('Gagnez')}} 1
                                        <img src='img/gem5.png' style='display:inline-block;'
                                             class=' w-5 h-5 align-middle'
                                             alt='Gem 10'> {{__('par ami parrainé !')}}<br> <i>{{__('(Aucune Limite de parrainage)')}}</i><br>
                                        <br><b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              data-barba-prevent="self"
                                              id="copyLink">{{__('Cliquez-ici pour copier votre lien')}}</a></b><br>
                                        <i style="color: orange; font-size: 13px;">{{__("Triche = Exclusion du site")}}</i>
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
        <section style="margin-top:20px;">
            <div
                class="px-12  
                @if($isMobile == true) 
                pt-4 pb-0
                @else 
                py-12  
                @endif
                mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                    <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                        <div class="relative w-full max-w-lg">
                            <div class="relative">
                                @php 
                                $imgiUrls = asset('storage/uploads/sondagesphoto.png'); 
                                @endphp
                                <a href="admin/register">
                                    <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                         src="{{ $imgiUrls }}" width="920" height="420"
                                         ">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-start 
                        @if($isMobile == true) 
                        mt-2 mb-8
                        @else 
                        mt-12 mb-16
                        @endif        
                         text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
                        <h1 class="mb-4 
                        @if($isMobile == true) 
                        text-1xl
                        @else 
                        text-4xl
                        @endif        
                         font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                            
                            {{__('Sondages Rémunérés !')}}
                        </h1>
                        @php $locale = app()->getLocale(); @endphp
                        @if($isMobile == true)
                        @else
                        <p class="mb-4 text-base leading-relaxed text-left text-gray-300">Participez à nos sondages rémunérateurs pour accumuler des Diamants, nous reversons automatiquement 50% de nos bénéfices.<br><br> Ne manquez pas notre concours de parrainage avec chaque mois plus de 200€ mis en jeu !</p>
                        @endif
                        @if($isMobile == true)
                        <div class="mt-4">
                        @else
                        <div>
                        @endif
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
                                <span class="relative">{{__('Inscription Gratuite')}}</span>
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
            @if($isMobile == true)
            <h1 class="mb-4 text-2xl font-bold text-gray-100 md:text-xl title-font">{{__("Sondages Rémunérés en Ligne")}}</h1>
            <h2 class="mb-4 text-l font-bold text-gray-100 md:text-l title-font">{{__("Gagnez de l'Argent en Partageant Votre Opinion")}}</h2>
            @else
            <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-2xl title-font">{{__("Sondages Rémunérés en Ligne")}}</h1>
            <h2 class="mb-4 text-4xl font-bold text-gray-100 md:text-xl title-font">{{__("Gagnez de l'Argent en Partageant Votre Opinion")}}</h2>
            @endif
            </div>
            <div class="container flex flex-wrap px-5 py-8 mx-auto">
                @php $steps = [
                [
                    'icon' => 'fa-solid fa-user fa-2x',
                    'title' => __('Inscrivez-vous gratuitement'),
                    'description' => __("Inscrivez-vous rapidement et gratuitement, recevez 150 diamants pour bien commencer votre parcours vers les sondages rémunérés en ligne. Commencez à gagner de l'argent avec votre opinion dès aujourd'hui !")
                ],
                [
                    'icon' => 'fa-solid fa-gamepad fa-2x',
                    'title' => __('Répondez aux Sondages'),
                    'description' => __("Participez aux sondages pour accumuler des Diamants. Nous partageons 50% de nos revenus, ce qui signifie que lorsque nous gagnons 1€, vous gagnez 0.50€ en Diamants, que vous pouvez échanger dans notre boutique en ligne.")
                ],
                [
                    'icon' => 'fa-solid fa-gem fa-2x',
                    'title' => __('Concours mensuel sur le parrainage'),
                    'description' => __("Gagnez jusqu'à 200€ lors de chaque concours mensuel pour les 5 premiers participants. Augmentez vos chances de gagner davantage en parrainant de nouveaux membres, car chaque membre parrainé compte comme 1 point de concours au classement. Décuplez vos opportunités de gagner de l'argent avec nous !")
                ],
                [
                    'icon' => 'fa-solid fa-gift fa-2x',
                    'title' => __('Convertissez vos Diamants en KDO'),
                    'description' => __("Transformez vos Diamants en boutique contre des cartes-cadeaux (Amazon, Fnac, Micromania...), paiements via PayPal, ou même en KDO exclusifs tels que l'iPhone 15, la PlayStation 5, et d'autres surprises alléchantes ! Découvrez comment maximiser la valeur de vos Diamants aujourd'hui !")
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
        <div class="px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="w-full text-left">
                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Qu'est-ce que Gokdo, le site de sondage rémunéré ?</h2>
                
                <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/4">
                    {{__("Les sondages rémunérés sont une façon rapide et pratique d'ajouter un revenu supplémentaire, que vous soyez étudiant, parent, ou simplement à la recherche de moyens pour augmenter votre solde bancaire !")}}
                    <br><br>
                    {{__("Pour démarrer, répondez à quelques questions simples pour créer votre profil - vous serez ensuite jumelé avec des sondages rémunérés qui vous conviennent. Après avoir partagé vos opinions en répondant aux sondages, vous recevrez des récompenses en argent pour votre temps et votre contribution !")}}
                    <br><br>
                    {{__("Le processus est incroyablement simple. Vous pourrez faire entendre votre voix tout en renflouant vos finances en un rien de temps.")}}
                </p>
                

                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">
                {{__("Nos reversements")}}</h2>
                <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/4">
                    {{__("Chaque fois que Gokdo gagne 1€ grâce aux enquêtes, nous vous reversons automatiquement 50% de cette somme, soit 0.50€, sous forme de Diamants, notre monnaie virtuelle. Vous pourrez ensuite échanger ces Diamants en boutique contre de véritables cadeaux ou même de l'argent. Découvrez comment maximiser vos récompenses avec Gokdo !")}}
                </p>
                </div>
        </div>
    </section>
</container>
@endif