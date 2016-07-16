<?php


$name=$_POST['name'];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];
//$from="From: $name<$email>\r\nReturn-path: $email";
$from="From: $name<$email>\r\nReturn-path: $email";
$subject="Message sent using your contact form";

$message= "His/Her phone number: ".$phone."\r\n Message: \r\n".$message ;
mail("guob@hebeixiubiao.com", $subject, $message, $from);
echo "邮件已成功发送,谢谢您的留言！";





?>
