<?php 
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	$con = mysqli_connect( "localhost", "root", "" );
	mysqli_select_db( $con, "message_board" );
	mysqli_set_charset( $con, "utf8" );
	$sql = "select * from message  ";
	$count = 0;
	$result = mysqli_query( $con, $sql);
	$text = mysqli_fetch_assoc( $result);
	echo '[';
	echo '{ "time":"';
	echo $text['time'];
	echo '","name":"';
	echo $text['name'];
	echo '","message":"';
	echo $text['content'];
	echo '"}';
	while( $text = mysqli_fetch_assoc( $result) ){
		if( $text ){
			$count++;
			echo ',';
			echo '{ "time":"';
			echo $text['time'];
			echo '","name":"';
			echo $text['name'];
			echo '","message":"';
			echo $text['content'];
			echo '"}';
			
		}
	}
	echo ']';
 ?>

	