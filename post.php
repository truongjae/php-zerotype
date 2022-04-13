<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>News title - Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
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
		.#comment{
			border-collapse: collapse;
			width: 90%;
			margin: 0 auto;
		}
		#comment td, #comment th{
			border: 1px solid #ddd;
			padding: 8px;
		}
		#comment tr:nth-child(even){
			background-color: #f2f2f2; 
		}
		#comment tr:hover{
			background-color: #ddd;
		}
		#comment th{
			text-align: left;
			background-color: grey;
			color: white;
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
							<p>".$row['short_content']."</p>
							<p>".$row['long_content']."</p>
							<span><a href='news.php' class='more'>Back to News</a></span>";
						}
					
					}
					else
						echo "<h1>Bài viết đéo tồn tại!</h1> <span><a href='news.php' class='more'>Back to News</a></span>";
				?>
		</div>
		<div class="comment">
			<form method="POST" id="comment">
				<div class="mb-3">
					<label class="form-label">Comment</label>
					<textarea class="form-control" name="content" rows="2"></textarea>
				</div>
				
					<input style="height:40px; font-size:15px;" type="submit" name="submit" value="Bình luận" >
			
            </form>
			<?php 
				if(isset($_POST['submit'])){
					global $query;
					$run = $query->addComment($_GET['id'],$_POST['content']);
					if($run)
						echo "<script>alert('Thêm thành công');window.location.href='/zerotype/post.php?id=".$_GET['id']."';</script>";
				 }
			?>
		</div>
		<div class="list-comment">
			<center><h2><u>Danh sách comment</u></h2></center>
			<?php
				global $query;
				$comments = $query->getAllComment($_GET['id']);
				foreach($comments as $cmt){
			?>
			<p><i><u><b><?php echo $cmt['fullname'] ?></b></u></i> : <?php echo $cmt['content'] ?></p>
			<?php 
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