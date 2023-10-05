<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Cart</title>
   <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="./assets/css/custom.css?v=<?php echo time(); ?>">
</head>
<body>
   <!-- Navbar -->
   <?php include "lib/navbar.php"; ?>

   <!-- MAIN -->
   <div class="container">

      <?php if($total_count > 0){ ?>
         <h2 class="text-center">You have <strong class="color-danger"><?php echo $total_count; ?></strong> items in your cart</h2>
         <hr>
         <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <table class="table table-hover table-bordered table-striped">

                  <thead>
                     <th class="text-center">Picture</th>
                     <th class="text-center">Item</th>
                     <th class="text-center">Price</th>
                     <th class="text-center">Number</th>
                     <th class="text-center">Cost</th>
                     <th class="text-center">Drop</th>
                  </thead>

                  <tbody>
                     <?php foreach($shopping_products as $product){ ?>
                        <tr>
                           <td class="text-center" width="120"><img src="assets/images/<?php echo $product->img_url; ?>" alt="<?php echo $product->product_name; ?>" width="50"></td>
                           <td class="text-center"><?php echo $product->product_name; ?></td>
                           <td class="text-center"><?php echo $product->price; ?> €</td>
                           <td class="text-center">
                              <a href="lib/cart_db.php?p=decCount&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger btn-change"><strong class="sign">-</strong></a>
                              <input type="number" class="item-count-input" value="<?php echo $product->count; ?>">
                              <a href="lib/cart_db.php?p=incCount&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-primary btn-change"><strong class="sign">+</strong></a>
                           </td>
                           <td class="text-center"><strong><?php echo $product->price * $product->count; ?> €</strong></td>
                           <td class="text-center">
                              <button product_id="<?php echo $product->id; ?>" class="btn btn-danger btn-sm removeFromCartBtn"><strong>X</strong></button>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
   
                  <tfoot>
                     <th colspan="2" class="text-right">
                        Total: <span class="color-danger"><strong><?php echo $total_count; ?></strong> Items</span>
                     </th>
                     <th colspan="4" class="text-right">
                        Cost: <span class="color-danger"><strong><?php echo $total_price; ?> €</strong></span>
                     </th>
                  </tfoot>

               </table>
            </div>
         </div>
      <?php } else { ?>
         <div class="alert alert-info"><strong>You have no items in your cart! <a href="index.php">click</a> to add.</strong></div>
      <?php } ?>

   </div>
   <!-- #MAIN -->

   <script type="module" src="assets/js/jquery-3.7.1.min.js"></script>
   <script type="module" src="assets/js/bootstrap.min.js"></script>
   <script type="module" src="assets/js/custom.js"></script>
</body>
</body>
</html>