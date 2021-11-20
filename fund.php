<?php include "sidebar.php"; ?>
<br>
<br>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!--<link href="asset/css/vendor.min.css" rel="stylesheet" />-->
<!--<link href="asset/css/default/app.min.css" rel="stylesheet" />-->


<link href="asset/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
<link href="asset/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="asset/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
<!--                                        <h4 class="font-weight-bold mb-0">--><?php //echo $name; ?><!--</h4>-->
            </div>
        </div>
        <!--                    <div class="col-xl-9 col-md-8">-->
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
<!--                    <div class="row align-items-center">-->
<!--                        <div class="col-4 col-sm-3 col-xl-2">-->
<!--                            <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">-->
<!--                        </div>-->
<!--                        <div class="col-5 col-sm-7 col-xl-8 p-0">-->
<!--                            <h4 class="mb-1 mb-sm-0">Fund Account With Transfer</h4>-->
<!--                            <h6 class="mb-1 mb-sm-0">Bank Name: Wema | Account No: 7481522214 | Account Name: Efe Mobile Money </h6>-->
                            <!--                            <p class="mb-0 font-weight-normal d-none d-sm-block">Account No: 7481522214</p>-->
<!--                        </div>-->
<!--                        <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">-->
<!--                        <span>-->
<!--                          <a href="fund.php" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Make Deposit</a>-->
<!--                        </span>-->
<!--                        </div>-->
<!--                    </div>-->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="mdi mdi-wallet"></i>Wallet Balance</h4>
                        <div class="wallet-details">
                            <!--                                <span>Wallet Balance</span>-->
                            <h3>NGN <?php echo number_format(intval($balance *1),2);?></h3>
                            <div class="d-flex justify-content-between my-4">
                                <!--                                                <div>-->
                                <!--                                                    <p class="mb-1">Early Balance</p>-->
                                <!--                                                    <h4>NGN --><?php //echo number_format(intval($iwallet *1),2);?><!--</h4>-->
                                <!--                                                </div>-->
                                <!--                                                <div>-->
                                <!--                                                    <p class="mb-1">New Deposit</p>-->
                                <!--                                                    <h4>NGN --><?php //echo number_format(intval($amount *1),2);?><!--</h4>-->
                                <!--                                                </div>-->
                            </div>
                            <div class="wallet-progress-chart">
                                <!--                                                <div class="d-flex justify-content-between">-->
                                <!--                                <span>NGN --><?php //echo number_format(intval($iwallet *1),2);?>
                                <!--</span>-->
                                <!--                                                    <span>NGN --><?php //echo number_format(intval($amount *1),2);?>
                                <!--</span>-->
                                <!--                                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Save More</h4>
<!--                        --><?php
//                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//
//                            $amou=intval(mysqli_real_escape_string($con,$_POST['amount']));
//
//                            print "
//                    <script>
//                        window.location = 'fun.php?amount=$amou';
//                    </script>
//                    ";
//                        }
//                        ?>
                        <form  action="" method="post" id="paymentForm" >
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">

                                        <label class="form-control">NGN</label>
                                    </div>
                                    <input type="number" maxlength="4" class="form-control" name="amount" id="amount" placeholder="00.00" required/>
                                </div>

                            </div>
                            <input type="hidden"  id="email-address" value="<?php echo $email; ?>">
                    </div>
                </div>
<!--                <div class="text-center mb-3">-->
<!--                    <p></p>-->
<!--                                                        <p class="mb-3">OR</p>-->
<!--                                                        <ul class="list-inline mb-0">-->
<!--                                                            <li class="line-inline-item mb-0 d-inline-block">-->
<!--                                                                <button type="submit" name="amount" value="500" onclick="payWithPaystack()"> 500</button>-->
<!--                                                            </li>-->
<!--                                                            <li class="line-inline-item mb-0 d-inline-block">-->
<!--                                                                <a href="javascript:;" id="1000" type="submit">1000</a>-->
<!--                                                            </li>-->
<!--                                                            <li class="line-inline-item mb-0 d-inline-block">-->
<!--                                                                <a href="javascript:;" id="1500" class="updatebtn">1500</a>-->
<!--                                                            </li>-->
<!--                                                        </ul>-->
<!--                </div>-->
<!--                                                <b class="text-success fa-bold" id="vtv1"></b>-->
<!--                <button id="myBtn" type="submit" class=" btn-block withdraw-btn"  >Fund With Transfer</button></a>-->

                <!--                <center>-->
                <!---->
                <!--                    <div id="myModal" class="modal modal-body ">-->
                <!---->
                <!-- Modal content -->
                <!--                        <div class="card">-->
                <!--                        <div class="card-body">-->
                <!--                            <div class="align-content-lg-between">-->
                <!--                                <span class="close alert">&times;</span>-->
                <!--                                <div class="col-5 col-sm-7 col-xl-8 p-0">-->
                <!--                                    <h4 class="mb-1 mb-sm-0">Fund Account With Transfer</h4>-->
                <!--                                    <h6 class="mb-1 mb-sm-0">Bank Name: Wema | Account No: 7481522214 | Account Name: Efe Mobile Money </h6>-->
                <!--                            <p class="mb-0 font-weight-normal d-none d-sm-block">Account No: 7481522214</p>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </center>-->
                <script>

                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                                <button class="btn btn-primary btn-block withdraw-btn" type="submit" onclick="payWithPaystack()"> Fund With Paystack</button>
                				<script src="https://js.paystack.co/v1/inline.js"> </script>
                				</form>
                				<button class="btn btn-success btn-block withdraw-btn" type="submit" onClick="makePayment()"> Fund With Flutterwave</button>
                				<script src="https://checkout.flutterwave.com/v3.js"> </script>

            </div>
        </div>
    </div>
