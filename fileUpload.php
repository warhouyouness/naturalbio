<?php
	$arr = array();
	$today = date("Y-m-d H:i:s"); 
	$img =   sha1($today . rand());
	
    $temp = $_FILES["file"]["name"]; 

	$e = pathinfo($temp, PATHINFO_EXTENSION);
	
    $valid_formats = array("jpg", "png", "gif", "bmp", "JPG", "PNG", "GIF", "BMP");
    list($txt, $ext) = explode(".", $temp);

    if(in_array($ext,$valid_formats)){

		move_uploaded_file($_FILES["file"]["tmp_name"], "./gallery/" . $img . "." . $e);
		$arr = array("upload"=>"ok", "path"=> "./gallery/" . $img . "." . $e);
	}else{
		$arr = array("upload"=>"err");
	};
	
	$tmp = json_encode($arr);
	 
	echo $tmp;
