<?php $this->load->view('layout/layout')?>	
<link rel="stylesheet" href="<?php echo base_url();?>css/themes/base/jquery.ui.all.css">
	
	<script src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url();?>js/login/login.js"></script>
<div class="span9">
<div class="section-title">
								<h3>Login</h3>
							</div>
						<div class="content">
						
							<form class="form-horizontal" action="#" method="post">
							<?php if(validation_errors()) { ?>
							<div id="error">
								<?php echo validation_errors();?>
							</div>
							<?php }?>
								
								<div class="control-group">
									<label class="control-label" for="usr_firstname">Email</label>
									<div class="controls">
										<input type="text" id="usr_email"  name="usr_email" value=<?php echo set_value('usr_email');?>>
									</div>
								</div>
								
								
								<div class="control-group">
									
									<div class="controls">
										<button type="submit" class="btn">Next</button>
									</div>
								</div>
							</form>
						</div><!-- .content -->
					</div>
<?php $this->load->view('layout/footer')?>	
