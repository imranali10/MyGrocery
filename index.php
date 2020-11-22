<?php
session_start();
require_once('config.php');

 $sql="SELECT * FROM products ORDER BY RAND() LIMIT 8 ";
 $result = $conn->query($sql);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MyGrocery | Ecommerce Website </title>
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
           include('menu.php');?><center><?php if(isset($_GET["message"])){
            if (($_GET["message"])=="login") {
              echo"Please login to continue....";
          }}?></center>
            <div class="row">
            
                <div class="col-2">
                    <h1>Welcome to a New World of Online Grocery Shopping!</h1>
                    <p>MyGrocery not only gives you the convenience to sit back at home <br>and get things delivered at your doorstep,.
                    </p>
                    <a href="products.php" class="btn">Explore Now &#8594 </a>
                </div>
                <div class="col-2">
                    <img src="images/grain.png" alt="image">
                </div>
            </div>
        </div>

    </div>

    <!-- ----------festured categories-----------  -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/Bevarages_hul.png">
                </div>
                
                <div class="col-3">
                    <img src="images/Fruits_Vegetables__hul.png">
                </div>
                <div class="col-3">
                    <img src="images/Personal-Care_hul.png">
                </div>
            </div>
        </div>

    </div>
    <!-- featured Products -->
    
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">
        
        <?php 
    if ($result->num_rows > 0) {
        while($product = $result->fetch_assoc()){
            $image = $product['product_image'];
            $image_src = "upload/".$image;
    ?><a href="product-detail.php?id=<?php echo $product["product_id"] ?>"><span>
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
        
    <!-- ------Offer------------ -->
    
        <div class="small-container">
            <div class="row">
                <div class="col-12">
                    <img style="border-radius:15px" src="images/ss.png" class="offer-img">
                </div>
               
            </div>
        </div>
  </div>

    <!-- ----------TESTIMONIAL--------------- -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>We are busy people having no time to shop. MyGrocery solves our problem by delivering products at door step WHENEVER we want. Thank you MyGrocery</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-1.png" >
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Groceries are cheaper when compared with the local stores .Impressed by their selection of goods, discount rates and quality of service.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <img src="images/user-2.png" >
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Now you don't need a long wait to get your groceries every week. You can order just in few mins and get it delivered the same day </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="images/user-3.png" >
                    <h3>Sean Parker</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- ----brands------ -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-godrej.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-oppo.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-coca-cola.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-paypal.png">
                </div>
                <div class="col-5">
                    <img src="images/logo-philips.png">
                </div>
            </div>
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
                    <img src="images/logo-white.png" >
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