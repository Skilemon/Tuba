<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuab API | Picture</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    //$key = $_GET["key"];
    $date = date("Ymd");
    $purl = "http://api.echocode.club/API/Tuba/files/";
    $ofile = $purl.$date.".jpg";
    $tfile = $purl.$date.".png";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$ofile);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    $html = curl_exec($ch);
    if ($html == "404")
    {
        curl_setopt($ch,CURLOPT_URL,$tfile);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        $html = curl_exec($ch);
        if ($html == "404")
        {
            echo "\"msg\":\"1000\"<br>\"url\":\"\"";
        }
        else
        {
            echo "\"msg\":\"1001\"<br>\"url\":\"".$tfile."\"";
        }
    }
    else
    {
        curl_close($ch);
        echo "\"msg\":\"1001\"<br>\"url\":\"".$ofile."\"";
    }
    /*
    $EchoCodeTubaAPI = 4501afb82a5e3e869162f44108e62c4e; //key
    1000 = 图片不存在
    1001 = 正常输出
    */
    ?>
</body>
</html>