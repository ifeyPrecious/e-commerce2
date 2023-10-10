 <?php

    session_start();
    include('server/connection.php');
   
if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];


        // Password hashing
        //if password do not match
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if ($password !== $confirmPassword) {
            header('location: register.php?error=passwords do not match');
        } elseif (strlen($password) < 6) {

            header('location: register.php?error=passwords must be at least 6 characters');
            $error = 'Password is too long';
        } else {
            // Check if email already exists

            $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email = ?");
            $stmt1->bind_param('s', $email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

            //check if a user already registerd with this email

            if ($num_rows != 0) {
                header('location:register.php?error=user with this email already exists');
            } else {
                // Insert a new user
                $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
                $stmt->bind_param('sss', $name, $email, $hashedPassword);

                //if account was created successfully
                if ($stmt->execute()) {
                    $user_id = $stmt->insert_id;  //to get the user id
                    $_SESSION['user_id'] = $user_id; //to get the usre id
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;

                    header('Location: account.php?register_success=Registration Successful');
                    // exit;
                    //account could not be created---------
                } else {
                    header('location: register.php?error=could not create account at the moment');
                }
            }
        }
   
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

     <!-- 
Register----------------- -->
     <section class="my-5 py-5">
         <div class="container text-center mt-3 pt-5">
             <h2 class="form-weight-bold">Register</h2>
             <hr class="mx-auto">
         </div>
         <div class="mx-auto container">
             <form id="register-form " method="POST" action="register.php">
                 <p style="color:red"> <?php if (isset($_GET['error'])) {
                                            echo $_GET['error'];
                                        } ?></p>
                 <div class="form-group py-2">
                     <label for="">Name</label>
                     <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                 </div>
                 <div class="form-group py-2">
                     <label for="">Email</label>
                     <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                 </div>
                 <div class="form-group py-2">
                     <label for="">Password</label>
                     <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                 </div>
                 <div class="form-group py-2">
                     <label for="">Confirm password</label>
                     <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
                 </div>
                 <div class="form-group py-2">
                     <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                 </div>
                 <div class="form-group py-2">
                     <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
                 </div>
             </form>
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