<?php
$con = mysqli_connect("localhost:3307","wsm_TesorkAdm","3xpectation#2014","wsm_Tesork");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else {
	echo "Connected";
}