@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 rounded-lg lg:mx-8 xl:mx-auto max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-8 mx-auto mb-8 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Espace Aide')}}</h1>
                    </div>
                    <div class="mx-auto lg:w-1/1 md:w-1/1">
                    <h2 class="mb-2 text-2xl font-bold text-blue-500 title-font">{{__('Site et Connexion')}}</h2>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title text-l">{{__("L'accès au site est-il gratuit ?")}}</h2>
                        <div class="px-6 py-6 text-white">{{__("L'accès au site est entièrement gratuit. Vous n'avez à payer que votre connexion à Internet ; il n'y a aucun frais supplémentaire. Gokdo est un site de jeux gratuits sans obligation d'achat !")}}</div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-4">
                    <h2 class="accordion-title text-l">{{__("Qu'est-ce qu'un Diamant ?")}}</h2>
                    <div class="accordion-content mb-2">
                        <div class="px-6 py-6 text-white">{{__("Le Diamant est la principale monnaie virtuelle du site. Les Diamants se cumulent lorsque vous jouez sur les jeux et vous permettent de commander des Cadeaux. Vous pouvez obtenir des Diamants en jouant aux jeux GoFRUITS, POOL mais également via le concours et les Events. Les Diamants que vous gagnez sont stockés dans votre Compte Joueur. Pour consulter votre Compte Joueur, votre historique de gains et les Cadeaux que vous avez gagnés et commandés, il vous suffit de cliquer sur 'Profil' en haut à droite de la page. Il est important de noter que les Diamants n'ont aucune valeur monétaire.")}}</div>
                    </div>
                    </div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-8">
                    <h2 class="accordion-title text-l">{{__("Qu'est-ce qu'un Coins ?")}}</h2>
                        <div class="px-6 py-6 text-white">{{__("Le Coin est la monnaie secondaire du site, 1 Coin = 1€. Vous pouvez cumuler vos Coins en les gagnants sur le jeu POOL, le concours ou encore les jeux Events. Une boutique dédiée spécialement aux Coins est disponible dans la page 'Cadeaux' en cliquant sur l'onglet 'COINS', vous pourrez alors échanger contre des bons Amazon mais également des versements Paypal.")}}</div>
                    </div>
                    <div class="accordion-section bg-gray-800 bg-opacity-40 mb-8">
                    <h2 class="accordion-title">{{__('Comment participer au concours parrainage ?')}}</h2>
                    <div class="px-6 py-6 text-white">{{__("Pour participer au concours de parrainage, il vous suffit simplement de parrainer de nouveaux membres sur Gokdo, un membre parrainé vous rapportera 1 point de concours parrainage, plus vous parrainez et plus vous aurez de chance de remporter de gains !")}}</div>
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
        // fermer toutes les sections d'onglets au chargement de la page
        $('.accordion-content').hide();
        
        // écouter le clic sur les titres des onglets
        $('.accordion-title').click(function(e) {
            e.preventDefault();
            
            // fermer toutes les sections d'onglets
            $('.accordion-content').hide();
            
            // afficher le contenu associé
            $(this).siblings('.accordion-content').show();
        });
    });
</script>



@endsection