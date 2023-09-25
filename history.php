
        <?php
        if($access == 2){
            $phsql = "SELECT * FROM `tblpurchases` WHERE `Status`= 1 AND `User_ID`=$id ORDER by `Date` DESC";
        if($phresult = $conn->query($phsql)){
            if($phresult->num_rows > 0){
                                
            echo '<div class="user-data m-b-30">
            <h3 class="title-3 m-b-30">
            <i class="glyphicon glyphicon-eye-open"></i>Purchase History</h3>
        <div class="table-responsive table-data"><table class="table">
                      <thead style="background-color:white;">
                    <tr>
                        <td>Date</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Store</td>
                        
                    </tr>
                </thead>
            <tbody>';
                 while($phrow = $phresult->fetch_array()){
                                             
                    $phdate = $phrow['Date'];
                    $phqua = $phrow['Quantity'];
                    $phprice = $phrow['Total'];

                    $phstore = $phrow['Product_ID'];
                    $phname = $phrow['Store_ID'];

                    $tblname = "tbl".$phname;
                    $phssql = "SELECT * FROM `$tblname` WHERE Product_ID='$phstore'";
                    if($phsresult = $conn->query($phssql)){
                        if($phsresult->num_rows > 0){
                            while($phsrow = $phsresult->fetch_array()){
                                                    
                                $phsstore = $phsrow['Name'];
                                $phssql = "SELECT * FROM `tblstores` WHERE Store_ID='$phname'";
                                if($phssresult = $conn->query($phssql)){
                                    if($phssresult->num_rows > 0){
                                        while($phssrow = $phssresult->fetch_array()){
                                                    
                                       $phsssname = $phssrow['Name'];

                            echo '<tr>';
                            echo '        <td>';
                            echo '           <div class="table-data__info">';
                            echo '                <h6>'.$phdate.'</h6>';
                            echo '            </div>';
                            echo '        </td>';
                            echo '        <td>';
                            echo '           <div class="table-data__info">';
                            echo '               <h6>'.$phsstore.'</h6>';
                            echo '           </div>';
                            echo '       </td>';
                            echo '       <td>';
                            echo '           <div class="table-data__info">';
                            echo '               <h6>'.$phqua.'</h6>';
                            echo '           </div>';
                            echo '      </td>';
                            echo '      <td>';
                            echo '         <div class="table-data__info">';
                            echo '             <h6>'.$phprice.'</h6>';
                            echo '          </div>';
                            echo '       </td>';
                            echo '       <td>';
                            echo '          <div class="table-data__info">';
                            echo '              <h6>'.$phsssname.'</h6>';
                            echo '          </div>';
                            echo '      </td>';
                            echo '  </tr>';
                            
                            }
                        }
                    }
                            }
                        }
                    }
                  
                }
            }else{
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';}
        }else{
            echo "Oops! Something went wrong. Please try again later."; }    
        }
        if($access == 1){
            $sql1 = "SELECT * FROM tblnotif WHERE Status = 0 AND Store_ID= $id";
            $result1 = mysqli_query($conn, $sql1);
                                 
            echo '<div class="user-data m-b-30">
            <h3 class="title-3 m-b-30">
            <i class="glyphicon glyphicon-eye-open"></i>Pending Orders</h3>
        <div class="table-responsive table-data"><table class="table">
                      <thead style="background-color:white;">
                    <tr>
                        <td>Purchase Order</td>
                        <td>Date</td>
                        <td>Item</td>
                        <td>Quantity</td>
                        <td>Color</td>
                        <td>Size</td>
                        <td>Total</td>
                        <td>   </td>
                    </tr>
                </thead>
            <tbody>';
            while($row1 = mysqli_fetch_assoc($result1)){
                $PO = $row1['PurchaseOrder'];
            $phsql = "SELECT * FROM `tblpurchases` WHERE `Status`= 1 AND `PurchaseOrder`=$PO ORDER by `Date` DESC";
            if($phresult = $conn->query($phsql)){
            if($phresult->num_rows > 0){
           
                 while($phrow = $phresult->fetch_array()){
                                             
                    $phdate = $phrow['Date'];
                    $phqua = $phrow['Quantity'];
                    $phprice = $phrow['Total'];
                    $phPO = $phrow['PurchaseOrder'];
                    $phcolor = $phrow['Color'];
                    $phsize = $phrow['Size'];
                    $phstore = $phrow['Product_ID'];
                    $phname = $phrow['Store_ID'];

                    $tblname = "tbl".$phname;
                    $phssql = "SELECT * FROM `$tblname` WHERE Product_ID='$phstore'";
                    if($phsresult = $conn->query($phssql)){
                        if($phsresult->num_rows > 0){
                            while($phsrow = $phsresult->fetch_array()){
                                                    
                                $phsstore = $phsrow['Name'];
                            echo '<tr>';
                            echo '        <td>';
                            echo '           <div class="table-data__info">';
                            echo '                <h6>'.$phPO.'</h6>';
                            echo '            </div>';
                            echo '        </td>';
                            echo '        <td>';
                            echo '           <div class="table-data__info">';
                            echo '                <h6>'.$phdate.'</h6>';
                            echo '            </div>';
                            echo '        </td>';
                            echo '        <td>';
                            echo '           <div class="table-data__info">';
                            echo '               <h6>'.$phsstore.'</h6>';
                            echo '           </div>';
                            echo '       </td>';
                            echo '       <td>';
                            echo '           <div class="table-data__info">';
                            echo '               <h6>'.$phqua.'</h6>';
                            echo '           </div>';
                            echo '      </td>';
                            echo '      <td>';
                            echo '         <div class="table-data__info">';
                            echo '             <h6>'.$phcolor.'</h6>';
                            echo '          </div>';
                            echo '       </td>';    
                            echo '          <td>';
                            echo '         <div class="table-data__info">';
                            echo '             <h6>'.$phsize.'</h6>';
                            echo '          </div>';
                            echo '       </td>';
                            echo '          <td>';
                            echo '         <div class="table-data__info">';
                            echo '             <h6>'.$phprice.'</h6>';
                            echo '          </div>';
                            echo '       </td>';
                            echo '       <td>';
                            echo '          <div class="table-data__info">';
                            echo '              <h6><a href = "include/process/functions.php?order=accept&PO='.$phPO.'"><button class="btn1 btn-primary m-3">Accept</button></a>
                                                <a href = "include/process/functions.php?order=reject&PO='.$phPO.'"><button class="btn1 btn-danger m-3">Cancel</button></h6></a>';
                            echo '          </div>';
                            echo '      </td>';
                            echo '  </tr>';
                            
                           
                            }
                        }
                    }
                  
                }
            }else{
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';}
        }else{
            echo "Oops! Something went wrong. Please try again later."; }                    

            }  
        }
        
    ?>
   </tbody>
</table>
                                          
    </div>
</div>

