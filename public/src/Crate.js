class Crate extends Phaser.GameObjects.Image
{
    
    row;
    column;
    fruit = null;
    crate_opened = false;
    
    constructor(scene, x, y, row, column)
    {
        super(scene, x, y, 'Crate');
        this.row = row;
        this.column = column;
        this.scene.add.existing(this);
        this.setInteractive();
        this.on('pointerdown', function()
        {
            this.clicked();
        }, this);
    }
    
    clicked()
    {
        console.log("Clicked crate:");
        console.log(this.row + "," + this.column);
        if (!this.crate_opened)
        {
            this.scene.make_new_smoke_effect(this.x + 15 + 3, this.y + 15 + 3);
            if (this.fruit != null)
            {
                this.fruit.alpha = 1.0;
                this.scene.score_increase(Fruit.FRUIT_POINTS[this.fruit.type - 1]);
            }
            else
            {
                this.visible = false;
            }
            this.crate_opened = true; //trtue
        }
    }
    
}
