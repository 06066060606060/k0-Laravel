@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 rounded-lg lg:mx-8 xl:mx-auto max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Partenaires')}}</h1>
                    </div>
                    <div class="mx-auto lg:w-1/1 md:w-1/1">
                    <a href="https://www.lesmeilleurs-jeux.net" title="Meilleurs jeux" target="_blank"><img src="https://www.lesmeilleurs-jeux.net/images/ban/ban1.gif" alt="Meilleurs jeux" /></a>

                    </div>

                    

                </div>
            </section>
        </div>
    </div>
</div>

@endsection