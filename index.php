<?php
	require "include/process/alert.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>TED Apparel</title>
	<link rel="stylesheet" type="text/css" href="include/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
	</style>
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">
<form action="include/process/signup.php" method="POST">
	<h1>Create Account</h1>

	<input type="text" name="name" placeholder="Full Name">
	<input type="text" name="number" placeholder="Contact Number">
	<input type="text" name="add" placeholder="Address">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">

	<!-- Trigger/Open The Modal -->
<span>By creating an account you agree <br> to our <a href="#" id="myBtn">Terms & Privacy</a></span><br>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
	<button style="background-color: #EA5C2B">SignUp</button>
</form>
</div>
<div class="form-container sign-in-container">
	<div>

	</div>
	<form action = "include/process/signin.php" method = "post">
		<h1>Sign In</h1>
		<span>or use your account</span>
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">
		
	<br>
	
	<button style="background-color: #EA5C2B">Sign In</button><br>	
	<button name = "guest" value="guests" style="background-color: #EA5C2B">Open as guest</button>

	</form>
	<a href = "include/process/functions.php?login=guest"></a>
	<div>
	<!--  start modal -->
	
	<div  id="term" class="modal fade term" tabindex="-1" role="dialog" aria-labelledby="term" aria-hidden="true" id="term">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="mediumModalLabel"> Terms and conditions </h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><b>
						1. Privacy Policy <br>
						2. Limitation of Liability <br>
						3. Pricing and Payment Terms <br>
						4. Third-Party Links <br>
						5. Intellectual Property <br>
						6. User-Generated Contributions <br>
					   </b>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary">Confirm</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal --> 
</div>

</div>


<div class="overlay-container" >
	<div class="overlay">
		<div class="overlay-panel overlay-left" style="background-color: #EA5C2B">
		<div class="text-center">
  			<img src="include/images/tedlogo.png" class="" style="height: 150px; width: 200px;">
		</div>		
		
			<p>To keep connected with us please login with your personal info</p>
			<button class="ghost" id="signIn">Sign In</button>
		</div>
<!--Change 'Hello, Friend' to Logo of T.E.D. and description below-->
		<div class="overlay-panel overlay-right" style="background-color: #EA5C2B">
		
		<div class="text-center">
  			<img src="include/images/tedlogo.png" class="" style="height: 150px; width: 200px;">
		</div>
			
			<p>Enter your details and start journey with us</p>
			<button class="ghost" id="signUp">Sign Up</button>	
		</div>
	</div>
</div>
</div>

<!-- Sliding function  -->
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
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

</body>
</html>








