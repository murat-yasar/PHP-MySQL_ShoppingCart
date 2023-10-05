<?php
include "db.php";
session_start();

// ADD to Cart
function addToCart($product_item) {
   
   if(isset($_SESSION["shoppingCart"])){

      $shoppingCart = $_SESSION["shoppingCart"];
      $products = $shoppingCart["products"];

   } else {
      $products = array();
   }

   // Check Counts
   if(array_key_exists($product_item->id, $products)){
      $products[$product_item->id]->count++;
   } else {
      $products[$product_item->id] = $product_item;
   }

   // Calculate Cost
   $total_price = 0.0;
   $total_count = 0;

   foreach($products as $product){
      $product->$total_price = $product->count * $product->price;
      $total_price = $total_price + $product->$total_price;
      $total_count += $product->count;
   }

   $sum["total_price"] = $total_price;
   $sum["total_count"] = $total_count;

   $_SESSION["shoppingCart"]["products"] = $products;
   $_SESSION["shoppingCart"]["sum"] = $sum;

   return $total_count;

}

// REMOVE from Cart
function removeFromCart($product_id) {
   
   if(isset($_SESSION["shoppingCart"])){

      $shoppingCart = $_SESSION["shoppingCart"];
      $products = $shoppingCart["products"];

      // Delete from list
      if(array_key_exists($product_id, $products)){
         $products[$product_id]->count = 0;
         // unset($products[$product_id][$product_id]);
      }

      // Calculate the cost again
      $total_price = 0.0;
      $total_count = 0;

      foreach($products as $product){
         $product->$total_price = $product->count * $product->price;
         $total_price = $total_price + $product->$total_price;
         $total_count += $product->count;
      }

      $sum["total_price"] = $total_price;
      $sum["total_count"] = $total_count;

      $_SESSION["shoppingCart"]["products"] = $products;
      $_SESSION["shoppingCart"]["sum"] = $sum;

      return true;
   }
}

function incCount($product_id) {

   if(isset($_SESSION["shoppingCart"])){

      $shoppingCart = $_SESSION["shoppingCart"];
      $products = $shoppingCart["products"];

      // Check Counts
      if(array_key_exists($product_id, $products)){
         $products[$product_id]->count++;
      }

      // Calculate Cost
      $total_price = 0.0;
      $total_count = 0;

      foreach($products as $product){
         $product->$total_price = $product->count * $product->price;
         $total_price = $total_price + $product->$total_price;
         $total_count += $product->count;
      }

      $sum["total_price"] = $total_price;
      $sum["total_count"] = $total_count;

      $_SESSION["shoppingCart"]["products"] = $products;
      $_SESSION["shoppingCart"]["sum"] = $sum;

      return true;
   }
}

function decCount($product_id) {
   if(isset($_SESSION["shoppingCart"])){

      $shoppingCart = $_SESSION["shoppingCart"];
      $products = $shoppingCart["products"];

      // Check Counts
      if(array_key_exists($product_id, $products)){
         $products[$product_id]->count--;

         if($products[$product_id]->count <= 0){
            $products[$product_id]->count = 0;
         }
      }

      // Calculate Cost
      $total_price = 0.0;
      $total_count = 0;

      foreach($products as $product){
         $product->$total_price = $product->count * $product->price;
         $total_price = $total_price + $product->$total_price;
         $total_count += $product->count;
      }

      $sum["total_price"] = $total_price;
      $sum["total_count"] = $total_count;

      $_SESSION["shoppingCart"]["products"] = $products;
      $_SESSION["shoppingCart"]["sum"] = $sum;

      return true;
   }
}

if(isset($_POST["p"])) {
   $operation = $_POST["p"];
   
   if($operation == "addToCart"){
      
      $id = $_POST["product_id"];
      $product = $db->query("SELECT * FROM products WHERE id={$id}", PDO::FETCH_OBJ)->fetch();
      $product->count = 1;

      echo addToCart($product);

   } else if($operation == "removeFromCart"){

      $id = $_POST["product_id"];
      echo removeFromCart($id);
   } 
}

if(isset($_GET["p"])) {
   
   $operation = $_GET["p"];
   
   if($operation == "incCount"){

      $id = $_GET["product_id"];
      
      if(incCount($id)){
         header("location:../shopping-cart.php");
      }

   } else if($operation == "decCount"){

      $id = $_GET["product_id"];

      if(decCount($id)){
         header("location:../shopping-cart.php");
      }
   } 
}