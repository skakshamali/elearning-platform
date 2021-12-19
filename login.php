<?php
include('connection.php');
session_start();
$uemail=$_POST['email'];
$upass=$_POST['pass'];


$login_query=mysqli_query($conn,"SELECT * FROM user_info WHERE email='$uemail' AND password='$upass'");

$login_query_run=mysqli_num_rows($login_query);

 $datafetch=mysqli_fetch_array($login_query);
 


if($login_query_run==1){
	
	$_SESSION['fname']=$datafetch['first_name'];
	$_SESSION['lname']=$datafetch['last_name'];
	
	
	$role=mysqli_query($conn,"SELECT type FROM USER_INFO WHERE email='$uemail' AND password='$upass'");
	$row=mysqli_fetch_array($role);
	
	if($row[type]=="Management"){
		
		header("location:./admin.php");
		
	}else if($row[type]=="Student"){
		
		header("location:./student.php");
	}
	
	
}else{
	echo"invalid id password";
}





?>