
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (editrecord.php)
Contents:
1. Editing and Updating of Investment Records

-->


<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$recordget = new recordGet();
$recordID = $_GET['recordID'];
$recordInfo = $recordget->getRecordbyID($recordID);

$editrecord = new editRecordClass();

if(isset($_POST['edit_invest'])){ 
    $recordIDnow = $_GET['recordID'];
    $Name = $_POST['Name'];
    $typeID = $_POST['typeID'];
    $recordPrice = $_POST['recordPrice'];


$editrecord->editRecbyID($recordIDnow, $Name, $typeID, $recordPrice);
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
                                        <h4 class="header-title">Edit Investment Record</h4>
                                        <form class="needs-validation" novalidate="" method="post">
                                            <div class="form-row">
                                                
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">Investment name</label>
                                                    <input type="text" name="Name" class="form-control" id="validationCustom01" placeholder="Investment name" value="<?= $recordInfo['Name'] ?>"  required="">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="validationCustomUsername">Investment Type</label>
                                                    <div class="input-group">
                                                        
                                                        <select name="typeID" class="form-control" aria-label="Default select example">
                                                            <option>Choose Investment Type</option>
                                                            <option <?php if($recordInfo['typeID']==1){ echo " selected "; } ?> value="1">Bills</option>
                                                            <option <?php if($recordInfo['typeID']==2){ echo " selected "; } ?>  value="2">Medicine & Vitamins</option>
                                                            <option <?php if($recordInfo['typeID']==3){ echo " selected "; } ?> value="3">E-Wages</option>
                                                            <option <?php if($recordInfo['typeID']==4){ echo " selected "; } ?>  value="4">Miscellaneous</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03">Total Price</label>
                                                    <input type="text" class="form-control" id="validationCustom03" name="recordPrice" value="<?= $recordInfo['recordPrice'] ?>" placeholder="Total Price" required pattern="^\d+(\.\d{1,2})?$">
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
                                            <button class="btn btn-primary" type="submit" name="edit_invest">Update Information</button>
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
