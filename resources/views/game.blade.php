 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>
         @php $imagesb =  $game->image[0] ?? null; @endphp
         <container class="block px-4 mx-auto text-white max-w-7xl">
             <div class="container lg:px-5 pt-4 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <section class="p-4 text-gray-100 bg-gray-800 rounded-md overflow-hidden">
                         <div class="flex justify-between">
                             @php $imagesb =  $game->image[0] ?? null; @endphp
                             <img src="./storage/{{ $imagesb }}" alt="" class="block w-32 mb-4 rounded-md pl-1"
                                 onerror="this.src='/img/empty.png'">
                             <h1 class="block text-4xl font-extrabold text-gray-50 pt-2">{{ $game->name }}</h1>
                         </div>

                         <div class="container flex flex-col-reverse xl:flex-row">
                             <div class="w-full px-4 py-4 bg-gray-900 rounded-md xl:w-1/4 xl:mr-4">
                                 <h1 class="text-md font-extrabold text-gray-50">SCORE DU MOIS</h1>
                                 <table class="min-w-full divide-y divide-gray-200">
                                     <thead>
                                         <tr>
                                             <th scope="col"
                                                 class="px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase">
                                                 Joueurs:
                                             </th>
                                             <th scope="col"
                                                 class="px-4 py-2 text-xs font-medium tracking-wider text-gray-500 uppercase">
                                                 Scores:
                                             </th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($scores as $score)
                                             <tr>
                                                 <td class="px-4 py-2 text-sm font-normal text-gray-200 whitespace-nowrap">
                                                     {{ $score->user->name }}
                                                 </td>
                                                 <td class="px-4 py-2 text-sm font-normal text-gray-200 rate-container">
                                                     {{ $score->score }}
                                                 </td>
                                             </tr>
                                         @endforeach
                                     </tbody>
                                 </table>
                             </div>
                             <div id="gameBody" class="gameBody mb-4 xl:mb-0 w-full">
                                 <iframe src="./src/game.html" title="description"
                                     class="object-cover w-full h-[666px] bg-gray-500 rounded-md"></iframe>
                             </div>
                         </div>

                     </section>
                 </div>
             </div>
         </container>
     </div>
 @endsection
