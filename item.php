<!doctype html>
<html class="no-js" lang="zxx">
<head>
        
<?php include "header.php"; ?>
<link href="include/css/store.css" rel="stylesheet" media="all">

</head>
    <body style="background-color: #35858B">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            
            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <br>
            <div class="content-wraper">
                <div class="card container" style="border-radius:10px;"> 
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <?php
                                    $sID = $_GET['store'];
                                    $iID = $_GET['item'];

                                    $sql_img = "SELECT * FROM `tblimages` WHERE `sID`=$iID;";
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
                                    
                                    ?>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="Photos/<?php echo $prod[0];?>" >
                                            <img src="Photos/<?php echo $prod[0];?>" alt="include/images/ads/1.jpg" style="width:400px; height:450px;">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="Photos/<?php echo $prod[1];?>" >
                                            <img src="Photos/<?php echo $prod[1];?>" alt="include/images/ads/1.jpg" style="width:400px; height:450px;">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="Photos/<?php echo $prod[2];?>">
                                            <img src="Photos/<?php echo $prod[2];?>" alt="include/images/ads/1.jpg" style="width:400px; height:450px;"> 
                                        </a>
                                    </div>
                                </div>

                                <div class="product-details-thumbs slider-thumbs-1">                                        
                                    <div class="sm-image"><img src="Photos/<?php echo $prod[0];?>" style="width:150px; height:150px;"></div>
                                    <div class="sm-image"><img src="Photos/<?php echo $prod[1];?>" style="width:150px; height:150px;"></div>
                                    <div class="sm-image"><img src="Photos/<?php echo $prod[2];?>" style="width:150px; height:150px;"></div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>
                        
                        <div class="col-lg-7 col-md-6">
                        <button class=" btn1 btn-primary float-right p-3 m-3" onclick="history.back()">Go Back</button>
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                <?php

                        $tableName= "tbl".$sID;

                        $sql = "SELECT * FROM $tableName WHERE `Product_ID`= $iID;";
                        $result_new = mysqli_query($conn, $sql);
                        $row_n= mysqli_fetch_assoc($result_new); 
                        
                        $name = $row_n['Name'];
                        $desc = $row_n['Description'];
                        $price = $row_n['Price'];
                        $color = $row_n['Color'];
                        $size = " ".$row_n['Sizes'];
                        
                        $prev =1;
                        $colors = array();
                        $num = substr_count($color, ",");
                        for ($i =0; $i < $num; $i++){
                            $pos = strpos($color, ",", $i + $prev);
                            $end =  $pos + $prev;
                            $trim = substr($color, $prev, $end); 
                            $strtrim = trim($trim);
                            $strval = strstr($strtrim, ',', true); 
                            array_push($colors, $strval);
                            $prev = $pos+1;
                        }
                        $prev=1;
                        $sizes = array();
                        $num_new = substr_count($size, ",");
                        $tok= strtok($size,",");
                        while ($tok !== false) {
                            array_push($sizes, $tok);
                            $tok = strtok(",");
                        }/*
                        for ($i =0; $i < $num_new; $i++){
                            $pos = strpos($size, ",", $i + $prev);
                            $end =  $pos + $prev;
                            $trim = substr($size, $prev, $end); 
                            $strtrim = trim($trim);
                            $strval = strstr($strtrim, ',', true); 
                            array_push($sizes, $strval);
                            $prev = $pos+1;
                        }*/
                        ?>
                                   <h2><?php echo $name;?></h2>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2 m-2"><?php echo"₱ ". $price;?></span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span><?php echo $desc;?></span>
                                        </p>
                                    </div>
                                    <form action="include/process/addtocart.php" method="post" class="cart-quantity">
                                    <div class="product-variants">
                                        <div class="produt-variants-size m-2">
                                            <label>Sizes</label>
                                            <select class="nice-select" name = "size">
                                            <option value="1" title="select" selected="selected">Select your size</option>
                                            <?php
                                                foreach($sizes as $val){
                                                    echo '<option value="'.$val.'" title="M">'.$val.'</option>';
                                                } 
                                                    
                                            ?>
                                            </select>
                                        </div>
                                        <br><br>
                                        <div class="produt-variants-size m-2">
                                            <label>Color</label>
                                            <select class="nice-select" name = "color">
                                            <option value="1" title="select" selected="selected">Select your color</option>
                                            <?php
                                                foreach($colors as $val){
                                                    echo '<option value="'.$val.'" title="'.$val.'">'.$val.'</option>';
                                                }
                                            ?>
                                            </select>
                                            </select>
                                            <input type="text" value = "<?php echo $price;?>" name = "price" hidden/>
                                            <input type="text" value = "<?php echo $iID;?>" name = "item_ID" hidden/>
                                            <input type="text" value = "<?php echo $sID;?>" name = "store_ID" hidden/>
                                        </div>
                                    </div> <br><br>
                                    <div class="single-add-to-cart">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div> <br><br><br>
                                            <?php  
                                            $id=$_SESSION['ID'];
                                            $psql ="SELECT * From `tblusers` WHERE `ID` ='$id';";
                                            $presult= mysqli_query($conn, $psql);
                                            $prow= mysqli_fetch_assoc($presult); 
                                            $pri = $access;

                                            if($pri =='1' || $pri == '0'){
                                                echo '<button type="submit" class="add-to-cart mb-2 mt-2" style="background-color:#EA5C2B" hidden>Add to cart</button>';
                                            }else{
                                                echo '<button type="submit" class="add-to-cart mb-2 mt-2" style="background-color:#EA5C2B" >Add to cart</button>';}
                                            
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="card container" style="border-radius:10px;">
   
                    <div class="row">
                        <div class="col-lg-12"><br>
                        <span style="font-size: 20px;" class="m-auto"> Product Reviews</span>
                        <hr>
                                           
                           
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <!--PHP for looping the reviews-->
                    <?php
                        $sql_comm = "SELECT * FROM tblreview WHERE `Product_ID`=$iID ORDER by `Status` DESC;";
                        $result_comm = mysqli_query($conn, $sql_comm);
                        while($row_comm=$result_comm->fetch_array()){
                            echo '<div class="comment-author-infos pt-25 float-left">
                                    <div>';
                                if($sID == $id & $row_comm['Status'] == 0 ){
                                    echo '<div class="float-right"><a href= "include/process/functions.php?sid='.$sID.'&pid='.$row_comm['Product_ID'].'&stat='.$row_comm['Status'].'&cid='.$row_comm['Comment_ID'].'">
                                    <button><i class="fa fa-star-o" style="width:30px;"></i></button>
                                    </a></div>';
                                }  
                                if($sID == $id & $row_comm['Status'] == 1){
                                    echo '<div class="float-right"><a href= "include/process/functions.php?sid='.$sID.'&pid='.$row_comm['Product_ID'].'&stat='.$row_comm['Status'].'&cid='.$row_comm['Comment_ID'].'">
                                    <button><i class="fa fa-star" style="width:30px;"></i></button>
                                    </a></div>';
                                }  
                            echo '<h4><strong>'.$row_comm['Name'].'</strong> </h4>';
                            echo' <p>'.$row_comm['Review'].'</p></div></div> '; 
                        }
                    ?>
                   
                                  
                                    <div class="review-btn">
                                    <?php  
                                            $id=$_SESSION['ID'];
                                            $psql ="SELECT * From `tblusers` WHERE `ID` ='$id';";
                                            $presult= mysqli_query($conn, $psql);
                                            $prow= mysqli_fetch_assoc($presult); 
                                            $pri = $access;

                                            if($pri != 2){
                                                echo '<a class="btn1 btn-primary float-right m-5" href="#" data-toggle="modal" data-target="#mymodal" hidden>Write Your Review!</a>';
                                            }else{
                                                echo '<a class="btn1 btn-primary float-right m-5" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>';}
                                            
                                            ?>
                                    
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    
                                                    <h3 class="review-page-title" style="background-color:orange;">Write Your Review</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="Photos/<?php echo $prod[0];?>" alt="Li's Product" style="height:400px; width:350px">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name"><?php echo $name;?></p>
                                                                   <p>
                                                                       <span><?php echo $desc;?></span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>

                                                    <?php
                                                    $name = $_SESSION['Name'];

                                                    ?>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Feedback</h3>
                                                                        <form action="include/process/review.php" method="post">
                                                                            <div class="feedback-input">
                                                                                <p class="feedback-form-author">
                                                                                    <label for="author">Name<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="author" name="author" value="<?php echo $name;?>" size="30" aria-required="true" type="text">
                                                                                </p>
                                                                                <p class="feedback-form">
                                                                                    <label for="feedback">Your Review</label>
                                                                                    <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                                    <span class="required"><sub>*</sub> Required fields</span>
                                                                                </p>
                                                                                <input type="hidden" value = "<?php echo $iID;?>" name = "item_id">
                                                                                <input type="hidden" value = "<?php echo $id;?>" name = "user_id">
                                                                                <input type="hidden" value = "<?php echo $sID;?>" name = "store_id">
                                                                                <div class="feedback-btn pb-15">
                                                                                    <button type="submit" name ="modalSubmit" class="btn1 btn-primary float-right m-2">Submit</button>
                                                                                    <button href="#" class=" btn1 btn-secondary float-right m-2" data-dismiss="modal" aria-label="Close">Close</button>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Footer Area -->
            
                <!-- Footer Static Bottom Area End Here -->
            </div>
            <!-- Footer Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        
        <!-- Body Wrapper End Here -->
       
    </body>
    <?php include "footer.php"; ?>
</html>