<?php include "sidebar.php"; ?>

<link href="asset/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="asset/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="asset/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />


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
    <h5 class="form-title">Basic Information</h5>
    <div class="alert alert-warning" id="PayNote" style="font-weight: bold;font-size: 13px;">

        Dear <?php echo $name; ?>! Your Account privacy is important to us, as this might be need by our technical team for assistant when needed. Keep Safe.

    </div>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Bills Invoice</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Payment ID</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Token(Available Only Electricity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $query="SELECT * FROM bill_payment where username ='$username'";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $status="$row[status]";
                                        if($status==1)
                                            $sta="Paid";
                                        if($status==1)
                                            $color="cl-success bg-success-light";
                                        if ($status==2)
                                            $sta="Declined";
                                        if($status==2)
                                            $color="danger";
                                        if ($status==0)
                                            $sta="Pending";
                                        if($status==0)
                                            $color="cl-danger bg-danger-light";
                                        ?>
                                        <tr>
                                            <td><a href="#"><?php echo "$row[product]"; ?></a></td>
                                            <td><i class="fa fa-lg"></i><?php echo "$row[transactionid]"; ?></td>
                                            <td><div class="label <?php echo $color; ?> ">NGN.<?php echo "$row[amount]"; ?></div></td>
                                            <td><?php echo "$row[timestamp]"; ?></td>
                                            <td><?php echo "$row[token]"; ?></td>
                                            <form action="invoice.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo "$row[id]"; ?>">
                                                <td><button type="submit" class="badge btn-outline-primary btn-rounded"><i class="fa fa-print"></i> Print Invoice</button>
                                            </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








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
