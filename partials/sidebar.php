<?php
function isPageActive($page) {
    return strpos($_SERVER['REQUEST_URI'], $page) !== false;
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
                           
                            <li class="<?= isPageActive('feeds.php') || isPageActive('misc.php') || isPageActive('payroll.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Cash Flow</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('feeds.php') ? 'active' : ''; ?>"><a href="feeds.php">Feeds & Investments</a></li>
                                    <li class="<?= isPageActive('misc.php') ? 'active' : ''; ?>"><a href="misc.php">Miscellaneous</a></li>
                                    <li class="<?= isPageActive('payroll.php') ? 'active' : ''; ?>"><a href="payroll.php">Employee Wages</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('piglist.php') || isPageActive('pigsold.php') || isPageActive('pigprice.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Pigs</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('piglist.php') ? 'active' : ''; ?>"><a href="piglist.php">Pigs List</a></li>
                                    <li class="<?= isPageActive('pigsold.php') ? 'active' : ''; ?>"><a href="pigsold.php">Pigs Sold</a></li>
                                    <li class="<?= isPageActive('pigprice.php') ? 'active' : ''; ?>"><a href="pigprice.php">Pig Price</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('paperlist.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Papers</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('paperlist.php') ? 'active' : ''; ?>"><a href="paperlist.php">Papers List</a></li>
                                </ul>
                            </li>
                            
                            <li class="<?= isPageActive('userlist.php') || isPageActive('disabledusers.php') ? 'active' : ''; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Manage Users</span></a>
                                <ul class="collapse">
                                    <li class="<?= isPageActive('userlist.php') ? 'active' : ''; ?>"><a href="userlist.php">Users List</a></li>
                                    <li class="<?= isPageActive('disabledusers.php') ? 'active' : ''; ?>"><a href="disabledusers.php">Disabled Accounts</a></li>
                                </ul>
                            </li>
                            <li class="<?= isPageActive('record.php') ? 'active' : ''; ?>"> <a href="record.php"><i class="ti-receipt"></i> <span>Records of Profits</span></a></li>
                            <li class="<?= isPageActive('logout.php') ? 'active' : ''; ?>"> <a href="logout.php"><i class="ti-back-left"></i> <span>Logout</span></a></li>
                       
                        </ul>
                    </nav>
                </div>
            </div>
        </div>