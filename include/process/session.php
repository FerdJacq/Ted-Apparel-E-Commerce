<?php 
                require_once "dbconn.php";
                session_start();
                //session
                if(!isset($_SESSION["loggedin"])){
                  header("Location:index.php?error=ses_err");
                  exit();
                }
                else {
                  $id=$_SESSION['ID'];
                }
 ?>