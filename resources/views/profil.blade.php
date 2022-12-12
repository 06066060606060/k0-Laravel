@extends('layouts.app')

@section('main')
@if (Session::has('success'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000, PopupUser())"
    class="flex items-center justify-center alert">
    <p id="popmenu" class="w-48 p-4 mx-auto text-center bg-green-300 rounded-lg">
        {{ Session::get('success') }}</p>
</div>
@endif
    <div class="flex flex-col items-center justify-center py-8">
        <article class="max-w-2xl p-4 bg-gray-800 border border-gray-700 rounded-xl w-72">
            <div class="flex items-center">
                <img alt="Developer" src="img/avatar.png" class="object-cover w-16 h-16 border border-gray-400 rounded-full" />

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

            <ul class="mt-4 space-y-2">
                
                 <div class="flex w-full max-w-sm overflow-hidden bg-gray-800 border border-gray-700 rounded-lg shadow-md">
                    <div class="flex items-center justify-center w-12 bg-red-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                        </svg>
                    </div>
                
                    <div class="px-4 py-2 ml-1 -mx-3">
                     
                            <span class="font-semibold text-red-400">Supprimer mon compte</span>
                                @include('parts.delete')
                        </form>
                    </div>
                </div>
            </ul>
        </article>
    </div>
    <style>
        #popmenu {
            position: fixed;
            top: -50px;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: 0.25s;
            border-radius: 8px;
            user-select: none;
            overflow: hidden;
    
        }
    
        #popmenu.active {
            top: 80px;
            transition: 0.3s;
            transition: 0.25s;
        }
    </style>

<script>
        function PopupUser() {
            console.log('okpop');
            var updateElement = document.getElementById("popmenu");
            updateElement.classList.toggle("active");
    
        }
    </script>
@endsection
