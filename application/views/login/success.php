<?php $this->load->view('layout/layout')?>	
<link rel="stylesheet" href="<?php echo base_url();?>css/themes/base/jquery.ui.all.css">
	
	<script src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
	<script>
	
	
	</script>
<div class="span9">

				<h2>Welcome to TESORK</h2>
				
				<p><?php echo ($sucess_message) ?  $sucess_message : ''; ?></p>
					</div>
<?php $this->load->view('layout/footer')?>	
