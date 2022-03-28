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
				include("../filterwithcookie.php");
				?>
				
			</ul>
		</div>
	</div>
	<!-- <div id="contents"> -->
		<!-- <div id="tagline" class="clearfix"> -->
					<h2>Thêm bài viết</h2>
                    <div class="border-bottom my-3"></div>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Tác giả</label>
                            <input type="text" name="author" class="form-control" name="name" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề</label>
                            <textarea class="form-control" name="title" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nội dung ngắn</label>
                            <textarea class="form-control" name="short_content" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nội dung dài</label>
                            <textarea class="form-control" name="long_content" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ngày đăng</label>
                            <input type="date" class="form-control" name="date" value="' .  . '">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" value="Thêm" class="btn btn-secondary">
                        </div>
                    </form>
                    <?php
                     if(isset($_POST['submit'])){
                        global $query;
                        $run = $query->addPost($_POST['author'],$_POST['title'],$_POST['date'],$_POST['short_content'],$_POST['long_content']);
                        if($run)
                            echo "<script>alert('Thêm thành công');window.location.href='../admin.php';</script>";
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