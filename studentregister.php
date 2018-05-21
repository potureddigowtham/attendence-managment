<html>
<body>
<?php
$con=mysqli_connect("localhost","root","","myproject");
if(!$con)
{
	die("cannot connect to database:".mysqli_error());
}
$sname=$_REQUEST['sname'];
$ssub=$_REQUEST['ssub'];
$sfname=$_REQUEST['sfname'];
$sql="insert into student(usn,sub_code,faculty) values('$sname','$ssub','$sfname')";
$qu=mysqli_query($con,$sql);
if(!$qu)
{
	die("details not inserted:".mysqli_error());
}
echo "The details entered into the table";
echo "<p align='center'><a href=\"operator.php\"> Back</a></p>";
mysqli_close($con);
?>