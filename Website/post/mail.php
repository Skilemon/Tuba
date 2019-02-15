<!DOCTYPE html>
<html>
<head>
    <meta charset="GBK">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuab API | Mail Notice</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    echo "Console log list ---><br>";
    $nd = date("Ymd",strtotime("+1 day"));
    $to = $_GET["to"];
    $title = "Tuba_API&main=EchoCodeAI";
    $content = "Not_Found_".$nd.".jpg";
    $url = "http://api.guaqb.cn/music/yxkey.php?key=132ecf32a7381d777ee6&my=0cba23cef567a3c17363&email=".$to."&bt=".$title."&nr=".$content;
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
    {
        if(date(Hi) > "2200")
        {
            echo "Now time ".date("Y/m/d/ H:i --->")."";
            echo "<br>Search to file is \"".$nd.".jpg\" --->";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,"http://api.echocode.club/API/Tuba/files/".$nd.".jpg");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
            $html = curl_exec($ch);
            if($html == "404")
            {
                curl_setopt($ch,CURLOPT_URL,$url);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
                $html = curl_exec($ch);
                echo "<br>Auth error ---><br>Executing command --->"/*.$html*/;
                curl_close($ch);
                if(substr_count($html,"成功") >= "1")
                {
                    echo "<br>Command executed";
                }
                else
                {
                    echo "<br>Error 604";
                }
            }
            else
            {
                echo "<br>Auth";
            }
        }
        else
        {
            echo "Error 605";
        }
    }
    /*
    echo "<br>当前Get提交接口数据地址 ".$url;
    http://api.echocode.club/API/Tuba/post/mail.php?to=chenjunyu.qaz@qq.com
    空格 = %20
    回车 = %0D%0A
    $to = $_GET["to"];
    601-603参数错误 604命令执行错误(47行末开启debug[.$html]) 605时间错误
    */
    ?>
</body>
</html>