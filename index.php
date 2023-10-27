<?php include('header.php');   ?>

<!-- HOME SECTION -->
<section id="home">
	<div class="container">
		<h5>NEW ARRIVALS</h5>
		<h1><span> Best Prices</span> For This Seasons </h1>
		<p>We offer the best products for the most affordable prices</p>
		<a href="shop.php" class="btn btn-orange">Shop Now</a>
	</div>
</section>

<!-- brands -->
<!-- <section id="brand" class=" ">
	<div class="row">
		<img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/b.jpg" width="500px" height="500px">
		<img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/b.jpg" width="500px" height="500px">
		<img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/b.jpg" width="500px" height="500px">
		<img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/imgs/b.jpg">
	</div>
</section> -->

<!-- NEW -->
<section id="new" class="w-100">
	<div class="row p-0 m-0">
		<!-- one -->


		<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
			<img class="img-fluid" src="./assets/imgs/b.jpg" alt="">
			<div class="details">
				<h2>Affordable Prices</h2>
				<button>SHOP NOW</button>
			</div>
		</div>

		<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
			<img class="img-fluid" src="./assets/imgs/a.jpg" alt="">
			<div class="details">
				<h2></h2>
				<button>Amazing Deals</button>
			</div>
		</div>

		<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
			<img class="img-fluid" src="./assets/imgs/c.jpg" alt="">
			<div class="details">
				<h2> Watches</h2>
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

		<?php while ($row = $featured_products->fetch_assoc()) {  ?>
			<div class="product text-center col-lg-3 col-md-4 col-sm-12">
				<img class="img-fluid" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="Image">
				<div class="star">
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
					<i class="fa-solid fa-star star-icon"></i>
				</div>

				<h5 class="p-name"> <?php echo $row['product_name']; ?></h5>
				<h4 class="p-price"><?php echo $row['product_price']; ?> </h4>
			 	<a style="color: white; background-color:orangered; padding:10px; border-radius: 5px;"  href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">Buy-Now </a> 

				<!-- <button class="buy-btn`">Buy now</button> -->
			</div>


		<?php } ?>

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
			<img class="img-fluid" src="./assets/imgs/c.jpg" alt="">
			<div class="star">
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
			</div>

			<h5 class="p-name">Sport shoes</h5>
			<h4 class="p-price">$199.8</h4>
			<button  class=" buy-btn">Buy now</button>
		</div>

		<div class="product text-center col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid" src="./assets/imgs/d.jpg" alt="">
			<div class="star">
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
			</div>

			<h5 class="p-name">Sport shoes</h5>
			<h4 class="p-price">$199.8</h4>
			<button class="btn buy-btn">Buy now</button>
		</div>

		<div class="product text-center col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid" src="./assets/imgs/b.jpg" alt="">
			<div class="star">
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
			</div>

			<h5 class="p-name">Sport shoes</h5>
			<h4 class="p-price">$199.8</h4>
			<button class="btn buy-btn">Buy now</button>
		</div>

		<div class="product text-center col-lg-3 col-md-4 col-sm-12">
			<img class="img-fluid" src="./assets/imgs/c.jpg" alt="">
			<div class="star">
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
				<i class="fa-solid fa-star star-icon"></i>
			</div>

			<h5 class="p-name">Sport shoes</h5>
			<h4 class="p-price">$199.8</h4>
			<button class="btn buy-btn">Buy now</button>
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
			<img class="img-fluid" src="./assets/imgs/d.jpg" alt="">
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
			<img class="img-fluid" src="./assets/imgs/e.jpg" alt="">
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
			<img class="img-fluid" src="https://ng.jumia.is/cms/0-1-homepage/0-0-freelinks-gray/300x240/phones-tablets_300x240.png" alt="">
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
			<img class="img-fluid" src="./assets/imgs/f.jpg" alt="">
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
			<a href=""><img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png" width="100px" class="pb-5" alt=""> </a>
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





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>