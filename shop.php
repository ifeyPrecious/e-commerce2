<?php
include('server/connection.php');

if (isset($_POST['search'])) {

    //1. determin the page no
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        //if user has already entered the page then page number is the one that they selected
        $page_no = $_GET['page_no'];
    } else {
        // if the user just entered the page then the default page is 1
        $page_no = 1;
    }

    $category = $_POST['category'];
    $price = $_POST['price'];

    // 2. return number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price = ? ");
    $stmt1->bind_param('si', $category, $price);
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();


    //3. products per page

    $total_records_per_page = 8;

    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacent = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //4. get all products

    $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category = ? AND product_price = ? LIMIT  $offset, $total_records_per_page");
    $stmt2->bind_param('si', $category, $price);
    $stmt2->execute();
    $products = $stmt2->get_result(); //[]



    //return all product


} else {

    //1. determine the page no
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        //if user has already entered page then then the page no is the one they selected
        $page_no =  $_GET['page_no'];
    } else {
        //if the user just entered the page then the default page is 1
        $page_no = 1;
    }


    //2. return number of results
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    //3. products per page

    $total_records_per_page = 8;

    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacent = 2;

    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //4.    get all products
    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result(); //[]


}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
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

    <!-- search sidebar -->
    <aside id="search-sidebar" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
            <p>Search products</p>

        </div>

        <form action="shop.php" method="post">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p>Category</p>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="shoes" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">Shoes</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="coats" name="category" id="category_two" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Coats</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="dress" name="category" id="category_three" checked>
                        <label class="form-check-label" for="flexRadioDefault3">Dress</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="bags" name="category" id="category_four" checked>
                        <label class="form-check-label" for="flexRadioDefault1">Bags</label>
                    </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" value="100" min="1" max="1000" name="price" id="customRange2">
                    <div class="w-50">
                        <span style="float: left;">1</span>
                        <span style="float: right;">1000</span>
                    </div>
                </div>
            </div>

            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" class="btn btn-primary" value="Search">
            </div>
        </form>

    </aside>

    <!-- main content -->
    <main id="main-content" class="container-fluid">

        <!-- shop -->

        <section id="shop">
            <div class="container text-center mt-5 py-5">
                <h3 class="mt-5  para">OUR Featured Products</h3>
                <hr>
                <p class="para">Here you can check out our featured products</p>
            </div>
            <div class="row mx-auto container-fluid">


                <?php while ($row = $products->fetch_assoc()) { ?>

                    <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12  ">
                        <img class="img-fluid" src="./assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                        <div class="star">
                            <i class="fa-solid fa-star star-icon"></i>
                            <i class="fa-solid fa-star star-icon"></i>
                            <i class="fa-solid fa-star star-icon"></i>
                            <i class="fa-solid fa-star star-icon"></i>
                            <i class="fa-solid fa-star star-icon"></i>
                        </div>

                        <h5 class="p-name"><?php echo $row['product_name'];  ?></h5>
                        <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
                        <a class=" btn buy-btn" href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>" style=" ">Buy now</a>
                    </div>

                <?php } ?>


                <nav aria-label="page navigation example">
                    <ul class="pagination mt-5">
                        <?php
                        if ($page_no > 1) {
                            echo '<li class="page-item"><a class="page-link" href="shop.php?page_no=' . ($page_no - 1) . '">Previous</a></li>';
                        }

                        for ($i = max(1, $page_no - $adjacent); $i <= min($page_no + $adjacent, $total_no_of_pages); $i++) {
                            if ($i == $page_no) {
                                echo '<li class="page-item active"><a class="page-link" href="shop.php">' . $i . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="shop.php?page_no=' . $i . '">' . $i . '</a></li>';
                            }
                        }

                        if ($page_no < $total_no_of_pages) {
                            echo '<li class="page-item"><a class="page-link" href="shop.php?page_no=' . ($page_no + 1) . '">Next</a></li>';
                        }
                        ?>
                    </ul>
                </nav>

                <!-- Product Listing Section -->
               
                


            </div>
        </section>












        <!-- footer -->
        <section class="mt-5 py-5 footer">
            <div class="row container mx-auto pt-5">
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

    </main>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>