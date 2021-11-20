<?php require "sidebar.php"; ?>
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
    <h4 class="align-content-center text-sm-center">Airtime TopUp</h4>
    <div class="card">
        <ul class="w3-ul w3-border">
            <li><b>Network status</b></li>
            <li class="w3-btn-group" style="align:center">
                <div class="w3-btn w3-padding w3-yellow w3-quarter">MTN: EXCELLENT</div>
                <div class="w3-btn w3-padding w3-dark-grey w3-quarter">9MOBILE: EXCELLENT</div>
                <div class="w3-btn w3-padding w3-green w3-quarter">GLO: EXCELLENT</div>
                <div class="w3-btn w3-padding w3-blue-grey w3-quarter">9MOBILE(Gift): EXCELLENT</div>
            </li>
        </ul>


        <div class="card-body">
<!--            <div class="box w3-card-4">-->
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!=""))
                {
                    print $errormsg;
                }
                ?>
                <form action="preview.php" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <br>
                            <br>
                            <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                            <div id="AirtimePanel">

                                <div id="div_id_airtimetype" class="form-group">
                                    <label for="airtimetype_a" class=" requiredField">
                                        Airtime Type<span class="asteriskField">*</span>
                                    </label>
                                    <div class="form-group">
                                        <select name="airtimetype" class="text-success form-control" required="" id="airtimetype">
                                            <option value="" selected="">---------</option>

                                            <option value="VTU">AIRTIME VTU TOP-UP</option>

                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Network<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <select name="id" class="text-success form-control" required="">
                                            <?php

                                            $query="SELECT * FROM products1 where `product_type`='airtime'";
                                            $result = mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $id="$row[id]";
                                                ?>
                                                <option value="" selected="">---------</option>

                                                <option value="<?php echo $id; ?>"><?php echo "$row[name]"; $id=$row["id"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class=" btn" style="color: white;background-color: #095b26" id="btnsubmit"> Purchase Now</button>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <br>
                            <center> <h6>Codes for Airtime Balance: </h6></center>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">MTN Airtime VTU    <span id="RightT"> *556#  </span></li>

                                <li class="list-group-item list-group-item-success"> 9mobile Airtime VTU   *232# </li>
                                <li class="list-group-item list-group-item-action"> Airtel Airtime VTU   *123# </li>
                                <li class="list-group-item list-group-item-info"> Glo Airtime VTU #124#. </li>
                            </ul>
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
                    <br>

                </form></div>


        </div>