</div>
<!--        <div class="row">-->
<!--            <div class="col-md-7 grid-margin stretch-card">-->
<br>
<br>
<link href="asset/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="asset/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="asset/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Deposit Transaction</h5>
        <div class="panel-body">
            <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                <thead>
                <th>Date</th>
                    <th>Username</th>
                    <th>Total Balance</th>
                    <th>Amount Before</th>
                    <th>Amount After</th>
                    <th>Payment_Ref</th>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM deposit WHERE username ='$username' order by date desc";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)) { ?>
                    <tr>

                    <!--                        <td>--><?php //echo $row["id"] ; ?><!--</td>-->
                        <td><?php echo $row["date"] ; ?></td>
                        <td><?php echo $row["username"] ; ?></td>
                        <td>NGN<?php echo $row["amount"] ; ?></td>
                        <td>NGN<?php echo $row["iwallet"] ; ?></td>
                        <td>NGN<?php echo $row["fwallet"] ; ?></td>
                        <td><?php echo $row ["payment_ref"] ; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<!--    <script src="asset/datatables.net"></script>-->

    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_17fd09d2f1b858a21859595153d9770573a7c996', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    // alert(message);

                    window.location = 'transaction.php?reference='+response.reference;

                }
            });
            handler.openIframe();
        }
    </script>

    <script>
        function makePayment()
        {
            FlutterwaveCheckout({
                public_key: "FLWPUBK-52255ca20b7486c7bd0fa2ce0d0fba5b-X ",
                tx_ref:''+Math.floor((Math.random() * 1000000000) + 1),
                amount: document.getElementById("amount").value*1,
                currency: "NGN",
                payment_options: " ",
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: document.getElementById("email-address").value,
                    phone_number: "08102909304",
                    name: "Flutterwave Developers",
                },
                callback: function (response) {
                    let message = 'Payment complete! id: ' + response.transaction_id;
                    //alert(message);

                    window.location = 'transaction1.php?reference='+response.transaction_id;

                },
                onclose: function() {
                    // close modal
                },
                customizations: {
                    title: "Efemobilemoney",
                    description: "Fund Wallet",
                    //logo: "https://assets.piedpiper.com/logo.png",
                },
            });
        }
    </script>
    <script src="asset/js/vendor.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/js/app.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/js/theme/default.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>


    <script src="asset/datatables.net/js/jquery.dataTables.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/datatables.net-responsive/js/dataTables.responsive.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/js/demo/table-manage-default.demo.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/%40highlightjs/cdn-assets/highlight.min.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>
    <script src="asset/js/demo/render.highlight.js" type="847c8da2504a1915642ffbeb-text/javascript"></script>


    <script src="asset/datatables.net/js/jquery.dataTables.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-responsive/js/dataTables.responsive.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons/js/dataTables.buttons.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons/js/buttons.colVis.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons/js/buttons.flash.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons/js/buttons.html5.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/datatables.net-buttons/js/buttons.print.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/pdfmake/build/pdfmake.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/pdfmake/build/vfs_fonts.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/jszip/dist/jszip.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/js/demo/table-manage-buttons.demo.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/%40highlightjs/cdn-assets/highlight.min.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>
    <script src="asset/js/demo/render.highlight.js" type="f1e2722e35a43ad4c1e3a0c8-text/javascript"></script>

    <script type="f1e2722e35a43ad4c1e3a0c8-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
    <script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f1e2722e35a43ad4c1e3a0c8-|49" defer=""></script><script defer src="../../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6a910724bd190718","version":"2021.10.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}'></script>

    <!-- html -->
    <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
        <thead>
        <tr>
            <th width="1%"></th>
            <th width="1%" data-orderable="false"></th>
            ...
        </tr>
        </thead>
        <tbody>
        ...
        </tbody>
    </table>

    <!-- script -->
    <script>
        $('#data-table-default').DataTable({
            responsive: true,
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
                { extend: 'copy', className: 'btn-sm' },
                { extend: 'csv', className: 'btn-sm' },
                { extend: 'excel', className: 'btn-sm' },
                { extend: 'pdf', className: 'btn-sm' },
                { extend: 'print', className: 'btn-sm' }
            ],
        });
    </script>