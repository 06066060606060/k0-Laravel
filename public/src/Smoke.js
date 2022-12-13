class Smoke extends Phaser.GameObjects.Image
{
    
    constructor(scene, x, y)
    {
        super(scene, x, y, 'Smoke');
        this.scene.add.existing(this);
    }
    
    init()
    {
        this.visible = true; //trtue
        this.alpha = 1.0;
        this.setScale(1.0);
    }
    
    update()
    {
        if (this.scaleX < 3 && this.alpha > 0.1)
        {
            this.setScale(this.scaleX + 0.1);
            this.alpha = Math.max(0, this.alpha - 0.05);
        }
        else
        {
            this.visible = false;
            this.scene.pool_smoke_effect(this);
        }
    }
    
}
