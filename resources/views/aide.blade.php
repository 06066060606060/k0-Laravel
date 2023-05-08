@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">Espace Aide</h1>
                    </div>
                    <div class="mx-auto lg:w-1/2 md:w-2/3">
                        <div class="container">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Comment jouer au jeu GoFRUITS ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Comment jouer au jeu Pool ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Comment acheter des Rubis ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Comment choisir un cadeau ?</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
      <center><iframe width="100%" height="400" src="https://www.youtube.com/embed/3-BmXAOkgvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></center>
    </div>
    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
      <p>Contenu 2</p>
    </div>
    <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
      <p>Contenu 3</p>
    </div>
    <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
      <p>Contenu 4</p>
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