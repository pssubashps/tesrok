<?php
if(!function_exists('getMonthList')) {
	function getMonthList($type = 'num') {
	
		$monthArray = array ();
	
		for($monthCount = 1; $monthCount <= 12; $monthCount ++) {
			$monthArray [$monthCount] = getMonth($monthCount);
		}
	
		return $monthArray;
	}
}

if(!function_exists('getMonth')) {
	function getMonth($monthno) {
		$strmonth = "";
		switch ($monthno) {
			case 1 :
				$strmonth = "Jan";
				break;
			case 2 :
				$strmonth = "Feb";
				break;
			case 3 :
				$strmonth = "Mar";
				break;
			case 4 :
				$strmonth = "Apr";
				break;
			case 5 :
				$strmonth = "May";
				break;
			case 6 :
				$strmonth = "Jun";
				break;
			case 7 :
				$strmonth = "Jul";
				break;
			case 8 :
				$strmonth = "Aug";
				break;
			case 9 :
				$strmonth = "Sept";
				break;
			case 10 :
				$strmonth = "Oct";
				break;
			case 11 :
				$strmonth = "Nov";
				break;
			case 12 :
				$strmonth = "Dec";
				break;
		}
	
		return $strmonth;
	}
}


if(!function_exists('getDayList')) {
	function getDayList($month = 1) {
	
		$dayArray = array ();
		for($dayCount = 1; $dayCount <= 31; $dayCount ++) {
			$dayArray [$dayCount] = $dayCount;
		}
	
		return $dayArray;
	}
}

if(!function_exists('getYearList')) {
	function getYearList() {
	
		$yearArray = array ();
		$currentYear = date ( 'Y' );
		$startYear = $currentYear - 21;
		for($yearCount = $startYear; $yearCount >= ($startYear - 60); $yearCount --) {
			$yearArray [$yearCount] = $yearCount;
		}
	
		return $yearArray;
	}
}

if(!function_exists('create_math_captcha')) {
	
	function create_math_captcha () {
		
		$operator = array('+','*');
		
		$firstnumber = rand(1,9);
		$secondnumber =  rand(1, 9);
		
		$selector = rand(0,1);
		$returnArray = array ();
		if($selector == 0) {
			$returnArray['ans'] = $firstnumber+$secondnumber;
			$returnArray['first'] = ucfirst(convertDigit($firstnumber));
			$returnArray['second'] = $secondnumber;
		}else if($selector == 1) {
			$returnArray['ans'] = $firstnumber*$secondnumber;
			$returnArray['first'] = ($firstnumber);
			$returnArray['second'] = ucfirst(convertDigit($secondnumber));
		}
		
	
		$returnArray['operator'] = $operator[$selector];
		return $returnArray;
	}
}

function convertDigit($digit)
{
	switch($digit)
	{
		case "0": return "zero";
		case "1": return "one";
		case "2": return "two";
		case "3": return "three";
		case "4": return "four";
		case "5": return "five";
		case "6": return "six";
		case "7": return "seven";
		case "8": return "eight";
		case "9": return "nine";
	}
}