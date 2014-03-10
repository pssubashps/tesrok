<?php $this->load->view('layout/layout')?>	
<link rel="stylesheet" href="<?php echo base_url();?>css/themes/base/jquery.ui.all.css">
	
	<script src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url();?>js/login/login.js"></script>
<div class="span9">
<div class="section-title">
								<h3>Register</h3>
							</div>
						<div class="content">
						
							<form class="form-horizontal" action="#" method="post">
							<?php if(validation_errors()) { ?>
							<div id="error">
								<?php echo validation_errors();?>
							</div>
							<?php }?>
								
								<div class="control-group">
									<label class="control-label" for="usr_firstname">First Name:</label>
									<div class="controls">
										<input type="text" id="usr_firstname"  name="usr_firstname" value=<?php echo set_value('usr_firstname');?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_lastname">Last Name:</label>
									<div class="controls">
										<input type="text" id="usr_lastname" name="usr_lastname" value=<?php echo set_value('usr_lastname');?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_email">Email : </label>
									<div class="controls">
										<input type="text" id="usr_email" name="usr_email" value=<?php echo set_value('usr_email');?>>
										<span id='usremailcheck'></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_email">Password : </label>
									<div class="controls">
										<input type="password" id="usr_password" name="usr_password" >
										<span id='usremailcheck'></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_email">Confirm Password : </label>
									<div class="controls">
										<input type="password" id="usr_confirm_password" name="usr_confirm_password" >
										<span id='usremailcheck'></span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_phone">Phone:</label>
									<div class="controls">
										<input type="text" id="usr_phone" name="usr_phone" value=<?php echo set_value('usr_phone');?>>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_gender">Gender:</label>
									<div class="controls">
										<select name="usr_gender" id="usr_gender" style="width: 100px;">
											 <option value ="1" <?php echo set_select('usr_gender', 1, TRUE); ?> >Male</option>
							                 <option value ="0" <?php echo set_select('usr_gender', 0); ?> >Female</option>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="usr_dob">Date of Birth:</label>
									<div class="controls">
										<input type="text" id="usr_dob" name="usr_dob" value="<?php echo set_value('usr_dob');?>" >
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="usr_dob">Timezone:</label>
									<div class="controls">
										<select name="usr_timezone" id="usr_timezone" style="width: 222px;">
										 <option value =""  <?php echo set_select('usr_timezone', 1, TRUE); ?> >-- Select Timezone --</option>
										<?php 
											if(count($timezone_identifiers) > 0) {
												for($timezone = 0; $timezone < count($timezone_identifiers);$timezone ++) {
												   echo "<option ". set_select('usr_timezone', $timezone_identifiers[$timezone])." value='".$timezone_identifiers[$timezone]."'>".$timezone_identifiers[$timezone]."</option>";

												}
											}
										?>
										</select>
									</div>
								</div>
								<div class="control-group">
									
									<div class="controls">
										<?php echo $captcha['image'];?>
									</div>
								</div>
									<div class="control-group">
									
									<div class="controls">
										<input type="text" id="captcha" name="captcha" value="" >
										<br/>
										<sub>Please Enter the answer</sub>
									</div>
								</div>
								<div class="control-group">
									
									<div class="controls">
										<button type="submit" class="btn">Register</button>
									</div>
								</div>
							</form>
						</div><!-- .content -->
					</div>
<?php $this->load->view('layout/footer')?>	
