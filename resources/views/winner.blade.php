 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>

         <container class="block min-h-screen px-2 mx-auto text-white max-w-7xl">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tableau des scores</h1>
                     <section class="text-gray-300 body-font">
                         <div class="container py-8 mx-auto">
                                 <div
                                     class="overflow-x-hidden border border-gray-700 rounded-lg">
                                     <table class="min-w-full text-sm divide-y divide-gray-700">
                                         <thead class="bg-gray-800 ">
                                             <tr>
                                                <th
                                                     class="hidden px-4 py-2 font-bold text-left text-white md:block whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Jeux
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Pseudo
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Score
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="hidden px-4 py-2 font-bold text-left text-white md:block whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Date
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     Bonus
                                                 </th>
                                             </tr>
                                         </thead>

                                         <tbody class="divide-y divide-gray-700">

                                         @forelse ($scores as $score)
                                              <tr class="dark:bg-gray-900">
                                                 <td
                                                     class="hidden px-4 mt-3 font-bold text-white md:block whitespace-nowrap">
                                                     <div class="flex items-center justify-center">
                                                   <img src="storage/{{ $score->game->image[0] }}" alt="coin" class="w-16 mt-3 h-9">
                                                   </div>
                                                 </td>
                                                 <td
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                   <a class="text-blue-600" href="/game?id={{ $score->game->id }}"> {{ $score->game->name }}</a>
                                                 </td>
                                                 <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
                                                      {{ $score->user->name }}
                                                 </td>
                                                 <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
                                                    {{ $score->score }}
                                                 </td>
                                                 <td class="hidden px-4 py-2 text-left text-gray-200 md:block whitespace-nowrap">
                                                   <p class="pb-6"> {{ $score->created_at->format('d/m/Y') }}</p>
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 w-[250px]">
                                                     <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold  bg-red-600 text-white max-w-[180px]">
                                                        <p class="hidden ml-1 md:block">+ {{ $score->data }}</p>  <img src="{{ asset('img/diamond5.png') }}" alt="coin" class="w-4 h-4 ml-2"> 
                                                        <p class="hidden ml-1 md:block">+ {{ $score->data2 }}</p>  <img src="{{ asset('img/coin10.png') }}" alt="coin" class="w-4 h-4 ml-2">
                                                         <p class="hidden ml-1 md:block">+ {{ $score->data3 }}</p>  <img src="{{ asset('img/gem5.png') }}" alt="coin" class="w-4 h-4 ml-2">
                                                     </strong>
                                                     
                                                 </td>
                                             </tr>
                                         @empty
                                              <tr class="dark:bg-gray-900">
                                                 <td
                                                     class="px-4 py-2 font-bold text-white whitespace-nowrap">
                                                     null
                                                 </td>
                                                 <td class="px-4 py-2 text-gray-200 whitespace-nowrap">
                                                    null
                                                 </td>
                                                 <td class="px-4 py-2 text-gray-200 whitespace-nowrap">
                                                     null
                                                 </td>
                                                 <td class="px-4 py-2 text-gray-200 whitespace-nowrap">
                                                     null
                                                 </td>
                                                 <td class="px-4 py-2 whitespace-nowrap">
                                                     <strong
                                                         class="rounded  px-3 py-1.5 text-xs font-bold bg-red-600 text-white">
                                                         null
                                                     </strong>
                                                 </td>
                                             </tr>
                                         @endforelse
                                            

              
                                         </tbody>
                                     </table>
                                 </div>

                             </div>
                      
                     </section>
                 </div>
             </div>
         </container>
     </div>
 @endsection
