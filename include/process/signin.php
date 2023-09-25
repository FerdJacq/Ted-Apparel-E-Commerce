<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../../home.php");
    exit;
}



 
// Include config file
require_once "dbconn.php";
 
// Define variables and initialize with empty values
$user = $password = "";
$user = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if($_POST['guest'] == "guest"){
        session_start();

        $ID = "a";
        $name = "Guest";

        $_SESSION['ID'] = 0;
        $_SESSION["loggedin"] = true;
        $_SESSION["AccLvl"]= 3;

        header("Location: ../../home.php");
        exit();
    }

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $user_err = "Please enter your Email";
        header("Location: ../../index.php?error=empty&message=".$user_err."");
        exit();
    } else{
        $user = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password";
        header("Location: ../../index.php?error=empty&message=".$password_err."");
        exit();

    } else{
        $password = trim($_POST["password"]);
        $salt = "test" . $password . "code";
        $hashed = md5($salt);
       
    }
   
    // Validate credentials
    if(empty($user_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT `ID`, `Username`, `Password`, `Name`, `ContactNumber`,`AccLvl` FROM tblusers WHERE Username = ?";
        
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_user);
            
            // Set parameters
            $param_user = $user;
          
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $user, $hashed_password, $Name, $ContactNum , $Acc);
                    
                    if($stmt->fetch()){
                        if($hashed == $hashed_password){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["ID"] = $id;
                            $_SESSION["Username"] = $user;  
                            $_SESSION["Contact"] = $ContactNum;
                            $_SESSION["Name"] = $Name; 
                            $_SESSION["AccLvl"]=$Acc;
                            
                            if($Acc < 1){
                                header("location: ../../Admin/dashboard.php?action=in_success&name=".$Name."");
                                exit();
                            }else if($Acc > 0){
                                header("location: ../../home.php?action=in_success&name=".$Name."");
                            exit();
                            }
                            else{
                            // Password is not valid, display a generic error message
                            header ("Location: ../../index.php?error=login_err");
                            exit();
                            }
                            
                        } else{
                            // Password is not valid, display a generic error message
                            header ("Location: ../../index.php?error=login_err");
                            exit();
                        }
                    }
                } else{
                    // User doesn't exist, display a generic error message
                    header ("Location: ../../index.php?error=login_err");
                    exit();
                }
            } else{
                header ("Location: ../../index.php?error=exec_err");
                exit();
            }

            // Close statement
            $stmt->close();
        }
    }
  
    // Close connection
    $conn->close();
}

?>