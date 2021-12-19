<?php
include('connection.php');
session_start();
$query=mysqli_query($conn,"SELECT * FROM user_info");

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<h4>factulty and student list</h4>
	
			
	<h3><?php while($fetch_data=mysqli_fetch_array($query)){
	
	echo$fetch_data['first_name']." - ".$fetch_data['last_name']." --- ";

	echo$fetch_data['type']."<br>";	
	} ?></h3>
	</td></tr>	
	</table>	







</body>
</html>