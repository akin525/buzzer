<?php include "sidebar.php"; ?>
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="row column1">
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-google-wallet yellow_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <h5 class="total_no text-center">NGN <?php echo number_format(intval($balance *1),2);?></h5>
                            <h6 class="head_couter">Wallet Balance</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-money blue1_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <h5 class="total_no text-center">NGN <?php echo number_format(intval($deposited *1),2);?></h5>
                            <h6 class="head_couter">Total Deposit</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-money green_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <h5 class="total_no text-center">NGN <?php echo number_format(intval($num *1),2);?></h5>
                            <h6 class="head_couter">Total Bills</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa fa-user red_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <h5 class="total_no text-center">NGN <?php echo number_format(intval($refer *1),2);?></h5>
                            <h6 class="head_couter">Referral Bonus</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="text-white font-weight-bold">Your Referral Link</h6>
                <!-- The text field -->
                <input class="text-success form-control"  id="myInput" value=https://efemobilemoney.com/go/register.php?refer=<?php echo $username; ?> readonly/>
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
        <!-- graph -->
        <div class="row column2 graph margin_bottom_30">
            <div class="col-md-l2 col-lg-12">
                <div class="white_shd full">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Payment Charts</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <div class="area_chart">
                                        <canvas height="120" id="canv"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $result = mysqli_query($con,"SELECT sum(amount) FROM  deposit where username = '$username'");
        $row = mysqli_fetch_row($result);
        $total = $row[0];
        ?>
        <?php
        $result = mysqli_query($con,"SELECT sum(amount) FROM  bill_payment where status=0 and username = '$username'");
        $row = mysqli_fetch_row($result);
        $unpaid = $row[0];
        ?>
        <script>
            $(document).ready(function() {
                $('#styleOptions').styleSwitcher();
            });
        </script>

        <script>
            $('.dropdown-toggle').dropdown()
        </script>
        <script>
            $(function () {
                "use strict";
                // Bar chart
                new Chart(document.getElementById("canv"), {
                    type: 'bar',
                    data: {
                        labels: ["Wallet balance", "Total Paid", "Total Bills"],
                        datasets: [
                            {
                                label: "Population (millions)",
                                backgroundColor: ["#03a9f4", "#e861ff","#08ccce"],
                                data: [<?=$balance?>,<?=$total?>,<?=$unpaid?>]
                            }
                        ]
                    },
                    options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'My Wallet/Payment Chart'
                        }
                    }
                });


                // line second
            });
        </script>
    </div>
    <br>
        <!-- end graph -->






























