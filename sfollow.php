<div class="card">
  <div class="user-data">
      <h3 class="title-3">
      <i class="glyphicon glyphicon-user"></i>Followers</h3>
  </div>

<?php

$fsql = "SELECT * FROM `tblfollow` WHERE `Store_ID` = '$store_id';";
$fresult = mysqli_query($conn , $fsql);
$fresultcheck = mysqli_num_rows($fresult);
      if($fresultcheck > 0){
            

                echo '<table class="table-responsive">';
                echo '<tbody>';

        while($frow = mysqli_fetch_assoc($fresult)){
            $fol = $frow['Store_ID'];
                $usql ="SELECT * FROM tblusers WHERE ID ='$id';";
                $uresult = mysqli_query($conn , $usql);
                $uresultcheck = mysqli_num_rows($uresult);
                if($uresultcheck > 0){
                    while($urow = mysqli_fetch_assoc($uresult)){
                    $ufname = $urow['Name'];
                    $ufpic = $urow['Pic'];
                    echo 
                    '<tr>
                    <td><img class="img1 m-3" src="Photos/'.$ufpic.'" alt="profile pic"></img></td>
                    <td>'.$ufname.'</td>
                    </tr>';
                    
                    }
                  } 
            }
            }else{
              echo '<div class="alert alert-danger"><em>No records were found.</em></div>';}
        

?>
</tbody>
</table>
</div>
</div></div>

