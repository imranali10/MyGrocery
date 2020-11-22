<?php include("config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Admin|Action - MyGrocery | Ecommerce Website</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>

</head>
<body class="header">
    <?php

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql= "DELETE FROM `accounts_admin` WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
         header('location:admin.php');

     }
     else{
        echo "Error deleting record: " . $conn->error;
    }        
}elseif(isset($_GET['view'])) {
    $id =$_GET["view"];

    $sql = "SELECT * FROM accounts_admin WHERE id ='$id'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $name = $row["name"];
            $email = $row["email"];
            

        }
    }
    ?>  
    <div class="account-page">    
        <div class="form-container">    
            <p>Viewing Details of <?php echo $username ?>.. </p>    
            <form>
                <label for="username"><h5>Name</h5></label>                          
                <input type="text" name="Name" id="Name" value=<?php echo $name ?> readonly="readonly">
                <label for="email"><h5>Email</h5></label> 
                <input type="email" name="email" value=<?php echo $email ?> readonly="readonly">
                
                <a href="admin.php" class="btn">Back</a>
            </form> 
        </div>
    </div>
    <?php
}elseif(isset($_GET['update'])){
    $id =$_GET["update"];

    $sql = "SELECT * FROM accounts_admin WHERE id ='$id'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $name = $row["name"];
            $email = $row["email"];

        }
    }
    ?>
    
    <div class="account-page">    
        <div class="form-container">    
            <p>Updating Details for <?php echo $username ?>.. </p>    
            <form method="POST" action="update.php"> 
                <label for="username"><h5>Name</h5></label>                             
                <input type="text" name="name"  value=<?php echo $name ?> required>
                <label for="email"><h5>Email</h5></label> 
                <input type="email" name="email" value=<?php echo $email ?> required>
                
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button class="btn" type="submit" name="updateuser" id="updateuser">Update</button>
                <a href="admin.php" class="btn">Back</a>
            </form> 
        </div>
    </div>

    
    
    <?php
}
?>

</body>
</html>