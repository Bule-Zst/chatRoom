<?php 
	session_start();
	$name = $_POST['name'];
	$_SESSION['name'] = $name;
	// echo $_SESSION['name'];
	$password = $_POST['password'];
	$con = mysqli_connect( "localhost", "root", "" );
	mysqli_select_db( $con, "message_board" );
	mysqli_set_charset( $con, "utf8" );
	$sql = "INSERT INTO register (name, password) VALUES ('$name', '$password')";
	if( mysqli_query( $con, $sql )){
		echo '1';
	}
	else{
		echo '2';
	}
	mysqli_close($con);
 ?>