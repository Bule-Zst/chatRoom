<?php 
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	$name = $_POST['name'];
	session_start();
	$_SESSION['name'] = $name;
	$language = $_SESSION['language'];
	$password = $_POST['password'];
	$con = mysqli_connect( "localhost", "root", "" );
	mysqli_select_db( $con, "message_board" );
	mysqli_set_charset( $con, "utf8" );
	$sql = "select name from register";
	$result = mysqli_query( $con, $sql);
	$count = 0;
	while( $test = mysqli_fetch_array( $result)){
		if( $test['name'] == $name ){
			$count = 1;
		}
	}
	$sql = "select password from register where name = '$name'";
	$result = mysqli_query( $con, $sql );
	$test = mysqli_fetch_array( $result );
	if( $count == 0 ){
		$number = 0;
	}
	elseif( $test['password'] != $password ){
		$number = 1;
	}
	else{
		$number = 2;
	}
	echo '[';
	echo '{"number":"';
	echo $number;
	echo '","language":"';
	echo $language;
	echo '"}]';
 ?>