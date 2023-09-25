<?php
require "session.php"; 
$name = $_POST['SName'];
$desc = $_POST['SDescription'];
$contact = $_SESSION['Contact']; //From tblusers
$method = 0;
//1 = COD, 2 = Cashless, 3 = Both
foreach($_POST['payment'] as $value){
    $method += $value;
}

//Removes Apostrophe
$name = str_replace('\'', '', $name);
$desc = str_replace('\'', '', $desc);
$targetDir = "../../Photos/"; 
$allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF'); 
 
$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
$fileNames = array_filter($_FILES['files']['name']); 
$counts = 3;

if(empty($name)){
    $name_err = "Please enter your store name!";
    header("Location: ../../profile.php?error=empty&message=".$name_err."");
    exit();
}
elseif(empty($desc)){
    $desc_err = "Please enter your store description!";
    header("Location: ../../profile.php?error=empty&message=".$desc_err."");
    exit();
}
elseif($method == 0){
    $method_err = "Check atleast one of the method payments!";
    header("Location: ../../profile.php?error=empty&message=".$method_err."");
    exit();
}
else{
    if(count($fileNames) === $counts){
        if(!empty($fileNames)){ 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertValuesSQL .= $fileName.","; 
                    }else{ 
                        $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
             
            // Error message 
            $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
            $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
            $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
            $img_name = $_FILES['logo']['name']; 
            $img_type = $_FILES['logo']['type'];
            $img_tmp_name = $_FILES['logo']['tmp_name'];
            $img_error = $_FILES['logo']['error'];
            $img_size = $_FILES['logo']['size'];

            //image
            $img_extension = pathinfo($img_name , PATHINFO_EXTENSION);
            $img_extension = strtolower($img_extension);

            $allowed_extension = array("jpeg" , "jpg" , "png");

            if($img_error == 0 ){
                if($img_size <= 1000000 ){
                    if(in_array($img_extension , $allowed_extension)){

                    //image
                    $img_new_name = uniqid("IMG-" , true) . '.' . $img_extension;
                    $img_upload_path = '../../Photos/' . $img_new_name;
                    move_uploaded_file($img_tmp_name , $img_upload_path);

                    }else {
                        $error_msg="Wrong file format!";
                        header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                        exit();
                    }
                }else {
                    $error_msg="File size too large for logo!";
                    header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                    exit();
                }
            }else {
                $error_msg="Invalid input for image!";
                header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                exit();
            }
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                $sql = "INSERT INTO `tblstores`(`Store_ID`, `Name`, `Description`, `Contact`, `Payment_Method`, `Logo`, `Samples`, `Status`) VALUES ('$id','$name','$desc','$contact','$method','$img_new_name','$insertValuesSQL','1');";
                $result = mysqli_query($conn, $sql);
            
                if($result){
                    header("Location: ../../profile.php?action=store_req");
                    exit();
                }
                else{
                    $error_msg="Oops! Something went wrong!";
                    header("Location: ../../profile.php?error=empty&message=".$error_msg."");
                    exit();
                }
            }else{ 
                $statusMsg = "Upload failed! ".$errorMsg; 
                header("Location: ../../profile.php?error=empty&message=".$statusMsg."");
             
            } 
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
            header("Location: ../../profile.php?error=empty&message=".$statusMsg."");
        } 
    } 
    
}

$conn->close();
