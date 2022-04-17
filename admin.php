
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
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
			text-align: center;
		}
		td{
			word-break: break-all;
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
				include("filteradmin.php");
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
		
		
		<div class="menu-choice">
			<form style="width:10%; margin:15px 5%;" method="POST" enctype="multipart/form-data" id="HDpro">
				<label>Lựa chọn chức năng: </label>
				<select class="form-select" class="form-control" name="manager_choice">
					<option selected value="managePost">Quản lý Post</option>
					<option value="manageCategory">Quản lý Category</option>
					<option value="manageUser">Quản lý User</option>
				</select>
				<input type="submit"name="submit_manager_choice" value="Xác nhận">
			</form>
			<?php
				if(isset($_POST['submit_manager_choice'])){
					switch($_POST['manager_choice']){
						case "managePost":
							header("Location: /zerotype/admin.php");
							break;
						case "manageCategory":
							header("Location: /zerotype/category/category.php");
							break;
						case "manageUser":
							header("Location: /zerotype/user/user.php");
							break;
					}
				}
			?>
		</div>

		<center><h1 style="margin-top:30px;">Add Post <a href="/zerotype/post/addPost.php"><i class="fas fa-plus"></i></a></h1></center>
		<center><h1>Public List Post <a href="/zerotype/post/privatePost.php"><i class="fas fa-check"></i></a></h1></center>
		
			<table id="post">
					<tr>
						<th>STT</th>
						<th style="min-width:30px">ID</th>
						<th style="min-width:150px">Author</th>
						<th>Title</th>
						<th style="min-width:100px">Date</th>
						<th>Short content</th>
						<th style="min-width:100px">Category</th>
						<th>Update Post</th>
						<th>Delete Post</th>
					</tr>
					<?php
						global $query;
						$posts = $query->getAllNews();
						$i=1;
						foreach($posts as $post){
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $post['id'] ?></td>
						<td><?php echo $query->getFullNameFromUserId($post['author']) ?></td>
						<td><?php echo $post['title'] ?></td>
						<td><?php echo date_format(date_create($post['date']), 'd-m-Y') ?></td>
						<td><?php echo $post['short_content'] ?></td>
						<td><?php echo $query->getCategoryById($post['category_id'])['name']?></td>
						<td><a href="./post/updatePost.php?id=<?php echo $post['id'] ?>" ><i class="fas fa-edit"></i></a></td>
						<td><a href="./post/deletePost.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?');"><i class="fas fa-times"></i></a></td>
					</tr>
					<?php } ?>
			</table>
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