<link href="include/css/notif.css" rel="stylesheet" media="all">

<div id="notif-user">
        <div class="user-data m-b-3">
            <div class="center">
            <?php
            if($access == 2){
                $query = " SELECT * FROM tblpurchases WHERE `Status`=1 AND `User_ID`=$id;";
            }
            if($access == 1){
                $query = " SELECT * FROM tblpurchases WHERE `Status`=1   AND `Store_ID`=$id;";
            }
                $result = $conn->query($query);
            ?>
            <form action="include/process/functions.php" method="post" class="au-form-icon--sm inli  ne-block">
                <div class="">
                <ul class="content list-unstyled">
                    <li class="d-inline-flex mx-auto float-right">
                        <select name="select_box" class="p-2 rounded au-input--w200 au-input--style2" id="select_box" style="padding: 1rem;">
                            <option value="0">Click to Search Pending Items
                            </option>
                            <?php 
                            foreach($result as $row_search)
                            {
                                $prod_id = $row_search["Product_ID"];
                                $store_id = $row_search["Store_ID"];

                                $tblname= "tbl".$store_id;
                                
                                $query_store ="SELECT * FROM $tblname WHERE Product_ID = $prod_id;";
                                $result_store = mysqli_query($conn, $query_store);
                                $row_store = mysqli_fetch_assoc($result_store);
                                echo '<option value="'.$row_search["PurchaseOrder"].'">'.$row_store["Name"].'</option>';
                            }
                            ?>  
                        </select> &nbsp;
                        <button type="submit" name="search" class="p-4 btn-light rounded border">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </li>
                </ul>
            </form> 
            </div>

            <h3 class="title-3 m-b-3">
            <i class="glyphicon glyphicon-phone"></i>Purchase Notification</h3> 
            <??>
            <br><br>
 
            <div class="center">
             <?php
                if(isset($_GET['id'])){
                    $id_index = $_GET['id'];
                    if($id_index == 0){
                        $acc="";
                       if($access == 2){
                            $acc = "store";
                        }else{
                            $acc = "user";
                     }
 
                    $msg="Select a ".$acc." first!";
                    echo "<script>alert('".$msg."'); window.location = 'profile.php';</script>";
                    unset($_GET['id']);
                    }
                    $sql_notif = "SELECT * FROM `tblnotif` WHERE `PurchaseOrder` = $id_index;";
                    $result_notif = mysqli_query($conn, $sql_notif);
                    $row_notif = mysqli_fetch_assoc($result_notif);
                    $sql_total = "SELECT * FROM `tblpurchases` WHERE `PurchaseOrder` = $id_index;";
                    $result_total = mysqli_query($conn, $sql_total);
                    $row_total = mysqli_fetch_assoc($result_total);
                    
                    $stat1 = $stat2 = $stat3 = $stat4 = " ";
                    $message = " ";
                        if($row_notif['Status'] == 4){
                            $message = "Order has been shipped!";
                        }
                        if($row_notif['Status'] == 0){
                            $message = "Order has not been accepted yet!";
                        }
                        if($row_notif['Status'] == 1){
                            $message = "Order accepted with a total amount of ".$row_total['Total']."!";
                        }
                        if($row_notif['Status'] == 2){
                           $message = "Payment for order was sent!";
                        }
                        if($row_notif['Status'] == 3){
                            $message = "Payment for order has been acknowledged!";
                        }
                        if($row_notif['Status'] == 5){     
                            $message = "Order has arrived!";   
                        }
                        if($row_notif['Status'] > 2 || $row_notif['Status'] < 2){
                           $stat1 = "disabled";
                        }
                        if($row_notif['Status'] > 3 || $row_notif['Status'] < 3){
                            $stat2 = "disabled";
                        }
                        if($row_notif['Status'] > 1 || $row_notif['Status'] < 1){
                            $stat3 = "disabled";
                        }
                        if($row_notif['Status'] > 5 || $row_notif['Status'] < 5){
                            $stat4 = "disabled";                
                        }
    
                    
                    echo '<div class="alert alert-warning m-5" role="alert">
                    '.$message.'
                    </div>';
                    if($access == 1){
                ?>
                <center>
                <div class="row">
                    <div class="col-sm-6"> 
                        <a href = "include/process/functions.php?update=3&PO=<?php echo $id_index?>"><button class="btn1 btn-secondary" style = "width:100%"<?php echo $stat1;?>> Payment Received </button></a>
                    </div>
                    <div class="col-sm-6">
                    <a href = "include/process/functions.php?update=4&PO=<?php echo $id_index?>"><button class="btn1 btn-secondary" style = "width:100%"<?php echo $stat2;?>> Item Shipped </button></a>
                    </div>
                </div>
                    </center>
                <?php
                    }
                    if($access == 2){
                ?>
                <center>
                <div class="row">
                    <div class="col-sm-6"> 
                    <a href = "include/process/functions.php?update=2&PO=<?php echo $id_index?>"><button class="btn1 btn-secondary" style = "width:100%" <?php echo $stat3;?>> Payment Sent </button></a>
                    </div>
                    <div class="col-sm-6">
                    <a href = "include/process/functions.php?update=5&PO=<?php echo $id_index?>"><button class="btn1 btn-secondary" style = "width:100%" <?php echo $stat4;?>> Item Received </button></a>
                    </div>
                </div>
                    </center>            
                
                
                        
                <?php
                    }    
                }
                ?>
            </div>
        </div>
</div><br>

<?php
    if(isset($_GET['id'])){
        $id_index = $_GET['id'];
        $sql_notif = "SELECT * FROM `tblnotif` WHERE `PurchaseOrder` = $id_index;";
        $result_notif = mysqli_query($conn, $sql_notif);
        

 ?>
<!-- Output notif-->
<div class="user-data m-b-3">
        <h3 class="title-3 m-b-3">
        <i class="glyphicon glyphicon-phone"></i>Purchase Notification</h3> <br>
    <div class="card-body">
        <h6>Purchase Order Number: <?php echo $id_index;?></h6>
        <div class="track">
<!-- NAG IIBA UNG COLOR PAG MAY ACTIVE NA WORD SA CLASS -->

<?php
$nt = intval($row_notif['Status']);
if($nt > 0){
    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Order confirmed</span> </div>';
 }
 else{
    echo '<div class="step"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Order confirmed</span> </div>';

 }
 if($nt > 2){
    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Payment Complete</span> </div>';
 }
 else{
    echo '<div class="step"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Payment Complete</span> </div>';

 }
 if($nt > 3){
    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Item Shipped</span> </div>';
 }
 else{
    echo '<div class="step"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Item Shipped</span> </div>';

 }
 if($nt > 4){
    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Item Received</span> </div>';
 }
 else{
    echo '<div class="step"> <span class="icon"> <i class="fa fa-check mt-3"></i> </span> <span class="text">Item Received</span> </div>';
 }

?>
            
                </div>
        </ul>
    <?php
        if($nt == 5){
    ?>
        <hr> 
        <center>
        <div class="row">
            <div class="col-sm-6"> 
            <a href="include/process/functions.php?orderDone=<?php echo $id_index?>&action=nothing" class="btn1 btn-secondary" data-abc="true" style = "width:100%"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div>
            <div class="col-sm-6">
            <a href="include/process/functions.php?orderDone=<?php echo $id_index?>&action=review" class="btn1 btn-secondary" data-abc="true" style = "width:100%"> <i class="fa fa-pencil"></i>Write a review</a>
            </div>
        </div>
        </center>
        <?php
       }
    ?>
    </div>
</div><br>
<?php
    }
?>
