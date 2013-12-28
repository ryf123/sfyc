var columnHeight = [];
var itemscount = 0;
var columns = 4;
var marginHorizontal = 16;
var marginVertical = 16;
var picloaded = [];
var imgs = [];

$(document).ready(function () {
	for(var r = 0; r < columns; r++){
		columnHeight[r] = 0;
	}
	//arrangeStyle();
	$("#contentRight .picsitem .picsitemmiddle .photoratiofrm").hide();
	arrangeStyle_bef();
});

function columnindex(){ //统计图片数量
	itemscount += 1;
	//alert("Loaded a picture");
}

function pictloadend(){ //图片数量统计结束
	//alert("Pictures loading ended up to " + String(itemscount));
	for(var r = 0; r < itemscount; r++){
		picloaded[r] = 0;
	}
}
/*
function singlepicloadcomp(pindex){ //一张图片读取完毕
	alert("Number #" + String(pindex) + " picture load completed");
}
*/
function arrangeStyle_bef(){
	var tempobj;
	var tempimg;
	var tempimght = 0;
	var tempratio = 1.0;
	var tempht = 0;
	var temphtat = 0;
	var tempcolor1 = 0;
	var tempcolor2 = 0;
	var tempcolor3 = 0;
	var divH = 0;
	var tpitem;
	var tpiteminner;
	var tptext;
	//检查浏览器
	var browserCfg = {};
    var ua = window.navigator.userAgent;
    if (ua.indexOf("MSIE")>=1){
        browserCfg.ie = true;
    }else if(ua.indexOf("Firefox")>=1){
        browserCfg.firefox = true;
    }else if(ua.indexOf("Chrome")>=1){
        browserCfg.chrome = true;
    }
	for(var r = 0; r < itemscount; r++){
		tempobj = document.getElementById("picsitemnb" + String(r));
		tempratio = parseFloat(document.getElementById("photoratio" + String(r)).value);
		tempratio = (tempratio == 0 ? 2 : tempratio);
		//整理图片大小
		tempimg = document.getElementById("picsnb" + String(r));
		tempimg.style.width = String(204) + "px";
		tempimg.style.height = String(204.0 / tempratio) + "px";
		//整理文字区
		tpitem = document.getElementById("commentcontainer" + String(r));
		tpiteminner = document.getElementById("commenttopic" + String(r));
		while (tpiteminner.clientHeight > tpitem.clientHeight + 4){
			tptext = tpiteminner.innerText.replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "...");
			//alert(tptext);
			tpiteminner.innerText = tptext;
		};
		if(r < columns){ //位于第一行
			tempobj.style.top = "24px";
			columnHeight[r] = tempobj.clientHeight + 24;
			tempobj.style.left = String(24 + (r % columns) * (tempobj.clientWidth + marginHorizontal)) + "px";
		}else{ //位于第一行之下
			//看哪一列最短
			tempht = columnHeight.min();
			temphtat = columnHeight.minat();
			tempobj.style.left = String(24 + temphtat * (tempobj.clientWidth + marginHorizontal)) + "px";
			tempobj.style.top = String(columnHeight[temphtat] + marginVertical) + "px";
			columnHeight[temphtat] += tempobj.clientHeight + marginVertical;
		}
		//更改颜色
		tempcolor1 = 255;
		tempcolor2 = 255;
		tempcolor3 = 255;
		tempobj.style.backgroundColor = "#" + (tempcolor1 * 65536 + tempcolor2 * 256 + tempcolor3).toString(16);
	}
	tempht = columnHeight.max();
	document.getElementById("contentRight").style.height = String(tempht - 8) + "px";
}

/*
window.onload = function z_align_1(){ //所有图片读取完毕
	//alert("Pics Loaded");
	arrangeStyle();
}

function arrangeStyle(){
	var tempobj;
	var tempimg;
	var tempimgwd = 0;
	var tempimght = 0;
	var tempratio = 1.0;
	var tempht = 0;
	var temphtat = 0;
	var tempcolor1 = 0;
	var tempcolor2 = 0;
	var tempcolor3 = 0;
	for(var r = 0; r < itemscount; r++){
		tempobj = document.getElementById("picsitemnb" + String(r));
		//整理图片大小
		tempht = parseFloat(document.getElementById("photoratio" + String(r)).value);
		tempht = (tempht == 0 ? 2 : tempht);
		alert(tempht);
		tempimg = document.getElementById("picsnb" + String(r));
		tempimgwd = tempimg.offsetWidth;
		tempimgwd = (tempimgwd < 16 ? 16 : tempimgwd);
		tempimght = tempimg.offsetHeight;
		tempimght = (tempimght < 16 ? 16 : tempimght);
		tempratio = 1.0 * tempimght / tempimgwd;
		tempimgwd = 220;
		tempimght = tempimgwd * tempratio;
		tempimg.style.width = String(tempimgwd) + "px";
		tempimg.style.height = String(tempimght) + "px";
		if(r < columns){ //位于第一行
			tempobj.style.top = "4px";
			columnHeight[r] = tempobj.clientHeight + 4;
			tempobj.style.left = String(6 + (r % columns) * (tempobj.clientWidth + marginHorizontal)) + "px";
		}else{ //位于第一行之下
			//看哪一列最短
			tempht = columnHeight.min();
			temphtat = columnHeight.minat();
			tempobj.style.left = String(6 + temphtat * (tempobj.clientWidth + marginHorizontal)) + "px";
			tempobj.style.top = String(columnHeight[temphtat] + marginVertical) + "px";
			columnHeight[temphtat] += tempobj.clientHeight + marginVertical;
		}
		//更改颜色
		tempcolor1 = Math.floor(Math.random() * 32 + 224);
		tempcolor2 = Math.floor(Math.random() * 32 + 224);
		tempcolor3 = Math.floor(Math.random() * 32 + 224);
		//alert((tempcolor1 * 65536 + tempcolor2 * 256 + tempcolor3).toString(16));
		tempobj.style.backgroundColor = "#" + (tempcolor1 * 65536 + tempcolor2 * 256 + tempcolor3).toString(16);
	}
	tempht = columnHeight.max();
	document.getElementById("contentRight").style.height = String(tempht - 8) + "px";
}
*/

//最小值

Array.prototype.min = function(){
	var min = this[0];
	var len = this.length;
	for(var i = 1; i < len; i++){
		if(this[i] < min){
			min = this[i];
		}
	}
	return min;
}
Array.prototype.minat = function(){
	var min = this[0];
	var minat = 0;
	var len = this.length;
	for(var i = 1; i < len; i++){
		if(this[i] < min){
			min = this[i];
			minat = i;
		}
	}
	return minat;
}

//最大值

Array.prototype.max = function(){
	var max = this[0];
	var len = this.length;
	for(var i = 1; i < len; i++){
		if(this[i] > max){
			max = this[i];
		}
	}
	return max;
}
Array.prototype.maxat = function(){
	var max = this[0];
	var maxat = 0;
	var len = this.length;
	for(var i = 1; i < len; i++){
		if(this[i] > max){
			max = this[i];
			maxat = i;
		}
	}
	return maxat;
}
