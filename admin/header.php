 <?php session_start();  ?>

<?php  include('../server/connection.php'); ?>
 
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
 <!-- THE NAVIGATION BAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
        <div class="container">
            <img src="https://logos.textgiraffe.com/logos/logo-name/Precious-designstyle-smoothie-m.png" class="logo" width="100px" height="30px" alt="logo">
            <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </div>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                     
                    <li class="nav-item">
                        <?php if(isset($_SESSION['admin_logged_in'])) { ?>
                        <a class="nav-link" href="logout.php?logout=1">Sign out</a>
                        <?php }; ?>
                    </li>

 
                </ul>
            </div>
        </div>
    </nav>
    <div class="mb-5 pb-5"></div>
    
  </body>
  </html>
 