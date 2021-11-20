<?php include "sidebar.php"; ?>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }
    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }h2 {
        color: #fa0334;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
    }
    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    } f {
        color: #fa0334;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
<?php

$query = "SELECT * FROM  paymentgateway where name='MCD Token'";

$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
    $token = $row["code"];
}


// Inialize session
//session_start();
// Check, if username session is NOT set then this page will jump to login page


$product_type="";
$topay= intval(mysqli_real_escape_string($con,$_GET["amount"]));
$refid= mysqli_real_escape_string($con,$_GET["refid"]);
$product= mysqli_real_escape_string($con,$_GET["product"]);
$productid=mysqli_real_escape_string($con,$_GET['productid']);
$phone=mysqli_real_escape_string($con,$_GET['number']);
$GLOBALS['recipient']=mysqli_real_escape_string($con,$_GET['number']);
$GLOBALS['method']=mysqli_real_escape_string($con,$_GET['method']);


$query="SELECT * FROM users where email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $payer="$row[username]";
}

$query="SELECT * FROM  products1 where  id = '$productid'";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){
    $name="$row[name]";
    $title="$row[tittle]";
    $details="$row[details]";
    $dataplan="$row[dataplan]";
    $networkcode="$row[networkcode]";
    $product_type="$row[product_type]";
}

//echo $networkcode, $phone;

function pro($tran_stat, $product, $payer, $topay, $refid, $results, $con){
    $query="SELECT * FROM  wallet WHERE username='$payer'";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)){
        $balance="$row[balance]";
    }

//    $query=mysqli_query($con,"insert into bill_payment (status,product, username, amount, transactionid, paymentmethod, server_response) values ('$tran_stat','$product', '$payer', '$topay', '$refid', '". $GLOBALS['method']."', '$results')");

    if($tran_stat==0){
        $refund=$balance+$topay;
        $query=mysqli_query($con,"update wallet set balance='".$refund."' where username='" . $_SESSION['username'] . "'");
    }
    echo "<script language='javascript'> window.location='mcderror.php';</script>";
}
 $resellerURL='https://test.mcd.5starcompany.com.ng/api/reseller';
//$resellerURL='https://app.mcd.5starcompany.com.ng/api/reseller/';

//start buying
if($product_type=="data"){
//    buy($networkcode, $product_type, $phone, $product, $payer, $topay, $refid, $con);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://test.mcd.5starcompany.com.ng/api/reseller/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'data','coded' => $networkcode,'phone' => $phone, 'reseller_price'=>$topay),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
//    echo $response;
//echo $token;
    $data=json_decode($response, true);
    $success=$data["success"];
    $tran=$data["ref"];
    $tran1=$data["discountAmount"];
//return;
    if($success==1) {
        $query = mysqli_query($con, "insert into bill_payment (`username`, `product`, `amount`, `transactionid`, `paymentmethod`, `server_response`, `number`, `discountamoun`) values ('$payer', '$title', '$topay', '$tran', 'Wallet Payment',  '$response', '$phone', '$tran1')");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <i class='checkmark'>✓</i>
      </div>
        <h1>Success</h1> 
        <p>Mobile Data Purchase Was Successful<br/> Thanks</p>
        <a href='myinvoice.php'><button type='button' class='btn btn-outline-success'>Continue</button></a>
      </div>
    </body>";
    }
    if($success==0){
        $query=mysqli_query($con,"update wallet set balance=balance+$topay where username='$payer'");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <f class='checkmark'>x</f>
      </div>
        <h2>Fail</h2> 
        <p class='text-danger-100'>Mobile Data Purchase Fail NGN$topay was Refunded<br/>Contact Admin Support</p>
        <a href='dashboard.php'><button type='button' class='btn btn-outline-danger'>Continue</button></a>
      </div>
    </body>";
    }
}

elseif ($product_type=="airtime") {
//    buy($networkcode, $product_type, $phone, $product, $payer, $topay, $refid, $con);
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://test.mcd.5starcompany.com.ng/api/reseller/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'airtime','coded' => $networkcode,'phone' => $phone,'amount' => $topay, 'reseller_price'=>$topay),

        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token
        )));

    $response = curl_exec($curl);

    curl_close($curl);
    // echo $response;
