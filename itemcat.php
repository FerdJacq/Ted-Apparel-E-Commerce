<section statistic statistic2>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
    <!-- Filter -->
            <form method ="post" action="">
                <button class="au-btn-filter" name = "all"><i class="zmdi zmdi-filter-list"></i>filters</button>
                <button class="au-btn-filter" name = "shirts">Shirts</button>
                <button class="au-btn-filter" name = "jeans">Jeans</button>
            </form>
        </div>
    <!-- Filter end -->

        <?php
            if($store_id == $id){
        ?>
        <div class="table-data__tool-right">
            <button class="open-button au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#add"><i class="zmdi zmdi-plus"></i>add item</button>
        </div>
        <?php
            }
        ?>
    </div>

<!-- ============================================================ ADD ITEM MODAL ============================================================ --> 
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="additem" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <form action="include/process/addpic.php" method="post" class="form-container" enctype="multipart/form-data">
                    <!-- Item Name -->
                        <label class="mb-1 mb-3" for="inputStorename">Item Name</label>
                        <input class="form-size form-control mb-3" id="Storename" name ="IName" type="text" placeholder="Item Name" required>
                    <!-- Item Description -->
                        <label class="mb-1 mb-3" for="inputStoreDescription">Item Description</label>
                        <textarea class="form-control mb-3" name ="IDescription" id="StoreDescription" rows="5" placeholder="Item Description" required></textarea>
                    <!-- Item Description -->
                        <label class="mb-1 mb-3" for="inputPriceItem">Price Item</label>
                        <input class="form-control mb-3" id="PriceItem" name ="PItem" type="number" min="1" placeholder="Price Item" required>
                    <!-- Item Description -->
                    <label class="mb-1 mb-3" for="inputStoreDescription">Color Variants</label>
                        <textarea class="form-control mb-3" name ="IColors" id="StoreDescription" rows="5" placeholder="Enter color variants (Example: red, yellow, blue)" required></textarea>
                    <!-- For filter -->
                    <label class="mb-1 mb-3" for="inputPayment Method">Type of item</label> <br>
                    <div class="form-check-inline form-check button">
                        <label for="inline-radio1" class="form-check-label">
                        <input type="radio" id="shirt" name="ApparelType" value="Shirt" class="form-check-input">Shirt </label> &nbsp;&nbsp;
                        <label for="inline-radio2" class="form-check-label ">
                        <input type="radio" id="jeans" name="ApparelType" value="Jeans" class="form-check-input">Jeans </label>
                    </div> <br>
                    <label class="mb-1 mb-3" for="inputStoreDescription">Size Range</label> <br>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sizes[]" id="inlineRadio1" value="Extra Small">
                        <label class="form-check-label" for="inlineRadio1">XS</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sizes[]" id="inlineRadio1" value="Small">
                        <label class="form-check-label" for="inlineRadio1">S</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sizes[]" id="inlineRadio2" value="Medium">
                        <label class="form-check-label" for="inlineRadio2">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sizes[]" id="inlineRadio1" value="Large">
                        <label class="form-check-label" for="inlineRadio1">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="sizes[]" id="inlineRadio2" value="Extra Large">
                        <label class="form-check-label" for="inlineRadio2">XL</label>
                        </div>
                        <br> <br>
                    <!-- Sample Photos -->
                        <label class="mb-1 mb-3" for="inputEmailAddress">Item Samples(Select exactly 3 photos of sample products)</label>
                        <input type="file" id="file-input" name="files[]" multiple class="form-control-file" required> <br>

                <button type="submit" class="btn1 btn-primary float-right m-3">Save</button>
                <button type="button" class="btn1 btn-secondary float-right m-3" onclick="closeForm()">Close</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================ END OF ADD ITEM MODAL============================================================ --> 

<!-- ============================================================ FILTER PROCESS ============================================================ --> 
<?php
$tblName = "tbl".$store_id;
    if(isset($_POST['all'])){
        $sql_item = "SELECT * FROM ".$tblName.";";
    }
    elseif(isset($_POST['shirts'])){
        $sql_item = "SELECT * FROM ".$tblName." WHERE `Type`='Shirt';";
    }
    elseif(isset($_POST['jeans'])){
        $sql_item = "SELECT * FROM ".$tblName." WHERE `Type`='Jeans';";
    }
    else{
        $sql_item = "SELECT * FROM ".$tblName.";";
    }
    if($result_item = $conn->query($sql_item)){
       if($result_item->num_rows > 0){
            $counter = 3;
            //=======//
        while($row_item = $result_item->fetch_array()){
            $item_name = $row_item['Name'];
            $item_ID = $row_item['Product_ID'];
            $item_desc = $row_item['Description'];
            //=======//
            $sql_img = "SELECT * FROM `tblimages` WHERE `sID`=$item_ID;";
                                    $result_img = mysqli_query($conn, $sql_img);
                                    $row_img = mysqli_fetch_assoc($result_img);
                                    $str = " ".$row_img['file_name'].",";
                                    $prev =1;
                                    $prod = array();
                                    $num = substr_count($str, ",");
                                    for ($i =0; $i < $num; $i++){
                                        $pos = strpos($str, ",", $i + $prev);
                                        $end =  $pos + $prev;
                                        $trim = substr($str, $prev, $end); 
                                        $strtrim = trim($trim);
                                        $strval = strstr($strtrim, ',', true); 
                                        array_push($prod, $strval);
                                        $prev = $pos+1;
                                    }
                                    //=======//
            //=======//
            if($counter == 3){
                echo '
                <div class="row">';
            }
            //=======//
            echo '<div class="col-lg-4">
                <div class="card filterDiv <!-- insert here type of apparel -->" style="border-radius:5px; margin-left:5px;"> 
                <a href=item.php?item='.$item_ID.'&store='.$store_id.'>
                <img class="card-img-top" src="Photos/'.$prod[0].'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$item_name.'</h5>
                        <p class="card-text">'.$item_desc.'</p>
                    </div>
                </div></a>
                </div>';
            if($counter == 2){
                echo '</div>';
                $counter = 0;
            }
            $counter +=1;                         
        }
        //=======//

 // Free result set
 $result->free();
    } 
} 
// Close connection
$conn->close();
?>
<!-- ============================================================ FILTER PROCESS end ============================================================ --> 


    </div>
    </div>
</section>