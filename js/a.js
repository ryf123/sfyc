var timeinterval=3000;
var count=-1;
var var_interval = setInterval(function(){change_pic()},timeinterval);
$(document).ready(function () {
	var index;
	$('.small-image').hover(function() {
		index = $('.small-image').index($(this)); 				
    	$('.display-image').eq(index).removeClass("opClass");
    	clearInterval(var_interval);		
	},
	function(){
		$('.display-image').eq(index).addClass("opClass");
		var_interval = setInterval(function(){change_pic()},timeinterval);
	}
);
}
);
function change_pic(){
	if(count==-1){
		$('.display-image').eq(2).addClass("opClass");
	}
	$('.display-image').eq(count).addClass("opClass");	
	count++;
	$('.display-image').eq(count).removeClass("opClass");	
	if(count==2){count=-1;}		
}
