
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (editpigsold.php)
Contents:
1. Editing and Updating of Pigs Sold

-->


<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$recordget = new recordGet2();
$soldID = $_GET['soldid'];
$soldInfo = $recordget->getRecordbyID($soldID);

$pigPrice = new editPigSoldClass();

if(isset($_POST['edit_pigsold'])){
    $sID = $_GET['soldid'];
    $soldCount = $_POST['soldCount'];
    $priceID = $_POST['priceID'];
    $houseID = $_POST['houseID'];


    $pigPrice->editPigSoldbyID($sID, $soldCount, $priceID, $houseID);
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
                                        <h4 class="header-title">Edit Pig Sold Record</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Pigs Count</label>
                                                    <input type="text" name="soldCount" class="form-control" id="validationCustom01" placeholder="First name" value="<?= $soldInfo['soldCount'] ?>"  required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">House ID</label>
                                                    <input type="text" name="houseID" class="form-control" id="validationCustom02" placeholder="Last name" value="<?= $soldInfo['houseID'] ?>" required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">Price</label>
                                                    <div class="input-group">
                                                        
                                                        <select name="priceID" class="form-control" aria-label="Default select example">
                                                            <option>Choose User Type</option>
                                                            <option  value="1">130.87</option>
                                                            <option  value="2">124.87</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            
                                            <button class="btn btn-primary" type="submit" name="edit_pigsold">Submit form</button>
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
