@php use \App\Http\Controllers\GlobalController; @endphp
@php  $version = GlobalController::version();@endphp
@extends(backpack_view('blank'))
@section('content')
    <section class="text-gray-600 body-font">
        <div id="main-content" class="relative w-full h-full mt-2 overflow-y-auto bg-[#111827] rounded-lg">
            <main>
                <div class="px-4 pt-6 pb-6">
                    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">

                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 2xl:col-span-2">

                        </div>
                        <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="mb-2 text-xl font-bold text-gray-900">Utilisateurs</h3>
                                    <span class="text-base font-normal text-gray-500">Derniéres Inscriptions</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="user/"
                                        class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout
                                        voir</a>
                                </div>
                            </div>
                            <div class="flex flex-col mt-8">
                                <div class="overflow-x-auto rounded-lg">
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden shadow sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                            Nom
                                                        </th>
                                                        <th scope="col"
                                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
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
