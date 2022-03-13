<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
</head>
<body>
	<style>
		.avatar{
			width: 100%;
			height: 300px;
		}
		.avatar div{
			width: 30%;
			float: left;
		}
		.avatar form{
			width: 70%;
			float: right;
		}
		#btn-choice-avatar{
			border: none;
			height: 35px;
			font-size: 15px;
			
		}
		#btn-update-avatar{
			border: none;
			width: 150px;
			height: 35px;
			border-radius: 20px;
			font-size: 17px;
			margin-top: 20px;
		}
		
	</style>
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
	<div class="avatar">
		<div>
			<?php
			global $query;
			$run = $query->loginGetValue($_COOKIE['username'],$_COOKIE['password']); // get avatar
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
					$query->updateAvatar($avatar,$_COOKIE['username'],$_COOKIE['password']);
					header('Location: index.php');
				}
			}	
			?>
		</div>
		<form method="post" enctype="multipart/form-data">
		<p>Update Avatar deeptry</p>
		<input id="btn-choice-avatar" type="file" name="file">
		<br>
		<input id="btn-update-avatar" type="submit" value = "update avatar" name="submit">
	</form>
	</div>
	

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