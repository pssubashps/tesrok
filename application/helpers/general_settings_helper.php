<?php
/*
 * To check system allows to register an new user if yes,it return true. else
 * return false
 */
function is_allow_newuser_register() {
	$ci = & get_instance();
	if (! $ci->session->userdata ( 'gensettings' )) {
		redirect ( 'login/index', 'refresh' );
	} else {
		$gensettings = $ci->session->userdata ( 'gensettings' );
		if (isset ( $gensettings ['gs_register'] ) && $gensettings ['gs_register'] == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	return false;
}


/*
 * 
 *  get Display COuntdown ticker
 *  
 *  If autolog off set 1 && displat ticker set 1 the return html string
 *  
 *  else empty string
 *  
 */

function get_display_countdown_ticker () {
	
	$ci = & get_instance();
	$str = "";
	if(!$ci->session->userdata('gensettings')) {
		redirect ( 'login/index', 'refresh' );
	}else {
		$gensettings = $ci->session->userdata ( 'gensettings' );
		if(isset($gensettings['gs_is_auto_logoff']) && isset($gensettings['gs_display_ticker']) && $gensettings['gs_is_auto_logoff'] == 1 && $gensettings['gs_display_ticker'] == 1) {
			$str = "<p id='countdowntimer'style='background-color: #7FBAE8; color: #FFFFFF; height: 27px; margin: 0 0 10px;  padding: 5px;  width: 250px;'></p>";
		}
	}
	return $str;
}