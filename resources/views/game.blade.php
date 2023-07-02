 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
             @php
        use \App\Http\Controllers\GlobalController;
        use Jenssegers\Agent\Agent;


        $isMobile = GlobalController::isMobile();
    @endphp
    @if($isMobile == true)
    @else
        <div class="z-0 one"></div>
    @endif
    @if($isMobile == true)
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @else
    @endif
         <container class="block px-4 mx-auto text-white max-w-7xl">
    
             <div class="container pt-4 mx-auto lg:px-5">

                 <div class="flex flex-col w-full mb-20 text-center">
                     <section class="p-4 overflow-hidden text-gray-100 bg-gray-800 rounded-md">
                         <div class="flex justify-between">
                         @php $imagesb =  $game->image[0] ?? null;
                                $imgiUrl = asset('storage/' . $imagesb);
                                $gifiUrl = str_replace(".mp4", ".gif", $imgiUrl);
                             @endphp                            
                             <img src="{{ $gifiUrl }}" alt="" class="block w-32 pl-1 mb-4 rounded-md"
                                 onerror="this.src='/img/empty.png'">
                             <h1 class="block pt-2 pr-2 text-4xl font-extrabold text-gray-50">{{ $game->name }}</h1>
                         </div>

                         <div class="container flex flex-col-reverse xl:flex-row">
                             @if (backpack_auth()->check())
                             @php
                              $link =  $game->link ?? null;
                              $secret =  encrypt(['userid' => $userid, '&tk=' . csrf_token(), 'rubis' => $rubis, 'gameid' => $game->id, 'free_game' => $free, 'parties' => $parties, 'timestamp' => time()]);
                             @endphp
                             <div class="w-full">
                             <div class="display-block">
                                <button class="w-full px-2 py-2 font-bold rounded-md text-white bg-green-800 border-green-700 active:bg-green-600 hover:bg-green-600 focus:ring-opacity-75" id="fullscreenButton">{{__('JOUER EN MODE PLEIN ECRAN')}}</button>
                            </div> 
                            <div class="display-block mt-6">
                           @if($isMobile == true)
                                @php
                                $agent = new Agent();
                                $screenWidthInches = $agent->device()->screenWidth();
                                @endphp
                            {{ $screenWidthInches }}
                                
                            @if ($isMobile && $screenWidthInches == 360) 
                            <iframe id="gameBody" src="{{ $link . '?userid=' . $userid . '&locale=' . app()->getLocale() . '&tk=' . csrf_token() . '&user_name=' . $username . '&rubis=' . $rubis . '&gameid=' . $game->id . '&free_game=' . $free . '&parties=' . $parties . '&secret=' . $secret}}" class="w-full overflow-hidden -mt-1" style="height:300px;" scrolling="no"></iframe>
                                @else
                                @endif
                            @else
                                <iframe id="gameBody" src="{{ $link . '?userid=' . $userid . '&locale=' . app()->getLocale() . '&tk=' . csrf_token() . '&user_name=' . $username . '&rubis=' . $rubis . '&gameid=' . $game->id . '&free_game=' . $free . '&parties=' . $parties . '&secret=' . $secret}}" class="w-full h-[667px] overflow-hidden -mt-1" scrolling="no"></iframe>
                            @endif
                            </div>
                           </div>


                                
                                @else
                                @if(app()->getLocale() == 'en') 
                                <script>alert('You must be logged in to play a game!')</script>
                                @elseif(app()->getLocale() == 'fr')
                                <script>alert('Vous devez être connecté pour jouer à un jeu !')</script>
                                @elseif(app()->getLocale() == 'de')
                                <script>alert('Sie müssen angemeldet sein, um ein Spiel zu spielen!')</script>
                                @elseif(app()->getLocale() == 'es')
                                <script>alert('¡Debes iniciar sesión para jugar a un juego!')</script>
                                @elseif(app()->getLocale() == 'it')
                                <script>alert("Devi effettuare l'accesso per giocare a un gioco!")</script>                                
                                @else
                                @endif
                                @endif
                         </div>
                  
                     </section>
                 </div>
             </div>
            
         </container>
     </div>

<script>
    const fullscreenButton = document.getElementById('fullscreenButton');
    const gameIframe = document.getElementById('gameBody');

    fullscreenButton.addEventListener('click', () => {
        if (gameIframe.requestFullscreen) {
            gameIframe.requestFullscreen();
        } else if (gameIframe.mozRequestFullScreen) {
            gameIframe.mozRequestFullScreen();
        } else if (gameIframe.webkitRequestFullscreen) {
            gameIframe.webkitRequestFullscreen();
        } else if (gameIframe.msRequestFullscreen) {
            gameIframe.msRequestFullscreen();
        }

        // Verrouiller en mode paysage sur les appareils mobiles
        if (screen.orientation && screen.orientation.lock) {
            screen.orientation.lock('landscape').catch((error) => {
                console.log('Échec du verrouillage en mode paysage:', error);
            });
        } else if (screen.lockOrientation) {
            screen.lockOrientation('landscape');
        }


        var currentLocale = '{{ app()->getLocale() }}';

        // Vérifier si l'appareil est un iPhone
        const isiPhone = /iPhone/i.test(navigator.userAgent);

        // Vérifier si l'appareil est en mode portrait
        const isPortrait = window.matchMedia("(orientation: portrait)").matches;

        // Afficher un message demandant de basculer en mode paysage sur iPhone en mode portrait
        if (isiPhone && isPortrait) {
            if(currentLocale == 'fr'){
            alert("Veuillez basculer votre appareil en mode paysage pour une meilleure expérience.");
            } else if (currentLocale == 'en'){
            alert("Please rotate your device to landscape mode for a better experience.");
            } else if (currentLocale == 'de'){
            alert("Bitte drehen Sie Ihr Gerät in den Querformatmodus für ein besseres Erlebnis.");
            } else if (currentLocale == 'es'){
            alert("Por favor, gire su dispositivo al modo horizontal para una mejor experiencia.");
            } else if (currentLocale == 'it'){
            alert("Si prega di ruotare il dispositivo in modalità orizzontale per un'esperienza migliore.");
            }
        }
    });
</script>

 @endsection
