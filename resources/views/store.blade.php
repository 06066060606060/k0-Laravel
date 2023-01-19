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

         <container class="block min-h-screen px-4 mx-auto text-white max-w-7xl">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Boutique de cadeaux</h1>
                     <section class="text-gray-300 body-font">
                         <div class="container px-5 py-4 mx-auto">
                             <div class="flex flex-col w-full mb-10 text-center">
                                 <p class="mx-auto text-base leading-relaxed">Echanger vos <a
                                         class="text-blue-500">diamants</a> contre des cadeaux <br></p>
                             </div>
                             <div class="container px-5 mx-auto">
                                 <div class="flex flex-wrap -m-4">

                                     @forelse ($cadeaux as $cadeau)
                                         <div class="p-4 lg:w-1/4 md:w-1/2">
                                             <div
                                                 class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                                 <input type="hidden" name="id" value="{{ $cadeau->id }}">
                                                 @php $image =  $cadeau->image ?? null; @endphp
                                                 <img alt="gallery"
                                                     class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                                     src="./storage/{{ $image }}"
                                                     onerror="this.src='/img/empty.png'">
                                                 <div class="w-full">
                                                     <div class="flex justify-between mx-4">
                                                         <h2 name="name"
                                                             class="py-1 text-xl font-bold text-green-600 title-font ">
                                                             {{ $cadeau->name }}</h2>
                                                         <div class="flex">
                                                             <img src="./img/diamond5.png" class="w-4 h-4 mx-2 mt-3">
                                                             <p name="prix" class="mt-2">x {{ $cadeau->prix }}</p>
                                                         </div>
                                                     </div>
                                                     <p class="mx-2 mb-4 text-sm">{{ $cadeau->description }}</p>

                                                     <div class="relative flex justify-center w-24 px-5 py-1 mx-auto">
                                                         <div x-data="{ modelOpen: false }" class="flex justify-center">
                                                    @if (backpack_auth()->check() )
                                                             @if (backpack_auth()->user()->trophee1 < $cadeau->prix)
                                                                 <button
                                                                     onclick="alert('Vous devez n\'avez pas assez de diamants !')"
                                                                     class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 font-medium text-white group">
                                                                     <span
                                                                         class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-green-600 group-hover:bg-green-800 group-hover:skew-x-12"></span>
                                                                     <span
                                                                         class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-red-600 group-hover:bg-red-600 group-active:bg-green-700 group-hover:-skew-x-12"></span>
                                                                     <span
                                                                         class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-green-700 -rotate-12"></span>
                                                                     <span
                                                                         class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-green-500 -rotate-12"></span>
                                                                     <span class="relative text-sm">Trop Cher</span>
                                                                 </button>
                                                             @else
                                                                 <button @click="modelOpen =!modelOpen"
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
                                                                 </button>
                                                             @endif
                                                    @else

                                                                <a href="/admin/register" 
                                                                        class="relative flex justify-center w-24 px-5 pt-1 pb-2 mx-auto my-2 font-medium text-white group prevent">
                                                                     <span
                                                                         class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-green-600 group-hover:bg-green-800 group-hover:skew-x-12"></span>
                                                                     <span
                                                                         class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-green-800 group-hover:bg-green-600 group-active:bg-green-700 group-hover:-skew-x-12"></span>
                                                                     <span
                                                                         class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-green-700 -rotate-12"></span>
                                                                     <span
                                                                         class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-green-500 -rotate-12"></span>
                                                                     <span class="relative">Inscription</span>
                                                                 </a>
                                                    @endif
                                                             <div x-cloak x-show="modelOpen"
                                                                 class="fixed inset-0 z-50 overflow-y-auto"
                                                                 aria-labelledby="modal-title" role="dialog"
                                                                 aria-modal="true">
                                                                 <div
                                                                     class="flex items-center justify-center px-4 text-center sm:block sm:p-0">
                                                                     <div x-cloak @click="modelOpen = false"
                                                                         x-show="modelOpen"
                                                                         x-transition:enter="transition ease-out duration-300 transform"
                                                                         x-transition:enter-start="opacity-0"
                                                                         x-transition:enter-end="opacity-100"
                                                                         x-transition:leave="transition ease-in duration-200 transform"
                                                                         x-transition:leave-start="opacity-100"
                                                                         x-transition:leave-end="opacity-0"
                                                                         class="fixed inset-0 w-screen transition-opacity bg-gray-900 bg-opacity-60"
                                                                         aria-hidden="true"></div>

                                                                     <div x-cloak x-show="modelOpen"
                                                                         x-transition:enter="transition ease-out duration-300 transform"
                                                                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                                         x-transition:leave="transition ease-in duration-200 transform"
                                                                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                                         class="inline-block w-full max-w-4xl pt-32 mx-auto overflow-hidden transition-all transform">

                                                                         <form action="order" method="POST"
                                                                             class="flex flex-col mt-6 mb-0 bg-gray-800 rounded-md shadow-2xl ">
                                                                               @csrf
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $cadeau->prix }}">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $cadeau->id }}">
                                                                        <div class="flex justify-between w-full border-b">
                                                                            <h1 class="py-6 mx-auto text-lg font-bold">
                                                                                Confirmer votre commande:
                                                                            </h1>
                                                                        </div>
                                                                        <div class="bg-gray-700 rounded-b-md">
                                                                            <div
                                                                                class="flex flex-col items-center pb-8 mx-24 mt-1">
                                                                                <h1
                                                                                    class="py-2 text-sm font-medium text-white">
                                                                                    {{ $cadeau->prix }} diamants
                                                                                    seronts retiré de votre solde.
                                                                                </h1>

                                                                                <div class="flex justify-center">
                                                                                    <div @click="modelOpen = false"
                                                                                        class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 mr-4 font-medium text-white group">
                                                                                        <span
                                                                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-red-600 group-hover:bg-red-800 group-hover:skew-x-12"></span>
                                                                                        <span
                                                                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-red-800 group-hover:bg-red-600 group-active:bg-red-700 group-hover:-skew-x-12"></span>
                                                                                        <span
                                                                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-red-700 -rotate-12"></span>
                                                                                        <span
                                                                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-red-500 -rotate-12"></span>
                                                                                        <span
                                                                                            class="relative">Annuler</span>
                                                                                    </div>

                                                                                    <button type="submit"
                                                                                        class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 font-medium text-white group">
                                                                                        <span
                                                                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-green-600 group-hover:bg-green-800 group-hover:skew-x-12"></span>
                                                                                        <span
                                                                                            class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-green-800 group-hover:bg-green-600 group-active:bg-green-700 group-hover:-skew-x-12"></span>
                                                                                        <span
                                                                                            class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-green-700 -rotate-12"></span>
                                                                                        <span
                                                                                            class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-green-500 -rotate-12"></span>
                                                                                        <span
                                                                                            class="relative">Confirmer</span>
                                                                                    </button>

                                                                                </div>
                                                                                <h1
                                                                                    class="text-xs font-medium text-gray-200">
                                                                                    Vérifier que vous avez enregistré une
                                                                                    adresse de livraison avant de confirmer.
                                                                                </h1>
                                                                            </div>
                                                                        </div>
                                                                         </form>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                     </div>
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
