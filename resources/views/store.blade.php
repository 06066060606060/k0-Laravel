 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>

         <container class="block px-4 mx-auto text-white max-w-7xl  min-h-screen">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Boutique de cadeaux</h1>
                     <section class="text-gray-300 body-font">
                         <div class="container px-5 py-4 mx-auto">
                             <div class="flex flex-col w-full mb-10 text-center">
                                 <p class="mx-auto text-base leading-relaxed">Echanger vos <a
                                         class="text-blue-500">diamants</a> contre des cadeaux <br></p>
                             </div>
                             <div class="container px-5  mx-auto">
                                 <div class="flex flex-wrap -m-4">

                                     @forelse ($cadeaux as $cadeau)
                                         <div class="p-4 lg:w-1/4 md:w-1/2">
                                             <div
                                                 class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                                 @php $image =  $cadeau->image ?? null; @endphp
                                                 <img alt="gallery"
                                                     class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                                     src="./storage/{{ $image }}"
                                                     onerror="this.src='/img/empty.png'">
                                                 <div class="w-full">
                                                     <div class="flex justify-between mx-4">
                                                         <h2 class="py-1 text-xl font-bold text-green-600 title-font ">
                                                             {{ $cadeau->name }}</h2>
                                                             <div class="flex">
                                                         <img src="./img/diamond5.png" class="w-4 h-4 mt-3 mx-2">
                                                         <p class="mt-2">x {{ $cadeau->prix }}</p>
                                                         </div>
                                                     </div>
                                                     <p class="mb-4 text-sm mx-2">{{ $cadeau->description }}</p>

                                                     <a href=""
                                                         class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 font-medium text-white group">
                                                         <span
                                                             class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-green-600 group-hover:bg-green-800 group-hover:skew-x-12"></span>
                                                         <span
                                                             class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-green-800 group-hover:bg-green-600 group-active:bg-green-700 group-hover:-skew-x-12"></span>
                                                         <span
                                                             class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-green-700 -rotate-12"></span>
                                                         <span
                                                             class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-green-500 -rotate-12"></span>
                                                         <span class="relative">Echanger</span>
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>


                                     @empty
                                     @endforelse


                                 </div>
                             </div>
                         </div>
                     </section>
                 </div>
             </div>
         </container>
     </div>
 @endsection
