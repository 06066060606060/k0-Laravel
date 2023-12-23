@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Sondages Rémunérés')}}</h1>
                    </div>
                
	<section class="mb-2 relative text-white body-font">
  		<h1 class="mb-1 text-xl font-bold text-blue-500 title-font">Top 5 Sondages Rémunérés</h1>

    <p>Les sondages rémunérés sont devenus une méthode populaire pour gagner de l'argent en ligne tout en partageant son opinion. De nombreux prestataires offrent des opportunités pour participer à des enquêtes et être récompensé pour cela. Voici quelques-uns des prestataires les plus connus dans ce domaine :</p>

    <h2 style="color:yellow;" class="mb-1 mt-2 text-xl font-bold text-yellow title-font">1. Swagbucks</h2>
    <p class="mt-2 mb-2">Swagbucks est l'un des leaders dans le domaine des sondages rémunérés. En plus des sondages, vous pouvez gagner des points en effectuant diverses tâches en ligne, comme regarder des vidéos, faire des achats en ligne, et plus encore.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">2. Toluna</h2>
    <p class="mt-2 mb-2">Toluna propose une plateforme conviviale pour participer à des sondages rémunérés. En partageant votre opinion, vous accumulez des points échangeables contre des cartes-cadeaux, des produits gratuits ou de l'argent PayPal.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">3. Survey Junkie</h2>
    <p class="mt-2 mb-2">Survey Junkie se concentre exclusivement sur les sondages en ligne. Les utilisateurs peuvent gagner de l'argent ou des cartes-cadeaux en participant à des enquêtes et en donnant leur avis sur différents produits et services.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">4. Vindale Research</h2>
    <p class="mt-2 mb-2">Vindale Research propose des sondages rémunérés ainsi que des opportunités de test de produits. Les membres peuvent gagner de l'argent en participant à des études de marché et en donnant leur feedback sur divers produits et services.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">5. YouGov</h2>
    <p class="mt-2 mb-2">YouGov est reconnu pour ses enquêtes axées sur l'opinion politique et sociale. Les participants peuvent influencer les décisions politiques en partageant leurs points de vue et sont récompensés par des points convertibles en argent ou en cartes-cadeaux.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">6. Gaddin</h2>
    <p class="mt-2 mb-2">Gaddin offre des opportunités de sondages rémunérés ainsi que d'autres moyens de gagner de l'argent en ligne, tels que la lecture d'emails rémunérés. Les membres peuvent accumuler des points échangeables contre des récompenses attractives.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">7. SondagesRémunérés.fr</h2>
    <p class="mt-2 mb-2">SondagesRémunérés.fr propose une variété de sondages rémunérés couvrant différents domaines. Les participants peuvent gagner de l'argent ou des chèques-cadeaux en partageant leur avis sur divers sujets.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">8. YouGov</h2>
    <p class="mt-2 mb-2">YouGov est reconnu pour ses enquêtes axées sur l'opinion politique et sociale. Les participants peuvent influencer les décisions politiques en partageant leurs points de vue et sont récompensés par des points convertibles en argent ou en cartes-cadeaux.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">9. Gaddin</h2>
    <p class="mt-2 mb-2">Gaddin offre des opportunités de sondages rémunérés ainsi que d'autres moyens de gagner de l'argent en ligne, tels que la lecture d'emails rémunérés. Les membres peuvent accumuler des points échangeables contre des récompenses attractives.</p>

    <h2 style="color:yellow;" class="mb-1 text-xl font-bold text-yellow title-font">10. SondagesRémunérés.fr</h2>
    <p class="mt-2 mb-2">SondagesRémunérés.fr propose une variété de sondages rémunérés couvrant différents domaines. Les participants peuvent gagner de l'argent ou des chèques-cadeaux en partageant leur avis sur divers sujets.</p>

    <p class="mt-2">Il est important de noter que la disponibilité des sondages peut varier en fonction de votre emplacement géographique et de votre profil démographique. Avant de vous inscrire à un prestataire, assurez-vous de lire les conditions d'utilisation et de comprendre comment fonctionne le processus de rémunération.</p>

    <p class="mt-2">En conclusion, les sondages rémunérés offrent une opportunité simple et accessible de gagner de l'argent en ligne. En choisissant parmi des prestataires bien établis tels que Swagbucks, Toluna, Survey Junkie et Vindale Research, vous pouvez commencer à participer à des enquêtes et à être récompensé pour votre temps et votre opinion.</p>



		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Informations Principales')}}</h2> 
		<p class="leading-relaxed text-gray-300">Nom de l'entreprise : GOKDO
        <br>Nom du propriétaire : JORGEVU Nicolaï
        <br>Addresse : {{__('Iakovou Tompazi, Limassol, Chypre')}}
        </p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Hébergement')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Le site GoKDO est hébergé par HOSTINGER, dont le siège social est situé HOSTINGER INTERNATIONAL LTD, 61 Lordou Vironos Street, 6023 Larnaca, Chypre, joignable par le moyen suivant :https://www.hostinger.fr/contact.")}}</p>
	</section>
	<section class="relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Création')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__('Site développé et conçu par Micky XBMOD')}}</p>
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