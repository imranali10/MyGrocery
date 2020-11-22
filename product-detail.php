<?php
session_start();
require_once('config.php');

$id = $_GET["id"];

$p = "SELECT * FROM products where product_id='$id'";
$result = mysqli_query($conn,$p);
$product = mysqli_fetch_assoc($result);
$image = $product['product_image'];
$image_src = "upload/".$image;
$category = $product['product_category'];
$v = "SELECT * FROM products where  product_category='$category'";
$result_v = mysqli_query($conn,$v);

// ---------------ADD to CART-------------------



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


    <!-- -------single Products Details------ -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src='<?php echo $image_src;  ?>' width="100%" id="product-img" alt="">
                <div class="small-img-row">
                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="<?php echo $image_src;  ?>" width="100%" class="small-img" alt="">
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p> Home / <?php echo $category ;?> / <?php  echo   $product['product_name']; ?></p>
                <h1 style="text-transform: capitalize;"><?php echo $product['product_name']; ?></h1>
                <h4>$ <?php echo  $product['product_price']; ?></h4>
                
                <input type="number" value="1">
                <?php
                if(!isset($_SESSION['id'])){?>
                <button disabled class="btn">Add To Cart</button><br><p style="color:red;"><b>*Please login to add items in your cart.<b></p><?php }else{?>
                    <a href="cart.php?cart=<?php echo  $product['product_id'];?>" class="btn">Add To Cart</a>
                <?php } ?>
                <h3>Product Detail <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $product['product_des']; ?></p>
            </div>
        </div>
    </div>

    <!-- -------title------- -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p><a href="products.php">View More</a></p>
        </div>
    </div>

    
    <!-- -------Products------- -->

    <div class="small-container">       
    
        <div class="row">
        <?php
if ($result_v->num_rows > 0) {
    while($p_cat = $result_v->fetch_assoc()){
        
        $image = $p_cat['product_image'];
        $image_src = "upload/".$image;
                ?>
                <a href="product-detail.php?id=<?php echo $p_cat["product_id"] ?>"><span>
                <div class="col-4">
                
                <img src='<?php echo $image_src;  ?>' >
                <h4><?php echo $p_cat['product_name']; ?></h4>
                <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                </div></span></a>
                <p><?php echo $p_cat['product_price']; ?></p>
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

<!-- -------js for product Gallery--- -->
<script>
    var ProductImg = document.getElementById("product-img");
    var SmallImg = document.getElementsByClassName("small-img");

    // SmallImg[0].onclick = function()
    // {
    //     ProductImg.src = SmallImg[0].src;
    // }
    // SmallImg[1].onclick = function()
    // {
    //     ProductImg.src = SmallImg[1].src;
    // }
    // SmallImg[2].onclick = function()
    // {
    //     ProductImg.src = SmallImg[2].src;
    // }
    // SmallImg[3].onclick = function()
    // {
    //     ProductImg.src = SmallImg[3].src;
    // }

    SmallImg[0].onmouseover = function()
    {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onmouseover = function()
    {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onmouseover = function()
    {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onmouseover = function()
    {
        ProductImg.src = SmallImg[3].src;
    }


</script>
</body>

</html>