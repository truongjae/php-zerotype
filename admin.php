<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
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
			width: 100%;
			float: left;
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
				<a href="index.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="admin.php">Home</a>
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
				<li>
				<div class="avatar">
					<div>
						<!-- <h1>TRANG ADMIN</h1> -->
						<?php
						global $query;
						$run = $query->loginGetValue($_COOKIE['username'],$_COOKIE['password']); // get avatar
						if($run->num_rows > 0){
							while($row = $run->fetch_assoc()) {
								echo "<img src=".$row['avatar']." width='100' style='border-radius:20px;'>";
								break;
							}
						}
						if(isset($_POST['submit'])){
							include("uploadfile.php");
							$upload = new UploadFile();
							$avatar = $upload->upload();
							if($avatar != null){
								$query->updateAvatar($avatar,$_COOKIE['username'],$_COOKIE['password']);
								header('Location: admin.php');
							}
						}	
						?>
					</div>
					<form method="post" enctype="multipart/form-data">
					<input id="btn-choice-avatar" type="file" name="file">
					<input id="btn-update-avatar" type="submit" value = "update avatar" name="submit">
					</form>
				</div>
				</li>
				
			</ul>
		</div>
	</div>
	<!-- <div id="contents"> -->
		<!-- <div id="tagline" class="clearfix"> -->
		<center><h1>Add Post <a href="./post/addPost.php"><i class="fas fa-plus"></i></a></h1></center>
			<table id="post">
					<tr>
						<th>STT</th>
						<th>Author</th>
						<th>Title</th>
						<th>Date</th>
						<th>Short content</th>
						<th>Full content</th>
						<th>Update Post</th>
						<th>Delete Post</th>
					</tr>
					<?php
						global $query;
						$posts = $query->getAllNews();
						foreach($posts as $post){
					?>
					<tr>
						<td><?php echo $post['id'] ?></td>
						<td><?php echo $post['author'] ?></td>
						<td><?php echo $post['title'] ?></td>
						<td><?php echo $post['date'] ?></td>
						<td><?php echo $post['short_content'] ?></td>
						<td><?php echo $post['long_content'] ?></td>
						<td><a href="./post/updatePost.php?id=<?php echo $post['id'] ?>" ><i class="fas fa-edit"></i></a></td>
						<td><a href="./post/deletePost.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?');"><i class="fas fa-times"></i></a></td>
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