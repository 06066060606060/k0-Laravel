@extends('layouts.app')

@section('main')

<div data-barba="container">
    @php use \App\Http\Controllers\GlobalController; @endphp
    <div class="mb-4 px-2 py-4 mx-8 bg-gray-800 rounded-lg lg:mx-8 xl:mx-auto bg-opacity-40 max-w-7xl sm:px-16 md:px-24 lg:py-18">
        <div class="flex flex-col max-w-5xl pb-0 mx-auto mb-2 overflow-hidden rounded">
            <section class="relative text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col w-full mb-4 text-center">
                        <h1 class="mb-4 text-4xl font-bold text-gray-100 md:text-5xl title-font">{{__('Confidentialité')}}</h1>
                    </div>

    <header class="z-10 flex px-4 pt-6 pb-2 md:px-0 md:mx-auto max-w-7xl border-x-1 justify-evenly">
		<h1 class="mb-4 text-3xl font-bold text-gray-100 md:text-3xl title-font">{{__('Politique de confidentialité')}}</h1>
	</header>
	<section class="mb-2 relative text-gray-600 body-font">
		<p class="leading-relaxed text-gray-300">{{__("Le site web https://gokdo.com est détenu par GoKDO, qui est un contrôleur de données de vos données personnelles. Nous avons adopté cette politique de confidentialité, qui détermine la manière dont nous traitons les informations collectées par https://gokdo.com, qui fournit également les raisons pour lesquelles nous devons collecter certaines données personnelles vous concernant. Par conséquent, vous devez lire cette politique de confidentialité avant d'utiliser le site web de https://gokdo.com. Nous prenons soin de vos données personnelles et nous nous engageons à en garantir la confidentialité et la sécurité.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Les informations personnelles que nous collectons :')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Lorsque vous visitez le https://gokdo.com, nous recueillons automatiquement certaines informations sur votre appareil, notamment des informations sur votre navigateur web, votre adresse IP, votre fuseau horaire et certains des cookies installés sur votre appareil. En outre, lorsque vous naviguez sur le site, nous recueillons des informations sur les pages web ou les produits individuels que vous consultez, sur les sites web ou les termes de recherche qui vous ont renvoyé au site et sur la manière dont vous interagissez avec le site. Nous désignons ces informations collectées automatiquement par le terme "informations sur les appareils". En outre, nous pourrions collecter les données personnelles que vous nous fournissez (y compris, mais sans s'y limiter, le nom, le prénom, l'adresse, les informations de paiement, etc.) lors de l'inscription afin de pouvoir exécuter le contrat.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Pourquoi traitons-nous vos données ?')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Notre priorité absolue est la sécurité des données des clients et, à ce titre, nous ne pouvons traiter que des données minimales sur les utilisateurs, uniquement dans la mesure où cela est absolument nécessaire pour maintenir le site web. Les informations collectées automatiquement sont utilisées uniquement pour identifier les cas potentiels d'abus et établir des informations statistiques concernant l'utilisation du site web. Ces informations statistiques ne sont pas autrement agrégées de manière à identifier un utilisateur particulier du système. Vous pouvez visiter le site web sans nous dire qui vous êtes ni révéler d'informations, par lesquelles quelqu'un pourrait vous identifier comme un individu spécifique et identifiable. Toutefois, si vous souhaitez utiliser certaines fonctionnalités du site web, ou si vous souhaitez recevoir notre lettre d'information ou fournir d'autres détails en remplissant un formulaire, vous pouvez nous fournir des données personnelles, telles que votre e-mail, votre prénom, votre nom, votre ville de résidence, votre organisation, votre numéro de téléphone. Vous pouvez choisir de ne pas nous fournir vos données personnelles, mais il se peut alors que vous ne puissiez pas profiter de certaines fonctionnalités du site web. Par exemple, vous ne pourrez pas recevoir notre bulletin d'information ou nous contacter directement à partir du site web. Les utilisateurs qui ne savent pas quelles informations sont obligatoires sont invités à nous contacter via l'espace de contact situé en bas de page.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__('Vos droits :')}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Si vous êtes un résident européen, vous disposez des droits suivants liés à vos données personnelles :")}}
<br><br>
• {{__("Le droit d'être informé.")}}<br>
• {{__("Le droit d'accès.")}}<br>
• {{__("Le droit de rectification.")}}<br>
• {{__("Le droit à l'effacement.")}}<br>
• {{__("Le droit de restreindre le traitement.")}}<br>
• {{__("Le droit à la portabilité des données.")}}<br>
• {{__("Le droit d'opposition.")}}<br>
• {{__("Les droits relatifs à la prise de décision automatisée et au profilage.")}}<br><br>

{{__("Si vous souhaitez exercer ce droit, veuillez nous contacter via les coordonnées ci-dessous.")}}<br>
{{__("En outre, si vous êtes un résident européen, nous notons que nous traitons vos informations afin d'exécuter les contrats que nous pourrions avoir avec vous (par exemple, si vous passez une commande par le biais du site), ou autrement pour poursuivre nos intérêts commerciaux légitimes énumérés ci-dessus. En outre, veuillez noter que vos informations pourraient être transférées en dehors de l'Europe, y compris au Canada et aux États-Unis.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__("Liens vers d'autres sites web :")}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Notre site web peut contenir des liens vers d'autres sites web qui ne sont pas détenus ou contrôlés par nous. Sachez que nous ne sommes pas responsables de ces autres sites web ou des pratiques de confidentialité des tiers. Nous vous encourageons à être attentif lorsque vous quittez notre site web et à lire les déclarations de confidentialité de chaque site web susceptible de collecter des informations personnelles.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__("Sécurité de l'information :")}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Nous sécurisons les informations que vous fournissez sur des serveurs informatiques dans un environnement contrôlé et sécurisé, protégé contre tout accès, utilisation ou divulgation non autorisés. Nous conservons des garanties administratives, techniques et physiques raisonnables pour nous protéger contre tout accès, utilisation, modification et divulgation non autorisés des données personnelles sous son contrôle et sa garde. Toutefois, aucune transmission de données sur Internet ou sur un réseau sans fil ne peut être garantie.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__("Divulgation légale :")}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Nous divulguerons toute information que nous collectons, utilisons ou recevons si la loi l'exige ou l'autorise, par exemple pour nous conformer à une citation à comparaître ou à une procédure judiciaire similaire, et lorsque nous pensons de bonne foi que la divulgation est nécessaire pour protéger nos droits, votre sécurité ou celle d'autrui, enquêter sur une fraude ou répondre à une demande du gouvernement.")}}</p>
	</section>
	<section class="mb-2 relative text-gray-600 body-font">
		<h2 class="mb-1 text-xl font-bold text-blue-500 title-font">{{__("Informations de contact :")}}</h2>
		<p class="leading-relaxed text-gray-300">{{__("Si vous souhaitez nous contacter pour comprendre davantage la présente politique ou si vous souhaitez nous contacter concernant toute question relative aux droits individuels et à vos informations personnelles, vous pouvez envoyer un message sur notre espace de contact situé en bas de page.")}}</p>
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