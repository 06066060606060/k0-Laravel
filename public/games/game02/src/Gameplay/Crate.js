class Crate extends Phaser.GameObjects.Image
{
    
    row;
    column;
    fruit = null;
    crate_opened = false;
    
    constructor(scene, x, y)
    {
        super(scene, x, y, 'Crate');
        this.scene.add.existing(this);
        this.setInteractive();
        this.on('pointerdown', function()
        {
            this.clicked();
        }, this);
    }
    
    clicked(direct_click = true)
    {
        console.log("Clicked crate: " + this.row + "," + this.column);
        if (!this.crate_opened)
        {
            var cont = false;
            if (!direct_click)
            {
                cont = true;
            }
            else
            {
                if (this.scene.check_if_moves_available())
                {
                    cont = true;
                }
            }
            if (cont)
            {   
                this.scene.make_new_smoke_effect(this.x + 15 + 3, this.y + 15 + 3);
                this.crate_opened = true; //trtue
                
                var uncovered_pear = false;
                
                if (this.fruit != null)
                {
                    this.fruit.alpha = 1.0;
                    this.fruit.display_win_points();
                    this.scene.score_increase(Fruit.FRUIT_POINTS[this.fruit.type - 1]);
                    this.scene.play_sound('snd_win');
                    if (this.fruit.type == 8) //Pear
                    {
                        this.scene.highest_val_fruit_uncovered(direct_click);
                        uncovered_pear = true;
                    }
                }
                else
                {
                    this.scene.play_sound('snd_crate_smash');
                    this.visible = false;
                }
                this.scene.grid.grid_data_box_open[this.row][this.column] = true;
                if (direct_click)
                {
                    Socketting.send_click(this.row, this.column, UserData.username, this.scene.grid.grid_id);
                    if (uncovered_pear)
                    {
                        this.scene.grid.generate_grid_data();
                        Socketting.transmit_grid_data_to_server();
                    }
                }
                console.log("New boxes open array values:");
                console.log(this.scene.grid.grid_data_box_open);
            }
        }
    }
    
}
