class WelcomePanel extends Panel
{

    constructor (scene)
    {
        super(scene, 'WelcomePanel');

        //To add new button 2 lines of code as with btn_start and btn_10_games needed
        //Buttons list
        //
            var btn_start = new WelcomeScreenButton(scene, this.BUTTONS_START_X, 0, "Play in Free Mode");
            this.buttons_array.push(btn_start);
        
            var btn_10_games = new WelcomeScreenButton(scene, this.BUTTONS_START_X, 0, 
             (GlobalAttributes.SPINS_WON_FOR_1_STAR + " Games for 1 Star"));
            this.buttons_array.push(btn_10_games);
        
            var btn_buy_more_stars = new WelcomeScreenButton(scene, this.BUTTONS_START_X, 0, "Buy more Stars");
            //Colour values for buy more stars button(Yellow):
            btn_buy_more_stars.base_tint = 0xffce52;
            btn_buy_more_stars.hover_tint = 0xffef85;
            this.buttons_array.push(btn_buy_more_stars);
        //
    }
    
}