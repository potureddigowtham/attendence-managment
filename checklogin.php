<?php ob_start(); ?>
<html>
<head>
<body>
<?php
session_start();
$con=mysqli_connect("localhost", "root", "","myproject");
if (!$con)
{
 die("Connection failed: " . mysqli_connect_error( ) );
}
$myusername=$_REQUEST["myusername"];
$mypassword=$_REQUEST["mypassword"];
$ap=$_REQUEST["cp"];
$sql="SELECT * FROM faculty WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
 if( $count >= 1 && $_SESSION['my_captcha']==$ap)
{
$_SESSION['username']=$myusername;
$_SESSION['password']=$mypassword;
header("Location:teacher.php?username=$myusername");
}
else 
{
echo '<form action="back.php" method="post" >';
echo ' <div align="center">Wrong Username or Password </div> ';
echo '<div align="center" ><input type="submit" name="back" value="Back"></div>';
echo '</form>';
}
mysqli_close($con);
?>
</body>
</html>