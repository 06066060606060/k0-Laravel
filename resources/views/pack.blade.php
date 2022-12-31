@extends('layouts.app')

@section('main')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AUUI0_mUeQz4bH9yeO94b-z0BEQZNtzGR_vvOcxOugMD_WCnY73WlovQJhFGMRI66h8B6e9vvY7qX5lr&enable-funding=venmo&currency=EUR"
        data-sdk-integration-source="button-factory"></script>

    <div data-barba="container">
        <div class="z-0 one"></div>
        <container class="block px-4 mx-auto text-white max-w-7xl">
            <div class="container px-5 pt-8 mx-auto">
                <div class="flex flex-col w-full mb-10 text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tous nos packs</h1>
                    <p class="mx-auto text-base leading-relaxed">Acheter des rubis supplémentaires !</p>
                </div>
                <div class="flex flex-wrap justify-center -m-4">
                    @forelse ($packs as $pack)
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div
                                class="flex flex-col items-center h-full text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                @php $images =  $pack->image ?? null; @endphp
                                <img alt="gallery"
                                    class="inset-0 object-cover object-center w-auto h-24 px-2 pt-3 pb-2 rounded-t-md"
                                    src="{{ asset('storage/' . $images) }}" onerror="this.src='/img/empty.png'">
                                <div class="w-full">
                                    <h2 class="py-1 text-xl font-bold text-blue-600 title-font ">{{ $pack->name }}</h2>
                                    <p class="mb-2 text-sm">{{ $pack->description }}</p>
                                    <p class="mb-2 text-sm">{{ $pack->prix }} €</p>

                                    <div x-data="{ modelOpen: false }" class="flex justify-center">

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
                                            <span class="relative">Acheter</span>
                                        </button>

                                        <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div
                                                class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
                                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                    x-transition:enter="transition ease-out duration-300 transform"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease-in duration-200 transform"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-60"
                                                    aria-hidden="true"></div>
                                                <div x-cloak x-show="modelOpen"
                                                    x-transition:enter="transition ease-out duration-300 transform"
                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave="transition ease-in duration-200 transform"
                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    class="inline-block w-full max-w-4xl pt-32 mx-4 overflow-hidden transition-all transform">
                                                    <div
                                                        class="flex flex-col my-4 bg-white rounded-md shadow-2xl justify-center px-4">

                                                        <div class="paypal-button pt-4">
                                                            <div style="text-align: center;">
                                                                <div id="paypal-button-container{{ $pack->id }}"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                           
                            packid = {!! json_encode($pack->id) !!};
                            packprice = {!! json_encode($pack->prix) !!};
                            paypal.Buttons({
                                createOrder: function(data, actions) {
                                    // Créez ici votre commande
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: packprice
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // Capturez ici la commande
                                    return actions.order.capture().then(function(details) {
                                        // Affichez les détails de la commande à votre utilisateur
                                        alert('Transaction effectuée avec succès !');
                                        
                                    });
                                }
                            }).render('#paypal-button-container' + packid);
                        
                        </script>
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
                                            Empty
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
        </container>
    </div>
@endsection
