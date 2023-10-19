<?php include('header.php'); ?>

<?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $products = $stmt->get_result();//[]
    
} elseif (isset($_POST['edit_btn'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $offer = $_POST['offer'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_description = ?, product_price = ?, product_color = ?, product_special_offer = ?, product_category = ? WHERE product_id = ?");

    $stmt->bind_param('ssisisi', $name, $description, $price, $color, $offer, $category, $product_id);
    
    if ($stmt->execute()) {
        header('Location: products.php?edit_success_message=Product has been updated successfully');
        exit;
    } else {
        header('Location: products.php?edit_error_message=Something went wrong, try again');
        exit;
    }
} else {
    header('products.php');
}

?>
<body>
    <?php include('sidemenu.php'); ?>
    <div id="main-content">
        <h1 class="text-center">Edit Product</h1>

        <form id="edit-form" method="post" action="edit_product.php">
            <p class="text-center text-danger">
                <?php if (isset($_GET['message'])) {
                    echo $_GET['message'];
                } ?>
                <?php if (isset($_GET['message'])) { ?>
                    <a href="login.php" class="btn btn-primary">Login</a>
                <?php } ?>
            </p>
            
            <?php if (!empty($products)) { // Check if $products is not empty before using foreach loop ?>
                <?php foreach ($products as $product) { ?>
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <div class="form-group py-2 checkout-small-element">
                        <label for="product-name">Name</label>
                        <input type="text" class="form-control" id="product-name" name="name" value="<?php echo $product['product_name']; ?>">
                    </div>
                    <div class="form-group py-2 checkout-small-element">
                        <label for="product-desc">Description</label>
                        <input type="text" class="form-control" id="product-desc" name="desc" value="<?php echo $product['product_description']; ?>">
                    </div>
                    <div class="form-group py-2 checkout-small-element">
                        <label for="product-price">Price</label>
                        <input type="tel" class="form-control" id="product-price" name="price" value="<?php echo $product['product_price']; ?>">
                    </div>
                    <div class="form-group py-2 checkout-small-element">
                        <label for="product-category">Category</label>
                        <input type="tel" class="form-control" id="product-category" name="category" value="<?php echo $product['product_category']; ?>">
                    </div>
                    <div class="form-group py-2 checkout-small-element">
                        <label for="product-color">Color</label>
                        <input type="text" class="form-control" id="product-color" name="color" value="<?php echo $product['product_color']; ?>">
                    </div>
                    <div class="form-group py-2 checkout-large-element">
                        <label for="product-offer">Special Offer</label>
                        <input type="text" class="form-control" id="product-offer" name="offer" value="<?php echo $product['product_special_offer']; ?>">
                    </div>
                <?php } ?>
            <?php } ?>
            
            <div class="form-group py-2 checkout-small-element">
                <input type="submit" class="btn btn-primary" value="Edit" name="edit_btn">
            </div>
        </form>
    </div>
</body>
