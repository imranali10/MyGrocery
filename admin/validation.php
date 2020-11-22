<?php
session_start();
require_once('config.php');

function val($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);

    return $data;
}

// ----------------------Register----------------------------------------
if(isset($_POST['register'])){
    $name=val($_POST["name"]);
    $email=$_POST["email"];
    $password=val($_POST["password"]);
    

    
        $emailoccured="Select *  from accounts_admin where email='$email'";
        $result = $conn->query($emailoccured);
        $num = mysqli_num_rows($result);

        if($num>=1)
        {
            echo '<script>alert("Email Already Taken !! ")</script>';
            // header('location:index.php?signup') ;

        }else{
            
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $sql=" insert into accounts_admin(name , email ,password) values('$name','$email','$password') ";
            if($conn->query($sql)===TRUE)
            {
               header('location:index.php');
           }else
           {
            echo "Error".$sql."<br>".$conn->error;
        }
    }




}

if(isset($_POST['login'])){
    $emailerr = $passworderr ="";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts_admin WHERE email='$email'";
    $result = $conn->query($query);
    $num_row = mysqli_num_rows($result);    
    $row = mysqli_fetch_array($result);
    

    if ($num_row >= 1) {

        if (password_verify($password, $row['password'])) {

            $_SESSION['id'] = $row['id'];
            // echo $_SESSION['id'];
            $_SESSION['name'] = $row['name'];
            echo "hii";
            header("Location: ../admin.php");
            // header('location:admin.php');
        }
        else {
            // echo 'false';
            header('location:index.php?message=invalid');
            // $passworderr = "Invalid Password";
        }

    } else {
        // echo 'false';
        header('location:index.php?message=notexists');
        // $emailerr = "Account Does not exists"

    }
    
}

?>
