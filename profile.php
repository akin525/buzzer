<?php
include "sidebar.php";
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
<br>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row column1">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>User profile</h2>
                        </div>
                    </div>
                    <div class="full price_table padding_infor_info">
                        <div class="row">
                            <!-- user profile section -->
                            <!-- profile image -->
                            <div class="col-lg-12 card-body">
                                <div class="full dis_flex center_text">
                                    <div class="profile_img"><img width="180" class="rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /></div>
                                    <div class="profile_contant">
                                        <div class="contact_inner">
                                            <div class="card shadow">
                                            <div class="card-body">
                                            <h3><?php echo $name; ?></h3>
                                            <p><strong>About: </strong>Customer</p>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-envelope-o"></i>:  <?php echo $email; ?></li>
                                                <li><i class="fa fa-phone"></i> : <?php echo $phone; ?></li>
                                                <li><i class="fa fa-user"></i> : <?php echo $username; ?></li>
                                            </ul>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- profile contant section -->
                                <div class="full inner_elements margin_top_30">
                                    <div class="tab_style2">
                                        <center>
                                        <div class="tabbar align-content-center">
                                            <a href="edit.php" class="align-content-center"><button type="button" class="btn btn-outline-info">Edit Account</button></a>
                                        </div>
                                        </center>
                                    </div>
                                </div>
                                <!-- end user profile section -->
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
                <div class="col-md-2"></div>
            </div>
            <!-- end row -->
        </div>
        <!-- footer -->
        <div class="container-fluid">
            <div class="footer">
                <p>Copyright © 2021 Designed by html.design. All rights reserved.<br><br>
                    Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
    <!-- end dashboard inner -->
