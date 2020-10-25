
window.addEventListener("scroll", function(event) {
  
    var top = this.scrollY,
  	y = window.mutualVar.screen.y ;
  	if (top > y) {
  		y += 500
  		window.mutualVar.screen.y = y ;


  	}
  
}, false);

