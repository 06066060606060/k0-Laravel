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
                    class="relative w-full p-4 py-2 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:w-64 h-96 md:h-[480px] md:mb-0 md:mr-4">
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
                            Score total : {{ backpack_auth()->user()->global_score }}
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
                    </div>

                    <ul class="absolute bottom-0 mt-4 mb-4">
                        <div
                            class="flex w-full max-w-sm py-2 overflow-hidden bg-gray-800 border border-gray-700 rounded-lg shadow-md">
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
                    </ul>
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
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> {{ $paiement->pack->prix }} €
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
                                        class="hidden px-4 py-2 font-bold text-left text-gray-900 md:block whitespace-nowrap">
                                        Status
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Opérations
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


                                        @if ($order->status == 'Non')
                                            <td class="hidden px-4 py-2 text-gray-300 whitespace-nowrap md:flex">
                                                <p
                                                    class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-red-400 md:flex">
                                                    En attente</p>
                                            </td>
                                            <td class="py-2 text-gray-300 whitespace-nowrap">
                                                <div class="flex">
                                                    {{-- <form action="confirm_order" method="POST" class="py-2">
                                                        @csrf
                                                          <input type="hidden" name="price"
                                                            value="{{ $order->cadeau->prix }}">
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                        <button type="submit">
                                                            <i
                                                                class="w-20 px-2 py-1 font-bold text-center text-gray-700 bg-green-600 rounded hover:bg-green-400">Confirmer</i>
                                                        </button>
                                                    </form> --}}

                                                    <div x-data="{ modelOpen: false }" class="py-2">

                                                        <i @click="modelOpen =!modelOpen" id="submitbtn"
                                                            class="w-20 px-2 py-1 font-bold text-center text-gray-700 bg-green-600 rounded hover:bg-green-400">Confirmer</i>


                                                        <div x-cloak x-show="modelOpen"
                                                            class="fixed inset-0 z-50 overflow-y-auto"
                                                            aria-labelledby="modal-title" role="dialog"
                                                            aria-modal="true">
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

                                                                    <form action="confirm_order" method="POST"
                                                                        class="flex flex-col mt-6 mb-0 bg-gray-800 rounded-md shadow-2xl ">
                                                                        @csrf
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $order->cadeau->prix }}">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $order->id }}">
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
                                                                                    {{ $order->cadeau->prix }} diamants
                                                                                    seronts retiré de votre score global
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
                                                    <script>

                                                      //  $('#submitbtn').attr('disabled', 'disabled');

                                                    </script>
                                                    <form action="delete_order" method="POST" class="px-4 py-2">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                        <button type="submit">
                                                            <i
                                                                class="text-gray-400 fas fa-trash-alt hover:text-red-400"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @elseif ($order->status == 'Oui')
                                            <td class="hidden px-4 py-2 text-gray-300 md:flex whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-green-400">
                                                    Confirmé</p>
                                            </td>
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                &nbsp;
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
                <div class="flex flex-col w-full bg-gray-800 border border-gray-700 rounded-xl max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Jeux
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Score
                                    </th>
                                    <th class="hidden px-4 py-2 font-bold text-gray-900 md:block whitespace-nowrap">
                                        Bonus
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-500">
                                @forelse ($scores as $score)
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{ $score->game->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> {{ $score->score }}</td>
                                        <td class="justify-center hidden w-auto py-2 mx-auto md:flex whitespace-nowrap">
                                            <strong
                                                class="flex md:px-3 py-1.5 text-xs font-bold  text-white max-w-[180px]">
                                                <p class="ml-2 ">+ {{ $score->data }}</p> <img
                                                    src="{{ asset('img/diamond5.png') }}" alt="coin"
                                                    class="w-4 h-4 ml-2">
                                                <p class="ml-2 ">+ {{ $score->data2 }}</p> <img
                                                    src="{{ asset('img/coin10.png') }}" alt="coin"
                                                    class="w-4 h-4 ml-2">
                                                <p class="ml-2 ">+ {{ $score->data3 }}</p> <img
                                                    src="{{ asset('img/gem5.png') }}" alt="coin"
                                                    class="w-4 h-4 ml-2">
                                            </strong>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            Aucun Score enregistré
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
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
