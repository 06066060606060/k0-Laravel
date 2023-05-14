 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
             @php
        use \App\Http\Controllers\GlobalController;
        $isMobile = GlobalController::isMobile();
    @endphp
    @if(isset($concours))
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
                            <a href="game?id={{ $concours->game_id }}"
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
                                                 <th  style="width:30%;"
                                                     class="px-4 py-2 font-bold text-left text-white whitespace-nowrap">
                                                     <div class="flex items-center gap-2">
                                                         Pseudo
                                                     </div>
                                                 </th>
                                                 <th  style="width:30%;"
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

@foreach($scores as $index => $score)
<tr class="dark:bg-gray-900">
    <td class="px-4 py-2 font-bold text-center text-white whitespace-nowrap">
        {{ $index + 1 }}
    </td>
    <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
        {{ $score->user->name }}
    </td>
    <td class="px-4 pt-2 text-left text-gray-200 whitespace-nowrap">
        @php 
            $total1 = $score->total;
            $total2 = $score->total2 * 100;
            $total3 = $score->total3 * 1000;
            $totalite = $total1+$total2+$total3;
        @endphp
        @if($isMobile == true)
        <strong class="flex rounded md:px-3 py-1.5 text-xs mb-2 font-bold bg-blue-600 text-white max-w-[180px]">
            <p class="ml-1 md:block">{{ $score->total }}</p><img src="{{ asset('img/trophy.png') }}" alt="trophy" class="w-4 h-4 ml-2">  
        </strong>
        @else
        <strong class="flex rounded mb-2 md:px-3 py-1.5 text-xs font-bold bg-blue-600 text-white max-w-[180px]">
            <p class="hidden ml-1 md:block">{{ $score->total }}</p> <img src="{{ asset('img/trophy.png') }}" alt="trophy" class="w-4 h-4 ml-2">  
        </strong>
        @endif
    </td>
    <td class="whitespace-nowrap px-4 py-2 w-[250px]">
            
        @if($isMobile == true)
        <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-green-800 text-white max-w-[180px]">
            <p class="flex ml-1">            @if($index == 0)
{{ $gains->where('id', 1)->first()->name }} <img src="{{ $gains->where('id', 1)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 1)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index == 1)
{{ $gains->where('id', 2)->first()->name }} <img src="{{ $gains->where('id', 2)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 2)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index == 2)
{{ $gains->where('id', 3)->first()->name }} <img src="{{ $gains->where('id', 3)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 3)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 3 && $index <= 5)
{{ $gains->where('id', 4)->first()->name }} <img src="{{ $gains->where('id', 4)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 4)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 6 && $index <= 14)
{{ $gains->where('id', 5)->first()->name }} <img src="{{ $gains->where('id', 5)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 5)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 15 && $index <= 29)
{{ $gains->where('id', 6)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 30 && $index <= 149)
{{ $gains->where('id', 7)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 150 && $index <= 299)
{{ $gains->where('id', 8)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 300 && $index <= 599)
{{ $gains->where('id', 9)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 600 && $index <= 1499)
{{ $gains->where('id', 10)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 1500 && $index <= 2999)
{{ $gains->where('id', 11)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index > 3000)
{{ $gains->where('id', 12)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@endif

</p>
        </strong>
        @else
        <strong class="flex rounded md:px-3 py-1.5 text-xs font-bold bg-green-800 text-white max-w-[180px]">
            <p class="flex ml-1">
            @if($index == 0)
{{ $gains->where('id', 1)->first()->name }} <img src="{{ $gains->where('id', 1)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 1)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index == 1)
{{ $gains->where('id', 2)->first()->name }} <img src="{{ $gains->where('id', 2)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 2)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index == 2)
{{ $gains->where('id', 3)->first()->name }} <img src="{{ $gains->where('id', 3)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 3)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 3 && $index <= 5)
{{ $gains->where('id', 4)->first()->name }} <img src="{{ $gains->where('id', 4)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 4)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 6 && $index <= 14)
{{ $gains->where('id', 5)->first()->name }} <img src="{{ $gains->where('id', 5)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 5)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 15 && $index <= 29)
{{ $gains->where('id', 6)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 30 && $index <= 149)
{{ $gains->where('id', 7)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 150 && $index <= 299)
{{ $gains->where('id', 8)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 300 && $index <= 599)
{{ $gains->where('id', 9)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 600 && $index <= 1499)
{{ $gains->where('id', 10)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index >= 1500 && $index <= 2999)
{{ $gains->where('id', 11)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@elseif($index > 3000)
{{ $gains->where('id', 12)->first()->name }} <img src="{{ $gains->where('id', 6)->first()->type == 'Coins' ? asset('img/coin10.png') : ($gains->where('id', 6)->first()->type == 'Rubis' ? asset('img/gem5.png') : asset('img/diamond5.png')) }}" alt="gain" class="flex w-4 h-4 ml-2">
@endif
</p>
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
     @else
<center>Pas de concours actuellement.</center><br>
<!-- WINNER -->
<winner class="mx-auto max-w-7xl" id="win">
    <section>
        <div class="mb-4 px-2 py-2 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <h2 class="text-2xl font-bold tracking-tight text-center text-gray-100 ">
                DERNIERS GAGNANTS
            </h2>

            <div class="pb-4 mt-4 border-gray-600 md:mt-4 swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden">
                <div class="swiper-wrapper">



                    @forelse ($lesderniers_gagnants_concours as $gagnant)
                        <div class="swiper-slide">
                            <blockquote>
                                <div
                                    class="flex flex-col w-full max-w-md p-8 mx-4 text-left bg-white shadow-lg rounded-xl h-28">
                                    <div class="flex">
                                    @//if($score->data > 0)
                                    @if($isMobile == true)
                                        <img alt="" class="inline-block object-center w-auto h-9"
                                            src="{{ asset('img/diamond5.png') }}">
                                        @else
                                        <img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/diamond5.png') }}">
                                        @endif
                                    @//elseif($score->data2 > 0)
                                    @//if($isMobile == true)
                                        <!--<img alt="" class="inline-block object-center w-auto h-9"
                                            src="{{ asset('img/gem10.png') }}">-->
                                        @//else
                                        <!--<img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/gem10.png') }}">-->
                                        @//endif
                                    @//elseif($score->data3 > 0)
                                    @//if($isMobile == true)
                                        <!--<img alt="" class="inline-block object-center w-auto h-9"
                                            src="{{ asset('img/coin10.png') }}">-->
                                        @//else
                                        <!--<img alt="" class="inline-block object-center w-auto h-12"
                                            src="{{ asset('img/coin10.png') }}">-->
                                        @//endif
                                    @//endif
                                        <div class="flex flex-col">
                                        @if($isMobile == true)
                                            <h2 class="pb-0 pl-4 font-semibold text-xs">                                        
                                        @else
                                            <h2 class="pb-0 pl-4 font-semibold text-s">
                                        @endif
                                            {{ $gagnant->name }}
                                            </h2>
                                              <span href="#" class="ml-4 text-m font-bold text-blue-700 lg:mb-0">{{ $gagnant->gain }}</span>
                                    <span href="#" class="ml-4 text-s font-bold text-orange-600 lg:mb-0">{{ $gagnant->date_gain->format('d/m/Y') }}</span>
                                    
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
                                                <span href="#"
                                                    class="ml-4 text-xs font-bold text-blue-700 lg:mb-0">Bonus 10
                                                    ✧</span>
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

     @endif
 @endsection
