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
        Parrainez vos amis et gagnez 500 Diamants par ami parrainé ! <span class="close-btn">X</span>
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
  <!--  <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
<center><a class="text-2xl mb-4 font-bold tracking-tight mt-2 text-center text-gray-100" target="_blank" href="https://www.amazon.fr/b?_encoding=UTF8&tag=gokdocom-21&linkCode=ur2&linkId=be370f1b4ee5a9623c1c7e1c09f8e4bf&camp=1642&creative=6746&node=20904281031">Bons Plans Cadeaux du moment</a></center>
</div>
</section>
</winner>-->
    <winner class="mx-auto max-w-7xl" id="win">
        <section>
            <div
                class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
                
                <h2 class="text-2xl mb-4 font-bold tracking-tight mt-2 text-center text-gray-100 ">
Complétez des sondages rémunérés !</h2>
 <style>
    .tab-container {
      display: flex;
      margin-bottom:20px;
    }

    .tab-button {
      width:100%;
      cursor: pointer;
      padding: 10px;
      margin: 0;
      border: none;
      background-color: #f1f1f1;
      transition: background-color 0.3s;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    iframe {
      width: 100%;
      border: 0;
      height: 500px; /* Ajustez la hauteur en fonction de vos besoins */
    }
  </style>
</head>
<body>

<div class="tab-container">
  <button class="tab-button" style="border-radius:10px 0 0 10px;" onclick="showTab('tab1')">Pour gagner des 
<b>Diamants</b> <img src="/img/diamond5.png" style="display:inline-block;" class="flex ml-1 mt-1 w-6 h-4"><br><b>Cliquez-ici</b></button>
  <button class="tab-button" style="background:#FFD700; color:#000000; border-radius:0 10px 10px 0;" onclick="showTab('tab2')">Pour gagner des
<b>Coins</b> <img src="/img/coin10.png" style="display:inline-block;" class="flex ml-1 mt-1 w-5 h-4"><br> <b>Cliquez-ici</b></button>
</div>  

<div id="tab1" class="tab-content" onclick="showTab('tab1')">
  <iframe style="border-radius:10px;" src="https://offers.cpx-research.com/index.php?app_id=20132&ext_user_id={{ backpack_auth()->user()->id }}&secure_hash=0INpuQOyRvhHLJLMd9IPO57IDDbGBbZP&username={{ backpack_auth()->user()->name }}&email={{ backpack_auth()->user()->email }}&subid_1={{ backpack_auth()->user()->name }}&subid_2"></iframe>
</div>

<div id="tab2" class="tab-content" onclick="showTab('tab2')">
  <iframe style="width:100%; border-radius:10px;" src="https://web.bitlabs.ai/?uid={{ backpack_auth()->user()->id }}&token=24d8aab4-f899-4309-87bf-20e62127aab3&username={{ backpack_auth()->user()->name }}"></iframe>
</div>

<script>
  function showTab(tabId) {
    // Masquer l'image sondagess
    var sondagessImage = document.querySelector('img[src="/img/sondagess.png"]');
    sondagessImage.style.display = 'none';

    // Masquer tous les onglets
    var tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(function(tab) {
      tab.classList.remove('active');
    });

    // Afficher l'onglet spécifique
    var activeTab = document.getElementById(tabId);
    activeTab.classList.add('active');
  }
</script>
<!-- Event snippet for Page vue conversion page --> <script> gtag('event', 'conversion', {'send_to': 'AW-11485783310/LbP0CLjHhrEZEI7K7OQq'}); </script>
<center><img src="/img/sondagess.png" width="50%"></center>
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
        $cadeau_name = $score->cadeau_name;
        if (strpos($cadeau_name, 'PayPal') !== false) {
            $cadeau_name = str_replace('PayPal', '<br>PayPal', $cadeau_name);
        }

        $winnersText .= '<div class="w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28" style="min-width:' . ($isMobile ? '100' : '200') . 'px;">
                            <div class="flex">
                                <img alt="" class="inline-block object-center w-auto h-' . ($isMobile ? '9' : '12') . '" src="https://i.pinimg.com/originals/5c/15/c1/5c15c1539c9c566b5413d98f9cf3592f.png"> 
                                <div class="flex flex-col">
                                    <h2 class="pb-0 pl-4 font-bold text-' . ($isMobile ? 's' : 's') . '">' . $score->name . '</h2> 
                                    <span href="#" class="ml-4 text-m font-bold text-blue-700 lg:mb-0">' . $cadeau_name . '</span>
                                </div>
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
                                    <td style="display:inline-block;" class="pl-2 text-white">{{__('Gagnez')}} 500 <img src="{{ asset('img/diamond5.png') }}" alt="Diamants" class="w-4 h-4 ml-1 inline-block"> {{__('par ami parrainé !')}} <br><i>{{__('(Aucune Limite de parrainage)')}}</i><br>
                                        <br><b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group" data-barba-prevent="self"
                                              id="copyLink"><span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">{{__('Cliquez-ici pour copier votre lien')}}</span></a></b><br><br>
                                        <i style="color: orange; font-size: 13px;">Triche = Exclusion du site</i>
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
                                    <td style="display:inline-block;" class="pl-4 text-white">{{__('Gagnez')}} 500 <img src="{{ asset('img/diamond5.png') }}" alt="Diamants" class="w-4 h-4 ml-1 inline-block"> {{__('par ami parrainé !')}}<br> <i>{{__('(Aucune Limite de parrainage)')}}</i><br>
                                        <br><b><a href="https://gokdo.com/admin/register?parrain={{ $lejoueur }}"
                                              class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group" data-barba-prevent="self"
                                              id="copyLink"><span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">{{__('Cliquez-ici pour copier votre lien')}}</span></a></b><br><br>
                                        <i style="color: orange; font-size: 13px;">Triche = Exclusion du site</i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </container>
            @endif
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
                @if($isMobile == true)
<video width="100%" height="150" controls autoplay loop muted>
    <source src="/img/sondages.mp4" type="video/mp4">
    Votre navigateur ne prend pas en charge la balise vidéo.
</video>
@else
<video width="560" height="315" controls autoplay loop muted>
    <source src="/img/sondages.mp4" type="video/mp4">
    Votre navigateur ne prend pas en charge la balise vidéo.
</video>
@endif

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
                            
                            {{__('Sondages rémunérés')}}
                        </h1>
                        @php $locale = app()->getLocale(); @endphp
                        @if($isMobile == true)
                        <p class="mb-4 text-base leading-relaxed text-left text-gray-300">
                        <b>Partagez votre avis</b> et participez à des <b>sondages rémunérés</b> en échange de récompenses.
                        @else
                        <p class="mb-4 text-base leading-relaxed text-left text-gray-300">
                        <b>Partagez votre avis</b> et <b>gagnez des récompenses</b>, tel est le concept du site Gokdo.com.<br><br>
                        Participez à des <b>sondages rémunérés en ligne</b>, vous avez la chance de pouvoir <b>influencer le développement des produits et services</b> que vous consommerez demain. Exprimez-vous en participant au <b>sondage rémunéré</b> maintenant en échange de récompenses.
                        <br><br><b>Ce site reverse automatiquement 50% des bénéfices réalisés.</b><br><br> Parrainez de nouveaux membres pour <b>gagner</b> 500 Diamants par ami parrainé !</p>
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
            <div class="mb-4 text-2xl font-bold text-gray-100 md:text-xl title-font">Sondages rémunérés en ligne</div>
            <h2 class="mb-4 text-l font-bold text-gray-100 md:text-l title-font">Gagnez de l'argent en partageant votre opinion</h2>
            @else
            <div class="mb-4 text-4xl font-bold text-gray-100 md:text-2xl title-font">Sondages rémunérés en ligne</div>
            <h2 class="mb-4 text-4xl font-bold text-gray-100 md:text-xl title-font">Gagnez de l'argent en partageant votre opinion</h2>
            @endif
            </div>
            <div class="container flex flex-wrap px-5 py-8 mx-auto">
                @php $steps = [
                [
                    'icon' => 'fa-solid fa-user fa-2x',
                    'title' => __('Inscrivez-vous gratuitement'),
                    'description' => __("Inscrivez-vous rapidement et gratuitement, ce site vous offre 7 diamants pour bien commencer votre parcours dans le monde du sondage rémunéré en ligne. Commencez à gagner de l'argent en devenant paneliste dès aujourd'hui !")
                ],
                [
                    'icon' => 'fa-solid fa-gamepad fa-2x',
                    'title' => __('Complétez des sondages'),
                    'description' => __("Faites valoir votre opinion et influencez les produits et services de demain, il vous sera offert 50% des bénéfices par sondage complété.")
                ],
                [
                    'icon' => 'fa-solid fa-gem fa-2x',
                    'title' => __('Parrainage'),
                    'description' => __("Parrainez de nouveaux membre pour gagner 500 Diamants par nouvel ami parrainé. Parfait pour gagner plus rapidement.")
                ],
                [
                    'icon' => 'fa-solid fa-gift fa-2x',
                    'title' => __('Soyez récompensé'),
                    'description' => __("Votre participation aux sondages rémunérés vous rapporte de l'argent et des cadeaux.")
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
                                <div class="mb-1 text-xl font-bold text-blue-500 title-font">{{ $step['title'] }}</div>
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
                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">Gokdo, le site de sondage rémunéré.</h2>
                
                <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/4">
                    Participez à des enquêtes rémunérées et gagnez des points à échanger contre des bons d'achat Amazon ou des virements Paypal. En fonction de votre profil, vous recevrez régulièrement des invitations à participer à des sondages sur des thèmes divers.
                    <br><br>
                    En 2024 il est très important de pouvoir arrondir ses fins de mois, c'est pourquoi il vous est proposé de compléter des sondages, votre opinion compte et elle peut vous rapporter de l'argent, alors profitez-en.
                    <br><br>
                    Le monde de demain vous appartient, il vous suffit de devenir paneliste, c'est facile et gratuit.
                </p>
                

                <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">
                Vous gagnez</h2>
                <p class="mb-8 text-base leading-relaxed text-gray-300 lg:w-3/4">
                50% redistribué au membre par sondage complété, tout le monde est gagnant.
                </p>
                </div>
        </div>
    </section>
</container>
@endif