<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>聊天室</title>
	<style>
		<?php include 'headStyle.php'; ?>
		button{
			width: 100px;
			height: 30px;
		}
		body{
			margin:0;
			padding: 0;
			overflow: hidden;
		}
		.body{
			width: 800px;
			height: 800px;
			position: absolute;
			left: 50%;
			margin-left: -400px;
			top:160px;
			text-align: center;
		}
		div{
			/*position: relative;
			left: 50%;
			margin-left: -350px;*/
		}
		.div2{
			width: 700px;
			height: 500px;
			border: 1px solid black;
			background: #DDDDFF;
			margin-top: 70px;
			
		}
		.div5{
			width: 700px;
			height: 500px;
			position: relative;
			left: 50%;
			margin-left: -350px;
		}
		.div3{
			width: 700px;
			height: 130px;
			position: relative;
			left: 50%;
			margin-left: -350px;
			
		}
		.div6{
			position: relative;
			margin-left: -600px;
			margin-top: 6px;
		}
		.showMessage{
			width: 500
		}
		textarea{
			width: 100%;
			height: 100%;
			border: 1px solid;
			border-top: 1px solid;
			background: #FFD2D2;
			font-size: 20px;
		}
		ul{
			list-style: none;
		}
	</style>
</head>
<body>
	<?php include 'headBody.php'; ?>
	<div class="body">

		<div class="div5">
			<textarea class="textarea1" id="content1" cols="30" rows="10" readonly="readonly"></textarea>
		</div>

		<div class="div3">
			<textarea  id="content" cols="30" rows="10"></textarea>
		</div>
	
		<div class="div6">
			<button id="submit" onclick="submitMessage()">提交</button>
		</div>

	<div>
</body>
</html>
<script>
	<?php include 'headJs.php'; ?>
	function judgeLanguage(){
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', './judgeLanguagePhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
				var response = xhr.responseText
				console.log(response)
				switch( response ){
					case 'english':
						english()
						break
					case 'chinese':
						chinese()
						console.log(1)
						break
					default:
						console.log(10)
				}
			}
		}
		xhr.send('language=1');
	}
	function chinese(){
		document.getElementById('headContent1').innerHTML = '创建群'
		document.getElementById('headContent2').innerHTML = '加入群'
		document.getElementById('changeLanguage').innerHTML = 'change language'
		document.getElementById('chinese').innerHTML = 'chinese'
		document.getElementById('english').innerHTML = 'english'
		document.getElementById('headContent4').innerHTML = '注销'
		document.getElementById('headContent5').innerHTML = '布樂聊天室'
		document.getElementById('submit').innerHTML = '提交';
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', 'changeLanguagePhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
			}
		}
		xhr.send('language=chinese');
	}
	function english(){
		document.getElementById('headContent1').innerHTML = 'create group'
		document.getElementById('headContent2').innerHTML = 'join group'
		document.getElementById('changeLanguage').innerHTML = '切换语言'
		document.getElementById('chinese').innerHTML = '中文'
		document.getElementById('english').innerHTML = '英文'
		document.getElementById('headContent4').innerHTML = 'cancel'
		document.getElementById('headContent5').innerHTML = '布樂ChatRoom'
		document.getElementById('submit').innerHTML = 'submit';
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', 'changeLanguagePhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
			}
		}
		xhr.send('language=english');
	}
	function firstShowMessage(){
		// alert(document.getElementById('content').value);
		var content = document.getElementById('content').value;
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', './showContentPhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
				var json = xhr.responseText;
				console.log(xhr.responseText);
		  		json = eval ("(" + json + ")");
		  		// alert(json[0].content2);
		  		var count = 0;
		  		var content1 = document.getElementById('content1')
		  		while( json[count] ){
					content1.innerHTML = content1.innerHTML + json[count].time +'&nbsp;&nbsp;' + json[count].name + '&#10;' +json[count].message + '&#10;'
					count++;
					setScroll()
				}
			}
		}
		xhr.send('content=1');
	}
	function submitMessage(){
		var content = document.getElementById('content').value;
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', './sendMessagePhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
				var json = xhr.responseText;
				console.log(xhr.responseText);
		  		json = eval ("(" + json + ")");
		  		var count = 0;
		  		var content1 = document.getElementById('content1')
		  		while( json[count] ){
					content1.innerHTML = content1.innerHTML + json[count].time +'&nbsp;&nbsp;' + json[count].name + '&#10;' +json[count].message + '&#10;'
					count++;
				}
				setScroll()
			}
		}
		xhr.send('content='+content);
	}
	function changesize(){
		var screenWidth = document.body.clientWidth
		var screenHeight = document.body.clientHeight
		var count = 5;
		if( screenWidth > 1350 ){
			while( --count ){
				document.getElementById('headContent'+count).style.width = '200px'
			}
			document.getElementById('headContent5').style.width = 500 + 'px'
			document.getElementById('blank1').style.display = 'inline-block'
			document.getElementById('blank2').style.display = 'inline-block'
			document.getElementById('li1').style = 'position: relative;left: 0px'
			document.getElementById('li2').style = 'position: relative;left: 0px'
		}
		else{
			count = 5;
			while(--count){
				document.getElementById('headContent'+count).style.width = '130px'
			}
			document.getElementById('headContent5').style.width = '360px'
			document.getElementById('blank1').style.display = 'none'
			document.getElementById('blank2').style.display = 'none'
			document.getElementById('li1').style = 'position: relative;left: -10px;'
			document.getElementById('li2').style = 'position: relative;left: -10px;'
		}
	}
	function setScroll(){
		var content1 = document.getElementById('content1')
		content1.scrollTop = content1.scrollHeight
	}
	window.onload = function(){
		judgeLanguage()
		firstShowMessage()
		changesize()
	}

	// function submitMessage1(){
	// 	var xhr = new XMLHttpRequest();
	// 	xhr.open( 'GET', './sendContent.php', true );
	// 	// xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
	// 	xhr.onreadystatechange = function(){
	// 		if( xhr.readyState == 4 && xhr.status == 200){
	// 			var json = xhr.responseText;
	// 			console.log(xhr.responseText);
	// 	  		json = eval ("(" + json + ")");
	// 	  		// alert(json[0].content2);
	// 	  		var count = 1;
	// 	  		while( count < 8 ){
	// 	  			// console.log(1);
	// 				var content1 = document.getElementById('p'+count);
	// 				count--;
	// 				if( json[count] ){
	// 					content1.innerHTML = json[count].message
	// 				}
	// 				else{
	// 					break;
	// 				}
	// 				count += 2;
	// 			}
	// 			var coun = 1;
	// 			while( coun <= count ){
	// 				content1 = document.getElementById('d'+coun);
	// 				coun -= 1;
	// 				console.log(1);
	// 				if(json[coun]){
	// 					content1.innerHTML = json[coun].time+" &nbsp;&nbsp;"+json[coun].name
	// 				}
	// 				coun += 2;
	// 			}
	// 		}
	// 	}
	// 	xhr.send();
	// }
</script>
