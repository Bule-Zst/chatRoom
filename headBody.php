<?php 
	echo '
		<div class="headdiv" id="headBackground">
			<br>
			<div id="headContent1" style="width: 130px;" class="div0">create group</div>
			<div id="headContent5" style="width: 270px;" class="div0 font0">布樂ChatRoom</div>
			<div class="div0" id="headContent6" style="display:inline-block;width:270px;height:10px;"></div>
			<div id="headContent3" style="width: 130px;" class="div0">
				<ul>
					<li  onmouseover="showlist()" onmouseout="hiddenlist()" onclick="showhidden()"><span id="changeLanguage" style="">切换语言</span>
						<ul style="display: none;" id="secondBox" >
							<li id="li1" onclick="chinese()" style="position: relative;left: -10px;"><span id="blank1" style="display: inline-block;height:1px;width: 23px;"></span><span id="chinese">中文</span><span id="blank3" style="display: inline-block;"></span></li>
							<li id="li2" onclick="english()" style="position: relative;left: -10px;"><span id="blank2" style="display: inline-block;height:1px;width: 23px;"></span><span id="english">英文</span><span id="blank4" style="display: inline-block;"></span></li>
						</ul>
					</li>
				</ul>
				<!-- <span>language:</span>
				<select name="" id="" size="2">
					<option value="">English</option>
					<option value="">Chinese</option>
				</select> -->
			</div>
			<br>
	
			<div id="headContent2" style="width: 130px;margin-left:10px;" class="div0">join group</div>
			<div class="div0" id="headContent7" style="display:inline-block;width:270px;height:10px;"></div>
			<div style="width:10px;heigth:1px;display:inline-block;"></div>
			<div onclick="cancel()" id="headContent4" style="width: 130px;visibility:visible;" class="div0">cancel</div>
		</div>
		<div style="width: 100%;" id="line1" class="line0"></div><div class="color" id="bodyBackground"></div>
	';
 ?>