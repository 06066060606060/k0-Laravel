class Fruit extends Phaser.GameObjects.Image
{
    
                          //Grapes  //Strawberries  //Watermelons  //Lemons  //Pineapples  //Orange    //Banana    //Pear
    static FRUIT_POINTS = [5,       25,             50,            100,      250,          500,        750,        1000];
    type;
    win_points_text = null;
    win_points_text2 = null;
    WPT_OFFSET = 15;

    constructor(scene, x, y, type)
    {
        super(scene, x, y, 'Fruit' + type);
        this.scene.add.existing(this);
        
        this.type = type;
    }

    init()
    {
        this.setScale(0.75);
        this.alpha = 0.333;
    }

    update()
    {
        if (this.win_points_text != null)
        {
            if (this.win_points_text.visible)
            {
                if (this.win_points_text.alpha > 0.25)
                {
                    //Brackets in Brackets yo
                    this.win_points_text.alpha /= 1.02;
                    this.win_points_text.scale = this.win_points_text.scale * 1.015;
                    this.win_points_text.y -= 3.333;     
                    this.win_points_text2.alpha /= 1.02;
                    this.win_points_text2.scale *= 1.015;
                    this.win_points_text2.y = this.win_points_text.y;
                }
                else
                {
                    this.win_points_text.visible = false;
                    this.win_points_text2.visible = false;
                }
            }
        }
    }

    display_win_points()
    {
        if (this.win_points_text == null)
        {
            this.win_points_text2 = this.scene.add.text(this.x - this.WPT_OFFSET, this.y - this.WPT_OFFSET, "+" + Fruit.FRUIT_POINTS[this.type - 1], {fontFamily: 'Arial', fontSize: '23px', fill: '#29abe2'});
            this.win_points_text = this.scene.add.text(this.x - this.WPT_OFFSET, this.y - this.WPT_OFFSET, "+" + Fruit.FRUIT_POINTS[this.type - 1], {fontFamily: 'Arial', fontSize: '22px', fill: '#FFFFFF', stroke: '#222222', strokeThickness: 3});
        }
        
        this.win_points_text.alpha = 1.2;
        this.win_points_text2.alpha = 1.5;
        
        this.win_points_text.scale = 1.0;
        this.win_points_text2.scale = 1.0;
        
        this.win_points_text2.visible = true;
        this.win_points_text.visible = true;
        
        this.win_points_text2.setDepth(1000);
        this.win_points_text.setDepth(1001);
        
        this.win_points_text.x = this.x - this.WPT_OFFSET;
        this.win_points_text.y = this.y - this.WPT_OFFSET;
        this.win_points_text2.x = this.win_points_text.x;
        this.win_points_text2.y = this.win_points_text.y;
    }
    
}
