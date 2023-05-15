//Set up
//
var express = require("express");
var app = express();
var server = require("http").Server(app);
var io = require("socket.io").listen(server);

var mysql = require('mysql');

app.use(express.static(__dirname + "/public"));
app.use("/css", express.static(__dirname + "/css"));
app.use("/assets", express.static(__dirname + "/assets"));
app.use("/src", express.static(__dirname + "/src"));

app.get("/", function (req, res) {
  res.sendFile(__dirname + "/index.html");
});
//

//Port and listening on port
//
var port = process.env.PORT || 8081;
server.listen(port, () => {
    console.log("_______________________________________________________");
    console.log(`Crates Server listening on ${port}`);
    console.log("_______________________________________________________");
    //ASCII art
    //
    console.log("...");
    console.log("________________________");
    console.log("[ ][A][ ][ ][P][ ][ ][ ]");
    console.log("[ ][ ][ ][ ][ ][ ][C][ ]");
    console.log("[A][ ][B][B][B][A][C][ ]");
    console.log("[ ][ ][G][ ][ ][ ][C][ ]");
    console.log("[A][ ][G][ ][ ][P][ ][ ]");
    console.log("[ ][ ][G][ ][ ][ ][ ][ ]");
    console.log("");
    console.log(".________________.");
    console.log("|________________|");
    console.log("||      __      ||");
    console.log("||     /        ||");
    console.log("||        |     ||");
    console.log("||       /      ||");
    console.log("||      .       ||");
    console.log("||      []      ||");
    console.log("||______________||");
    console.log(".________________.");
    console.log("________________________");
    console.log("...");
  //
});
//

//Database

// Connection to MySQL

    
//Server handled variables
//
//Players list
//
server.players = [];
server.list_players = function () {
    console.log("...");
    console.log("Server players count: " + server.players.length);
    console.log("Players list:");
    for (var i = 0; i < server.players.length; i++) {
        console.log(i + 1 + ") " + server.players[i].user_name);
    }
    console.log("...");
};

//

//Grid
//
server.grid_data = null;
server.grid_data_box_open = null;
server.grid_id = 1;
//
//

//Socketting
//
io.on("connection", function (socket) {

    let played_parties = 0;
    let score = 0;
    let user_id = null;

    //Players connecting and disconnect
    //
    socket.on("newplayer",
        function (user_name, user_id) {
            user_id = UserData.user_id;
            socket.player = {
                user_name: user_name,
            };
            console.log("...");
            console.log("New player with username: " + user_name);
            console.log("...");

            socket.on("disconnect", function () {
    
                /*_________________________*___________________________*/

                updatePalyerScore(user_id, score);
                
                updatePlayerParties(user_id, played_parties);
    
                /*_________________________*___________________________*/

                console.log("socket on disconnect: " + user_name);
                io.emit("on_disconnect", socket.player.user_name);

                for (var i = 0; i < server.players.length; i++) {
                    if (server.players[i].user_name == socket.player.user_name) {
                        console.log(
                        "server.players removing user name: " + socket.player.user_name
                        );
                        server.players.splice(i, 1);
                        break;
                    }
                }
                server.list_players();
            });
        }
    );

    socket.on("connect_with_server",
        function (data /*(user_name)*/) {
            //Check if such player not joined already
            var already_such_player = false;
            for (var i = 0; i < server.players.length; i++) {
                if (server.players[i].user_name == data.user_name) {
                    already_such_player = true;
                    break;
                }
            }

            if (!already_such_player) {
                server.players.push(data);
                console.log("...");
                console.log(
                "Username: " + data.user_name + " added on server player list"
                );
                console.log("...");
                server.list_players();
            }
            else {
                console.log("Already such player active... (" + data.user_name + ")");
            }
        }
    );
    //

    //Server receiving data
    //
    //Grid
    //
    socket.on("grid_data_transmission_to_server",
        function (data) {
            server.grid_data = data.grid_data;
            server.grid_data_box_open = data.grid_data_box_open;
            server.grid_id = data.grid_id;
        }
    );
  //
  //

  //Broadcasts
  //
  //Broadcasting player actions
  //
    socket.on("click",
        function (data) {
            server.grid_data_box_open[data.row][data.column] = true;
            io.emit("receive_click", data);
        }
    );
  //

  //Broadcasting grid
  //
    socket.on("get_server_grid_data",
        function (data) {
            io.emit("receive_grid_data", {
                user_name: data.user_name,
                grid_data: server.grid_data,
                grid_data_box_open: server.grid_data_box_open,
                grid_id: server.grid_id,
            });
        }
    );
  //
  //

  //Resets server data
    socket.on("refresh_server",
        function () {
            
            console.log("Refreshing server data");
            server.players = [];
        }
    );

    /*_________________________*___________________________*/

    // when the client click on 15 Games for 1 Star, we should add 15 parties to the player's parties and remove 1 star from the player's stars
    socket.on("add_parties_for_stars",
        function (data) {

            updatePlayerParties(user_id, data.parties);
            updatePlayerStars(user_id, data.stars);

        }
    );

    // when the players's score is updated, we should update the player's score on the database
    socket.on("score_increase",
        function (data) {
            score += Number(data.score);
        }
    );

    socket.on("update_free_clicks",
        function (data) {
            played_parties += -1 * Number(data.free_clicks);
        }
    );

    /*_________________________*___________________________*/

});

    
/*_________________________*___________________________*/


//Database functions

var mysql = require('mysql2');

var con = mysql.createConnection({
    host: 'localhost',
    user: 'gokdo_user',
    password: 'Gokdowpss10',
    database: 'gokdo_database'
});

function executeQuery(sql) {

    pool.getConnection((err, connection) => {

        if (err) throw err;
        
        connection.query(sql, (err, data) => {

            connection.release();
                    
            if(!err)
            {
                console.log("Query executed:");
            }
            else 
            {
                console.log("error: " + err);
            }
        });
    });
}

/**
 * TABLE user{
 *  id INT PRIMARY KEY,
 * name VARCHAR,
 * score INT,
 * parties INT,
 * stars INT
 * }
 */

function updatePalyerScore(user_id, score) {

    var sql = "UPDATE users SET trophee1 = trophee1 + " + score + " WHERE id = '1'";
    executeQuery(sql);

}

function updatePlayerParties(user_id, parties) {
    
    var sql = "UPDATE users SET parties = parties - " + parties + " WHERE id = " + user_id;
    executeQuery(sql);
}

function updatePlayerStars(user_id, starts) {
    
    var sql = "UPDATE users SET trophee2 = trophee2 - " + starts + " WHERE id ='1'";
    executeQuery(sql);
}
    
/*_________________________*___________________________*/

//
//*Col 33
//333
