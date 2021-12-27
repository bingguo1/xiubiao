<?php
if (isset($_REQUEST['to']))
{
$to = $_REQUEST['to'];
$to = htmlspecialchars($to);
$host=$_SERVER['SERVER_NAME'];
$ip=$_SERVER['SERVER_ADDR'];
//$from="adong@email.sc.edu";
$from="regalbuj@cec.sc.edu";
$subject="Sorry but it's emergency";
//$message="This is a test message sent from $host. It originated from the IP address $ip. If you received this email, that means that the PHP mail function is working on this server.";
$message="Dear Anhua: \n\n" . "Sorry to tell you in advance that our group will run out of funding by the end of this year, we have to figure out where your paychecks come from in the coming 2022. We'll talk about that in detail next time when we meet.";
$headers="From: $from" . "\r\n" . "Reply-To: test@$host" . "\r\n" . "X-Mailer: PHP/" . phpversion();
$success=mail($to,$subject,$message,$headers);

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
if (preg_match($regex, $to)) {

if($success) {
echo "The email was sent successfully";
}
else {
echo "An error occurred, and the email was not sent. Check your domains' error logs and mail log for more info.";
}

} else {

echo "
<center></br>
<form method='post' action='email.php'><br>PHP mail() Test<br>
To: <input name='to' type='text'>
<input type='submit'>
</form><font color='red'>";

echo $to . " is an invalid email. Please try again.</font></center>";

}}

else
{
echo "<center></br>
<form method='post' action='phpmailTest.php'><br>PHP mail() Test<br>
To: <input name='to' type='text'>
<input type='submit' value='Send Message'>
</form></center>";
}

?>