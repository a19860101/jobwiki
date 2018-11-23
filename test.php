<?php
	$name = "今天吃火鍋";
	$q = "火鍋";
	$pattern = "/\$q/i";
	if(preg_match($pattern,$name)){
			echo "比對成功";
		}else{
			echo "比對失敗";
			
		}
	echo  "565112";
?>