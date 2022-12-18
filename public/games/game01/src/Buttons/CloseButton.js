class CloseButton extends CustomButton
{
    
    constructor (scene, x, y)
    {
        super(scene, x, y, 'CloseButton');
    }
    
    clicked()
    {   
        super.clicked();
        if (this.parentContainer.status != "Hide")
        {
            this.parentContainer.hide_panel_init();
        }
    }
    
}