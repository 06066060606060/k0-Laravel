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
                             <div class="tabs">
  <ul class="tab-titles">
    <li class="active"><a href="#tab1">Titre 1</a></li>
    <li><a href="#tab2">Titre 2</a></li>
    <li><a href="#tab3">Titre 3</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <p>Contenu 1</p>
    </div>
    <div class="tab-pane" id="tab2">
      <p>Contenu 2</p>
    </div>
    <div class="tab-pane" id="tab3">
      <p>Contenu 3</p>
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
