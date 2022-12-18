class PreloaderScene extends Phaser.Scene
{
    
    additional_load_timer = 1 * 60;
    loading_text;

    constructor()
    {
        super('PS');
    }

    preload()
    {
        this.loading_text = this.add.text(400, 222, 'Loading...', { fontFamily: 'Arial', fontSize: '77px', fill: '#FFFFFF', 
                                                                   stroke: '#222222', strokeThickness: 3});
        
        Socketting.ask_new_player();
        
        this.load.image('Crate', 'assets/CrateThingy.png');
        this.load.image('Smoke', 'assets/SmokeThingy0001.png');
        
        this.load.image('Fruit1', 'assets/grapes_purple.png');
        this.load.image('Fruit2', 'assets/strawberry.png');
        this.load.image('Fruit3', 'assets/watermelon.png');
        this.load.image('Fruit4', 'assets/lemon.png');
        this.load.image('Fruit5', 'assets/pineapple.png');
        this.load.image('Fruit6', 'assets/orange.png');
        this.load.image('Fruit7', 'assets/banana.png');
        this.load.image('Fruit8', 'assets/pear.png');
        
        this.load.image('Button', 'assets/Button.png');
        this.load.image('ButtonSmall', 'assets/ButtonSmall.png');
        
        this.load.image('SideMenu', 'assets/SideMenu.png');
        this.load.image('WinTableSideMenu', 'assets/WinTableSideMenu.png');
        this.load.image('FullScreenButton', 'assets/FullScreenButton.png');
        this.load.image('SoundsButtonOn', 'assets/SoundButtonOn.png');
        this.load.image('SoundsButtonOff', 'assets/SoundButtonOff.png');
        
        this.load.image('WelcomePanel', 'assets/Welcome.png');
        this.load.image('WinListPanel', 'assets/WinListPanel.png');
        this.load.image('InstructionsPanel', 'assets/InstructionsPanel.png');
        this.load.image('CloseButton', 'assets/CloseButton.png');
        
        this.load.image('Diamond', 'assets/Diamond.png');
        
        this.load.audio('snd_button', 'assets/buttonSound.wav');
        this.load.audio('snd_crate_smash', 'assets/crateSmashSound.wav');
        this.load.audio('snd_win', 'assets/winSound.wav');
        this.load.audio('snd_invalid', 'assets/invalidPress.wav');
    }
    
    update() //updare
    {
        if (this.additional_load_timer > 0)
        {
            this.additional_load_timer--;
        }
        else
        {
            this.scene.start('GS');
        }
    }
    
}
