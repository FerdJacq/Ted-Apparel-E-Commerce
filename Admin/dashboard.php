<?php
    require "admin_header.php";
    require "../include/process/functions.php";
    require_once "../include/process/dbconn.php";
    $name = $_SESSION['Name'];
    $email =$_SESSION['Username'];
    //$result = getData('tblstores');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <div class="page-wrapper" style="background-color: #023047;" >
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logoted.png" alt="Ted Apparel" />
                        </a>
                            
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="chart.php">
                                <i class="fas fa-chart-bar"></i>Store Requests</a>
                        </li>
                        <li>
                            <a href="table.php">
                                <i class="fas fa-table"></i>Accounts</a>
                        </li>
                        <li>
                            <a href="form.php">
                                <i class="far fa-check-square"></i>Overview</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block " style="background-color: #0b516a;" >
            <div class="logo" style="background-color: #fb8500;">
                <a href="#">
                    <img src="images/icon/logoted.png" alt="Ted Apparel" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php" style="Color:white;">
                                <i class="fas fa-chart-bar" style="Color:white;"></i>Store Requests</a>
                        </li>
                        <li>
                            <a href="accs.php" style="Color:white;">
                                <i class="fas fa-table" style="Color:white;"></i>Accounts</a>
                        </li>
                        <li>
                            <a href="../home.php" style="Color:white;">
                                <i class="far fa-check-square" style="Color:white;"></i>Overview</a>
                        </li> 
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop " style="background-color: #fb8500;">
                <div class="section__content section__content--p30 " >
                    <div class="container-fluid">
                        <div class="header-wrap d-flex justify-content-end">
                            
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" style="Color:white;" href="#"><?php echo $name; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $name; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $email; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../include/process/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" style="background-color: #023047;">
                <div class="section__content section__content--p30" >
                    <div class="container-fluid">
                        
                        <div class="row d-flex justify-content-center" >
                            <div class="col-lg-15 ">
                                <h2 class="title-1 m-b-25 d-flex justify-content-center" style="Color:white;">Store Requests</h2>
                                <div class="table-responsive table--no-card m-b-40"  >
                                <?php
                                             $sql = "SELECT * FROM `tblstores` WHERE Status= 1";
                                             if($result = $conn->query($sql)){
                                                if($result->num_rows > 0){
                                
                                              echo '<table class="table table-borderless table-striped table-earning"  >';
                                              echo '<thead>';
                                              echo '<tr>';
                                              echo '<th style="background-color: #0b516a;">date</th>';
                                              echo '<th style="background-color: #0b516a;">Client/Store Owner</th>';
                                              echo '<th style="background-color: #0b516a;"></th>';
                                              echo '</tr>';
                                              echo '</thead>';
                                              echo '<tbody>';
                                              while($row = $result->fetch_array()){
                                             $img_logo = $row['Logo'];
                                             $img_samples=$row['Samples'];
                                              $sname = $row['Name'];
                                              $sdate = $row['Date'];
                                              $s_id = $row['Store_ID'];

                                              $str = " ".$img_samples.",";
                                              //echo $str."<br>";
                                              $prev =1;
                                              $images = array($img_logo);
                                              $num = substr_count($str, ",");
                                              for ($i =0; $i < $num; $i++){
                                              $pos = strpos($str, ",", $i + $prev);
                                              $end =  $pos + $prev;
                                              $trim = substr($str, $prev, $end);
                                              $strtrim = trim($trim);
                                              $strval = strstr($strtrim, ',', true); 
                                              array_push($images, $strval);
                                              $prev = $pos+1;
                                    }
                                              echo '<tr>';
                                              echo '<td>'.$sdate.'</td>';
                                              echo '<td>'.$sname.'</td>';
                                              echo '<td><a href = "../include/process/functions.php?modal='.$s_id.'"><button type="button" class="btn" style="background-color:#0b516a; color:white;">DETAILS</button></a>';
                                              echo '<a href = "../include/process/functions.php?confirm='.$s_id.'"><button class="btn"style="background-color:#029810; id="accept"; color:white;">ACCEPT</button></a> ';
                                              echo '<a href = "../include/process/functions.php?reject='.$s_id.'"><button class="btn"style="background-color:#e00000; id="deny"; color:white;" >DENY</button></a></td>';
                                              echo '</tr>';
                                              }
                                          
                                              echo'</tbody>';
                                              echo '</table> ';
                                          // Free result set
                                          $result->free();
                                        } else{
                                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                        }
                                      } else{
                                        echo "Oops! Something went wrong. Please try again later.";
                                    }
                                    
                                    
                                    // Close connection
                                    $conn->close();
                                  ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    
    
<!-- Modal: modalQuickView -->
<?php
require_once "../include/process/dbconn.php";

?>

<!-- Modal: modalQuickView -->
<div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
              data-ride="carousel">
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block w-100"
                    src="../Photos/<?php echo $images[0];?>"
                    alt="First slide" style="width:400px; height:450px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"
                    src="../Photos/<?php echo $images[1];?>"
                    alt="Second slide" style="width:400px; height:450px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"
                    src="../Photos/<?php echo $images[2];?>"
                    alt="Third slide" style="width:400px; height:450px;">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"
                    src="../Photos/<?php echo $images[3];?>"
                    alt="Fourth slide" style="width:400px; height:450px;">
                </div>
              </div>
              <!--/.Slides-->
              <!--Controls-->
            
              <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Controls-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).webp" width="60">
                </li>
                <li data-target="#carousel-thumb" data-slide-to="1">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).webp" width="60">
                </li>
                <li data-target="#carousel-thumb" data-slide-to="2">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).webp" width="60">
                </li>
              </ol>
            </div>
            <!--/.Carousel Wrapper-->
          </div>
          <div class="col-lg-7">
            <h2 class="h2-responsive product-name">
              <strong><?php echo $_GET['modalName'];?></strong>
            </h2>
            <br>
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne1">
                  <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                    aria-controls="collapseOne1">
                    <h5 class="mb-0">
                      Store Description <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                  data-parent="#accordionEx">
                  <div class="card-body">
                   <?php
                   echo $_GET['modalDesc'];
                   ?>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                    aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      Contact Information <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                  data-parent="#accordionEx">
                  <div class="card-body">
                  <?php
                   echo $_GET['modalCon'];
                   ?>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingThree3">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                    aria-expanded="false" aria-controls="collapseThree3">
                    <h5 class="mb-0">
                      Payment Method<i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <?php
                    $method_num = $_GET['modalPay'];
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
                    echo $payment;
                    ?>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->
            </div>
            <!-- Accordion wrapper -->
              <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Modal: modalQuickView  END-->

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->

    <script>// Material Select Initialization
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });</script>

    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <!--JS for modal toggle using GET-->
    <script>
      $(document).ready(function() {

      if(window.location.href.indexOf('#modalQuickView') != -1) {
        $('#modalQuickView').modal('show');
      }

      });

    </script>
</body>

</html>
<!-- end document-->
