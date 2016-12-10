<?php 
	echo '
	function showlist(){
		var secondBox = document.getElementById("secondBox")
		secondBox.style = "display:block;position:absolute"
		document.getElementById("headContent4").style.visibility = "hidden"
	}
	function hiddenlist(){
		var secondBox = document.getElementById("secondBox")
		secondBox.style = "display:none;"
		document.getElementById("headContent4").style.visibility = "visible"
	}
	function cancel(){
		var xhr = new XMLHttpRequest();
		xhr.open( "POST", "./cancelPhp.php", true );
		xhr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
		xhr.onreadystatechange = function(){
			console.log(1)
			if( xhr.readyState == 4 && xhr.status == 200){
				var response = xhr.responseText
				if( response % 10 == "0" ){
					if( response / 10 == "1" ){
						alert("请先登录！")
					}
					else{
						alert("Please login first！")
					}
					window.location.href = "indexHtml.php"
				}
				else{
					if( response / 10 == "1" ){
						alert("注销成功！")
					}
					else{
						alert("concel success！")
					}
					window.location.href = "indexHtml.php"
				}
			}
		}
		xhr.send("");
	 }
	var countShowHidden = 1
	function showhidden(){
		if( countShowHidden == 1 ){
			showlist()
			countShowHidden = 2
		}
		else{
			hiddenlist()
			countShowHidden = 1
		}
	}';
 ?>