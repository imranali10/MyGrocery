
<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title> RESET - MyGrocery | Ecommerce Website </title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>
	<script src='main.js'></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="header">
	<?php 
	include("config.php");
	if (isset($_POST["reset"])) {
		$email = $_POST["email"];
		$question = $_POST["question"];
		$answer = strtolower($_POST["answer"]);
		$sql = "SELECT * FROM accounts where email = '$email'";
		$result = $conn->query($sql);
		if($result->num_rows>0){
			$row = $result->fetch_assoc();
			// $question = $row["question"];
			// $answer = $row["answer"];
			if($question == $row["question"]){
				if ($answer == strtolower($row["answer"])) {?>
					<div class="account-page">    
						<div class="form-container" > <br><br>   
							<p>RESET PASSWORD </p>    

							<form action="" method="POST"><br><br>
								
								<input type="hidden" name="email" id="email" value="<?php  echo"$email" ; ?>">
								<label for="password"><h5>Enter New Password</h5></label>  
								<input type="password" name="password" id="password" required="required">


								<button class="btn" type="submit" name="reset_p" id="reset_p">Reset Password</button>
							</form>
						</div>
					</div>

					<?php 	
				}else{
					header('location:reset_pass.php?message=invalid_ans');}
				}else{
					header('location:reset_pass.php?message=invalid_ques');
				}


			}else{
				header('location:reset_pass.php?message=notexists');
			}

		}


		if(isset($_POST['reset_p'])){
			$email=$_POST["email"];
			$password=$_POST["password"];

			$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
			$sql = "UPDATE accounts SET password='$password'  WHERE email ='$email'";
			if($conn->query($sql) ===TRUE){
				header('location:account.php?message=sucess1');
			}else{
				echo "Error updating record :" . $conn->error;
			}
			$conn->close();
		}

		
		?>
	</body>
	</html>