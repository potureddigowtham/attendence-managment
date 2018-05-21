<html>
<head>
<title>HOD</title>
</head>
<body>
<form name="HOD" method="post" action="hodcheck.php">
<table align="center" border="1">
<tr>
<td>UserId</td>
<td><input type="text" name="hid"></td>
</tr>
<tr>
<td>Entry code</td>
<td><input type="password" name="hpass"></td>
</tr>
<tr>
<td>Captcha:</td>
<td>
<?php
session_start();
print "<img src=image2.png?".date("U").">";
$str1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$str2="0123456789";
$str=$str1.$str2;
$str3=str_shuffle($str);
$random_text=substr($str3,0,6);
$_SESSION['my_captcha2']=$random_text;
$im = @imagecreate(80,20) or die("cannot create");
$background_color=imagecolorallocate($im,0,0,0);
$text_color=imagecolorallocate($im,255,255,0);
imagestring($im,5,5,2,$_SESSION['my_captcha2'],$text_color);
imagepng($im,"image2.png");
imagedestroy($im);
?>
</td>
</tr>
<tr>
<td>Enter Captcha</td>
<td><input type="text" name="aa"></td>
</tr>
<tr>
<td colspan="2"align="center"><input type="submit" name="click" value="login"></td>
</tr>
</table>
</form>
</body>
</html>