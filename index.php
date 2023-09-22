<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<!-- THE NAVIGATION BAR -->
	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
		<div class="container">
			<img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png" class="logo"
				width="100px" height="30px" alt="logo">
			<div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</div>
			<div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="shop.html">shop</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="contact.html">Contact Us</a>
					</li>


					<li class="nav-item">
						<a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
						<a href="account.html"><i class="fa-solid fa-user"></i></a>

					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- HOME SECTION -->
	<section id="home">
		<div class="container">
			<h5>NEW ARRIVALS</h5>
			<h1><span> Best Prices</span> For This Seasons </h1>
			<p>We offer the best products for the most affordable prices</p>
			<button>Shop now</button>
		</div>
	</section>

	<!-- brands -->
	<section id="brand" class="container">
		<div class="row">
			<img class="img-fluid col-lg-3 col-md-6 col-sm-12"
				src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/02/8953852/1.jpg?5997">
			<img class="img-fluid col-lg-3 col-md-6 col-sm-12"
				src="https://ng.jumia.is/cms/0-1-category-pages/mobile-accessories/300x400/portable-speakers_300x400.png">
			<img class="img-fluid col-lg-3 col-md-6 col-sm-12"
				src="https://ng.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/60/7290622/1.jpg?9692">
			<img class="img-fluid col-lg-3 col-md-6 col-sm-12"
				src="https://ng.jumia.is/cms/0-1-homepage/0-0-freelinks-gray/300x240/generator.gif">


		</div>
	</section>

	<!-- NEW -->
	<section id="new" class="w-100">
		<div class="row p-0 m-0">
			<!-- one -->


			<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
				<img class="img-fluid" src="./assets/imgs/woman-5828786_1920.jpg" alt="">
				<div class="details">
					<h2>Affordable Prices</h2>
					<button>SHOP NOW</button>
				</div>
			</div>

			<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
				<img class="img-fluid" src="./assets/imgs/motorcycle-8192323_1920.jpg" alt="">
				<div class="details">
					<h2></h2>
					<button>Amazing Deals</button>
				</div>
			</div>

			<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
				<img class="img-fluid" src="./assets/imgs/fashion-3179178_1920.jpg" alt="">
				<div class="details">
					<h2>50% off Watches</h2>
					<button>SHOP NOW</button>
				</div>
			</div>
		</div>
	</section>

	<!-- Featured -->

	<section id="featured ">
		<div class="container text-center mt-5 py-5">
			<h3>OUR Featured Products</h3>
			<hr>
			<p>Here you can check out our featured products</p>
		</div>
		<div class="row mx-auto container-fluid ">
			
		<?php include('server/get_featured_products.php'); ?>

       <?php while($row = $featured_products->fetch_assoc) {    ?>
		
			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>
<!-- 
			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div> -->
<?php ?>
		</div>
	</section>
	<!-- BAANER -->

	<section id="banner" class="my-5 py-5">
		<div class="container">
			<h4>MID SEASON SALE</h4>
			<h1>Autumn collection <br> UP 30% OFF</h1>
			<button class="text-uppercase">SHOP NOW</button>
		</div>
	</section>
	<!-- clothes -->
	<section id="featured ">
		<div class="container text-center mt-5 ">
			<h3>Dresses % coats</h3>
			<hr>
			<p>Here you can check out our clothes</p>
		</div>
		<div class="row mx-auto container-fluid ">
			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/rose-165819_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/lovebird-8244066_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/lovebird-8244066_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

		</div>
	</section>

	<!-- bags -->
	<section id="featured ">
		<div class="container text-center mt-5 ">
			<h3>Dresses % coats</h3>
			<hr>
			<p>Here you can check out our clothes</p>
		</div>
		<div class="row mx-auto container-fluid ">
			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/rose-165819_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/lovebird-8244066_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid"
					src="https://ng.jumia.is/cms/0-1-homepage/0-0-freelinks-gray/300x240/phones-tablets_300x240.png"
					alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="./assets/imgs/puppy-1903313_1920.jpg" alt="">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name">Sport shoes</h5>
				<h4 class="p-price">$199.8</h4>
				<button class="buy-btn">Buy now</button>
			</div>

		</div>
	</section>
	<!-- footer -->
	<section class="mt-5 py-5 footer">
		<div class="row container mx-auto  pt-5">
			<div class="footer-one col-lg-3 col-md-6 col-sm-12 ">
				<a href=""><img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png"
						width="100px" class="pb-5" alt=""> </a>
				<p class="pt-1">We provide products for the most affordable prices</p>
			</div>
			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Featured</h5>
				<ul class="text-uppercase">
					<li><a href="">Men</a></li>
					<li><a href="">Women</a></li>
					<li><a href="">Boys</a></li>
					<li><a href="">Girls</a></li>
					<li><a href="">New Arrivals</a></li>
					<li><a href="">Clothes</a></li>
				</ul>
			</div>
			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Contact Us</h5>
				<address>
					123 Main Street<br>
					City, State ZIP<br>
					Country
				</address>
				<p>Phone: +1 (123) 456-7890</p>
				<p>Email: info@example.com</p>
			</div>

			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Follow Us</h5>
				<div class="social-icons">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
				</div>

				<img src="./assets/imgs/visa-card.png" class="py-3" alt="Visa Card">
			</div>
		</div>
	</section>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>

</body>

</html>