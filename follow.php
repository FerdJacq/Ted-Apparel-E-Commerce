<div class="card">
  <div class="user-data">
    <h3 class="title-3">
    <i class="glyphicon glyphicon-user"></i>Following</h3>
  </div>
<?php

      $fsql = "SELECT * FROM tblfollow WHERE UserID = '$id';";
      $fresult = mysqli_query($conn , $fsql);
      $fresultcheck = mysqli_num_rows($fresult);
      if($fresultcheck > 0){
                echo '<table class="table-responsive">
                <tbody>';

          while($frow = mysqli_fetch_assoc($fresult)){
            $fol = $frow['Store_ID'];
                $usql ="SELECT * FROM tblstores WHERE Store_ID ='$fol';";
                $uresult = mysqli_query($conn , $usql);
                $uresultcheck = mysqli_num_rows($uresult);
                if($uresultcheck > 0){
                    while($urow = mysqli_fetch_assoc($uresult)){
                
                    $ufname = $urow['Name'];
                    $ufpic = $urow['Logo'];
                    echo 
                    '<tr>
                      <td class="m-5"><img class="img1 m-3" src="Photos/'.$ufpic.'" alt="profile pic"></img></td>
                      <td class="m-5">'.$ufname.'</td>
                    </t>';
                    
                    }
                  } 
            }
            }else{
              echo '<div class="alert alert-danger"><em>No records were found.</em></div>';}
        

?>
</tbody>
</table>
</div>