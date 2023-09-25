<?php
	require "include/process/alert.php";
?>

<head>
<?php include "header.php"; ?>
<link href="include/css/store.css" rel="stylesheet" media="all">
</head>

<body class="animsition" style="background-color: #35858B">
<div class="page-content"> <br><br>

<!-- ============================================================ USER PROFILE CARD ============================================================ -->
<?php
$name = $row['Name'];
$contact = $row['ContactNumber'];
$address = $row['Address'];
$email = $row['Username'];

$sql = "SELECT * FROM tblstores WHERE `Store_ID`= $id;";
$result_new = mysqli_query($conn, $sql);
?>
<section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <?php
                                if(isset($_SESSION['ID'])){
                                $id=$_SESSION['ID'];
                                $sql = "SELECT * FROM `tblusers` WHERE `ID`='$id';";
                                $result = mysqli_query($conn , $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                    $image = $row['Pic'];
                                    if(empty($image)){
                                        echo '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" style="width:100px;" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">';
                                    }else{
                                        echo '<img src="Photos/'.$image.'"style="width:100px;" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">';
                                    }
                                    }
                                }
                            }
                            ?>
                            <div class="w-100 ms-3 p-3 d-flex align-self-center">
                                <h3 class="mt-3"> <?php echo trimname($name); ?> </h3>
                            </div>
                        </div>                       
                        <button class="btn" onclick="openForm()">Change Profile </button>
                        <div class="mt-3">
                        <form method="post">
                            <?php
                             
                                $fsql = "SELECT * FROM tblfollow WHERE UserID = '$id';";
                                $fresult = mysqli_query($conn , $fsql);
                                $fresultcheck = mysqli_num_rows($fresult);
                            ?>
                            
                             <button class="text-muted mb-2 font-13" type="submit" name="sub2" ><strong><?php  echo $fresultcheck;?></strong> Following</button>
                         </form> 
                            <!-- ============================================================ PROFILE DETAILS ============================================================ -->
                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2"><?php echo $name; ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Contact Number :</strong><span class="ms-2"><?php echo $contact; ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Address :</strong><span class="ms-2"><?php echo $address; ?></span></p>
                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"><?php echo $email; ?></span></p>
                            <!-- ============================================================ PROFILE DETAILS end ============================================================ -->
                        </div>     
                    </div>                                 
                </div> <!-- end card -->
<!-- ============================================================ USER PROFILE CARD end ============================================================ -->

<!-- ============================================================ MENU CARD ============================================================ -->
<aside class="menu-sidebar3 js-spe-sidebar">
    <div class="card">
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
                <?php
                if($access == 2 || $result_new==false){
                ?>
                    <li>
                        <a href="#terms" id="terms" data-toggle="modal" data-target="#mediumModal">
                        <i class="fas fa-clipboard"></i>Create Store</a>
                    </li>
                <?php
                }
                    if($access == 1){   
                ?>
                    <li>
                        <a href="store.php?id=<?php echo $id;?>">
                        <i class="fas fa-clipboard"></i>Go To Store</a>
                    </li>
                <?php
                    }
                ?>
                    <li>
                       
                        <a >
                        <form action="Profile.php"method="Post">
                        <i class="fas fa-edit"></i><button type="submit" class="ml-4" style="color:gray" name="sub1">Edit Profile</button>
                        </form>
                        </a>
                        
                    </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- ============================================================ MENU CARD end ============================================================ -->

</div> <!-- end of col-lg-4 -->


<!-- ============================================================ COL-LG-8 ============================================================ -->
        <div class="col-xl-8">

        <?php 
        
        if(isset($_POST['sub1'])){
            include "edit.php";
           
        }else if(isset($_POST['sub2'])){
            include "follow.php";
       
        }else{
            if($access != 0){
                include "notif.php"; 
                include "history.php"; 
            }
        }
         ?>
        </div> 
<!-- ============================================================ COL-LG-8 end============================================================ --> 

    </div><!-- end row-->
    </div><!-- end container-->
