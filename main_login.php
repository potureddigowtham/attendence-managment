<html>
<body background="background.jpg">
<form name="form1" method="post" action="checklogin1.php">
<table align='center'  border="1" align="center" cellspacing="1" width="350" height="100">
<tr>
<th colspan="2">Teacher Login</th>
</tr>
<tr>
<td >Username</td>
<td><input  type="text" name="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td><input  type="password" name="mypassword"></td>
</tr>
<tr>
<td>Captcha</td>
<td align="center">
<?php
session_start();
print "<img src=image.png?".date("U").">";
$str1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str2="123456789";
$str=$str1.$str2;
$str3=str_shuffle($str);
$random_text=substr($str3,0,6);
$_SESSION['my_captcha']=$random_text;
$im = @imagecreate(80,20) or die("cannot create");
$background_color=imagecolorallocate($im,0,255,255);
$text_color=imagecolorallocate($im,255,0,0);
$lc=imagecolorallocate($im,0,0,255);
$line=imageline($im,10,10,500,700,$lc);
$line1=imageline($im,30,10,10,10,$lc);
$line1=imageline($im,50,10,30,20,$lc);
imagestring($im,5,5,2,$_SESSION['my_captcha'],$text_color);
imagepng($im,"image.png");
imagedestroy($im);
?>
</td>
</tr>
<tr>
<td>Enter the Captcha</td>
<td align="center"> <input type="text" name="cp"></td>
</tr>
<tr>
<td align="center" colspan="2"><input  type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</form>
<form name="form1" method="post" action="retrieve.php">
<table align='center'  border="1" align="center" cellspacing="1" >
<tr>
<th colspan="2">Students</th>
</tr>
<tr>
<td>Username</td>
<td><input  type="text" name="usn"></td>
</tr>
<tr>
<td>Captcha:</td>
<td>
<?php
print "<img src=image1.png?".date("U").">";
$str1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str2="123456789";
$str=$str1.$str2;
$str3=str_shuffle($str);
$random_text=substr($str3,0,6);
$_SESSION['my_captcha1']=$random_text;
$im = @imagecreate(80,20) or die("cannot create");
$background_color=imagecolorallocate($im,255,255,0);
$text_color=imagecolorallocate($im,255,0,0);
$lc=imagecolorallocate($im,0,0,255);
$line=imageline($im,10,10,500,700,$lc);
$line1=imageline($im,30,10,10,10,$lc);
$line1=imageline($im,50,10,30,20,$lc);
imagestring($im,5,5,2,$_SESSION['my_captcha1'],$text_color);
imagepng($im,"image1.png");
imagedestroy($im);
?>
</td>
</tr>
<tr>
<td>Enter the captcha</td>
<td><input type="text" name="a"></td>
</tr>
<tr>
<td colspan="2" align="center"><input  type="submit" name="Submit" value="Check"></td>
</tr>
</table>
</form>
</body>
</html>