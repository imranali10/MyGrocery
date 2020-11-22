

<div class="navbar">
<div class="logo">
<a href="index.php"><img src="images/logo_.png" alt="Logo" width="120px" height="90px"></a>
</div>
<nav>
<ul id="MenuItems">
<li><a href="index.php">Home</a></li>
<li><a href="products.php">Products</a></li>
<li><a href="">About</a></li>
<li><a href="">Contact</a></li>
<?php
if(!isset($_SESSION['id'])){?>
    <li><a href="account.php">Account</a></li>		
    <?php }else{?><u><?php
        print  $_SESSION['username'];
        
        ?> !!</u> &nbsp&nbsp
        <li><a href="logout.php"><i title="Logout" class="fa fa-sign-out" aria-hidden="true"></i>
        </a></li><?php } ?>
        </ul>
        </nav>
        <a href="cart.php"><img src="images/cart.png" alt="cart" width="30px" height="30px"></a>
        <img src="images/menu.png" alt="menu" class="menu-icon" onclick="menutoggle()" >
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
        
        