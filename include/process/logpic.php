<?php
require  "session.php";


    //image
    $img_name = $_FILES['profileImage']['name']; 
    $img_type = $_FILES['profileImage']['type'];
    $img_tmp_name = $_FILES['profileImage']['tmp_name'];
    $img_error = $_FILES['profileImage']['error'];
    $img_size = $_FILES['profileImage']['size'];

    //image
    $img_extension = pathinfo($img_name , PATHINFO_EXTENSION);
    $img_extension = strtolower($img_extension);

    $allowed_extension = array("jpeg" , "jpg" , "png");
   
    if($img_error == 0 ){
        if($img_size <= 1000000 ){
            if(in_array($img_extension , $allowed_extension)){

             //image
             $img_new_name = uniqid("IMG-" , true) . '.' . $img_extension;
             $img_upload_path = '../upload/' . $img_new_name;
             move_uploaded_file($img_tmp_name , $img_upload_path);

             //insert to database
             $sql="";
             $result = mysqli_query($conn , $sql);

                if($result){
                    $msg_success="Profile Have Been Updated!";
                    header("Location: ../../profile.php?Success&Message=".$msg_success."");
                   
                    exit();
                }
                }else {
                $error_msg="Wrong file format!";
                header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                exit();
               
            }
        }else {
            $error_msg="File size too large for logo!";
                    header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                    exit();
            
        }
    }else {
        $error_msg="Invalid input for image!";
        header("Location: ../../profile.php?error=empty&message=".$error_msg."");
        exit();
        
    }

?>