//    return;
    $data=json_decode($response, true);
    $success=$data["success"];
    $tran=$data["ref"];
    $tran1=$data["discountAmount"];
    if($success==1) {
        $query = mysqli_query($con, "insert into bill_payment (`username`, `product`, `amount`, `transactionid`, `paymentmethod`, `server_response`, `number`, `discountamoun`) values ('$payer', '$title', '$topay', '$tran', 'Wallet Payment',  '$response', '$phone', '$tran1')");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <i class='checkmark'>✓</i>
      </div>
        <h1>Success</h1> 
        <p>NGN$topay Airtime Purchase Was Successful To $phone<br/> Thanks</p>
        <a href='myinvoice.php'><button type='button' class='btn btn-outline-success'>Continue</button></a>
      </div>
    </body>";
    }
    if($success==0){
        $query=mysqli_query($con,"update wallet set balance=balance+$topay where username='$payer'");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <f class='checkmark'>x</f>
      </div>
        <h2>Fail</h2> 
        <p class='text-danger-100'>Airtime Purchase Fail NGN$topay was Refunded<br/>Contact Admin Support</p>
        <a href='dashboard.php'><button type='button' class='btn btn-outline-danger'>Continue</button></a>
      </div>
    </body>";
    }
}
elseif ($product_type=="tv") {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://test.mcd.5starcompany.com.ng/api/reseller/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'tv','coded' => $networkcode,'phone' => $phone, 'reseller_price'=>$topay),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
//    echo $response;
    $data=json_decode($response, true);
    $success=$data["success"];
    $m=$data["message"];
    $net=$data["ref"];
    $tran1=$data["discountAmount"];

    if($success==1) {
        $query = mysqli_query($con, "insert into bill_payment (`username`, `product`, `amount`, `transactionid`, `paymentmethod`, `server_response`, `number`, `discountamoun`) values ('$payer', '$title', '$topay', '$net', 'Wallet Payment',  '$response', '$phone', '$tran1')");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <i class='checkmark'>✓</i>
      </div>
        <h1>Success</h1> 
        <p>NGN$topay $title Was Successful Purchase To $phone<br/> Thanks</p>
        <a href='myinvoice.php'><button type='button' class='btn btn-outline-success'>Continue</button></a>
      </div>
    </body>";
    }
    if($success==0){
        $query=mysqli_query($con,"update wallet set balance=balance+$topay where username='$payer'");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <f class='checkmark'>x</f>
      </div>
        <h2>Fail</h2> 
        <p class='text-danger-100'>Tv Subscription Purchase Fail NGN$topay was Refunded<br/>Contact Admin Support</p>
        <a href='dashboard.php'><button type='button' class='btn btn-outline-danger'>Continue</button></a>
      </div>
    </body>";
    }
}
elseif ($product_type=="nepa") {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>'https://test.mcd.5starcompany.com.ng/api/reseller/pay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'electricity','coded' => $networkcode,'phone' => $phone, 'amount' => $topay, 'reseller_price'=>$topay),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
//    echo $response;
    $data=json_decode($response, true);
    $success=$data["success"];
    $m=$data["message"];
    $net=$data["ref"];
    $tran1=$data["discountAmount"];
    $tran2=$data["token"];
    if($success==1) {
        $query = mysqli_query($con, "insert into bill_payment (`username`, `product`, `amount`, `transactionid`, `paymentmethod`, `server_response`, `number`, `token`, `discountamoun`) values ('$payer', '$title', '$topay', '$net', 'Wallet Payment',  '$response', '$phone', '$tran2', '$tran1')");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <i class='checkmark'>✓</i>
      </div>
        <h1>Success</h1> 
        <p>$title Was Successful Purchase To $phone<br/> Thanks $tran2</p>
        <a href='myinvoice.php'><button type='button' class='btn btn-outline-success'>Continue</button></a>
      </div>
    </body>";
    }
    if($success==0){
        $query=mysqli_query($con,"update wallet set balance=balance+$topay where username='$payer'");
        echo "<body>
      <div class='card'>
      <div style='border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;'>
        <f class='checkmark'>x</f>
      </div>
        <h2>Fail</h2> 
        <p class='text-danger-100'>Electricity Purchase Fail NGN$topay was Refunded<br/>Contact Admin Support</p>
        <a href='dashboard.php'><button type='button' class='btn btn-outline-danger'>Continue</button></a>
      </div>
    </body>";
    }
}

