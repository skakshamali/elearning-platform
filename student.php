<?PHP
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
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<!-- CSS only -->
	
	<style>
	body{
		font-family:tahoma;
		
	}
	
	.header{
		
		position:sticky;
		top:0;
		width:100%;
		
			
		}
	
	
	.adminname{
		background-image:url(images/index1.jpg);
		
		
		}
		
	
	.page ul{
		display:flex;
		list-style:none;
		margin:0;
	}
	.page ul li{
		margin-left:30px;
	
	}
	
	
	.query{
		width:450px;
		height:100%;
		
		position:fixed;
		z-index:1;
		top:135px;
		left:0;
		overflow-x:hidden;
		background:#F0FFFF;
		
	}
	
	.middle-area{
		margin-left:450px;
		margin-top:-30px;
		padding:10px;
		background:#E6E6FA
		
	}
	
	.query label{
		display:block;
		margin:auto;
	}
	
	.query input{
		width:90%;
		overflow:hidden;
		margin-left:5px;
	}  
	
	.query .submit{
		width:50%;
		margin:auto
	}
	
	 .name label{
		
		margin-left:125px;
	}
	 .title label{
		
		margin-left:125px;
	}
	.inputarea:after{
		content:"";
		display:block;
		clear:both;
	}
	.textarea textarea{
		margin-left:9px
		
	}
	.textarea{
		margin-top:5px;
	}
	
	</style>
	
		
</head>
<body>


<div class="header">

		<div class="adminname">
			
				<h1><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
				<br />
				<br />
 
		</div>
			
		<div class="page">
					
							<ul>
								<li>Home</li>
								
								<li><a href="./logout.php">logout</a></li>
								<li><a href="take_quiz.php" class="button" >Take Quiz</a></li>
							</ul>			
								
			</div>
</div>	
		
			
					<div class="query "> 
								<form action="students_query.php" method="POST">
										<div class="name ">
												<label for="name">Name</label>
											<input type="text" name="sname" />
										</div>
										
											<div class="title ">
												<label for="topic title" >Topic title</label>
												<input type="text" name="title" placeholder="title"/>
											</div>
										
										<div class="textarea">
											<textarea name="comment"  cols="40" placeholder="comments" rows="15"></textarea>
										</div>
										
										<div class="submit">
						
											<input type="submit"  value="submit" />
										</div>
								</form>	
						</div>			
							
							<div class="middle-area ">
								
									<?php while($runquery=mysqli_fetch_array($postquery)): ?>
															
									<div class="notice">
										<h3>----:notice & needy task:----</h3>
										<h3><?php echo$runquery['date']; ?></h3>
										<h3><?php echo$runquery['admin_name'];?></h3>
									</div>
										<div class="file-area ">
											<img src="./postimage/<?php echo$runquery['document']; ?>" />
											<h3><a href="./postimage/<?php echo$runquery['document']; ?>"><?php echo$runquery['document']; ?></a></h3>
										
										</div>
									
												<div class="link-area ">
													<h3><?php echo$runquery['link'];?></h3>
												
												</div>
									
										<div class="notice-area ">
										
											<p> <?php echo$runquery['postcontent'];?></p>
										
										</div>
									
									<?php endwhile;?>		
							</div>
						
		


















	
	
</body>
</html>