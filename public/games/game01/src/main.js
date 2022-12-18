//simport GameplayScene from Scenes;
var jQueryScript = document.createElement('script');
var jQueryScript2 = document.createElement('script');
jQueryScript.setAttribute('src','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
jQueryScript2.setAttribute('src','https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js');
document.head.appendChild(jQueryScript);
document.head.appendChild(jQueryScript2);

var config = 
{
    type: Phaser.AUTO,
    backgroundColor: 0xCCCCCC,
    scale: 
    {
        //parent: 'gameBody', 
        parent: 'gameBody',
        mode: Phaser['Scale']['FIT'],
        width: 1111,
        height: 666
    
    },
    fps: 
    {
      target: 60,
      min: 60,
      forceSetTimeOut: true
    },
    scene:
        [PreloaderScene,
        GameplayScene]
};
game = new Phaser['Game'](config);

//Socket:
//
    //Previously with node socket:
    //
        //game.socket = io();
    //

    //Placeholder:
    //
        game.socket_id = "a21dwd3j";
    //
//

function preload()
{
    
}

function create()
{
    
}
