<?php include "header/header.php" ?>
<div class="container">
<div class="jumbotron jumbotron-fluid mt-4" style="padding:20px">
   <div class="container">
      <h3>Add New Product Here</h3>
   </div>
</div>
<div class="jumbotron jumbotron-fluid mt-4" style="padding:20px">
   <div class="container">
      <form method="post">
         <?php if(isset($showAlert)){?>
         <p class="alert alert-danger"><?= $showAlert ?></p>
         <?php } ?>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="name">Product Name</label>
               <input type="text" class="form-control" name="name" placeholder="Enter product Name">
            </div>
            <div class="form-group col-md-6">
               <label for="price">Product Price</label>
               <input type="number" class="form-control" name="price" placeholder="Enter product Price">
            </div>
         </div>
         <div class="form-group">
            <label for="description">Enter Product Description</label>
            <input type="text" class="form-control" name="description" placeholder="Describe the product.">
         </div>
         <div class="form-group">
            <label for="imageurl">Enter Project Image as URL</label>
            <input type="text" class="form-control" name="imageurl" placeholder="https://www.google.com/images/google_logo.png">
         </div>
         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
         <a  href="index.php" name="submit" class="btn btn-primary">Go Back</a>
      </form>
   </div>
</div>
</body>n
</html>
