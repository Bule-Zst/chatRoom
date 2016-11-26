<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>注册登陆界面</title>
	<style>
		<?php include 'headStyle.php'; ?>
		p{
			color:red;
			font-size: 23px;
			margin-left: 20px;
		}
		button{
			width: 200px;
			height: 35px;
		}
		select{
			background: #ECFFFF;
		}
		.div1{
			width: 650px;
			height: 450px;
			position: absolute;
			left:50%;
			margin-left: -325px;
			top:450px;
			border: 1px solid black;
			background: white;
		}
		.div2{
			margin-left: 20px;
			margin-top: 20px;
		}
		input{
			height: 25px;
			width: 500px;
			margin-left: 20px;
			border: 1px solid;
		}
	</style>
</head>
<body>
	<?php include 'headBody.php'; ?>
	<!--the interface of the login-->
	<div class='div1' style="margin-top: 0px;" id="box">

		<div class='div2'>
		<b style='font-size: 60px;margin-left: 20px;' id="headLogin">Login</b>

		<br>
		<br>

		<input type='text' id='name' placeholder='username'>

		<div style="display: block;height: 37px;">
		<p id='nameReturn1' style="display: none;color:black;" ><span id='hint'></span><span id="second" >&nbsp;</span><span id='explain'>second to go to the chat room</span></p>
		<p id="nameReturn2" style="display: none;">&nbsp;</p>
		<p id="nameReturn3" style="display: inline;">&nbsp;</p>
		</div>

		<input type='password' id='password' placeholder='password'>

		<div style="display: block;height: 37px;">
		<p style="display: inline;" id='passwordReturn'>&nbsp;</p>
		</div>

		<button style="margin-left:20px;" id="register" onclick='register()'>register</button>

		<button id="login" onclick="login()" style='float:right;margin-right:200px;'>login</button>
		</div>

	</div>

</body>
</html>
<script>
	<?php include 'headJs.php'; ?>
	function register(){
		window.location.href = 'registerHtml.php'
	}
	function chinese(){
		document.getElementById('headContent1').innerHTML = '创建群'
		document.getElementById('headContent2').innerHTML = '加入群'
		document.getElementById('changeLanguage').innerHTML = 'change language'
		document.getElementById('chinese').innerHTML = 'chinese'
		document.getElementById('english').innerHTML = 'english'
		document.getElementById('headContent4').innerHTML = '注销'
		document.getElementById('headContent5').innerHTML = '布樂聊天室'
		document.getElementById('headLogin').innerHTML = '登陆'
		document.getElementById('name').placeholder = '账号'
		document.getElementById('explain').innerHTML = '秒后跳转至留言板'
		document.getElementById('password').placeholder = '密码'
		document.getElementById('register').innerHTML = '注册'
		document.getElementById('login').innerHTML = '登陆';
		document.getElementById('blank1').style.width = '15px'
		document.getElementById('blank2').style.width = '15px'
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
		document.getElementById('headLogin').innerHTML = 'login'
		document.getElementById('name').placeholder = 'account number'
		document.getElementById('explain').innerHTML = 'second to go to the chat room'
		document.getElementById('password').placeholder = 'password'
		document.getElementById('register').innerHTML = 'register'
		document.getElementById('login').innerHTML = 'login'
		document.getElementById('blank1').style.width = '23px'
		document.getElementById('blank2').style.width = '23px'
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', 'changeLanguagePhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
			}
		}
		xhr.send('language=english');
	}		
	var count1 = 2;
	function countDown(){	
		var second = document.getElementById('second');
		console.log(count1)
		second.innerHTML = count1;
		count1--;
		if( count1 == '-1'){
			window.location.href = 'messageHtml.php';
		}
		setTimeout( 'countDown()', 1000 );
	}
	function login(){
		nameReturn1.style.display = 'none';
		nameReturn2.style.display = 'none';
		nameReturn3.style.display = 'inline';
		var xhr = new XMLHttpRequest();
		xhr.open( 'POST', 'loginPhp.php', true );
		xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
		xhr.onreadystatechange = function(){
			if( xhr.readyState == 4 && xhr.status == 200){
				var response = eval ("(" + xhr.responseText + ")")
				if( response[0].number == '0' ){
					if( response[0].language == 'chinese' ){
						nameReturn3.innerHTML = '用户名不存在，请注册';
					}
					else{
						nameReturn3.innerHTML = 'the account number does not exist, Plz register';
					}
					
				}
				if( response[0].number == '2'){
					if( response[0].language == 'chinese' ){
						hint.innerHTML = '登陆成功，';
					}
					else{
						hint.innerHTML = 'login success,';
					}
					nameReturn1.style.display = 'inline';
					nameReturn3.style.display = 'none';
					countDown();
				}
				if( response[0].number == '1' ){
					if( response[0].language == 'chinese' ){
						nameReturn2.innerHTML = '密码错误!';
					}
					else{
						nameReturn2.innerHTML = 'the password is Wrong!';
					}
					nameReturn3.style.display = 'none';
					nameReturn2.style.display = 'inline';
				}
			}
		}
		var name = document.getElementById('name').value;
		var password = document.getElementById('password').value;
		xhr.send('name='+name+'&password='+password);
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
			console.log(2)
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
			document.getElementById('headContent6').style.width = '360px'
			document.getElementById('headContent7').style.width = '360px'
			document.getElementById('blank1').style.display = 'none'
			document.getElementById('blank2').style.display = 'none'
			document.getElementById('li1').style = 'position: relative;left: -10px;'
			document.getElementById('li2').style = 'position: relative;left: -10px;'
		}
		if( screenWidth >= screenHeight ){
			document.getElementById('box').style.marginTop = '-170px'
		}
		else{
			document.getElementById('box').style.marginTop = '-160px'
		}
	}
	window.onresize = function(){
		changesize()
	}
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
	window.onload = function(){
		changesize()
		judgeLanguage()
	}
</script>
