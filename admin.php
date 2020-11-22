<?php 
include("config.php");
// session_start();

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];

//     $record = $conn->query("DELETE FROM accounts WHERE id='$id'");
//     if ($conn->query($record) === TRUE) {
//        $msg = 'alert("Record updated successfully");';
//     }
//         else{
//             echo "Error deleting record: " . $conn->error;
//         }        
//     }


$sql = "SELECT * FROM `accounts_admin`";
$result = $conn->query($sql);
$num_row = mysqli_num_rows($result);   
if($num_row == 0){
    header('location:admin/index.php?message=notexists');
} 


?>
<!DOCTYPE html>
<html>
<head>
	<title> Admin - MyGrocery | Ecommerce Website</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>

</head>
<body>
	<div class="header">
        <div class="container">
            <?php
            require_once('menu.php');?>            
        </div>
    </div>

    <p class="message message-sucess" style="font-size: 18px; margin-top:12px;"><?php if(isset($_GET["message"])){
        if(($_GET["message"])=="sucess")
        {
            echo" Sucessful !!!";
        }
    }
    ?></p>

    <!-- <center><a href="admin_new.php" class="btn"> Add New Admin</a></center> -->
    <center><a href="insert_product.php" class="btn"> Add Products </a></center>


    <div class="small-container cart-page">
        <table>
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ACTIONS</th>
            </tr>
            <?php
            if ($num_row > 0) {
                while($row = mysqli_fetch_array($result)){
                    ?>           
                    <tr>
                        <td>
                            <div class="cart-info "> <small> 
                                <?php echo $row['name'];?></small>
                            </div>    
                        </td>
                        <td>
                            <div class="cart-info"> <small>
                                <?php echo $row['email'];?></small>
                            </div>
                        </td>
                        <td>                        
                            <a  href="actions.php?delete=<?php echo $row['id']; ?>" class="btn" > <span>   <i class="fa fa-trash" aria-hidden="true"></i></span> Delete</a>
                            <a  href="actions.php?update=<?php echo $row['id']; ?>" class="btn" > <span>   <i class="fa fa-pencil" aria-hidden="true"></i></span> Update</a>                            
                            <a href="actions.php?view=<?php echo $row['id']; ?>" class="btn" > <span>   <i class="fa fa-eye" aria-hidden="true"></i></span> View</a>                  
                        </td>       

                    </tr>
                <?php } ?>
                <?php
            }else{?>
                <td style="text-align: left;"><?php echo "0 Results... ";?></td><?php   } ?>

            </table><hr>




        </body>
        </html>