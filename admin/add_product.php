 <?php include('header.php');


    if (!isset($_SESSION['admin_logged_in'])) {
        header('location: login.php');
        exit;
    }

    ?>


 <body>
     <?php include('sidemenu.php');
        ?>

     <section id="orders" class="container orders  my-5 py-3 w-50 ">
         <div class=" mt-2">
             <h1 class="font-weight-bold text-center">Add products</h1>
             <hr class="mx-auto">
         </div>

         <form id="create-form" enctype="multipart/form-data" class="mt-2" method="POST" action="create_product.php">

             <p class="text-center"><?php if (isset($_GET['error'])) {  ?></p>
             <p class="text-center text-danger"><?php echo $_GET['error']; ?></p>
         <?php } ?>
         <div class="form-group mt-2">
             <label for="">Title</label>
             <input type="text" class="form-control" id="product-name" name="name" placeholder="Title">
         </div>

         <div class="form-group mt-2">
             <label for="">description</label>
             <input type="text" class="form-control" id="product- desc" name="description" placeholder="description">
         </div>


         <div class="form-group mt-2">
             <label for="">Price</label>
             <input type="text" class="form-control" id="product-price" name="price" placeholder="price">
         </div>


         <div class="form-group mt-2">
             <label for="">Special offer</label>
             <input type="text" class="form-control" id="product-offer" name="offer" placeholder="Title">
         </div>

         <div class="form-group">
             <label for="">Category</label>
             <select name="category" id="" required class="form-select">
                 <option value="bags">Bags</option>
                 <option value="shoes">Shoes</option>
                 <option value="watches">Watches</option>
                 <option value="clothes">Clothes</option>
             </select>
         </div>


         </div>

         <div class="form-group mt-2">
             <label for="">Color</label>
             <input type="text" class="form-control" id="product-color" name="color" placeholder="Color">
         </div>

         <div class="form-group mt-2">
             <label for="">image1</label>
             <input type="file" class="form-control" id="image1" name="image1" placeholder="image1">
         </div>


         <div class="form-group mt-2">
             <label for="">image2</label>
             <input type="file" class="form-control" id="image2" name="image2" placeholder="image">
         </div>


         <div class="form-group mt-2">
             <label for="">image3</label>
             <input type="file" class="form-control" id="image3" name="image3" placeholder="image">
         </div>
         <div class="form-group mt-2">
             <label for="">image4</label>
             <input type="file" class="form-control" id="image4" name="image4" placeholder="image">
         </div>
         <div class="form-group mt-2">

             <input type="submit" class="btn btn-primary" id="create_product" name="create_product" value="create">

         </div>
         </form>

     </section>

 </body>