<?php 
extract($_POST);
//if(isset($_submit)){
$sid = $_POST['stuid']; 
$sname = $_POST['stuname'];  
$semail = $_POST['email'];  
$scrcode = $_POST['stdcoucode']; 
$pass=$_POST['stupass'];
//$fid=$_POST['stuhid'];
$patt1='/^[0-9]{2}[a-zA-Z]{3}[0-9]{4}$/';
$patt2='/^[A-Za-z]{5,30}$/';
//$patt3='/^(male)$/';
//$patt31='/^(female)$/';
//$patt4='/^[0-9]{10}$/';
$patt5='/^[A-Za-z0-9]{1,30}$/';
//$patt6='/^[0-9]{4}$/';
$patt7='/^(swe)[0-9]{3}$/';
function patt1($patt1,$sid){
if(!preg_match($patt1,$sid)){
echo "Please enter the valid format<br>";
}
else
	return true;
}
function patt2($patt2,$sname){
if(!preg_match($patt2,$sname)){
echo "Please enter the valid name";
}
else
	return true;
}
/*function patt3($patt3,$patt31,$ssex){
if(preg_match($patt3,$ssex)|| preg_match($patt31,$ssex)){
     return true;
}
else
	echo "please enter the valid gender";
	
}
function patt4($patt4,$sphno){
if(!preg_match($patt4,$sphno)){
echo "please enter the valid phone number";
}
else
	return true;
}
*/
function patt5($patt5,$pass){
if(!preg_match($patt5,$pass)){
echo "please enter the valid addres";
}
else
	return true;
}
function patt6($semail){
if(!filter_var($semail,FILTER_VALIDATE_EMAIL)){
echo "please enter the valid email";
}
else
	return true;
}
/*
function patt7($patt6,$stuhid){
if(!preg_match($patt6,$stuhid)){
echo "please enter the valid  Hostel Id";
}
else
	return true;
}
*/
function patt8($patt7,$scrcode){
if(!preg_match($patt7,$scrcode)){
echo "Please enter the valid course code";
}
else
	return true;
}

if(patt1($patt1,$sid)){
if(patt2($patt2,$sname)){
if(patt5($patt5,$pass)){
//if(patt3($patt3,$patt31,$ssex)){
//if(patt4($patt4,$sphno)){
if(patt6($semail)){
//if(patt7($patt6,$stuhid)){
if(patt8($patt7,$scrcode)){
	$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = ''; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'project'); 
if(!$conn) { 
die('Could not connect: ' . mysqli_error()); 
} 

$sql = "insert into student(Student_Id,Student_Name,password,Email,CourseCode) values('$sid','$sname','$pass','$semail','$scrcode')"; 
$retval = mysqli_query($conn,$sql); 
if(!$retval) { 
die('Could not enter data: '.mysqli_error($conn)); 
} 
echo "Entered data successfully\n";
}
}}}
}
?>
<form action="studentlogin.php">
<input type="submit" name="submit" value="back to student Login">
</form>