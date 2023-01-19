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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
    .alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    }
    .alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
    }
    .alert.fade {
    opacity: 0;
    transition: opacity .15s linear;
    }

    .alert.show {
        opacity: 1;
    }
    </style>
    <div id="notification-container"></div>
    <script>
        function createNotification(message) {
            // Création d'un élément de notification
            let notification = document.createElement("div");
            notification.classList.add("alert", "alert-danger", "fade", "show");
            notification.innerHTML = message;
            notification.setAttribute("role", "alert");
            // Ajout de la notification à la page
            document.getElementById("notification-container").appendChild(notification);
            // Suppression de la notification après 5 secondes
            setTimeout(() => {
                $(notification).alert('close');
            }, 5000);
        }
        createNotification("ATTENTION : en navigation privée vous devrez vous connecter deux fois si vous utilisez Google ou Facebook connect.");
    </script>