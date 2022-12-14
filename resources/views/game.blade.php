 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>
         @php $imagesb =  $game->image[0] ?? null; @endphp
         <container class="block px-4 mx-auto text-white max-w-7xl">
             <div class="container lg:px-5 pt-4 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <section class="p-4 text-gray-100 bg-gray-800 rounded-md overflow-hidden lg:mx-16">

                         <h1 class="text-4xl font-extrabold text-gray-50 py-4">{{ $game->name }}</h1>
                         <div class="container flex flex-col-reverse xl:flex-row">
                             {{-- <div class="w-full px-4 py-4 bg-gray-900 rounded-md xl:w-1/4 xl:mr-4">
                           @php $imagesb =  $game->image[0] ?? null; @endphp
                         <img src="./storage/{{ $imagesb }}" alt="" class="w-32 mx-auto mb-4" onerror="this.src='/img/empty.png'">
                             <h1 class="text-xl font-extrabold text-gray-50">{{ $game->name }}</h1>
                              <span class="block mb-2 text-blue-500">{{ $game->category }}</span>
                             <p class="my-8">
                                 {{ $game->description }}
                             </p>
                             <p id="mespoints"></p>
                         </div> --}}
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
