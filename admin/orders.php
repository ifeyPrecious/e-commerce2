<?php include('header.php');


if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}
?>;


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
$stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM orders ");
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

$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT  $offset, $total_records_per_page");
$stmt2->execute();
$orders = $stmt2->get_result(); //[]


?>

<body>
    <?php //include('sidemenu.php'); ?>

    <section id="orders" class="container orders  my-5 py-3 ">
        <div class=" mt-2">
            <h2 class="font-weight-bold text-center">Orders</h2>
 

    <hr class="mx-auto">
        </div>

        <?php if (isset($_GET['order_updated'])) { ?>
                    <p class="text-center text-success"><?php echo $_GET['order_updated']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['order_update_failed'])) { ?>
                <?php } ?>

        <table class="mt-5 pt-5">
            <tr>
                <th>Order id</th>
                <th>Order status</th>
                <th>Order cost</th>
                <th>User id</th>
                <th>Order date</th>
                <th>User phone</th>
                <th>User address</th>
                <th>User city</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <?php foreach ($orders as $order) {  ?>

                <tr>
                    <td>
                        <span><?php echo $order['order_id']; ?> </span>
                    </td>
                    <td>
                        <span><?php echo $order['order_status']; ?> </span>
                    </td>
                    <td>
                        <span><?php echo $order['order_cost']; ?></span>
                    </td>
                    <td>
                        <span><?php echo $order['user_id'];  ?> </span>
                    </td>
                    <td>
                        <span> <?php echo $order['order_date'];  ?> </span>
                    </td>
                    <td>
                        <span> <?php echo $order['user_phone']; ?></span>
                    </td>
                    <td>
                        <span><?php echo $order['user_address']; ?> </span>
                    </td>
                    <td>
                        <span><?php echo $order['user_city']; ?> </span>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="edit_order.php?order_id=<?php  echo $order['order_id']; ?> ">Edit</a> </span>
                    </td>
                    <td>
                        <span> <a class="btn btn-danger" href=""> Delete</a></span>
                    </td>



                </tr>
            <?php }; ?>

        </table>
        <div>
            <nav aria-label="page navigation example">
                <ul class="pagination mt-5">
                    <?php
                    if ($page_no > 1) {
                        echo '<li class="page-item"><a class="page-link" href="orders.php?page_no=' . ($page_no - 1) . '">Previous</a></li>';
                    }

                    for ($i = max(1, $page_no - $adjacent); $i <= min($page_no + $adjacent, $total_no_of_pages); $i++) {
                        if ($i == $page_no) {
                            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" href="orders.php?page_no=' . $i . '">' . $i . '</a></li>';
                        }
                    }

                    if ($page_no < $total_no_of_pages) {
                        echo '<li class="page-item"><a class="page-link" href="orders.php?page_no=' . ($page_no + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <a class="btn" href="dashboard.php">Back</a>
        </div>
    </section>
</body>