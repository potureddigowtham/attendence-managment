<html>
<body>
<?php
session_start();
if(isset($_COOKIE['user']))
{
if(!$_SESSION['username']==$_REQUEST['username'])
{
header("location:main_login.php");
session_destroy();
}
echo "<p align='right'><a href=\"logout.php\"> logout!</a></p>";
$con = mysqli_connect("localhost","root","","myproject");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
$myusername=$_SESSION['username'];
$subcode=$_REQUEST['subcode'];
echo "<br>";
$sql= "select usn from student where sub_code='$subcode' and faculty='$myusername'";
$result=mysqli_query($con, $sql);

echo '<form action="update.php" method="post">';
$i=0;
echo "<center>";
echo "<input type='date' name='dt'>";
echo "<table border='1'>";
echo "<tr>";
echo "<th width=100>USN</th>";
echo "<th width=90> MARK</th>";
echo "</tr>";
echo "</table>";
echo '<div align="center">';
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
	  echo "<table border='1'>";
	 echo "<tr align='center'>";
	 echo "<td width=100>".$row['usn'];
	 echo "</td>";
	 echo "<td width=100><select name='cb[]'><option value='present'>present</option><option value='absent'>absent</option></td>";
	 echo '</tr>';
	 echo "</table>";
	 $usn[]=$row['usn'];
	 $i++;
  }
  $_SESSION['ab']=$usn;
   echo "<table >";
  echo "<tr>";
  echo "<td><input type='text' name='number' value='$i' hidden readonly></td>";
  echo "</tr>";
  echo "<tr>";
echo "<td><input type='text' name='username' value='$myusername' hidden readonly></td>";
echo "<td><input type='text' name='subcode' value='$subcode' hidden readonly></td>";
echo "<td align='center'><input type='submit' name='update' value='Post'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input type='text' name='username' value='$myusername' hidden readonly></td>";
echo "<td><input type='text' name='subcode' value='$subcode' hidden readonly></td>";
echo "<td align='center'><input type='submit' name='modify' value='Update'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><input type='text' name='username' value='$myusername' hidden readonly></td>";
echo "<td><input type='text' name='subcode' value='$subcode' hidden readonly></td>";
echo "<td align='center'><input type='submit' name='view' value='view'></td>";
echo "</tr>";
echo "</table>";
echo "</center>";
echo "</form>";
echo '</div>';
echo '<form action="change.php" method="post" >';
echo "<input type='text' name='username' value='$myusername' hidden readonly>";
echo "<p align='center' ><input type='submit' name='back' value='Change Subject'></p>";
echo '</form>';
mysqli_close($con);
}
else 
{
	echo "Session expired";
	session_destroy();
}
?>
</body>
</html>