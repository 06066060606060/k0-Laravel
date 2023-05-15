class Socketting {
    static socket;

    static init_socket() {
        Socketting.socket = io.connect();
        //Events
        //
        //It should trigger after a click is sent, for all players
        Socketting.socket.on("receive_click",
            function (data) {
                if (data.user_name != UserData.username) {
                    //Check if from other player
                    GameplayScene.receive_message_move(data.row, data.column, data.gid);
                }
            }
        );

        Socketting.socket.on("receive_grid_data",
            function (data) {
                if (data.user_name == UserData.username) {
                    //Check if from requester(This player)
                    Grid.load_grid_data(data);
                    //GameplayScene.receive_message_move(data.row, data.column, data.user_name, data.gid);
                }
            }
        );

        //
        
    }

    //Init connect
    //
    static ask_new_player() {
        console.log("Started up Phaser project. New player event emit");
        //Emit new player event to trigger on_new_player_event
        Socketting.socket.emit("newplayer",  UserData.username, UserData.user_id);
    }

    //Send socket id to server, adding new p on server then. Socket id is used to check if click received is from another player
    static connect_with_server(user_name, user_id) {
        console.log("socket id sent to server: " + user_name);
        Socketting.socket.emit("connect_with_server", { user_name: user_name});
    }
    //

    //Grid
    //
    static get_server_grid_data() {
        Socketting.socket.emit("get_server_grid_data", {
            user_name: UserData.username,
        });
    }

    static transmit_grid_data_to_server() {
        Socketting.socket.emit("grid_data_transmission_to_server", {
            grid_data: Grid.this_instance.grid_data,
            grid_data_box_open: Grid.this_instance.grid_data_box_open,
            grid_id: Grid.this_instance.grid_id,
        });
    }
    //

    //Sending player action to server
    //
    /// When player clicks on a box
    static send_click(row, column, user_name, gid) {
        //Emit for trigerring on_receive_click_event:
        Socketting.socket.emit("click", {
            row: row,
            column: column,
            user_name: user_name,
            gid: gid,
        });
    }
    //

    //Misc
    //
    static refresh_server() {
        Socketting.socket.emit("refresh_server");
    }
    //

    /*_________________________*___________________________*/

    //Events
    //
    //It should trigger after the player click in 15 Games for 1 Star
    static add_parties_for_stars(parties, stars) { 
        Socketting.socket.emit("add_parties_for_stars", {
            parties: parties,
            stars: stars,
        });
    }

    //It should trigger after the player's score increase
    static send_score_increase(score) {
        Socketting.socket.emit("score_increase", {
            score: score,
        });
    }

    static update_free_clicks(free_clicks) {
        Socketting.socket.emit("update_free_clicks", {
            free_clicks: free_clicks,
        });
    }

    /*_________________________*___________________________*/

}
