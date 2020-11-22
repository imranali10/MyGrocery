<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MyGrocery | ADMIN </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel='stylesheet' type='text/css' media='screen' href='css/admin.css'>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script src='../js/admin.js'></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/admin.css'>


    
</head> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body class="header">
<?php if(isset($_GET['signup'])){?>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
            <div id="second1">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                           <p class="message message-sucess"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="sucess")
                                {
                                    echo" Signup Sucessful.. Proceed to login";
                                } if(($_GET["message"])=="taken")
                                {
                                    echo"*<strong>Account</strong> already exists";
                                }
                            }
                            ?></p> 
                        </div>
                        <form action="validation.php" name="register" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text"  name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name" required>
                           </div>
                           
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit" name="register" class=" btn btn-block mybtn btn-primary tx-tfm">Get Started</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="index.php" id="signin">Already have an account?</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
            </div>
        </div>
    </div>

<?php }else{  ?>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
                   <p class="message"><?php if(isset($_GET["message"])){
                                if(($_GET["message"])=="notexists")
                                {
                                    echo" Account Does not Exists";
                                }
                                if(($_GET["message"])=="invalid")
                                {
                                    echo" Invalid Password";
                                }
                            }
                            ?></p> 
					</div>
                   <form action="validation.php" method="post" name="login">
                            
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" name="login" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Signup using Google
                                 </a>
                              </p>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="index.php?signup" id="signup">Sign up here</a></p>
                           </div>
                        </form>
                 
				</div>
			</div>
<?php } ?>
			  
		</div>
    </div>   
        
</body>
</html>
 