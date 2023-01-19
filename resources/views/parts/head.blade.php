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
@if (backpack_auth()->check())
<script src="//code.tidio.co/0kwbckypxsfhrk4cutsabqskwxgz7blv.js" async></script>
<script>
var id_member = "<?php echo backpack_auth()->user()->id; ?>";
var pseudo = "<?php echo backpack_auth()->user()->name; ?>";
var mail = "<?php echo backpack_auth()->user()->email; ?>";
document.tidioIdentify = {
  distinct_id: id_member, // Unique visitor ID in your system
  email: mail, // visitor email
  name: pseudo, // Visitor name
};
</script>
@else
<script src="//code.tidio.co/0kwbckypxsfhrk4cutsabqskwxgz7blv.js" async></script>
<script>
document.tidioIdentify = {
  name: "Visiteur", // Visitor name
};
</script>
@endif

<script>
function createNotification(message) {
    // Création d'un élément de notification
    let notification = document.createElement("div");
    notification.classList.add("notificationeph");
    notification.innerHTML = message;
    // Ajout de la notification à la page
    document.body.appendChild(notification);
    // Suppression de la notification après 5 secondes
    setTimeout(() => {
        notification.remove();
    }, 5000);
}
</script>
<style>
.notificationeph {
    position: fixed;
    top: 10px;
    right: 10px;
    padding: 15px;
    background-color: #d9edf7;
    color: #31708f;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
}
</style>
<script>
createNotification("ATTENTION votre navigation web est privée, nous vous conseillons d'utiliser une navigation acceptant les cookies.");
</script>