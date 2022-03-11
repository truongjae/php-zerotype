<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
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
				<li>
					<a href="news.php">News</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li class="active">
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
		<div class="section">
			<h1>Contact</h1>
			<p>
				You can replace all this text with your own text. Want an easier solution for a Free Website? Head straight to Wix and immediately start customizing your website! Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. All Wix templates are fully customizable and free to use. Just pick one you like, click Edit, and enter the online editor.
			</p>
			<form method="POST" class="message">
				<input type="text" name="txtName" value="Name" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="txtEmail" value="Email" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="txtSubject" value="Subject" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<textarea name="txtMess"></textarea>
				<input type="submit" name="txtSub" value="Send"/>
			</form>
			<?php
			function checkEmail($email){
				$check=true;
				$email_split =  explode('@', $email);
				if(count($email_split)==2){
					$domain_split= explode('.', $email_split[1]);
					if(count($domain_split)==2){
						$check = true;
					}
					else $check=false;
				}
				else $check=false;
				return $check;

			}
			if(isset($_POST['txtSub'])){
				if (!empty($_POST['txtEmail'])){
				if (checkEmail($_POST['txtEmail'])){
					include("controll.php");
					$excute = new AbstractQuery();
					$run = $excute->INSERT($_POST['txtName'],$_POST['txtEmail'],$_POST['txtSubject'],$_POST['txtMess']);
					if($run){
						echo '<script>alert("them thanh cong")</script>';
					}
					else{
						echo '<script>alert("loi cmnr")</script>';
					}
				}
				else echo '<script>alert("email k hop le")</script>';
			}
			else echo '<script>alert("email k dc de trong")</script>';
			}
			
			?>
		</div>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>877-433-8137</span>
			</p>
			<p>
				Or you can visit us at: <span>ZeroType<br> 250 Business ParK Angel Green, Sunville 109935</span>
			</p>
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