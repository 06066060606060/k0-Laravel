class FullScreenButton extends CustomButton
{
    
    constructor (scene, x, y)
    {
        super(scene, x, y, 'FullScreenButton');
    }
    
    clicked()
    {   
        super.clicked();
        if (this.scene.scale.isFullscreen) 
        {
            this.scene.scale.stopFullscreen();
        } 
        else 
        {
            this.scene.scale.startFullscreen();
        }
        console.log(this.parentContainer);
    }
    
}