<!DOCTYPE html>
<html>
<head>
    <meta charset="GBK">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuab API | Email Notice</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    //echo date("Y年m月d日");
    $nd = date("要检测的文件 Ymd",strtotime("+1 day"));
  	//echo "<br>".$nd.".jpg";
    $to = $_GET["to"];
    $title = $_GET["title"];
    $content = $_GET["content"];
    $url = "http://api.guaqb.cn/music/yxkey.php?key=132ecf32a7381d777ee6&my=0cba23cef567a3c17363&email=".$to."&bt=".$title."&nr=".$content;
    //echo "<br>当前Get提交接口数据地址 ".$url;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
	$html = curl_exec($ch);
    echo "<br>".$html;
    //http://api.echocode.club/test.php?to=&title=&content=
    ?>
</body>
</html>