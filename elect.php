<?php include "sidebar.php"; ?>

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(1).css">

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(2).css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/font-awesome.min.css">
<link href="Buy Data _ MobileNig_files/icon" rel="stylesheet">

<div class="page-wrapper">
    <div style="padding:90px 15px 20px 15px">
        <h5 class="text-center">Electricity Payment</h2>
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <div class="w3-panel w3-yellow w3-round-xlarge">
                            <h4 class="w3-text-green"><b>Wallet : NGN <?php echo number_format(intval($balance *1),2);?> &nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="fund.php">Fund Wallet</a>
                                </b></h4>  	</div>
                    </div>
                </div>

                <div class="card-body">
<!--                    <div class="box w3-card-4">-->
                        <div class="row">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!="")) {
                                print $errormsg;
                            }
                            ?>
                            <div class="col-sm-8">
                                <br>
                                <br>
                                <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                </div>
                                <div id="electPanel">
                                    <div class="alert alert-danger">0.1% discount apply.</div>
                                    <form action="preview.php" method="post">
                                        <div id="discotypeID" class="form-group">
                                            <label for="discotypeID" class=" requiredField">
                                                Disco Type
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <select name="id" class="text-success select form-control" required="" id="discotype">
                                                    <option selected="">---------</option>
                                                    <?php

                                                    $query="SELECT * FROM products1 where `product_type`='nepa'";
                                                    $result = mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $id="$row[id]";
                                                        ?>
                                                        <option value="<?php echo $id; ?>"><?php echo "$row[name]"; $id=$row["id"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="metertypeID" class="form-group">
                                            <label for="metertypeID" class=" requiredField">
                                                Meter Type
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <div class="">
                                                <select name="metertype" class="text-success form-control" required="" id="metertype">
                                                    <option selected="">---------</option>
                                                    <option value="prepaid">PrePaid Meter</option>
                                                    <option value="postpaid">PostPaid Meter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn process" id="paybtn" style="color: white;background-color: #5B0953;margin-bottom:15px;"> Continue </button>
                                        <!--                        <button type="button" id="verify" class=" btn" style="margin-bottom:15px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Validating Please wait </span>  <span id="displaytext">Validate Meter Number </span></button>-->
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-4 ">
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                    <br>
                    <br>
                    <br>
                    <br>
                </div>