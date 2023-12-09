
<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (editpaper.php)
Contents:
1. Editing and Updating of Paper

-->


<?php require("./controller/db.php"); 
if(!isset($_SESSION['u_id'])){ redirect("./login.php");}


$userget = new getPaperListByID();
$listID = $_GET['pid'];
$listInfo = $userget->getListbyID($listID);


$editPaper = new editImageClass();

if(isset($_POST['edit_paper'])){
$pid = $_POST['pid'];
$pType = $_POST['pType'];

$imgData = file_get_contents($_FILES['pImage']['tmp_name']);
$imgType = $_FILES['pImage']['type'];
$sql = "INSERT INTO tbl_image(imageType ,imageData) VALUES(?, ?)";

    

$editPaper->editPaperbyID($pType,$imgData,$pid);
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
                                        <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Paper ID</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" id="validationCustomUsername" readonly name="pid"  placeholder="0"  value="<?= $listInfo['pid'] ?>"  aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Paper Type</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                                                        </div>
                                                        <select name="pType" class="form-control" aria-label="Default select example">
                                                            <option>Choose Paper Type</option>
                                                            <option  value="1">Receipt</option>
                                                            <option  value="2">Documents</option>
                                                            <option  value="3">Legal Paper</option>
                                                        </select><div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Paper Description</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        <textarea name="" id="" cols="30" rows="10" class="form-control" id="validationCustomUsername"  name="pDesc"  placeholder="0"  aria-describedby="inputGroupPrepend" required=""><?= $listInfo['pd'] ?></textarea>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustomUsername">Paper Image</label>
                                                    <embed src="data:application/pdf;base64,<?php echo base64_encode($listInfo['pi']) ?>" type="application/pdf" style="height:100%;width:100%"/>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-file-image-o" aria-hidden="true"></i></span>
                                                        </div>
                                                        <input type="file" class="form-control" id="validationCustomUsername"  name="pImage"  placeholder="0"  value="<?= $listInfo['pid'] ?>"  aria-describedby="inputGroupPrepend" required="">
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
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
                                            <button class="btn btn-primary" type="submit" name="edit_paper">Submit form</button>
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
