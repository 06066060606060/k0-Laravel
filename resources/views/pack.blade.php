@extends('layouts.app')

@section('main')
    <script
        src="{{ Setting::get('paypal_link') }}"
        data-sdk-integration-source="button-factory"></script>

    <div data-barba="container">
    @php
        use \App\Http\Controllers\GlobalController;
        $isMobile = GlobalController::isMobile();
    @endphp
    @if($isMobile == true)
    @else
        <div class="z-0 one"></div>
    @endif
        <container class="block px-4 mx-auto text-white max-w-7xl">
            <div class="container px-5 pt-8 mx-auto">
                <div class="flex flex-col w-full mb-10 text-center">
                    <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tous nos packs</h1>
                    <p class="mx-auto text-base leading-relaxed">Acheter des rubis supplémentaires !</p>
                </div>
                <div class="flex flex-wrap justify-center -m-4">
                    @forelse ($packs as $pack)
                        <div class="w-1/2 p-2 lg:w-1/3">
                            <div
                                class="relative flex flex-col items-center max-h-[250px]  md:max-h-full min-w-full overflow-hidden text-center bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700">
                                {{-- ribbon --}}
                                @if ($pack->promo == 'Oui')
                                @php $prix = $pack->prix_promo @endphp
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        <div
                                            class="border z-20 absolute transform select-none rotate-45 bg-red-500 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            Promo {{ $pack->prix_promo }} €
                                        </div>
                                    </div>
                                @else 
                                @php $prix = $pack->prix @endphp
                                    <div class="absolute top-0 right-0 w-16 h-16">
                                        <div
                                            class="border z-20 absolute transform select-none rotate-45 bg-blue-700 text-center text-white font-semibold py-1 right-[-50px] top-[20px] w-[170px] shadow-lg">
                                            {{ $pack->prix }} €
                                        </div>
                                    </div>
                                @endif
                                <input id="price{{ $pack->id }}" type="hidden" name="pack_price" value="{{ $prix }}">
                                <input id="pack_id{{ $pack->id }}" type="hidden" name="pack_id" value="{{ $pack->id }}">
                                <input id="packname{{ $pack->id }}" type="hidden" name="pack_name" value="{{ $pack->name }}">
                                <input id="packgain{{ $pack->id }}" type="hidden" name="pack_gain" value="{{ $pack->gain }}">
                                <input id="packtype{{ $pack->id }}" type="hidden" name="pack_type" value="{{ $pack->type }}">
                                {{-- ribbon end --}}
                                @php $images =  $pack->image ?? null; @endphp
                                <img alt="gallery"
                                    class="inset-0 object-cover object-center w-auto h-24 px-2 pt-3 pb-2 rounded-t-md"
                                    src="{{ asset('storage/' . $images) }}" onerror="this.src='/img/empty.png'">
                                <div class="w-full">
                                    <h2 class="py-1 mx-2 text-xl font-bold text-blue-600 title-font">{{ $pack->name }}</h2>
                                    <p class="mx-2 mb-2 text-sm text-gray-400">{{ $pack->description }}</p>

                                    <div x-data="{ modelOpen: false }" class="flex justify-center" id="poppaie">

                                        <button @click="modelOpen =!modelOpen" onclick="initButton({{ $pack->id }})"
                                            class="relative flex justify-center w-24 px-5 py-1 mx-auto mb-2 font-medium text-white group">
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-green-600 group-hover:bg-green-800 group-hover:skew-x-12"></span>
                                            <span
                                                class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-green-800 group-hover:bg-green-600 group-active:bg-green-700 group-hover:-skew-x-12"></span>
                                            <span
                                                class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-green-700 -rotate-12"></span>
                                            <span
                                                class="absolute bottom-0 right-0 hidden w-10 h-20 mx-4 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-green-500 -rotate-12"></span>
                                            <span class="relative">Acheter</span>
                                        </button>

                                        {{-- <form action="setorderpack" method="POST">
                                            @csrf
                                            <input type="hidden" id="pack_id{{ $pack->id }}" name="pack_id" value="{{ $pack->id }}">
                                            <input type="hidden" id="pack_name{{ $pack->id }}" name="pack_name" value="{{ $pack->name }}">
                                            <input type="hidden" id="pack_price{{ $pack->id }}" name="pack_price" value="{{ $globalprice }}">
                                            <button type="submit"
                                                class="relative flex justify-center w-24 px-5 py-1 mx-auto mb-2 font-medium text-white group">
                                                test</button>
                                        </form> --}}

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
                                                    class="inline-block w-full max-w-xl pt-24 mx-4 overflow-hidden transition-all transform">
                                                    <div
                                                        class="flex flex-col justify-center px-4 my-4 bg-white rounded-md shadow-2xl">
                                                    <h1 class="pt-2 text-2xl font-bold text-center text-gray-900">Modes de paiements:</h1>
                                                        <div class="pt-4 paypal-button">
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
                            packprice = document.getElementById('packname' + packid).value;
                            packname = {!! json_encode($pack->name) !!};
                            packgain = {!! json_encode($pack->gain) !!};
                            packtype = {!! json_encode($pack->type) !!};
                            function initButton(id) {
                                packid = id;
                                packprice = document.getElementById('price' + id).value;
                                packname = document.getElementById('packname' + id).value;
                                packgain = document.getElementById('packgain' + id).value;
                                packtype = document.getElementById('packtype' + id).value;
                                console.log(packid, packprice, packname);
                            }

                            paypal.Buttons({

                                createOrder: function(data, actions) {

                                    return actions.order.create({
                                        purchase_units: [{
                                            description: packname,
                                            amount: {
                                                value: packprice
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // Capturez ici la commande
                                    return actions.order.capture().then(function(orderData) {
                                       
                                        //console.log(orderData.payer.name.given_name);
                                        console.log(orderData.payer.email_address);
                                        console.log(orderData.id);
                                         $.ajax({
                                            // url: 'http://127.0.0.1:8000/setorderpack',
                                             url: 'https://gokdo.com/setorderpack',
                                             headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                             method: 'POST',
                                             type: 'json',
                                             data: {
                                                 pack_id: packid,
                                                 pack_name: packname,
                                                 pack_price: packprice,
                                                 transaction: orderData.id,
                                                 gain: packgain,
                                                 type: packtype,
                                             },
                                             success: function (response) {
                                                 console.log(response);
                                             },
                                             error: function (error) {
                                                 console.log(error);
                                            }
                                         });
                                        // alert("Paiement effectué avec succès");
                                           //  window.location.href = "http://127.0.0.1:8000/profil";
                                          window.location.href = "https://gokdo.com/profil";
                                    });
                                },
                                onError: function(err) {
                                    console.log(err);
                                    alert("Une erreur est survenue");
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
