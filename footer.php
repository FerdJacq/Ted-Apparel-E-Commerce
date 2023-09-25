   
<!-- ============================================================ FOOTER ============================================================ --> 
<section class="p-t-60 p-b-20" style="background-color: #EA5C2B;">
            <footer id="footer">
                <div class="footer-top">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-3">
                        <br><img src="include/images/toplogo.png" href="home.php" class="img-fluid" width="170">
                      </div>
                      <div class="col-lg-3">
                        <div class="footer-info">
                        <h3><strong>TED APPAREL</strong></h3>
                          <p  style="color: black;">
                            A108 Adam Street <br>
                            NY 535022, USA<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                          </p>
                        </div>
                      </div>
            
                      <div class="col-lg-3 footer-info">
                       <h3><strong>Our Services</strong></h3>
                        <ul class="text-dark content list-unstyled">
                          <h4>
                          <li><i class="bx bx-chevron-right"></i> <a href="home.php">Homepage</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="home.php">Shops</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="shopcart.php ">Shopping Cart</a></li>
                        </h4>
                        </ul>
                      </div>
                      
                    </div>
                  </div>
                </div>
            </footer>
        </section>
  <script type="text/javascript">
    $('button.enableButton').live('click', function(e) {
        e.preventDefault();
        $button = $(this);
        if($button.hasClass('enabled_button')) {    //if button is already Enabled, Disable it
            // add your ajax code here
            $button.removeClass('enabled_button');
            $button.removeClass('disable');
            $button.text('Enable');
        }
        else {                        //if button is disabled, make it Enabled
            // add your ajax code here
            $button.addClass('enabled_button');
            $button.text('Enabled');
        }
    });
    $('button.enableButton').hover(function() {        //on button hover, show Disable class
        $button = $(this);
        if($button.hasClass('enabled_button')) {
            $button.addClass('disable');
            $button.text('Disable');
        }
    }, function() {                        //when not hovered, show Enabled
        if($button.hasClass('enabled_button')) {
            $button.removeClass('disable');
            $button.text('Enabled');
        }
    });
</script>
<!-- ============================================================ END OF CARD FOOTER ============================================================ --> 

   <!-- Jquery JS-->
   <script src="include/vendor/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <!-- Bootstrap JS-->
    <script src="include/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="include/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="include/vendor/slick/slick.min.js"></script>
    <script src="include/vendor/wow/wow.min.js"></script>
    <script src="include/vendor/animsition/animsition.min.js"></script>
    <script src="include/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="include/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="include/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="include/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="include/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="include/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="include/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="include/js/main.js"></script>
    
    <!-- OWL SCRIPT/CSS -->
    <script src="include/js1/jquery.min.js"></script>
    <script src="include/js1/popper.js"></script>
    <script src="include/js1/bootstrap.min.js"></script>
    <script src="include/js1/owl.carousel.min.js"></script>
    <script src="include/js1/main.js"></script>
    
    <link rel="stylesheet" href="include/css/owl.carousel.css">
	<link rel="stylesheet" href="include/css/owl.carousel.style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    	 <!-- SCRIPT --> 
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <!-- jQuery-V1.12.4 -->
     <script src="include/js/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="include/js/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="include/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="include/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="include/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="include/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="include/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="include/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="include/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="include/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="include/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="include/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="include/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="include/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="include/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="include/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="include/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="include/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="include/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="include/js/main1.js"></script>
        
        