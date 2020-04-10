<?php
//Liên kết tới file Connection
require_once('connection.php');
    
//Post 2 bài viết  mới nhất vừa cập nhật
	$query_tow_post=  "SELECT p.*, c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 2 ";

	$result_tow_post = $conn->query($query_tow_post);

	$posts_tow_post = array();

	while($row = $result_tow_post->fetch_assoc()){
		$posts_tow_post[] = $row;
	}
//Post 6 bài viết mới nhất
	$query_recent_post=  "SELECT p.*,c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 2,6";

    $result_recent_post = $conn->query($query_recent_post);

    $posts_recent_post = array();

    while($row = $result_recent_post->fetch_assoc()){
        $posts_recent_post[] = $row;
	}
//Post tiếp theo
/*	$query_one_post=  "SELECT p.*, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 8,1";

	$result_one_post= $conn->query($query_one_post);

	$posts_one_post= array();

	while($row = $result_one_post->fetch_assoc()){
		$posts_one_post[] = $row;
	}*/

//Post 7 bài viết tiếp theo
	$query_post=  "SELECT p.*,c.id as idcate, c.tible as t  , c.descripition as des FROM posts as p LEFT JOIN categories as c ON p.categories_id = c.id WHERE status= 1 ORDER BY created_at DESC limit 8,7 ";

    $result_post = $conn->query($query_post);

    $posts_post = array();

    while($row = $result_post->fetch_assoc()){
        $posts_post[] = $row;
	}
//Load danh mục
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Bài Tập PHP Online Buổi 2</title>

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
		<?php require_once('MainNav.php')?>
		<!-- /Header -->
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<?php foreach ($posts_tow_post as $post) {?>
				<div class="row">	
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.php?id=<?=$post['id']?>"><img src=<?php echo $post['thumbnail'] ;?> alt="" height="345px"></a>
							<div class="post-body">
								<div class="post-meta">
								<?php 
									$kt = NULL;
									if(strcasecmp($post['des'], "NTN") == 0)
										$kt = 'post-category cat-1';
									if(strcasecmp($post['des'], "SB") == 0)
										$kt = "post-category cat-2";
									if(strcasecmp($post['des'], "NNT") == 0)
										$kt = "post-category cat-3";
								?>
								<a class= "<?php echo $kt ;?>" href="category.php?id=<?= $post['idcate']?>&cate=<?= $post['t']?>"><?php echo $post['t'] ;?></a>
								<span class="post-date"><?php echo $post['created_at'] ;?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?=$post['id']?>"><?php echo $post['title'] ;?></a></h3>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row"> 
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts	</h2>
						</div>
					</div>

					<?php
					foreach ($posts_recent_post as $post) {
					?>
					<!-- post  6 bài đầu -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?=$post['id']?>"><img src="<?php echo $post['thumbnail'] ;?>" alt="" height="207" ></a>
							<div class="post-body">
							<div class="post-meta">
								<?php 
									$kt = NULL;
									if(strcasecmp($post['des'], "NTN") == 0)
										$kt = 'post-category cat-1';
									if(strcasecmp($post['des'], "SB") == 0)
										$kt = "post-category cat-2";
									if(strcasecmp($post['des'], "NNT") == 0)
										$kt = "post-category cat-3";
								?>
								<a class= "<?php echo $kt ;?>" href="category.php?id=<?= $post['idcate']?>&cate=<?= $post['t']?>"><?php echo $post['t'] ;?></a>
								<span class="post-date"><?php echo $post['created_at'] ;?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?=$post['id']?>"><?php echo $post['title'] ;?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php } ?>
					<!-- post -->
					
				<!-- /row -->
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post 1 bài tiếp theo -->
							<div class="col-md-12">
							<div class="post">
									<a class="post-img" href="blog-post.php?id=<?=$posts_post["0"]['id']?>"><img src="<?php echo  $posts_post["0"]["thumbnail"] ;?>" alt="" height="600px"></a>
									<div class="post-body">
									<div class="post-meta">
									<?php 
										$kt = NULL;
										if(strcasecmp($posts_post["0"]['des'], "NTN") == 0)
											$kt = 'post-category cat-1';
										if(strcasecmp($posts_post["0"]['des'], "SB") == 0)
											$kt = "post-category cat-2";
										if(strcasecmp($posts_post["0"]['des'], "NNT") == 0)
											$kt = "post-category cat-3";
									?>
								<a class= "<?php echo $kt ;?>" href="category.php?id=<?= $posts_post["0"]['idcate']?>&cate=<?= $posts_post["0"]['t']?>"><?php echo $posts_post["0"]['t'] ;?></a>
								<span class="post-date"><?php echo $posts_post[$i]['created_at'] ;?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?=$posts_post["0"]['id']?>"><?php echo $posts_post["0"]['title'] ;?></a></h3>
									</div>
								</div>
							</div>
							<!-- post  6 bài liên tục-->
							<?php for ($i=1; $i < 7; $i++) { ?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="bblog-post.php?id=<?=$posts_post[$i]['id']?>"><img src="<?php echo $posts_post[$i]['thumbnail'] ;?>" alt="" height="225px"></a>
									<div class="post-body">
									<div class="post-meta">
										<?php 
											$kt = NULL;
											if(strcasecmp($posts_post[$i]['des'], "NTN") == 0)
												$kt = 'post-category cat-1';
											if(strcasecmp($posts_post[$i]['des'], "SB") == 0)
												$kt = "post-category cat-2";
											if(strcasecmp($posts_post[$i]['des'], "NNT") == 0)
												$kt = "post-category cat-3";
										?>
										<a class= "<?php echo $kt ;?>" href="category.php?id=<?= $posts_post[$i]['idcate']?>&cate=<?= $posts_post[$i]['t']?>"><?php echo $posts_post[$i]['t'] ;?></a>
										<span class="post-date"><?php echo $posts_post[$i]['created_at'] ;?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?=$posts_post[$i]['id']?>"><?php echo $posts_post[$i]['title'] ;?></a></h3>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./img/widget-1.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>
						</div>
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
										<a class="post-category cat-3" href="category.html">Jquery</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
								</div>
							</div>

							<div class="post post-thumb">
								<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-2" href="category.html">JavaScript</a>
										<span class="post-date">March 27, 2018</span>
									</div>
									<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Featured Posts</h2>
						</div>
					</div>

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.html">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="./img/post-5.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.html">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="./img/post-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.html">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-4" href="category.html">Css</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">DXD</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="category.html">Jquery</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
						
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
					</div>
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
