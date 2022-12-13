var config = 
{
    type: Phaser.AUTO,
    backgroundColor: 0x6B7280,
    scale: 
    {
        parent: 'gameBody', 
        mode: Phaser['Scale']['FILL'],
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
        GameplayScene
};
game = new Phaser['Game'](config);

function preload()
{
    
}

function create()
{
    
}
