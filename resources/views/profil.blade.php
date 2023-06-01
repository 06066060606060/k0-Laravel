@extends('layouts.app')

@section('main')
    <div data-barba="container">
      @php
        use \App\Http\Controllers\GlobalController;
        $isMobile = GlobalController::isMobile();
    @endphp
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000, PopupUser())">
                <div id="popmenu" class="px-4 py-2 text-gray-100 btnmenu">{{__('Transaction confirmée')}}</div>
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
                        @php
    if(isset($scory->total) || isset($scorey->total2) || isset($scory->total3)){
    $total1 = $scory->total;
    $total2 = $scory->total2 * 100;
    $total3 = $scory->total3 * 1000;
    $totalite = $total1 + $total2 + $total3;
    } else {}
@endphp
@if(isset($scory->total) || isset($scorey->total2) || isset($scory->total3))
<p class="flex py-4 text-xs text-white border-b border-gray-500">
    {{__('Score Concours')}} : {{ $totalite }} <img src="{{ asset('img/trophy.png') }}" alt="trophy" class="flex w-3 h-3 ml-2">
</p>
@else
<p class="flex py-4 text-xs text-white border-b border-gray-500">
    {{__('Score Concours')}} : 0 <img src="{{ asset('img/trophy.png') }}" alt="trophy" class="flex w-3 h-3 ml-2">
