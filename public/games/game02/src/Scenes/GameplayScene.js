class GameplayScene extends Phaser.Scene {
    //wwwclass

    //socket

    //

    playing_player_socket_id;

    //

    new_grid_generated_on_playing_players_screen; //true = playing player's screen, false = another player's screen

    //essentials, objects

    //

    grid;

    object_pooler;

    crates = [];

    smoke_effects = [];

    side_menu;

    //

    //Panels

    //

    panel_active_ind = 555;

    panels = [];

    //

    points_acquired_in_session = 0;

    //When top value fruit is uncovered, timer for making new grid

    //

    timer_make_new_grid = 555;

    TMNG_START_VAL = 1.5 * 60;

    //

    //Texts

    //

    points_text;

    moves_text;

    stars_text;

    //

    sounds_enabled = true;

    static this_instance;

    //Loop vars

    i;
    j;

    constructor() {
        super("GS");

        GameplayScene.this_instance = this; //Making object of class accessible through static methods
    }

    create() {
        this.object_pooler = new ObjectPooling(this);

        this.grid = new Grid(this);

        this.background_square = this.add.rectangle(480, 634, 948, 28, 0xffffff);

        this.background_square.setStrokeStyle(2, 0x490216);

        //Texts

        this.points_text = this.add.text(50, 622, "Gains", {
            fontFamily: "Arial",
            fontSize: "22px",
            fill: "#000000",
        });

        this.moves_text = this.add.text(
            300,
            622,
            "Parties: " + UserData.free_clicks,
            { fontFamily: "Arial", fontSize: "22px", fill: "#000000" }
        );

        this.stars_text = this.add.text(606, 622, "Rubis: " + UserData.stars, {
            fontFamily: "Arial",
            fontSize: "22px",
            fill: "#000000",
        });

        this.side_menu = new SideMenu(this);

        //Panels

        this.panels.push(new WelcomePanel(this));

        this.panels.push(new WinListPanel(this));

        this.panels.push(new InstructionsPanel(this));

        this.panels[0].init();

        Socketting.get_server_grid_data();
    }

    update() {
        this.socket_id_init();

        for (this.i = 0; this.i < this.smoke_effects.length; this.i++) {
            this.smoke_effects[this.i].update();
        }

        for (this.i = 0; this.i < this.panels.length; this.i++) {
            if (this.panels[this.i].visible) {
                this.panels[this.i].update();
            }
        }

        this.side_menu.update();

        this.grid.update();

        this.make_new_grid_timer_update();
    }

    //Gameplay logic

    //

    check_if_moves_available() {
        var return_val = false;

        if (this.panel_active_ind == 555 && this.timer_make_new_grid == 555) {
            if (UserData.free_clicks > 0) {
                UserData.change_free_clicks(-1);

                this.refresh_clicks_text();

                return_val = true;
            } else {
                this.add_panel(0);
            }
        }

        return return_val;
    }

    highest_val_fruit_uncovered(direct_click) {
        console.log(
        "Highest val fruit uncovered with direct_click=" + direct_click
        );

        //direct_click = true when pressed with mouse by playing player. It's false if it's due to socket message(other player's click)

        this.timer_make_new_grid = this.TMNG_START_VAL;

        this.new_grid_generated_on_playing_players_screen = direct_click;
    }

    make_new_grid_timer_update() {
        if (this.timer_make_new_grid != 555) {
            if (this.timer_make_new_grid > 0) {
                this.timer_make_new_grid--;
            }
            else {
                if (this.new_grid_generated_on_playing_players_screen) {
                    this.grid.generate_crates();

                    this.timer_make_new_grid = 555;
                } else {
                    Socketting.get_server_grid_data();
                }
            }
        }
    }

    //

    //[Socket]

    //

    //Init

    //

    //Socket ID getting + username Transmision

    socket_id_init() {
        if (this.playing_player_socket_id == null) {
        if (this.game.socket != null) {
            if (this.game.socket.id != null) {
                this.playing_player_socket_id = this.game.socket.id;

                Socketting.connect_with_server(UserData.username, UserData.id); //TODO: add id
            }
        }
        }
    }

    //

    //Receiving other player moves

    //

    static receive_message_move(row, column, grid_id) {
        console.log("Received message move");
        GameplayScene.this_instance.grid.crates[
            row * GameplayScene.this_instance.grid.GRID_SIZE[0] + column
        ].clicked(false);

        //Override click with false arg(denoting other player click)
    }

    //

    //

    //Stats with text

    //

    score_increase(inc) {
        console.log("Score increase: " + inc);
        this.points_acquired_in_session += inc;
        
        /*______________________________*______________________________*/

        Socketting.send_score_increase(inc);

        /*______________________________*______________________________*/

        this.points_text.text = "Gains: " + this.points_acquired_in_session;

        var value = this.points_acquired_in_session;

        //$('#points', parent.document).html(value);  //cross origin error...

       
    }

    refresh_clicks_text() {
        this.moves_text.text = "Parties: " + UserData.free_clicks;
    }

    refresh_stars_text() {
        this.stars_text.text = "Rubis: " + UserData.stars;
    }

    //

    //Adding objects

    //

    add_panel(ind) {
        if (this.panel_active_ind != 555) {
            this.panels[this.panel_active_ind].hide_panel_init(true);
        }

        this.panels[ind].init();
    }

    make_new_smoke_effect(x, y) {
        var se = this.object_pooler.get_a_smoke_effect(x, y);

        se.init();

        this.smoke_effects.push(se);
    }

    //

    //Audio

    //

    play_sound(snd) {
        if (this.sounds_enabled) {
            this.sound.play(snd);
        }
    }

    //
}
