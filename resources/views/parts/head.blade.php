<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Primary Meta Tags -->
<meta name="title" content="Gokdo">
<meta name="description" content="{{__("Jeux multijoueurs gratuits, gains d'argent et cadeaux ! Concours excitants, inscrivez-vous maintenant.")}}">
<meta name="keywords" content="{{__("jeux, jeux gratuit, jeux fr, jeux gratuits, gagner, gagner des cadeaux et de l'argent cash, gagner de l'argent cash, argent, cash, jeu, jeu en ligne, jeux flash, jeux gratuits en ligne, grattez, jeux de grattage")}}" />
<!--<meta name="identifier-url" content="https://{{ app()->getLocale() }}.gokdo.com" />-->
<meta name="identifier-url" content="https://gokdo.com" />
<!--<meta http-equiv="content-language" content="{{ app()->getLocale() }}" />-->
<meta http-equiv="content-language" content="fr" />
<meta name="author" content="GoKDO" />
<!--Yandex-->
<meta name="yandex-verification" content="6e37c7dac9342d3a" />

<meta name="robots" content="index,follow" />
<link rel="shortcut icon" href="https://gokdo.com/img/favicon.png" type="image/x-icon" />
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://gokdo.com">
<meta property="og:title" content="Gokdo">
<meta property="og:description" content="">
<meta property="og:image" content="https://gokdo.com/img/logo-sm.png">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="#">
<meta property="twitter:title" content="Gokdo">
<meta property="twitter:description" content="">
<meta property="twitter:image" content="https://gokdo.com/img/logo-sm.png">

<meta name="coverage" content="Worldwide" />

@php $url_en_cours = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; @endphp

<link rel="canonical" href="{{ $url_en_cours }}" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- ADSENSE -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4337256114287476"
     crossorigin="anonymous"></script>

<!-- TABOOLA -->
<!-- Taboola Pixel Code -->
<script type='text/javascript'>
  window._tfa = window._tfa || [];
  window._tfa.push({notify: 'event', name: 'page_view', id: 1606216});
  !function (t, f, a, x) {
         if (!document.getElementById(x)) {
            t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
         }
  }(document.createElement('script'),
  document.getElementsByTagName('script')[0],
  '//cdn.taboola.com/libtrc/unip/1606216/tfa.js',
  'tb_tfa_script');
</script>
<!-- End of Taboola Pixel Code -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TLHCZTD3');</script>
<!-- End Google Tag Manager -->

<script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" async></script>

<!--Analytics-->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VNPT87NKHJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VNPT87NKHJ');
</script>

<link crossorigin="anonymous" href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
<script crossorigin="anonymous" src="https://unpkg.com/swiper/swiper-bundle.min.js" async></script>
<title>{{__('Jeux gratuits multijoueurs pour gagner des cadeaux !')}}</title>
@vite('resources/css/app.css')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<script>
    myToken = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
@php
if(request()->path()=='game')  {
@endphp
<script>
if (window.location.href.match(/^https?:\/\/(www\.)?gokdo\.com(\/|$)/)) {
  document.addEventListener("visibilitychange", function() {
    // Si la page Web est visible
    if (!document.hidden) {
      // Actualiser la page
      location.reload();
    }
    if (document.hidden) {
      // Actualiser la page
      location.reload();
    }
  });
}
</script>
 
<script>
function detectMultipleWindows() {
  // Vérifiez si le localStorage est disponible dans le navigateur
  if (typeof(Storage) !== "undefined") {
    // Récupérez le nombre de fenêtres ouvertes avec ce site
    var numWindows = localStorage.getItem("numWindows") || 0;
    // Incrémentez le nombre de fenêtres ouvertes
    localStorage.setItem("numWindows", ++numWindows);

    // Lorsque la fenêtre est fermée, décrémentez le nombre de fenêtres ouvertes
    window.addEventListener("beforeunload", function() {
      localStorage.setItem("numWindows", --numWindows);
    });
  } else {
    console.log("localStorage n'est pas supporté par votre navigateur.");
  }
}

// Appeler la fonction pour détecter les fenêtres multiples
detectMultipleWindows();
</script>
@php
} else { }
@endphp
<link rel="stylesheet" href="https://gokdo.com/appcss.min.css">
@php
// Vérifie si la connexion utilise le port HTTPS (port 443)
if ($_SERVER["SERVER_PORT"] == 443) {
    // La connexion est sécurisée, ne faites rien
} else {
    // Redirige vers la version HTTPS de la même page
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
// Le reste du code de votre page web
@endphp
