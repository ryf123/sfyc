
$(document).ready(function(){
	
});

function arrange_styles(){
	var tempobj;
	var tempimg;
	var tempbkg;
	var tempfrm;
	//除图片外，其他的元素也要缩小处理
	tempobj = document.getElementById("menulogoimg");
	tempobj.style.width = "180px";
	tempobj.style.height = "65px";
	tempobj = document.getElementById("board_outer");
	//alert(String(tempobj.clientWidth) + "   " + String(tempobj.clientHeight));
	tempobj.style.width = "1000px";
	tempobj.style.height = "96px";
	for(var k = 0; k < 6; k++){
		tempobj = document.getElementById("divoption" + String(k) + "img");
		tempobj.style.width = "96px";
		tempobj.style.height = "64px";
	}
}
