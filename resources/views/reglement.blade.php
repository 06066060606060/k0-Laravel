@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('reglement.r1')}}</h1>
                    </div>
    <header class="z-10 flex px-4 pt-6 pb-2 md:px-0 md:mx-auto max-w-7xl border-x-1 justify-evenly">
		<h1 class="mb-4 text-3xl font-bold text-gray-100 md:text-3xl title-font">{{__('reglement.r2')}}</h1>
	</header>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r3')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r4')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r6')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r7')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r8')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r9')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r10')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r11')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r12')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r13')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r14')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r15')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r16')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r17')}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r18')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('reglement.r19')}}</p>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r5')}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r20')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r21')}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r22')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r23')}}</p>

    <p class="leading-relaxed text-gray-300">{{__('reglement.r32')}}</p>

    <p class="leading-relaxed text-gray-300">{{__('reglement.r33')}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r24')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r25')}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r26')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r27')}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r28')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r29')}}</p>
    </section>
    <section class="relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('reglement.r30')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__('reglement.r31')}}</p>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // écouter le clic sur les titres des onglets
        $('.tab-titles a').click(function(e) {
            e.preventDefault();
            // afficher le contenu associé
            $($(this).attr('href')).show().siblings('.tab-pane').hide();
            // activer la classe 'active' sur l'onglet sélectionné
            $(this).parent('li').addClass('active').siblings().removeClass('active');
        });
        // afficher le premier onglet par défaut
        $('.tab-titles li:first-child a').click();
    });
</script>
@endsection