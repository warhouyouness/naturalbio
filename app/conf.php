<?php
	date_default_timezone_set("Europe/Rome");

	$servername = "37.247.54.140";
	$username = "user_1772";
	$password = "xAdAco46KeDeBeRON32eTE1IR3g123";
	$dbname = "db_1772naturalcosmetic"; 

	$saltpwd = "ZW8W!EGGGfc£dT!ZT";


	function genmd5(){
		$tmp = "";
		for ($i = 1; $i <= 10; $i++) {
			$tmp = md5($tmp . rand() . $i);
		};
		return $tmp;
	};	
	
	function isValidMd5($md5 =''){
		return preg_match('/^[a-f0-9]{32}$/', $md5);
	}	
?>