<?php
// adminpost
include('connection.php');
session_start();

$name= $_SESSION['fname']." ".$_SESSION['lname']; 

$docu_name=$_FILES['doc']['name'];
 $docu_tmpname=$_FILES['doc']['tmp_name'];

$link=$_POST['link'];
$post=$_POST['postcont'];
$date=date('F d,y');
 move_uploaded_file($docu_tmpname,"./postimage/".$docu_name);
 
 if($docu_name||$link||$post){
	 
	
 mysqli_query($conn,"INSERT INTO user_post(admin_name, document,link , postcontent ,date )
 VALUES('$name','$docu_name','$link','$post','$date')"); 
 
 header('location:./admin.php');
 
 }else{
	 header('location:./admin.php');
 }
 
?>