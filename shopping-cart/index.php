<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css?v=<?php echo time(); ?>">
</head>
<body>
    <!-- Dependencies -->
    <?php require_once "lib/db.php" ?>

    <!-- DB Connection -->
    <?php 
        $products = $db->query("SELECT * FROM products", PDO::FETCH_OBJ)->fetchAll();
    ?>

    <!-- Navbar -->
    <?php include "lib/navbar.php"; ?>

    <!-- MAIN -->
    <main>
        <div class="container">
            <h2 class="text-center">Products</h2>
            <div class="row">
                <?php foreach($products as $product) { ?>
                    <div class="card m-2" style="width: 24rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $product->product_name; ?></h5>
                            <br>
                            <img src="./assets/images/<?php echo $product->img_url; ?>" class="card-img-top" alt="<?php echo $product->product_name; ?>">
                            <br><br>
                            <p class="card-text"><?php echo $product->details; ?></p>
                            <p class="text-right price-container"><strong><?php echo $product->price; ?> €</strong></p> 
                        </div>
                        <div class="card-footer">
                            <p>
                                <button product_id="<?php echo $product->id; ?>" class="btn btn-primary btn-block addToCartBtn">
                                    <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span>Add to cart</span>
                                </button>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <!--# MAIN -->

    <!-- FOOTER -->
    <footer></footer>
    <!--# FOOTER -->
    
    <script type="module" src="assets/js/jquery-3.7.1.min.js"></script>
    <script type="module" src="assets/js/bootstrap.min.js"></script>
    <script type="module" src="assets/js/custom.js"></script>
</body>
</html>