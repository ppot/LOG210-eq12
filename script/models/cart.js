function  Cart () {
	this.items = new Array();
}

Cart.prototype.add = function(item) {
	this.items.push(item);
};

Cart.prototype.find = function(id){
	if(this.items.length>0){
		for (var i = 0; i < this.items.length; i++) {
			if(this.items[i].id == id){
				return i;
			}
		}
	}
	return null;
}

Cart.prototype.remove = function(id) {
	if(this.items.length>0){
		for (var i = 0; i < this.items.length; i++) {
			if(this.items[i].id == id){
				this.items.splice(i,1);
			}
		}
	}
};

Cart.prototype.total = function(){
	var total = 0;
	for (var i = 0; i < this.items.length; i++) {
		total+=parseFloat(this.items[i].qte * this.items[i].plat.price);
	}
	return total.toFixed(2);
}