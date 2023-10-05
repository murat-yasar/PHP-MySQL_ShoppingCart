<?php
   session_start();
      
   if(isset($_SESSION["shoppingCart"])){

      $shoppingCart = $_SESSION["shoppingCart"];
      $total_count = $shoppingCart["sum"]["total_count"];
      $total_price = $shoppingCart["sum"]["total_price"];
      $shopping_products = $shoppingCart["products"];

   } else {

      $total_count = 0;
      $total_price = 0.0;
         
   }

?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
   <div class="container-fluid">
      <a class="navbar-brand" href="#">MyShop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Products</a>
            </li>
         </ul>
         <ul class="navbar-nav navbar-right">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="shopping-cart.php">
                  <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                     <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                  <span class="badge cart-count"><?php echo $total_count; ?></span>
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>
<!-- #NAVBAR -->