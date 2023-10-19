 <?php include('header.php')  ?>;
 <?php

    if (!isset($_SESSION['admin_logged_in'])) {
        header('location:login.php');
        exit;
    }

    ?>


 <body>
     <?php include('sidemenu.php'); ?>



     <main id="main-content">
         <h1>Welcome to the Admin Dashboard</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero sed in nihil, natus recusandae similique qui accusantium quis eaque officiis cupiditate illo excepturi, reprehenderit odio tempora! Recusandae id totam sequi!</p>

         <div class="row my-4 py-2">
             <div class="col-md-4 admin">
                 <div class="custom-card mb-4">
                     <div class="custom-card-body">
                         <h5 class="custom-card-title">Products</h5>
                         <p class="custom-card-text">Manage your products here.</p>
                         <a href=" products.php" class=" btn">View Products</a>
                     </div>
                 </div>
             </div>

             <div class="col-md-4 admin">
                 <div class="custom-card mb-4">
                     <div class="custom-card-body">
                         <h5 class="custom-card-title">Orders</h5>
                         <p class="custom-card-text">View and manage customer orders.</p>
                         <a href="./orders.php" class="btn  ">View Orders</a>
                     </div>
                 </div>
             </div>

             <div class="col-md-4 admin">
                 <div class="custom-card mb-4">
                     <div class="custom-card-body">
                         <h5 class="custom-card-title">Customers</h5>
                         <p class="custom-card-text">Manage your customer data.</p>
                         <a href="#" class="btn  ">View Customers</a>
                     </div>
                 </div>
             </div>

         </div>
     </main>


     <!-- <script>
 const person  = {
    name: 'ifey',
    age: 22,
    hobby: 'coding'
 };
 

 const keys =   Object.keys(person);

 keys.forEach((key) => {
    console.log(keys);
 })


     </script> -->









     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 </body>

 </html>