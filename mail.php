<?php
session_start();
$con=mysqli_connect("localhost", "root", "","myproject");
if (!$con)
{
 die("Connection failed: " . mysqli_connect_error( ) );
}
$faculty=$_SESSION['username'];