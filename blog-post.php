<?php
	require_once('connection.php');
	//lấy id của bài viết
	$idblog = $_GET['id'];
	//Select bài viết từ cơ sở dữ liệu
	$query_post_title=  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des, a.name as n FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id LEFT JOIN authors AS a  ON p.author_id = a.id WHERE p.status= 1 AND p.id = ".$idblog;
	
	$result_post = $conn->query($query_post_title);

	$post_title = $result_post->fetch_assoc();

	//Select các bài viết liên quan
	$query_post_MostR=  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id  WHERE p.status= 1 AND c.id = ".$post_title['idcate']." ORDER BY created_at DESC LIMIT 4 ";
	
	$result_post_MostR = $conn->query($query_post_MostR);

	$post_MostR = array();
	while($row = $result_post_MostR->fetch_assoc()){
        $post_MostR[]= $row;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		
	<?php require_once('MainNav.php');?>
		<!-- Page Header -->
		<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url('./img/post-page.jpg');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-<?=$post_title['idcate']?>" href="category.php?id=<?= $post_title['idcate']?>&cate=<?= $post_title['t']?>"><?php echo $post_title['t']?></a>
								<span class="post-date"><?php echo $post_title['created_at']?></span>
							</div>
							<h1><?php echo $post_title['title']?></h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
								<h3><?php echo $post_title['title']?></h3>
								<p><i><?php echo $post_title['description'] ?></i></p>
								<figure class="figure-img">
									<img class="img-responsive" src="./img/<?= $post_title['thumbnail'] ?>" alt="" height="750px" width="450px">
								</figure>
								<p><?php echo $post_title['contents'] ?></p>
								<p><strong>Đăng bởi: <?php echo $post_title['n'] ?></strong></p>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>John Doe</h3>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2>3 Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

										<!-- comment -->
										<div class="media">
											<div class="media-left">
												<img class="media-object" src="./img/avatar.png" alt="">
											</div>
											<div class="media-body">
												<div class="media-heading">
													<h4>John Doe</h4>
													<span class="time">March 27, 2018 at 8:00 am</span>
													<a href="#" class="reply">Reply</a>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
											</div>
										</div>
										<!-- /comment -->
									</div>
								</div>
								<!-- /comment -->

								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/avatar.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>John Doe</h4>
											<span class="time">March 27, 2018 at 8:00 am</span>
											<a href="#" class="reply">Reply</a>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
								<!-- /comment -->
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="email">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Website</span>
											<input class="input" type="text" name="website">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
										</div>
										<button class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						<?php foreach ($post_MostR as $most)  {?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?=$most['id']?>"><img src=./img/<?=$most['thumbnail'] ;?> alt="" width="90px" height="90px"></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?=$most['id']?>"><?php echo $most['title']?></a></h3>
								</div>
							</div>
						<?php }?>
						<!-- /post widget -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-3" href="#">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="#">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="index.html" class="logo"><img src="./img/logo.png" alt=""></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Advertisement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">About Us</h3>
									<ul class="footer-links">
										<li><a href="about.html">About Us</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="contact.html">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="category.html">Web Design</a></li>
										<li><a href="category.html">JavaScript</a></li>
										<li><a href="category.html">Css</a></li>
										<li><a href="category.html">Jquery</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Join our Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Enter your email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
