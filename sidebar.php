<?php include "database.php";
if (!isset($_SESSION['email'])) {
    print "
<script>
    window.location = 'index.php';
</script>
";
}
?>
<?php

$query="SELECT * FROM  users WHERE email='" . $_SESSION['email'] . "'";
$result = mysqli_query($con,$query);
$bvn=0;
while($row = mysqli_fetch_array($result))
{
    $username=$row["username"];
    $email=$row["email"];
    $name=$row["name"];
    $phone=$row["phone"];
}

$query="SELECT * FROM  wallet WHERE username='$username'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $balance=$row["balance"];
//    $account_name=$row["account_name"];
//    $account_no=$row["account_no"];
}
$depositor=0;
$iwallet=0;
$query="SELECT * FROM deposit where username ='$username'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor=$row["amount"];
    $iwallet=$row["iwallet"];

}
?>

<?php
$result = mysqli_query($con,"SELECT sum(amount) FROM  deposit where username ='$username'");
$row = mysqli_fetch_row($result);
$deposited = $row[0];

?>
<?php
$query="SELECT  sum(amount) FROM referal where username ='$username'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $refer=$row[0];


}

$result = mysqli_query($con, "SELECT sum(amount) FROM  bill_payment where username ='$username'");
$row = mysqli_fetch_row($result);
$num = $row[0];

$query="SELECT * FROM  userbvn WHERE username='$username'";
$result = mysqli_query($con,$query);
$bvn=0;
while($row = mysqli_fetch_array($result))
{
    $bvn=$row["bvn"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>User Dashboard</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                            <h6><?php echo $username; ?></h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="dashboard.php"  ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                    </li>
                    <li><a href="fund.php"><i class="fa fa-credit-card orange_color"></i> <span>Fund Wallet</span></a></li>
                    <li>
                        <a href="data.php"><i class="fa fa-laptop purple_color"></i> <span>Buy Data</span></a>
                    </li>
                    <li>
                        <a href="airtime.php" class="ui-menu-icon"><i class="fa fa-google-wallet purple_color"></i> <span>Buy Airtime</span></a>
                    </li>
                    <li><a href="tv.php"><i class="fa fa-television purple_color2"></i> <span>Cable Subscription</span></a></li>
                    <li>
                        <a href="elect.php"><i class="fa fa-lightbulb-o blue2_color"></i> <span>Pay Electricity</span></a>
                    </li>
                    <li><a href="transfer.php"><i class="fa fa-university blue1_color"></i> <span>All Deposit</span></a></li>
                    <li>
                        <a href="profile.php">
                            <i class="fa fa-user red_color"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="myinvoice.php"><i class="fa fa-sticky-note yellow_color"></i> <span>Bills Invoice</span></a>
                    </li>
                    <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                    <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                    <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                            <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul>
                                    <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                    <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?php echo $name; ?></span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="profile.php">My Profile</a>
                                            <a class="dropdown-item" href="settings.html">Settings</a>
                                            <a class="dropdown-item" href="help.html">Help</a>
                                            <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->


















<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- wow animation -->
<script src="js/animate.js"></script>
<!-- select country -->
<script src="js/bootstrap-select.js"></script>
<!-- owl carousel -->
<script src="js/owl.carousel.js"></script>
<!-- chart js -->
<script src="js/Chart.min.js"></script>
<script src="js/Chart.bundle.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/analyser.js"></script>
<!-- nice scrollbar -->
<script src="js/perfect-scrollbar.min.js"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="js/custom.js"></script>
<script src="js/chart_custom_style1.js"></script>
</body>
</html>
