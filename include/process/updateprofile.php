<?php
include_once "session.php";
include "functions.php";

$id=$_SESSION['ID'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];
$flag = 0;
if(!empty($name)){
    updateProfile($id, $name, "Name");
    $flag++;
}
if(!empty($contact)){
    updateProfile($id, $contact, "ContactNumber");
    $flag++;
}
if(!empty($address)){
    updateProfile($id, $address, "Address");
    $flag++;
}
if(!empty($email)){
    updateProfile($id, $email, "Username");
    $flag++;
}

if($flag==0){
    $message = "Please fill out atleast one form to update your profile!";
    header("Location: ../../profile.php?error=empty&message=".$message."");
    exit();
}
else{
    header("Location: ../../profile.php?action=update_success");
    exit();
}

if(isset($_POST['close'])){
    header("Location: ../../profile.php");
    exit();
}
