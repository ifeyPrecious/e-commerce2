<?php
// we want to get the details of other products

include('server/connection.php');

// we need to pass the product id from the account.php so if the usre click on detais we need to take the user to orderdetails.php
if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    //GET THE ORDER ID
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    //then we connec to the data base
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

    $stmt->bind_param('i', $order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();

   $order_total_price = calculateTotalOrderPrice($order_details);

} else {
    header('location:account.php');
    exit;
}


function calculateTotalOrderPrice($order_details)
{
    $total = 0;

   foreach($order_details as $row ) {


        $product_price =  $row['product_price'];
        $product_quantity =  $row['product_quantity'];
        $total =  $total + ($product_price * $product_quantity);

    }

    return $total;


    // foreach ($_SESSION['cart'] as $product_id => $product) {
    //    $price = $product['product_price'];
    //     $quantity = $product['product_quantity'];
    //     $total += ($price * $quantity);
    // }

    // $_SESSION['total'] = $total;
} 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>



    <!-- THE NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
        <div class="container">
            <img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png" width="100px" height="30px" alt="logo">
            <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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




    <!-- ORDERS DETAILS-->

    <section id="orders" class="container orders  my-5 py-5  ">
        <div class=" mt-5">
            <h2 class="font-weight-bold text-center">Order Details</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5  ">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>


            </tr>


            <?php foreach ( $order_details as $row) {  ?>

                <tr>
                    <td>
                        <div class="product-info">
                            <img src="./assets/imgs/<?php echo $row['product_image']; ?>" width="80" height="70" alt="">
                        </div>
                        <div>
                            <p class="mt-3"><?php echo $row['product_name'];  ?></p>
                        </div>
                    </td>

                    <td>
                        <p class="mt-3">#<?php echo $row['product_price'];  ?></p>
                    </td>
                    <td>
                        <span>
                            <p class="mt-3"><?php echo $row['product_quantity'];  ?></p>
                        </span>
                    </td>

                </tr>

            <?php } ?>
        </table>

        <?php if ($order_status == "not paid") {  ?>
            <form style="float: right;" method="post" action="payment.php">

            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price;  ?>">
            <input type="hidden" name="order_status" value="<?php echo $order_status  ?>">
                <input type="submit" name="order_pay_btn" class="btn" value="Pay Now">
            </form>
        <?php };  ?>

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