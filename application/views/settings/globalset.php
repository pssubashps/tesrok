<?php $this->load->view('layout/layout')?>
<link rel="stylesheet"
	href="<?php echo base_url();?>css/themes/base/jquery.ui.all.css">

<style>
.form-horizontal .controls {
	margin-left: 76px;
}

table, th, td {
	border: 1px solid black;
	border:1px solid #D6D6D6;
}
table {
	width:100%;
	border-collapse:collapse;
}

td {
	text-align:left;
	vertical-align:center;
	padding:10px;
}
.even {
	background-color:#EDEDED;
}
</style>

<script src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>
<script src="<?php echo base_url();?>js/ui/jquery.ui.tabs.js"></script>
<script src="<?php echo base_url();?>js/user/settings.js"></script>
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<div class="span9">
	<h4> Global Settings</h4>
	<div id="tabs">
		<ul>
			<li><a href="#tab_globalmanagement">General Settings</a></li>
			<li><a href="#tab_passwordsecurity">Password Security</a></li>
			<li><a href="#tab_emailconfig">Email Configarations</a></li>

		</ul>
		
		
		<div id="tab_globalmanagement">
			<form class="form-horizontal" name="frm_global_set" id="frm_global_set"	method='post' action="<?php echo base_url()?>index.php/settings/globalset">
				<div class="control-group">
				
					<table>
					
							
							<tr>
								<td>Allow New User to Register</td>
								<td><input	type="checkbox" id="gs_register" name="gs_register"	value='1' <?php echo ($generalsettings['gs_register'] == 1)? "checked='true'" : "";?>></td>
							</tr>
							
							<tr class='even register'>
								<td>Every new user has to activated manually</td>
								<td><input	type="checkbox" id="gs_user_act" name="gs_user_act"	value='1' <?php echo ($generalsettings['gs_user_act'] == 1)? "checked='true'" : "";?> ></td>
							</tr>
							
							<tr class='register'>
								<td>Notify admin of system when new user register</td>
								<td><input	type="checkbox" id="gs_notify_user_reg" name="gs_notify_user_reg"	value='1' <?php echo ($generalsettings['gs_notify_user_reg'] == 1)? "checked='true'" : "";?>></td>
							</tr>
							
							<tr class='even register'>
								<td>Unregistered users get deleted after </td>
								<td><input type="text" maxlength='2' name='gs_unreg_delete' id='gs_unreg_delete' value = "<?php echo $generalsettings['gs_unreg_delete'];?>" class='smallnum'/> Hours</td>
							</tr>
							
							<tr class=''>
								<td>Default Blog Access</td>
								<td><input	type="checkbox" id="gs_default_blog" name="gs_default_blog"	value='<?php echo $generalsettings['gs_default_blog'];?>'></td>
							</tr>
							
							<tr class='autologoff even'>
								<td>Auto Logoff</td>
								<td><input	type="checkbox" id="gs_is_auto_logoff" name="gs_is_auto_logoff"	value='1' <?php echo ($generalsettings['gs_is_auto_logoff'] == 1)? "checked='true'" : "";?>></td>
							</tr>
							
							<tr class="cls_logoff">
								<td>Log off in</td>
								<td><input type="text" maxlength='2' name='gs_logoff' id='gs_logoff' value = "<?php echo $generalsettings['gs_logoff'];?>" class='smallnum'/> Minutes</td>
							</tr>
							
							<tr class='cls_logoff even' >
								<td>Display Ticker</td>
								<td><input	type="checkbox" id="gs_display_ticker" name="gs_display_ticker"	value='1' <?php echo ($generalsettings['gs_display_ticker'] == 1)? "checked='true'" : "";?>></td>
							</tr>
							
							<tr>
								<td colspan='2'>
								<button type="button" class="btn" id="but_globalset">Update</button>
								</td>
							</tr>
							
							
					</table>

					
					
				</div>


			</form>
		</div>

		<!--  Tab 2 -->
		<div id="tab_passwordsecurity">
		<form class="form-horizontal"			id ="frm_pwdset" action="<?php echo base_url()?>index.php/settings/pwdset">
			<div class="control-group">

				
				<table>
				<tr class='errormessage'>
								
							</tr>
					<tr>
						<td>Enhanced password reset security enabled</td>
						<td> <input	type="checkbox" id="ps_enabled" name="ps_enabled"		<?php echo ($passwordsettings['ps_enabled'] == 1)? "checked='true'" : "";?>
						 value='1'></td>
					</tr>
				</table>
				<table id="passwordsettings">
					<tr class='even'>
						<td>Maximum Number of Security Attempts</td>
						<td><input type="text" maxlength='2' name='ps_max_attempt' id='ps_max_attempt' value = "<?php echo $passwordsettings['ps_max_attempt'];?>" class='smallnum'/></td>
					</tr>
					
					<tr>
						<td>Max Number of Password Resets Allowed per</td>
						<td><input type="text" maxlength='2' name='ps_max_password_reset' id='ps_max_password_reset' value = "<?php echo $passwordsettings['ps_max_password_reset'];?>" class='smallnum'/>
							Hour
							<!--  <select class='smallselect'>
								<option>Hour</option>
							</select>-->
						</td>
					</tr>
					
					<tr class='even'>
						<td>Maximum Number of Security Questions to have</td>
						<td><input type="text" maxlength='2' name='ps_max_security_question_have' id='ps_max_security_question_have' value = "<?php echo $passwordsettings['ps_max_security_question_have'];?>" class='smallnum'/></td>
					</tr>
					
					<tr >
						<td>Maximum Number of Security Questions to ask</td>
						<td><input type="text" maxlength='2' name='ps_max_security_quation_ask' id='ps_max_security_quation_ask' value = "<?php echo $passwordsettings['ps_max_security_quation_ask'];?>" class='smallnum'/></td>
					</tr>
					
					<tr class='even'>
						<td>Max Time for Password Reset Request to expire</td>
						<td><input type="text" maxlength='2' name='ps_max_password_reset_time' id='ps_max_password_reset_time' value = "<?php echo $passwordsettings['ps_max_password_reset_time'];?>" class='smallnum'/></td>
					</tr>
					
					<tr>
						<td>Password Complexity</td>
						<td>
							<select class='smallselect' name='ps_password_strength' id='ps_password_strength'>
								<option value='simple'  <?php echo ($passwordsettings['ps_password_strength'] == 'simple') ? "checked=true" : "";?>>Simple</option>
								<option value='advanced' <?php echo ($passwordsettings['ps_password_strength'] == 'advanced') ? "checked=true" : "";?>>Advanced</option>
								<option value='complete <?php echo ($passwordsettings['ps_password_strength'] == 'complete') ? "checked=true" : "";?>'>Complete</option>
							</select>
						</td>
					</tr>
					
					<tr class='even adv'>
						<td>Total Number of characters</td>
						<td><input type="text" maxlength='2' name='ps_password_char_count' id='ps_password_char_count' value = "<?php echo $passwordsettings['ps_password_char_count'];?>" class='smallnum'/></td>
					</tr>
					
					<tr class='complete'>
						<td>Total Number of letters</td>
						<td><input type="text" maxlength='2' name='ps_password_letter_count' id='ps_password_letter_count' value = "<?php echo $passwordsettings['ps_password_letter_count'];?>" class='smallnum'/></td>
					</tr>
					
					<tr class='even complete'>
						<td>Total Number of Upper characters</td>
						<td><input type="text" maxlength='2' name='ps_password_upper_letter_count' id='ps_password_upper_letter_count' value = "<?php echo $passwordsettings['ps_password_upper_letter_count'];?>" class='smallnum'/></td>
					</tr>
					
					<tr class='complete'>
						<td>Total of Number of Digits</td>
						<td><input type="text" maxlength='2' name='ps_password_num_count' id='ps_password_num_count' value = "<?php echo $passwordsettings['ps_password_num_count'];?>" class='smallnum'/></td>
					</tr>
					
					<tr>
								<td colspan='2'>
								<button type="button" class="btn" id="but_passwordset">Update</button>
								</td>
							</tr>
					
				</table>

			</div>


		</form>
	</div>
	<!-- Tab 3 -->
	<div id="tab_emailconfig">
	<div class="control-group">
		<form>
			
				<table>
					<tr>
						<td>Protocol</td>
						<td>
							<select>
								<option>SendMail</option>
								<option>POP</option>
							</select>
						</td>
					</tr>
					
					<tr>
						<td>From Email</td>
						<td><input type="text"  name='' id='' value = ""/></td>
					</tr>
					
					
				</table>
				</form>
			</div>
		
	</div>
</div>
</div>
<?php $this->load->view('layout/footer')?>	
