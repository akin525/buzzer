<?php include "sidebar.php"; ?>
<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(1).css">

<link rel="stylesheet" href="Buy Data _ MobileNig_files/w3(2).css">
<link rel="stylesheet" href="Buy Data _ MobileNig_files/font-awesome.min.css">
<link href="Buy Data _ MobileNig_files/icon" rel="stylesheet">

<div style="padding:90px 15px 20px 15px">
    <h4 class="align-content-center text-center">Data Subscription</h4>
    <div class="card">
    <div class="card-body">
        <div class="w3-panel w3-yellow w3-round-xlarge">
            <h4 class="w3-text-green"><b>Wallet : NGN <?php echo number_format(intval($balance *1),2);?> &nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="fund.php">Fund Wallet</a>
                </b></h4>  	</div>
    </div>
    </div>
    <ul class="w3-ul w3-border">
        <li><b>Network status</b></li>
        <li class="w3-btn-group" style="align:center">
            <div class="w3-btn w3-padding w3-yellow w3-quarter">MTN: EXCELLENT</div>
            <div class="w3-btn w3-padding w3-dark-grey w3-quarter">9MOBILE: EXCELLENT</div>
            <div class="w3-btn w3-padding w3-green w3-quarter">GLO: EXCELLENT</div>
            <div class="w3-btn w3-padding w3-blue-grey w3-quarter">9MOBILE(Gift): EXCELLENT</div>
        </li>
    </ul>



    <div class="card">
        <div class="card-body">
<!--            <div class="box w3-card-4">-->
                <form action="preview.php" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <br>
                            <br>
                            <div id="DataNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;"></div>
                            <div id="DataNote2" class="alert" style="display: none;">
                                <br>
                                <center>
                                    <a href="#"><button class="btn btn-success">Buy Data</button></a>

                                    <a href="#"><button class="btn btn-primary">My History</button></a>
                                </center>
                            </div>


                            <div class="form-group">
                                <label for="network" class=" requiredField">
                                    Choose Network<span class="asteriskField">*</span>
                                </label>
                                <div class="">
                                    <select  name="id" class="text-success form-control" required="">
                                        <option value="">---------</option>
                                        <?php
                                        $query="SELECT * FROM products1 where `product_type`='data'";
                                        $result = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $id="$row[id]";
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo "$row[tittle]";?>
                                                <br>
                                                <p></p>
<!--                                                --><?php //if($row["product_type"]=="data" || $row["product_type"]=="tv"){ ?><!--------->
<!--                                                    <span class="product-uc-price">--><?php //echo "NGN". "$row[amount]"; ?><!--</span>-->
<!--                                                --><?php //} ?>
                                            </option>
                                            <!--                                        <option value="MTNDIRECT">MTN DIRECT</option>-->
                                            <!--                                        <option value="g">GLO</option>-->
                                            <!--                                        <option value="a">AIRTEL</option>-->
                                            <!--                                        <option value="9">9MOBILE </option>-->
                                        <?php } ?>
                                    </select>

                                </div>
                </form>
            </div>
            <!--                            <div id="div_id_plan_number" class="form-group">-->
            <!---->
            <!--                                <label for="id_plan_number" class=" requiredField">-->
            <!--                                    Select Plan<span class="asteriskField">*</span>-->
            <!--                                </label>-->
            <!--                                <div class="">-->
            <!--                                    <select class="select form-control" name="plan" id="country" required="">-->
            <!---->
            <!--                                    </select>-->
            <!---->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                            <div id="div_id_mobile_number" class="form-group">-->
            <!---->
            <!--                                <label for="id_mobile_number" class=" requiredField">-->
            <!--                                    Mobile number<span class="asteriskField">*</span>-->
            <!--                                </label>-->
            <!--                                <div class="">-->
            <!--                                    <input type="text" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control" required="" id="phone">-->
            <!---->
            <!--                                </div>-->
            <!--                            </div>-->
            <button type="submit" class=" btn" style="color: white;background-color: #095b0d"> Next</button>
        </div>

        <div class="col-sm-4 ">
            <br>
            <center> <h4>Codes for Data Balance: </h4></center>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">MTN [SME]     *461*4#  </li>
                <li class="list-group-item list-group-item-primary">MTN [Gifting]     *131*4# or *460*260#  </li>
                <li class="list-group-item list-group-item-dark"> 9mobile [Gifting]   *228# </li>
                <li class="list-group-item list-group-item-danger"> Airtel   *140# </li>
                <li class="list-group-item list-group-item-success"> Glo  *127*0#. </li>
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