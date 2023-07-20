@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('VIP')}}</h1>
                    </div>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('VIP Work in progress...')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("We are actually working on a system of VIP Module for GoKDO.com.")}}</p>

<table class="border-white w-full text-center">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white pl-4 py-4 bg-white text-black">10 VIP</td>
    <td class="border-white pl-4 py-4 bg-white text-2xl font-bold text-black"><span class="inline-flex">10 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">20 VIP</td>
    <td class="border-white py-4 bg-white text-black"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">50 VIP</td>
    <td class="border-white py-4 bg-white text-black"><span class="inline-flex">50 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">100 VIP</td>
    <td class="border-white py-4 bg-white text-black"><span class="inline-flex">100 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">250 VIP</td>
    <td class="border-white py-4 bg-white text-black">10€ PAYPAL<br><span class="inline-flex">250 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">500 VIP</td>
    <td class="border-white py-4 bg-white text-black">20€ PAYPAL<br><span class="inline-flex">500 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">1 000 VIP</td>
    <td class="border-white py-4 bg-white text-black">50€ PAYPAL<br><span class="inline-flex">1 000 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-black">2 000 VIP</td>
    <td class="border-white py-4 bg-white text-black">100€ PAYPAL<br><span class="inline-flex">2 000 <img src="/img/gem10.png" class="w-5 h-4"></span></td>
  </tr>
</table>


	</section>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection