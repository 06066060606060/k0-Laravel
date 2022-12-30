@extends('layouts.app')

@section('main')
    <div data-barba="container">
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
                <div class="flex flex-col w-full mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="w-full py-2 text-sm divide-y divide-gray-200">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Recharger mon compte
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        Paiements
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-500">
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap max-h-24">
                                        <fieldset class="grid grid-cols-2 gap-4">
                                            <div>
                                                <input type="radio" name="DeliveryOption" value="DeliveryStandard"
                                                    id="DeliveryStandard" class="hidden peer" checked />

                                                <label for="DeliveryStandard"
                                                    class="block p-4 text-sm font-medium border border-gray-400 rounded-lg shadow-sm cursor-pointer hover:border-gray-300 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500 ">
                                                    <div class="flex flex-col md:flex-row">
                                                        <img src="{{ asset('img/diamond5.png') }}" alt="coin"
                                                            class="w-6 h-6 pb-1 md:mr-2">
                                                        <p class="text-gray-700 dark:text-gray-200">x 500</p>
                                                    </div>
                                                    <p class="mt-1 text-gray-900 dark:text-white">10 €</p>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" name="DeliveryOption" value="DeliveryPriority"
                                                    id="DeliveryPriority" class="hidden peer" />

                                                <label for="DeliveryPriority"
                                                    class="block p-4 text-sm font-medium border border-gray-400 rounded-lg shadow-sm cursor-pointer hover:border-gray-300 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500 ">
                                                    <div class="flex flex-col md:flex-row">
                                                        <img src="{{ asset('img/diamond5.png') }}" alt="coin"
                                                            class="w-6 h-6 pb-1 md:mr-2">
                                                        <p class="text-gray-700 dark:text-gray-200">x 1000</p>
                                                    </div>
                                                    <p class="mt-1 text-gray-900 dark:text-white">19 €</p>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </td>
                                    <td class="px-4 pt-8 font-medium text-gray-200 whitespace-nowrap max-h-24" <td />
                                    <a class="m-3 btn btn-primary" href="{{ route('processTransaction') }}"
                                        target="_blank">Payer EUR.10</a>

                                    @if (\Session::has('error'))
                                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                        {{ \Session::forget('error') }}
                                    @endif
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                        {{ \Session::forget('success') }}
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 class="pt-3 text-lg font-bold text-white">Mes recharges:</h1>
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
                                @forelse ($paiements as $paiement)
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{ $paiement->pack->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"> {{ $paiement->pack->prix }}
                                        </td>
                                        </td>


                                        @if ($paiement->status == 'Non')
                                            <td class="hidden px-4 py-2 text-gray-300 whitespace-nowrap md:flex">
                                                <p
                                                    class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-red-400 md:flex">
                                                    En attente</p>
                                            </td>
                                            <td class="py-2 text-gray-300 whitespace-nowrap">
                                                <div class="flex">
                                                    <form action="confirm_order" method="POST" class="py-2">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $paiement->id }}">
                                                        <button type="submit">
                                                            <i
                                                                class="w-20 px-2 py-1 font-bold text-center text-gray-700 bg-green-600 rounded hover:bg-green-400">Confirmer</i>
                                                        </button>
                                                    </form>

                                                    <form action="delete_order" method="POST" class="px-4 py-2">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $paiement->id }}">
                                                        <button type="submit">
                                                            <i
                                                                class="text-gray-400 fas fa-trash-alt hover:text-red-400"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @elseif ($paiement->status == 'Oui')
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
                                        Prix
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
                                                    <form action="confirm_order" method="POST" class="py-2">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                        <button type="submit">
                                                            <i
                                                                class="w-20 px-2 py-1 font-bold text-center text-gray-700 bg-green-600 rounded hover:bg-green-400">Confirmer</i>
                                                        </button>
                                                    </form>

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
@endsection
