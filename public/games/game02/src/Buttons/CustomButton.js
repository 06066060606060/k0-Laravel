class CustomButton extends Phaser.GameObjects.Image
{
    
    //All derivative Button Classes utilize these and their values in update() and super constructor(). 
    //[Customizable] on each Button Class & instance of any Button Class. 555 = no tint/no text
    //
        alpha_transparent = 0.8;
        alpha_hover = 1.0;
        base_tint = "555";
        hover_tint = "0xffffaa";

        valid_click;
        clicked_frame_timer = 0;
        CFT_RESET = 0.3331 * 60;
        
        button_text = "555";
        text_field = null; //lll
        button_text_x_off_set = 5;
        button_text_y_off_set = 2;
    //

    initted = false;

    constructor(scene, x, y, sprite, button_text = "555")
    {
        super(scene, x, y, sprite);
        this.button_text = button_text;
        this.setOrigin(0,0);
        this.scene = scene;
        scene.add.existing(this);
        
        if (this.button_text != "555")
        {
            this.text_field = scene.add.text(this.x + this.button_text_x_off_set, this.y + this.button_text_y_off_set, this.button_text, { fontFamily: 'Arial', fontSize: '22px', fill: '#FFFFFF' });
        } //tjos
            
        this.alpha = this.alpha_transparent;
        
        //Click event:
        this.setInteractive();
        this.on('pointerdown', function()
        {
            this.clicked();
        }, this);
    }

    set_tint(not_hover)
    {
        var tint_to_check = (not_hover == true) ? this.base_tint : this.hover_tint;
        if (tint_to_check != 555)
        {
            this.setTint(parseInt(tint_to_check)); //333
        }
        else
        {
            this.clearTint();
        }
    }
    
    update()
    {
        if (!this.initted)
        {
            if (this.text_field != null)
            {
                this.text_field.x = this.x + this.button_text_x_off_set;
                this.text_field.y = this.y + this.button_text_y_off_set;
            }
            this.set_tint(true);
            this.initted = true;
        }
        
        //Checking for x&y offset from stage anchor if inside a container:
        var cx = 0;
        var cy = 0;
        if (this.parentContainer != null)
        {
            cx = this.parentContainer.x;
            cy = this.parentContainer.y;
        }
        
        if (this.clicked_frame_timer > 0)
        {
            this.clicked_frame_timer--;
            if (this.alpha < 1.0)
            {
                this.alpha = this.alpha_hover;
                this.set_tint(false);
            }
        }
        else
        {
            //Collision with mouse checking:
            if (this.scene.game.input.mousePointer.x > this.x + cx && this.scene.game.input.mousePointer.x < this.x + cx + this.width
                && this.scene.game.input.mousePointer.y > this.y + cy && this.scene.game.input.mousePointer.y < this.y + cy + this.height)
            {
                if (this.alpha < 1.0)
                {
                    this.alpha = this.alpha_hover;
                    this.set_tint(false);
                }
            }
            else
            {
                if (this.alpha > this.alpha_transparent)
                {
                    this.alpha = this.alpha_transparent;
                    this.set_tint(true);
                }
            }
        }
    }
    
    //valid_press is by default true. Calling with false as arg plays invalid press snd 
    clicked(valid_press = true)
    {
        this.scene.play_sound((valid_press == true) ? 'snd_button' : 'snd_invalid');
        this.clicked_frame_timer = this.CFT_RESET;
    }

}
