 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
             @php
        use \App\Http\Controllers\GlobalController;

        $isMobile = GlobalController::isMobile();
    @endphp
    @if($isMobile == true)
    @else
        <div class="z-0 one"></div>
    @endif
         <container class="block px-4 mx-auto text-white max-w-7xl">
    
             <div class="container pt-4 mx-auto lg:px-5">

                 <div class="flex flex-col w-full mb-20 text-center">
                     <section class="p-4 overflow-hidden text-gray-100 bg-gray-800 rounded-md">
                         <div class="flex justify-between">
                             @php $imagesb =  $game->image[0] ?? null; @endphp
                             <img src="./storage/{{ $imagesb }}" alt="" class="block w-32 pl-1 mb-4 rounded-md"
                                 onerror="this.src='/img/empty.png'">
                             <h1 class="block pt-2 pr-2 text-4xl font-extrabold text-gray-50">{{ $game->name }}</h1>
                         </div>

                         <div class="container flex flex-col-reverse xl:flex-row">
                             <div class="w-full px-4 py-4 bg-gray-900 rounded-md xl:w-1/4 xl:mr-4">
                             <div id="points" class="py-2 text-sm font-normal text-gray-200"> &nbsp;</div>
                                 <h1 class="font-extrabold text-md text-gray-50">{{__('LES GAGNANTS')}}</h1>
                                 <table class="min-w-full divide-y divide-gray-200">
                                     <thead>
                                         <tr>
                                             <th scope="col"
                                                 class="px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase">
                                                 {{__('Joueurs')}}
                                             </th>
                                             <th scope="col"
                                                 class="flex px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase">
                                                 {{__('Gains')}}
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($scores as $score)
                                             <tr>
                                                 <td class="px-4 py-2 text-sm font-normal text-gray-200 whitespace-nowrap">
                                                     {{ $score->user->name }}
                                                 </td>
                                                 <td class="flex px-4 py-2 text-sm font-normal text-gray-200 rate-container">
                                                 @if($score->data > 0)
                                                     {{ $score->data }} <img src="img/diamond5.png" class="flex w-6 h-4 ml-2 mt-1">

                                                 @endif
                                                 @if($score->data2 > 0)
                                                     {{ $score->data2 }} <img src="img/gem10.png" class="flex w-5 h-4 ml-2 mt-1">
                                                 @endif
                                                 @if($score->data3 > 0)
                                                     {{ $score->data3 }} <img src="img/coin10.png" class="flex w-5 h-4 ml-2 mt-1">
                                                 @endif
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
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
                                    <iframe id="gameBody" src="{{ $link . '?userid=' . $userid . '&locale=' . app()->getLocale() . '&tk=' . csrf_token() . '&user_name=' . $username . '&rubis=' . $rubis . '&gameid=' . $game->id . '&free_game=' . $free . '&parties=' . $parties . '&secret=' . $secret}}" class="w-full h-[667px] overflow-hidden -mt-1" scrolling="no"></iframe>
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
  

// $(document).ready(function () {
                  //  $('#butsave').on('click', function () {
                  //      var value = $('#diff').val();
                    //        $.ajax({
                     //           url: 'score',
                     //           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                       //         method: 'POST',
                       //         type: 'json',
                       //         data: {
                        //            value,
                        //        },
                        //        success: function (response) {
                      //              console.log(response);
                          //      },
                      //          error: function (error) {
                      //             console.log(error);
                      //          }
                     //       });
                //    });
              //  });
    </script>
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
                                });
                                </script>
 @endsection
