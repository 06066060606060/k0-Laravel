class SoundsButton extends CustomButton
{
    
    constructor (scene, x, y)
    {
        super(scene, x, y, 'SoundsButtonOn');
    }
    
    clicked()
    {
        this.scene.sounds_enabled = !this.scene.sounds_enabled;
        super.clicked();
        if (this.scene.sounds_enabled)
        {
            this.setTexture('SoundsButtonOn');
        }
        else
        {
            this.setTexture('SoundsButtonOff');
        }
    }
    
}