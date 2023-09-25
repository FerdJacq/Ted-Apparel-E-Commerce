
<div id="message"class="message-container center">
    <div class="card justify-content-center">
        <h3 style="margin:10px;" ><strong>Reviews</strong></h3>
        <?php
            $tblname= "tbl".$store_id;
            $counter =0;
            $sql_check = "SELECT * FROM $tblname";
            $result_check =  mysqli_query($conn, $sql_check);
            while($row_check = $result_check->fetch_array()){
                $sql = "SELECT * FROM tblreview WHERE Status =1;";
                $result = mysqli_query($conn, $sql);
                while($row = $result -> fetch_array()){
                    if($row_check['Product_ID'] == $row['Product_ID']){
                        echo '<div class="comment-author-infos pt-25" style="margin:10px;">
                        <p>'.$row['Name'].'</p>  <button class="float-right"></button> 
                        <p>'.$row['Review'].'</p>  
                        </div>';
                        $counter++;
                    }
                }
            }
            if($counter == 0){
                echo "No pinned comments";
            }
            
            ?>
    </div>
</div>
