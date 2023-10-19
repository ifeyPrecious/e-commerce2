<?php include('header.php')  ?>;
<?php

if (!isset($_SESSION['admin_logged_in'])) {
    header('location:login.php');
    exit;
}

?>


<?php




//1. determin the page no
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    //if user has already entered the page then page number is the one that they selected
    $page_no = $_GET['page_no'];
} else {
    // if the user just entered the page then the default page is 1
    $page_no = 1;
}


// 2. return number of products
$stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products ");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();


//3. products per page

$total_records_per_page = 10;

$offset = ($page_no - 1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacent = "2";
$total_no_of_pages = ceil($total_records / $total_records_per_page);

//4. get all products

$stmt2 = $conn->prepare("SELECT * FROM products LIMIT  $offset, $total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result(); //[]


?>

<body>
         <p class="text-center"><?php if (isset($_GET['order_updated'])) {  ?></p>
            <p class="text-center text-success"><?php echo $_GET['order_updated']; ?></p>
        <?php } ?>

        <p class="text-center"><?php if (isset($_GET['order_update_failed'])) {  ?></p>
        <p class="text-center text-danger"><?php echo $_GET['order_update_failed']; ?></p>
    <?php } ?>  


    
         
    <?php include('sidemenu.php'); ?>
    <section id="orders" class="container orders  py-3  w-50">
        <div class=" mt-2">
            <h2 class="font-weight-bold text-center">YOUR PRODUCTS</h2>

            <?php if (isset($_GET['edit_success_message'])) {  ?>
                <p class="text-center text-success"><?php echo $_GET['edit_success_message'];  ?></p>
            <?php } ?>

            <?php if (isset($_GET['edit_error_message'])) { ?>

                <p class="text-center text-danger"> <?php echo $_GET['edit_error_message']  ?></p>
            <?php } ?>



            <?php if (isset($_GET['deleted_successfully'])) {  ?>
                <p class="text-center text-success"><?php echo $_GET['deleted_successfully'];  ?></p>
            <?php } ?>

            <?php if (isset($_GET['failed_to_delete'])) {  ?>
                <p class="text-center text-success"><?php echo $_GET['failed_to_delete'];  ?></p>
            <?php } ?>


            

     
        </div>

        <p class="text-center"><?php if (isset($_GET['product_created'])) {  ?></p>
            <p class="text-center text-success"><?php echo $_GET['product_created']; ?></p>
        <?php } ?>

        <p class="text-center"><?php if (isset($_GET['products_failed'])) {  ?></p>
        <p class="text-center text-danger"><?php echo $_GET['products_failed']; ?></p>
    <?php } ?>

    <p class="text-center"><?php if (isset($_GET['images_updated'])) {  ?></p>
            <p class="text-center text-success"><?php echo $_GET['images_updated']; ?></p>
        <?php } ?>
        
        <p class="text-center"><?php if (isset($_GET['images_failed'])) {  ?></p>
        <p class="text-center text-danger"><?php echo $_GET['images_failed']; ?></p>
    <?php } ?>
       
          

        <table class="mt-5 pt-5 table-left">
            <tr>
                <th>product id</th>
                <th>Product image</th>
                <th>product name</th>
                <th>Product price</th>
                <th>Product category</th>
                <th>Product color</th>
                <th>Special offer</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <?php foreach ($products as $product) {  ?>

                <tr>
                    <td>
                        <span><?php echo $product['product_id']  ?> </span>
                    </td>
                    <td>
                        <span> <img src="../assets/imgs/<?php echo $product['product_image'];  ?>" width="60" height="66" alt="image"></span>
                    </td>
                    <td>
                        <span><?php echo $product['product_name'];  ?></span>
                    </td>
                    <td>
                        <span><?php echo  "#" . $product['product_price'];  ?> </span>
                    </td>
                    <td>
                        <span> <?php echo $product['product_category'];  ?> </span>
                    </td>
                    <td>
                        <span> <?php echo $product['product_color'];  ?></span>
                    </td>
                    <td>
                        <span><?php echo $product['product_special_offer'] . "% off"; ?></span>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a> </span>
                    </td>
                    <td>
                        <span> <a class="btn btn-danger" href="delete_products.php?product_id=<?php echo $product['product_id'];
                          ?>"> Delete</a></span>
                    </td>





                </tr>
            <?php } ?>

        </table>

        <div>
            <nav aria-label="page navigation example">
                <ul class="pagination mt-5">
                    <?php
                    if ($page_no > 1) {
                        echo '<li class="page-item"><a class="page-link" href="product.php?page_no=' . ($page_no - 1) . '">Previous</a></li>';
                    }

                    for ($i = max(1, $page_no - $adjacent); $i <= min($page_no + $adjacent, $total_no_of_pages); $i++) {
                        if ($i == $page_no) {
                            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="product.php?page_no=' . $i . '">' . $i . '</a></li>';
                        }
                    }

                    if ($page_no < $total_no_of_pages) {
                        echo '<li class="page-item"><a class="page-link" href="product.php?page_no=' . ($page_no + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <a class="btn" href="dashboard.php">Back</a>
        </div>

    </section>
</body>