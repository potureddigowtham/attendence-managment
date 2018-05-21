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
$_SESSION["user_id"] = 1001;
$_SESSION['loggedin_time'] = time(); 
//header("Location:teacher.php?username=$myusername");
}
else 
{
echo '<form action="back.php" method="post" >';
echo ' <div align="center">Wrong Username or Password </div> ';
echo '<div align="center" ><input type="submit" name="back" value="Back"></div>';
echo '</form>';
}
if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		header("Location:teacher.php?username=$myusername");
	} else {
		header("Location:logout.php?");//session_expired=1
	}
}
function isLoginSessionExpired() {
	$login_session_duration = 60*1; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
$url = "main_login.php";
if(isset($_REQUEST["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
mysqli_close($con);
?>
</body>
</html>