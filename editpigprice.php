
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (editpigprice.php)
Contents:
1. Editing and Updating of Pigs Price

-->


<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$recordget = new recordGet1();
$priceID = $_GET['pid'];
$priceInfo = $recordget->getRecordbyID($priceID);

$pigPrice = new editPigPriceClass();

if(isset($_POST['edit_pigprice'])){
    $pid = $_GET['pid'];
    $priceDate = $_POST['priceDate'];
    $price = $_POST['price'];


    $pigPrice->editPigPricebyID($pid, $priceDate, $price);
}

?>

<head>
<?php include("./partials/head.php"); ?>
    
</head>

<body onload="startTime()">
  
    
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
                                        <h4 class="header-title">Edit Pigs Price</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Price</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-money" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername"  name="price" placeholder="Price" value="<?= $priceInfo['price'] ?>" aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Date</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" id="validationCustomUsername"  name="priceDate"  placeholder="date" value="<?= $priceInfo['priceDate'] ?>" aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a valid Date.
                                                        </div>
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
                                            <button class="btn btn-primary" type="submit" name="edit_pigprice">Submit form</button>
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
