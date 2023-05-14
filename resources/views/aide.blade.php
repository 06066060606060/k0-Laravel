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
                    <div class="accordion-section bg-gray-800 bg-opacity-40">
                    <h2 class="accordion-title">Titre de la section 1</h2>
                    <div class="accordion-content">
                    Contenu de la section 1
                    </div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40">
                    <h2 class="accordion-title">Titre de la section 2</h2>
                    <div class="accordion-content">
                    Contenu de la section 2
                    </div>
                    </div>
                    <style>
                    .accordion-section:not(:first-of-type) .accordion-content {
  display: none;
}

.accordion-title {
  cursor: pointer;
  background-color: transparent;
  border:1px solid white;
  margin-bottom:10px;
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

                        <div class="tabs">
                            <ul class="tab-titles text-white">
                                <li class="active">
                                    <h2><a href="#tab1">> Comment jouer au jeu GoFRUITS ?</a></h2>
                                </li>
                                <li>
                                    <h2><a href="#tab2">> Comment jouer au jeu Pool ?</a></h2>
                                </li>
                                <li>
                                    <h2><a href="#tab3">> Comment acheter des Rubis ?</a></h2>
                                </li>
                                <li>
                                    <h2><a href="#tab4">> Comment choisir un cadeau ?</a></h2>
                                </li>
                            </ul>
                            <div class="tab-content mt-4">
                                <div class="tab-pane active" id="tab1">
                                    <p>
                                        <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </center>
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <p><center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </center></p>
                                </div>
                                <div class="tab-pane" id="tab3">
                                    <p><center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </center></p>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    <p><center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </center></p>
                                </div>
                            </div>
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