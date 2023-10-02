<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
		<div class="container">
		<img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png"
				width="100px" height="30px" alt="logo">
			<div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</div>
			<div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="shop.php">shop</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>


					<li class="nav-item">
						<a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
						<a href="account.php"><i class="fa-solid fa-user"></i></a>

					</li>
				</ul>
			</div>
		</div>
	</nav>


    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto text-center">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name :<span>John</span></p>
                    <p>Email <span>ifeyprecious7@gmail.com</span></p>
                    <p><a href="" id="orders-btn">Your Orders</a></p>
                    <p><a href="" id="logout-btn">Logout</a></p>
                </div>
            </div>
            <div class=" mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>Change password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="account-password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword"  placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change password" class="btn" id="change-pass-btn">
                    </div>
                </form>
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