<?php
    require  "session.php";

    $targetDir = "../../Photos/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    $counts = 3;

    $item_name = $_POST['IName'];
    $item_desc = $_POST['IDescription'];
    $item_type = $_POST['ApparelType'];
    $list_color = " ".$_POST['IColors'].",";
    $item_price = $_POST['PItem'];
    $item_sizes = $_POST['sizes'];
    $str_size=""; 
    foreach($item_sizes as $val){
        $str_size .= $val.",";
    }
    $tableName= "tbl".$id;
    $item_name = str_replace('\'', '', $item_name);
    $item_desc = str_replace('\'', '', $item_desc);
    

    //Selects all the rows within the table name of the store
    $sql = "SELECT * FROM $tableName;";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    $num = $num_rows + 1; 
    $item_ID = $id."000".$num;
    $sql_add = "INSERT INTO `$tableName`(`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES ('$item_ID','$item_name','$item_desc','$item_price', '$list_color', '$str_size' ,'$item_type')";
    $result_add = mysqli_query($conn, $sql_add);

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
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO tblimages (`sID`, `file_name`) VALUES ('$item_ID' ,'$insertValuesSQL')"); 
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                header("Location: ../../store.php?action=item_add&id=".$id."");
                exit();
            
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
                header("Location: ../../store.php?error=exec_err&id=".$id."");
                exit();
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
         
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
    

    ?>

    