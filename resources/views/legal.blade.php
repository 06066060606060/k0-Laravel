        @php use \App\Http\Controllers\GlobalController; @endphp
        @php  $pages = GlobalController::pages();@endphp
@extends('layouts.app')

@section('main')
    <div data-barba="container">
            @php
        $isMobile = GlobalController::isMobile();
    @endphp
    @if($isMobile == true)
    @else
        <div class="z-0 one"></div>
    @endif
                 <div class="text-gray-100 mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
            <div class="flex flex-col max-w-5xl mx-auto overflow-hidden rounded">

                <div class="text-white reverted">
                    @php
                        echo $pages[0]->content;
                    @endphp
                </div>

            </div>
        </div>
    </div>

@endsection
