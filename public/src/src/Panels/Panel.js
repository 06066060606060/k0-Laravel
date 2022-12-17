class Panel extends Phaser.GameObjects.Container 
{
    
    //Buttons
    //
        //Position relative to Panel for first button:
        //
            BUTTONS_START_X = -110;
            BUTTONS_START_Y = -22;
        //
    
        //Vertical gap between buttons:
            BUTTONS_VERTICAL_GAP = 40;

        //Close button:
            has_a_close_button = false;
            CLOSE_BUTTON_X = 230;
            CLOSE_BUTTON_Y = -155;
            close_button = null;

        buttons_array = [];
    //
    
    //Panel swooshin'
    //
        status = "Appearing";
        Y_POS_IDLE = 300;
        anim_speed = 57;
    //

    active_panel_ind_override;

    i; //Loop var

    constructor (scene, panel_image)
    {
        super(scene);
        
        var panel = scene.add.image(0, 0, panel_image);
        this.add(panel);
        
        scene.add.existing(this);
        
        this.visible = false;
    }

    init()
    {
        this.visible = true;
        this.scene.panel_active_ind = this.scene.panels.indexOf(this, 0);
        this.x = 477;
        this.y = -200;
        
        this.active_panel_ind_override = false;
        
        this.status = "Appearing";
        this.anim_speed = 57;
        this.setDepth(3000);
        
        this.buttons_init();
        if (this.has_a_close_button)
        {
            this.close_button = new CloseButton(this.scene, this.CLOSE_BUTTON_X, this.CLOSE_BUTTON_Y);
            this.add(this.close_button);
        }
    }

    buttons_init()
    {
        //This part is automatic with assigned values
        //Sorting out y positions based on BUTTONS_START_X/Y & _VERTICAL_GAP  +  adding their textfields on this container
        for (this.i = 0; this.i < this.buttons_array.length; this.i++)
        {
            this.buttons_array[this.i].y = this.BUTTONS_START_Y + this.BUTTONS_VERTICAL_GAP * this.i;
            this.add(this.buttons_array[this.i]);
            if (this.buttons_array[this.i].text_field != null)
            {
                var x_off_set;
                switch (this.i)
                {
                    case 0:
                        x_off_set = 17.333;
                        break;
                    case 1:
                        x_off_set = 5;
                        break;
                    case 2:
                        x_off_set = 30;
                        break;
                }
                this.buttons_array[this.i].text_field.x = this.BUTTONS_START_X + 5 + x_off_set;
                this.buttons_array[this.i].text_field.y = this.BUTTONS_START_Y + this.BUTTONS_VERTICAL_GAP * this.i + 2.5;
                this.add(this.buttons_array[this.i].text_field);
            }
        }
    }

    hide_panel_init(active_panel_ind_override = false)
    {
        this.active_panel_ind_override = active_panel_ind_override;
        this.status = "Hide";
        this.anim_speed = 1;
        if (!active_panel_ind_override)
        {
            this.scene.panel_active_ind = 555;
        }
    }
    
    update()
    {
        if (this.status == "Appearing")
        {
            if (this.y < this.Y_POS_IDLE)
            {
                this.anim_speed = Math.max(1, this.anim_speed / 1.111);
                this.y = Math.min(this.y + this.anim_speed, this.Y_POS_IDLE);
            }
            else
            {
                this.status = "Idle";
            }
        }
        else if (this.status == "Hide")
        {
            if (this.y < 888)
            {
                this.anim_speed = Math.min(80, this.anim_speed * 1.20);
                this.y += this.anim_speed;
            }
            else
            {
                this.visible = false;
                this.scene.a_panel_is_active = false;
            }
        }

        for (this.i = 0; this.i < this.buttons_array.length; this.i++)
        {
            this.buttons_array[this.i].update();
        }
        
        if (this.close_button != null)
        {
            this.close_button.update();
        }
    }
    
}