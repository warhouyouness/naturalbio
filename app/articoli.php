<?php

include './conf.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$arr = array();
	if(isset($_GET['category'])){	
		$num = $_GET['category'];
		$sql = "SELECT articoli.id, articoli.titolo, articoli.txt, articoli.img, UNIX_TIMESTAMP(articoli.date_creation) AS d FROM articoli WHERE articoli.category = " . (int)$num . "  ORDER BY articoli.id DESC";	
	}else{
		$sql = "SELECT articoli.id, articoli.titolo, articoli.txt, articoli.img, UNIX_TIMESTAMP(articoli.date_creation) AS d FROM articoli ORDER BY articoli.id DESC";			
	};

	$res = mysqli_query($conn, $sql);	
	while($row = mysqli_fetch_assoc($res)){	
		$t = mb_convert_encoding($row['titolo'], "UTF-8", "Windows-1252");
		$a = mb_convert_encoding($row['txt'], "UTF-8", "Windows-1252");
		$tmp = array(
		"t"=>$t,
		"a"=>$a,
		"d"=>$row['d'],
		"i"=>$row['img']
		); 
		
		array_push($arr, $tmp);
	};		


	echo json_encode($arr);
		
	mysqli_close($conn);

?>
