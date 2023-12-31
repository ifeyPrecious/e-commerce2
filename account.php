<?php
session_start();


include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_SESSION['user_email'];

    if ($password !== $confirmPassword) {
        header('location: account.php?error=Passwords do not match');
        exit;
    } elseif (strlen($password) < 6) {
        header('location: account.php?error=Password must be at least 6 characters');
        exit;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
        $stmt->bind_param('ss', $hashedPassword, $email);

        if ($stmt->execute()) {
            header('location: account.php?message=Password has been updated successfully');
            exit;
        } else {
            header('location: account.php?error=Could not update the password');
            exit;
        }
    }
}


//get orders=========================
if (isset($_SESSION['logged_in'])) {

    $user_id  = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ");

    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $orders = $stmt->get_result(); //[]

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


    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto text-center">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <p class="text-center" style="color: green;"><?php if (isset($_GET['login_success'])) {
                                                                    echo $_GET['login_success'];
                                                                }  ?></p>
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name :<span><?php if (isset($_SESSION['user_name'])) {
                                        echo $_SESSION['user_name'];
                                    }  ?></span></p>
                    <p>Email <span><?php if (isset($_SESSION['user_email'])) {
                                        echo $_SESSION['user_email'];
                                    } ?> </span></p>
                    <p><a href="#orders" id="orders-btn">Your Orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class=" mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                    <p class="text-center text-danger"><?php if (isset($_GET['error'])) {
                                                            echo $_GET['error'];
                                                        }   ?></p>
                    <p class="text-center" style="color: green;"><?php if (isset($_GET['message'])) {
                                                                        echo $_GET['message'];
                                                                    }  ?></p>
                    <h3>Change password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="account-password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="confirm Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change password" name="change_password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>



    <!-- ORDERS -->

    <section id="orders" class="container orders  my-5 py-3 ">
        <div class=" mt-2">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Order id</th>
                <th>Order cost</th>
                <th>Order status</th>
                <th>Order date</th>
                <th>Order details</th>
            </tr>

            <?php while ($row = $orders->fetch_assoc()) {

            ?>
                <tr>
                    <td>
                        <span> <?php echo $row['order_id'];  ?></span>
                    </td>
                    <td>
                        <span><?php echo $row['order_cost'];  ?></span>
                    </td>
                    <td>
                        <span><?php echo $row['order_status'];  ?></span>
                    </td>
                    <td>
                        <span> <?php echo $row['order_date']; ?> </span>
                    </td>
                    <td>
                        <form action="order_details.php" method="POST">
                            <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status">
                            <input type="hidden" value="<?php echo $row['order_id'];  ?>" name="order_id" >
                            <input class="btn " type="submit" name="order_details_btn" value="details">
                        </form>
                    </td>


                </tr>
            <?php } ?>
        </table>
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