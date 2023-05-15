class UserData
{
    
    //[Database]
    //
        static username = "test_username";
        static user_id = 1;
        static game_id = 1;
        static free_clicks = 33312345;
        static stars = 1269131;
    //

    static change_free_clicks(rel)
    {
        if(UserData.free_clicks >= Math.abs(rel))
            Socketting.update_free_clicks(rel);
        
        UserData.free_clicks = Math.max(0, UserData.free_clicks + rel);
        //database altering

    }

    static change_stars(rel)
    {
        UserData.stars = Math.max(0, UserData.stars + rel);
        //database altering
        UserData.change_free_clicks(GlobalAttributes.SPINS_WON_FOR_1_STAR);
    }
    
}
