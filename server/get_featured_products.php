<?php  
include('connection.php');

 $stmt = $conn->prepare("SELECT * FROM products LIMIT 4");

 $stmt->execute();

 $featured_products = $stmt->get_result();//[]

?>


<?php  
// include('connection.php');

// // Initialize a variable to hold any potential error messages
// $error_message = '';

// try {
//     // Prepare the SQL statement
//     $stmt = $conn->prepare("SELECT * FROM products LIMIT 4");

//     // Execute the query
//     $stmt->execute();

//     // Get the result set
//     $featured_products = $stmt->get_result();
// } catch (Exception $e) {
//     // Handle any exceptions or database errors
//     $error_message = "Database error: " . $e->getMessage();
// }

// // Check if there was an error
// if (!empty($error_message)) {
//     // Display or log the error message
//     echo $error_message;
// } else {
//     // Process and display the data here
//     while ($row = $featured_products->fetch_assoc()) {
//         // Access data from each row like $row['column_name']
//         // Example: echo $row['product_name'];
//     }
// }

// // Close the database connection when you're done
// $conn->close();
// ?>
