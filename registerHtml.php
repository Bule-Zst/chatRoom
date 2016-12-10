<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<style>
	<?php include 'headStyle.php'; ?>
	b{
		font-size: 30px;
		margin-left: 20px;
	}
	.div1{
		background: white;
		width: 450px;
		height: 470px;
		border:1px solid;
		position: absolute;
		top: 50%;
		left:50%;
		margin-top: -250px;
		margin-left: -225px;
	}
	input{
		height: 20px;
		width: 350px;
		margin-left: 20px;
	}
	.input1{
		width: 130px;
	}
	.input2{
		width: 60px;
		height: 20px;
		text-align: center;
	}
	p{
		font-size: 1;
		color:red;
		line-height: 0;
		margin-left: 20px;
	}
	</style>
</head>
<body>
	<?php include 'headBody.php'; ?>
	<div class="div1">
		<br>
		<b>register</b>
		<br><br>
		<input id="name" type="text" placeholder="username">
		<p id="nameReturn">&nbsp;</p>

		<input id="password" type="text" placeholder="password">
		<p id="passwordReturn">&nbsp;</p>

		<input id="repeatPassword" type="text" placeholder="repeat password">
		<p id="repeatPasswordReturn">&nbsp;</p>

		<input id="email" type="text" placeholder="email">
		<p id="emailReturn">&nbsp;</p>

		<input id="telephoneNumber" type="text" placeholder="telephone number">
		<p id="telephoneNumberReturn">&nbsp;</p>

		<input id="verificationCode" type="text" placeholder="verification code" class="input1">
		<p id="verificationCodeReturn">&nbsp;</p>

		<input onclick="sendInformation()" class="input2" type="button" value="submit">
	</div>
</body>
</html>
<script>
	<?php include 'headJs.php'; ?>
	var count1 = 2;
	function countDown(){	
		var second = document.getElementById('second');
		console.log(count1)
		second.innerHTML = count1;
		count1--;
		if( count1 == '-1'){
			window.location.href = 'message.php';
		}
		setTimeout( 'countDown()', 1000 );
	}
	function sendInformation(){
		//define variate==================================
		var name = document.getElementById('name').value
		var password = document.getElementById('password').value
		var repeatPassword = document.getElementById('repeatPassword').value
		var email = document.getElementById('email').value
		var telephoneNumber = document.getElementById('telephoneNumber').value
		var verificationCode = document.getElementById('verificationCode').value
		//define return===================================
		var nameReturn = document.getElementById('nameReturn').innerHTML = '&nbsp;'
		var passwordReturn = document.getElementById('passwordReturn').innerHTML = '&nbsp;'
		var repeatPasswordReturn = document.getElementById('repeatPasswordReturn').innerHTML = '&nbsp;'
		var emailReturn = document.getElementById('emailReturn').innerHTML = '&nbsp;'
		var telephoneNumberReturn = document.getElementById('telephoneNumberReturn').innerHTML = '&nbsp;'
		var verificationCodeReturn = document.getElementById('verificationCodeReturn').innerHTML = '&nbsp;'
		//pretreatment====================================
		if( password != repeatPassword ){
			document.getElementById('repeatPasswordReturn').innerHTML = 'Plz input the same repeatPassword as the aboving password!'
			return false
		}
 		var reg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/
		if( !reg.test( telephoneNumber ) ){
      		document.getElementById('telephoneNumberReturn').innerHTML = 'Plz input the right telephone number!'
      		return false
 		}
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', './registerPhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
				
			}
		}
		xhr.send('name='+name+'&password='+password+'&repeatPassword='+repeatPassword+'&email='+email+'&telephoneNumber='+telephoneNumber);
	}
	function chinese(){
		document.getElementById('headContent1').innerHTML = '创建群'
		document.getElementById('headContent2').innerHTML = '加入群'
		document.getElementById('changeLanguage').innerHTML = 'change language'
		document.getElementById('chinese').innerHTML = 'chinese'
		document.getElementById('english').innerHTML = 'english'
		document.getElementById('headContent4').innerHTML = '注销'
		document.getElementById('headContent5').innerHTML = '布樂聊天室'
		document.getElementById('blank1').style.width = '15px'
		document.getElementById('blank2').style.width = '15px'
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', './changeLanguage.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.send('language=chinese');
		language = 'chinese'
	}
	function english(){
		document.getElementById('headContent1').innerHTML = 'create group'
		document.getElementById('headContent2').innerHTML = 'join group'
		document.getElementById('changeLanguage').innerHTML = '切换语言'
		document.getElementById('chinese').innerHTML = '中文'
		document.getElementById('english').innerHTML = '英文'
		document.getElementById('headContent4').innerHTML = 'cancel'
		document.getElementById('headContent5').innerHTML = '布樂ChatRoom'
		document.getElementById('blank1').style.width = '23px'
		document.getElementById('blank2').style.width = '23px'
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', 'changeLanguage.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.send('language=english');
		language = 'english';
	}	
	function changesize(){
		var screenWidth = document.body.clientWidth;
		var screenHeight = document.body.clientHeight;
		var count = 5;
		if( screenWidth > 1350 ){
			while( --count ){
				document.getElementById('headContent'+count).style.width = '200px'
			}
			document.getElementById('headContent5').style.width = 500 + 'px'
			document.getElementById('headContent6').style.width = 500 + 'px'
			document.getElementById('headContent7').style.width = 500 + 'px'
			document.getElementById('blank1').style.display = 'inline-block'
			document.getElementById('blank2').style.display = 'inline-block'
			document.getElementById('li1').style = ''
			document.getElementById('li2').style = ''
		}
		else{
			count = 5;
			while(--count){
				document.getElementById('headContent'+count).style.width = '130px'
			}
			document.getElementById('headContent5').style.width = '360px'
			document.getElementById('headContent6').style.width = 360 + 'px'
			document.getElementById('headContent7').style.width = 360 + 'px'
			document.getElementById('blank1').style.display = 'none'
			document.getElementById('blank2').style.display = 'none'
			document.getElementById('li1').style = 'position: relative;left: -10px;'
			document.getElementById('li2').style = 'position: relative;left: -10px;'
		}
	}
	window.onresize = function(){
		changesize()
	}
	//assist function=====================================
	window.onload = function(){
		changesize()
	}
</script>