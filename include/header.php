<!DOCTYPE html>
<html lang="zh-Hant"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index,follow">
    <meta name="author" content="工作職務百科">
<!--    <title>test</title>-->
    <?php
		$url = $_SERVER["HTTP_HOST"];
		$uri = $_SERVER["REQUEST_URI"];
		$allUrl = "htt://{$url}{$uri}";
		$self = substr($_SERVER["PHP_SELF"],1);
		$query = $_SERVER["QUERY_STRING"];
		$cl1 = $_GET["list1"];
		$s1 = "SELECT * FROM `categories` WHERE c_list1='$cl1' AND c_level=3 LIMIT 12"	;
		$r1 = mysqli_query($conn,$s1);
		while($ro1s=mysqli_fetch_assoc($r1)){$ro1[]=$ro1s["c_name"];}
		$cl2 = $_GET["list2"];
		$s2 = "SELECT * FROM `categories` WHERE c_list2='$cl2' AND c_level=3 LIMIT 12"	;
		$r2 = mysqli_query($conn,$s2);
		while($ro2s=mysqli_fetch_assoc($r2)){$ro2[]=$ro2s["c_name"];}

		$cn = $_GET["cname"];
		switch($self){
			case "index.php":
	?>
    		<title>工作職務百科 | 各類職務的工作內容與相關職缺</title>
    		<meta name="Keywords" content="工作,職務,工作說明,職務說明,工作搜尋,職務搜尋,工作百科,職務百科">
    		<meta name="Description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！">
    		<meta property="og:title" content="工作職務百科 | 各類職務的工作內容與相關職缺" /> 
			<meta property="og:url" content="<?php echo "http://".$url?>" /> 
			<meta property="og:image" content="images/logo.png" /> 
			<meta property="og:description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！" />
			<meta name="twitter:title" content="工作職務百科 | 各類職務的工作內容與相關職缺 " /> 
			<meta name="twitter:description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！" /> 
			<meta name="twitter:keywords" content="工作,職務,工作說明,職務說明,工作搜尋,職務搜尋,工作百科,職務百科" /> 
			<meta name="twitter:url" content="<?php echo "http://".$url?>" />
    		<script type="application/ld+json">
			{
			"@context": "http://schema.org/", 
			"@type": "WebSite ", 
			"name": "工作職務百科 | 各類職務的工作內容與相關職缺", 
			"url": "<?php echo "http://".$url?>",
			"description": "工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！",
			"keywords" : ["工作","職務","工作說明","職務說明","工作搜尋","職務搜尋","工作百科","職務百科"]
			}
			</script>


    <?php
			break;
			case "list2.php":
				if(isset($cl1)){
//					$t1 = strrpos($t1,"／",5);
//					echo $t1;
	?>
   			<title><?php echo $cl1;?>的相關職務與工作職缺-工作職務百科<?php echo $t1;?></title>
   			<meta name="Keywords" content="<?php echo "{$cl1}職缺,{$cl1}職務,{$cl1}工作"?>">
   			<meta name="Description" content="<?php 
					echo "{$cl1}類的工作職缺:";
					foreach($ro1 as $ro_1){
						echo $ro_1.",";
					}
					echo "想找{$cl1}類職務的工作，就上工作職務百科搜尋。";
				  ?>">
			<meta property="og:title" content="<?php echo $cl1;?>的相關職務與工作職缺-工作職務百科" /> 
			<meta property="og:url" content="<?php echo "http://".$url.$uri?>" /> 
			<meta property="og:image" content="images/logo.png" /> 
			<meta property="og:description" content="<?php 
					echo "{$cl1}類的工作職缺:";
					foreach($ro1 as $ro_1){
						echo $ro_1.",";
					}
					echo "想找{$cl1}類職務的工作，就上工作職務百科搜尋。";
				  ?>" />
			<meta name="twitter:title" content="<?php echo $cl1;?>的相關職務與工作職缺-工作職務百科" /> 
			<meta name="twitter:description" content="<?php 
					echo "{$cl1}類的工作職缺:";
					foreach($ro1 as $ro_1){
						echo $ro_1.",";
					}
					echo "想找{$cl1}類職務的工作，就上工作職務百科搜尋。";
				  ?>" /> 
			<meta name="twitter:keywords" content="<?php echo "{$cl1}職缺,{$cl1}職務,{$cl1}工作"?>" /> 
			<meta name="twitter:url" content="<?php echo "http://".$url.$uri?>" />
			<script type="application/ld+json">
			{
			"@context": "http://schema.org/", 
			"@type": "WebSite ", 
			"name": "<?php echo $cl1;?>的相關職務與工作職缺-工作職務百科", 
			"url": "<?php echo "http://".$url.$uri?>",
			"description": "<?php 
					echo "{$cl1}類的工作職缺:";
					foreach($ro1 as $ro_1){
						echo $ro_1.",";
					}
					echo "想找{$cl1}類職務的工作，就上工作職務百科搜尋。";
				  ?>",
			"keywords" : ["<?php echo "{$cl1}職缺";?>","<?php echo "{$cl1}職務";?>","<?php echo "{$cl1}工作"; ?>"]
			}
			</script>

   	<?php
			}else if(isset($cl2)){
	?>
  			<title><?php echo $cl2;?>的相關職務與工作職缺-工作職務百科</title>
  			<meta name="Keywords" content="<?php echo "{$cl2}職缺,{$cl2}職務,{$cl2}工作"?>">
   			<meta name="Description" content="<?php 
					echo "{$cl2}類的工作職缺:";
					foreach($ro2 as $ro_2){
						echo $ro_2.",";
					}
					echo "想找{$cl2}類職務的工作，就上工作職務百科搜尋。";
				  ?>">
			<meta property="og:title" content="<?php echo $cl1;?>的相關職務與工作職缺-工作職務百科" /> 
			<meta property="og:url" content="<?php echo "http://".$url.$uri?>" /> 
			<meta property="og:image" content="images/logo.png" /> 
			<meta property="og:description" content="<?php 
					echo "{$cl2}類的工作職缺:";
					foreach($ro2 as $ro_2){
						echo $ro_2.",";
					}
					echo "想找{$cl2}類職務的工作，就上工作職務百科搜尋。";
				  ?>" />
			<meta name="twitter:title" content="<?php echo $cl1;?>的相關職務與工作職缺-工作職務百科" /> 
			<meta name="twitter:description" content="<?php 
					echo "{$cl2}類的工作職缺:";
					foreach($ro2 as $ro_2){
						echo $ro_2.",";
					}
					echo "想找{$cl2}類職務的工作，就上工作職務百科搜尋。";
				  ?>" /> 
			<meta name="twitter:keywords" content="<?php echo "{$cl2}職缺,{$cl2}職務,{$cl2}工作"?>" /> 
			<meta name="twitter:url" content="<?php echo "http://".$url.$uri?>" />
			<script type="application/ld+json">
			{
			"@context": "http://schema.org/", 
			"@type": "WebSite ", 
			"name": "<?php echo $cl2;?>的相關職務與工作職缺-工作職務百科123", 
			"url": "<?php echo "http://".$url.$uri?>",
			"description": "<?php 
					echo "{$cl2}類的工作職缺:";
					foreach($ro2 as $ro_2){
						echo $ro_2.",";
					}
					echo "想找{$cl2}類職務的工作，就上工作職務百科搜尋。";
				  ?>",
			"keywords" : ["<?php echo "{$cl2}職缺";?>","<?php echo "{$cl2}職務";?>","<?php echo "{$cl2}工作"; ?>"]
			}
			</script>

   	<?php } ?>
   	<?php
			break;
			case "detail.php":
				
	?>
   			<title><?php echo $cn;?>的相關職務與工作職缺-工作職務百科</title>
  			<meta name="Keywords" content="<?php echo "{$cn}職缺,{$cn}工作,{$cn}薪資,{$cn}學歷"?>">
   			<meta name="Description" content="<?php 
					echo "{$cn}的職務定義的職務定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺，以及各類職務的工作經驗分享。工作職務百科希望能幫助想找{$cn}工作的求職者，有更充足的資料做參考，找到理想的工作！";
				  ?>">
			<meta property="og:title" content="<?php echo $cn;?>的相關職務與工作職缺-工作職務百科<" /> 
			<meta property="og:url" content="<?php echo "http://".$url.$uri?>" /> 
			<meta property="og:image" content="images/logo.png" /> 
			<meta property="og:description" content="<?php 
					echo "{$cn}的職務定義的職務定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺，以及各類職務的工作經驗分享。工作職務百科希望能幫助想找{$cn}工作的求職者，有更充足的資料做參考，找到理想的工作！";
				  ?>" />
			<meta name="twitter:title" content="<?php echo $cn;?>的相關職務與工作職缺-工作職務百科< " /> 
			<meta name="twitter:description" content="<?php 
					echo "{$cn}的職務定義的職務定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺，以及各類職務的工作經驗分享。工作職務百科希望能幫助想找{$cn}工作的求職者，有更充足的資料做參考，找到理想的工作！";
				  ?>" /> 
			<meta name="twitter:keywords" content="<?php echo "{$cn}職缺,{$cn}工作,{$cn}薪資,{$cn}學歷"?>" /> 
			<meta name="twitter:url" content="<?php echo "http://".$url.$uri?>" />
			<script type="application/ld+json">
			{
			"@context": "http://schema.org/", 
			"@type": "WebSite ", 
			"name": "<?php echo $cn;?>的相關職務與工作職缺-工作職務百科", 
			"url": "<?php echo "http://".$url.$uri?>",
			"description": "<?php 
					echo "{$cn}的職務定義的職務定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺，以及各類職務的工作經驗分享。工作職務百科希望能幫助想找{$cn}工作的求職者，有更充足的資料做參考，找到理想的工作！";
				  ?>",
			"keywords" : ["<?php echo "{$cn}職缺";?>","<?php echo "{$cn}職務";?>","<?php echo "{$cn}工作";?>,"<?php echo "{$cn}學歷";?>"]
			}
			</script>
	<?php
			break;
			case "login.php":
				
	?><title>工作職務百科 | 各類職務的工作內容與相關職缺</title>
    		<meta name="Keywords" content="工作,職務,工作說明,職務說明,工作搜尋,職務搜尋,工作百科,職務百科">
    		<meta name="Description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！">
    		<meta property="og:title" content="工作職務百科 | 各類職務的工作內容與相關職缺" /> 
			<meta property="og:url" content="<?php echo $allUrl; ?>" /> 
			<meta property="og:image" content="images/logo.png" /> 
			<meta property="og:description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！" />
			<meta name="twitter:title" content="工作職務百科 | 各類職務的工作內容與相關職缺 " /> 
			<meta name="twitter:description" content="工作職務百科，是為了幫助大家能深入瞭解各類工作內容而建立，除了能搜尋各職務的定義、工作內容、相似職務、薪資區間、職涯發展與相關職缺外，還有各類職務的工作經驗分享。希望能讓台灣的求職者在找工作時，有更充足的資料做參考，找到真正適合自己的工作！" /> 
			<meta name="twitter:keywords" content="工作,職務,工作說明,職務說明,工作搜尋,職務搜尋,工作百科,職務百科" /> 
			<meta name="twitter:url" content="<?php echo $allUrl;?>" />
			</script>
	<?php
		break;
			case "forget.php":
	?>
   		<title>工作職務百科 | 各類職務的工作內容與相關職缺|忘記密碼</title>
    <?php } ?>
    <link rel="icon" type="image/png" href="images/logo@0.5x.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-TCHT6C6');</script>

<!-- End Google Tag Manager -->



<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCHT6C6"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
</head>
<body>
    