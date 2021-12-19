<?PHP
include('connection.php');

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$remail=$_POST['reemail'];
$pass=$_POST['pass'];
$gen=$_POST['same'];
$type=$_POST['type'];                                   


$dob=$_POST['day']."/".$_POST['month']."/".$_POST['year'];

$selectemail=mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email'");
$countemail=mysqli_num_rows($selectemail);

if($fname && $lname && $email && $remail && $pass &&$type && $gen && $dob ){
	if($email==$remail){
	if($countemail==1){
		echo"already have an account";
	}else{
		mysqli_query($conn,"INSERT INTO user_info(first_name,last_name,email,password,type,gender,date_of_birth) 
VALUES('$fname','$lname','$email','$pass','$type','$gen','$dob')");
			
		header('location:./index.php');	
        echo"registration sucessful";
	}	
	}else{
		
	echo"check ur email";	
	}
}else{
	
	echo"plz fill up all";
}

?>