 @extends('layouts.app')

 @section('main')
     <div class="z-0 one"></div>

     <container class="block px-4 mx-auto text-white max-w-7xl">
         <div class="container px-5 pt-4 mx-auto">
             <div class="flex flex-col w-full mb-20 text-center">
                 <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Jeux 1</h1>

                 <section class="p-4 text-gray-100 bg-gray-800 rounded-md">

                     <div class="container flex flex-col-reverse xl:flex-row">
                         <div class="w-full px-4 py-4 bg-gray-900 rounded-md xl:w-1/4 xl:mr-4">
                             <span class="block mb-2 text-blue-400">Jeux Gratuit</span>
                             <h1 class="text-2xl font-extrabold text-gray-50">Titre jeux 1</h1>
                             <p class="my-8">
                                 <span class="font-medium text-gray-50">Modular and versatile.</span>Fugit vero
                                 facilis dolor sit neque cupiditate minus esse accusamus cumque at.
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
