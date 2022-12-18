class WinListPanel extends Panel
{
    
    //[Customizable]
    //x and y pos of top-left fruit
        FRUITS_X1 = -253;
        FRUITS_Y1 = -80;
    //gaps between fruits
        FRUITS_HORIZONTAL_GAP = 286;
        FRUITS_VERTICAL_GAP = 69;

    constructor (scene)
    {
        super(scene, 'WinListPanel');
        this.has_a_close_button = true; //just putting this to true automatically gives Panel a close button
        for (this.i = 0; this.i < 8; this.i++)
        {
            var fruit = new Fruit(scene, 
                    this.FRUITS_X1 + ((this.i < 4) ? 0 : this.FRUITS_HORIZONTAL_GAP), //x
                    this.FRUITS_Y1 + ((this.i < 4) ? this.i : this.i - 4) * this.FRUITS_VERTICAL_GAP, //y
                    this.i + 1); //type
            fruit.alpha = 1.0;
            fruit.setScale(1.2);
            this.add(fruit);
            
            var text = scene.add.text(fruit.x + 30, fruit.y - 18, 
                                      Grid.NUM_OF_FRUITS_INITIAL[fruit.type - 1] + "x " + Fruit.FRUIT_POINTS[fruit.type - 1], 
                                      { fontFamily: 'Arial', fontSize: '33px', fill: '#222222' });
            this.add(text);
            
            var diamond_image = scene.add.image(fruit.x + 200, fruit.y, 'Diamond');
            diamond_image.setScale(0.8);
            this.add(diamond_image);
        }
    }
    
}