class SideMenuButton extends CustomButton
{
    
    constructor (scene, x, y, button_text)
    {
        super(scene, x, y, 'ButtonSmall', button_text);
        
        this.alpha_transparent = 0.8;
        this.alpha = this.alpha_transparent;
        this.base_tint = 0x3311ff;
        this.hover_tint = 0xcc88ff;
        
        switch (this.button_text)
        {
            case "Instructions":
                this.button_text_x_off_set = 2;
                break;
            case "Win List":
                this.button_text_x_off_set = 20;
                break;
        }
    }
    
    clicked()
    {   
        var audio_arg = true;
        //Case values need to match text strings
        switch (this.button_text)
        {
            case "Instructions":
                if (this.scene.panel_active_ind != 2)
                {
                    this.scene.add_panel(2); //ind 2 = InstructionsPanel
                }
                else
                {
                    audio_arg = false;
                }
                break;
            case "Win List":
                if (this.scene.panel_active_ind != 1)
                {
                    this.scene.add_panel(1); //ind 1 = WinListPanel
                }
                else
                {
                    audio_arg = false;
                }
                break;
        }
        
        super.clicked(audio_arg);
    }
    
}