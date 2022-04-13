<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
	<link rel="stylesheet" href="/zerotype/css/style.css" type="text/css">
	<link rel="stylesheet" href="/zerotype/css/style2.css" type="text/css">
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
		.avatar form{
			width: 0%;
			float: right;
		}
		#btn-choice-avatar{
			border: none;
			height: 35px;
			font-size: 15px;
			
		}
		#btn-update-avatar{
			/* border: none; */
			width: 150px;
			height: 35px;
			border-radius: 20px;
			font-size: 17px;
			margin-top: 20px;
		}
		table, th, td {
			border:1px solid black;
		}
		#post{
			border-collapse: collapse;
			width: 90%;
			margin: 0 auto;
		}
		#post td, #post th{
			border: 1px solid #ddd;
			padding: 8px;
		}
		#post tr:nth-child(even){
			background-color: #f2f2f2; 
		}
		#post tr:hover{
			background-color: #ddd;
		}
		#post th{
			text-align: left;
			background-color: grey;
			color: white;
		}
	</style>
	<div id="header">
		<div>
			<div class="logo">
				<a href="/zerotype/index.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="/zerotype/admin.php">Home</a>
				</li>
				<li>
					<a href="/zerotype/features.php">Features</a>
				</li>
				<li>
					<a href="/zerotype/news.php">News</a>
				</li>
				<li>
					<a href="/zerotype/about.php">About</a>
				</li>
				<li>
					<a href="/zerotype/contact.php">Contact</a>
				</li>
				<li id="register">
					<a href="/zerotype/register.php">Register</a>
				</li>
				<li id="login">
					<a href="/zerotype/login.php">Login</a>
				</li>
				<?php
				include("../filterwithcookie.php");
				?>
				<li>
				<div class="avatar">
                    <?php
                    global $query;
                    $run = $query->loginGetValue($_COOKIE['username'],$_COOKIE['password']); // get avatar
                        if($run->num_rows > 0){
                            $row = $run->fetch_assoc();
                            echo "<a href='/zerotype/profile/updateProfile.php'><img src=../".$row['avatar']." width='60' height='60' style='border-radius:50%;'></a>";
                        }
                    ?>
				</div>
				</li>
			</ul>
		</div>
	</div>
			<center><h2 style="margin-top:15px;">Public Post</h2></center>
			<table id="post">
					<tr>
						<th>STT</th>
						<th>Author</th>
						<th>Title</th>
						<th>Date</th>
						<th>Short content</th>
						<th>Full content</th>
						<th>Public Post</th>
						<th>Delete Post</th>
					</tr>
					<?php
						global $query;
						$posts = $query->getAllPostPrivate();
						foreach($posts as $post){
					?>
					<tr>
						<td><?php echo $post['id'] ?></td>
						<td><?php echo $post['author'] ?></td>
						<td><?php echo $post['title'] ?></td>
						<td><?php echo $post['date'] ?></td>
						<td><?php echo $post['short_content'] ?></td>
						<td><?php echo $post['long_content'] ?></td>
						<td><a href="/zerotype/post/publicPost.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn duyệt bài chứ?');"><i class="fas fa-check"></i></a></td>
						<td><a href="/zerotype/post/deletePost.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?');"><i class="fas fa-times"></i></a></td>
                        </tr>
					<?php } ?>
			</table>
		<!-- </div> -->
	<!-- </div> -->
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