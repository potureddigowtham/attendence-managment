<?php
session_start();
$to=$_SESSION['username'];
$con=mysqli_connect("localhost", "root", "","myproject");
if (!$con)
{
 die("Connection failed: " . mysqli_connect_error( ) );
}
$sql="select date from attendance where faculty='$to' and status='absent'";
//$sql="select email,date from attendance where faculty='$to' and status='absent'";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
	  //$a=$row['email'];
	  $b=$row['date'];
  }
  $sql1="select  email from faculty where username='$to'";
 $result1=mysqli_query($con,$sql1);
while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
  {
	  $a=$row1['email'];
	  //$b=$row['date'];
  }
date_default_timezone_set("Asia/Calcutta");
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "manitestphp451@gmail.com";
$mail->Password = "451789123";
$mail->setFrom('manitestphp451@gmail.com', 'First Last');
$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addAddress($a, 'John Doe');
$mail->Subject = 'About your attendance';
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = "sending remainder that you are absent on '$b' ";
//$mail->AltBody = 'This is about your attendance come and meet me in person';
//$mail->addAttachment('images/phpmailer_mini.png');
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
	echo "<p align='right'><a href=\"logout.php\"> logout!</a></p>";
}
