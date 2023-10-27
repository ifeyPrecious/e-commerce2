<?php include('header.php'); ?>

<?php

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];
}else {
    header('location:products.php');
}
?>



<section id="orders" class="container orders  my-5 py-3   ">
    <div class=" mt-2">
        <h1 class="font-weight-bold text-center">Edit Images</h1>
        <hr class="mx-auto">
    </div>

    <?php //include('./sidemenu.php'); ?>



    <form id="create-form" enctype="multipart/form-data" class="mt-2" method="POST" action="update_images.php">

        <p class="text-center"><?php if (isset($_GET['error'])) {  ?></p>
        <p class="text-center text-danger"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <input type="hidden" name="product_id" value="<?php echo $product_id;  ?>">
    <input type="hidden" name="product_name" value="<?php echo $product_name;  ?>">


    <div class="form-group mt-2">
        <label for="">image1</label>
        <input type="file" class="form-control" id="image1" name="image1" placeholder="image1" required>
    </div>


    <div class="form-group mt-2">
        <label for="">image2</label>
        <input type="file" class="form-control" id="image2" name="image2" placeholder="image" required>
    </div>


    <div class="form-group mt-2">
        <label for="">image3</label>
        <input type="file" class="form-control" id="image3" name="image3" placeholder="image" required>
    </div>
    <div class="form-group mt-2">
        <label for="">image4</label>
        <input type="file" class="form-control" id="image4" name="image4" placeholder="image" required>
    </div>

    <div class="form-group mt-2">

        <input type="submit" class="btn btn-primary" id="create_image" name="update_images" value="Update">
    </div>
    </form>
</section>
</body>