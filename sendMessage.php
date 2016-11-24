<?php 
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	session_start();
	$name = $_SESSION['name'];
	$con = mysqli_connect( "localhost", "root", "" );
	mysqli_select_db( $con, "message_board" );
	mysqli_set_charset( $con, "utf8" );
	if( $_POST['content'] ){
		$content = $_POST['content'];
		if($content == '' ) $content = "<br>";
		$content = str_replace("\n","&#10",$content);
		$sql = "INSERT INTO message (name, content) VALUES ('$name', '$content' )";
		mysqli_query( $con, $sql);
	}

	$sql = "select * from message order by id desc ";
	$count = 0;
	$result = mysqli_query( $con, $sql);

	$text = mysqli_fetch_assoc( $result);
	$count++;
	echo '[';
	echo '{ "time":"';
	echo $text['time'];
	echo '","name":"';
	echo $text['name'];
	echo '","message":"';
	echo $text['content'];
	echo '"}';
	echo ']';
	
?>


