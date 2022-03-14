<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>News title - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="index.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="features.php">Features</a>
				</li>
				<li class="active">
					<a href="news.php">News</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
				<li id="register">
					<a href="register.php">Register</a>
				</li>
				<li id="login">
					<a href="login.php">Login</a>
				</li>
				<?php
				include("filterwithcookie.php");
				?>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="post">
		
			<?php
					$query = new AbstractQuery();
					$run = $query->getNewsById($_GET['id']);
					if($run->num_rows>0){
						while($row = $run->fetch_assoc()) {
							$date = explode('-', $row['date']);
							echo 
							"<div class='date'>
							<p>
								<span>".$date[2]."</span>
								".$date[1]."-".$date[0]."
							</p>
							</div>
							<h1>".$row['title']."<span class='author'>".$query->getFullNameFromUsername($row['author'])."</span></h1>
							<p>".$row['long_content']."</p>
							<span><a href='news.php' class='more'>Back to News</a></span>";
						}
					
					}
					else
						echo "<h1>Bài viết đéo tồn tại!</h1> <span><a href='news.php' class='more'>Back to News</a></span>";
				?>
		</div>
	</div>
	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="tumbler"></a>
			</div>
			<p>
				© 2023 Zerotype. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>