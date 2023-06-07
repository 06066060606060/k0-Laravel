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
    if(isset($scory->total)){
    $total1 = $scory->total;
    $totalite = $total1;
    } else {}
@endphp
@if(isset($scory->total))
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
                                <div class="col-span-full sm:col-span-2">
                                    <label for="state" class="text-sm text-gray-300">{{__('Pays')}}</label>
                                    <select id="state" name="state" class="w-full px-2 py-2 text-gray-900 border-gray-700 rounded-md focus:ring focus:ring-opacity-75 focus:ring-blue-400">
    @if(empty($info))
    <option value="" selected>{{__("Choisissez un pays")}}</option>
<option value="Afghanistan">{{__("Afghanistan")}}</option>
<option value="Afrique du Sud">{{__("Afrique du Sud")}}</option>
<option value="Albanie">{{__("Albanie")}}</option>
<option value="Algérie">{{__("Algérie")}}</option>
<option value="Allemagne">{{__("Allemagne")}}</option>
<option value="Andorre">{{__("Andorre")}}</option>
<option value="Angola">{{__("Angola")}}</option>
<option value="Antigua-et-Barbuda">{{__("Antigua-et-Barbuda")}}</option>
<option value="Arabie saoudite">{{__("Arabie saoudite")}}</option>
<option value="Argentine">{{__("Argentine")}}</option>
<option value="Arménie">{{__("Arménie")}}</option>
<option value="Australie">{{__("Australie")}}</option>
<option value="Autriche">{{__("Autriche")}}</option>
<option value="Azerbaïdjan">{{__("Azerbaïdjan")}}</option>
<option value="Bahamas">{{__("Bahamas")}}</option>
<option value="Bahreïn">{{__("Bahreïn")}}</option>
<option value="Bangladesh">{{__("Bangladesh")}}</option>
<option value="Barbade">{{__("Barbade")}}</option>
<option value="Belgique">{{__("Belgique")}}</option>
<option value="Bénin">{{__("Bénin")}}</option>
<option value="Bhoutan">{{__("Bhoutan")}}</option>
<option value="Biélorussie">{{__("Biélorussie")}}</option>
<option value="Birmanie">{{__("Birmanie")}}</option>
<option value="Bolivie">{{__("Bolivie")}}</option>
<option value="Bosnie-Herzégovine">{{__("Bosnie-Herzégovine")}}</option>
<option value="Botswana">{{__("Botswana")}}</option>
<option value="Brésil">{{__("Brésil")}}</option>
<option value="Brunei">{{__("Brunei")}}</option>
<option value="Bulgarie">{{__("Bulgarie")}}</option>
<option value="Burkina Faso">{{__("Burkina Faso")}}</option>
<option value="Burundi">{{__("Burundi")}}</option>
<option value="Cambodge">{{__("Cambodge")}}</option>
<option value="Cameroun">{{__("Cameroun")}}</option>
<option value="Canada">{{__("Canada")}}</option>
<option value="Cap-Vert">{{__("Cap-Vert")}}</option>
<option value="Centrafrique">{{__("Centrafrique")}}</option>
<option value="Chili">{{__("Chili")}}</option>
<option value="Chine">{{__("Chine")}}</option>
<option value="Chypre">{{__("Chypre")}}</option>
<option value="Colombie">{{__("Colombie")}}</option>
<option value="Comores">{{__("Comores")}}</option>
<option value="Congo-Brazzaville">{{__("Congo-Brazzaville")}}</option>
<option value="Congo-Kinshasa">{{__("Congo-Kinshasa")}}</option>
<option value="Corée du Nord">{{__("Corée du Nord")}}</option>
<option value="Corée du Sud">{{__("Corée du Sud")}}</option>
<option value="Costa Rica">{{__("Costa Rica")}}</option>
<option value="Côte d'Ivoire">{{__("Côte d'Ivoire")}}</option>
<option value="Croatie">{{__("Croatie")}}</option>
<option value="Cuba">{{__("Cuba")}}</option>
<option value="Danemark">{{__("Danemark")}}</option>
<option value="Djibouti">{{__("Djibouti")}}</option>
<option value="Dominique">{{__("Dominique")}}</option>
<option value="Égypte">{{__("Égypte")}}</option>
<option value="Émirats arabes unis">{{__("Émirats arabes unis")}}</option>
<option value="Équateur">{{__("Équateur")}}</option>
<option value="Érythrée">{{__("Érythrée")}}</option>
<option value="Espagne">{{__("Espagne")}}</option>
<option value="Estonie">{{__("Estonie")}}</option>
<option value="États-Unis">{{__("États-Unis")}}</option>
<option value="Éthiopie">{{__("Éthiopie")}}</option>
<option value="Fidji">{{__("Fidji")}}</option>
<option value="Finlande">{{__("Finlande")}}</option>
<option value="France">{{__("France")}}</option>
<option value="Gabon">{{__("Gabon")}}</option>
<option value="Gambie">{{__("Gambie")}}</option>
<option value="Géorgie">{{__("Géorgie")}}</option>
<option value="Ghana">{{__("Ghana")}}</option>
<option value="Grèce">{{__("Grèce")}}</option>
<option value="Grenade">{{__("Grenade")}}</option>
<option value="Guatemala">{{__("Guatemala")}}</option>
<option value="Guinée">{{__("Guinée")}}</option>
<option value="Guinée-Bissau">{{__("Guinée-Bissau")}}</option>
<option value="Guinée équatoriale">{{__("Guinée équatoriale")}}</option>
<option value="Guyana">{{__("Guyana")}}</option>
<option value="Haïti">{{__("Haïti")}}</option>
<option value="Honduras">{{__("Honduras")}}</option>
<option value="Hongrie">{{__("Hongrie")}}</option>
<option value="Îles Cook">{{__("Îles Cook")}}</option>
<option value="Îles Marshall">{{__("Îles Marshall")}}</option>
<option value="Îles Salomon">{{__("Îles Salomon")}}</option>
<option value="Inde">{{__("Inde")}}</option>
<option value="Indonésie">{{__("Indonésie")}}</option>
<option value="Iran">{{__("Iran")}}</option>
<option value="Iraq">{{__("Iraq")}}</option>
<option value="Irlande">{{__("Irlande")}}</option>
<option value="Islande">{{__("Islande")}}</option>
<option value="Israël">{{__("Israël")}}</option>
<option value="Italie">{{__("Italie")}}</option>
<option value="Jamaïque">{{__("Jamaïque")}}</option>
<option value="Japon">{{__("Japon")}}</option>
<option value="Jordanie">{{__("Jordanie")}}</option>
<option value="Kazakhstan">{{__("Kazakhstan")}}</option>
<option value="Kenya">{{__("Kenya")}}</option>
<option value="Kirghizistan">{{__("Kirghizistan")}}</option>
<option value="Kiribati">{{__("Kiribati")}}</option>
<option value="Koweït">{{__("Koweït")}}</option>
<option value="Laos">{{__("Laos")}}</option>
<option value="Lesotho">{{__("Lesotho")}}</option>
<option value="Lettonie">{{__("Lettonie")}}</option>
<option value="Liban">{{__("Liban")}}</option>
<option value="Liberia">{{__("Liberia")}}</option>
<option value="Libye">{{__("Libye")}}</option>
<option value="Liechtenstein">{{__("Liechtenstein")}}</option>
<option value="Lituanie">{{__("Lituanie")}}</option>
<option value="Luxembourg">{{__("Luxembourg")}}</option>
<option value="Macédoine du Nord">{{__("Macédoine du Nord")}}</option>
<option value="Madagascar">{{__("Madagascar")}}</option>
<option value="Malaisie">{{__("Malaisie")}}</option>
<option value="Malawi">{{__("Malawi")}}</option>
<option value="Maldives">{{__("Maldives")}}</option>
<option value="Mali">{{__("Mali")}}</option>
<option value="Malte">{{__("Malte")}}</option>
<option value="Maroc">{{__("Maroc")}}</option>
<option value="Maurice">{{__("Maurice")}}</option>
<option value="Mauritanie">{{__("Mauritanie")}}</option>
<option value="Mexique">{{__("Mexique")}}</option>
<option value="Micronésie">{{__("Micronésie")}}</option>
<option value="Moldavie">{{__("Moldavie")}}</option>
<option value="Monaco">{{__("Monaco")}}</option>
<option value="Mongolie">{{__("Mongolie")}}</option>
<option value="Monténégro">{{__("Monténégro")}}</option>
<option value="Mozambique">{{__("Mozambique")}}</option>
<option value="Namibie">{{__("Namibie")}}</option>
<option value="Nauru">{{__("Nauru")}}</option>
<option value="Népal">{{__("Népal")}}</option>
<option value="Nicaragua">{{__("Nicaragua")}}</option>
<option value="Niger">{{__("Niger")}}</option>
<option value="Nigeria">{{__("Nigeria")}}</option>
<option value="Niue">{{__("Niue")}}</option>
<option value="Norvège">{{__("Norvège")}}</option>
<option value="Nouvelle-Zélande">{{__("Nouvelle-Zélande")}}</option>
<option value="Oman">{{__("Oman")}}</option>
<option value="Ouganda">{{__("Ouganda")}}</option>
<option value="Ouzbékistan">{{__("Ouzbékistan")}}</option>
<option value="Pakistan">{{__("Pakistan")}}</option>
<option value="Palaos">{{__("Palaos")}}</option>
<option value="Palestine">{{__("Palestine")}}</option>
<option value="Panama">{{__("Panama")}}</option>
<option value="Papouasie-Nouvelle-Guinée">{{__("Papouasie-Nouvelle-Guinée")}}</option>
<option value="Paraguay">{{__("Paraguay")}}</option>
<option value="Pays-Bas">{{__("Pays-Bas")}}</option>
<option value="Pérou">{{__("Pérou")}}</option>
<option value="Philippines">{{__("Philippines")}}</option>
<option value="Pologne">{{__("Pologne")}}</option>
<option value="Portugal">{{__("Portugal")}}</option>
<option value="Qatar">{{__("Qatar")}}</option>
<option value="République centrafricaine">{{__("République centrafricaine")}}</option>
<option value="République dominicaine">{{__("République dominicaine")}}</option>
<option value="République tchèque">{{__("République tchèque")}}</option>
<option value="Roumanie">{{__("Roumanie")}}</option>
<option value="Royaume-Uni">{{__("Royaume-Uni")}}</option>
<option value="Russie">{{__("Russie")}}</option>
<option value="Rwanda">{{__("Rwanda")}}</option>
<option value="Saint-Christophe-et-Niévès">{{__("Saint-Christophe-et-Niévès")}}</option>
<option value="Saint-Marin">{{__("Saint-Marin")}}</option>
<option value="Saint-Vincent-et-les-Grenadines">{{__("Saint-Vincent-et-les-Grenadines")}}</option>
<option value="Sainte-Lucie">{{__("Sainte-Lucie")}}</option>
<option value="Salvador">{{__("Salvador")}}</option>
<option value="Samoa">{{__("Samoa")}}</option>
<option value="São Tomé-et-Principe">{{__("São Tomé-et-Principe")}}</option>
<option value="Sénégal">{{__("Sénégal")}}</option>
<option value="Serbie">{{__("Serbie")}}</option>
<option value="Seychelles">{{__("Seychelles")}}</option>
<option value="Sierra Leone">{{__("Sierra Leone")}}</option>
<option value="Singapour">{{__("Singapour")}}</option>
<option value="Slovaquie">{{__("Slovaquie")}}</option>
<option value="Slovénie">{{__("Slovénie")}}</option>
<option value="Somalie">{{__("Somalie")}}</option>
<option value="Soudan">{{__("Soudan")}}</option>
<option value="Soudan du Sud">{{__("Soudan du Sud")}}</option>
<option value="Sri Lanka">{{__("Sri Lanka")}}</option>
<option value="Suède">{{__("Suède")}}</option>
<option value="Suisse">{{__("Suisse")}}</option>
<option value="Suriname">{{__("Suriname")}}</option>
<option value="Swaziland">{{__("Swaziland")}}</option>
<option value="Syrie">{{__("Syrie")}}</option>
<option value="Tadjikistan">{{__("Tadjikistan")}}</option>
<option value="Tanzanie">{{__("Tanzanie")}}</option>
<option value="Tchad">{{__("Tchad")}}</option>
<option value="Thaïlande">{{__("Thaïlande")}}</option>
<option value="Timor oriental">{{__("Timor oriental")}}</option>
<option value="Togo">{{__("Togo")}}</option>
<option value="Tonga">{{__("Tonga")}}</option>
<option value="Trinité-et-Tobago">{{__("Trinité-et-Tobago")}}</option>
<option value="Tunisie">{{__("Tunisie")}}</option>
<option value="Turkménistan">{{__("Turkménistan")}}</option>
<option value="Turquie">{{__("Turquie")}}</option>
<option value="Tuvalu">{{__("Tuvalu")}}</option>
<option value="Ukraine">{{__("Ukraine")}}</option>
<option value="Uruguay">{{__("Uruguay")}}</option>
<option value="Vanuatu">{{__("Vanuatu")}}</option>
<option value="Vatican">{{__("Vatican")}}</option>
<option value="Venezuela">{{__("Venezuela")}}</option>
<option value="Viêt Nam">{{__("Viêt Nam")}}</option>
<option value="Yémen">{{__("Yémen")}}</option>
<option value="Zambie">{{__("Zambie")}}</option>
<option value="Zimbabwe">{{__("Zimbabwe")}}</option>
@else
    <option value="" {{ $infos[0]->pays == NULL ? 'selected' : '' }}>{{__("Choisissez un pays")}}</option>                     
    <option value="Afghanistan" {{ $infos[0]->pays == 'Afghanistan' ? 'selected' : '' }}>{{__("Afghanistan")}}</option> 
    <option value="Afrique du Sud" {{ $infos[0]->pays == 'Afrique du Sud' ? 'selected' : '' }}>{{__("Afrique du Sud")}}</option>
    <option value="Albanie" {{ $infos[0]->pays == 'Albanie' ? 'selected' : '' }}>{{__("Albanie")}}</option>
    <option value="Algérie" {{ $infos[0]->pays == 'Algérie' ? 'selected' : '' }}>{{__("Algérie")}}</option>
    <option value="Allemagne" {{ $infos[0]->pays == 'Allemagne' ? 'selected' : '' }}>{{__("Allemagne")}}</option>
    <option value="Andorre" {{ $infos[0]->pays == 'Andorre' ? 'selected' : '' }}>{{__("Andorre")}}</option>
    <option value="Angola" {{ $infos[0]->pays == 'Angola' ? 'selected' : '' }}>{{__("Angola")}}</option>
    <option value="Antigua-et-Barbuda" {{ $infos[0]->pays == 'Antigua-et-Barbuda' ? 'selected' : '' }}>{{__("Antigua-et-Barbuda")}}</option>
    <option value="Arabie saoudite" {{ $infos[0]->pays == 'Arabie saoudite' ? 'selected' : '' }}>{{__("Arabie saoudite")}}</option>
    <option value="Argentine" {{ $infos[0]->pays == 'Argentine' ? 'selected' : '' }}>{{__("Argentine")}}</option>
    <option value="Arménie" {{ $infos[0]->pays == 'Arménie' ? 'selected' : '' }}>{{__("Arménie")}}</option>
    <option value="Australie" {{ $infos[0]->pays == 'Australie' ? 'selected' : '' }}>{{__("Australie")}}</option>
    <option value="Autriche" {{ $infos[0]->pays == 'Autriche' ? 'selected' : '' }}>{{__("Autriche")}}</option>
    <option value="Azerbaïdjan" {{ $infos[0]->pays == 'Azerbaïdjan' ? 'selected' : '' }}>{{__("Azerbaïdjan")}}</option>
    <option value="Bahamas" {{ $infos[0]->pays == 'Bahamas' ? 'selected' : '' }}>{{__("Bahamas")}}</option>
    <option value="Bahreïn" {{ $infos[0]->pays == 'Bahreïn' ? 'selected' : '' }}>{{__("Bahreïn")}}</option>
    <option value="Bangladesh" {{ $infos[0]->pays == 'Bangladesh' ? 'selected' : '' }}>{{__("Bangladesh")}}</option>
    <option value="Barbade" {{ $infos[0]->pays == 'Barbade' ? 'selected' : '' }}>{{__("Barbade")}}</option>
    <option value="Belgique" {{ $infos[0]->pays == 'Belgique' ? 'selected' : '' }}>{{__("Belgique")}}</option>
    <option value="Bénin" {{ $infos[0]->pays == 'Bénin' ? 'selected' : '' }}>{{__("Bénin")}}</option>
    <option value="Bhoutan" {{ $infos[0]->pays == 'Bhoutan' ? 'selected' : '' }}>{{__("Bhoutan")}}</option>
    <option value="Biélorussie" {{ $infos[0]->pays == 'Biélorussie' ? 'selected' : '' }}>{{__("Biélorussie")}}</option>
    <option value="Birmanie" {{ $infos[0]->pays == 'Birmanie' ? 'selected' : '' }}>{{__("Birmanie")}}</option>
    <option value="Bolivie" {{ $infos[0]->pays == 'Bolivie' ? 'selected' : '' }}>{{__("Bolivie")}}</option>
    <option value="Bosnie-Herzégovine" {{ $infos[0]->pays == 'Bosnie-Herzégovine' ? 'selected' : '' }}>{{__("Bosnie-Herzégovine")}}</option>
    <option value="Botswana" {{ $infos[0]->pays == 'Botswana' ? 'selected' : '' }}>{{__("Botswana")}}</option>
    <option value="Brésil" {{ $infos[0]->pays == 'Brésil' ? 'selected' : '' }}>{{__("Brésil")}}</option>
    <option value="Brunei" {{ $infos[0]->pays == 'Brunei' ? 'selected' : '' }}>{{__("Brunei")}}</option>
    <option value="Bulgarie" {{ $infos[0]->pays == 'Bulgarie' ? 'selected' : '' }}>{{__("Bulgarie")}}</option>
    <option value="Burkina Faso" {{ $infos[0]->pays == 'Burkina Faso' ? 'selected' : '' }}>{{__("Burkina Faso")}}</option>
    <option value="Burundi" {{ $infos[0]->pays == 'Burundi' ? 'selected' : '' }}>{{__("Burundi")}}</option>
    <option value="Cambodge" {{ $infos[0]->pays == 'Cambodge' ? 'selected' : '' }}>{{__("Cambodge")}}</option>
    <option value="Cameroun" {{ $infos[0]->pays == 'Cameroun' ? 'selected' : '' }}>{{__("Cameroun")}}</option>
    <option value="Canada" {{ $infos[0]->pays == 'Canada' ? 'selected' : '' }}>{{__("Canada")}}</option>
    <option value="Cap-Vert" {{ $infos[0]->pays == 'Cap-Vert' ? 'selected' : '' }}>{{__("Cap-Vert")}}</option>
    <option value="Centrafrique" {{ $infos[0]->pays == 'Centrafrique' ? 'selected' : '' }}>{{__("Centrafrique")}}</option>
    <option value="Chili" {{ $infos[0]->pays == 'Chili' ? 'selected' : '' }}>{{__("Chili")}}</option>
    <option value="Chine" {{ $infos[0]->pays == 'Chine' ? 'selected' : '' }}>{{__("Chine")}}</option>
    <option value="Chypre" {{ $infos[0]->pays == 'Chypre' ? 'selected' : '' }}>{{__("Chypre")}}</option>
    <option value="Colombie" {{ $infos[0]->pays == 'Colombie' ? 'selected' : '' }}>{{__("Colombie")}}</option>
    <option value="Comores" {{ $infos[0]->pays == 'Comores' ? 'selected' : '' }}>{{__("Comores")}}</option>
    <option value="Congo-Brazzaville" {{ $infos[0]->pays == 'Congo-Brazzaville' ? 'selected' : '' }}>{{__("Congo-Brazzaville")}}</option>
    <option value="Congo-Kinshasa" {{ $infos[0]->pays == 'Congo-Kinshasa' ? 'selected' : '' }}>{{__("Congo-Kinshasa")}}</option>
    <option value="Corée du Nord" {{ $infos[0]->pays == 'Corée du Nord' ? 'selected' : '' }}>{{__("Corée du Nord")}}</option>
    <option value="Corée du Sud" {{ $infos[0]->pays == 'Corée du Sud' ? 'selected' : '' }}>{{__("Corée du Sud")}}</option>
    <option value="Costa Rica" {{ $infos[0]->pays == 'Costa Rica' ? 'selected' : '' }}>{{__("Costa Rica")}}</option>
    <option value="Côte d'Ivoire" {{ $infos[0]->pays == "Côte d'Ivoire" ? 'selected' : '' }}>{{__("Côte d'Ivoire")}}</option>
    <option value="Croatie" {{ $infos[0]->pays == 'Croatie' ? 'selected' : '' }}>{{__("Croatie")}}</option>
    <option value="Cuba" {{ $infos[0]->pays == 'Cuba' ? 'selected' : '' }}>{{__("Cuba")}}</option>
    <option value="Danemark" {{ $infos[0]->pays == 'Danemark' ? 'selected' : '' }}>{{__("Danemark")}}</option>
    <option value="Djibouti" {{ $infos[0]->pays == 'Djibouti' ? 'selected' : '' }}>{{__("Djibouti")}}</option>
    <option value="Dominique" {{ $infos[0]->pays == 'Dominique' ? 'selected' : '' }}>{{__("Dominique")}}</option>
    <option value="Égypte" {{ $infos[0]->pays == 'Égypte' ? 'selected' : '' }}>{{__("Égypte")}}</option>
    <option value="Émirats arabes unis" {{ $infos[0]->pays == 'Émirats arabes unis' ? 'selected' : '' }}>{{__("Émirats arabes unis")}}</option>
    <option value="Équateur" {{ $infos[0]->pays == 'Équateur' ? 'selected' : '' }}>{{__("Équateur")}}</option>
    <option value="Érythrée" {{ $infos[0]->pays == 'Érythrée' ? 'selected' : '' }}>{{__("Érythrée")}}</option>
    <option value="Espagne" {{ $infos[0]->pays == 'Espagne' ? 'selected' : '' }}>{{__("Espagne")}}</option>
    <option value="Estonie" {{ $infos[0]->pays == 'Estonie' ? 'selected' : '' }}>{{__("Estonie")}}</option>
    <option value="États-Unis" {{ $infos[0]->pays == 'États-Unis' ? 'selected' : '' }}>{{__("États-Unis")}}</option>
    <option value="Éthiopie" {{ $infos[0]->pays == 'Éthiopie' ? 'selected' : '' }}>{{__("Éthiopie")}}</option>
    <option value="Fidji" {{ $infos[0]->pays == 'Fidji' ? 'selected' : '' }}>{{__("Fidji")}}</option>
    <option value="Finlande" {{ $infos[0]->pays == 'Finlande' ? 'selected' : '' }}>{{__("Finlande")}}</option>
    <option value="France" {{ $infos[0]->pays == 'France' ? 'selected' : '' }}>{{__("France")}}</option>
    <option value="Gabon" {{ $infos[0]->pays == 'Gabon' ? 'selected' : '' }}>{{__("Gabon")}}</option>
    <option value="Gambie" {{ $infos[0]->pays == 'Gambie' ? 'selected' : '' }}>{{__("Gambie")}}</option>
    <option value="Géorgie" {{ $infos[0]->pays == 'Géorgie' ? 'selected' : '' }}>{{__("Géorgie")}}</option>
    <option value="Ghana" {{ $infos[0]->pays == 'Ghana' ? 'selected' : '' }}>{{__("Ghana")}}</option>
    <option value="Grèce" {{ $infos[0]->pays == 'Grèce' ? 'selected' : '' }}>{{__("Grèce")}}</option>
    <option value="Grenade" {{ $infos[0]->pays == 'Grenade' ? 'selected' : '' }}>{{__("Grenade")}}</option>
    <option value="Guatemala" {{ $infos[0]->pays == 'Guatemala' ? 'selected' : '' }}>{{__("Guatemala")}}</option>
    <option value="Guinée" {{ $infos[0]->pays == 'Guinée' ? 'selected' : '' }}>{{__("Guinée")}}</option>
    <option value="Guinée-Bissau" {{ $infos[0]->pays == 'Guinée-Bissau' ? 'selected' : '' }}>{{__("Guinée-Bissau")}}</option>
    <option value="Guinée équatoriale" {{ $infos[0]->pays == 'Guinée équatoriale' ? 'selected' : '' }}>{{__("Guinée équatoriale")}}</option>
    <option value="Guyana" {{ $infos[0]->pays == 'Guyana' ? 'selected' : '' }}>{{__("Guyana")}}</option>
    <option value="Haïti" {{ $infos[0]->pays == 'Haïti' ? 'selected' : '' }}>{{__("Haïti")}}</option>
    <option value="Honduras" {{ $infos[0]->pays == 'Honduras' ? 'selected' : '' }}>{{__("Honduras")}}</option>
    <option value="Hongrie" {{ $infos[0]->pays == 'Hongrie' ? 'selected' : '' }}>{{__("Hongrie")}}</option>
    <option value="Îles Cook" {{ $infos[0]->pays == 'Îles Cook' ? 'selected' : '' }}>{{__("Îles Cook")}}</option>
    <option value="Îles Marshall" {{ $infos[0]->pays == 'Îles Marshall' ? 'selected' : '' }}>{{__("Îles Marshall")}}</option>
    <option value="Îles Salomon" {{ $infos[0]->pays == 'Îles Salomon' ? 'selected' : '' }}>{{__("Îles Salomon")}}</option>
    <option value="Inde" {{ $infos[0]->pays == 'Inde' ? 'selected' : '' }}>{{__("Inde")}}</option>
    <option value="Indonésie" {{ $infos[0]->pays == 'Indonésie' ? 'selected' : '' }}>{{__("Indonésie")}}</option>
    <option value="Iran" {{ $infos[0]->pays == 'Iran' ? 'selected' : '' }}>{{__("Iran")}}</option>
    <option value="Iraq" {{ $infos[0]->pays == 'Iraq' ? 'selected' : '' }}>{{__("Iraq")}}</option>
    <option value="Irlande" {{ $infos[0]->pays == 'Irlande' ? 'selected' : '' }}>{{__("Irlande")}}</option>
    <option value="Islande" {{ $infos[0]->pays == 'Islande' ? 'selected' : '' }}>{{__("Islande")}}</option>
    <option value="Israël" {{ $infos[0]->pays == 'Israël' ? 'selected' : '' }}>{{__("Israël")}}</option>
    <option value="Italie" {{ $infos[0]->pays == 'Italie' ? 'selected' : '' }}>{{__("Italie")}}</option>
    <option value="Jamaïque" {{ $infos[0]->pays == 'Jamaïque' ? 'selected' : '' }}>{{__("Jamaïque")}}</option>
    <option value="Japon" {{ $infos[0]->pays == 'Japon' ? 'selected' : '' }}>{{__("Japon")}}</option>
    <option value="Jordanie" {{ $infos[0]->pays == 'Jordanie' ? 'selected' : '' }}>{{__("Jordanie")}}</option>
    <option value="Kazakhstan" {{ $infos[0]->pays == 'Kazakhstan' ? 'selected' : '' }}>{{__("Kazakhstan")}}</option>
    <option value="Kenya" {{ $infos[0]->pays == 'Kenya' ? 'selected' : '' }}>{{__("Kenya")}}</option>
    <option value="Kirghizistan" {{ $infos[0]->pays == 'Kirghizistan' ? 'selected' : '' }}>{{__("Kirghizistan")}}</option>
    <option value="Kiribati" {{ $infos[0]->pays == 'Kiribati' ? 'selected' : '' }}>{{__("Kiribati")}}</option>
    <option value="Koweït" {{ $infos[0]->pays == 'Koweït' ? 'selected' : '' }}>{{__("Koweït")}}</option>
    <option value="Laos" {{ $infos[0]->pays == 'Laos' ? 'selected' : '' }}>{{__("Laos")}}</option>
    <option value="Lesotho" {{ $infos[0]->pays == 'Lesotho' ? 'selected' : '' }}>{{__("Lesotho")}}</option>
    <option value="Lettonie" {{ $infos[0]->pays == 'Lettonie' ? 'selected' : '' }}>{{__("Lettonie")}}</option>
    <option value="Liban" {{ $infos[0]->pays == 'Liban' ? 'selected' : '' }}>{{__("Liban")}}</option>
    <option value="Libéria" {{ $infos[0]->pays == 'Libéria' ? 'selected' : '' }}>{{__("Libéria")}}</option>
    <option value="Libye" {{ $infos[0]->pays == 'Libye' ? 'selected' : '' }}>{{__("Libye")}}</option>
    <option value="Liechtenstein" {{ $infos[0]->pays == 'Liechtenstein' ? 'selected' : '' }}>{{__("Liechtenstein")}}</option>
    <option value="Lituanie" {{ $infos[0]->pays == 'Lituanie' ? 'selected' : '' }}>{{__("Lituanie")}}</option>
    <option value="Luxembourg" {{ $infos[0]->pays == 'Luxembourg' ? 'selected' : '' }}>{{__("Luxembourg")}}</option>
    <option value="Macédoine du Nord" {{ $infos[0]->pays == 'Macédoine du Nord' ? 'selected' : '' }}>{{__("Macédoine du Nord")}}</option>
    <option value="Madagascar" {{ $infos[0]->pays == 'Madagascar' ? 'selected' : '' }}>{{__("Madagascar")}}</option>
    <option value="Malaisie" {{ $infos[0]->pays == 'Malaisie' ? 'selected' : '' }}>{{__("Malaisie")}}</option>
    <option value="Malawi" {{ $infos[0]->pays == 'Malawi' ? 'selected' : '' }}>{{__("Malawi")}}</option>
    <option value="Maldives" {{ $infos[0]->pays == 'Maldives' ? 'selected' : '' }}>{{__("Maldives")}}</option>
    <option value="Mali" {{ $infos[0]->pays == 'Mali' ? 'selected' : '' }}>{{__("Mali")}}</option>
    <option value="Malte" {{ $infos[0]->pays == 'Malte' ? 'selected' : '' }}>{{__("Malte")}}</option>
    <option value="Maroc" {{ $infos[0]->pays == 'Maroc' ? 'selected' : '' }}>{{__("Maroc")}}</option>
    <option value="Maurice" {{ $infos[0]->pays == 'Maurice' ? 'selected' : '' }}>{{__("Maurice")}}</option>
    <option value="Mauritanie" {{ $infos[0]->pays == 'Mauritanie' ? 'selected' : '' }}>{{__("Mauritanie")}}</option>
    <option value="Mexique" {{ $infos[0]->pays == 'Mexique' ? 'selected' : '' }}>{{__("Mexique")}}</option>
    <option value="Micronésie" {{ $infos[0]->pays == 'Micronésie' ? 'selected' : '' }}>{{__("Micronésie")}}</option>
    <option value="Moldavie" {{ $infos[0]->pays == 'Moldavie' ? 'selected' : '' }}>{{__("Moldavie")}}</option>
    <option value="Monaco" {{ $infos[0]->pays == 'Monaco' ? 'selected' : '' }}>{{__("Monaco")}}</option>
    <option value="Mongolie" {{ $infos[0]->pays == 'Mongolie' ? 'selected' : '' }}>{{__("Mongolie")}}</option>
    <option value="Monténégro" {{ $infos[0]->pays == 'Monténégro' ? 'selected' : '' }}>{{__("Monténégro")}}</option>
    <option value="Mozambique" {{ $infos[0]->pays == 'Mozambique' ? 'selected' : '' }}>{{__("Mozambique")}}</option>
    <option value="Namibie" {{ $infos[0]->pays == 'Namibie' ? 'selected' : '' }}>{{__("Namibie")}}</option>
    <option value="Nauru" {{ $infos[0]->pays == 'Nauru' ? 'selected' : '' }}>{{__("Nauru")}}</option>
    <option value="Népal" {{ $infos[0]->pays == 'Népal' ? 'selected' : '' }}>{{__("Népal")}}</option>
    <option value="Nicaragua" {{ $infos[0]->pays == 'Nicaragua' ? 'selected' : '' }}>{{__("Nicaragua")}}</option>
    <option value="Niger" {{ $infos[0]->pays == 'Niger' ? 'selected' : '' }}>{{__("Niger")}}</option>
    <option value="Nigeria" {{ $infos[0]->pays == 'Nigeria' ? 'selected' : '' }}>{{__("Nigeria")}}</option>
    <option value="Niue" {{ $infos[0]->pays == 'Niue' ? 'selected' : '' }}>{{__("Niue")}}</option>
    <option value="Norvège" {{ $infos[0]->pays == 'Norvège' ? 'selected' : '' }}>{{__("Norvège")}}</option>
    <option value="Nouvelle-Zélande" {{ $infos[0]->pays == 'Nouvelle-Zélande' ? 'selected' : '' }}>{{__("Nouvelle-Zélande")}}</option>
    <option value="Oman" {{ $infos[0]->pays == 'Oman' ? 'selected' : '' }}>{{__("Oman")}}</option>
    <option value="Ouganda" {{ $infos[0]->pays == 'Ouganda' ? 'selected' : '' }}>{{__("Ouganda")}}</option>
    <option value="Ouzbékistan" {{ $infos[0]->pays == 'Ouzbékistan' ? 'selected' : '' }}>{{__("Ouzbékistan")}}</option>
    <option value="Pakistan" {{ $infos[0]->pays == 'Pakistan' ? 'selected' : '' }}>{{__("Pakistan")}}</option>
    <option value="Palaos" {{ $infos[0]->pays == 'Palaos' ? 'selected' : '' }}>{{__("Palaos")}}</option>
    <option value="Palestine" {{ $infos[0]->pays == 'Palestine' ? 'selected' : '' }}>{{__("Palestine")}}</option>
    <option value="Panama" {{ $infos[0]->pays == 'Panama' ? 'selected' : '' }}>{{__("Panama")}}</option>
    <option value="Papouasie-Nouvelle-Guinée" {{ $infos[0]->pays == 'Papouasie-Nouvelle-Guinée' ? 'selected' : '' }}>{{__("Papouasie-Nouvelle-Guinée")}}</option>
    <option value="Paraguay" {{ $infos[0]->pays == 'Paraguay' ? 'selected' : '' }}>{{__("Paraguay")}}</option>
    <option value="Pays-Bas" {{ $infos[0]->pays == 'Pays-Bas' ? 'selected' : '' }}>{{__("Pays-Bas")}}</option>
    <option value="Pérou" {{ $infos[0]->pays == 'Pérou' ? 'selected' : '' }}>{{__("Pérou")}}</option>
    <option value="Philippines" {{ $infos[0]->pays == 'Philippines' ? 'selected' : '' }}>{{__("Philippines")}}</option>
    <option value="Pologne" {{ $infos[0]->pays == 'Pologne' ? 'selected' : '' }}>{{__("Pologne")}}</option>
    <option value="Portugal" {{ $infos[0]->pays == 'Portugal' ? 'selected' : '' }}>{{__("Portugal")}}</option>
    <option value="Qatar" {{ $infos[0]->pays == 'Qatar' ? 'selected' : '' }}>{{__("Qatar")}}</option>
    <option value="République centrafricaine" {{ $infos[0]->pays == 'République centrafricaine' ? 'selected' : '' }}>{{__("République centrafricaine")}}</option>
    <option value="République démocratique du Congo" {{ $infos[0]->pays == 'République démocratique du Congo' ? 'selected' : '' }}>{{__("République démocratique du Congo")}}</option>
    <option value="République dominicaine" {{ $infos[0]->pays == 'République dominicaine' ? 'selected' : '' }}>{{__("République dominicaine")}}</option>
    <option value="République du Congo" {{ $infos[0]->pays == 'République du Congo' ? 'selected' : '' }}>{{__("République du Congo")}}</option>
    <option value="République tchèque" {{ $infos[0]->pays == 'République tchèque' ? 'selected' : '' }}>{{__("République tchèque")}}</option>
    <option value="Roumanie" {{ $infos[0]->pays == 'Roumanie' ? 'selected' : '' }}>{{__("Roumanie")}}</option>
    <option value="Royaume-Uni" {{ $infos[0]->pays == 'Royaume-Uni' ? 'selected' : '' }}>{{__("Royaume-Uni")}}</option>
    <option value="Russie" {{ $infos[0]->pays == 'Russie' ? 'selected' : '' }}>{{__("Russie")}}</option>
    <option value="Rwanda" {{ $infos[0]->pays == 'Rwanda' ? 'selected' : '' }}>{{__("Rwanda")}}</option>
    <option value="Saint-Christophe-et-Niévès" {{ $infos[0]->pays == 'Saint-Christophe-et-Niévès' ? 'selected' : '' }}>{{__("Saint-Christophe-et-Niévès")}}</option>
    <option value="Sainte-Lucie" {{ $infos[0]->pays == 'Sainte-Lucie' ? 'selected' : '' }}>{{__("Sainte-Lucie")}}</option>
    <option value="Saint-Marin" {{ $infos[0]->pays == 'Saint-Marin' ? 'selected' : '' }}>{{__("Saint-Marin")}}</option>
    <option value="Saint-Siège" {{ $infos[0]->pays == 'Saint-Siège' ? 'selected' : '' }}>{{__("Saint-Siège")}}</option>
    <option value="Saint-Vincent-et-les-Grenadines" {{ $infos[0]->pays == 'Saint-Vincent-et-les-Grenadines' ? 'selected' : '' }}>{{__("Saint-Vincent-et-les-Grenadines")}}</option>
    <option value="Salvador" {{ $infos[0]->pays == 'Salvador' ? 'selected' : '' }}>{{__("Salvador")}}</option>
    <option value="Samoa" {{ $infos[0]->pays == 'Samoa' ? 'selected' : '' }}>{{__("Samoa")}}</option>
    <option value="Sao Tomé-et-Principe" {{ $infos[0]->pays == 'Sao Tomé-et-Principe' ? 'selected' : '' }}>{{__("Sao Tomé-et-Principe")}}</option>
    <option value="Sénégal" {{ $infos[0]->pays == 'Sénégal' ? 'selected' : '' }}>{{__("Sénégal")}}</option>
    <option value="Serbie" {{ $infos[0]->pays == 'Serbie' ? 'selected' : '' }}>{{__("Serbie")}}</option>
    <option value="Seychelles" {{ $infos[0]->pays == 'Seychelles' ? 'selected' : '' }}>{{__("Seychelles")}}</option>
    <option value="Sierra Leone" {{ $infos[0]->pays == 'Sierra Leone' ? 'selected' : '' }}>{{__("Sierra Leone")}}</option>
    <option value="Singapour" {{ $infos[0]->pays == 'Singapour' ? 'selected' : '' }}>{{__("Singapour")}}</option>
    <option value="Slovaquie" {{ $infos[0]->pays == 'Slovaquie' ? 'selected' : '' }}>{{__("Slovaquie")}}</option>
    <option value="Slovénie" {{ $infos[0]->pays == 'Slovénie' ? 'selected' : '' }}>{{__("Slovénie")}}</option>
    <option value="Somalie" {{ $infos[0]->pays == 'Somalie' ? 'selected' : '' }}>{{__("Somalie")}}</option>
    <option value="Soudan" {{ $infos[0]->pays == 'Soudan' ? 'selected' : '' }}>{{__("Soudan")}}</option>
    <option value="Soudan du Sud" {{ $infos[0]->pays == 'Soudan du Sud' ? 'selected' : '' }}>{{__("Soudan du Sud")}}</option>
    <option value="Sri Lanka" {{ $infos[0]->pays == 'Sri Lanka' ? 'selected' : '' }}>{{__("Sri Lanka")}}</option>
    <option value="Suède" {{ $infos[0]->pays == 'Suède' ? 'selected' : '' }}>{{__("Suède")}}</option>
    <option value="Suisse" {{ $infos[0]->pays == 'Suisse' ? 'selected' : '' }}>{{__("Suisse")}}</option>
    <option value="Suriname" {{ $infos[0]->pays == 'Suriname' ? 'selected' : '' }}>{{__("Suriname")}}</option>
    <option value="Swaziland" {{ $infos[0]->pays == 'Swaziland' ? 'selected' : '' }}>{{__("Swaziland")}}</option>
    <option value="Syrie" {{ $infos[0]->pays == 'Syrie' ? 'selected' : '' }}>{{__("Syrie")}}</option>
    <option value="Tadjikistan" {{ $infos[0]->pays == 'Tadjikistan' ? 'selected' : '' }}>{{__("Tadjikistan")}}</option>
    <option value="Tanzanie" {{ $infos[0]->pays == 'Tanzanie' ? 'selected' : '' }}>{{__("Tanzanie")}}</option>
    <option value="Tchad" {{ $infos[0]->pays == 'Tchad' ? 'selected' : '' }}>{{__("Tchad")}}</option>
    <option value="Thaïlande" {{ $infos[0]->pays == 'Thaïlande' ? 'selected' : '' }}>{{__("Thaïlande")}}</option>
    <option value="Timor oriental" {{ $infos[0]->pays == 'Timor oriental' ? 'selected' : '' }}>{{__("Timor oriental")}}</option>
    <option value="Togo" {{ $infos[0]->pays == 'Togo' ? 'selected' : '' }}>{{__("Togo")}}</option>
    <option value="Tonga" {{ $infos[0]->pays == 'Tonga' ? 'selected' : '' }}>{{__("Tonga")}}</option>
    <option value="Trinité-et-Tobago" {{ $infos[0]->pays == 'Trinité-et-Tobago' ? 'selected' : '' }}>{{__("Trinité-et-Tobago")}}</option>
    <option value="Tunisie" {{ $infos[0]->pays == 'Tunisie' ? 'selected' : '' }}>{{__("Tunisie")}}</option>
    <option value="Turkménistan" {{ $infos[0]->pays == 'Turkménistan' ? 'selected' : '' }}>{{__("Turkménistan")}}</option>
    <option value="Turquie" {{ $infos[0]->pays == 'Turquie' ? 'selected' : '' }}>{{__("Turquie")}}</option>
    <option value="Tuvalu" {{ $infos[0]->pays == 'Tuvalu' ? 'selected' : '' }}>{{__("Tuvalu")}}</option>
    <option value="Ukraine" {{ $infos[0]->pays == 'Ukraine' ? 'selected' : '' }}>{{__("Ukraine")}}</option>
    <option value="Uruguay" {{ $infos[0]->pays == 'Uruguay' ? 'selected' : '' }}>{{__("Uruguay")}}</option>
    <option value="Vanuatu" {{ $infos[0]->pays == 'Vanuatu' ? 'selected' : '' }}>{{__("Vanuatu")}}</option>
    <option value="Venezuela" {{ $infos[0]->pays == 'Venezuela' ? 'selected' : '' }}>{{__("Venezuela")}}</option>
    <option value="Viêt Nam" {{ $infos[0]->pays == 'Viêt Nam' ? 'selected' : '' }}>{{__("Viêt Nam")}}</option>
    <option value="Yémen" {{ $infos[0]->pays == 'Yémen' ? 'selected' : '' }}>{{__("Yémen")}}</option>
    <option value="Zambie" {{ $infos[0]->pays == 'Zambie' ? 'selected' : '' }}>{{__("Zambie")}}</option>
    <option value="Zimbabwe" {{ $infos[0]->pays == 'Zimbabwe' ? 'selected' : '' }}>{{__("Zimbabwe")}}</option>
@endif
</select>

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
