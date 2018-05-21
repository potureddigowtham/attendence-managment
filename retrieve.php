<html>
<body>
<center>
<?php
session_start();
$con = mysqli_connect("localhost","root","","myproject");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 $usn=$_POST["usn"];
 $a=$_REQUEST['a'];
 if($_SESSION['my_captcha1']==$a)
 {
$sql="SELECT date,subcode,faculty,status FROM attendance where usn='$usn'"; 
$result = mysqli_query($con,$sql);
echo '<table border="1">
<tr>
<th>Date</th>
<th>Subject Code</th>
<th>Faculty</th>
<th>Status</th>
<th>Percentage</th>
</tr>';
function selection($subcode,$faculty)
{
	$con = mysqli_connect("localhost","root","","myproject");
	 $usn=$_POST["usn"];
	$sq1="select status from attendance where usn='$usn' and subcode='$subcode' and faculty='$faculty'";
	$qu1=mysqli_query($con,$sq1);
	$t=mysqli_num_rows($qu1);
	$count=0;
	while($q=mysqli_fetch_array($qu1,MYSQLI_ASSOC))
	{
		if($q['status']=='present')
		{
			$count++;
		}
	}
	$c=$count/$t*100;
	$c = number_format ($c, 2);
	return $c;
}
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
  echo "<tr>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['subcode'] . "</td>";
  echo "<td>" . $row['faculty'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";
  //echo "<td>".$c."</td>";
  echo "<td>".selection($row['subcode'],$row['faculty'])."</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br><br>";
echo '<form action="back.php" method="post" >';
echo "<p align='center' ><input type='submit' name='back' value='Back'></p>";
 echo '</form>';
 }
 else
 {
	 echo "Entered Wronge Captcha<br>";
	echo "<a href='main_login.php'>Back</a>";
 }
mysqli_close($con);
?>
</center>
</body>
</html>