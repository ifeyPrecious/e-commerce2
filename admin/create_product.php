<?php
include('../server/connection.php');

// Check if the form was submitted
if (isset($_POST['create_product'])) {
    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_color = $_POST['color'];

    // Check if 'category' is set and not empty
    if (empty($product_category)) {
        header('location: products.php?products_failed=Category cannot be empty');
        exit;
    }

    // Temporary names of the uploaded images
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];

    // The image names
    $image_name1 = $product_name . "1.jpg";
    $image_name2 = $product_name . "2.jpg";
    $image_name3 = $product_name . "3.jpg";
    $image_name4 = $product_name . "4.jpg";

    // Upload images
    move_uploaded_file($image1, "../assets/imgs/" . $image_name1);
    move_uploaded_file($image2, "../assets/imgs/" . $image_name2);
    move_uploaded_file($image3, "../assets/imgs/" . $image_name3);
    move_uploaded_file($image4, "../assets/imgs/" . $image_name4);

    // Prepare and execute the SQL statement to insert the product
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price, product_special_offer, product_image, product_image2, product_image3, product_image4, product_category, product_color) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('ssssssssss', $product_name, $product_description, $product_price, $product_special_offer, $image_name1, $image_name2, $image_name3, $image_name4, $product_category, $product_color);

    if ($stmt->execute()) {
        header('location: products.php?product_created=Product has been created successfully');
    } else {
        header('location: products.php?products_failed=Error occurred, try again');
    }
} else {
    header('location: products.php?products_failed=Form submission failed');
}
?>
