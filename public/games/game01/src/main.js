//simport GameplayScene from Scenes;

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
