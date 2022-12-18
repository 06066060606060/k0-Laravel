class SideMenu extends Phaser.GameObjects.Container 
{
    
    //Instructions and Win List buttons:
        smb1; smb2;
    //Fullscreen button, sounds button
        fsb; sb;
    
    //[Customizable]
    //x and y pos of top-left fruit
        FRUITS_X1 = 1010;
        FRUITS_Y1 = 292;
    //gaps between fruits
        FRUITS_VERTICAL_GAP = 38;

    constructor (scene)
    {
        super(scene);
        scene.add.existing(this);
        
        var bg = scene.add.image(960, 0, 'SideMenu');
        bg.setOrigin(0,0);
        this.add(bg);
        
        var win_table = scene.add.image(1037, 415, 'WinTableSideMenu');
        this.add(win_table);
    
        this.smb1 = new SideMenuButton(scene, 977, 160, "Instructions");
        this.smb2 = new SideMenuButton(scene, 977, 200, "Win List");
        this.fsb = new FullScreenButton(scene, 984, 610);
        this.sb = new SoundsButton(scene, 1050, 610);
        
        this.add(this.smb1);
        this.add(this.smb2);
        this.add(this.fsb);
        this.add(this.sb);
        
        for (this.i = 0; this.i < 8; this.i++)
        {
            var fruit = new Fruit(scene, this.FRUITS_X1, this.FRUITS_Y1 + this.i * this.FRUITS_VERTICAL_GAP, this.i + 1);
            fruit.alpha = 1.0;
            this.add(fruit);
            
            var text = scene.add.text(fruit.x + 30, fruit.y - 8, Fruit.FRUIT_POINTS[fruit.type - 1], 
                                      { fontFamily: 'Arial', fontSize: '15px', fill: '#222222' });
            this.add(text);
        }
    }
    
    update()
    {
        this.smb1.update();
        this.smb2.update();
        this.fsb.update();
        this.sb.update();
    }
    
}
