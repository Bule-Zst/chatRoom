<?php 
	session_start();
	$count = 0;
	if( $_SESSION['language'] == 'chinese' ){
		$count += 10;
	}
	else{
		$count += 20;
	}
	if( $_SESSION['name'] == '' ){
		echo $count;
	}
	else{
		$count += 1;
		echo $count;
		$_SESSION['name'] = '';
	}
 ?>