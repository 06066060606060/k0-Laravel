@extends('layouts.app')

@section('main')
    <div class="z-0 one"></div>
    <container class="block px-4 mx-auto text-white max-w-7xl">
        <div class="container px-5 pt-8 mx-auto">
            <div class="flex flex-col w-full mb-20 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tous nos jeux</h1>
                <p class="mx-auto text-base leading-relaxed lg:w-2/3">Des dizaines de jeux flash, jeux d'adresse, jeux de
                    réflexion et jeux de chance.<br> Vous pourrez jouer à Fish Mania, un jeu de pêche multijoueur, ou une
                    chasse au trésor enablée..<br><a -500">Rejoignez les centaines de joueurs déjà inscrits !</a> </p>
            </div>
            <h2 class="pb-8 text-4xl font-bold tracking-tight text-center text-blue-600 underline underline-offset-8">
                Gratuit
            </h2>
            <div class="flex flex-wrap justify-center -m-4">
                @forelse ($freegames as $freegame)
                    <div class="p-4 lg:w-1/4 md:w-1/2">
                        <div
                            class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                            <img alt="gallery" class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                src="./storage/{{ $freegame->image }} ">
                            <div class="w-full">
                                <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">{{ $freegame->name }}</h2>
                                <h3 class="mb-1 text-gray-300">{{ $freegame->category }}</h3>
                                <p class="mb-2 text-sm">{{ $freegame->description }}</p>
                                <a class="flex justify-center pb-4">
                                    <da href="game?id={{ $freegame->id }}"
                                        class=" transform select-none  bg-blue-700 text-center hover:bg-blue-600 active:bg-blue-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                        Jouer
                                    </da>
                                </a>
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
                                <a class="flex justify-center pb-4">
                                    <da href="game"
                                        class=" transform select-none  bg-blue-700 text-center hover:bg-blue-600 active:bg-blue-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                        Jouer
                                    </da>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse



            </div>


            <!-- BOOSTER -->

            <div class="container px-5 pt-16 mx-auto">
                <h2 class="pb-8 text-4xl font-bold tracking-tight text-center text-red-600 underline underline-offset-8">
                    Booster
                </h2>
                <div class="flex flex-wrap justify-center -m-4">
                    @forelse ($boostergames as $boostergame)
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div
                                class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                <img alt="gallery" class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                    src="./storage/{{ $boostergame->image }}">
                                <div class="w-full">
                                    <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">{{ $boostergame->name }}</h2>
                                    <h3 class="mb-1 text-gray-300">{{ $boostergame->category }}</h3>
                                    <p class="mb-2 text-sm">{{ $boostergame->description }}</p>
                                    <div class="flex justify-center pb-4">
                                        <a href="game?id={{ $boostergame->id }}"
                                            class=" transform select-none  bg-orange-700 text-center hover:bg-orange-600 active:bg-orange-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                            Jouer
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div
                                class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                <img alt="gallery" class="inset-0 object-cover object-center w-full h-full rounded-t-md"
                                    src="./img/16.jpg">
                                <div class="w-full">
                                    <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">Aucun</h2>
                                    <h3 class="mb-1 text-gray-300">Null</h3>
                                    <p class="mb-2 text-sm">DIY tote bag drinking vinegar cronut adaptogen squid fanny.</p>
                                    <div class="flex justify-center pb-4">
                                        <a href="game"
                                            class=" transform select-none  bg-orange-700 text-center hover:bg-orange-600 active:bg-orange-800 text-white font-semibold py-1 w-[120px] rounded-full">
                                            Jouer
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
    </container>
@endsection
