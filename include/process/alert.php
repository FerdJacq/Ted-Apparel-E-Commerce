<?php

require "functions.php";
 if(isset($_GET['error'])){
     
    $error = $_GET['error'];
    
    if($error == "login_err"){
        echo "<script> alert ('Invalid Email or Password'); </script>";
    }
    elseif($error == "exec_err"){
        echo "<script> alert ('Oops! Something went wrong. Please try again later'); </script>";
    }
    elseif($error == "ses_err"){
        echo "<script> alert ('Oops! You Should Login First.'); </script>";
    }
    elseif($error == "empty"){
        $message = $_GET['message'];
        echo "<script> alert ('".$message."'); </script>";
    }
    
 }
 if(isset($_GET['action'])){

    $act = $_GET['action'];
     
    if($act == "reg_success"){
        echo "<script> alert ('Registration Successful!'); </script>";
    }
    elseif($act == "in_success"){
        $name = $_GET['name'];
        echo "<script> alert ('Sign in Successful! Welcome back ".trimname($name)."!'); </script>";
    }
    elseif($act == "update_success"){
        echo "<script> alert ('Profile Update Successful!'); </script>";
    }
    elseif($act == "store_req"){
        echo "<script> alert ('Your application is sent! Please wait for the admin to approve your request'); </script>";
    }
    elseif($act == "item_add"){
        echo "<script> alert ('Item added successfully!'); </script>";
    }
    elseif($act = "addcart"){
        echo "<script> alert ('Item added to cart successfully!'); </script>";
    }
    elseif($act = "sub"){
        echo "<script> alert ('Item checked out! Please check your notifications for updates from store owner'); window.location='shopcart.php'</script>";
    }
    elseif($act = "del"){
        echo "<script> alert ('Item removed!'); window.location='shopcart.php';</script>";
    }
    elseif($act = "rev"){
        echo "<script> alert ('Thanks for leaving a review!'); </script>";
    }
 }

/*
NOTES:

All alert messages will be included here. So every php page should require this file. 

ERROR = for error messages
ACTION = for notification messages

*/
?>