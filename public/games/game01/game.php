<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!----><meta name="csrf-token" content="{{ csrf_token() }}">
        <title>GoKDO.com - Jouez au Super Plinko et gagnez des cadeaux !</title>
        
        <meta name="Title" content="Super Plinko" />
        <meta name="description" content="Gokdo vous propose de jouer au Super Plinko, c'est un jeu HTML5 où vous lancez le palet sur le Plinko et essayer de le faire atterrir dans les lots situés en bas du jeu.">		
		<meta name="keywords" content="jeu, jouer, gagner, jeu du plinko, jeu du fakir, chance, plinko, le juste prix, pari, cagnotte, perdre, chanceux, pièce de monnaie, laisser tomber, planche, gagne">
        
        <!-- for Facebook -->
        <meta property="og:title" content="Gokdo - Super Plinko"/>
        <meta property="og:site_name" content="Super Plinko"/>
        <meta property="og:image" content="http://demonisblack.com/code/2021/superplinko/game/share.jpg" />
        <meta property="og:url" content="http://demonisblack.com/code/2020/superplinko/game/" />
        <meta property="og:description" content="Gokdo vous propose de jouer au Super Plinko, c'est un jeu HTML5 où vous lancez le palet sur le Plinko et essayer de le faire atterrir dans les lots situés en bas du jeu.">
        
        <!-- for Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Gokdo -Super Plinko" />
        <meta name="twitter:description" content="Gokdo vous propose de jouer au Super Plinko, c'est un jeu HTML5 où vous lancez le palet sur le Plinko et essayer de le faire atterrir dans les lots situés en bas du jeu." />
        <meta name="twitter:image" content="http://demonisblack.com/code/2020/superplinko/game/share.jpg" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<script>
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement("style");
            msViewportStyle.appendChild(
                document.createTextNode(
                    "@-ms-viewport{width:device-width}"
                )
            );
            document.getElementsByTagName("head")[0].
                appendChild(msViewportStyle);
        }
        </script>

        <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!-- PERCENT LOADER START-->
    	<div id="mainLoader"><img src="assets/loader.png" /><br/><span>0</span></div>
        <!-- PERCENT LOADER END-->
        
        <!-- CONTENT START-->
        <div id="mainHolder">
        
        	<!-- BROWSER NOT SUPPORT START-->
        	<div id="notSupportHolder">
                <div class="notSupport">VOTRE NAVIGATEUR WEB NE SUPPORTE PAS CE JEU.<br/>METTEZ LE A JOUR OU CHANGEZ DE NAVIGATEUR WEB POUR JOUER</div>
            </div>
            <!-- BROWSER NOT SUPPORT END-->
            
            <!-- ROTATE INSTRUCTION START-->
            <div id="rotateHolder">
                <div class="mobileRotate">
                	<div class="rotateImg"><img src="assets/rotate.png" /></div>
                    <div class="rotateDesc">Mettez votre appareil en mode <br/>portrait</div>
                </div>
            </div>
            <!-- ROTATE INSTRUCTION END-->
            
            <!-- CANVAS START-->
            <div id="canvasHolder">
                <canvas id="gameCanvas" width="768" height="1024"></canvas>
                <canvas id="p2Canvas" width="768" height="1024" style="pointer-events:none; display:none;"></canvas>
            </div>
            <!-- CANVAS END-->
            
        </div>
        <!-- CONTENT END-->
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
        
        <script src="js/vendor/detectmobilebrowser.js"></script>
        <script src="js/vendor/createjs.min.js"></script>
		<script src="js/vendor/TweenMax.min.js"></script>
        <script src="js/vendor/p2.min.js"></script>
        
        <script src="js/plugins.js"></script>
        <script src="js/sound.js"></script>
		<script src="js/canvas.js"></script>
        <script src="js/p2.js"></script>
        <script src="js/game.js"></script>
        <script src="js/mobile.js"></script>
        <script src="js/main.js"></script>
        <script src="js/loader.js"></script>
        <script src="js/init.js"></script>
    </body>


</html>