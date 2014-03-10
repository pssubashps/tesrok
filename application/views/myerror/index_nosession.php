<?php $this->load->view('layout/layout')?>	
<link rel="stylesheet" href="<?php echo base_url();?>css/themes/base/jquery.ui.all.css">
	
	<script src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
	<script>
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
	});
	
	</script>
<div class="span9">

				<h4><?php echo $message;?></h4>
					</div>
<?php $this->load->view('layout/footer')?>	
