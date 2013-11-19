var stepcompleted1 = false;
var stepcompleted2 = false;
var picuploaded = [];
var distributers = [];
var picmaxnum = 9;

$(document).ready(function () {
	$("#posts .postscontents").hide();
	$("#postscontent_pic").show();
	$("#controlpanel").hide();
	$("#controlpanel #c_panelpic #uploadpics #upload_fileuploader").hide();
	//$("#controlpanel #c_panel2 #cpanel2_btn1").hide();
	//$("#cpanel2_fileuploader").hide();
	stepcompleted1 = false;
	stepcompleted2 = false;
	$("#controlpanel #c_panelpic #announce_visiblility").hide();
	$("#c_panelpic #uploadpics .uploadpictures").hide();
});

function filterbtn_onclick(para){
	$("#controlpanel").show();
	$("#controlpanel .c_panels").hide();
	$("#controlpanel #c_panelpic").hide();
	switch(para){
		case 1:
			$("#controlpanel #c_panel1").show();
			break;
		case 2:
			//init_filepanels();
			distributer_select(0);
			$("#controlpanel #c_panelpic #uploadbtntext_right #picleftnum").html(String(picmaxnum - picuploaded.length));
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("公开发表");
			$("#controlpanel #c_panelpic").show();
			break;
		case 3:
			$("#controlpanel #c_panel3").show();
			break;
		case 4:
			$("#controlpanel #c_panel4").show();
			break;
		case 5:
			$("#controlpanel #c_panel5").show();
			break;
		default:
	}
	z_align();
}

function posterbtn_onclick(para){
	$("#posts .postscontents").hide();
	switch(para){
		case 1:
			$("#postscontent_txt").show();
			break;
		case 2:
			$("#postscontent_pic").show();
			break;
		case 3:
			$("#postscontent_res").show();
			break;
		case 4:
			$("#postscontent_ado").show();
			break;
		default:
	}
	z_align();
}

function checkload(){
	alert("!");
	document.execCommand('SaveAs');
}

function init_filepanels(){
	//$("#controlpanel #c_panel2 .picuploads").hide();
	//$("#controlpanel #c_panel2 #picupload1").show();
	//$("#controlpanel #c_panel2 #cpanel2_btn1").show();
	stepcompleted1 = false;
	stepcompleted2 = false;
}

function trigger_filebox(){
	$("#controlpanel #c_panelpic #uploadpics #upload_fileuploader").trigger("click");
}
function begin_upload_image(){ //上传一张图片
	if(picuploaded.length >= picmaxnum){
		alert("无法上传更多的图片");
		return;
	}
	//alert("Upload your own image");
	//show.document.execCommand('SaveAs');
	picuploaded.push(picuploaded.length + 1);
	//document.getElementById("cpanel2_fileuploader").value = "";
	redraw_images();
	//alert($("#controlpanel #c_panelpic #uploadpics #upload_fileuploader").value);
	//alert(document.getElementById('upload_fileuploader').value);
	document.getElementById('upload_fileuploader').value = "";
	//alert(document.getElementById('upload_fileuploader').value);
}
function cancel_an_image(pos){ //取消一张图片
	if(pos >= picuploaded.length){
		return;
	}
	picuploaded = arraydeleteelement(picuploaded, pos);
	redraw_images();
}
function redraw_images(){ //重画预览图片
	for(var s = 0; s < picmaxnum; s++){
		if(s < picuploaded.length){
			document.getElementById("uploadpicture" + String(s + 1)).src = "images/" + String(picuploaded[s]) + ".jpg";
			$("#c_panelpic #uploadpics #uploadpicture" + String(s + 1)).show();
		}else{
			document.getElementById("uploadpicture" + String(s + 1)).src = "images/blank.png";
			$("#c_panelpic #uploadpics #uploadpicture" + String(s + 1)).hide();
		}
	}
	$("#controlpanel #c_panelpic #uploadbtntext_right #picleftnum").html(String(picmaxnum - picuploaded.length));
}

