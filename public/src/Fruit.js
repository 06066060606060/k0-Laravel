class Fruit extends Phaser.GameObjects.Image
{
    
                          //Grapes  //Strawberries  //Watermelons  //Lemons  //Pineapples  //Orange    //Banana    //Pear
    static FRUIT_POINTS = [5,       25,             50,            100,      250,          500,        750,        1000];
    type;

    constructor(scene, x, y, type)
    {
        super(scene, x, y, 'Fruit' + type);
        this.scene.add.existing(this);
        this.alpha = 0.333;
        this.type = type;
    }
    
}
