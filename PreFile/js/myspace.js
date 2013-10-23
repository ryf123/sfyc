var stepcompleted1 = false;
var stepcompleted2 = false;
var uiRemaining;

$(document).ready(function () {
	$("#posts .postscontents").hide();
	$("#postscontent_pic").show();
	$("#controlpanel").hide();
	$("#controlpanel #c_panel2 .picuploads").hide();
	$("#controlpanel #c_panel2 #picuploadcount").hide();
	$("#controlpanel #c_panel2 #cpanel2_btn1").hide();
	$("#controlpanel #c_panel2 .previewimages").hide();
	uiRemaining = $("#controlpanel #c_panel2 #picremaining");
	stepcompleted1 = false;
	stepcompleted2 = false;
});

function filterbtn_onclick(para){
	$("#controlpanel").show();
	$("#controlpanel .c_panels").hide();
	switch(para){
		case 1:
			$("#controlpanel #c_panel1").show();
			break;
		case 2:
			init_filepanels();
			$("#controlpanel #c_panel2").show();
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
}

function checkload(){
	alert("!");
	document.execCommand('SaveAs');
}

function init_filepanels(){
	$("#controlpanel #c_panel2 .picuploads").hide();
	$("#controlpanel #c_panel2 #picupload1").show();
	$("#controlpanel #c_panel2 #cpanel2_btn1").show();
	$("#controlpanel #c_panel2 #picuploadcount").hide();
	$("#controlpanel #c_panel2 .previewimages").hide();
	stepcompleted1 = false;
	stepcompleted2 = false;
}

function expand_filepanels(exp){
	switch(exp){
		case 2:
			//alert(getPath(document.getElementById("cpanel2_file1")));
			//document.getElementById("previewimage1").src = document.getElementById("cpanel2_file1").value;
			$("#controlpanel #c_panel2 #picupload2").show();
			$("#controlpanel #c_panel2 #picuploadcount").show();
			$("#controlpanel #c_panel2 #previewimage1").show();
			uiRemaining.html(5);
			stepcompleted1 = true;
			//alert(document.container.content.contentCenter.controlpanel.c_panel2.picupload1.cpanel2_file1.value);
			//alert(document.getElementById("cpanel2_file1").valueOf());
			//alert(document.getElementById("cpanel2_file1").value);
			break;
		case 3:
			$("#controlpanel #c_panel2 #picupload3").show();
			$("#controlpanel #c_panel2 #previewimage2").show();
			uiRemaining.html(4);
			break;
		case 4:
			$("#controlpanel #c_panel2 #picupload4").show();
			$("#controlpanel #c_panel2 #previewimage3").show();
			uiRemaining.html(3);
			break;
		case 5:
			$("#controlpanel #c_panel2 #picupload5").show();
			$("#controlpanel #c_panel2 #previewimage4").show();
			uiRemaining.html(2);
			break;
		case 6:
			$("#controlpanel #c_panel2 #picupload6").show();
			$("#controlpanel #c_panel2 #previewimage5").show();
			uiRemaining.html(1);
			break;
		default:
			$("#controlpanel #c_panel2 #previewimage6").show();
			uiRemaining.html(0);
	}
}

function textcomplete(){
	stepcompleted2 = true;
}

function distribute_pics(){
	var string1 = document.getElementById("cpanel2_input2").value;
	var string2 = document.getElementById("cpanel2_file1").value;
	if(string1 == "" || string2 == ""){
		alert("发布失败——图片栏和文字栏均不能为空！");
	}else{
		$("#controlpanel").hide();
		alert("发布成功！");
		document.getElementById("cpanel2_file1").value = "";
		document.getElementById("cpanel2_file2").value = "";
		document.getElementById("cpanel2_file3").value = "";
		document.getElementById("cpanel2_file4").value = "";
		document.getElementById("cpanel2_file5").value = "";
		document.getElementById("cpanel2_file6").value = "";
		document.getElementById("cpanel2_input2").value = "";
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