</section>

        <!-- ============================================================ MODAL FOR CREATE STORE ============================================================ --> 
                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
            <!-- change process -->
                                    <form action="include/process/createstore.php" method="post" id="editprofile" enctype="multipart/form-data">
                                        <!-- Store Name -->
                                            <label class="mb-1 mb-3" for="inputStorename">Store Name</label>
                                            <input class="form-control groove mb-3" id="Storename" name ="SName" type="text" placeholder="Enter store name here" required>
                                        <!-- Store Description -->
                                            <label class="mb-1 mb-3" for="inputStoreDescription">Store Description</label>
                                            <textarea class="form-control groove mb-3" name ="SDescription" id="StoreDescription" rows="6" placeholder="Enter store description here" required></textarea>
                                        <!-- Store Logo -->
                                            <label class="mb-1 mb-3" for="inputEmailAddress">Store Logo</label>
                                            <input type="file" id="file-input" name="logo" class="form-control-file" required> <br>
                                        <!-- Payment Method -->
                                             <label class="mb-1" for="inputPayment Method">Payment Method</label><br>
                                                <label for="inline-checkbox1" class="form-check-label d-inline-flex" >
                                                <input type="checkbox" name="payment[]" value="1" style="width:20px; margin-right:10px;"> &nbsp; COD
                                                </label> &nbsp; &nbsp;
                                                <label for="inline-checkbox2" class="form-check-label d-inline-flex">
                                                <input type="checkbox" name="payment[]" value="2" style="width:20px; margin-right:10px;"> &nbsp; Cashless
                                                </label> <br>
                                        <!-- Sample Photos -->
                                            <label class="mb-1 mb-3" for="inputEmailAddress">Product Sample Photos</label>
                                            <input type="file" id="file-input" name="files[]" multiple class="form-control-file" required> <br>
                                        <!-- Save changes button-->
                                            <button class="btn1 btn-primary float-right" name="create_submit" style="margin-left:5px;">Confirm</button>  
                                            <button class="btn1 btn-secondary float-right" data-dismiss="modal">Cancel</button>
                                           
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- ============================================================ END OF MODAL FOR CREATE STORE ============================================================ --> 

        <!-- ============================================================ CHANGE PROFILE POPUP ============================================================ --> 
        <div class="form-popup" id="add">
            <form action="include/process/profilepic.php" method = "post" class="form-container" enctype="multipart/form-data">
                    <!-- Profile Photo -->
                        <label class="mb-1 mb-3" for="inputEmailAddress">Change Photo</label>
                        <input type="file" id="profileImage" name="profileImage" class="form-control-file"> <br>
                <button type="submit" name="save" class="btn1 btn-primary center mb-2" >Save</button>
                <button type="button" class="btn1 btn-danger center" onclick="closeForm()">Close</button>
            </form>
        </div>
        <!-- ============================================================ CHANGE PROFILE POPUP end ============================================================ --> 

        <!-- ============================================================ FOLLOWING MODAL ============================================================ -->
                                            
                            
        <div class="modal fade" id="modalfollow" tabindex="-1" role="dialog" aria-labelledby="modalfollowLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Following</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php echo '<td><img class="img1 m-3" src="Photos/'.$ufpic.'" alt="profile pic"></img></td>';     
                          echo '<td>'.$ufname.'</td>' ;?>
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================ FOLLOWING MODAL end ============================================================ -->


</div> <!--end of page content-->

<?php include "footer.php"; ?>

<script>
function openForm() {
  document.getElementById("add").style.display = "block";
}
function closeForm() {
  document.getElementById("add").style.display = "none";
}
</script>

<style>
/* The popup form - hidden by default */
.form-popup {
	display: none;
	position: fixed;
    left:125;
	bottom: 20;
	border: 3px solid #f1f1f1;
	z-index: 9;
  }
  
  /* Add styles to the form container */
  .form-container {
	max-width: 700px;
	padding: 10px;
	background-color: white;
  }
  
  /* Set a style for the submit/login button */
  .form-container .btn {
	background-color: #04AA6D;
	color: white;
	padding: 8px 12px;
	border: none;
	cursor: pointer;
	width: 100%;
	margin-bottom:10px;
	opacity: 0.8;
  }
  
  /* Add a red background color to the cancel button */
  .form-container .cancel {
	background-color: red;
  }
  
  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
	opacity: 1;
  }

  .img1 {
  width: 50px;
  height: 50px;
  border-radius:50px;
  object-fit: contain;
}
</style>