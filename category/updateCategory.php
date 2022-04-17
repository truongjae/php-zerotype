<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Zerotype Website Template</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/style2.css" type="text/css">
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
		#form-update-post{
			padding: 0 20%;
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
	<!-- <div id="contents"> -->
		<!-- <div id="tagline" class="clearfix"> -->
					<?php
						global $query;
						$category = $query->getCategoryById($_GET['id']);
					?>
					<center><h2 style="margin-top:15px;">Sửa thể loại bài viết</h2></center>
                    <div class="border-bottom my-3"></div>
                    <form method="POST" id="form-update-post">
                        <div class="mb-3">
                            <label class="form-label">Tên thể loại bài viết</label>
                            <input type="text" name="nameCategory" class="form-control" name="name" value="<?php echo $category['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" value="Sửa" class="btn btn-secondary">
                        </div>
                    </form>
                    <?php
                     if(isset($_POST['submit'])){
                        global $query;
                        $run = $query->updateCategory($_GET['id'],$_POST['nameCategory']);
                        if($run)
                            echo "<script>alert('Cập nhật thành công');window.location.href='/zerotype/category/category.php';</script>";
                     } 
                    ?>
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