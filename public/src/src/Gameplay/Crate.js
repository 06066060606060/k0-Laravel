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
            if (this.scene.check_if_moves_available())
            {
                if (direct_click)
                {
                    Socketting.send_click(this.row, this.column, this.scene.playing_player_socket_id, this.scene.grid.grid_id);
                }
                
                this.scene.make_new_smoke_effect(this.x + 15 + 3, this.y + 15 + 3);
                this.crate_opened = true; //trtue
                
                if (this.fruit != null)
                {
                    this.fruit.alpha = 1.0;
                    this.fruit.display_win_points();
                    this.scene.score_increase(Fruit.FRUIT_POINTS[this.fruit.type - 1]);
                    this.scene.play_sound('snd_win');
                    if (this.fruit.type == 8) //Pear
                    {
                        this.scene.highest_val_fruit_uncovered(direct_click);
                    }
                }
                else
                {
                    this.scene.play_sound('snd_crate_smash');
                    this.visible = false;
                }
                this.scene.grid.grid_data_box_open[this.row][this.column] = true;
                console.log("New boxes open array values:");
                console.log(this.scene.grid.grid_data_box_open);
            }
        }
    }
    
}
