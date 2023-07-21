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
		<p class="leading-relaxed mb-4 text-gray-300">{{__("Nous enregistrons chaque achat de votre part par type de Pack et nous vous récompensons lorsqu'un palier est atteint.")}}</p>

<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" style="border-radius:0.5rem 0 0 0;" class="border-white py-4 bg-gray-700 text-white">VIP MINI</th>
    <th width="50%" style="border-radius:0 0.5rem 0 0;" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Mini acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">20 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span>
  <?php if(backpack_auth()->user()->nb_achats_mini >= 1) { ?>&nbsp;<i class="fa-solid fa-check" style="color:green;"></i><?php } else {} ?></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Mini achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">200 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Mini achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Mini achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">200 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black">500 {{__("Packs Mini achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black"><span class="inline-flex">100 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP STARTER</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Starter acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">50 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Starter achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">500 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Starter achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">250 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Starter achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">500 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black">500 {{__("Packs Starter achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black"><span class="inline-flex">250 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP BOOSTER</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Booster acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">100 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Booster achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">1 000 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Booster achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">500 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Booster achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">1 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black">500 {{__("Packs Booster achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black"><span class="inline-flex">500 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP MAXI</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Maxi acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">200 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Maxi achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">2 000 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Maxi achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">1 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Maxi achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">2 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black">500 {{__("Packs Maxi achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black"><span class="inline-flex">1 000 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP TERA</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Tera acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">500 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Tera achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">5 000 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Tera achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">2 500 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Tera achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">5 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black">500 {{__("Packs Tera achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black"><span class="inline-flex">2 500 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
</table>


<table class="border-white w-full text-center rounded-lg">
  <tr>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">VIP EXPERT</th>
    <th width="50%" class="border-white py-4 bg-gray-700 text-white">{{__("CADEAU")}}</th>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">1 {{__("Pack Expert acheté")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">1 000 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 text-sm font-bold bg-white text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">10 {{__("Packs Expert achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">10 000 000 <img src="/img/diamond5.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">50 {{__("Packs Expert achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">5 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">100 {{__("Packs Expert achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">10 000 <img src="/img/gem10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
  </tr>
  <tr>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-radius:0 0 0 0.5rem; border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
">500 {{__("Packs Expert achetés")}}</td>
    <td class="border-white py-4 bg-white text-sm font-bold text-black" style="border-radius:0 0 0.5rem 0; border-bottom: 1px solid rgb(55 65 81 / var(--tw-bg-opacity));
"><span class="inline-flex">5 000 <img src="/img/coin10.png" class="ml-2 mt-0 w-7 h-6"></span></td>
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