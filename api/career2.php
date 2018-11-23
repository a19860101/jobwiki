<?php
    // $url = "https://www.1111.com.tw/LoginService/empHandler.ashx?apFun=dutySearch&d0=100000";
    $d0 = $_GET["d0"];
    $url = "https://www.1111.com.tw/LoginService/empHandler.ashx?apFun=empSearch&d0={$d0}&size=8";
    $c = curl_init($url);
    curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($c,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($c,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($c, CURLOPT_USERAGENT, 'PHP script');
    $result = curl_exec($c);
    echo $result;
?>  