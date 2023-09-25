<?php
    include "header.php"; 
	require "include/process/alert.php";
    require "include/process/topstores.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body class="animsition" style="background-color: #35858B">
<div class="page-content">
<!-- ============================================================ TOP ADS ============================================================ --> 
            <div class="container"> <br>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                    
                    <div class="item active">
                        <img src="include/images/ads/banner.jpg" alt="ad1" width="800" height="300">  
                    </div>
                    <!--Second item-->
                    <div class="item">
                        <img src="include/images/ads/banner2.jpg" alt="ad2" width="800" height="300">
                        <div class="carousel-caption">
                        
                        </div>
                    </div>
                    <!--Third item-->
                    <div class="item">
                        <img src="include/images/ads/banner3.jpg" alt="ad3" width="800" height="300">
                        <div class="carousel-caption">
                           
                        </div>
                    </div>
                  </div><!--end of inner-->
                </div><!--end of carousel-->
            </div><!--end of container-->  <br>

<!-- ============================================================ END OF TOP ADS ============================================================ -->

<!-- ============================================================ FIRST SECITON ============================================================ -->
<section> <!-- style="background-color: #0b516a;"--> <br>
            <div class="container">
                <div class="row" style="margin:12px;">
                    <div class="col-lg-4"> 
                        <img style="border-radius:20px;" src="include/images/FSAD.jpg" alt="Flower">
                    </div> <!--end of col-lg-4-->
                    <div class="col-lg-8">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <?php
                            require_once "include/process/topstores.php";

                            $ads1 = $row1['Logo'];
                            $ads2 = $row2['Logo'];
                            $ads3 = $row3['Logo'];
                            $adid1= $row1['Store_ID'];
                            $adid2= $row2['Store_ID'];
                            $adid3= $row3['Store_ID'];
                            $name1 = $row1['Name'];
                            $name2 = $row2['Name'];
                            $name3 = $row3['Name'];

                            ?>
                            <div class="carousel-inner">
                              <div class="carousel-item  item active">
                                <div class="work">
                                    <?php echo '<div class="img d-flex align-items-end justify-content-center" style="background-image: url(Photos/'.$ads1.');">'?>
                                        <div class="text w-100">
                                          <button class="cat">Go to shop now</button>
                                          <?php echo '<h3><a href="store.php?id='.$adid1.'">'.$name1.'</a></h3>';?>
                                        </div>
                                    </div></div>
                              </div>
                              <div class="carousel-item item">
                                  <div class="work">
                                  <?php echo '<div class="img d-flex align-items-end justify-content-center" style="background-image: url(Photos/'.$ads2.');">'?>
                                        <div class="text w-100">
                                        <button class="cat">Go to shop now</button>
                                        <?php echo '<h3><a href="store.php?id='.$adid2.'">'.$name2.'</a></h3>';?>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="carousel-item item">
                                <div class="work">
                                <?php echo '<div class="img d-flex align-items-end justify-content-center" style="background-image: url(Photos/'.$ads3.');">'?>
                                        <div class="text w-100">
                                        <button class="cat">Go to shop now</button>
                                        <?php echo '<h3><a href="store.php?id='.$adid3.'">'.$name3.'</a></h3>';?>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div><!--end of col-lg-8-->
                </div> <!--end of row-->
            </div><!--end of container--> <br> 
    </section> <br>
<!-- ============================================================ END OF FIRST SECITON ============================================================ --> 

<!-- ============================================================ STORE CATALOG ============================================================ -->
<h2 class="title-1 font-weight-bold-italic" style="margin: 15px;">STORES</h2>
<section id=#stores>
    <div class="container">         
            <?php
                    $sql_store = "SELECT * FROM `tblstores` WHERE Status=2;";
                    if($result_store = $conn->query($sql_store)){
                       if($result_store->num_rows > 0){
                           $counter = 3;
                        while($row_store = $result_store->fetch_array()){
                            $store_ID = $row_store['Store_ID'];
                            $slogs = $row_store['Logo'];
                            if($counter == 3){
                                echo ' <div class="row">';
                            }
                            echo '<div class="container1 mt-5 col-lg-4">
                            <img src="Photos/'.$slogs.'" alt="StoreLogos" style = "height:250px;">
                            <a href = "store.php?id='.$store_ID.'"><button class="btn">Shop Now</button></a> </div>';
                            if($counter == 2){
                                echo '</div><br><br>';
                                $counter = 0;
                            }
                            $counter +=1;   
                            
                        }
                 // Free result set
                 $result->free();
                    } 
                } 
                // Close connection
                $conn->close();
            ?>   
        </div>
    </div> <br>
</section>
<!-- ============================================================ END OF STORE CATALOG ============================================================ --> 


</div> <!--end of page content-->

<?php include "footer.php"; ?>

</body>
</html>
<!-- end document-->
