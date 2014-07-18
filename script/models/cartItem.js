function cartItem (id,plat,qte) {
	this.id = id;
	this.plat = plat;
	this.qte = qte;
}
cartItem.prototype.updateQTE = function(qte) {
	this.qte = qte;
};

cartItem.prototype.up = function(){
	this.qte += 1;
}
cartItem.prototype.down = function(){
	this.qte -= 1;
}
cartItem.prototype.toString = function() {
	var obj = JSON.stringify(this);
	console.log(obj);
};

