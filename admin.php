<?php
include('connection.php');
session_start();

if(!isset($_SESSION['fname'])){
	header('location:index.php');
}


 

$postquery=mysqli_query($conn,"SELECT * FROM user_post ORDER BY post_id DESC");



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></title>
	<link rel="stylesheet" type="text/css" href="css/all.min.css" media="all" />
</head>
<style>
.body{
	margin:0;
	
}
.header{
	position:sticky;
	top:0;
	width:100%;
	margin:0;
	padding:0;
	
}

.div1 h1{
	margin:0;
	padding:0px;
}
.div1{
	
	background-image:url(images/index2.jpg);
	margin:0;
}

.container{
	width:400px;
		height:100%;
		position:fixed;
		z-index:1;
		top:80px;
		overflow-x:hidden;
		margin-left:5px;
		padding:5px;
		background:#F0FFFF;
		padding:20px;
}
 .div5 ul{
	display:flex;
	text-decoration:none;
	list-style:none;
	background:;
	margin:0;
	padding:0;
	
}


.div5 a{
	
	text-decoration:none;	
}


.div5 li{
	margin-left:25px;
	
}


.div1 a{	
text-decoration:none;		
}

 .post-area{
	 
		margin-left:445px;
		padding:5px;
		padding-left:45px;
	background:#E6E6FA;
    margin-top:36px;
 }
 
 


.format input{
	width:67%;
	margin:20px;
}
.div4 {
	margin-left:19px;
	
}

.container input{
	width:50%;
	margin-left:59px;
	margin-top:9px;
}

.


</style>

<body>

	<div class="header">
			<div class="div1">

				<h1><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
				
				</div>
					
			<div class="div5"> 
				<ul>
					<li><a href="">home</a></li>
					<li><a href="quiz.php">quiz</a></li>
					<li><a href="logged_in_list.php">logged in list</a></li>
					<li><a href="students_query.php">students query</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</div>
	</div>	
	
	
	
	
<form action="./post.php " method="POST" 	enctype="multipart/form-data" >	
	
<div class="container"> 
	
	<div class="format">
			<div class="div2">
						<input id="file"type="file" name="doc" placeholder="file"/>
				</div>

				<div class="div3">
						<input id="url" type="url" name="link" placeholder="url" />
				</div>
						
				<div class="div4">
						<textarea  placeholder="text"id="text" name="postcont" cols="40" rows="25"></textarea>
				</div>
	</div>
		<input type="submit" value="go" id="sbtn"/>
</div> 

		
		</form>
	<div class="post-area">
			<?php while($runquery=mysqli_fetch_array($postquery)): ?>	
			<h1>Managemant</h1>
					<div class="middle-area ">
					<h3>----:notice & needy task:----</h3>
					<h3><?php echo$runquery['date']; ?></h3>
					<h3><?php echo$runquery['admin_name'];?> </h3>
					
						<div class="file-area ">
							<img src="./postimage/<?php echo$runquery['document']; ?>" />
							<h3><a href="./postimage/<?php echo$runquery['document']; ?>"><?php echo$runquery['document']; ?></a></h3>
						
						</div>
					
								<div class="link-area 2">
									<h3><?php echo$runquery['link'];?></h3>
								
								</div>
					
						<div class="notice-area ">
						
						<p> <?php echo$runquery['postcontent'];?></p>
						
						</div>
						
				</div>
					
		<?php endwhile;?>	
	
	
	
	
</body>
</html>