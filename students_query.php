<?php
include('connection.php');
session_start();
$sname=$_POST['sname']; 
$title=$_POST['title']; 
$comment=$_POST['comment']; 
if($title||$comment||$sname){
	mysqli_query($conn,"INSERT INTO students_post(student_name,topic_title,comment)VALUES('$sname','$title','$comment')");
	header('location:student.php');
	echo"submitted sucessfully";
}else{
	echo"do somthing";
	 
}

$student_post_query=mysqli_query($conn,"SELECT * FROM students_post ORDER BY id DESC");

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php while($student_post_fetch=mysqli_fetch_array($student_post_query)): ?>
		
		<h3> Name-
		<?php echo$_SESSION['student_name']=$student_post_fetch['student_name']; ?>
		
		</h3>
		
		<h4> :Title-
		<?php echo$_SESSION['topic_title']=$student_post_fetch['topic_title']; ?>
		
		.</h4>
		
		<p>Comment-(<?php 
			
			echo$_SESSION['student_comment']=$student_post_fetch['comment'];
			
		 ?>
		).</p>
		
		
	<?php endwhile;?>	
</body>
</html>
