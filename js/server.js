var express =  require('express'),
	app = express(),
	server = require('http').createServer(app),
	io = require('socket.io').listen(server),
	users = {};

server.listen(8080);

io.sockets.on('connection', function(socket){
	
	socket.on('new user', function(data, callback){
		socket.nickname = data;
		users[socket.nickname] = socket;
		updateNicknames();
	}); 

	function updateNicknames(){
		io.sockets.emit('usernames', Object.keys(users) );
	}

	socket.on('send message', function(data, callback){
		var msg = data.trim();
		var senderIndex = msg.indexOf('-');
		var sender = msg.substring(0, senderIndex);
		var recieverIndex = msg.indexOf('=');
		var reciever = msg.substring(senderIndex + 1, recieverIndex);
		var message = msg.substring(recieverIndex + 1);
		if (sender in users && reciever in users){
			users[reciever].emit('new message', {msg: message, sender: socket.nickname, reciever: reciever});
		} else {
			callback('--<b style="color: red;">Error: User has disconnected</b>');
		}
	});

	socket.on('disconnect', function(data){
		if(!socket.nickname) return; //IF NOT SET JUST 'RETURN OUT'
		var exiter = socket.nickname;
		delete users[socket.nickname];
		updateNicknames();
		io.emit('logout', {exiter: exiter});

	});
	
	socket.on('boot user', function(data){
		var target = data;
		if(target in users){
			users[target].emit('eject');
		}
	});
});


