
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
	<div class="account-page">    
		<div class="form-container" >    
			<p>RESET PASSWORD </p>    
			<p class="message"><?php if(isset($_GET["message"])){
				if(($_GET["message"])=="notexists")
				{
					echo" Account Does not Exists";
				}
			}
			?></p> 
			<form method="POST" action="resetval.php" > 
				<p class="message"><?php 
				if(isset($_GET["message"])){
					if(($_GET["message"])=="notexists")
					{
						echo" Account Does not Exists";
					}
					if(($_GET["message"])=="invalid_ques")
					{
						echo" Invalid Security Question";
					}
					if(($_GET["message"])=="invalid_ans")
					{
						echo" Invalid Security Answer";
					}
				}
				?>
				</p> <br>

			<label for="email"><h5>Email</h5></label> 
			<input type="email" name="email"  required><br><br>
			<label><h5>Security Question</h5></label>
			<select name="question" id="question" style="width: 100%" >
				<option value="What is the name of the town where you were born?">What is the name of the town where you were born?</option>
				<option value="What elementary school did you attend?">What elementary school did you attend?</option>
				<option value="What was your first car?">What was your first car?</option>
				<option value="What is the name of your first pet?">What is the name of your first pet?</option>
			</select><br><br>
			<label><h5>Answer</h5></label>
			<input type="text" name="answer" id="answer" required="required">

			<button class="btn" type="submit" name="reset" id="reset">Reset</button>
			<a href="account.php" class="btn">Back</a>
		</form> 
	</div>
</div>

</body>
</html>
