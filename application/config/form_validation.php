<?php
$config = array();

/*
 * User Registration
 */

$config['login/register'] = array ();

$useremail= array(
		'field' => 'usr_email',
		'label' => 'Email',
		'rules' => "required|callback_isemailunique"
);

$firstname= array(
		'field' => 'usr_firstname',
		'label' => 'Firstname',
		'rules' => "required|alpha"
);

$lastname= array(
		'field' => 'usr_lastname',
		'label' => 'Lastname',
		'rules' => "required|alpha"
);
$phone= array(
		'field' => 'usr_phone',
		'label' => 'Phone',
		'rules' => "required|min_length[10]"
);

$gender= array(
		'field' => 'usr_gender',
		'label' => 'Gender',
		'rules' => ""
);

$dob= array(
		'field' => 'usr_dob',
		'label' => 'Gender',
		'rules' => "required"
);
$captcha= array(
		'field' => 'captcha',
		'label' => 'Captcha',
		'rules' => "required|callback_validatecaptcha"
);
$timezone = array(
		'field' => 'usr_timezone',
		'label' => 'Captcha',
		'rules' => ""
);

$usr_confirm_password = array(
		'field' => 'usr_confirm_password',
		'label' => 'Confirm Password',
		'rules' => "required|min_length[6]|max_length[10]|callback_matchpassword"
);

$password = array(
		'field' => 'usr_password',
		'label' => ' Password',
		'rules' => "required|min_length[6]|max_length[10]"
);
array_push($config['login/register'], $useremail);
array_push($config['login/register'], $firstname);
array_push($config['login/register'], $lastname);
array_push($config['login/register'], $phone);
array_push($config['login/register'], $gender);
array_push($config['login/register'], $dob);
array_push($config['login/register'], $captcha);
array_push($config['login/register'], $timezone);
array_push($config['login/register'], $password);
array_push($config['login/register'], $usr_confirm_password);


$config['login/logine'] = array ();

$useremail = array(
		'field' => 'usr_email',
		'label' => ' Email',
		'rules' => "required|callback_isloginexists|callback_isloginactive"
);
array_push($config['login/logine'], $useremail);

$config['login/loginp'] = array ();

$userpassword = array(
		'field' => 'usr_password',
		'label' => 'Password',
		'rules' => "required|callback_verifylogin"
);
array_push($config['login/loginp'], $userpassword);

/*
 * General Settings
*/

$config['settings/globalset'] = array ();

$gs_unreg_delete = array(
		'field' => 'gs_unreg_delete',
		'label' => 'Unregistered users get deleted',
		'rules' => "required"
);
array_push($config['settings/globalset'], $gs_unreg_delete);
