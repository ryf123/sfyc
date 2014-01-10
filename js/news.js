var columnHeight = [];
var itemscount = 0;
var columns = -1;
var linewidth = 224;
var marginHorizontal = 16;
var marginVertical = 16;
var picloaded = [];
var imgs = [];
var arranged = false;
var workingarea = "news";
var photoloadarray = [];
var overallpics = 0;
var loadedpics = 0;
var photoratios = [];

Image.prototype.atgroup = [];

$(document).ready(function(){
	for(var r = 0; r < columns; r++){
		columnHeight[r] = 0;
	}
	if(columns > 0){
		arranged = true;
		arrangeStyle_bef();
	}
});

//和排版有关的函数==================================
function set_all_pics(picnum){
	overallpics = picnum;
}
function add_all_pics(){
	overallpics += 1;	
}
function reset_all_pics(){
	overallpics = 0;
}
function set_loaded_pics(picnum){
	loadedpics = picnum;	
}
function add_loaded_pics(){
	loadedpics += 1;	
}
function reset_loaded_pics(){
	loadedpics = 0;
}

function reset_everyphotoarray(){
	photoloadarray = [];
}
function init_everyphotoarray(aindex){
	photoloadarray[aindex] = [];
}
function reset_photoratios(){
	photoratios = [];
}
function init_photoratios(aindex){
	photoratios[aindex] = [];
}
function set_photoratios(aindex, bindex, targetnum){
	photoratios[aindex][bindex] = targetnum;
}

//图片读取前的预设
function readytoload(){
	
}
//读取一张图片
function onloadtest(_myobj, aindex, bindex){
	_myobj.atgroup = [aindex, bindex];
	_myobj.style.display = "inline";
	//设定排版数组
	photoloadarray[aindex][bindex] = true;
	//if(checkpicloadcomplete()){
		//arrangeStyle_bef();
	//}
	//alert("已经读取 " + String(loadedpics) + " 张图片");
	//alert(typeof(_myobj) + " " + String(aindex) + " loaded");
}
//图片读取遇到错误
function picloaderror(_myobj, aindex, bindex){
	_myobj.atgroup = [aindex, bindex];
	_myobj.style.display = "none";
	//设定排版数组
	photoloadarray[aindex][bindex] = false;
	//if(checkpicloadcomplete()){
		//arrangeStyle_bef();
	//}
	//alert("已经读取 " + String(loadedpics) + " 张图片");
	//alert(typeof(_myobj) + " " + String(aindex) + " loaded");
}
//统计：图片读取是否完成
function checkpicloadcomplete(){
	if(overallpics <= 0){
		return false;
	}
	if(photoloadarray.length <= 0){
		return false;
	}
	reset_loaded_pics();
	for(var i = 0; i < photoloadarray.length; i++){
		//alert(photoloadarray[i].length);
		if(photoloadarray[i].length > 0){
			for(var j = 0; j < photoloadarray[i].length; j++){
				add_loaded_pics();
			}
		}
	}
	//alert(String(overallpics) + "   " + String(loadedpics));
	return (overallpics <= loadedpics);
}

function init_picloadcomplete(p_size){
	//alert("Array size of photos:" + String(p_size));
	if(p_size < 1){
		return;
	}
	for(var r = 0; r < p_size; r++){
		photoloadarray.push([]);
	}
}
function setpiconload(_myobject){
	alert(_myobject);
	_myobject.onload = function(){
		alert(this.atgroup);
	}
}
function set_image_init(aindex, bindex){
	alert("Group " + aindex + " Photo " + bindex);
}

function arrangeStyle_again(cols, wid, intr, wrk){
	columns = cols;
	linewidth = wid;
	marginVertical = intr;
	marginHorizontal = intr;
	workingarea = wrk;
	if(arranged == false){
		arranged = true;
		arrangeStyle_bef();
	}
}

function columnindex(){ //统计图片数量
	itemscount += 1;
	//alert("Loaded a picture");
}

function pictloadend(){ //图片数量统计结束
	//alert("Pictures loading ended up to " + String(itemscount));
	for(var r = 0; r < itemscount; r++){
		picloaded[r] = 0;
	}
	//alert(photoratios);
}
function arrangeStyle_bef(){
	var tempobj;
	var tempimg;
	var tempbkg;
	var tempfrm;
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
	var movablecat;
	var cleft;
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
    columnHeight = [];
	for(var r = 0; r < itemscount; r++){
		tempobj = document.getElementById("picsitemnb" + String(r));
		//alert(document.getElementById("photoratio" + String(r)));
		tempratio = photoratios[r][0];
		//tempratio = parseFloat(document.getElementById("photoratio" + String(r) + "-0").value);
		//tempratio = (tempratio == 0 ? 2 : tempratio);
		tempbkg = document.getElementById("picsnb" + String(r) + "-0" + "-bk");
		if(tempratio < 0){ //图片获取错误
			tempratio = 2;
			tempbkg.style.display = "inline";
		}else{ //图片获取正确
			tempbkg.style.display = "none";
		}
		//整理图片大小
		tempbkg.style.width = String(linewidth - 20) + "px";
		tempbkg.style.height = String(1.0 * (linewidth - 20) / 2) + "px";
		tempimg = document.getElementById("picsnb" + String(r) + "-0");
		tempimg.style.width = String(linewidth - 20) + "px";
		tempimg.style.height = String(1.0 * (linewidth - 20) / tempratio) + "px";
		tempfrm = document.getElementById("upicsframe" + String(r) + "-0");
		tempfrm.style.width = String(linewidth - 20) + "px";
		tempfrm.style.height = String(1.0 * (linewidth - 20) / tempratio) + "px";
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
			tempobj.style.left = String(24 + Math.floor((r % columns) * (tempobj.clientWidth + marginHorizontal))) + "px";
		}else{ //位于第一行之下
			//看哪一列最短
			tempht = columnHeight.min();
			temphtat = columnHeight.minat();
			tempobj.style.left = String(24 + Math.floor(temphtat * (tempobj.clientWidth + marginHorizontal))) + "px";
			tempobj.style.top = String(columnHeight[temphtat] + marginVertical) + "px";
			columnHeight[temphtat] += tempobj.clientHeight + marginVertical;
		}
		//更改颜色
		tempcolor1 = 255;
		tempcolor2 = 255;
		tempcolor3 = 255;
		tempobj.style.backgroundColor = "#" + (tempcolor1 * 65536 + tempcolor2 * 256 + tempcolor3).toString(16);
		tempobj.style.display = "inline";
	}
	tempht = columnHeight.max();
	if(workingarea == "myspace"){
		document.getElementById("postscontent_pic").style.height = String(tempht - 8) + "px";
		//alert(document.getElementById("postscontent_pic").clientHeight);
		//alert(document.getElementById("contentLeft").clientHeight);
		cleft = document.getElementById("contentLeft");
		cleft.style.height = String(document.getElementById("postscontent_pic").clientHeight + 288) + "px";
		movablecat = document.getElementById("left-btmcat");
		if(cleft.clientHeight < 800){
			movablecat.style.display = "none";
		}else{
			movablecat.style.display = "inline";
			//alert(cleft.clientHeight);
			movablecat.style.top = String(cleft.clientHeight - 192) + "px";
		}
	}else{
		//document.getElementById("contentRight").style.display = "inline";
		document.getElementById("contentRight").style.height = String(tempht - 8) + "px";
	}
}

/*
		tempcolor1 = Math.floor(Math.random() * 32 + 224);
		tempcolor2 = Math.floor(Math.random() * 32 + 224);
		tempcolor3 = Math.floor(Math.random() * 32 + 224);
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
