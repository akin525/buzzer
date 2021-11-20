<?php
echo "";
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}

include("database.php");
//session_start();
if (isset($_GET['refer'])) {


    $id=$_GET['refer'];
}else{
    $id="";
}

$sql="SELECT maintain FROM  settings WHERE sno=0";
if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
    if($main==2 || $main==3)
    {
        print "<script language='javascript'>window.location = '404.php';</script>";
    }

}

$query="SELECT * FROM settings";


$result = mysqli_query($con,$query);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
// Collect the data from post method of form submission //
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
//    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $refer = mysqli_real_escape_string($con, $_POST['refer']);
    $mail = "info@thebuzzer.com.ng";
    $status = "OK";
    $msg = "";
//validation starts
// if userid is less than 6 char then status is not ok

    if (!isset($username) or strlen($username) < 6) {
        $msg = $msg . "Username Should Contain Minimum 6 CHARACTERS.<br />";
        $status = "NOTOK";
    }

    if (!ctype_alnum($username)) {
        $msg = $msg . "Username Should Contain Alphanumeric Chars Only.<br />";
        $status = "NOTOK";
    }

    $remail = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE email = '$email'");
    $re = mysqli_fetch_row($remail);
    $nremail = $re[0];
    if ($nremail == 1) {
        $msg = $msg . "E-Mail Id Already Registered. Please try another one<br />";
        $status = "NOTOK";
    }

    if (strlen($password) < 8) {
        $msg = $msg . "Password Must Be More Than 8 CHARACTERS Length.<br />";
        $status = "NOTOK";
    }

    if (strlen($email) < 1) {
        $msg = $msg . "Please Enter Your Email Id.<br />";
        $status = "NOTOK";
    }

    if ($password <> $password2) {
        $msg = $msg . "Both Passwords Are Not Matching.<br />";
        $status = "NOTOK";
    }
    $sql = "SELECT username FROM users WHERE username='{$username}'";
    $result = mysqli_query($con, $sql) or die("Query unsuccessful");
    if (mysqli_num_rows($result) > 0) {
        $msg = $msg . "user id already Registered. please try another one<br />";
        $status = "NOTOK";
    }

//Test if it is a shared client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];

        $token = bin2hex(openssl_random_pseudo_bytes(32));
        if ($status == "OK") {

            mysqli_query($con, "INSERT INTO `users` ( `username`, `name`, `password`, `email`, `phone`) VALUES ('$username', '$name', '$password', '$email', '$phone')");
            mysqli_query($con, "insert into wallet(username,balance) values('$username',0)");
            mysqli_query($con, "INSERT INTO referal (`username`, `newuserid`, amount) value ('$refer', '$username', 10)");


            $to = $email;
            $from = $mail;
            // $name = $_REQUEST['name'];
            $subject = $_REQUEST['subject'];
            $number = $_REQUEST['phone_no'];
            $cmessage = $_REQUEST['message'];

            $headers = "From: $from";
            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: " . $from . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $subject = "From Thebuzzer.com.ng.";

            $logo = '<img src="https://renomobilemoney.com/go/images/lo.jpeg" alt="logo">';
            $link = '#';

            $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
            $body .= "<div id=container>";
            $body .= "<div class=product-details>";
            $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
            $body .= "<h1><strong>Thanks For Signing Up, This Are Your Details Below</strong></h1>";
            $bd = $name;
            $bd1 = $username;
            $body .= "<p><strong>Name:</strong> {$bd}</p>";
            $body .= "<p><strong>Username:</strong> {$bd1}</p>";
            $body .= "<p><strong>Email:</strong> {$to}</p>";
            $body .= "<p><strong>Password:</strong> {$password}</p>";
            $body .= "<p><strong>Wallet Balance:</strong>#0.00</p>";
            $body .= "</tr>";

            $body .= "</div>";
            $body .= "<div id=container>{$cmessage}</div>";
            $body .= "</tbody></table>";
            $body .= "</body></html>";

            $send = mail($to, $subject, $body, $headers);
            $send = mail($from, $subject, $body, $headers);
            $suss = "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. $password</div>";
            //printing error if found in validation
            print "
				<script>
window.location = 'login.php';
</script>
";
        } else {
            $errormsg = "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>" . $msg . "</div>"; //printing error if found in validation
        }
    }
}
?>
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>The Buzzer Mobile Digital Network</title>
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
    <!-- calendar file css -->
    <link rel="stylesheet" href="js/semantic.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="inner_page login">
<div class="full_container">
    <div class="container">
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img width="210" src="images/logo/logo.png" alt="#" />
                    </div>
                </div>

                <div class="login_form">

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">

                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
                        {
                            print $errormsg;

                        }
                        ?>

                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK"))
                        {
                            print $suss;

                        }
                        ?>
                        <fieldset>
                            <div class="field">
                                <label class="label_field">Email</label>
                                <input type="email" name="email" id="email" placeholder="E-mail" required />
                            </div>
                            <div class="field">
                                <label class="label_field">username</label>
                                <input type="text" name="username"  placeholder="username" required />
                            </div>
                            <div class="field">
                                <label class="label_field">Full Name</label>
                                <input type="text" name="name"  placeholder="full-name" required />
                            </div>
                            <div class="field">
                                <label class="label_field">Phone-No</label>
                                <input type="number" name="phone"  placeholder="phone number" required />
                            </div>
                            <div class="field">
                                <label class="label_field">Password</label>
                                <input type="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="field">
                                <label class="label_field">Confirmed Password</label>
                                <input type="password" name="password2" placeholder="Password" required />
                            </div>
                            <div class="field">
                                <label class="label_field hidden">hidden label</label>
<!--                                <label class="form-check-label"><input type="checkbox" id="rememberMe" class="form-check-input"> Remember Me</label>-->
                                <a class="forgot" href="index.php">Already Sign-Up</a>
                            </div>
                            <div class="field margin_0">
                                <label class="label_field hidden">hidden label</label>
                                <button type="submit" class="main_bt">Sing Up</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
