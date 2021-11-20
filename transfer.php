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
