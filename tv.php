<?php include "sidebar.php"; ?>
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


<div style="padding:90px 15px 20px 15px">
    <h4 class="align-content-center text-sm-center">Cable Subscription</h4></h4>
    <div class="card">
        <div class="card-body">
            <div class="box w3-card-4">
                <div style="padding:90px 15px 20px 15px">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!="")) {
                        print $errormsg;
                    }
                    ?>
                    <h5 class="text-center"></h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="box ">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <br>
                                        <br>
                                        <div class="alert alert-danger" id="CableNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                        </div>
                                        <form action="preview.php" method="post">
                                            <div id="cablePanel">
                                                <div class="alert alert-danger">0.2% discount apply.</div>
                                                <div id="div_id_cablename" class="form-group">
                                                    <label for="id_cablename" class=" requiredField">
                                                        Cablename
                                                        <span class="asteriskField">*</span>
                                                    </label>
                                                    <div class="">
                                                        <select name="id" class="text-success select form-control" required="" id="dtype" onchange="countryChange(this)">
                                                            <?php

                                                            $query="SELECT * FROM products1 where `product_type`='tv'";
                                                            $result = mysqli_query($con,$query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $id="$row[id]";
                                                                ?>
                                                                <option value="" selected="">---------</option>
                                                                <option  value="<?php echo $id; ?>"><?php echo "$row[name]"; ?>---<?php echo $id=$row["product_type1"]; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="dinfo" class="form-group" style="display: none;">
                                                    <label for="dname" class="">
                                                        Customer name
                                                    </label>
                                                    <div class="">
                                                        <input type="text" name="dname" readonly="readonly" required="required" maxlength="70" class="textinput textInput form-control" id="dname">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn process"  s="" style="color: white;background-color: #5B0953;margin-bottom:15px;"> Continue </button>
                                                <!--                        <button type="button" id="verify" class=" btn" style="margin-bottom:15px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Validating Please wait </span>  <span id="displaytext">Validate Iuc/Smart Card </span></button>-->
                                            </div>
                                        </form>
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
