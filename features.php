
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>News - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link rel="stylesheet" href="css/styleform.css" type="text/css">
</head>
<body>
	<style>
		#header>div, #footer>div {
            width: 1000px;
        }
		.avatar{
			width: 100%;
			height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
		}
		.main {
			width: 100%;
		}
		ul,li{
			list-style: none;
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
				<li class="active">
					<a href="features.php">Features</a>
				</li>
				<li>
					<a href="news.php">News</a>
				</li>
				<li >
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
				<li>
				<div class="avatar">
                    <?php
                    global $query;
                    $run = $query->loginGetValue($_COOKIE['username'],$_COOKIE['password']); // get avatar
                        if($run->num_rows > 0){
                            $row = $run->fetch_assoc();
                            echo "<a href='/zerotype/profile/updateProfile.php'><img src=".$row['avatar']." width='60' height='60' style='border-radius:50%;'></a>";
                        }
                    ?>
				</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="main">
			<h1>Hot News</h1>
			<ul class="posts">
			<?php
					$query = new AbstractQuery();
					$run = $query->getNewsByTop3();
					if($run){
						while($row = $run->fetch_assoc()) {
							echo "
							<li style='word-break: break-all;'>
								<h4 class='title'><a href='post.php?id=".$row['id']."'>".$row['title']."</a></h4>
								
								<p><b>Tác giả:</b><img width='35' height='35' style='border-radius:50%; margin:0 5px; margin-bottom:-10px;' src='".$query->getAvatarByUserId($row['author'])['avatar']."' > <i>".$query->getFullNameFromUserId($row['author'])."</i></p>
								<p>Thể loại: <a href='/zerotype/news.php?category_id=".$row['category_id']."'>"
								.$query->getCategoryById($row['category_id'])['name']
								."</a></p>
								<p>
									".$row['short_content']."
								</p>
							</li>
							";
						}
					}
				?>
			</ul>
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