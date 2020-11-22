<?php 
require_once('config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Accounts - MyGrocery | Ecommerce Website </title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
    <script src='main.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>


<body>
    
    <div class="container">
        <?php
        require_once('menu.php');?>            
    </div>
    


    <!-- ------------account page----------- -->
    <div class="account-page">
        <div class="container">
            <h3 class="message message-sucess"><?php if(isset($_GET["message"])){
                if(($_GET["message"])=="sucess1")
                {
                    echo" Password Reset Sucessful !!";
                }
            }
            ?></h3>       
            <div class="row">
                <div class="col-2">
                   <center> <img style="border-radius:30%; box-shadow: 5px 15px grey ;" src="images/accounts.jpg" width="50%" alt=""></center>
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>
                        <form id="login" method="Post"  action="validation.php ">
                            <p class="message"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="notexists")
                                {
                                    echo" Account Does not Exists";
                                }
                            }
                            ?></p> 
                            <input type="email" placeholder="Email" name="email" id="email"  required>
                            <input type="password" placeholder="Password" name="password" id="password" required>
                            <!-- <span class="message"><?php echo $passworderr;?></span> -->
                            <p class="message"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="invalid")
                                {
                                    echo" Invalid Password";
                                }
                            }
                            ?></p>  
                            <button type="submit" class="btn" name="login">Login</button><br>
                            <a href="reset_pass.php">Forget Password ? </a><br>
                        </form>

                        <form id="reg" method="Post"  action="validation.php "> 
                            <p class="message message-sucess"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="sucess")
                                {
                                    echo" Signup Sucessful.. Proceed to login";
                                }
                            }
                            ?></p>                   
                            <input type="text" placeholder="Username" name="username" value="<?php echo isset($_POST["username"]) ?>" id="username" required>
                            <input type="email" placeholder="Email" name="email" id="email" required>
                            <p class="message"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="taken")
                                {
                                    echo"*<strong>Account</strong> already exists";
                                }
                            }
                            ?></p>                         
                            <input type="password" placeholder="Password" name="password" id="password" required>
                            <input type="password" placeholder="Confirm Password" name="password1" id="password1" required>  
                            <p class= "message"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="password")
                                {
                                    echo"*<strong>Password</strong> not same";
                                }
                                if(($_GET["message"])=="pshort")
                                {
                                    echo"*<strong>Password</strong> must be at least 4 characters .";
                                }
                            } ?></p>                      
                            <input type="tel" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Mobile Number" name="mobile" id="mobile" required>
                            <textarea placeholder="Address" name="address" id="address" required></textarea>
                            <select name="question" id="question" style="width: 100%" >
                                <option value="What is the name of the town where you were born?">What is the name of the town where you were born?</option>
                                <option value="What elementary school did you attend?">What elementary school did you attend?</option>
                                <option value="What was your first car?">What was your first car?</option>
                                <option value="What is the name of your first pet?">What is the name of your first pet?</option>
                            </select>                       
                            <input type="text" placeholder="Security Answer" name="answer" id="answer" required="required">
                            <button type="submit" class="btn" name="register">Register</button>
                            <button type="reset" class="btn">Reset</button>
                        </form>
                    </div>
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

<!-- -------js for toggle form--- -->

<script>
    var LoginForm = document.getElementById("login");
    var RegForm = document.getElementById("reg");
    var Indicator = document.getElementById("indicator");

    function register(){
        RegForm.style.transform="translateX(0px)"
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";

    }
    function login(){
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }

</script>

</body>

</html>