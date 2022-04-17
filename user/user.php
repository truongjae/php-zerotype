
<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/style2.css" type="text/css">
	<link rel="stylesheet" href="../css/styleform.css" type="text/css">
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
		#user{
			border-collapse: collapse;
			width: 50%;
			margin: 0 auto;
		}
		#user td, #user th{
			border: 1px solid #ddd;
			padding: 8px;
		}
		#user tr:nth-child(even){
			background-color: #f2f2f2; 
		}
		#user tr:hover{
			background-color: #ddd;
		}
		#user th{
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
					<a href="/zerotype/index.php">Home</a>
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
				include("../filteradmin.php");
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
		
		
		<div class="menu-choice">
			<form style="width:10%; margin:15px 5%;" method="POST" enctype="multipart/form-data" id="HDpro">
				<label>Lựa chọn chức năng: </label>
				<select class="form-select" class="form-control" name="manager_choice">
					<option selected value="managePost">Quản lý Post<a href="/zerotype/post/addPost.php"><i class="fas fa-plus"></i></a></option>
					<option value="manageCategory">Quản lý Category<a href="/zerotype/post/addPost.php"><i class="fas fa-plus"></i></a></option>
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
							header("Location: /zerotype/category/addCategory.php");
							break;
						case "manageUser":
							header("Location: /zerotype/user/user.php");
							break;
					}
				}
			?>
		</div>

			<table id="user">
					<tr>
						<th>STT</th>
						<th style="min-width:30px">ID</th>
						<th style="min-width:150px">Username</th>
						<th style="min-width:150px">Fullname</th>
						<th>Gender</th>
						<th>Favorite</th>
						<th>Email</th>
						<th>Role</th>
                        <th>Update Category</th>
						<th>Delete Category</th>
					</tr>
					<?php
						global $query;
						$users = $query->getAllUser();
						$i=1;
						foreach($users as $user){
					?>
					<tr>
						<td><?php echo $i++ ?></td>
						<td><?php echo $user['id'] ?></td>
						<td><?php echo $user['username'] ?></td>
						<td><?php echo $user['fullname'] ?></td>
						<td><?php echo $user['gender'] ?></td>
						<td><?php echo $user['favorite'] ?></td>
						<td><?php echo $user['email'] ?></td>
						<td><?php echo $user['role'] ?></td>
						<td><a href="/zerotype/user/updateUser.php?id=<?php echo $user['id'] ?>" ><i class="fas fa-edit"></i></a></td>
						<td><a href="/zerotype/category/deleteCategory.php?id=<?php echo $category['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?');"><i class="fas fa-times"></i></a></td>
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