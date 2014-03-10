/**
 *  Settings js file
 */

$(document).ready(function (){
	//$(".errormessage").hide ();
	allowregister ();
	autologoff();
	$("#gs_is_auto_logoff").on('click',autologoff);
	$("#gs_register").on('click',allowregister);
	
	
	
	
	$("#but_globalset").on("click",updateglobalsettings);
	
	
	/*
	 * Password Settings
	 */
	passwordsecenable ();
	$("#ps_enabled").on('click',passwordsecenable);
	$("#but_passwordset").on("click",updatepassowrdsettings);
	
});


function updateglobalsettings () {
	$('.errormessage td').remove();
	 $(".errormessage").closest("td").remove();
	var queryString = $("#frm_global_set").serialize ();
	console.log(queryString);
	$.ajax({
        url : $("#baseurl").val()+"index.php/settings/globalset",
        type : "post",
        
        dataType :'json',
          data : queryString,
        success:function (data){
        	console.log(data);
        	if(data.errorflag == true) {
        		console.log(data.errordetail);
        		errorStr = "";
        		
        		$.each( data.errordetail, function( index, value ){
        			errorStr += "<p>"+value+"</p>"
        			
        		});
        		$('.errormessage').append($("<td colspan='2'></td>").html(errorStr));
        	}else {
        		//alert("ff");
        		$('.errormessage').append($("<td colspan='2'></td>").html(data.message));
        	}
        	        }
});
}
function autologoff () {
	$('.errormessage td').remove();
	if($("#gs_is_auto_logoff").is(":checked")) {
		$(".cls_logoff").show ();
	}else {
		$(".cls_logoff").hide ();
	}
}

function allowregister () {
	$('.errormessage td').remove();
	if($("#gs_register").is(":checked")) {
		$(".register").show ();
	}else {
		$(".register").hide ();
	}
}
/*
Password settings
*/

function passwordsecenable () {
	if($("#ps_enabled").is(":checked")) {
		$("#passwordsettings").show ();
	}else {
		$("#passwordsettings").hide ();
	}
}


function updatepassowrdsettings () {
	$('.errormessage td').remove();
	 $(".errormessage").closest("td").remove();
	var queryString = $("#frm_pwdset").serialize ();
	console.log(queryString);
	$.ajax({
        url : $("#baseurl").val()+"index.php/settings/pwdset",
        type : "post",
        
        dataType :'json',
          data : queryString,
        success:function (data){
        	console.log(data);
        	if(data.errorflag == true) {
        		console.log(data.errordetail);
        		errorStr = "";
        		
        		$.each( data.errordetail, function( index, value ){
        			errorStr += "<p>"+value+"</p>"
        			
        		});
        		$('.errormessage').append($("<td colspan='2'></td>").html(errorStr));
        	}else {
        		//alert("ff");
        		$('.errormessage').append($("<td colspan='2'></td>").html(data.message));
        	}
        	        }
});
}