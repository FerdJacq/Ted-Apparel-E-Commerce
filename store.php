<?php
	require "include/process/alert.php";
?>

<?php include "header.php"; ?>
<link href="include/css/store.css" rel="stylesheet" media="all">

<body class="animsition" style="background-color: #35858B">

<!-- ============================================================ STORE PROFILE ============================================================ -->
<?php
    $store_id = $_GET['id'];
    $sql_new = "SELECT * FROM `tblstores` WHERE Store_ID =  $store_id;";
    $result_new = mysqli_query($conn, $sql_new);
    $row_new= mysqli_fetch_assoc($result_new);
    
    $name = $row_new['Name'];
    $desc = $row_new['Description'];
    $contact = $row_new['Contact'];
    $log = $row_new['Logo'];
    $method_num = $row_new['Payment_Method'];
    $payment = "";
    if($method_num == 1 || $method_num == 3){
        $payment .= "Cash on Delivery";
        if($method_num == 3){
            $payment .= " and ";
        }
    }
    if($method_num == 2 || $method_num == 3){
        $payment .= "Cashless";
    }

    $sql_check = "SELECT * FROM `tblfollow` WHERE Store_ID = '$store_id' AND UserID = '$id'";
    $result_check = mysqli_query($conn, $sql_check);
    $follow_stat = 0; 
    $follow_desc = "Follow";
    if($result_check->num_rows > 0){
        $follow_stat = 1;
        $follow_desc = "Unfollow";

    }
?>
 <br>
<section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">                    
                            <div class="profile-pic">
                            </div>
                                <?php echo '<img src="Photos/'.$log.'"style="width:100px;" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">';?>
                                
                                
            
                                <div class="w-100 ms-3 p-3 d-flex align-self-center">
                                <h3 class="mt-3"> <?php echo $name; ?> </h3>
                                </div>
                            </div>               
                                            
                                           

                        <div class="mt-3">
                        <form method="post">
                            <?php
                             
                             $fsql = "SELECT * FROM `tblfollow` WHERE `Store_ID` = '$store_id';";
                             $fresult = mysqli_query($conn , $fsql);
                             $fresultcheck = mysqli_num_rows($fresult);
                            ?>
                            
                             <button class="text-muted mb-2 font-13" type="submit" name="sub1" ><strong><?php  echo $fresultcheck;?></strong> Followers</button>
                         </form> 
                            <div class="modal fade" id="modalfollow" tabindex="-1" role="dialog" aria-labelledby="modalfollowLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h5 class="modal-title" id="exampleModalLabel">Followers</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                         
                                        <div class="modal-body">
                                            <td><img class="img1 m-3" src="Photos/<?php echo $ufpic; ?>" alt="StoreLogo"></img></td>
                                            <td><?php echo $ufname; ?></td>
                                        </div>  
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if($store_id != $id && $access != 3){
                            ?>
                            <div class="d-flex ml-auto p-2">
                                <a href="include/process/functions.php?follow=<?php echo $store_id;?>&id=<?php echo $id;?>&stat=<?php echo $follow_stat;?>"><button class="btn enableButton"><?php echo $follow_desc; ?></button></a>
                            </div>
                            <?php
                            }
                            ?>
                            <p class="text-muted mb-2 font-13"><strong>Store Description :</strong> <br><span class="ms-2"><?php echo $desc; ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Contact Number :</strong> <br><span class="ms-2"><?php echo $contact; ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Payment Methods :</strong> <br><span class="ms-2"><?php echo $payment; ?></span></p>
                        </div>     
                    </div>                                 
                </div> 
<!-- ============================================================ STORE PROFILE end ============================================================ -->

<!-- ============================================================ MENU CARD ============================================================ -->
<aside class="menu-sidebar3 js-spe-sidebar">
    <div class="card">
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
            <?php
                if($access == 1 && $store_id == $id){
                ?>
                <li>
                    <a href="profile.php">
                    <i class="fas fa-clipboard"></i>Go To Account</a>
                </li>
                <li>
                    <a href="profile.php">
                    <i class="fas fa-clipboard"></i>Notification</a>
                </li>
                <?php
                }                           
                ?>
            <?php
                if($access == 2){
                ?>
                <li>
                    <a href="profile.php">
                    <i class="fas fa-clipboard"></i>Go To Account</a>
                </li>
            <?php
                }                           
            ?>

            </ul>
        </nav>
    </div>
</aside>
<!-- ============================================================ MENU CARD end ============================================================ -->

<div class="class="overflow-x-auto">
    <?php include "review.php"; ?>
</div>

</div> <!-- end col -->

<!-- ============================================================ ITEM CATALOG ============================================================ --> 
<div class="col-xl-8">
<?php 
 if(isset($_POST['sub1'])){
    include_once "sfollow.php";
   
}else{
    include_once "itemcat.php";

}
?>
</div>
<!-- ============================================================ MODAL FOR CREATE STORE ============================================================ --> 
<div class="modal fade" id="modalItemView"  name="modalItemView" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <div class="row">
                    <div class="col-xl-4">
                        <img class="" src="include/images/1.png" alt="Card image cap">
                    </div>

                    <div class="col-xl-8">
                        <form action="home.php" method="post" id="editprofile" enctype="multipart/form-data">
                            <!-- Store Name -->
                                <label class="mb-1 mb-3" for="inputStorename">Item Name</label> <br>
                            <!-- Store Description -->
                                <label class="mb-1 mb-3" for="inputStoreDescription">Item Description</label> <br>
                            <!-- Size -->
                            <label class="mb-1 mb-3" for="inputStoreDescription">Size: </label> <br>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">S</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">L</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">XL</label>
                            </div>
                            <br>
                            <!-- Quantity -->
                            <label class="mb-1 mb-3" for="inputEmailAddress">Quantity</label> <br>
                            <input class="border"type="number" min="0" max="100">
                            <br> <br>

                            <!-- Save changes button-->
                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" name="create_submit">Add to Cart</button>  
                        </form>
                    </div>
                </div>

                <hr style=" border: 10px solid gray;">
                <button class="btn float-right" ><i class="fa  fa-thumbs-up fa-2x"></i></button>
                <p>Name</p>
                <p>Item</p>
                <p>Description</p>

                </div>
            </div>
        </div>
    </div>
<!-- ============================================================ CREATE STORE end ============================================================ --> 
<style>
.img1 {
  width: 50px;
  height: 50px;
  border-radius:50px;
  object-fit: contain;
}
</style>

<?php include "footer.php"; ?>