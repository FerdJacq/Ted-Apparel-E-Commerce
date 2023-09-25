<?php
 session_start();
 //session
 if(!isset($_SESSION['ID'])){  
    $message = "You are not allowed to access these pages!";
   header("Location:../index.php?error=empty&message=".$message."");
   exit();
 }
 elseif($_SESSION['AccLvl'] != 0){
    $message = "You are not allowed to access these pages!";
    header("Location:../home.php?error=empty&message=".$message."");
    exit();
 }