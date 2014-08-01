var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var db = require("./db.js");

app.get('/', function(req, res){
});

io.on('connection', function(socket){
	console.log('user connected');

	// get orders from database
	socket.on('getOrders',function (restaurantId){
  		db.getOrders(restaurantId,function(callback) {
  			console.log(callback);
   			io.sockets.emit('orders',restaurantId,callback);
  		});
	});

	socket.on('getOrdersReady',function (){
  		db.getOrdersReady(function(callback) {
  			console.log(callback);
   			io.sockets.emit('ordersReady', callback);
  		});	
	});

	socket.on('newDeliveryOrder',function (oId){
  		db.singleOrderReady(oId,function(callback) {
  			console.log(callback);
   			io.sockets.emit('singleOrderReady', callback);
  		});	
	});

	socket.on('newOrder',function (oId){
  		db.singleOrderReady(oId,function(callback) {
  			console.log(callback);
   			io.sockets.emit('singleNewOrder',callback);
  		});	
	});	

	socket.on('disconnect', function(){
		console.log('user disconnected');
	});
});

http.listen(3000, function(){
  console.log('listening on port:3000');
});