</p>
@endif
                        <h3 class="pt-1 pb-2 text-lg font-bold text-white">{{__('Mes Butins')}}</h3>
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
                                    <span class="text-xs font-semibold text-red-400">{{__('Supprimer mon compte')}}</span>
                                    @include('parts.delete')
                                </div>
                            </div>
                        </div>
                    </div>


                </card>
            </div>
            <div class="flex flex-col w-full py-2">

                <h1 class="pt-0 text-lg font-bold text-white">{{__('Mes recharges')}}:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Type')}}
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Prix')}}
                                    </th>

                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Status')}}
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
                                                    {{__('En attente')}}</p>
                                            </td>
                                        @elseif ($paiement->status == 'Oui')
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-blue-400">
                                                    {{__('Payée')}}</p>
                                            </td>
                                        @endif

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{__('Aucune recharge effectuée')}}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
                <h1 class="pt-3 text-lg font-bold text-white">{{__('Mes commandes')}}:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                        <table class="min-w-full py-2 text-sm divide-y divide-gray-200 ">
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Cadeau')}}
                                    </th>
                                    <th class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Coût')}}
                                    </th>
                                    <th
                                        class="px-4 py-2 font-bold text-left text-gray-900 md:block whitespace-nowrap">
                                        {{__('Status')}}
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
                                                    {{__('Confirmée')}}</p>
                                         </td>
                                             @elseif ($order->status == 'Annulé')
                                            <td class="px-4 py-2 text-gray-300 whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-orange-400">
                                                    {{__('Annulée')}}</p>
                                            </td>
                                        @else
                                            <td class="px-4 py-2 text-gray-300 md:flex whitespace-nowrap">
                                                <p class="w-20 px-2 py-2 font-bold text-center text-gray-700 bg-purple-400">
                                                    {{__('Expédiée')}}</p>
                                            </td>
                                       
                                        @endif

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-200 whitespace-nowrap">
                                            {{__('Aucun article')}}
                                        </td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                        <td class="px-4 py-2 text-gray-300 whitespace-nowrap"></td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

                <h1 class="py-4 text-lg font-bold text-white">{{__('Mes scores')}}:</h1>
                <div class="flex flex-col w-full mt-0 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0 max-h-64">
                    <div class="overflow-x-auto rounded-t-lg">
                    @if($isMobile == true)
                                     <table style="width:500px;" class="min-w-full py-2 text-sm divide-y divide-gray-200">
                          @else
                                     <table style="width:500px;" class="min-w-full py-2 text-sm divide-y divide-gray-200">
                          @endif
                            <thead class="bg-gray-100 rounded-t-lg">
                                <tr>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Jeux')}}
                                    </th>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-left text-gray-900 whitespace-nowrap">
                                        {{__('Score')}}
                                    </th>
                                    <th style="width:33%;" class="px-4 py-2 font-bold text-gray-900 md:block whitespace-nowrap">
                                        {{__('Date')}}
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
                                            {{__('Aucun score enregistré')}}
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

                <h1 class="pt-4 text-lg font-bold text-white">{{__('Mon adresse de livraison')}}:</h1>
                <div class="flex flex-col w-full mt-4 mb-4 bg-gray-800 border border-gray-700 rounded-xl md:mb-0">
                    <form action="save_address" class="container flex flex-col mx-auto" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ backpack_auth()->user()->id }}">
                        <fieldset class="grid grid-cols-4 gap-6 p-6">
                            <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-6">
                                <div class="col-span-full sm:col-span-3">
                                    <label for="lastname" class="text-sm text-gray-300">{{__('Nom')}}</label>
                                    <input name="lastname" id="lastname" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->nom ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-3">
                                    <label for="firstname" class="text-sm text-gray-300">{{__('Prénom')}}</label>
                                    <input name="firstname" id="firstname" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->prenom ?? null }}">
                                </div>
                                <div class="col-span-full">
                                    <label for="address" class="text-sm text-gray-300">{{__('Adresse')}}</label>
                                    <input name="address" id="address" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->adresse ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="zip" class="text-sm text-gray-300">{{__('Code Postal')}}</label>
                                    <input name="zip" id="zip" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->codepostal ?? null }}">
                                </div>
                                <div class="col-span-full sm:col-span-2">
                                    <label for="city" class="text-sm text-gray-300">{{__('Ville')}}</label>
                                    <input name="city" id="city" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->ville ?? null }}">
                                </div>
                                @php
                                    $countriesJson = file_get_contents(resource_path('lang/pays.json'));
                                    $countries = json_decode($countriesJson, true);
                                    $countriesJsonde = file_get_contents(resource_path('lang/paysde.json'));
                                    $countriesde = json_decode($countriesJsonde, true);
                                    $countriesJsones = file_get_contents(resource_path('lang/payses.json'));
                                    $countrieses = json_decode($countriesJsones, true);
                                    $countriesJsonit = file_get_contents(resource_path('lang/paysit.json'));
                                    $countriesit = json_decode($countriesJsonit, true);
                                @endphp
                                <div class="col-span-full sm:col-span-2">
                                    <label for="state" class="text-sm text-gray-300">{{__('Pays')}}</label>
                                    <select name="pays" class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400">
                                      @if(app()->getLocale() == 'fr') 
                                      @foreach ($countries as $key => $value)
                                          <option value="{{ $key }}" @if ($infos[0]->pays == $key) selected @endif>{{ $key }}</option>
                                      @endforeach
                                      @elseif(app()->getLocale() == 'en') 
                                      @foreach ($countries as $key => $value)
                                          <option value="{{ $value }}" @if ($infos[0]->pays == $value) selected @endif>{{ $value }}</option>
                                      @endforeach
                                      @elseif(app()->getLocale() == 'de') 
                                      @foreach ($countriesde as $keyde => $valuede)
                                          <option value="{{ $valuede }}" @if ($infos[0]->pays == $valuede) selected @endif>{{ $valuede }}</option>
                                      @endforeach
                                      @elseif(app()->getLocale() == 'es') 
                                      @foreach ($countrieses as $keyes => $valuees)
                                          <option value="{{ $valuees }}" @if ($infos[0]->pays == $valuees) selected @endif>{{ $valuees }}</option>
                                      @endforeach
                                      @elseif(app()->getLocale() == 'it') 
                                      @foreach ($countriesit as $keyit => $valueit)
                                          <option value="{{ $valueit }}" @if ($infos[0]->pays == $valueit) selected @endif>{{ $valueit }}</option>
                                      @endforeach
                                      @else
                                      @endif


                                    </select>

                                    <input name="state" id="state" type="text" placeholder=""
                                        class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400"
                                        value="{{ $infos[0]->pays ?? null }}">
                                </div>
                                <div class="col-span-full">
                                    <label for="" class="text-sm text-gray-300"> &nbsp;</label>
                                    <button type="submit"
                                        class="w-full px-2 py-2 text-white bg-blue-600 border-gray-700 rounded-md active:bg-blue-600 hover:bg-blue-400 focus:ring-opacity-75">{{__('Enregistrer')}}
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
