@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Règlement')}}</h1>
                    </div>
    <header class="z-10 flex px-4 pt-6 pb-2 md:px-0 md:mx-auto max-w-7xl border-x-1 justify-evenly">
		<h2 class="mb-4 text-3xl font-bold text-gray-100 md:text-3xl title-font">{{__('Règlement de Gokdo.com')}}</h1>
	</header>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Accès à Gokdo.com')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Gokdo.com est accessible via une application Google Play ou en se rendant sur le site https://gokdo.com. C'est un site de jeu gratuit sans obligation d'achat.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Les Sondages')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Les sondages vous permettent de gagner des Diamants à chaque sondage complété, le ratio est le suivant : lorsque Gokdo gagne 1€ vous en gagné automatiquement 50% de notre gain, soit 0.50€ (soit 2 500 Diamants), vous pouvez échanger vos Diamants en boutique contre de vrai cadeaux ou de l'argent.")}}</p>
	</section>
<!--	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Le concours parrainage')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Chaque mois, un concours parrainage est en place sur Gokdo pour une durée déterminée qui peut être modifiée à tout moment. Chaque concours promet une dotation aux 10 premiers du classement et leur distribuera un gain en 'Coins', dès le 11ème joueur au classement le gain sera de 0.")}}</p>
	</section>-->
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Triche et manipulation frauduleuse')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Toute triche ou manipulation frauduleuse du site ou du jeu entraine une suppression du compte membre sans préavis ni remboursement.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Inactivité')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Les membres du site Gokdo qui ne se seront pas connecter au moins une fois dans les 12 mois suivants leur dernière connexion verront leur compte supprimé, étant considéré comme Inactif. Aucun remboursement ni autre manipulation ou compensation ne pourra être demandée.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('La page de cadeaux')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Une page de cadeau est disponible et propose des cadeaux contre un échange de Diamants ou de Coins. Les cadeaux sont divers et variés et classés en catégories et par prix. L'envoi des commandes se fait au maximum sous 60 jours. Le webmaster peut supprimer les commandes de joueurs qui auraient enfreint le règlement.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__("Contact avec l'équipe de Gokdo.com")}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Les joueurs peuvent contacter une fois par jour l'équipe de Gokdo via l'espace de contact dont le lien est situé en bas de page.")}}</p>
    <p class="leading-relaxed text-gray-300">{{__("Des mails peuvent être envoyés par l'administrateur au membre, les membres peuvent contacter le webmaster pour demander l'arrêt d'envoi de mails.")}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Propriété intellectuelle')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__("Tous les éléments présents sur le site Gokdo, tels que les textes, les images, les graphismes, les logos, les icônes, les sons et les logiciels, sont la propriété exclusive de Gokdo ou de ses partenaires et sont protégés par les lois internationales sur le droit d'auteur et la propriété intellectuelle.")}}</p>

    <p class="leading-relaxed text-gray-300">{{__("Toute reproduction, représentation, modification, publication, transmission, dénaturation, totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de Gokdo.")}}</p>

    <p class="leading-relaxed text-gray-300">{{__("Toute utilisation non autorisée de ces éléments engage la responsabilité de l'utilisateur et constitue une violation des droits d'auteur et de propriété intellectuelle.")}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Responsabilité')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__("Gokdo ne peut être tenu responsable en cas de dysfonctionnement du site, de perturbation de l'accès au site, d'une utilisation frauduleuse ou abusive du site, de perte ou d'altération de données, ou de tout autre dommage direct ou indirect résultant de l'utilisation du site ou des jeux proposés sur le site. Gokdo ne peut également être tenu responsable en cas de mauvaise utilisation des jeux proposés sur le site ou de tout comportement frauduleux ou inapproprié des membres.")}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Modification du règlement')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__("Gokdo se réserve le droit de modifier à tout moment et sans préavis le présent règlement. Les membres seront informés de toute modification par un message affiché sur le site ou par courrier électronique.")}}</p>
    </section>
    <section class="mb-2 relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Litiges et droit applicable')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__("En cas de litige, une solution amiable sera recherchée en priorité. À défaut, les tribunaux chypriotes seront seuls compétents. Le présent règlement est soumis à la loi chypriote.")}}</p>
    </section>
    <section class="relative text-gray-600 body-font">
    <h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Contact')}}</h2>
    <p class="leading-relaxed text-gray-300">{{__("Pour toute question concernant le présent règlement, les membres peuvent contacter Gokdo en utilisant le formulaire de contact disponible sur le site ou par mail à gokdo.com@gmail.com")}}</p>

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