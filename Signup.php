.<?php
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
            $bd = $name;
            $bd1 = $username;
            $body .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='font-family:arial, helvetica neue, helvetica, sans-serif'><head><meta charset='UTF-8'><meta content='width=device-width, initial-scale=1' name='viewport'><meta name='x-apple-disable-message-reformatting'><meta http-equiv='X-UA-Compatible' content='IE=edge'><meta content='telephone=no' name='format-detection'><title>New message 2</title> <!--[if (mso 16)]><style type='text/css'>     a {text-decoration: none;}     </style><![endif]--> <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> <!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG></o:AllowPNG> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]--><style type='text/css'>#outlook a {	padding:0;}.es-button {	mso-style-priority:100!important;	text-decoration:none!important;}a[x-apple-data-detectors] {	color:inherit!important;	text-decoration:none!important;	font-size:inherit!important;	font-family:inherit!important;	font-weight:inherit!important;	line-height:inherit!important;}.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;	mso-hide:all;}[data-ogsb] .es-button {	border-width:0!important;	padding:10px 30px 10px 30px!important;}@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:36px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:36px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button, button.es-button { font-size:20px!important; display:inline-block!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } }</style></head>
<body style='width:100%;font-family:arial, helvetica neue, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'><div class='es-wrapper-color' style='background-color:#FAFAFA'> <!--[if gte mso 9]><v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'> <v:fill type='tile' color='#fafafa'></v:fill> </v:background><![endif]--><table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA'><tr><td valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr><td class='es-info-area' align='center' style='padding:0;Margin:0'><table class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' bgcolor='#FFFFFF'><tr><td align='left' style='padding:20px;Margin:0'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' valign='top' style='padding:0;Margin:0;width:560px'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' style='padding:0;Margin:0;display:none'></td>
</tr></table></td></tr></table></td></tr></table></td>
</tr></table><table cellpadding='0' cellspacing='0' class='es-header' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'><tr><td align='center' style='padding:0;Margin:0'><table bgcolor='#ffffff' class='es-header-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px'><tr><td align='left' style='Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td class='es-m-p0r' valign='top' align='center' style='padding:0;Margin:0;width:560px'><table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' style='padding:0;Margin:0;padding-bottom:20px;font-size:0px'><img src='https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/croppedwhatsappimage20211020at94609pm.jpeg' alt='Logo' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px' width='200' title='Logo' height='89'></td>
</tr></table></td></tr></table></td></tr></table></td>";
            $body .= "</tr></table><table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr><td align='center' style='padding:0;Margin:0'><table bgcolor='#ffffff' class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'><tr><td align='left' style='padding:0;Margin:0;padding-top:15px;padding-left:20px;padding-right:20px'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' valign='top' style='padding:0;Margin:0;width:560px'><table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px;font-size:0px'><img src='https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/croppedwhatsappimage20211020at94609pm.jpeg' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='100' height='45'></td>
</tr><tr><td align='center' style='padding:0;Margin:0;padding-top:15px;padding-bottom:15px'><h1 style='Margin:0;line-height:55px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:46px;font-style:normal;font-weight:bold;color:#333333'>Thanks for joining us!</h1></td></tr><tr><td align='left' style='padding:0;Margin:0;padding-top:10px;padding-bottom:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:24px;color:#333333;font-size:16px'>Hello, *|$bd|*! Thanks for joining us! You are now on our mailing list. This means you'll be receiving notification&nbsp; In all transaction!</p></td></tr></table></td></tr></table></td>
</tr><tr><td class='esdev-adapt-off' align='left' background='https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/rm21backgroundtong058.jpg' style='padding:20px;Margin:0;background-image:url(https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/rm21backgroundtong058.jpg);background-repeat:no-repeat;background-position:left top'><table cellpadding='0' cellspacing='0' class='esdev-mso-table' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:560px'><tr><td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr class='es-mobile-hidden'><td align='left' style='padding:0;Margin:0;width:146px'><table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' height='40' style='padding:0;Margin:0'></td>
</tr></table></td></tr></table></td><td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr><td align='left' style='padding:0;Margin:0;width:121px'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='#e8eafb' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#e8eafb;border-radius:10px 0 0 10px' role='presentation'><tr><td align='right' style='padding:0;Margin:0;padding-top:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Username::</p></td>
</tr><tr><td align='right' style='padding:0;Margin:0;padding-bottom:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Password:</p></td></tr></table></td></tr><tr><td align='left' style='padding:0;Margin:0;width:121px'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='#e8eafb' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#e8eafb;border-radius:10px 0 0 10px' role='presentation'><tr><td align='right' style='padding:0;Margin:0;padding-top:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Phone No::</p></td>";
            $body .= "</tr><tr><td align='right' style='padding:0;Margin:0;padding-bottom:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Email:</p></td></tr></table></td></tr></table></td>
