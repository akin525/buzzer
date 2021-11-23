
<?php
include_once ("database.php");
if (isset($_SESSION['email'])) {

    print "
                    <script>
                        window.location = 'dashboard.php';
                    </script>
                    ";

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $query= "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
    $result = $con->query($query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $result = mysqli_query($con, $query);


        $_SESSION['email'] = $email;
        $_SESSION['login_user']=$email;
        print "
                    <script>
                        window.location = 'dashboard.php';
                    </script>
                    ";
//        }
    } else {
        $errormsg = "<div class='alert alert-danger'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <i class='fa fa-ban-circle'></i><strong>Incorrect login details </br></strong></div>"; //printing error if found in validation
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<!--<script>-->
<!--    if (window.location.protocol == "http:") {-->
<!--        console.log("You are not connected with a secure connection.")-->
<!--        console.log("Reloading the page to a Secure Connection...")-->
<!--        window.location = document.URL.replace("http://", "https://");-->
<!--    }-->
<!---->
<!--    if (window.location.protocol == "https:") {-->
<!--        console.log("You are connected with a secure connection.")-->
<!--    }-->
<!--</script>-->
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
                        <img width="110" src="images/logo/logo_icon.png" alt="#" />
                    </div>
                </div>

                <div class="login_form">
                    <h3 class="text-center text-success">THEBUZZER LOG-IN</h3>
                    <br>
                    <br>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                        <?php
                        if(!empty($errormsg))
                        {
                            print $errormsg;

                        }
                        ?>
                    <fieldset>
                            <div class="field">
                                <label class="label_field">Email</label>
                                <input type="email" name="email" id="email" placeholder="E-mail" required />
                            </div>
                            <div class="field">
                                <label class="label_field">Password</label>
                                <input type="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="field">
                                <label class="label_field hidden">hidden label</label>
                                <label class="form-check-label"><input type="checkbox" id="rememberMe" class="form-check-input"> Remember Me</label>
                                <a class="forgot" href="">Forgotten Password?</a>
                                <button type="submit" class="btn btn-send w3-round-large">Sign-in</button>
                            </div>
                            <div class="field margin_0">
                                <label class="label_field hidden">hidden label</label>
                                <a href="Signup.php" ><button class="main_bt">Sign Up</button></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const rmCheck = document.getElementById("rememberMe"),
        emailInput = document.getElementById("email");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
        rmCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
    } else {
        rmCheck.removeAttribute("checked");
        emailInput.value = "";
    }

    function lsRememberMe() {
        if (rmCheck.checked && emailInput.value !== "") {
            localStorage.username = emailInput.value;
            localStorage.checkbox = rmCheck.value;
        } else {
            localStorage.username = "";
            localStorage.checkbox = "";
        }
    }
</script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- wow animation -->
<script src="js/animate.js"></script>
<!-- select country -->
<script src="js/bootstrap-select.js"></script>
<!-- nice scrollbar -->
<script src="js/perfect-scrollbar.min.js"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>
</html>