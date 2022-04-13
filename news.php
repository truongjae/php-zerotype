
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>News - Zerotype Website Template</title>
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
		<div class="main">
			<h1>News</h1>
			<ul class="news">
				<?php
					$query = new AbstractQuery();
					$total_page = $query->getAllNews()->num_rows;
					include("page.php");
					$page = new PageAble($total_page);
					$run = $query->getAllNewsByPageAble($page->getStart(), 5);
					if($run){
						while($row = $run->fetch_assoc()) {
							$date = explode('-', $row['date']);
							echo 
							'<li>
							<div class="date">
								<p>
									<span>'.date_format(date_create($row['date']),'d').'</span>
									'.$date[1].'-'.$date[0].'
								</p>
							</div>
							<h2>'.$row['title'].'<span>'.$query->getFullNameFromUsername($row['author']).'</span></h2>
							<p>'.$row['short_content'].'<span><a href="post.php?id='.$row['id'].'" class="more">Read More</a></span>'.'</p>
							</li>';
						}
					}
					for($i=1;$i<=$page->getTotalPage();$i++){
						echo '<a style="margin-right:15px"; href="/zerotype/news.php?page='.$i.'">'.$i.'</a>';
					}
				?>
				
			</ul>
		</div>
		<div class="sidebar">
			<h1>Popular Posts</h1>
			<ul class="posts">
			<?php
					$query = new AbstractQuery();
					$run = $query->getNewsByTop3();
					if($run){
						while($row = $run->fetch_assoc()) {
							echo "
							<li>
								<h4 class='title'><a href='post.php?id=".$row['id']."'>".$row['title']."</a></h4>
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