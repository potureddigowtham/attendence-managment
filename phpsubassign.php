<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","myproject");
if(!$con)
{
die("could not connect to database:".mysqli_error());
}
$fsub=$_REQUEST['fsub'];
$fname=$_REQUEST['fname'];
$sql="update faculty set sub_code='$fsub' where username='$fname'";
$qu=mysqli_query($con,$sql);
if(!$qu)
{
	die("Table not updated:".mysqli_error());
}
echo "The table has updated";
echo "<p align='center'><a href=\"operator.php\"> Back</a></p>";
mysqli_close($con);
?>