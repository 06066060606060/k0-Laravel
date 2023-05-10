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
  <div
            class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
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
                    <span class="mb-1 font-bold tracking-widest text-blue-600 uppercase text-md"> Concours:</span>
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
                                <span class="relative">Jouer</span>
                            </a>
                    </div>

                </div>
            </div>
        </div>





         <container class="flex flex-col min-h-screen px-8 mx-auto md:flex-row lg:max-w-6xl md:pl-16">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Classement Concours:</h1>
                     <section class="text-gray-300 body-font">
                         <div class="container py-8 mx-auto">
                                 <div
                                     class="overflow-x-auto border border-gray-700 rounded-lg">
                        @if($isMobile == true)
                                     <table style="width:500px;" class="min-w-full text-sm divide-y divide-gray-700">
                          @else
                                     <table class="min-w-full text-sm divide-y divide-gray-700">
                          @endif
                                         <thead class="bg-gray-800 ">
                                             <tr>
                                                 <th style="width:10%;"
                                                     class="px-4 py-2 font-bold text-center text-white whitespace-nowrap">
                                                     <div class="items-center gap-2">
                                                         #
                                                     </div>
                                                 </th>
                                                 <th  style="width:20%;"
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Pseudo
                                                     </div>
                                                 </th>
                                                 <th  style="width:40%;"
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Score
                                                     </div>
                                                 </th>
                                                 <th  style="width:30%;"
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     Gain
                                                 </th>
                                             </tr>
                                         </thead>

                                         <tbody class="divide-y divide-gray-700">

@foreach ($scores as $score)
    @php $position++; @endphp
    <tr class="dark:bg-gray-900">
        <td class="px-4 py-2 font-bold text-center text-white whitespace-nowrap">
            {{ $position }}
        </td>
        <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
            {{ $score->user->name }}
        </td>
        <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
            @php 
                $total1 = $score->data;
                $total2 = $score->data2*100;
                $total3 = $score->data3*1000;
                $totalite = $total1+$total2+$total3;
            @endphp
                @if($isMobile == true)
            <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-blue-600 text-white max-w-[180px]">
                <p class="ml-1 md:block">{{ $score->total }} PTS</p>  
                <!--<img src="{{ asset('img/diamond5.png') }}" alt="coin" class="w-4 h-4 ml-2"> 
                <p class="hidden ml-1 md:block">+ {{ $score->data2 }}</p>  
                <img src="{{ asset('img/gem5.png') }}" alt="coin" class="w-4 h-4 ml-2">
                <p class="hidden ml-1 md:block">+ {{ $score->data3 }}</p>  
                <img src="{{ asset('img/coin10.png') }}" alt="coin" class="w-4 h-4 ml-2">-->
            </strong>
                @else
            <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-blue-600 text-white max-w-[180px]">
                <p class="hidden ml-1 md:block">{{ $score->total }} PTS</p>  
                <!--<img src="{{ asset('img/diamond5.png') }}" alt="coin" class="w-4 h-4 ml-2"> 
                <p class="hidden ml-1 md:block">+ {{ $score->data2 }}</p>  
                <img src="{{ asset('img/gem5.png') }}" alt="coin" class="w-4 h-4 ml-2">
                <p class="hidden ml-1 md:block">+ {{ $score->data3 }}</p>  
                <img src="{{ asset('img/coin10.png') }}" alt="coin" class="w-4 h-4 ml-2">-->
            </strong>
            @endif
            
        </td>
        <td class="whitespace-nowrap px-4 py-2 w-[250px]">
            complete ma série

@if($position == 1)
            @php $gain_joueur = 500; @endphp
            @elseif($position == 2)
            @php $gain_joueur = 200; @endphp
            @elseif($position == 3)
            @php $gain_joueur = 100; @endphp
            @elseif($position > 3 && $position == 6)
            @php $gain_joueur = 50; @endphp
            @elseif($position > 6 && $position == 15)
            @php $gain_joueur = 20; @endphp
            @elseif($position > 15 && $position == 30)
            @php $gain_joueur = 10; @endphp
            @elseif($position > 30 && $position == 150)
            @php $gain_joueur = 50000; @endphp
            @elseif($position > 150 && $position == 300)
            @php $gain_joueur = 25000; @endphp
           @elseif($position > 300 && $position == 600)
            @php $gain_joueur = 10000; @endphp
           @elseif($position > 600 && $position == 1500)
            @php $gain_joueur = 7000; @endphp
          @elseif($position > 1500 && $position == 3000)
            @php $gain_joueur = 2000; @endphp
          @elseif($position > 3000)
            @php $gain_joueur = 0; @endphp
             @endif
             @if($isMobile == true)
            <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-green-800 text-white max-w-[180px]">
                <!--<p class="hidden ml-1 md:block">+ {{ $score->total }}</p>  
                <img src="{{ asset('img/diamond5.png') }}" alt="coin" class="w-4 h-4 ml-2"> 
                <p class="hidden ml-1 md:block">+ {{ $score->data2 }}</p>  
                <img src="{{ asset('img/gem10.png') }}" alt="coin" class="w-4 h-4 ml-2">-->
                <p class="ml-1 md:block">{{ $gain_joueur }}</p>  
                <img src="{{ asset('img/coin10.png') }}" alt="coin" class="w-4 h-4 ml-2">
            </strong>
            @else
            <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-green-800 text-white max-w-[180px]">
                <!--<p class="hidden ml-1 md:block">+ {{ $score->total }}</p>  
                <img src="{{ asset('img/diamond5.png') }}" alt="coin" class="w-4 h-4 ml-2"> 
                <p class="hidden ml-1 md:block">+ {{ $score->data2 }}</p>  
                <img src="{{ asset('img/gem10.png') }}" alt="coin" class="w-4 h-4 ml-2">-->
                <p class="hidden ml-1 md:block">{{ $gain_joueur }}</p>  
                <img src="{{ asset('img/coin10.png') }}" alt="coin" class="w-4 h-4 ml-2">
            </strong>
            @endif
        </td>
    </tr>
@endforeach

                                            
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
