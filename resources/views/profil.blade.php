@extends('layouts.app')

@section('main')
  <div data-barba="container">
    <container class="flex flex-col md:flex-row px-8 mx-auto lg:max-w-6xl md:pl-16 min-h-screen">
        <div class="flex flex-col items-center">
            <card class="relative p-4 bg-gray-800 border border-gray-700 rounded-xl w-full md:w-64 h-96 mb-4 md:mb-0 md:mr-4">
                <div class="flex items-center pb-4 border-b border-gray-500">
                    <img alt="Developer" src="img/avatar.png"
                        class="object-cover w-16 h-16 border border-gray-400 rounded-full" />

                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-white">{{ backpack_auth()->user()->name }}</h3>

                        <div class="flow-root">
                            <ul class="flex flex-wrap -m-1">
                                <li class="p-1 leading-none">
                                    <i class="text-xs font-medium text-gray-300">{{ backpack_auth()->user()->email }}</i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:items-center ">
                <p class="text-white font-medium pb-1 border-b border-gray-500 ">
                Score total : {{ backpack_auth()->user()->global_score }}
                </p>
                  <h3 class="text-lg font-bold text-white pt-1 pb-2">Mes Butins</h3>
                    <div class="flex py-2">
                  <img src="img/diamond5.png" class="w-10 h-8"><p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee1 }}</p>
                  </div>
                  <div class="flex py-2">
                  <img src="img/gem10.png" class="w-10 h-8"><p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee2 }}</p>
                  </div>
                   <div class="flex py-2">
                  <img src="img/coin10.png" class="w-10 h-8"><p class="text-white">&nbsp; x {{ backpack_auth()->user()->trophee3 }}</p>
                  </div>
                </div>

                <ul class="absolute mt-4 bottom-0 mb-4">
                    <div
                        class="flex w-full max-w-sm overflow-hidden bg-gray-800 border border-gray-700 rounded-lg shadow-md">
                        <div class="flex items-center justify-center w-12 bg-red-500">
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
        <div class="flex flex-col bg-gray-800 border border-gray-700 rounded-xl w-full h-96">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y divide-gray-200 text-sm ">
                    <thead class="bg-gray-100 rounded-t-lg">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-900">
                                Jeux
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-900">
                               Score
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-500">
                    @forelse ($scores as $score)
                         <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-200">
                             {{ $score->game->name }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-300"> {{ $score->score }}</td>
                        </tr>
                    @empty
                         <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-200">
                               Aucun Score enregistré
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-300"></td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-300"></td>
                        </tr>
                    @endforelse
                       
                       
                    </tbody>
                </table>
            </div>

        </div>
    </container>
    </div>
@endsection
