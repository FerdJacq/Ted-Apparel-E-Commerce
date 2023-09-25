<?php
require_once "dbconn.php";
$name = $_POST['author'];
$rev =  $_POST['comment'];
$itemID = $_POST['item_id'];
$userID = $_POST['user_id'];
$storeID = $_POST['store_id'];
$sql_num = "SELECT * FROM tblreview";
$result_num = mysqli_query($conn, $sql_num);
$num = mysqli_num_rows($result_num);

$comm_id = "100000".$num+1;
$sql = "INSERT INTO `tblreview`(`Comment_ID`,`Product_ID`, `User_ID`, `Name`, `Review`) VALUES ('$comm_id','$itemID','$userID','$name','$rev');";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: ../../item.php?action=rev&item=".$itemID."&store=".$storeID."");
    exit();
}else{
    header("Location: ../../item.php?error=exec_err&item=".$itemID."&store=".$storeID."");
    exit();
}