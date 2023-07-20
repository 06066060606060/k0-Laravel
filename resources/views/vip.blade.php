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
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('FONCTIONNEMENT DU VIP')}}</h2>
		<p class="leading-relaxed mb-4 text-gray-300">{{__("Pour chaque achat de Packs de Rubis effectué il vous sera donné des Points VIP.")}} <br>{{__("Dans le tableau ci-dessous vous verrez combien de Points VIP atteindre pour gagner le cadeau correspondant.")}}</p>

<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP MINI</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Mini achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Mini achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Mini achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Mini achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Mini achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP STARTER</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Starter achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Starter achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Starter achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Starter achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Starter achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP BOOSTER</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Booster achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Booster achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Booster achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Booster achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Booster achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP MAXI</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Maxi achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Maxi achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Maxi achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Maxi achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Maxi achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP TERA</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Tera achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Tera achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Tera achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Tera achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Tera achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP EXPERT</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">GIFT</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">5 Packs Expert achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-xl font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">20 Packs Expert achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">60 000 <img src="/img/diamond5.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">80 Packs Expert achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">200 Packs Expert achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 Packs Expert achetés</td>
    <td class="border-white py-4 bg-white text-xl font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10€<br><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-1 w-7 h-6"></span></td>
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