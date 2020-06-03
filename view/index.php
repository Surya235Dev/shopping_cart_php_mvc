<?php include "header/header.php" ?>
<div class="container">
   <div class="alert alert-info" id="total" style="display:none;" role="alert"></div>
   <div class="row">
      <?php foreach($data as $item){?>
      <div class="col-sm-12 col-md-4" >
         <div class="card" style="width:18rem;margin:10px auto;">
            <img class="card-img-top" src="<?=$item['imageurl'] ?>"  alt="Card image cap" height=250px width=auto>
            <div class="card-body">
               <h5 class="card-title"><?=$item['name'] ?></h5>
               <p class="card-text" style="height:100px;overflow:scroll;"><?=$item['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
               <li class="list-group-item" value="<?=$item['price'] ?>">Price : Rs <?=$item['price'] ?></li>
            </ul>
            <div class="card-body">
               <a href="index.php?controller=product&action=edit&id=<?= $item['id'] ?>" class="bttn btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
               <a href="index.php?controller=product&action=delete&id=<?= $item['id'] ?>" class="bttn btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
               <button value="<?= $item['price'] ?>" class="bttn btn btn-primary cart"><i class="fa fa-shopping-cart"></i> Add to Cart </button>
            </div>
         </div>
      </div>
      <?php } ?>
   </div>
</div>
</div>  

</body>
</html>