<td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-left' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr><td align='left' style='padding:0;Margin:0;width:155px'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='#e8eafb' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#e8eafb;border-radius:0 10px 10px 0' role='presentation'><tr><td align='left' style='padding:0;Margin:0;padding-top:10px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'><strong>$bd1</strong></p></td>
</tr><tr><td align='left' style='padding:0;Margin:0;padding-bottom:10px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'><strong>$to</strong></p></td></tr></table></td>
</tr><tr><td align='left' style='padding:0;Margin:0;width:155px'><table cellpadding='0' cellspacing='0' width='100%' bgcolor='#e8eafb' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#e8eafb;border-radius:0 10px 10px 0' role='presentation'><tr><td align='left' style='padding:0;Margin:0;padding-top:10px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'><strong>$phone</strong></p></td>
</tr><tr><td align='left' style='padding:0;Margin:0;padding-bottom:10px;padding-left:10px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'><strong>$password</strong></p></td></tr></table></td></tr></table></td><td class='esdev-mso-td' valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-right' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'><tr class='es-mobile-hidden'><td align='left' style='padding:0;Margin:0;width:138px'><table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' height='40' style='padding:0;Margin:0'></td>
</tr></table></td></tr></table></td></tr></table></td>";
            $body .= "</tr><tr><td align='left' style='padding:0;Margin:0;padding-bottom:10px;padding-left:20px;padding-right:20px'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' valign='top' style='padding:0;Margin:0;width:560px'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:5px' role='presentation'><tr><td align='center' style='padding:0;Margin:0;padding-bottom:10px;padding-top:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Got a question? Email us at info@thebuzzer.com.ng or give us a call at&nbsp;08146328645<br>Thanks,</p>
<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px'>Thebuzzer Team!</p></td></tr></table></td></tr></table></td></tr></table></td>
</tr></table><table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr><td class='es-info-area' align='center' style='padding:0;Margin:0'><table class='es-content-body' align='center' cellpadding='0' cellspacing='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' bgcolor='#FFFFFF'><tr><td align='left' style='padding:20px;Margin:0'><table cellpadding='0' cellspacing='0' width='100%' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' valign='top' style='padding:0;Margin:0;width:560px'><table cellpadding='0' cellspacing='0' width='100%' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr><td align='center' class='es-infoblock' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'></a>No longer want to receive these emails?&nbsp;<a href='' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'>Unsubscribe</a>.<a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'></a></p>
</td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body></html>";

            $send = mail($to, $subject, $body, $headers);
            $send = mail($from, $subject, $body, $headers);
            $suss = "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. $password</div>";
            //printing error if found in validation
            print "
				<script>
window.location = 'dashboard.php';
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
<br>
<br>
<div class="full_container">
    <div class="container">
        <div class="center verticle_center full_height">
            <div class="login_section">
                <div class="logo_login">
                    <div class="center">
                        <img width="110" src="images/logo/logo_icon.png" alt="#" />
                    </div>
                </div>

                <div class="login_form">
                    <h3 class="text-center text-success">THEBUZZER SIGN-UP</h3>

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
