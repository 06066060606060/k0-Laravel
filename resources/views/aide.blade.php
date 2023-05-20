@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 rounded-lg lg:mx-8 xl:mx-auto max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Espace Aide</h1>
                    </div>
                    <div class="mx-auto lg:w-1/1 md:w-1/1">
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title">Comment jouer au jeu GoFRUITS ?</h2>
                    <div class="accordion-content mb-4">
                        <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </center>
                    </div>
                    </div>
                    
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title">Comment jouer au jeu POOL ?</h2>
                    <div class="accordion-content mb-4">
                        <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/5QpEaOpxOa4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </center>
                    </div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title">Comment acheter des Rubis ?</h2>
                    <div class="accordion-content mb-4">
                        <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </center>
                    </div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title">Comment choisir un cadeau ?</h2>
                    <div class="accordion-content mb-4">
                        <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </center>
                    </div>
                    </div>
                    
                    <style>
                    .accordion-section:not(:first-of-type) .accordion-content {
  display: none;
}

.accordion-title {
  cursor: pointer;
  background-color: transparent;
  padding: 10px;
  color:white;
  outline: none;
  transition: background-color 0.2s ease;
}
</style>
<script>
$(document).ready(function() {
  $('.accordion-title').click(function() {
    $(this).parent().siblings().find('.accordion-content').slideUp();
    $(this).siblings('.accordion-content').slideToggle();
  });
});
</script>

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
        // fermer toutes les sections d'onglets au chargement de la page
        $('.tab-pane').hide();
        // supprimer la classe 'active' des éléments des onglets
        $('.tab-titles li').removeClass('active');
    });
</script>


@endsection