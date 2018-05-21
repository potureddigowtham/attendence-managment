<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","myproject");
if(!$con)
{
die("Can not connect:".mysqli_error());
}
$hcode=$_REQUEST['hid'];
$hentry=$_REQUEST['hpass'];
$sql="select * from HOD where  username='$hcode' and password='$hentry'";
$qu=mysqli_query($con,$sql);
$count=mysqli_num_rows($qu);
if($count>=1)
{
	$_SESSION['hcode']=$hcode;
	header("location:operator.php?username=$hcode");
}
echo "You are not allowed to access the software";
echo "<p align='center'><a href=\"HOD.php\"> Back!</a></p>";
mysqli_close($con);
?>