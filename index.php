<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="index.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="features.php">Features</a>
				</li>
				<li>
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
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="342" width="368">
			<div>
				<h1>Ideas?</h1>
				<h2>That's what we live for.</h2>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. <span><a href="index.html" class="btn">Try It Now!</a><b>Don’t worry it’s for free</b></span>
				</p>
			</div>
		</div>
	</div>
	<div id="contents">
	<form method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" value = "update avatar" name="submit">
	</form>
	<?php
	global $query;
	$run = $query->getAvatar($_COOKIE['username']);
	if($run->num_rows > 0){
		while($row = $run->fetch_assoc()) {
			echo "<img src=".$row['avatar']." width='200' style='border-radius:20px;'>";
			break;
		}
	}
	if(isset($_POST['submit'])){
		include("uploadfile.php");
		$upload = new UploadFile();
		$avatar = $upload->upload();
		if($avatar != null){
			$query->updateAvatar($avatar,$_COOKIE['username']);
			header('Location: index.php');
		}
		
	}
	?>
		<div id="tagline" class="clearfix">
		
			<h1>Design With Simplicity.</h1>
			<div>
				<p>
					You can replace all this text with your own text. Want an easier solution for a Free Website?
				</p>
				<p>
					Head straight to Wix and immediately start customizing your website!
				</p>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web.
				</p>
			</div>
			<div>
				<p>
					You can replace all this text with your own text. Want an easier solution for a Free Website?
				</p>
				<p>
					Head straight to Wix and immediately start customizing your website!
				</p>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web.
				</p>
			</div>
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