//$query="SELECT * FROM users where username ='" . $_SESSION['username'] . "'";
//$result = mysqli_query($con,$query);
//while ($row = mysqli_fetch_array($result)) {
//    $username = $row["username"];
//    $name = $row["name"];
//    $email = $row["email"];
//}$query="SELECT * FROM wallet where username ='" . $_SESSION['username'] . "'";
//$result = mysqli_query($con,$query);
//while ($row = mysqli_fetch_array($result)) {
//    $bala = $row["balance"];
//}
//$username=decryptdata($username);
//$name=decryptdata($name);
//$mail= "info@renomobilemoney.com";
//$to = decryptdata($email);
//$from = $mail;
//
//$headers = "From: $from";
//$headers = "From: " . $from . "\r\n";
//$headers .= "Reply-To: ". $from . "\r\n";
//$headers .= "MIME-Version: 1.0\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//
//$subject = "$username|Transactional Email | $refid";
//
//$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
//$body .= "<table style='width: 100%;'>";
//$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
//$body .= " <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FAFAFA'>
//     <tr>
//      <td valign='top' style='padding:0;Margin:0'>
//       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
//         <tr>
//          <td align='center' style='padding:0;Margin:0'>
//           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center'>
//             <tr>
//              <td align='left' style='padding:20px;Margin:0'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td class='es-infoblock' align='center' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'>View online version</a></p></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//             </tr>
//           </table></td>
//         </tr>
//       </table>
//       <table class='es-header' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
//         <tr>
//          <td align='center' style='padding:0;Margin:0'>
//           <table class='es-header-body' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px'>
//             <tr>
//              <td align='left' style='padding:20px;Margin:0'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td class='es-m-p0r' valign='top' align='center' style='padding:0;Margin:0;width:560px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td style='padding:0;Margin:0;padding-bottom:20px;font-size:0px' align='center'><img src='https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/lo.jpeg' alt='Logo' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;font-size:12px' title='Logo' width='150' height='150'></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//             </tr>
//           </table></td>
//         </tr>
//       </table>
//       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
//         <tr>
//          <td align='center' style='padding:0;Margin:0'>
//           <table class='es-content-body' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
//             <tr>
//              <td align='left' style='padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td align='left' style='padding:0;Margin:0;width:560px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td align='center' style='padding:0;Margin:0;padding-bottom:10px;padding-top:20px'><h1 style='Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:46px;font-style:normal;font-weight:bold;color:#333333'>Transactional Email<br></h1></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//               </tr>
//             <tr>
//              <td align='left' style='padding:20px;Margin:0'>
//               <!--[if mso]><table style='width:560px' cellpadding='0' cellspacing='0'><tr><td style='width:60px' valign='top'><![endif]-->
//               <table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'>
//                 <tr>
//                  <td align='left' style='padding:0;Margin:0;width:60px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td class='es-m-txt-c' style='padding:0;Margin:0;font-size:0px' align='center'><a target='_blank' href='https://viewstripo.email' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#5C68E2;font-size:14px'><img src='https://lgftzw.stripocdn.email/content/guids/CABINET_6236481c7d26a46b42fba226fc9e554f/images/lo.jpeg' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='150' height='150'></a></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table>
//               <!--[if mso]></td><td style='width:10px'></td><td style='width:490px' valign='top'><![endif]-->
//               <table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'>
//                 <tr>
//                  <td align='left' style='padding:0;Margin:0;width:490px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td class='es-m-txt-c' align='left' style='padding:0;Margin:0'><h3 style='Margin:0;line-height:40px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:20px;font-style:normal;font-weight:bold;color:#666666'>$name</h3><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#666666;font-size:14px'></p></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table>
//                </tr>  ";
//$body .= "  <tr>
//              <td align='left' style='padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
//                   <table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-image:url(https://rszomp.stripocdn.email/content/guids/CABINET_6e43b4f07bc0bea4fe2d66ad7614e6c5/images/98461632176534242.jpg);background-repeat:no-repeat;background-position:left top' width='100%' cellspacing='0' cellpadding='0' background='https://rszomp.stripocdn.email/content/guids/CABINET_6e43b4f07bc0bea4fe2d66ad7614e6c5/images/98461632176534242.jpg' role='presentation'>
//                     <tr>
//                      <td align='left' style='padding:0;Margin:0;padding-top:15px'>$product_type: $product<br></td>
//                     </tr>
//                     <tr>
//                      <td align='left' style='padding:0;Margin:0;padding-top:5px;padding-bottom:10px'><span>Dear&nbsp;</span><strong>$username</strong><span>,</span><br><span>A payment was successfully completed on your account.</span><br><span>Please see below details of the transaction:</span>
//                       <ul>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>Phone No:<strong>$phone</strong></li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>$product</li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>$product_type:<strong> $topay</strong></li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>Payment Method: <strong>Wallet</strong></li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>Reference Number: <strong>$refid</strong></li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>Current Balance: <strong>$bala</strong></li>
//                        <li style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;Margin-bottom:15px;color:#333333;font-size:14px'>Token(For Electricity only): <strong>$tran2</strong></li>
//                       </ul><br></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//             </tr>
//           </table></td>
//         </tr>
//       </table>
//       <table class='es-footer' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
//         <tr>
//          <td align='center' style='padding:0;Margin:0'>
//           <table class='es-footer-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' align='center'>
//             <tr>
//              <td align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td align='left' style='padding:0;Margin:0;width:560px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td style='padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0' align='center'>
//                       <table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                         <tr>
//                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:40px'><img title='Facebook' src='https://rszomp.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png' alt='Fb' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
//                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:40px'><img title='Twitter' src='https://rszomp.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png' alt='Tw' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
//                          <td valign='top' align='center' style='padding:0;Margin:0;padding-right:40px'><img title='Instagram' src='https://rszomp.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png' alt='Inst' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
//                          <td valign='top' align='center' style='padding:0;Margin:0'><img title='Youtube' src='https://rszomp.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png' alt='Yt' width='32' height='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></td>
//                         </tr>
//                       </table></td>
//                     </tr>
//                     <tr>
//                      <td align='center' style='padding:0;Margin:0;padding-bottom:35px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px'>Style Casual&nbsp;© 2021 Style Casual, Inc. All Rights Reserved.</p><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:18px;color:#333333;font-size:12px'>4562 Hazy Panda Limits, Chair Crossing, If you have any questions/issues, please contact us at&nbsp;<a href='mailto:info@5starcompany.com.ng' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#333333;font-size:12px'>info@</a>renomobilemoney.com<br>Thanks for choosing us<br></p></td>
//                     </tr>
//                     <tr>
//                      <td style='padding:0;Margin:0'>
//                       <table class='es-menu' width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                         <tr class='links'>
//                          <td style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0' width='33.33%' valign='top' align='center'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#999999;font-size:12px'>Visit Us </a></td>
//                          <td style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0;border-left:1px solid #cccccc' width='33.33%' valign='top' align='center'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#999999;font-size:12px'>Privacy Policy</a></td>
//                          <td style='Margin:0;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border:0;border-left:1px solid #cccccc' width='33.33%' valign='top' align='center'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#999999;font-size:12px'>Terms of Use</a></td>
//                         </tr>
//                       </table></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//             </tr>
//           </table></td>
//         </tr>
//       </table>  ";
//$body .= "  <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
//         <tr>
//          <td align='center' style='padding:0;Margin:0'>
//           <table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center'>
//             <tr>
//              <td align='left' style='padding:20px;Margin:0'>
//               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                 <tr>
//                  <td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
//                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
//                     <tr>
//                      <td class='es-infoblock' align='center' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px'><a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'></a>No longer want to receive these emails?&nbsp;<a href='' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'>Unsubscribe</a>.<a target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px'></a></p></td>
//                     </tr>
//                   </table></td>
//                 </tr>
//               </table></td>
//             </tr>
//           </table></td>
//         </tr>
//       </table></td>
//     </tr>
//   </table> ";
//$send = mail($to, $subject, $body, $headers);
//$send = mail($from, $subject, $body, $headers);
//
//


?>

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
