<?php
require_once "dbconn.php";

$sql_top = "SELECT * FROM `tblstores` ORDER BY Sales DESC;";
$result_top = mysqli_query($conn, $sql_top);
$row_top = mysqli_fetch_assoc($result_top);

$top = array();
$counter = 1;
while($row_top = $result_top->fetch_array()){
    if($counter > 3){
        break;
    }
    array_push($top, $row_top['Store_ID']);
    $counter++;
}
$result_top ->free();

$sql1 = "SELECT * FROM tblstores WHERE Store_ID = '$top[0]';";
$result1= mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM tblstores WHERE Store_ID = '$top[1]';";
$result2= mysqli_query($conn, $sql2);
$row2=mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM tblstores WHERE Store_ID = '$top[2]';";
$result3= mysqli_query($conn, $sql3);
$row3=mysqli_fetch_assoc($result3);


?>