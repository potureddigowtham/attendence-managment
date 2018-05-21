<html>
<body>
<?php
if(isset($_COOKIE['user']))
{
extract($_REQUEST);
session_start();
$dt=$_REQUEST['dt'];
$usn=implode(',',$_SESSION['ab']);
$sn=explode(',',$usn);
$cb=$_REQUEST['cb'];
$subcode=$_REQUEST['subcode'];
$myusername=$_REQUEST['username'];
$number=$_REQUEST['number'];
//echo $number;
$con = mysqli_connect("localhost","root","","myproject");
function selection($usn,$faculty,$subcode)
{
	$con = mysqli_connect("localhost","root","","myproject");
	 //$usn=$_POST["usn"];
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
if (!$con)
{
  die('Could not connect: ' . mysqli_error());
}
if(isset($_REQUEST['update']))
{
for($i=0;$i<$number;$i++)
{
	$query="insert into attendance(date,usn,faculty,subcode,status)  values('$dt','$sn[$i]','$myusername','$subcode','$cb[$i]')";
	$sql=mysqli_query($con,$query);
}
echo "successfully posted";
}
if(isset($_REQUEST['modify']))
{
	for($i=0;$i<$number;$i++)
{
	$query1="update attendance set status='$cb[$i]' where date='$dt' and subcode='$subcode' and faculty='$myusername' and usn='$sn[$i]'";
	$sql1=mysqli_query($con,$query1);
}
echo "successfully Updated";
}
if(isset($_REQUEST['view']))
{
	$a=array();
$sql2="SELECT usn FROM student where faculty='$myusername' and sub_code='$subcode'"; 
$result = mysqli_query($con,$sql2);
echo '<table border="1">';
//<tr>
//<th>USN</th>
//</tr>';
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
//	  echo "<tr>";
//echo "<td>" . $row['usn'] . "</td>";
//echo "</tr>";
  //echo "</table>";
  $a[]=$row['usn'];
  }
$x=count($a);
  for($i=0;$i<$x;$i++)
  {
  $sql3="SELECT date,subcode,faculty,status FROM attendance where usn='$a[$i]' and faculty='$myusername'"; 
$result1= mysqli_query($con,$sql3);
echo '<table border="1">
<tr>
<th>USN</th>
<th>Date</th>
<th>Subject Code</th>
<th>Faculty</th>
<th>Status</th>
<th>Percentage</th>
</tr>';

while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
  {
  echo "<tr>";
  echo "<td>" . $a[$i]. "</td>";
  echo "<td>" . $row1['date'] . "</td>";
  echo "<td>" . $row1['subcode'] . "</td>";
  echo "<td>" . $row1['faculty'] . "</td>";
  //echo "<td><a href='gmail.php'>".$row1['status']."</a>";
  echo "<td>" . $row1['status'] . "</td>";
  //echo "<td>".$c."</td>";
  echo "<td>".selection($a[$i],$row1['faculty'],$row1['subcode'])."</td>";
  if($row1['status']=='absent')
  {
	  echo "<td><a href='gmail.php'username=".$_SESSION['username']."&date=".$row1['date'].">".$row1['status']."</a>";
  }
  echo "</tr>";
  }
echo "</table>";
  }
echo "<br><br>";
}
//echo "<p align='center'><a href=\"retrieve_teacher.php\"> back!</a></p>";
//header("location:retrieve_teacher.php?username=$myusername&subcode=$subcode");
mysqli_close($con);
}
else 
{
	echo "Session Expired";
}
?>
</body>
</html>