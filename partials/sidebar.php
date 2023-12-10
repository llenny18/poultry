

<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (report.php)
Contents:
1. Sidebar Partial

-->

<?php 
$global = new investClass();
$invests = $global->fetchInvestments();

$base = "feeds";
function isPageActive($page) {
    return strpos($_SERVER['REQUEST_URI'], $page) !== false;

}

function hasActivePage($invests) {
    foreach($invests as $invest) {
        if (isPageActive($invest['typeName'] . '.php')) {
            return true;
        }
    }
    return false;
}
?>

<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><h2 style="color: white; padding: revert; margin: revert;">POULTRY FARM</h2></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="<?= isPageActive('index.php') || isPageActive('report.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('index.php') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>
                                    <li class="<?= isPageActive('report.php') ? 'active' : ''; ?>"><a href="report.php">Reports</a></li>
                                </ul>
                            </li>
                           
                            <li class="<?= hasActivePage($invests) || isPageActive('disabledinvestment.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Investments</span></a>
                                <ul class="collapse">
                                    <?php foreach($invests as $invest) { ?>
                                        <li class="<?= isPageActive($invest['typeName'] . '.php') ? 'active' : ''; ?>">
                                            <a href="<?= $invest['typeName'] . '.php' ?>"><?= $invest['typeName'] ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="<?= isPageActive('disabledinvestment.php') ? 'active' : ''; ?>"><a href="disabledinvestment.php">Record Archives</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('piglist.php') || isPageActive('pigsold.php') || isPageActive('pigprice.php') || isPageActive('archpigsold.php') || isPageActive('archpigprice.php') || isPageActive('archpigsold.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-paw"></i>
                                    <span>Pigs</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('piglist.php') ? 'active' : ''; ?>"><a href="piglist.php">Pigs List</a></li>
                                    <li class="<?= isPageActive('archpiglist.php') ? 'active' : ''; ?>"><a href="archpiglist.php">Archived Pigs List</a></li>
                                    <li class="<?= isPageActive('pigsold.php') ? 'active' : ''; ?>"><a href="pigsold.php">Pigs Sold</a></li>
                                    <li class="<?= isPageActive('archpigsold.php') ? 'active' : ''; ?>"><a href="archpigsold.php">Archived Pigs Sold</a></li>
                                    <li class="<?= isPageActive('pigprice.php') ? 'active' : ''; ?>"><a href="pigprice.php">Pig Price</a></li>
                                    <li class="<?= isPageActive('archpigprice.php') ? 'active' : ''; ?>"><a href="archpigprice.php">Archived Pig Price</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('paperlist.php') || isPageActive('archpaperlist.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-envelope"></i>
                                    <span>Papers</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('paperlist.php') ? 'active' : ''; ?>"><a href="paperlist.php">Papers List</a></li>
                                    <li class="<?= isPageActive('archpaperlist.php') ? 'active' : ''; ?>"><a href="archpaperlist.php">Archived Papers List</a></li>
                                </ul>
                            </li>
                            
                            <li class="<?= isPageActive('userlist.php') || isPageActive('disabledusers.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i>
                                    <span>Manage Users</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('userlist.php') ? 'active' : ''; ?>"><a href="userlist.php">Users List</a></li>
                                    <li class="<?= isPageActive('disabledusers.php') ? 'active' : ''; ?>"><a href="disabledusers.php">Disabled Accounts</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('logout.php') ? 'active' : ''; ?>"> <a href="logout.php"><i class="ti-back-left"></i> <span>Logout</span></a></li>
                       
                        </ul>
                    </nav>
                </div>
            </div>
        </div>