$(document).ready(function () {
	$("#posts .postscontents").hide();
	$("#postscontent_pic").show();
	$("#controlpanel").hide();
});

function filterbtn_onclick(para){
	$("#controlpanel").show();
	$("#controlpanel .c_panels").hide();
	switch(para){
		case 1:
			$("#controlpanel #c_panel1").show();
			break;
		case 2:
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