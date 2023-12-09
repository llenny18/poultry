<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$addrecord = new addInvestClass();

if(isset($_POST['add_invest'])){
    $p_name = $_POST['p_name'];
    $p_typeID = $_POST['p_typeID'];
    $p_recordPrice = $_POST['p_recordPrice'];

    $addrecord->addInvestments($p_name, $p_typeID, $p_recordPrice);
}

?>

<head>
<?php include("./partials/head.php"); ?>
    
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
   
    <!-- preloader area end -->
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
                                        <h4 class="header-title">Add Investment Record</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Investment Name</label>
                                                    <input type="text" name="p_name" class="form-control" id="validationCustom01" placeholder="Investment name"   required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustomUsername">Investment Type</label>
                                                    <div class="input-group">
                                                        
                                                        <select name="p_typeID" class="form-control" aria-label="Default select example">
                                                            <option>Choose Investment Type</option>
                                                            <option  value="1">Bills</option>
                                                            <option  value="2">Medicine & Vitamins</option>
                                                            <option  value="3">E-Wages</option>
                                                            <option  value="4">Miscellaneous</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Total Price</label>
                                                    <input type="text" class="form-control" id="validationCustom03" name="p_recordPrice" placeholder="Total Price" required pattern="^\d+(\.\d{1,2})?$">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid amount
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
                                            <button class="btn btn-primary" type="submit" name="add_invest">Submit form</button>
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
    <!-- jquery latest version -->
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
