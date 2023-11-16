@php use \App\Http\Controllers\GlobalController; @endphp
@php  $version = GlobalController::version();@endphp
@php  $starred = GlobalController::starred();@endphp
@php  $sessions = GlobalController::getSessions();@endphp
@php  $users = GlobalController::getUsers();@endphp
@php  $usersscore = GlobalController::getUsersscore();@endphp
@php  $games = GlobalController::getGames();@endphp
@php  $sommediamants = GlobalController::getSommeDiamants();@endphp
@php  $sommesondages = GlobalController::getSommeSondages();@endphp
@php  $sommesondagesjour = GlobalController::getSommeSondagesJour();@endphp
@php  $sommecoins = GlobalController::getSommeCoins();@endphp
@extends(backpack_view('blank'))
@section('content')
    <section class="text-gray-600 body-font">
        <div id="main-content" class="relative w-full h-auto mt-2 overflow-y-auto bg-[#111827] rounded-lg">

            <div class="flex flex-col gap-4 px-4 pt-6 pb-6 xl:flex-row">
                <div class="w-full p-3 bg-white rounded-lg shadow sm:p-6 xl:p-8">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-900">Circulation</h3>
                        </div>
                    </div>
                    <div class="flex flex-col h-32 mt-2">
                        <div class="overflow-auto overflow-x-hidden rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Diamants:
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-center text-gray-500 uppercase md:block">
                                                    Coins:
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Sondages:
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                                    Sondages jour:
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            <tr>
                                                <td
                                                    class="p-4 text-sm font-normal text-center text-gray-900 whitespace-nowrap time-container">
                                                    <div class="flex justify-center">
                                                        {{ $sommediamants }}
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-normal text-center whitespace-nowrap rate-container md:block">
                                                    <div class="flex justify-center">
                                                        {{ $sommecoins }}€
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-normal text-center text-gray-900 time-container ">
                                                    <div class="flex justify-center">
                                                        {{ $sommesondages }}
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-normal text-center text-gray-900 time-container ">
                                                    <div class="flex justify-center">
                                                        {{ $sommesondagesjour }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--
            <div class="flex flex-col h-auto gap-4 px-4 pb-6 xl:flex-row">
                <div class="p-3 bg-white rounded-lg shadow sm:p-6 xl:p-8 w-full">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-900">Jeux du moment</h3>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="user/"
                                class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout
                                voir</a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-2 h-96">
                        <div class="overflow-auto overflow-x-hidden rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Image
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Titre
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="hidden px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:block">
                                                    Editer
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @forelse ($starred as $star)
                                                <tr>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap rate-container">
                                                         @php $imagesb =  $star->image[0] ?? null;
                                                            $imgiUrl = asset('storage/' . $imagesb);
                                                            $gifiUrl = str_replace(".mp4", ".gif", $imgiUrl);
                                                        @endphp                         
                                                        <img src="{{ $gifiUrl }}" class="w-32 h-auto">
                                                    </td>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                        {{ $star->name }}
                                                    </td>
                                                    <td class="p-4 text-sm font-normal text-gray-900 time-container ">
                                                        <p class="cropped"> {{ $star->description }}</p>
                                                    </td>
                                                    <td
                                                        class="hidden p-4 text-sm font-normal whitespace-nowrap rate-container md:block">
                                                        <a href="games/{{ $star->id }}/edit">
                                                            <i
                                                                class="text-gray-600 hover:text-gray-800 active:text-black las la-edit la-2x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                        Aucun jeux mis en vedettes
                                                    </td>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap rate-container">

                                                    </td>
                                                    <td class="p-4 text-sm font-normal whitespace-nowrap rate-container">

                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

                <div class="gap-1 px-4 pt-6 pb-6">
                    <div class="flex items-center p-4 rounded-lg justify-between mb-2 bg-white">
                        <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-900">Utilisateurs</h3>
                            <a class="p-2 text-sm font-medium text-gray-800 rounded-lg">Total: {{ $users->count() }}</a>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="user/"
                                class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout
                                voir</a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-2 h-[400px]">
                        <div class="overflow-auto overflow-x-hidden rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Nom
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Sondages
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Sondages jour
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Parrainages
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">

                                            @foreach ($usersscore as $user)
                                                <tr>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container inline-flex">
                                                        <a href="user/{{ $user->id }}/edit">{{ $user->name }}</a> 
                                                        @if($user->language == 'fr') &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/fr.svg" alt="Français" class="w-4 h-4 mr-1"> @endif
                                                        @if($user->language == 'en') &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/gb.svg" alt="English" class="w-4 h-4 mr-1"> @endif
                                                        @if($user->language == 'de') &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/de.svg" alt="German" class="w-4 h-4 mr-1"> @endif
                                                        @if($user->language == 'es') &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/es.svg" alt="Español" class="w-4 h-4 mr-1"> @endif
                                                        @if($user->language == 'it') &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/it.svg" alt="Italian" class="w-4 h-4 mr-1"> @endif
                                                        @if($user->language == NULL) &nbsp;<img src="https://flagicons.lipis.dev/flags/4x3/xx.svg" alt="Unknown" class="w-4 h-4 mr-1"> @endif
                                                    </td>
                                                    <td class="p-4 text-sm font-normal text-gray-900 rate-container">
                                                        {{ $user->parties }}
                                                    </td>
                                                    <td class="p-4 text-sm font-normal text-gray-900 rate-container">
                                                        {{ $user->parties_jour }}
                                                    </td>
                                                    <td class="p-4 al text-sm font-normal text-gray-900 rate-container">
                                                        {{ $user->global_score }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!--
                <div class="p-3 bg-white rounded-lg shadow sm:p-6 xl:p-8 xl:w-1/5">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-900">Processus</h3>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="games/"
                                class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout voir</a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-2 h-[400px]">
                        <div class="overflow-auto overflow-x-hidden rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Jeux
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">

                                            @foreach ($games as $game)
                                                <tr>
                                                    <td class="pl-8 text-sm font-normal text-gray-900 whitespace-nowrap">
                                                        @php
                                                            //$process = exec('ps aux | grep -v grep | grep app.js') ? 'Running' : 'Stopped';
                                                            $host = 'localhost'; // replace with the hostname or IP address of the server
                                                            $port = $game->port; // replace with the port number you want to check
                                                            
                                                            $fp = @fsockopen($host, $port, $errno, $errstr, 1);
                                                            
                                                        @endphp
                                                        @if ($fp)
                                                            <div class="w-3 h-3 ml-2 bg-green-500 rounded-full"></div>
                                                        @else
                                                            <div class="w-3 h-3 ml-2 bg-red-500 rounded-full"></div>
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                        {{ $game->name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>



    </section>
    <style>
        * {
            scrollbar-width: thin;
            scrollbar-color: #86878B #05070C;
        }

        /* Chrome, Edge, and Safari */
        *::-webkit-scrollbar {
            width: 15px;
        }

        *::-webkit-scrollbar-track {
            margin-top: 5px;
            margin-bottom: 5px;
            background: #05070C;
            border-radius: 5px;
        }

        *::-webkit-scrollbar-thumb {
            margin-top: 5px;
            background-color: #86878B;
            border-radius: 14px;
            border: 3px solid #05070C;
        }
    </style>
@endsection
