
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (adduser.php)
Contents:
1. Inserting of Users

-->

<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$addemployee = new adduserClass();

if(isset($_POST['add_emp'])){
$fname = $_POST['ufname'];
$lname = $_POST['ulname'];
$rid = $_POST['urole'];
$uname = $_POST['uname'];
$pass = $_POST['upass'];
$cnum = $_POST['cnum'];
$email = $_POST['email'];

    $addemployee->addUserbyID($fname,$lname,$rid,$uname,$pass,$cnum,$email);
}

?>

<head>
<?php include("./partials/head.php"); ?>
    
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
    <?php include("./partials/sidebar.php"); ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include("./partials/header.php"); ?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="container">
                        <div class="row">
                           
                          
                            <!-- Server side start -->
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">Add User Employee Account</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">First name</label>
                                                    <input type="text" name="ufname" class="form-control" id="validationCustom01" placeholder="First name"   required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">Last name</label>
                                                    <input type="text" name="ulname" class="form-control" id="validationCustom02" placeholder="Last name"  required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">User Role</label>
                                                    <div class="input-group">
                                                        
                                                        <select name="urole" class="form-control" aria-label="Default select example">
                                                            <option>Choose User Type</option>
                                                            <option  value="2">Employee</option>
                                                            <option  value="3">Disabled</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-envelope-square" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername"  name="uname" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Password</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername"  name="upass"  placeholder="Password" aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Contact Number</label>
                                                    <input type="text" class="form-control" id="validationCustom03" name="cnum" placeholder="+639" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Email</label>
                                                    <input type="email" class="form-control" id="validationCustom03" name="email"  placeholder="@email" required="">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                   
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="add_emp">Submit form</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Server side end -->
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include("./partials/footer.php"); ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start --><?php include "./partials/offset.php"; ?>
    <!-- offset area end -->
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
