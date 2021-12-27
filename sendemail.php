<?php


$name=$_POST['name'];
$email=$_POST["email"];
$phone=$_POST["phone"];
$message=$_POST["message"];
//$host=$_SERVER['SERVER_NAME'];
//$email="ahdong306@email.sc.edu";
//$from="From: $name<$email>\r\nReturn-path: $email";
/// GMAIL can identify which host sent, so it's better to use a real email address(from), especially one recognized email address by your "to" email, for example, you friends' email address -> your own email address.
$from="From: ahdong306@gmail.com " . "\r\n" . "Reply-To: $email" . "\r\n" . "X-Mailer: PHP/" . phpversion();
$subject="Message sent using your contact form";
$message= "His/Her phone number: ".$phone."\r\n Email: ".$email."\r\n Message: \r\n".$message ;


$success=mail("bingguo0625@gmail.com", "Contact form submission from XIUBIAO web", $message, $from);

if($success) {
echo "邮件已成功发送,谢谢您的留言！";
}
else {
echo "An error occurred, and the email was not sent. Check your domains' error logs and mail log for more info.";
}
//var_dump($from);





?>
