<html> 
<body>
<?php
session_start();
$con=mysqli_connect("localhost", "root", "","myproject");
if(!$con)
{
 die("Connection failed: " . mysqli_connect_error( ) );
}
if(isset($_COOKIE['user']))
{
$myusername=$_SESSION['username'];
$sql="SELECT sub_code FROM faculty WHERE username='$myusername'";
$result=mysqli_query($con,$sql);
echo '<center>';
echo '<h1>Attendance Tracker</h1><br><br><br>';
echo '<table border="1">';
echo '<tr>';
echo '<th>Courses Offered</th>';
echo '</tr> ';
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	echo '<tr>';
	print('<td>') ;
	echo "<a href='retrieve_teacher.php?username=".$_SESSION['username']."&subcode=".$row["sub_code"]."'>".$row["sub_code"]."</a>";
	print('</td>');
	echo '<tr>';
	 }
echo '</center>';
mysqli_close($con);
}
else 
{
	echo "SESSION Expired";
	//session_unset();
	//unset($_SESSION['username']);
	session_destroy();
}
?>
</body>
</html>