<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    // Check if the user has already added a product to the cart
    if (isset($_SESSION['cart'])) {
        $products_array_ids = array_column($_SESSION['cart'], "product_id");

        // Check if the product has already been added to the cart
        if (!in_array($_POST['product_id'], $products_array_ids)) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            // Create a product array
            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            );

            // Add the product to the cart
            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            // Product has already been added
            echo '<script>alert("Product was already added to the cart");</script>';
        }
    } else {
        // If this is the first product, initialize the cart with an empty array
        $_SESSION['cart'] = array();

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        // Create a product array
        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );

        // Add the product to the cart
        $_SESSION['cart'][$product_id] = $product_array;
        
    }


    //calculateTotal
    calculateTotalPrice();

} elseif (isset($_POST['remove_product'])) {

    // Code for removing a product from the cart
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate total
  calculateTotalPrice();


} elseif (isset($_POST['edit_quantity'])) {
//we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
//we get product aray from the session
 $product_array = $_SESSION['cart'] [$product_id];
// update product quantity
 $product_array['product_quantity'] = $product_quantity;
//return array back to its place
 $_SESSION['cart'] [$product_id] = $product_array;

 //calculate total
 calculateTotalPrice();

}else {
    // header('location: index.php');
}



//fuction for the total price
 

function calculateTotalPrice() {
    $total = 0;

    foreach ($_SESSION['cart'] as $product_id => $product) {
        $price = $product['product_price'];
        $quantity = $product['product_quantity'];
        $total += ($price * $quantity);
    }

    $_SESSION['total'] = $total;
}

?>




 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- THE NAVIGATION BAR -->
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


    <!-- Cart Section -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold text-center">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>

            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="./assets/imgs/<?php echo $value['product_image']; ?>" alt="">
                            <div>
                                <p><?php echo $value['product_name']; ?></p>
                                <small><span>#</span> <?php echo $value['product_price']; ?></small>
                                <br>
                                <form method="POST" action="cart.php">
                                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                    <input type="submit" name="remove_product" class="remove-btn" value="Remove">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td> 
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                            <input type="number" name= "product_quantity" value="<?php echo $value['product_quantity']; ?>">
                            <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                        </form>
                        
                    </td>
                    <td>
                        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                    </td>
                </tr>
            <?php } ?>

        </table>

        <!-- Total Amount -->
        <div class="cart-total">
            <table>
              
                <tr>
                    <td>Total</td>
                    <td><?php echo $_SESSION['total']; ?></td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <form method= "POST" action="checkout.php">
            <input type= "submit" class="btn  checkout-btn" value="Checkout" name="checkout"> 
            </form>
           
        </div>
    </section>

    <!-- Footer Section -->
    <section class="mt-5 py-5 footer">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
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