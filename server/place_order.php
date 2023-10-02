<?php  

session_start();

include('connection.php');
   if(isset($_POST['place_order'])) {

    //1.get user information ans store it in database;
    $name =  $_POST['name'];
    $email = $_POST['email'];
    $phone =  $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status =  "on_hold";
    $user_id = 1;
    $order_date = date('Y-m-d H:i:s');

   $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) 
                            VALUES (?,?,?,?,?,?,?);  ");

    $stmt->bind_param('isiisss',$order_cost,$order_status,$user_id,$phone,$city,$address,$order_date);

    $stmt->execute();
    
    $order_id = $stmt->insert_id;



    //2.get prducts from cart(from the session)
   foreach($_SESSION['cart'] as $key => $value) {

    $product  = $_SESSION['cart'] [$key]; //[]
     $product_id = $product['product_id'];
     $product_name = $product['product_name'];
     $product_image = $product['product_image'];
     $product_price = $product['product_price'];
     $product_quantity = $product['product_quantity'];

     $stmt1= $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date) 
                     VALUES (?,?,?,?,?,?,?,?) ");
     $stmt1->bind_param('iissiiis', $order_id, $product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date);

     $stmt1->execute();
   }


    //3.issue new order and store order info in the database


    //4.store each single item in order_items database


    //5.remove everything from cart


    //6.inform user whether everything is fine or there is a problem


   }
 

?>

 