<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Primary Meta Tags -->
<meta name="title" content="Gokdo">
<meta name="description" content="{{__("Jeux multijoueurs gratuits, gains d'argent et cadeaux ! Concours excitants, inscrivez-vous maintenant.")}}">
<meta name="keywords" content="{{__("jeux, jeux gratuit, jeux fr, jeux gratuits, gagner, gagner des cadeaux et de l'argent cash, gagner de l'argent cash, argent, cash, jeu, jeu en ligne, jeux flash, jeux gratuits en ligne, grattez, jeux de grattage")}}" />
<meta name="identifier-url" content="https://{{ app()->getLocale() }}.gokdo.com" />
<meta http-equiv="content-language" content="{{ app()->getLocale() }}" />
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

<meta name="surfe.pro" content="98fe09e1b43164e3fb1bfcb37b760463">

<meta name="coverage" content="Worldwide" />

@php $url_en_cours = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; @endphp

<link rel="canonical" href="{{ $url_en_cours }}" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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

<!-- Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->
<script type="text/javascript" async=true>
(function() {
  var host = 'www.themoneytizer.com';
  var element = document.createElement('script');
  var firstScript = document.getElementsByTagName('script')[0];
  var url = 'https://cmp.quantcast.com'
    .concat('/choice/', '6Fv0cGNfc_bw8', '/', host, '/choice.js');
  var uspTries = 0;
  var uspTriesLimit = 3;
  element.async = true;
  element.type = 'text/javascript';
  element.src = url;

  firstScript.parentNode.insertBefore(element, firstScript);

  function makeStub() {
    var TCF_LOCATOR_NAME = '__tcfapiLocator';
    var queue = [];
    var win = window;
    var cmpFrame;

    function addFrame() {
      var doc = win.document;
      var otherCMP = !!(win.frames[TCF_LOCATOR_NAME]);

      if (!otherCMP) {
        if (doc.body) {
          var iframe = doc.createElement('iframe');

          iframe.style.cssText = 'display:none';
          iframe.name = TCF_LOCATOR_NAME;
          doc.body.appendChild(iframe);
        } else {
          setTimeout(addFrame, 5);
        }
      }
      return !otherCMP;
    }

    function tcfAPIHandler() {
      var gdprApplies;
      var args = arguments;

      if (!args.length) {
        return queue;
      } else if (args[0] === 'setGdprApplies') {
        if (
          args.length > 3 &&
          args[2] === 2 &&
          typeof args[3] === 'boolean'
        ) {
          gdprApplies = args[3];
          if (typeof args[2] === 'function') {
            args[2]('set', true);
          }
        }
      } else if (args[0] === 'ping') {
        var retr = {
          gdprApplies: gdprApplies,
          cmpLoaded: false,
          cmpStatus: 'stub'
        };

        if (typeof args[2] === 'function') {
          args[2](retr);
        }
      } else {
        if(args[0] === 'init' && typeof args[3] === 'object') {
          args[3] = { ...args[3], tag_version: 'V2' };
        }
        queue.push(args);
      }
    }

    function postMessageEventHandler(event) {
      var msgIsString = typeof event.data === 'string';
      var json = {};

      try {
        if (msgIsString) {
          json = JSON.parse(event.data);
        } else {
          json = event.data;
        }
      } catch (ignore) {}

      var payload = json.__tcfapiCall;

      if (payload) {
        window.__tcfapi(
          payload.command,
          payload.version,
          function(retValue, success) {
            var returnMsg = {
              __tcfapiReturn: {
                returnValue: retValue,
                success: success,
                callId: payload.callId
              }
            };
            if (msgIsString) {
              returnMsg = JSON.stringify(returnMsg);
            }
            if (event && event.source && event.source.postMessage) {
              event.source.postMessage(returnMsg, '*');
            }
          },
          payload.parameter
        );
      }
    }

    while (win) {
      try {
        if (win.frames[TCF_LOCATOR_NAME]) {
          cmpFrame = win;
          break;
        }
      } catch (ignore) {}

      if (win === window.top) {
        break;
      }
      win = win.parent;
    }
    if (!cmpFrame) {
      addFrame();
      win.__tcfapi = tcfAPIHandler;
      win.addEventListener('message', postMessageEventHandler, false);
    }
  };

  makeStub();

  var uspStubFunction = function() {
    var arg = arguments;
    if (typeof window.__uspapi !== uspStubFunction) {
      setTimeout(function() {
        if (typeof window.__uspapi !== 'undefined') {
          window.__uspapi.apply(window.__uspapi, arg);
        }
      }, 500);
    }
  };

  var checkIfUspIsReady = function() {
    uspTries++;
    if (window.__uspapi === uspStubFunction && uspTries < uspTriesLimit) {
      console.warn('USP is not accessible');
    } else {
      clearInterval(uspInterval);
    }
  };

  if (typeof window.__uspapi === 'undefined') {
    window.__uspapi = uspStubFunction;
    var uspInterval = setInterval(checkIfUspIsReady, 6000);
  }
})();
</script>
<!-- End Quantcast Choice. Consent Manager Tag v2.0 (for TCF 2.0) -->


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
<link rel="stylesheet" href="{{ asset('css/appcss.min.css') }}">
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
