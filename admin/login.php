<?php
include('header.php');
 
include('../server/connection.php');

if (isset($_SESSION['admin_logged_in'])) {
    header('location: dashboard.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format on the client-side (you can add more validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: login.php?error=Invalid email format');
        exit();
    }

    // Query the database,  
    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admin WHERE admin_email = ?  LIMIT 1");
    $stmt->bind_param('s', $email);
    

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_hashed_password);
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $admin_hashed_password)) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_name'] = $admin_name;
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['admin_logged_in'] = true;

                header('location: dashboard.php?login_success=Logged in successfully');
                exit();
            } else {
                header('location: login.php?error=Incorrect password');
                exit();
            }
        } else {
            header('location: login.php?error=Email not found in the database');
            exit();
        }
    } else {
        // Handle the database connection or query error here
        header('location: login.php?error=Something went wrong');
        exit();
    }
}
?>

 
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <title>shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

 </head>
 <body> 

 
        <!-- login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Admin Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">
                <p style="color: red;" class="text-center" ><?php if(isset($_GET['error'])) {echo $_GET['error'];}  ?>
                <div class="form-group py-2">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group py-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group py-2">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login">
                </div>
                 
            </form>
        </div>
    </section>
 </body>
 </html>