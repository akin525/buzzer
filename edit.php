<?php  include "sidebar.php";
$query="SELECT * FROM  users WHERE username='" . $_SESSION['email'] . "'";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
    $username=$row["username"];
    $name=$row["name"];
    $date=$row["date"];
    $email=$row["email"];
    $phone=$row["phone"];
//    $address=$row["address"];
//    $cphoto=$row["photo"];
}
?>
<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(1).css">

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(2).css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/font-awesome.min.css">
<link href="Buy Data _ MobileNig_files/icon" rel="stylesheet">

<div style="padding:90px 15px 20px 15px">
    <!--    <h4 class="align-content-center text-center">Data Subscription</h4>-->
    <div class="card">
        <div class="card-body">
            <div class="w3-panel w3-yellow w3-round-xlarge">
                <h4 class="w3-text-green"><b>Wallet : NGN <?php echo number_format(intval($balance *1),2);?> &nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="fund.php">Fund Wallet</a>
                    </b></h4>  	</div>
        </div>
    </div>

<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img width="100" class="rounded-circle" src="images/layout_img/user_img.jpg" alt="#" />
                                </div>
<!--                                <div class="col-5 col-sm-7 col-xl-8 p-0">-->
<!--                                    <h4 class="mb-1 mb-sm-0">Fund Account With Transfer</h4>-->
<!--                                    <h6 class="mb-1 mb-sm-0">Bank Name: Wema | Account No: 7481522214 | Account Name: Efe Mobile Money </h6>-->
                                    <!--                            <p class="mb-0 font-weight-normal d-none d-sm-block">Account No: 7481522214</p>-->
<!--                                </div>-->
                                <br>
                                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
<!--                          <a href="fund.php" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Make Deposit</a>-->
                        </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-white font-weight-bold">Your Referral Link</h6>
                        <!-- The text field -->
                        <input class="text-success form-control"  id="myInput" value=https://mobile.thebuzzer.com.ng/go/register.php?refer=<?php echo $username; ?> readonly/>
                        <!-- The button used to copy the text -->
                        <button onclick="myFunction()" class="btn badge-success">Copy Referral Link</button>
                    </div>
                </div>
                <script>
                    function myFunction() {
                        /* Get the text field */
                        var copyText = document.getElementById("myInput");

                        /* Select the text field */
                        copyText.select();
                        copyText.setSelectionRange(0, 99999); /* For mobile devices */

                        /* Copy the text inside the text field */
                        navigator.clipboard.writeText(copyText.value);

                        /* Alert the copied text */
                        alert("Copied the text: " + copyText.value);
                    }
                </script>
                <br>
                <h5 class="form-title">Basic Information</h5>
                <div class="alert alert-warning" id="PayNote" style="font-weight: bold;font-size: 13px;">

                    Dear <?php echo $name; ?>! Your Account privacy is important to us, as this might be need by our technical team for assistant when needed. Keep Safe.

                </div>

                <!--        <div class="col-auto profile-image">-->
                <!--            <a href="#">-->
                <!--                --><?php //if($cphoto==1){ ?>
                <!--                    <img class=" img-thumbnail rounded-circle" alt="User Image" src="assets/images/profiles/avatar.png">-->
                <!--                --><?php //}else{ ?>
                <!--                    <img class="img-thumbnail rounded-circle" alt="User Image" src="--><?//= 'assets/php/'.$cphoto; ?><!--">-->
                <!--                --><?php //} ?>
                <!--            </a>-->
                <!--        </div>-->
                <!--        <button type="submit" name="submit"  class="btn btn-primary" id="profileUpdateBtn"><a class="text-white" href="editp.php">Upload Profile Photo</a><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-profile-spinner"></span></button>-->

                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' ){

//                    $status="OK";
// Collect the data from post method of form submission //
                    $name=mysqli_real_escape_string($con,$_POST['name']);
//                            $contr=mysqli_real_escape_string($con,$_POST['country']);
                    $phone=mysqli_real_escape_string($con,$_POST['phone']);
                    $email=mysqli_real_escape_string($con,$_POST['email']);
//                    $address=mysqli_real_escape_string($con,$_POST['add']);
//                            $gender=mysqli_real_escape_string($con,$_POST['gender']);
//                            $address=mysqli_real_escape_string($con,$_POST['address']);
//collection ends

                    $query3=mysqli_query($con,"UPDATE `users` SET `name`='$name', `phone`='$phone',`email`='$email' where username = '$username'");

                    echo $message = "Profile Update Successfully";
                    print "
				<script>
				 let message = 'Profile Update Successfully: ';
                                    alert(message);
window.location = 'profile.php';
</script>
";
                }
                ?>
                <form action="" method="POST">

<!--                    --><?php //if(isset($error) != NULL):?>
<!--                        <p>--><?php //echo $error; ?><!--</p>-->
<!--                    --><?php //endif; ?>
                    <!--            <div class="row">-->
                    <!--                <div class="card">-->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-xl-6">
                                <label class="mr-sm-2">Name</label>
                                <input class="form-control" type="text" value="<?php echo $name; ?>" name="name" placeholder="" required>
                            </div>
                            <div class="form-group col-xl-6">
                                <label class="mr-sm-2">Email</label>
                                <input class="form-control" type="email" value="<?php echo $email; ?>" name="email" placeholder="" required>
                            </div>
                            <div class="form-group col-xl-6">
                                <label class="mr-sm-2">Mobile Number</label>
                                <input class="form-control no_only" type="text" value="<?php echo $phone; ?>" name="phone" placeholder="" required>
                            </div>
<!--                            <div class="form-group col-xl-6">-->
<!--                                <label class="mr-sm-2">Address</label>-->
<!--                                <input class="form-control no_only" type="text" value="--><?php //echo $address; ?><!--" name="add" placeholder="" required>-->
<!--                            </div>-->
                            <div class="form-group col-xl-6">
                                <label class="mr-sm-2">Username</label>
                                <input type="text" class="form-control datepicker" type="text" name="dob" value="<?php echo $username; ?>"  readonly>
                            </div>
                            <!--    <div class="col-xl-12">-->
                            <!--        <h5 class="form-title">Address</h5>-->
                            <!--    </div>-->
                            <!--    <div class="form-group col-xl-12">-->
                            <!--        <label class="mr-sm-2">Address</label>-->
                            <!--        <input type="text" class="form-control" name="address" value="">-->
                            <!--    </div>-->
                            <div class="form-group col-xl-12">
                                <button name="form_submit" id="form_submit" class="btn btn-info" type="submit">Update</button>
                            </div>
                </form>
                <button type="button" class="btn btn-outline-primary btn-rounded"><a href="pass.php"> Change Password</a></button>
                <!--                <button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="button"><a href="password.php"> Change Password</a></button>-->


            </div>
        </div>
    </div>
</div