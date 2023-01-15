@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="z-0 one"></div>
        <container class="block px-4 mx-auto text-white max-w-7xl">
            <div class="container px-5 pt-8 mx-auto">
                <div class="flex flex-col w-full mb-20 text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tous nos jeux</h1>
                    <p class="mx-auto text-base leading-relaxed lg:w-2/3">Des dizaines de jeux flash, jeux d'adresse, jeux de
                        réflexion et jeux de chance.<br> Vous pourrez jouer à Fish Mania, un jeu de pêche multijoueur, ou
                        une
                        chasse au trésor enablée..<br><a -500">Rejoignez les centaines de joueurs déjà inscrits !</a> </p>
                </div>

                <div class="flex flex-wrap py-2 mb-4 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl">
                    <div class="flex flex-wrap items-center justify-center py-2 mx-auto md:max-w-7xl">
                  
                        <i class="pb-1 pr-2 fa-solid fa-gamepad fa-3x"></i>&nbsp;
                        <h2 class="pb-1 text-xl font-bold tracking-tight text-center md:text-4xl text-white-600">
                        JEUX GRATUITS 
                        </h2>
                 
                    </div>
                </div>

                <div class="flex flex-wrap justify-center -m-4">
                    @forelse ($freegames as $freegame)
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div
                                class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                @php $images =  $freegame->image[0] ?? null; @endphp
                                <img alt="gallery" class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                    src="{{ asset('storage/' . $images) }}" onerror="this.src='/img/empty.png'">
                                <div class="w-full">
                                    <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">{{ $freegame->name }}</h2>
                                    <h3 class="mb-1 text-gray-300">{{ $freegame->category }}</h3>
                                    <p class="mb-2 text-sm">{{ $freegame->description }}</p>
                                    @if (backpack_auth()->check())
                                        <a href="game?id={{ $freegame->id }}"
                                            class="relative flex justify-center w-24 px-5 pt-1 pb-2 mx-auto my-2 font-medium text-white group">
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-blue-500 group-hover:bg-blue-700 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-blue-700 group-hover:bg-blue-500 group-active:bg-blue-600 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-blue-600 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-blue-400 -rotate-12"></span>
                                            <span class="relative">Jouer</span>
                                        </a>
                                    @else
                                        <a href="/admin/register"
                                            class="relative flex justify-center w-24 px-5 pt-1 pb-2 mx-auto my-2 font-medium text-white group prevent">
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-blue-500 group-hover:bg-blue-700 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-blue-700 group-hover:bg-blue-500 group-active:bg-blue-600 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-blue-600 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-blue-400 -rotate-12"></span>
                                            <span class="relative">Jouer</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div
                                class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                <img alt="gallery" class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                    src="./img/empty.jpg">
                                <div class="w-full">
                                    <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">Aucun</h2>
                                    <h3 class="mb-1 text-gray-300">Null</h3>
                                    <p class="mb-2 text-sm">DIY tote bag drinking vinegar cronut adaptogen squid fanny.</p>
                                    <a href="#" class="flex justify-center pb-4">
                                        <button
                                            class=" transform select-none  bg-blue-700 text-center hover:bg-blue-600 active:bg-blue-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                            Jouer
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- BOOSTER -->
                <div class="container px-5 pt-16 mx-auto">
                                    <div class="flex flex-wrap py-2 mb-4 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl">
                    <div class="flex flex-wrap items-center justify-center py-2 mx-auto md:max-w-7xl">
                  
                        <i class="pb-1 pr-2 text-red-600 fa-solid fa-bolt fa-3x"></i>&nbsp;
                        <h2 class="pb-1 text-xl font-bold tracking-tight text-center text-red-600 md:text-4xl">
                        JEUX BOOSTER 
                        </h2>
                 
                    </div>
                </div>
                    
                    
                    <div class="flex flex-wrap justify-center -m-4">
                        @forelse ($boostergames as $boostergame)
                            <div class="p-4 lg:w-1/4 md:w-1/2">
                                <div
                                    class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                    @php $imagesb =  $boostergame->image[0] ?? null; @endphp
                                    <img alt="gallery"
                                        class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                        src="{{ asset('storage/' . $imagesb) }}" onerror="this.src='/img/empty.png'">
                                    <div class="w-full">
                                        <h2 class="py-1 text-xl font-bold text-orange-600 title-font ">
                                            {{ $boostergame->name }}</h2>
                                        <h3 class="mb-1 text-gray-300">{{ $boostergame->category }}</h3>
                                        <p class="mb-2 text-sm">{{ $boostergame->description }}</p>
                                        @if (backpack_auth()->check())
                                            <a href="game?id={{ $boostergame->id }}"
                                                class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 font-medium text-white group">
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-orange-500 group-hover:bg-orange-700 group-hover:skew-x-12"></span>
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-orange-700 group-hover:bg-orange-500 group-active:bg-orange-600 group-hover:-skew-x-12"></span>
                                                <span
                                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-orange-600 -rotate-12"></span>
                                                <span
                                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-orange-400 -rotate-12"></span>
                                                <span class="relative">Jouer</span>
                                            </a>
                                        @else
                                            <a href="/admin/register"
                                                class="relative flex justify-center w-24 px-5 py-1 mx-auto my-2 font-medium text-white group prevent">
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-orange-500 group-hover:bg-orange-700 group-hover:skew-x-12"></span>
                                                <span
                                                    class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-orange-700 group-hover:bg-orange-500 group-active:bg-orange-600 group-hover:-skew-x-12"></span>
                                                <span
                                                    class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-orange-600 -rotate-12"></span>
                                                <span
                                                    class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-orange-400 -rotate-12"></span>
                                                <span class="relative">Jouer</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 lg:w-1/4 md:w-1/2">
                                <div
                                    class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                    <img alt="gallery"
                                        class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                        src="./img/16.jpg">
                                    <div class="w-full">
                                        <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">Aucun</h2>
                                        <h3 class="mb-1 text-gray-300">Null</h3>
                                        <p class="mb-2 text-sm">DIY tote bag drinking vinegar cronut adaptogen squid fanny.
                                        </p>
                                        <a href="#" class="flex justify-center pb-4">
                                            <button
                                                class=" transform select-none  bg-blue-700 text-center hover:bg-blue-600 active:bg-blue-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                                Jouer
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
        </container>
    </div>
@endsection
