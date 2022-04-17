<?php
include("controll.php");
$query = new AbstractQuery();
$checkCookie = $query->loginWithCookie();
?>
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link rel="stylesheet" href="css/styleform.css" type="text/css">
</head>
<body>
	<style>
		#header>div, #footer>div {
            width: 1000px;
        }
	</style>
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
                <li>
					<a href="contact.php">Contact</a>
				</li>
				<li>
					<a href="register.php">Register</a>
				</li>
                <li class="active">
					<a href="login.php">Login</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="section">
			<h1>Login</h1>
			<!-- <form method="POST" class="message">
				<input type="text" name="txtUsername" placeholder="Username" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input style="width:380px; height:33px;" type="password" name="txtPassword" placeholder="Enter the password" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<br><br>
				<input type="submit" name="txtSub" value="Login"/>
			</form>
			<a href="#">Forgot password</a> -->
			
			<form method="POST" id="HDpro">
                <label>Tên tài khoản</label>
                <input type="text" class="form-control" name="txtUsername">

                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="txtPassword">

                <input style="margin-top: 15px;" type="submit"name="txtSub" value="Đăng Nhập">
            </form>

			
			<?php
			function check(){
                $check = true;
                if (empty($_POST['txtUsername'])){
                    $check=false;
                    echo '<script>alert("Tên người dùng không được để trống")</script>';
                }
                else if (empty($_POST['txtPassword'])){
                    $check=false;
                    echo '<script>alert("Mật khẩu không được để trống")</script>';
                }
                return $check;
            }

			global $checkCookie;
			if($checkCookie != null){
				header('Location: index.php');
			}
			if(isset($_POST['txtSub'])){
                if(check()){
					$run = $query->login($_POST['txtUsername'],$_POST['txtPassword']);
                    if($run){
						header('Location: index.php');
						/*$role= $query->loginGetValue($_POST['txtUsername'],md5($_POST['txtPassword']));
						while($row = $role->fetch_assoc()) {
							if($row['role']=="USER")
								header('Location: index.php');
							else
								header('Location: admin.php');
							break;
						}*/
					}
                        
                    else
                        echo '<script>alert("Tài khoản mật khẩu không chính xác")</script>';
                }
            }
			
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