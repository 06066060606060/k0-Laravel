class Socketting
{

//030317
    
    static ask_new_player()
    {
        console.log("Started up Phaser project. New player event emit");
        //Emit new player event to trigger on_new_player_event
            //Client.socket.emit('newplayer');
    }

    //Send socket id to server, adding new p on server then
    //Socket id is used to check if click received is from another player
    static send_socket_id_to_server(id)
    {
        console.log("socket id sent to server");
        //Client.socket.emit('player_socket_id_transmission',{id:id});
    }

    static refresh_server(id)
    {
        //Client.socket.emit('refresh_server');
    }

    static send_click(row,column, pid,gid)
    {
        //Emit for trigerring on_receive_click_event:
            //Client.socket.emit('click',{row:row,column:column,pid:pid,gid:gid});
    }

    //Events (node server server.js previously transmitted triggers for these events)
    //
    
        //It should trigger after a click is sent, for all players
        static on_receive_click_event(data)
        {
            console.log('Row: ' + data.row + ', Column: ' + data.column 
                        + '  (pid: ' + data.pid + ', gid: ' + data.gid + ')');
            GameplayScene.receive_message_move(data.row, data.column, data.pid, data.gid);
        }

        //When a new player joins. If you want keeping track of all logged in active players
        static on_new_player_event(data)
        {
            //GameplayScene.add_new_player(data.id);
        }

    //
    
    //Placeholder generating
    //
        static generate_pseudo_random_click_data(gid)
        {
            var pr_pid = "";
            for (var i = 0; i < 10; i++)
            {
                pr_pid += Phaser.Math.Between(0, 9);
            }
            var data = 
            {
                row: Phaser.Math.Between(0, 20 - 1),
                column: Phaser.Math.Between(0, 32 - 1),
                pid: pr_pid,
                gid: gid
            };
            console.log(data);
            return data;
        }
    //
    
}
