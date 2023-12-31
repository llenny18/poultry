
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (login.php)
Contents:
1. Login Page for users

-->


<?php require("./controller/db.php");
$loginFunc = new loginClass();

if(isset($_POST['uLogin'])){
    $uname = $_POST['username'];
    $upass = hash('sha256', $_POST['upassword']);
    $loginFunc->userLogin($uname, $upass);

}

?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Log In - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="./assets/images/icon/piggerylogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body onload="startTime()">

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 offset-xl-8 col-lg-6 offset-lg-6">
                    
                    <div class="login-box-s2 ptb--100">
                        
                        <form method="post">
                        <div style=" text-align: center; padding: 10px;"><img src="./assets/images/icon/piggerylogo.png" width="150" alt="" ></div>
                            <div class="login-form-head">
                                <h4>Log in</h4>
                                <p>Hello there, Log in Now!</p>
                            </div>
                            <div class="login-form-body">
                                <div class="form-gp">
                                    <label for="exampleInputName1">User Name</label>
                                    <input type="text" id="exampleInputName1" name="username">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" id="exampleInputEmail1" name="upassword">
                                    <i class="ti-lock"></i>
                                </div>
                               
                                <div class="submit-btn-area">
                                    <button id="form_submit" type="submit" name="uLogin">Log In <i class="ti-arrow-right"></i></button>
                                    
                                </div>
                                <div class="form-footer text-center mt-5">
                                    <p class="text-muted">Don't have an account? <a href="signup.html">Sign up now!</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->

        <!--Scripts used for system functionalities Developers decided to used downloaded CDN in case of internet/Power outage--><!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>