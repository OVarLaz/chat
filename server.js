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
users = {};
io.on('connection', function(socket) {
    //console.log(io.io.engine.id);
    console.log("Connected");
    //console.log(this.socket.sessionid);
    //console.log(socket);

    io.clients((error, clients) => {
        if (error) throw error;
        console.log(clients); // => [PZDoMHjiu8PYfRiKAAAF, Anw2LatarvGVVXEIAAAD]
    });

    socket.on('sendChatToServer', function(message){
        console.log(message);
        io.sockets.emit('serverChatToClient', message);
        io.sockets.emit('serverChatToClientadm', message);    
    });

    socket.on('disconnect', function(socket){
        console.log('leaved');
        
    });
});