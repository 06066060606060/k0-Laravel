 @extends('layouts.app')

 @section('main')
     <div class="z-0 one"></div>

     <container class="block px-4 mx-auto text-white max-w-7xl">
         <div class="container px-5 pt-4 mx-auto">
             <div class="flex flex-col w-full mb-20 text-center">
                 <section class="p-4 text-gray-100 bg-gray-800 rounded-md">

                     <div class="container flex flex-col-reverse xl:flex-row">
                         <div class="w-full px-4 py-4 bg-gray-900 rounded-md xl:w-1/4 xl:mr-4">
                           @php $imagesb =  $game->image[0] ?? null; @endphp
                         <img src="./storage/{{ $imagesb }}" alt="" class="w-32 mx-auto mb-4" onerror="this.src='/img/empty.png'">
                             <h1 class="text-xl font-extrabold text-gray-50">{{ $game->name }}</h1>
                              <span class="block mb-2 text-blue-500">{{ $game->category }}</span>
                             <p class="my-8">
                                 {{ $game->description }}
                             </p>

                             <button type="button"
                                 class="w-full py-2 font-semibold text-gray-900 bg-blue-400 rounded hover:bg-blue-500 active:bg-blue-800">Jouer</button>

                         </div>
                         <div class="mb-4 xl:mb-0">

                             <img src="./img/demo.jpg" alt="" class="object-cover w-full bg-gray-500 rounded-md">
                         </div>
                     </div>

                 </section>
             </div>
         </div>
     </container>
 @endsection
