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
    echo "Console log list ---><br>";
    $nd = date("Ymd",strtotime("+1 day"));
    $to = "chenjunyu.qaz@qq.com";
    $title = "Tuba%20API%20AI客服";
    $content = "Console log list%0D%0A".date("当前时间%20Y年m月d日%20H:i")."%0D%0A请尽快上传".$nd.".jpg%0D%0A%0D%0A————消息来自Tuba%20API";
    $url = "http://api.guaqb.cn/music/yxkey.php?key=132ecf32a7381d777ee6&my=0cba23cef567a3c17363&email=".$to."&bt=".$title."&nr=".$content;
    /*
    if($to == "")
    {
        echo "Error 601";
    }
    else if($title == "")
    {
        echo "Error 602";
    }
    else if($content == "")
    {
        echo "Error 603";
    }
    else
    {}
    */
    if(date(Hi) > "2200")
    {
        echo date("当前时间 Y年m月d日 H:i --->");
        echo "<br>要检测的文件 ".$nd.".jpg --->";
        $ch = curl_init();
	    curl_setopt($ch,CURLOPT_URL,"http://api.echocode.club/API/Tuba/files/".$nd.".jpg");
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        $html = curl_exec($ch);
        if($html == "404")
        {
            $ch = curl_init();
	        curl_setopt($ch,CURLOPT_URL,$url);
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
            echo "<br>验证失败 ---><br>正在执行命令 ---><br>";
            $html = curl_exec($ch);
            if($html == "发送成功！")
            {
                echo "<br>命令已执行";
            }
            else
            {
                echo "<br>Error 604";
            }
        }
        else
        {
            echo "Auth";
        }
    }
    else
    {
        echo "Error 605";
    }
    //echo "<br>当前Get提交接口数据地址 ".$url;
    //http://api.echocode.club/test.php?to=
    //空格 = %20
    //回车 = %0D%0A
    //$to = $_GET["to"];
    //601-603参数错误 604命令执行错误 605时间错误
    ?>
</body>
</html>