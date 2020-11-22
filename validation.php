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
    $username=val($_POST["username"]);
    $email=$_POST["email"];
    $password=val($_POST["password"]);
    $c_password=val($_POST["password1"]);
    $mobile=val($_POST["mobile"]);
    $address=val($_POST["address"]);
    $question=val($_POST["question"]);
    $answer=val($_POST["answer"]);

    if($password!=$c_password){
        header('location:account.php?message=password');
    }elseif (strlen($password) <= 4) {
        header('location:account.php?message=pshort');
    }
    else
    {
        $emailoccured="Select *  from accounts where email='$email'";
        $result = $conn->query($emailoccured);
        $num = mysqli_num_rows($result);

        if($num>=1)
        {
            header('location:account.php?message=taken');
        }else{
            
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $sql=" insert into accounts(username , email ,password,mobile,address,question,answer) values('$username','$email','$password','$mobile','$address','$question','$answer') ";
            if($conn->query($sql)===TRUE)
            {
               header('location:account.php?message=sucess');
           }else
           {
            echo "Error".$sql."<br>".$conn->error;
        }
    }
}



}
 // ------------------------ Login---------------------------
elseif(isset($_POST['login'])){
    $emailerr = $passworderr ="";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts WHERE email='$email'";
    $result = $conn->query($query);
    $num_row = mysqli_num_rows($result);    
    $row = mysqli_fetch_array($result);
    

    if ($num_row >= 1) {

        if (password_verify($password, $row['password'])) {

            $_SESSION['id'] = $row['id'];
            // echo $_SESSION['id'];
            $_SESSION['username'] = $row['username'];
            
            header('location:index.php');
        }
        else {
            // echo 'false';
            header('location:account.php?message=invalid');
            // $passworderr = "Invalid Password";
        }

    } else {
        // echo 'false';
        header('location:account.php?message=notexists');
        // $emailerr = "Account Does not exists"

    }
    
}

?>
