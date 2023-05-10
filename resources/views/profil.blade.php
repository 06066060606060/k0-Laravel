@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())">
                <div id="popmenu" class="px-4 py-2 text-gray-100 btnmenu">Transaction confirmé</div>
            </div>
        @endif
        <container class="flex flex-col min-h-screen px-8 mx-auto md:flex-row lg:max-w-6xl md:pl-16">
            <div class="flex flex-col pt-2">
                <card
                    class="relative w-full p-4 py-2 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:w-64 md:mb-0 md:mr-4">
                    <div class="flex items-center pt-2 pb-4 border-b border-gray-500">
                        <img alt="Developer" src="img/avatar.png"
                            class="object-cover w-16 h-16 border border-gray-400 rounded-full" />

                        <div class="ml-3">
                            <h3 class="text-lg font-medium text-white">{{ backpack_auth()->user()->name }}</h3>

                            <div class="flow-root">
                                <ul class="flex flex-wrap -m-1">
                                    <li class="p-1 leading-none">
                                        <i
                                            class="text-xs font-medium text-gray-300">{{ backpack_auth()->user()->email }}</i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:items-center">
                        <p class="py-4 font-medium text-white border-b border-gray-500 ">
                            Score Concours : {{ backpack_auth()->user()->global_score }} Pts
                        </p>
                        <h3 class="pt-1 pb-2 text-lg font-bold text-white">Mes Butins</h3>
                        <div class="flex py-2">
                            <img src="img/diamond5.png" class="w-10 h-8">
                            <p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee1 }}</p>
                        </div>
                        <div class="flex py-2">
                            <img src="img/gem10.png" class="w-10 h-8">
                            <p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee2 }}</p>
                        </div>
                        <div class="flex py-2">
                            <img src="img/coin10.png" class="w-10 h-8">
                            <p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee3 }}</p>
                        </div>
                        <div class="flex py-2">
                            <div
                                class="flex w-full max-w-sm py-2 bg-gray-800 border border-gray-700 rounded-lg shadow-md">
                                <div class="flex items-center justify-center w-12 ml-2 bg-red-500 rounded">
                                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                                    </svg>
                                </div>

                                <div class="px-4 pb-1 ml-1">
                                    <span class="text-xs font-semibold text-red-400">Supprimer mon compte</span>
                                    @include('parts.delete')
                                </div>
                            </div>
                        </div>
                    </div>


                </card>
            </div>
            <div class="flex flex-col w-full py-2">

                <h1 class="pt-0 text-lg font-bold text-white">Mes recharges:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Type
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Prix
                                    </th>

                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-500">
                                @forelse ($paiements as $paiement)
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{ $paiement->pack->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> {{ $paiement->type }} €
                                        </td>



                                        @if ($paiement->status == 'Non')
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                <p
                                                    class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-red-400 md:flex">
                                                    En attente</p>
                                            </td>
                                        @elseif ($paiement->status == 'Oui')
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-blue-400">
                                                    Payé</p>
                                            </td>
                                        @endif

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            Aucune recharge effectuée
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 class="pt-3 text-lg font-bold text-white">Mes commandes:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Cadeau
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Coût
                                    </th>
                                    <th
                                        class="px-4 py-2 font-bold text-left text-gray-900 md:block whitespace-nowrap">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-500">
                                @forelse ($orders as $order)
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{ $order->cadeau->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> {{ $order->cadeau->prix }}
                                        </td>
                                        </td>
                                        @if ($order->status == 'Oui')
                                            <td class="px-4 py-2 text-gray-300 md:flex whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-green-400">
                                                    Confirmé</p>
                                         </td>
                                             @elseif ($order->status == 'Annulé')
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-orange-400">
                                                    Annulé</p>
                                            </td>
                                        @else
                                            <td class="px-4 py-2 text-gray-300 md:flex whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-purple-400">
                                                    Expédié</p>
                                            </td>
                                       
                                        @endif

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            Aucun article
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

                <h1 class="py-4 text-lg font-bold text-white">Mes scores:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Jeux
                                    </th>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Score
                                    </th>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-gray-900 md:block whitespace-nowrap">
                                        Date
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-500">
                                @forelse ($scores as $score)
                                    <tr>
                                        <td style="width:33%;" class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{ $score->game->name }}
                                        </td>
                                        <td style="width:33%; display:inline-block;" class="px-4 py-4 font-medium text-gray-200 whitespace-nowrap"> 
                                        @if($score->data > 0)
                                        {{ $score->data }} <img src="img/diamond5.png" style="display:inline-block;" class="flex ml-1 mt-1 w-6 h-4">
                                        @endif
                                        @if($score->data2 > 0)
                                        {{ $score->data2 }} <img src="img/gem10.png"  style="display:inline-block;" class="flex ml-1 mt-1 w-5 h-4">
                                        @endif
                                        @if($score->data3 > 0)
                                        {{ $score->data3 }} <img src="img/coin10.png" style="display:inline-block;" class="flex ml-1 mt-1 w-5 h-4">
                                        @endif
                                        </td>
                                        <td style="width:33%;">
                                            <strong class="flex md:px-3 py-1.5 text-xs font-bold  text-white max-w-[180px]">
                                                <p class="ml-2 ">{{ $score->created_at->format('d/m H:i') }}</p> 
                                            </strong>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            Aucun Score enregistré
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> &nbsp; &nbsp; &nbsp;</td>

                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> &nbsp; &nbsp; &nbsp;
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>

                </div>

                <h1 class="pt-4 text-lg font-bold text-white">Mon adresse de livraison:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0">
                    <form action="save_address" class="container flex flex-col mx-auto" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ backpack_auth()->user()->id }}">
                        <fieldset class="grid grid-cols-4 gap-6 p-6">
                            <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                                <div class="col-span-full sm:col-span-3">
                                    <label for="lastname" class="text-sm text-gray-300">Nom</label>
                                    <input name="lastname" id="lastname" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->nom ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="firstname" class="text-sm text-gray-300">Prénom</label>
                                    <input name="firstname" id="firstname" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->prenom ?? null }}">
                                </div>
                                <div class="col-span-full">
                                    <label for="address" class="text-sm text-gray-300">Adresse</label>
                                    <input name="address" id="address" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->adresse ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="zip" class="text-sm text-gray-300">Code Postal</label>
                                    <input name="zip" id="zip" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->codepostal ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="city" class="text-sm text-gray-300">Ville</label>
                                    <input name="city" id="city" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->ville ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="" class="text-sm text-gray-300"> &nbsp;</label>
                                    <button type="submit"
                                        class="w-full px-2 py-2 text-white bg-blue-600 border-gray-700 rounded-md active:bg-blue-600 hover:bg-blue-400 focus:ring-opacity-75">Enregistrer
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
        </container>
    </div>
    <script>
        function PopupUser() {
            console.log('okpop');
            var updateElement = document.getElementById("popmenu");
            updateElement.classList.toggle("active");

        }
    </script>
    <style>
        /* ANIMATION SURVOL MENU FULL CSS AU TOP */
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 130px;
            top: -35px;
            left: -50px;
            color: rgba(255, 255, 255, 0.534);
            text-alrgba(255, 255, 255, 0.459) center;
            padding: 4px 4px;
            border-radius: 6px;
            position: absolute;
            z-index: 1;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        .tooltip .tooltiptext {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .tooltip:hover .tooltiptext {
            opacity: 1;
        }

        #popmenu {
            position: fixed;
            top: -50px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            background-color: #46515F;
            text-decoration: none;
            transition: 0.25s;
            border-radius: 8px;
            user-select: none;
            overflow: hidden;

        }

        #popmenu.active {
            top: 60px;
            transition: 0.3s;
            transition: 0.25s;
        }

        @media (max-width: 640px) {
            #popmenu.active {
                top: 165px;
                transition: 0.3s;
                transition: 0.25s;
            }
        }
    </style>
@endsection
