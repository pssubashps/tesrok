/**
 * 
 */
$(function() {
		$( "#usr_dob" ).datepicker({
			maxDate : "-18Y"
			});
	});
$(document).ready(function (){
		var baseurl = $("#baseurl").val();
		$("#usr_email").focusout(function (){
			queryString = 'usr_email='+$("#usr_email").val();
			$.ajax({
	            url : baseurl+"index.php/login/isemailunique",
	            type : "post",
	            dataType :'json',
	            data : queryString,
	            success:function (data){
	            	if(data == true) {
	            		str = "<img src='"+baseurl+"images/tick.gif' />";
	            		str += "<font color='#76A147'>Email Avialable</font>";
	            		$("#usremailcheck").html(str);
	            	}else {
	            		str = "<img src='"+baseurl+"images/wrong.jpg'/>";
	            		str += "<font color='#8C2E0B'>Email Not Avialable</font>";
	            		$("#usremailcheck").html(str);
	            	}
	     
	            }
	    });
		});
		$("#usr_phone").focusout(function (){
			
			$(this).val(phoneFormat($(this).val()));
		});
		
		$("#resend").on('click',function (){
			href = $(this).attr('href')+$("#usr_email").val();
			alert(href);
			 $(this).attr('href',href);
			//return false;
		});
		
	});
	function phoneFormat(phone) {
		
		//  phone = phone.replace(/[^0-9]/g, '');
		  phone = phone.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2-$3");
			
		  return phone;
		}