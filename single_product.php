<?php 
 include('server/connection.php');
 

       if(isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];

        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");

        $stmt->bind_param("i", $product_id);

        $stmt->execute();

        $product= $stmt->get_result(); 

   } else{
    
    header('location:index.php');

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>single_product</title>
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


    <!-- single product -->
    <section class="container single-product my-5 pt-5">
        <div class="row my-5">
            <?php  while($row= $product->fetch_assoc()) { ?>
        


            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="./assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg" alt="Image">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="./assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6><?php echo $row['product_category']; ?></h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2><?php echo $row['product_price']; ?> </h2>

    <form  method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
            <input type="number" name="product_quantity" value="1">
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
    </form>

               
                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?>
                </span>
            </div>

        

            <?php } ?>

            
        </div>
    </section>

    <!-- related products -->
    <section id="featured related-products">
        <div class="container text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr>
        </div>
        <div class="row mx-auto container-fluid ">
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
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12 ">
                <a href=""><img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png"
                        width="100px" class="pb-2" alt=""> </a>
                <p class="pb-5">We provide products for the most affordable prices</p>
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

    <script>
        var mainImg = document.getElementById('mainImg');
        var smallImg = document.getElementsByClassName('small-img');

        //  smallImg[0].onclick = function(){
        //     mainImg.src = smallImg[0].src;
        //  }

        for (let i = 0; i <= 4; i++) {
            smallImg[i].onclick = function () {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>

</body>

</html>