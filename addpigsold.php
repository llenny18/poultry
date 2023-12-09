
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (addpigsold.php)
Contents:
1. Inserting of Pigs Sold

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
                                        <h4 class="header-title">Add Pig Sold List</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Pigs Count</label>
                                                    <input type="text" name="ufname" class="form-control" id="validationCustom01" placeholder="First name"   required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">House ID</label>
                                                    <input type="text" name="ulname" class="form-control" id="validationCustom02" placeholder="Last name"  required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Price</label>
                                                    <div class="input-group">
                                                        
                                                        <select name="urole" class="form-control" aria-label="Default select example">
                                                            <option>Choose User Type</option>
                                                            <option  value="1">130.87</option>
                                                            <option  value="2">124.87</option>
                                                        </select>
                                                        
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
