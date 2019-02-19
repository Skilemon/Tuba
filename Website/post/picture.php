<?php
class Emp {
    public $msg = "";
    public $url = "";
}
$e = new Emp();
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
        $e->msg = "1000";
        $e->url = "";
    }
    else
    {
        $e->msg = "1001";
        $e->url = $tfile;
    }
}
else
{
    curl_close($ch);
    $e->msg = "1001";
    $e->url = $ofile;
}
echo json_encode($e);
/*
$EchoCodeTubaAPI = 4501afb82a5e3e869162f44108e62c4e; //key
1000 = 图片不存在
1001 = 正常输出
*/
?>