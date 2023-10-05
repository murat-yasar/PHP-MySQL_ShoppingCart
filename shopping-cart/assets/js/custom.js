$(document).ready(function(){

   // Add to Cart
   $(".addToCartBtn").click(function(){
      let url = "http://localhost/PHP-MySQL/shopping-cart/lib/cart_db.php";
      let data = {
         p: "addToCart",
         product_id: $(this).attr("product_id")
      }

      $.post(url, data, function(response){
         $(".cart-count").text(response);
      })
   });

   // Remove form Cart
   $(".removeFromCartBtn").click(function(){
      
      let url = "http://localhost/PHP-MySQL/shopping-cart/lib/cart_db.php";
      let data = {
         p: "removeFromCart",
         product_id: $(this).attr("product_id"),
      }
      console.log(data);

      $.post(url, data, function(response){
         // window.location.reload();
      })
   });

})