/*
var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(8890);
io.on('connection', function (socket) {

    var redisClient = redis.createClient();
    redisClient.subscribe('message');

    redisClient.on("message", function(channel, message) {
        socket.emit(channel, message);
    });

    socket.on('disconnect', function() {
        redisClient.quit();
    });

});
*/



var io = require('socket.io')(8888);
var mysql = require('mysql');

var db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'chatatsa',
    password: ''
});
users = {};
io.on('connection', function(socket) {
    //console.log(io.io.engine.id);
    console.log("Connected");
    //var mynamespace = 

    //console.log(socket);

    io.clients((error, clients) => {
        if (error) throw error;
        console.log(clients); // => [PZDoMHjiu8PYfRiKAAAF, Anw2LatarvGVVXEIAAAD]
    });

    socket.on('sendChatToServer', function(message){
        //console.log(clients.id);
        console.log(message);
        //console.log('sendChatToServer');
        var channel = message.name;
        //console.log(channel);
        var post = {
            admin_id: 1,
            user_id: 1,
            json_message: " req.body.password",
            who_send: 1
        };

        var query = db.query('INSERT INTO conversacion VALUES ?', post, function (err, result) {
            if (err) {
                console.log(err.message);
            } else {
                console.log('success');
            }
        });
        console.log(query.sql);
        io.sockets.emit(channel, message);
        
        
        
    });

    socket.on('sendChatToClient', function (message) {
        //console.log(clients.id);
        console.log(message);
        //console.log('sendChatToClient');
        
        var channel = message.channel;
        //console.log(channel);
        
        io.sockets.emit('adminChat', message);
        io.sockets.emit(channel, message);
    });

    socket.on('disconnect', function(socket){
        console.log('leaved');
        
    });
});