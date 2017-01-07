<?php

include './conf.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$arr = array();
	

	
	if(isset($_GET['id'])){
		$sql = "SELECT articoli.* FROM articoli WHERE id = " . intval ($_GET['id']);
		$res = mysqli_query($conn, $sql);	
		$art = mysqli_fetch_assoc($res);
	}else{
		$art = array();
	}
	
	
	
	$sql = "SELECT articoli.id, LEFT(articoli.titolo, 64) AS t, articoli.img AS i, articoli.category AS c FROM articoli ORDER BY articoli.id DESC";			

	$res = mysqli_query($conn, $sql);	
	while($row = mysqli_fetch_assoc($res)){		
		array_push($arr, $row);
	};		

	echo json_encode(array("arr"=>$arr, "art"=>$art));
		
	mysqli_close($conn);

?>

