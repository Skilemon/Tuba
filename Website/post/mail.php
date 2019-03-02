<?php
class Emp {
    public $msg = "";
}
$e = new Emp();
$nd = date("Ymd",strtotime("+1 day"));
$to = $_GET["to"];
//$to = "chenjunyu.qaz@qq.com";
$title = "TubaAPI&main=EchoCode";
$content = "Upload".$nd.".jpg";
$url = "http://api.guaqb.cn/music/yxkey.php?key=132ecf32a7381d777ee6&my=0cba23cef567a3c17363&email=".$to."&bt=".$title."&nr=".$content;
if($to == "")
{
    $e->msg = "601";
}
else if($title == "")
{
    $e->msg = "602";
}
else if($content == "")
{
    $e->msg = "603";
}
else
{
    if(date(Hi) > "1900")
    {
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
            if(substr_count($html,"成功") >= "1")
            {
                $e->msg = "604";
            }
            else
            {
                $e->msg = "605";
            }
        }
        else
        {
            $e->msg = "607";
        }
        curl_close($ch);
    }
    else
    {
       $e->msg = "606";
    }
}
echo json_encode($e);
/*
echo "<br>当前Get的地址是".$url;
http://api.echocode.club/API/Tuba/post/mail.php?to=chenjunyu.qaz@qq.com
$to = $_GET["to"];
601-603参数错误 604发送成功 605发送失败(47行开启debug[.$html]) 606时间错误 607无需通知
*/
?>