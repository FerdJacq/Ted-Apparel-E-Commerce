<head>
<?php include "header.php"; 
include "include/process/alert.php"; 
?>
<link href="include/css/shopcart.css" rel="stylesheet" media="all">
</head>

<body style="background-color: #35858B">

<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
               <div class="cart_container">
                    <div class="cart_title" style="color: white;">Shopping Cart
                    </div>
                </div>
                <?php
                    $sql_show = "SELECT * FROM tblpurchases WHERE `User_ID`=$id AND `Status`=0;";
                    $result_show = mysqli_query($conn, $sql_show);
                    $sIDs = array();
                    $sIDs_comp = array();
                    $PO = array();
                    $names = array();
                    $colors = array();
                    $sizes = array();
                    $quantity = array();
                    $price = array();
                    $total = array();
                    $images = array();
                    $counter = 0;
                    while($row_show = $result_show->fetch_array()){
                        $ids = $row_show['Store_ID'];
                        $tblname = "tbl".$ids;
                        
                        if(!in_array($ids, $sIDs)){
                            array_push($sIDs, $ids);
                        }
                        $pID = $row_show['Product_ID'];
                        $sql_item = "SELECT * FROM $tblname WHERE `Product_ID`=$pID;";
                        $result_item = mysqli_query($conn, $sql_item);
                        $row_item = mysqli_fetch_assoc($result_item);
                        $sql_img = "SELECT * FROM tblimages WHERE `sID`=$pID;";
                        $result_img = mysqli_query($conn, $sql_img);
                        $row_img = mysqli_fetch_assoc($result_img);
                        array_push($sIDs_comp, $ids);
                        array_push($images, $row_img['file_name']);
                        array_push($PO, $row_show['PurchaseOrder']);
                        array_push($names, $row_item['Name']);
                        array_push($colors, $row_show['Color']);
                        array_push($sizes, $row_show['Size']);
                        array_push($quantity, $row_show['Quantity']);
                        array_push($total, $row_show['Total']);
                        array_push($price, $row_item['Price']);
                    }
                    foreach($sIDs as $store_id){
                        $sql1 = "SELECT * FROM tblstores WHERE `Store_ID`=$store_id";
                        $result1 =  mysqli_query($conn, $sql1);
                        $store_row = mysqli_fetch_assoc($result1);
                        $counter = 0;
                        echo '<div class="cart_container">
                                <form action="include/process/checkout.php" method = "post"> 
                                    <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>'.$store_row['Name'].'</th>
                                            <th>ITEM NAME</th>
                                            <th>COLOR</th>
                                            <th>SIZE</th>
                                            <th>QUANTITY</th>
                                            <th>PRICE</th>
                                            <th>TOTAL</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody style="background-color: #0b516a;>';
                                        foreach($sIDs_comp as $val){
                                            if($val == $store_id){
                                                $img = strtok($images[$counter], ",");
                                                echo '<tr class="tr-shadow">
                                                <div class="cart_item_info">
                                                    <td class="cart_item_image"> 
                                                        <img src="Photos/'.$img.'" alt="image not found" style="width:60;"> 
                                                        <input type = "submit" id="submit" name ="submit" value="update" hidden/>
                                                        <input type = "submit" id="delete" name ="submit" value ="delete" hidden/>
                                                    </td>
                                                    <td class="cart_item_name cart_info_col">
                                                        <div class="cart_item_text" style="color:white;">'.$names[$counter].'</div>
                                                    </td>
                                                    <td class="cart_item_name cart_info_col">
                                                        <div class="cart_item_text" style="color:white;">'.$colors[$counter].'</div>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_text" style="color:white;">'.$sizes[$counter].'</div>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_text" style="color:white;"><center>'.$quantity[$counter].'</center></div>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_text" style="color:white;">'.$price[$counter].'</div>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                        <div class="cart_item_text" style="color:white;">'.$total[$counter].'</div>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                    <button type="input" name = "submit" value ="delete" class="open-button btn-danger au-btn au-btn-icon au-btn--medium p-3 float-right"><i class="fa fa-minus-circle"></i></button>
                                                    </td>
                                                    <td class="cart_item_quantity cart_info_col">
                                                        <button type="input"  name = "submit" value ="update" class="open-button btn-success au-btn au-btn-icon au-btn--small float-right">Checkout</button>
                                                            <input type = "hidden" value = "'.$store_id.'" name = "storeID">
                                                            <input type = "hidden" value = "'.$store_row['Sales'].'" name = "sales">
                                                            <input type = "hidden" value = "'.$PO[$counter].'" name = "purOr">
                                                        </label>
                                                    </td>
                                                </div>
                                                </tr>
                                            <tr class="spacer"></tr>';
                                            }
                                            $counter++;
                                        } 
                                    echo  '</tbody>
                                    </table>
                                    </form> 
                            </div>';
                    }
                ?>
                    <!-- Checkout end-->
                     
                     <!-- Checkout Modal -->
                <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="mb-1 mb-3" for="inputStorename">Are you sure you want to checkout item(s)?</label> <br>
                            <button type="submit" id="check" class="btn">Yes</button>
                            <button type="button" class="btn cancel" onclick="closeForm2()">No</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout Modal emd-->
                    <!-- Remove Item Modal -->
                <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="mb-1 mb-3" for="inputStorename">Are you want to remove item(s)?</label> <br>
                            <button type="submit" id="rem" class="btn">Yes</button>
                            <button type="button" class="btn cancel" onclick="closeForm2()">No</button>
                        </div>
                        </div>
                    </div>
                </div>
                 <!-- Remove Item Modal emd-->
            </div>
        </div>
    </div>
</div>
<
<script>
document.getElementById('rem').addEventListener('click', () => {
  document.getElementById('delete').click()
})
document.getElementById('check').addEventListener('click', () => {
  document.getElementById('submit').click()
})
}
</script>
<?php include "footer.php"; ?>
</body>