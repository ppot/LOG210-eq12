var mysql  = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  port : 8889,
  user     : 'root',
  password : 'root',
  database : 'LOG210'
});

connection.connect();

exports.getOrders = function(restaurantId,callback){
	connection.query("SELECT * FROM orders WHERE restaurant_id=? AND state=1", [restaurantId], function(err, results, fields) {
	callback(results);
 });
}

exports.getOrdersReady = function(callback){
	connection.query("SELECT * FROM orders WHERE state=2", function(err, results, fields) {
	callback(results);
 });
}

exports.singleOrderReady = function(oId,callback){
	connection.query("SELECT * FROM orders WHERE id=?", [oId] ,function(err, results, fields) {
	callback(results);
 });
}