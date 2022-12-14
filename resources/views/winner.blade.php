 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>
  <div
            class="max-w-6xl px-12 py-12 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 sm:px-16 md:px-24 lg:py-18 ">
            <div class="flex flex-wrap items-center mx-auto max-w-7xl lg:pl-8">
                <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
                    <div>
                        <div class="relative w-full max-w-lg">

                            <div class="relative">
                                @php $imagesd =  $concours->image ?? null; @endphp
                                <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero"
                                    src="{{ asset('storage/' . $imagesd) }}" onerror="this.src='/img/empty.png'">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
                    <span class="mb-1 font-bold tracking-widest text-blue-600 uppercase text-md"> Prochain concours:</span>
                    <h1 class="mb-2 text-gray-100">
                      Du  {{ $startdate }}  au  {{ $enddate }} </h1>
                    <h1
                        class="mb-4 text-4xl font-bold leading-none tracking-tighter text-gray-100 md:text-7xl lg:text-5xl">
                      {{ $concours->name }} </h1>
                    <p class="mb-4 text-base leading-relaxed text-left text-gray-300"> {{ $concours->description }}</p>

                    <div class="">
                            <a href=""
                                class="relative px-5 py-2 mx-auto mt-4 font-medium text-white shadow-lg group">
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-indigo-500 group-hover:bg-indigo-700 group-hover:skew-x-12"></span>
                                <span
                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-indigo-700 group-hover:bg-indigo-500 group-active:bg-indigo-600 group-hover:-skew-x-12"></span>
                                <span
                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-indigo-600 -rotate-12"></span>
                                <span
                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-indigo-400 -rotate-12"></span>
                                <span class="relative">Participer</span>
                            </a>
                    </div>

                </div>
            </div>
        </div>





         <container class="block min-h-screen px-2 mx-auto text-white max-w-7xl">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tableau des scores:</h1>
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
