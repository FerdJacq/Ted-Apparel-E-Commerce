<?php  

include "dbconn.php";
// Define variables and initialize with empty values
    $name = $email = $password  = $contact = $address = "";
    $name_err = $email_err = $password_err = $contact_err = $address_err ="";

// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate Full Name        ======================= Mas maganda sana kung magkahiwalay si fname at lname
	$input_name = trim($_POST["name"]);
	if(empty($input_name)){
		$name_err = "Please enter a Full Name";
		header("Location: ../../index.php?error=empty&message=".$name_err."");
		exit();
	} elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
		$name_err = "Please enter a valid Full Name";
		header("Location: ../../index.php?error=empty&message=".$name_err."");
		exit();
	} else{
		$name = $input_name;
	}

// Validate email             ======================= Lalagyan na lng ng validation if existing na si email sa server
	$input_email = trim($_POST["email"]);
	if(empty($input_email)){
		$email_err = "Please enter an email";
		header("Location: ../../index.php?error=empty&message=".$email_err."");
		exit();
	}else{
		$email = $input_email;
	}

// Validate Contact Number   =======================  Validation if sobra or kulang yung number
	$input_contact = trim($_POST["number"]);
	if(empty($input_contact)){
		$contact_err = "Please enter a contact number";  
		header("Location: ../../index.php?error=empty&message=".$contact_err."");   
		exit();
	}else{
		$contact = $input_contact;
	}

// Validate password
	if(empty(trim($_POST["password"]))){
		$password_err = "Please enter your password";   
		header("Location: ../../index.php?error=empty&message=".$password_err."");
		exit();
	} elseif(strlen(trim($_POST["password"])) < 6){
		$password_err = "Password must have atleast 6 characters";
		header("Location: ../../index.php?error=empty&message=".$password_err."");
		exit();
	} else{
		$password = trim($_POST["password"]);
	}


// Validate Address
	if (isset($_POST['add'])) {
		$input_address = trim($_POST["add"]);}
	
	if(empty($input_address)){
		$address_err = "Please enter your address";
		header("Location: ../../index.php?error=empty&message=".$address_err."");
		exit();
	} else{
		$address = $input_address;
	}

	$lvl=2;
// Check input errors before inserting in database
	if(empty($password_err) && empty($name_err) && empty($email_err) && empty($address_err) && empty($contact_err)){
		// Prepare an insert statement
		$sql = "INSERT INTO tblusers (`Username`, `Password`, `Name`, `ContactNumber`, `Address`, `AccLvl`) VALUES (?, ?, ?, ?, ?, ?);";
		
		//tblusers => columns (ID, Username, Password, Name, ContactNumber, Address, AccLvl)
		if($stmt=$conn->prepare($sql)){
			// Bind variables to the prepared statement as parameters
			$stmt->bind_param( "ssssss",$param_email, $param_pass, $param_name, $param_cont, $param_address, $param_lvl);

			//Parameters
			$param_name = $name;
            $param_email = $email;
          	$param_cont = $contact;
			$param_address = $address;
			$param_lvl =$lvl;
            $salt = "test" . $password . "code";
            $hashed = md5($salt);
            $param_pass = $hashed;//create a password hash

			// Attempt to execute the prepared statement
			if($stmt->execute()){
				// Records created successfully. Redirect to landing page
				header("Location: ../../index.php?action=reg_success");
				exit();
			
			} else{
				// Execution fail
				header("Location: ../../index.php?error=exec_err");
				exit();
			}
		
		}
	
	// Close statement
	$stmt->close();
	}
	
// Close connection
$conn->close();

}


?>




















