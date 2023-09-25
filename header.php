<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>TED Apparel</title>

    <!-- Fontfaces CSS-->
    <link href="include/css/font-face.css" rel="stylesheet" media="all">
    <link href="include/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="include/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="include/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="include/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <script src="include/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="include/dselect.js"></script>
    

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="include/css/theme.css" rel="stylesheet" media="all">
    <link href="include/css/profile.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" href="include/images/icon1.ico" width="20" />

    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="include/css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="include/css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="include/css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="include/css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="include/css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="include/css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="include/css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="include/css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="include/css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="include/css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="include/css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="include/css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="include/css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="include/css/style1.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="include/css/responsive.css">
        <!-- Modernizr js -->
        <script src="include/js/modernizr-2.8.3.min.js"></script>
    
<?php
require "include/process/session.php";
require_once "include/process/dbconn.php";


                  //Prepared SQL
                  $sql = "SELECT * FROM tblusers WHERE `ID`='$id';";
                  $result = mysqli_query($conn, $sql);
                  $row= mysqli_fetch_assoc($result);
                  $access = $_SESSION["AccLvl"];

                if(isset($_POST['search'])){
                    $search_key = $_POST['select_box'];
                    if(isset($search_key)){
                        $sql_s = "SELECT * FROM `tblstores` WHERE `Name`='$search_key';";
                        $result_s = mysqli_query($conn, $sql_s);
                        if($result_s){  
                            $row_s = mysqli_fetch_assoc($result_s);
                            $id_val = $row_s['Store_ID'];
                            header("Location: store.php?id=".$id_val."");
                            exit();
                        }
                        else{
                            $err_message = "Oops! Something went wrong.";
                            header("Location: home.php?empty=true&message=".$err_message."");
                            exit();
                        }
                    }
                    else{
                        $err_message = "Choose a store you want to visit!";
                        header("Location: home.php?empty=true&message=".$err_message."");
                        exit();
                    }
                }
?>
<!-- ============================================================= DESKTOP // HEADER START ============================================================ -->
        <header class="header-desktop3 d-none d-lg-block" style="background-color: #EA5C2B;">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="home.php"  alt="Ted Apparel" style="width:150px;"> 
                            <img src="include/images/toplogo.png" href="home.php" class="img-fluid" width="80">
                        </a>
                    </div>

                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <?php
                            if($access == 0){
                            ?>
                            <li>
                                <a href="Admin/dashboard.php">
                                    <i class="fas fa-home"></i>Dashboard
                                    <span class="bot-line"></span></a>
                            </li>
                            <?php
                            }
                            ?>
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-home"></i>Home Page
                                    <span class="bot-line "></span></a>
                            </li>
                            <?php
                            if($access == 2){
                            ?>
                            <li>
                                <a href="shopcart.php">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="bot-line"></span> Shopping Cart</a>
                            </li>      
                            <?php
                            }
                            if($access == 1){
                            ?>
                            <li>
                                <a href="store.php?id=<?php echo $id;?>">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="bot-line"></span> My Store </a>
                            </li>      
                            <?php
                            }
                            if($access != 3){
                            ?>
                            <li class="has-sub">
                                <a href="profile.php">
                                    <i class="fas fa-user"></i>Profile
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="include/process/logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                                   <div class="header__tool">
                    <div class="account-wrap mb-2">
                                <?php
                                    $query = " SELECT * FROM tblstores WHERE `Status`=2;";
                                    $result = $conn->query($query);
                                ?>
                        <form action="" method="post" class="au-form-icon--sm inline-block">
                            <div class="">
                            <ul class="content list-unstyled">
                                <li class="d-inline-flex mx-auto float-right">
                                    <select name="select_box" class="" id="select_box" style="padding: 1rem;">
                                        <option value="">Click to Search Store
                                        </option>
                                        <?php 
                                        foreach($result as $row_search)
                                        {
                                            echo '<option value="'.$row_search["Name"].'">'.$row_search["Name"].'</option>';
                                        }
                                        ?>  
                                    </select> &nbsp;
                                    <button type="submit" name="search" class="btn-light rounded border">
                                        <i class="zmdi zmdi-search p-1"></i>
                                    </button>
                                </li>
                            </ul>
                        </form>                   
                    </div>
                    </div>
    </div>
</header>
                        
                            <script>

                                var select_box_element = document.querySelector('#select_box');

                                dselect(select_box_element, {
                                    search: true
                                });

                             </script>
<!-- ============================================================ DESKTOP // HEADER END ============================================================ -->


<!-- ============================================================ MOBILE // HEADER START ============================================================ -->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="topnav">
        <a href="home.php"  alt="Ted Apparel" style="width:150px;"> 
            <img src="include/images/toplogo.png" href="home.php" class="img-fluid" width="50">
        </a>
    <div id="myLinks">
    <ul class="list-unstyled">
            <?php
            if($access == 0){
            ?>
            <li>
                <a href="Admin/dashboard.php">
                    <i class="fas fa-home"></i>Dashboard
                    <span class="bot-line"></span></a>
            </li>
            <?php
            }
            ?>
            <li>
                <a href="home.php">
                    <i class="fas fa-home"></i>Home Page
                    <span class="bot-line "></span></a>
            </li>
            <?php
            if($access == 2){
            ?>
            <li>
                <a href="shopcart.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bot-line"></span> Shopping Cart</a>
            </li>      
            <?php
            }
            if($access == 1){
            ?>
            <li>
                <a href="store.php?id=<?php echo $id;?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="bot-line"></span> My Store </a>
            </li>      
            <?php
            }
            ?>
            <li class="has-sub">
                <a href="profile.php">
                    <i class="fas fa-user"></i>Profile
                    <span class="bot-line"></span>
                </a>
                <ul class="header3-sub-list list-unstyled">
                    <li>
                        <a href="include/process/logout.php">Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
        <i class="fa fa-bars"></i>
    </a>
    </div>
</div>
    </nav>
</header>
<!-- ============================================================ MOBILE // HEADER END ============================================================ --> 
<script>
function myFunction1() {
  var x = document.getElementById("myLinks");
  if (x.style.display == "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
