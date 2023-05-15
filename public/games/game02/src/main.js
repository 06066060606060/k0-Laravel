var jQueryScript = document.createElement('script');
jQueryScript.setAttribute('src','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
document.head.appendChild(jQueryScript);

var config = 
{
    type: Phaser.AUTO,
    backgroundColor: 0x8f183b,
    scale: 
    {
        parent: 'gameBody',
        mode: Phaser['Scale']['FIT'],
        width: 1111,
        height: 666
    },
    fps: 
    {
      target: 60,
      min: 60,
      forceSetTimeOut: true
    },
    scene:
        [PreloaderScene,
        GameplayScene]
};
game = new Phaser['Game'](config);


//URL Parameters
//
    //URL e.g.:
    // http://localhost:8081/?userid=1234&tk=a&user_name=usernameTest&rubis=131&gameid=10&free_game=10

    //data send by the player
    urlParams = new URLSearchParams(window.location.search);
    userId = urlParams.get('userid');
    tk = urlParams.get('tk');
    playername = urlParams.get('user_name');
    rubis = urlParams.get('rubis');
    gameid = urlParams.get('gameid');
    freegame = urlParams.get('free_game');
	paidgame = urlParams.get('parties');
	total_game = Number(freegame) + Number(paidgame);

    console.log('userid= ' + userId);
    console.log('token= ' + tk);
    console.log('name= ' + playername);
    console.log('rubis=' + rubis);
    console.log('gameid=' + gameid);
    console.log('freegame=' + freegame);

    //Assigning static vars of UserData Class to match URL params:
    //
        UserData.game_id = gameid;
        UserData.username = playername + "(" + userId + ")";
        UserData.user_id = Number(userId); //TODO: uncomment this
        UserData.free_clicks = Number(total_game); //TODO: uncomment this
        UserData.stars = Number(rubis); //TODO: uncomment this
    //

//

//Socket:
//
    Socketting.init_socket();
    game.socket = io();
//

function preload()
{
    
}

function create()
{

}
