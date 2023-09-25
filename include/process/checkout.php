<?php
$store_ID = $_POST['storeID'];
$action = $_POST['submit'];
$val = $_POST['purOr'];
require_once "dbconn.php";

if($_POST['submit'] === "delete"){
        $sql = "DELETE FROM `tblpurchases` WHERE `PurchaseOrder`='$val';";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            header("Location: ../../shopcart.php?error=exec_err");
            exit();
        }
    if($result){
        header("Location: ../../shopcart.php?action=del");
        exit();
    }
}
if($_POST['submit'] === "update"){
    
$sales = $_POST['sales'];
if($sales == 0){
    $sales = 1; 
}
$newsale = 1;

        $newsale += intval($sales);
        $sql = "UPDATE `tblpurchases` SET `Status` = 1 WHERE `PurchaseOrder`='$val' ;";
        $result = mysqli_query($conn, $sql);
        $sql_store = "UPDATE `tblstores` SET `Sales` = '$newsale' WHERE `Store_ID`='$store_ID';";
        $result_store = mysqli_query($conn, $sql_store);
        $sql_get = "SELECT * FROM `tblpurchases` WHERE `PurchaseOrder`=$val;";
        $result_get = mysqli_query($conn, $sql_get);
        $row = mysqli_fetch_assoc($result_get);
        $UID = $row['User_ID'];
        $SID = $row['Store_ID'];
        $stat = 0;
        $sql_notif = "INSERT INTO `tblnotif`(`User_ID`, `Store_ID`, `PurchaseOrder`, `Status`) VALUES ('$UID','$SID','$val;','$stat');";
        $result_notif = mysqli_query($conn, $sql_notif);
            
        if(!$result || !$result_store || !$result_get || !$result_notif){
            header("Location: ../../shopcart.php?error=exec_err");
            exit();
        }
    if($result && $result_store && $result_get && $result_notif){
        header("Location: ../../shopcart.php?action=sub");
        exit();
    }
}