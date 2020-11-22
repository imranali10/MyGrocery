<?php

require_once('config.php');
function val($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);

    return $data;
}
if(isset($_POST['updateuser'])){
    
    $name=val($_POST["name"]);
    $email=$_POST["email"];
   
    $id = $_POST["id"];

    $sql= " UPDATE accounts_admin SET name='$name' , email ='$email'  WHERE id ='$id'";
    if($conn->query($sql) ===TRUE){
        header('location:admin.php?message=sucess');
    }else{
        echo "Error updating record :" . $conn->error;
    }
    $conn->close();
}
if(isset($_POST['new_admin'])){
    $name=val($_POST["name"]);
    $email=$_POST["email"];
    $password=val($_POST["password"]);
    

   
        $emailoccured="Select *  from accounts where email='$email'";
        $result = $conn->query($emailoccured);
        $num = mysqli_num_rows($result);

        if($num>=1)
        {
            header('location:admin_new.php?message=taken');
        }else{
            
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $sql=" insert into accounts(name , email ) values('$name','$email','$password',) ";
            if($conn->query($sql)===TRUE)
            {
               header('location:admin.php?message=sucess');
           }else
           {
            echo "Error".$sql."<br>".$conn->error;
        
    }
}$conn->close();
}
?>