var stepcompleted1 = false;
var stepcompleted2 = false;
var picuploaded = [];
var distributers = [];
var picmaxnum = 9;
var comment_visibility = 2; //默认为公开可见

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
	$("#hidden_upload").load(function(){redraw_images();});
	document.getElementById("visibility_type").value = "public";
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

var ImgObj = new Image();
var AllowImgFileSize = 1024; //允许上传图片文件的大小 0为无限制 单位：KB   
var AllowImgWidth = 500; //允许上传的图片的宽度 ?为无限制 单位：px(像素)   
var AllowImgHeight = 500; //允许上传的图片的高度 ?为无限制 单位：px(像素)
function begin_upload_image(){ //上传一张图片
	var fileInput = document.getElementById('upload_fileuploader');
	//alert(fileInput.value);
	if(picuploaded.length >= picmaxnum){
		alert("无法上传更多的图片");
		return;
	}
	if(checkfile() == false){
		//alert("upload failed");
		return;
	}else{
		//alert("upload succeeded");
	}
	//alert("File upload succeeded");
	$("#upload_form").submit();
	//alert("Upload your own image");
	//show.document.execCommand('SaveAs');
	var path = document.getElementById('upload_fileuploader').value;
	var fileName = path.match(/[^\/\\]+$/);
	var img_src = document.getElementById('hiddenusername').value + fileName;
	picuploaded.push(img_src);	
	redraw_images();
}

//检测文件大小======================================================================
     var maxsize = 1024*1024; //1M
     var errMsg = "Please do not select too large file(Up to 1MB)";
     var tipMsg = "This browser cannot figure out the file's size";
     var browserCfg = {};
     var ua = window.navigator.userAgent;
     if (ua.indexOf("MSIE")>=1){
         browserCfg.ie = true;
     }else if(ua.indexOf("Firefox")>=1){
         browserCfg.firefox = true;
     }else if(ua.indexOf("Chrome")>=1){
         browserCfg.chrome = true;
     }
     function checkfile(){
         try{
             var obj_file = document.getElementById("upload_fileuploader");
             //alert(obj_file);
             if(obj_file.value==""){
                 alert("Please select a file to upload");
                 return false;
             }
             var filesize = 0;
             if(browserCfg.firefox || browserCfg.chrome ){
                 filesize = obj_file.files[0].size;
             }else if(browserCfg.ie){
                 var obj_img = document.getElementById('tempimg');
                 obj_img.dynsrc=obj_file.value;
                 filesize = obj_img.fileSize;
             }else{
                 alert(tipMsg);
                 return false;
             }
             if(filesize==-1){
                 alert(tipMsg);
                 return false;
             }else if(filesize>maxsize){
                 alert(errMsg);
                 return false;
             }else{
                 //alert("That's OK");
                 return true;
             }
         }catch(e){
             alert(e);
             return false;
         }
    }
//==================================================================================================

function cancel_an_image(pos){ //取消一张图片
	if(pos >= picuploaded.length){
		return;
	}
	picuploaded = arraydeleteelement(picuploaded, pos);
	redraw_images();
}
function redraw_images(){ //重画预览图片
	console.log(document.getElementById("hide_uploadpicture" + String(0 + 1)).value);
	for(var s = 0; s < picmaxnum; s++){
		if(s < picuploaded.length){
			document.getElementById("uploadpicture" + String(s + 1)).src = "images/upload/" + picuploaded[s];
			document.getElementById("hide_uploadpicture" + String(s + 1)).value = "images/upload/" + picuploaded[s];
			$("#c_panelpic #uploadpics #uploadpicture" + String(s + 1)).show();
		}else{
			document.getElementById("uploadpicture" + String(s + 1)).src = "images/blank.png";
			document.getElementById("hide_uploadpicture" + String(s + 1)).value = "";
			$("#c_panelpic #uploadpics #uploadpicture" + String(s + 1)).hide();
		}
	}
	$("#controlpanel #c_panelpic #uploadbtntext_right #picleftnum").html(String(picmaxnum - picuploaded.length));
	console.log(document.getElementById("hide_uploadpicture" + String(0 + 1)).value);
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
			document.getElementById("visibility_type").value = "public";
			comment_visibility = 2;
			break;
		case 1:
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("粉丝可见");
			document.getElementById("visibility_type").value = "fans";
			comment_visibility = 1;
			break;
		default:
			$("#controlpanel #c_panelpic #announce_functions #distribute_visibility").html("留给自己");
			document.getElementById("visibility_type").value = "self";
			comment_visibility = 0;
	}
	$("#controlpanel #c_panelpic #announce_visiblility").hide();
}
function distribute_pics(){
	//var fso, f;
	//fso = new ActiveXObject("Scripting.FileSystemObject");
	var string1 = document.getElementById("upload_fileuploader").value;
	if(picuploaded.length <= 0){
		alert("发布失败——图片栏不能为空！");
	}else{
		//检查图片大小
		//for(var k = 0; k < picuploaded.length; k++){
			//f = fso.GetFile(filestr)
		//}
		$("#topic_form").submit();
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

window.onload =function z_align_1(){
	//Lh.style.height = Rh.offsetHeight + "px";
}