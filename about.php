<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Features - Zerotype Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans:400,700">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<style>
body {
	font-family: "Open Sans", sans-serif;
}
h2 {
	color: #333;
	text-align: center;
	text-transform: uppercase;
	font-family: "Roboto", sans-serif;
	font-weight: bold;
	position: relative;
	margin: 25px 0 50px;
}
h2::after {
	content: "";
	width: 100px;
	position: absolute;
	margin: 0 auto;
	height: 3px;
	background: #ffdc12;
	left: 0;
	right: 0;
	bottom: -10px;
}
.carousel {
	width: 650px;
	margin: 0 auto;
	padding-bottom: 50px;
}
.carousel .carousel-item {
	color: #999;
	font-size: 14px;
	text-align: center;
	overflow: hidden;
	min-height: 340px;
}
.carousel .carousel-item a {
	color: #eb7245;
}
.carousel .img-box {
	width: 145px;
	height: 145px;
	margin: 0 auto;
	border-radius: 50%;
}
.carousel .img-box img {
	width: 100%;
	height: 100%;
	display: block;
	border-radius: 50%;
}
.carousel .testimonial {	
	padding: 30px 0 10px;
}
.carousel .overview {	
	text-align: center;
	padding-bottom: 5px;
}
.carousel .overview b {
	color: #333;
	font-size: 15px;
	text-transform: uppercase;
	display: block;	
	padding-bottom: 5px;
}
.carousel .star-rating i {
	font-size: 18px;
	color: #ffdc12;
}
.carousel-control-prev, .carousel-control-next {
	width: 30px;
	height: 30px;
	border-radius: 50%;
	background: #999;
	text-shadow: none;
	top: 4px;
}
.carousel-control-prev i, .carousel-control-next i {
	font-size: 20px;
	margin-right: 2px;
}
.carousel-control-prev {
	left: auto;
	right: 40px;
}
.carousel-control-next i {
	margin-right: -2px;
}
.carousel .carousel-indicators {
	bottom: 15px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 11px;
	height: 11px;
	margin: 1px 5px;
	border-radius: 50%;
}
.carousel-indicators li {	
	background: #e2e2e2;
	border: none;
}
.carousel-indicators li.active {		
	background: #888;		
}
</style>
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
				<li>
					<a href="news.php">News</a>
				</li>
				<li class="active">
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
		<h2>TOP Tác giả</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<?php
					global $query;
					$authors = $query->getTop3Author();
					$i=0;
					foreach($authors as $author){
						$user = $query->getUserById($author['author']);
				 ?>
				 <div class="carousel-item <?php if($i++ == 0) echo "active" ?>">
					<div class="img-box"><img src="<?php echo $user['avatar'] ?>" alt=""></div>
					<p class="testimonial">
						<?php
							$gender = $user['gender'] == "male" ? "Anh" : "Cô";
							$list_favorite = explode(',', $user['favorite']);
							$favorite ="";
							foreach($list_favorite as $f){
								switch($f){
									case "hoclaptrinh":
										$favorite.="Học lập trình,";
										break;
									case "xemphim":
										$favorite.="Xem phim,";
										break;
									case "choigame":
										$favorite.="Chơi game,";
										break;
								}
							}
							echo $gender." có tên thật là <b><u><i>".$user['fullname']."</i></u></b> sở thích: ".$favorite." ".$gender." đã đóng góp nhiều công sức xây dựng cộng đồng tin tức số 1 thế giới!";
						?>
					</p>
					<p class="overview"><b><?php echo $user['username'] ?></b>Tổng số bài đăng: <a href="#"><?php echo $author['news_count'] ?></a> bài</p>
					<div class="star-rating">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-star"></i></li>
							<li class="list-inline-item"><i class="fa fa-star"></i></li>
							<li class="list-inline-item"><i class="fa fa-star"></i></li>
							<li class="list-inline-item"><i class="fa fa-star"></i></li>
							<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
						</ul>
					</div>
				</div>
				 <?php
					}
				 ?>
			</div>
			<!-- Carousel controls -->
			<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control-next" href="#myCarousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
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