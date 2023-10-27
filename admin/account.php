<?php include('header.php')  ?>;
<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit();
}
?>
<body>
    

<section id="orders" class="container orders  my-5 py-3   ">
    <div class=" mt-2">
        <h1 class="font-weight-bold text-center">ACCOUNT</h1>
        <hr class="mx-auto">
    </div>

    <?php //include('./sidemenu.php'); ?>

    <div class="container">
        <p class="font-weight-bold text-center"><?php echo $_SESSION['admin_id'];  ?></p>
        <p class="font-weight-bold text-center"><?php echo $_SESSION['admin_name'];  ?></p>
        <p class="font-weight-bold text-center"><?php echo $_SESSION['admin_email'];  ?></p>
    </div>
   <button> <a href="dashboard.php" style="text-decoration: none; color:white;">Back</a></button>
</section>
</body>