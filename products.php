<?php 
require_once('config.php');
$p = "SELECT * FROM products";
$result = mysqli_query($conn,$p);


session_start();


?>

<!DOCTYPE html>
<html>

<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title> All Products - MyGrocery | Ecommerce Website </title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
<script src='main.js'></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="header">
<div class="container">
<?php
require_once('menu.php');?>            
</div>

</div>

<div class="small-container">
<div class="row row-2">
<h2>All Products</h2>

</div>
<div class="row">
<?php
if ($result->num_rows > 0) {
    while($product = $result->fetch_assoc()){
        
$image = $product['product_image'];
$image_src = "upload/".$image;
        ?>
        <a href="product-detail.php?id=<?php echo $product["product_id"] ?>"><span>
        <div class="col-4">
        
        <img src='<?php echo $image_src;  ?>' >
        <h4><?php echo $product['product_name']; ?></h4>
        <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
        </div></span></a>
        <p><?php echo $product['product_price']; ?></p>
        </div>
        <?php }} ?>
        
        </div>  
     </div>
        
        
        
        <!-- --------footer---------- -->
        <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>For the food lovers.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png" >
                        <img src="images/app-store.png" >
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="images/logo_white.png" >
                    <p>Grocery store with different treasures .</p>                     
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                     <li>Coupons</li>
                     <li>Blog Post</li>
                     <li>Return Policy</li>
                     <li>Join Affiliate</li>
                 </ul>
             </div>
             <div class="footer-col-4">
                <h3>Follow</h3>
                <ul>
                 <li>Facebook</li>
                 <li>Instagram</li>
                 <li>Twitter</li>
                 <li>Youtube</li>
             </ul>
         </div>
     </div>
     <hr>
     <p class="copyright">&#xA9; Copyright 2020 | MyGrocery</p>
 </div>
</div>
        <!-- -------js for toggle menu--- -->
        <script>
        var MenuItems=document.getElementById("MenuItems");
        MenuItems.style.maxHeight="0px";
        function menutoggle()
        {
            if(MenuItems.style.maxHeight=="0px")
            {
                MenuItems.style.maxHeight="200px";
            }else{
                MenuItems.style.maxHeight="0px";
            }
            
        }
        </script>
        
        </body>
        
        </html>