function textcomplete(){
	stepcompleted2 = true;
}

function distributer_select(new_distributer){
	var k = -1;
	if(distributers.length <= 0){
		distributers.push(new_distributer);
	}else{
		k = $.inArray(new_distributer, distributers);
		if(k < 0){
			distributers.push(new_distributer);
		}else{
			distributers.splice(k, 1);
		}
	}
	$("#controlpanel #c_panelpic #triangle .triangles").hide();
	if(distributers.length > 0){
		for(var t = 0; t < distributers.length; t++){
			$("#controlpanel #c_panelpic #triangle #triangle" + distributers[t]).show();
		}
	}
}
function cancel_distribute(){
	$("#controlpanel #c_panelpic").hide();
	$("#controlpanel").hide();
}
function turn_on_visibility(){
	$("#controlpanel #c_panelpic #announce_visiblility").show();
}
function turn_off_visibility(ann){
	switch(ann){ //谁可见？
		case 0:
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("公开发表");
			break;
		case 1:
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("粉丝可见");
			break;
		default:
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("留给自己");
	}
	$("#controlpanel #c_panelpic #announce_visiblility").hide();
}
function distribute_pics(){
	var string1 = document.getElementById("upload_fileuploader").value;
	if(picuploaded.length <= 0){
		alert("发布失败——图片栏不能为空！");
	}else{
		$("#controlpanel").hide();
		alert("发布成功！");
		picuploaded = [];
		redraw_images();
		document.getElementById("upload_fileuploader").value = "";
	}
}

function getPath(obj){
	if(obj){
		if(window.navigator.userAgent.indexOf("MSIE") >= 1){
			obj.select();
			return document.selection.createRange().text;
		}else if(window.navigator.userAgent.indexOf("Firefox") >= 1){
			if(obj.files){
				return obj.files.item(0).getAsDataURL();
			}
			return obj.value;
		}
		return obj.value;
	}
}

function arraydeleteelement(parray, pos){ //删除数组中的指定元素
	if(pos < 0){
		return parray;
	}
	if(pos >= parray.length){
		return parray;
	}
	neoarray = [];
	for(var r = 0; r < parray.length; r++){
		if(r != pos){
			neoarray.push(parray[r]);
		}
	}
	return neoarray;
}

function alignHeight(eleA, eleB){
  if(!document.getElementById(eleA)){return false;}
  if(!document.getElementById(eleB)){return false;}
  //var heightA = document.getElementById(eleA).clientHeight;
  var heightA = document.getElementById(eleA).style.height;
  document.getElementById(eleB).style.height = heightA + "px";
  //document.getElementById(eleA).style.height = heightA + "px";
  /*
  var heightB = document.getElementById(eleB).clientHeight;
  if(heightA > heightB){
    document.getElementById(eleB).style.height = heightA + "px";
    document.getElementById(eleA).style.height = heightA + "px";
  }else{
    document.getElementById(eleA).style.height = heightB + "px";
    document.getElementById(eleB).style.height = heightB + "px";
  }
  */
}
function z_align(){
	//var Lh = document.getElementById("contentLeft");
	//var Rh = document.getElementById("contentCenter").clientHeight);
	//alert("!!!");
	//if(document.getElementById("contentLeft").clientHeight > document.getElementById("contentCenter").clientHeight){
	//	alert(document.getElementById("contentLeft").clientHeight);
	//}else{
	//	alert(document.getElementById("contentCenter").clientHeight);
	//}
	//alert(document.getElementById("contentLeft").clientHeight);
	//alert(document.getElementById("contentCenter").clientHeight);
	//document.getElementById("contentLeft").style.height = document.getElementById("contentCenter").clientHeight;
}

window.onload =
function z_align_1(){
	//Lh.style.height = Rh.offsetHeight + "px";
}