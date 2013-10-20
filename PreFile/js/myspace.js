var stepcompleted1 = false;
var stepcompleted2 = false;

$(document).ready(function () {
	$("#posts .postscontents").hide();
	$("#postscontent_pic").show();
	$("#controlpanel").hide();
	$("#controlpanel #c_panel2 .picuploads").hide();
	$("#controlpanel #c_panel2 #cpanel2_btn1").hide();
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
	$("#controlpanel #c_panel2 #cpanel2_btn1").hide();
	stepcompleted1 = false;
	stepcompleted2 = false;
}

function expand_filepanels(exp){
	switch(exp){
		case 2:
			$("#controlpanel #c_panel2 #picupload2").show();
			stepcompleted1 = true;
			if(stepcompleted2){
				$("#controlpanel #c_panel2 #cpanel2_btn1").show();
			}
			break;
		case 3:
			$("#controlpanel #c_panel2 #picupload3").show();
			break;
		case 4:
			$("#controlpanel #c_panel2 #picupload4").show();
			break;
		case 5:
			$("#controlpanel #c_panel2 #picupload5").show();
			break;
		case 6:
			$("#controlpanel #c_panel2 #picupload6").show();
			break;
		default:
	}
}

function textcomplete(){
	stepcompleted2 = true;
	if(stepcompleted1){
		$("#controlpanel #c_panel2 #cpanel2_btn1").show();
	}
}

function distribute_pics(){
	$("#controlpanel").hide();
	alert("发布成功！");
}
