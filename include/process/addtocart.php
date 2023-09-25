<?php
require "session.php";
require "functions.php";
if($_SESSION["AccLvl"] == 3){
    
session_unset();
 
session_destroy();
$message = "You have to log in first before you add to cart!";
header("location: ../../index.php?error=empty&message=".$message."");
exit();
}
$size = $_POST['size'];
$color = $_POST['color'];
$item = $_POST['item_ID'];
$store = $_POST['store_ID'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$total = intval($price) * intval($quantity);

$result = getData("tblpurchases");
$num_rows = mysqli_num_rows($result);
$num = $num_rows + 1; 
$PO = $id."000".$num;

$sql = "INSERT INTO `tblpurchases`(`Store_ID`, `Product_ID`, `User_ID`, `PurchaseOrder`, `Quantity`, `Size`, `Color`, `Total`, `Status`) VALUES ('$store','$item','$id','$PO','$quantity','$size','$color','$total','0');";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: ../../item.php?store=".$store."&item=".$item."&action=addcart");
    exit();
}else{
    header("Location: ../../item.php?store=".$store."&item=".$item."&error=exec_err");
    exit();
}