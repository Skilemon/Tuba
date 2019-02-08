<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuab API | Email Notice</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
    $days = date("Y-m-d");
    $times = date("Ymd");
    $files = $times + ".jpg";

    echo date("Ymd");
    $to = "chenjunyu.qaz@qq.com";         // 邮件接收者
    $subject = "Tuba API";                // 邮件标题
    $message = "Hello! 这是邮件的内容。test";  // 邮件正文
    $from = "gm@echocode.club";   // 邮件发送者
    $headers = "From:" . $from;         // 头部信息设置
    mail($to,$subject,$message,$headers);
    echo "success";
    ?>
</body>
</html>