<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <!-- Primary Meta Tags -->
  <meta name="title" content="Gokdo">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="shortcut icon" href="https://gokdo.com/img/favicon.png" type="image/x-icon" />
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:title" content="Gokdo">
  <meta property="og:description" content="">
  <meta property="og:image" content="https://gokdo.com/img/logo-sm.png">
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="#">
  <meta property="twitter:title" content="Gokdo">
  <meta property="twitter:description" content="">
  <meta property="twitter:image" content="https://gokdo.com/img/logo-sm.png">

  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link crossorigin="anonymous" href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
  <script crossorigin="anonymous" defer src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <title>Jeux en ligne GoKdo - jeux gratuits pour gagner des cadeaux !</title>
@vite('resources/css/app.css')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<script>
    myToken = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
@php
@if(request()->path()=='game')  
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
};
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
@else
@endif
@endphp