<?php
include('header.php');
include('../server/connection.php'); // Include your connection here

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();
} elseif (isset($_POST['edit_order'])) {
    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");

    $stmt->bind_param('si', $order_status, $order_id);

    if ($stmt->execute()) {
        header('Location: orders.php?order_updated=Order has been updated successfully');
        exit;
    } else {
        header('Location: dashboard.php?order_update_failed=Something went wrong, try again');
        exit;
    }
} else {
    header('location: dashboard.php');
    exit;
}
?>

<body>
    <section id="orders" class="container orders py-3">
        <div class="mt-5">
            <h2 class="font-weight-bold text-center">ORDERS</h2>
            <hr class="mx-auto">
            <form id="edit-order-form" method="post" action="edit_order.php">
               
                <div class="form-group mt-3">
                    <label for=""> Order Id</label>
                    <p class="my-4"><?php echo $order['order_id']; ?></p>
                    <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                </div>

                <div class="form-group mt-3">
                    <label for=""> Order Price</label>
                    <p class="my-4"> <?php echo $order['order_cost']; ?>#</p>
                </div>

                <div class="form-group mt-3">
                    <label for=""> Order Status</label>
                    <select class="form-select w-50" required name="order_status" id="order_status">
                        <option value="not paid" <?php if ($order['order_status'] == 'not paid') echo "selected"; ?>>Not paid</option>
                        <option value="paid" <?php if ($order['order_status'] == 'paid') echo "selected"; ?>>Paid</option>
                        <option value="shipped" <?php if ($order['order_status'] == 'shipped') echo "selected"; ?>>Shipped</option>
                        <option value="delivered" <?php if ($order['order_status'] == 'delivered') echo "selected"; ?>>Delivered</option>
                    </select>
                </div>

                <div class="form-group my-3">
                    <label for="">Order Date</label>
                    <p class="my-4"> <?php echo $order['order_date']; ?>#</p>
                </div>

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="edit_order" value="OK">
                </div>
            </form>
        </div>
    </section>
</body>
