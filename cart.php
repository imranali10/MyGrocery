<?php
session_start();
$total = 0;
require_once('config.php');
if(!isset($_SESSION['id'])){
    header('location:index.php?message=login');
    echo "please login to continue!!";
}else{
$login_id = $_SESSION['id'];
if(isset($_GET['delete'])){
    $product_id = $_GET['delete'];
    $sql ="DELETE FROM `cart` WHERE `cart`.`product_id` = $product_id";
    if($conn->query($sql)===TRUE)
    {
        // echo"done";
        // header('location:product.php?message=sucess');
    }else
    {
        echo "Error".$sql."<br>".$conn->error;
    }

}
if(isset($_GET['cart'])){
    $product_id = $_GET['cart'];
    $login_id = $_SESSION['id'];
    // echo $id;
    $sql=" insert into cart(login_id , product_id) values('$login_id','$product_id') ";
    if($conn->query($sql)===TRUE)
    {
        // echo"done";
        // header('location:product.php?message=sucess');
    }else
    {
        echo "Error".$sql."<br>".$conn->error;
    }
}
$sql = "SELECT * FROM products INNER JOIN cart ON cart.product_id = products.product_id where cart.login_id='$login_id'";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html>

<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title> Cart - MyGrocery | Ecommerce Website </title>
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


<!-- -------Cart------ -->
<div class="small-container cart-page">
<table>
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Subtotal</th>
</tr>           
<tr>
<td>
<?php
           if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $image = $row['product_image'];
$image_src = "upload/".$image;
        ?>
<div class="cart-info">
<img src="<?php echo $image_src;  ?>" alt="">
<div>
<p><?php echo $row['product_name'] ?></p>
<small>Price: $<?php echo $row['product_price'] ?></small>
<br>
<a href="cart.php?delete=<?php echo  $row['product_id'];?>">Remove</a>
</div>
            </div>
</td>
<td><input type="number" value="1"></td>
<td>$<?php echo $row['product_price'] ?></td>
</tr>
<tr>
<td><?php

$total+=$row['product_price']; }}
else{ echo"0 Results";?>
    
<?php } ?>

<!-- ------------------------------------------ -->
<!-- <div class="cart-info">
<img src="images/buy-1.jpg" alt="">
<div>
<p>Red Printed Tshirt</p>
<small>Price: $50</small>
<br>
<a href="">Remove</a>
</div>
</div>
</td>
<td><input type="number" value="1"></td>
<td>$50.00</td>
</tr>
<tr>
<td>
<div class="cart-info ">
<img src="images/buy-1.jpg" alt="">
<div>
<p>Red Printed Tshirt</p>
<small>Price: $50</small>
<br>
<a href="cart.php?delete=<?php echo  $row['product_id'];?>">Remove</a>
</div>
</div>
</td>
<td><input type="number" value="1"></td>
<td>$50.00</td>
</tr> -->
</table>
<div class="total-price">
<table>
<tr>
<td>Subtotal</td>
<td>$<?php echo $total; ?></td>
</tr>
<tr>
<td>Tax</td>
<td>$30.00</td>
</tr>
<tr>
<td>Total</td>
<?php $t = $total +30?>
<td>$<?php echo $t ?></td>
</tr>
</table>


</div>

</div>

<!-- --------footer---------- -->
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

</body>

</html>
<?php } ?>