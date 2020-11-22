<?php include("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title> NEW | Admin - MyGrocery | Ecommerce Website</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>

</head>
<body class="header">
    <div class="account-page">    
        <div class="form-container">   
            <h3>Register</h3>
            <form id="reg" method="Post"  action="update.php ">                                                                      
                <input type="text" placeholder="Username" name="username" id="username" required>
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
                <button type="submit" class="btn" name="new_admin">Register</button>
                <button type="reset" class="btn">Reset</button>
            </form>
        </div>
    </div>
</body>
</html>