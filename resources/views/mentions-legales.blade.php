@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('mentions.ml1')}}</h1>
                    </div>
                
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('mentions.ml2')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('mentions.ml3')}} : GOKDO
        <br>{{__('mentions.ml4')}} : En cours de création...
        <br>{{__('mentions.ml5')}} : Auto-entrepreneur
        <br>SIRET : En cours de création...
        </p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('mentions.ml6')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('mentions.ml7')}}</p>
	</section>
	<section class="relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('mentions.ml8')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('mentions.ml9')}}</p>
	</section>
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