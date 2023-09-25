
        <div class="user-data m-b-30">
            <h3 class="title-3 m-b-30">
            <i class="glyphicon glyphicon-edit"></i>Edit Profile</h3>

            <form class="form-group" style="margin:20px;"action="include/process/updateprofile.php" method="Post" id="editprofile">
            <!-- Full Name-->
                <label class="mb-1 mb-3 form-control-label" for="inputUsername">Full Name</label>
                <input class="form-control mb-3" id="inputLastName" name ="name" type="text" placeholder="<?php echo $name; ?>" >
            <!-- Phone number -->
                <label class="mb-1 mb-3 form-control-label" for="inputEmailAddress">Contact Number</label>
                <input class="form-control mb-3" id="Number" name ="contact" type="tel" placeholder="<?php echo $contact; ?>" >
            <!-- Address -->
                <label class="mb-1 mb-3 form-control-label" for="inputEmailAddress">Address</label>
                <input class="form-control mb-3" id="Address" name ="address"  placeholder="<?php echo $address; ?>" >
            <!-- Address -->
                <label class="mb-1 mb-3 form-control-label" for="inputEmailAddress">Email address</label>
                <input class="form-control mb-3" id="Email" name ="email" type="email" placeholder="<?php echo $email; ?>" >
            <!-- Save changes button-->
                <button class="btn-primary mb-3 mt-2 float-right btn-space" name="update"style="margin-left:10px;" >Save changes</button>
                <button class="btn-primary mb-3 mt-2 float-right btn-space" name="close">Close</button> <br><br>
            </form>
        </div>

<style>
.btn-space {
font-size: 12px;
margin: 10px;
padding: 4px 12px;
border-radius: 4px;
}
</style>