<?php 

session_start();  

if( !empty($_SESSION['cart']) && isset($_POST['checkout'])) {
    // let user in




 //send user to home page   
}else{


header('Location: index.php');

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
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

    <!-- checkout -->


    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action= "server/place_order.php" method="POST"> 
                <div class="form-group py-2 checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group py-2 checkout-small-element">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email"
                        required>
                </div>
                <div class="form-group py-2 checkout-small-element">
                    <label for="">Phone nunber</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone"
                        required>
                </div>
                <!-- <div class="form-group py-2 checkout-small-element">
                    <label for="">Password</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="password" placeholder="Password"
                        required>
                </div> -->
                <div class="form-group py-2 checkout-small-element">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="city" required>
                </div>
                <div class="form-group py-2 checkout-large-element">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Adress"
                        required>
                </div>
                <div class="form-group py-2 checkout-btn-container">
                    <p>Total amount: $ <?php echo $_SESSION['total']; ?> </p>
                    <input type="submit" class="btn" id="checkout-btn" name= "place_order" value="Place Order">
                </div>

            </form>
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