<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","myproject");
if(!$con)
{
die("Can not connect".mysqli_error());
}
$uname=$_REQUEST['myusername'];
$upass=$_REQUEST['mypassword'];
$email=$_REQUEST['em'];
$sql="insert into faculty(username,password,email) values('$uname','$upass','$email')";
$qu=mysqli_query($con,$sql);
if(!$qu)
{
die("can not enter into the table:".mysqli_error());
}
echo "The details of the new user is entered into the members table as username as '$uname' and password as '$upass' and Email as '$email'";
echo "<p align='right'><a href=\"operator.php\"> Back</a></p>";
mysqli_close($con);
?>
</body>
</html>