<?php

include './conf.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$today = date("Y-m-d H:i:s");  
	
	if(isset($_GET['edit'])){
		$sql = "UPDATE `db_1772naturalcosmetic`.`articoli` SET 
		`titolo`='" . $_GET['tit'] . "', 
		`txt`='" . $_GET['txt'] . "', 
		`img`='" . $_GET['img'] . "', 
		`category`=" . $_GET['cat'] . " 
		WHERE `id`=" . $_GET['edit'];
		echo $sql;
		mysqli_query($conn, $sql);	
	}else if(isset($_GET['del'])){
		$sql = "DELETE FROM articoli WHERE id= " . intval ($_GET['del']);
		mysqli_query($conn, $sql);
		
	}else if(isset($_GET['new'])){
		$sql = "INSERT INTO articoli (titolo, txt, img, category, date_creation) VALUES 
		('" . $_GET['tit'] . "', '" . $_GET['txt'] . "', '" . $_GET['img'] . "', " . $_GET['cat'] . ", '" . $today . "')";
		mysqli_query($conn, $sql);
	}
	
	
	
	
	$arr = array();

	$sql = "SELECT articoli.id, LEFT(articoli.titolo, 64) AS t, articoli.img AS i, articoli.category AS c FROM articoli ORDER BY articoli.id DESC";			

	$res = mysqli_query($conn, $sql);	
	while($row = mysqli_fetch_assoc($res)){		
		array_push($arr, $row);
	};		

	echo json_encode(array("arr"=>$arr));
		
	mysqli_close($conn);

?>

