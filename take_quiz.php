<?php
 include('connection.php');
$query=mysqli_query($conn,"SELECT * FROM questions");
$total_question=mysqli_num_rows($query);

?>
<html>
<head>
	<title>PHP Quizer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<p>PHP Quizer</p>
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Test Your PHP Knowledge</h2>
				<p>
					This is a multiple choise quiz to test your PHP Knowledge.
				</p>
				<ul>
					<li><strong>Number of Questions:</strong><?php echo $total_question; ?></li>
					<li><strong>Type:</strong> Multiple Choise</li>
					<li><strong>Estimated Time:</strong><?php echo $total_question*1.5; ?></li>

				</ul>

				<a href="question.php?n=1" class="start">Start Quize</a>

			</div>

	</main>
	<footer>
			<div class="container">
				Copyright &copy; ITSERIESTUTOR
			</div>


	</footer>
</body>