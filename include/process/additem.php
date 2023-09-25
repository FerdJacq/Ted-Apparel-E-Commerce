<?php
require  "session.php";
require  "functions.php";

$item_name = $_POST['IName'];
$item_desc = $_POST['IDescription'];
$item_type = $_POST['ApparelType'];
$list_color = " ".$_POST['IColors'].",";
$item_price = $_POST['PItem'];
$item_sizes = $_POST['sizes'];
$str_size=""; 

foreach($item_sizes as $val){
    $str_size .= $val.",";
}

$tableName= "tbl".$id;

//Selects all the rows within the table name of the store
$result = getData($tableName);
$num_rows = mysqli_num_rows($result);
$num = $num_rows + 1; 
$item_ID = $id."000".$num;
include "addpic.php";
$sql_add = "INSERT INTO `$tableName`(`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES ('$item_ID','$item_name','$item_desc','$item_price', '$list_color', '$str_size' ,'$item_type')";
$result_add = mysqli_query($conn, $sql_add);
include "addpic.php";
if($result_add){
    header("Location: ../../store.php?action=item_add&id=".$id."");
    exit();
}
else{
    header("Location: ../../store.php?error=exec_err&id=".$id."");
    exit();
}