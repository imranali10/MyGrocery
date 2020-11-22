<?php
include("config.php");

if(isset($_POST['but_upload'])){
    
    function val($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        
        return $data;
    }
    // $category=val($_POST["category"]);
    $p_name=val($_POST["p_name"]);
    $p_price=val($_POST["p_price"]);
    $p_des=val($_POST["p_des"]);
    $p_cat= val($_POST["category"]);
    
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    
    // Check extension
    if( in_array($imageFileType,$extensions_arr) )
    {
        // Convert to base64 
        // $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
        // $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        // Insert record
        $query = "insert into products(product_category,product_image,product_name,product_price,product_des) values('".$p_cat."','".$name."','".$p_name."','".$p_price."','".$p_des."')";
        mysqli_query($conn,$query);?>
        <!-- // if ($query===TRUE) {
            // header('location:reg.php'); -->
           <center><b> <?php echo "Product Inserted !!!";?></b> </center><?php
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            # code...
            // }else
            // {
                //     echo "Error"."<br>".$conn->error;
                // }
                
                
                
                
            }
        }
        
        
        ?>
        
    <!DOCTYPE html>
    <html>
    <head>
    <title>Add Product</title>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>


        </head>
        <body class="header">
            
        
        <div class="container ">    
        
        <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
        <div class="panel-heading">
        <div class="panel-title">Add Product</div>
        </div>  
        <div class="panel-body" >
        <form method="post"  action="" enctype='multipart/form-data'>
        <div id="div_id_username class="form-group required">
        <label for="p_name" class="control-label col-md-4  requiredField"> Select Category<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <select name="category" id="category">
        <option value="Grocery & Staples">Grocery & Staples</option>
        <option value="Personal Care">Personal Care</option>
        <option value="Household Care">Household Care</option>
        <option value="Beverages">Beverages</option>
        <option value="Breakfast & Dairy">Breakfast & Dairy</option>
        <option value="Baby Care">Baby Care</option>
        <option value="Snacks">Snacks</option>
        <option value="Packaged Foods">Packaged Foods</option>
        <option value="Fruit & Vegetables">Fruit & Vegetables</option>
        </select>
        </div>
        </div>
        
        <!-- <div id="div_id_select" class="form-group required">
        <label for="id_select"  class="control-label col-md-4  requiredField"> Select<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "  style="margin-bottom: 10px">
        <label class="radio-inline"><input type="radio" checked="checked" name="select" id="id_select_1" value="S"  style="margin-bottom: 10px">Knowledge Seeker</label>
        <label class="radio-inline"> <input type="radio" name="select" id="id_select_2" value="P"  style="margin-bottom: 10px">Knowledge Provider </label>
        </div>
        </div> 
        <div id="div_id_As" class="form-group required">
        <label for="id_As"  class="control-label col-md-4  requiredField">As<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "  style="margin-bottom: 10px">
        <label class="radio-inline"> <input type="radio" name="As" id="id_As_1" value="I"  style="margin-bottom: 10px">Individual </label>
        <label class="radio-inline"> <input type="radio" name="As" id="id_As_2" value="CI"  style="margin-bottom: 10px">Company/Institute </label>
        </div>
        </div> --><br>
        <div id="div_id_username class="form-group required"><br>
        <label for="p_name" class="control-label col-md-4  requiredField"> Product Name<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <input class="input-md  textinput textInput form-control" required id="p_name" maxlength="30" name="p_name" placeholder="Insert Product Name" style="margin-bottom: 10px" type="text" />
        </div>
        </div>
        <div id="div_id_email" class="form-group required">
        <label for="p_price" class="control-label col-md-4  requiredField"> Product Price<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <input class="input-md emailinput form-control" id="p_price" required name="p_price" placeholder="Enter the Price" style="margin-bottom: 10px" type="text" />
        </div>     
        </div>
        <div id="div_id_password1" class="form-group required">
        <label for="p_des" class="control-label col-md-4  requiredField">Description<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "> 
        <textarea class="input-md textinput textInput form-control" id="p_des" required name="p_des" placeholder="Product Description" style="margin-bottom: 10px" ></textarea>
        </div>
        </div>
        <div id="div_id_password1" class="form-group required">
        <label for="file" class="control-label col-md-4  requiredField">Product Image<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "> 
        <input class="input-md textinput textInput form-control"  type='file' required name='file' style="margin-bottom: 10px" placeholder="upload" />
        </div>
        </div>
        <!-- <div id="div_id_password2" class="form-group required">
        <label for="id_password2" class="control-label col-md-4  requiredField"> Re:password<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <input class="input-md textinput textInput form-control" id="id_password2" name="password2" placeholder="Confirm your password" style="margin-bottom: 10px" type="password" />
        </div>
        </div>
        <div id="div_id_name" class="form-group required"> 
        <label for="id_name" class="control-label col-md-4  requiredField"> full name<span class="asteriskField">*</span> </label> 
        <div class="controls col-md-8 "> 
        <input class="input-md textinput textInput form-control" id="id_name" name="name" placeholder="Your Frist name and Last name" style="margin-bottom: 10px" type="text" />
        </div>
        </div>
        <div id="div_id_gender" class="form-group required">
        <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "  style="margin-bottom: 10px">
        <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px">Male</label>
        <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female </label>
        </div>
        </div>
        <div id="div_id_company" class="form-group required"> 
        <label for="id_company" class="control-label col-md-4  requiredField"> company name<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "> 
        <input class="input-md textinput textInput form-control" id="id_company" name="company" placeholder="your company name" style="margin-bottom: 10px" type="text" />
        </div>
        </div> 
        <div id="div_id_catagory" class="form-group required">
        <label for="id_catagory" class="control-label col-md-4  requiredField"> catagory<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 "> 
        <input class="input-md textinput textInput form-control" id="id_catagory" name="catagory" placeholder="skills catagory" style="margin-bottom: 10px" type="text" />
        </div>
        </div> 
        <div id="div_id_number" class="form-group required">
        <label for="id_number" class="control-label col-md-4  requiredField"> contact number<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <input class="input-md textinput textInput form-control" id="id_number" name="number" placeholder="provide your number" style="margin-bottom: 10px" type="text" />
        </div> 
        </div> 
        <div id="div_id_location" class="form-group required">
        <label for="id_location" class="control-label col-md-4  requiredField"> Your Location<span class="asteriskField">*</span> </label>
        <div class="controls col-md-8 ">
        <input class="input-md textinput textInput form-control" id="id_location" name="location" placeholder="Your Pincode and City" style="margin-bottom: 10px" type="text" />
        </div> 
        </div> -->
        <div class="form-group">
        <div class="controls col-md-offset-4 col-md-8 ">
        <div id="div_id_terms" class="checkbox required">
        
        </div> 
        
        </div>
        </div> 
        <div class="form-group"> 
        <div class="aab controls col-md-4 "></div>
        <div class="controls col-md-8 ">
        <input type="Reset" name="reset" value="Reset" class="btn btn-warning btn btn-info" id="submit-id-signup" />
        <center>OR<center> <input type="submit" name="but_upload" value="Upload" class="btn btn btn-primary" id="button-id-signup" />
        </div>
        </div> 
        
        </form>
        
        </form>
        </div>
        </div>
        </div> 
        </div>
        </body>
        </html>
        
        
        
        
        
        
        </div>        <script>
        $(document).ready(function() {
            
            var enrollType;
            //  $("#div_id_As").hide();
            $("input[name='As']").change(function() {
                memberType = $("input[name='select']:checked").val();
                providerType = $("input[name='As']:checked").val();
                toggleIndividInfo();
            });
            
            $("input[name='select']").change(function() {
                memberType = $("input[name='select']:checked").val();
                toggleIndividInfo();
                toggleLearnerTrainer();
            });
            
            function toggleLearnerTrainer() {
                
                if (memberType == 'P' || enrollType=='company') {
                    $("#cityField").hide();
                    $("#providerType").show();
                    $(".provider").show();
                    $(".locationField").show();
                    if(enrollType=='INSTITUTE'){
                        $(".individ").hide();
                    }
                    
                } 
                else {
                    $("#providerType").hide();
                    $(".provider").hide();
                    $('#name').show();
                    $("#cityField").hide();
                    $(".locationField").show();
                    $("#instituteName").hide();
                    $("#cityField").show();
                    
                }
            }
            function toggleIndividInfo(){
                
                if(((typeof memberType!=='undefined' && memberType == 'TRAINER')||enrollType=='INSTITUTE') && providerType=='INDIVIDUAL'){
                    $("#instituteName").hide();
                    $(".individ").show();
                    $('#name').show();
                }
                else if((typeof memberType!=='undefined' && memberType == 'TRAINER')|| enrollType=='INSTITUTE'){
                    $('#name').hide();
                    $("#instituteName").show();
                    $(".individ").hide();
                }
            }
            
        });
        
        </script>
        