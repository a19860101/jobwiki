
<?php
$url = "https://www.1111.com.tw/LoginService/empHandler.ashx";
$c = curl_init($url);
curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
curl_setopt($c, CURLOPT_USERAGENT, 'PHP script');
$result = curl_exec($c);
echo $result;
?>  
