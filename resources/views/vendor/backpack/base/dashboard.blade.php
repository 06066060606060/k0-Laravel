@php use \App\Http\Controllers\GlobalController; @endphp
@php  $version = GlobalController::version();@endphp
@php  $starred = GlobalController::starred();@endphp
@extends(backpack_view('blank'))
@section('content')
    <section class="text-gray-600 body-font">
        <div id="main-content" class="relative w-full h-full mt-2 overflow-y-auto bg-[#111827] rounded-lg">
            <main>
                <div class="px-4 pt-6 pb-6">
                    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">

                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 2xl:col-span-2">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900">Jeu en vedette</h3>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="games/"
                                        class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Voir tous
                                        les jeux</a>
                                </div>
                            </div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Miniature
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Nom
                                        </th>
                                          <th scope="col"
                                            class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Editer
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">

                                    @forelse ($starred as $star)
                                        <tr>
                                            <td
                                                class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap rate-container">
                                                
                                             @php $imagesx =   $star->image[0] ?? null; @endphp
                                                <img src="../storage/{{ $imagesx }}" class="w-32 h-auto">
                                            </td>
                                            <td
                                                class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                {{ $star->name }}
                                            </td>
                                             <td
                                                class="p-4 text-sm font-normal text-gray-900 time-container">
                                                {{ $star->description }}
                                            </td>
                                             <td class="p-4 text-sm font-normal whitespace-nowrap rate-container">
                                                <a href="/admin/games/{{ $star->id }}/edit">
                                                    <i class="text-gray-600 hover:text-gray-800 active:text-black las la-edit la-2x"></i>
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
                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h3 class="mb-1 text-xl font-bold text-gray-900">Inscriptions</h3>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="user/"
                                        class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout
                                        voir</a>
                                </div>
                            </div>
                            <div class="flex flex-col mt-2">
                                <div class="overflow-x-auto rounded-lg">
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
                                                            Email
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    @php  $users = GlobalController::getUsers();@endphp
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td
                                                                class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                                {{ $user->name }}
                                                            </td>
                                                            <td
                                                                class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap rate-container">
                                                                {{ $user->email }}
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
                    </div>
                </div>

            </main>

        </div>
        </div>
        @if (backpack_user()->role == 'admin')
            <p class="w-1/2 px-4 py-2 mx-8 mt-4 text-xs text-gray-200 bg-gray-900 rounded -pl-2">
                Derniéres mise à jour: {{ $version }}<br>
            </p>
        @endif
        </div>


    </section>
@endsection
