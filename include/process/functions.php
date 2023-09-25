<?php
//lagay dito ng repeating functions pero sa ending na para hindi redundant yung code

//gets the first name in the full name
function trimname($name){
    $pos = strpos($name, " ", 0);
    $fname = substr($name, 0, $pos);
    return $fname;
}

//updates data one at a time
function updateProfile($ID, $val, $param){
    require "dbconn.php";
    $sql = "UPDATE tblusers SET ".$param."='$val' WHERE ID='$ID';";
    $result = mysqli_query($conn, $sql);
}

//select all data in table
function getData($table_name){
    require "dbconn.php";
    $sql = "SELECT * FROM ".$table_name.";";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//select all data in row
function getRow($table_name, $val, $param){
    require "dbconn.php";
    $sql = "SELECT * FROM ".$table_name." WHERE ".$param." = '".$val."';";
    $result = mysqli_query($conn, $sql);
    return $result;
}


if(isset($_GET['order'])){
    require "dbconn.php";
    $action = $_GET['order'];
    $PO = $_GET['PO'];
    if($action == "accept"){
        $sql = "UPDATE tblnotif SET Status='1' WHERE PurchaseOrder='$PO';";
    }
    if($action == "reject"){
        $sql = "UPDATE tblnotif SET Status='9' WHERE PurchaseOrder='$PO';";
    }
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../../profile.php");
        exit();
    }
}

if(isset($_GET['orderDone'])){
    require_once "dbconn.php";
    $PO = $_GET['orderDone'];
    $act = $_GET['action'];
    $sql = "SELECT * FROM tblpurchases WHERE PurchaseOrder = $PO;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql_del = "DELETE FROM tblnotif WHERE PurchaseOrder = $PO;";
    $result_del = mysqli_query($conn,   $sql_del);
    if($act == "review" && $result_del){
        $item_ID = $row['Product_ID'];
        $store_ID = $row['Store_ID'];
        header("Location: ../../item.php?item=".$item_ID."&store=".$store_ID."");
        exit();
    }
    elseif($act == "nothing" && $result_del){
        header("Location: ../../profile.php");
        exit();
    }else{
        header("Location: ../../profile.php?error=exec_err");
        exit();
    }

}

if(isset($_GET['login'])){
    session_start();

    $ID = "a";
    $name = "Guest";

    $_SESSION['ID'] = "a";
    $_SESSION["loggedin"] = true;

    header("Location: ../../home.php");
    exit();
}

if(isset($_GET['reject'])){
    require "dbconn.php";
    $ID = $_GET['reject'];
    //$sql = "UPDATE tblstores SET Status='3' WHERE Store_ID='$ID';";
    $sql = "DELETE FROM tblstores WHERE Store_ID='$ID';";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../../Admin/dashboard.php");
    }
}

if(isset($_GET['confirm'])){
    require "dbconn.php";
    $ID = $_GET['confirm'];
    $sql = "UPDATE tblstores SET Status='2' WHERE Store_ID='$ID';";
    $result = mysqli_query($conn, $sql);
    $sql_user = "UPDATE tblusers SET AccLvl='1' WHERE ID='$ID';";
    $result_user = mysqli_query($conn, $sql_user);
    $tblname = "tbl".$ID;
    $tblcreate = "CREATE TABLE $tblname (`Product_ID` varchar(50), `Name` varchar(255), `Description` varchar(255), `Price` int, `Color` varchar(255), `Sizes` varchar(255), `Type` varchar(255));";
    $result_new = mysqli_query($conn, $tblcreate);
    if($result_new){
        header("Location:  ../../Admin/dashboard.php");
    }
}

if(isset($_GET['delete'])){
    require "dbconn.php";
    $ID = $_GET['delete'];
    $sql = "DELETE FROM `tblstores` WHERE `Store_ID`='$ID';";
    $result = mysqli_query($conn, $sql);
    if($result){
    $tablename = "tbl".$ID;
    $sql2 = "DELETE FROM `tblusers` WHERE `ID`='$ID';";
    $result2 = mysqli_query($conn, $sql2);
    $sql3 = "DROP TABLE $tablename;";
    $result3 = mysqli_query($conn, $sql3);
    if($result2 && $result3){
        header("Location:  ../../Admin/accs.php");
    }
}
}

if(isset($_GET['modal'])){
    require "dbconn.php";
    $ID = $_GET['modal'];
    $sql = "SELECT * FROM tblstores WHERE Store_ID='$ID';";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_array();
    $name = $row['Name'];
    $desc = $row['Description'];
    $con = $row['Contact'];
    $pay = $row['Payment_Method'];
    if($result){
        header("Location:  ../../Admin/dashboard.php?modalName=".$name."&modalDesc=".$desc."&modalCon=".$con."&modalPay=".$pay."#modalQuickView");
    }
}

if(isset($_POST['search'])){
    $po = $_POST['select_box'];
    header("Location: ../../profile.php?id=".$po."");
}


if(isset($_GET['follow'])){
    require "dbconn.php";
    $store_id= $_GET['follow'];
    $user_id = $_GET['id'];
    $status = $_GET['stat'];

    if($status == 1){
        $sql = "DELETE FROM `tblfollow` WHERE Store_ID = '$store_id' AND UserID = '$user_id';";
    }
    else if($status == 0){
        $sql = "INSERT INTO `tblfollow`(`Store_ID`, `UserID`    ) VALUES ('$store_id','$user_id');";
    }
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../../store.php?id=".$store_id."&mod=false");
        exit();
    }

}

if(isset($_GET['update'])){
    $stat = $_GET['update'];    
    $PO = $_GET['PO'];
    require_once "dbconn.php";
    $stat = $_GET['update'];
    $sql = "UPDATE tblnotif SET `Status` = $stat WHERE `PurchaseOrder`='$PO';";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../../profile.php?id=".$PO."");
        exit();
    }
}


if(isset($_GET['pid'])){
    $store =  $_GET['sid'];
    $user =  $_GET['pid'];
    $status = $_GET['stat'];
    $comm = $_GET['cid'];
    require_once "dbconn.php";
    if($status == 1){
        $sql = "UPDATE tblreview SET `Status` = 0 WHERE `Comment_ID`='$comm';";
    }
    else if($status == 0){
        $sql = "UPDATE tblreview SET `Status` = 1 WHERE `Comment_ID`='$comm';";
    }
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../../item.php?store=".$store."&item=".$user."");
        exit();
    }

}
 
?>