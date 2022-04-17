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
		#comment{
			border-collapse: collapse;
			width: 100%;
			margin: 0 auto;
			word-break: break-all;
		}
		#comment td, #comment th{
			padding: 20px;
		}
		#comment tr:nth-child(even){
		}
		#comment tr:hover{
			background-color: #ddd;
		}
		#comment th{
			text-align: left;
			background-color: grey;
			color: white;
		}
		#btn-cmt{
			border: none;
			background-color: #727272;
			color: #fff;
			display: inline-block;
			font-size: 14px;
			line-height: 30px;
			width: 100px;
			text-align: center;
			text-decoration: none;
		}
		#btn-cmt:hover{
			background-color:#ffc107;
			color: #fff;
			display: inline-block;
			font-size: 14px;
			line-height: 30px;
			width: 100px;
			text-align: center;
			text-decoration: none;
		}
		.icon-cmt{
			float: right;
			width: 100px;
			text-align: center;
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
						?>

					<div class="comment">
						<form style="margin:30px 0;" method="POST" id="comment">
							<div class="mb-3">
								<textarea placeholder="Nhập comment" class="form-control" name="content" rows="2"></textarea>
							</div>
								<input id="btn-cmt" style="height:40px; font-size:15px;" type="submit" name="submit" value="Bình luận" >
						</form>
						<?php 
							if(isset($_POST['submit'])){
								if($_POST['content'] == "")
									echo "<script>alert('Comment không được để trống');</script>";
								else{
									global $query;
									$run = $query->addComment($_GET['id'],$_POST['content']);
									if($run)
										echo "<script>window.location.href='/zerotype/post.php?id=".$_GET['id']."';</script>";
								}
							}
						?>
					</div>
					<div class="list-comment">
						<!-- <center><h2><u>Danh sách comment</u></h2></center> -->
						<table id="comment">
							<?php
								global $query;
								$comments = $query->getAllComment($_GET['id']);
								foreach($comments as $cmt){
							?>
							<tr>
							<td><img width='45' height='45' style='border-radius:50%; margin-right: 10px;' src="<?php echo $query->getAvatarByUserId($cmt['user_id'])['avatar'] ?>" ><i><u><b><?php echo $cmt['fullname'] ?></b></u></i> : <?php echo $cmt['content'];?></td>
							<td>
							<?php
								global $query;
								if($query->checkIsMyComment($cmt['id']) || $query->isAdmin()){
									echo '<div class="icon-cmt"><a style="margin-left:30px;" href="/zerotype/comment/updateComment.php?id='.$cmt['id'].'&news='.$_GET['id'].'"><i class="fas fa-edit"></i></a>';
									echo '<a style="margin-left:30px;" href="/zerotype/comment/deleteComment.php?id='.$cmt['id'].'&news='.$_GET['id'].'"><i class="fas fa-times"></i></a></div>';
								}
							}
							?>
							</td>
							</tr>
						</table>
					</div>

					<?php

					}
					else
						echo "<h1>Bài viết không tồn tại!</h1> <span><a href='news.php' class='more'>Back to News</a></span>";
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