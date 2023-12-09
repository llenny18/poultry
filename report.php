<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (report.php)
Contents:
1. Reports of profits based on the data used in charset

-->

<?php require("./controller/db.php");
$global = new getProfitClass();
$yearProfits = $global->getProfit() ?? [];

$gross = new getGrossClass();
$totalGross = $gross->getGross();


?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laroza Poultry Farm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="./assets/images/icon/piggerylogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
   
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
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
            <!-- header area end -->
            <!-- page title area start -->
          
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    
                    <div class="col-lg-12 mt-5">
                                  
                        <div class="card"> <h1 class="mt-3 text-center">Gross Profit is: PHP <?= $totalGross['profits'] ?> </h1><hr>
                            <div class="card-body">
                                <h4 class="header-title">Profits Report Records Yearly</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <table id="dataTable3" class="text-center">
                                            <thead class="text-uppercase bg-info">
                                                <tr class="text-white">
                                                    <th scope="col">YearID</th>
                                                    <th scope="col">Year</th>
                                                    <th scope="col">Total Profit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $autoIncrement = 1;
                                                foreach($yearProfits as $yearProfit){ ?>
                                                <tr>
                                                    <th scope="row"><?= $autoIncrement++; ?></th>
                                                    <td><?= $yearProfit['ProfitYear']; ?></td>
                                                    <td><?= $yearProfit['TotalProfit']; ?></td>
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="main-content-inner">
                <!-- bar chart start -->
                <div class="row">
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div id="ambarchart6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bar chart end -->
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
   <?php include "./partials/offset.php"; ?>
        <script>
if ($('#ambarchart1').length) {
    var chart = AmCharts.makeChart("ambarchart1", {
        "theme": "light",
        "type": "serial",
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 4,
            "color": "#fff"
        },
        "dataProvider": [{
            "country": "USA",
            "year2004": 3.5,
            "year2005": 4.2,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }, {
            "country": "UK",
            "year2004": 1.7,
            "year2005": 3.1,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }, {
            "country": "Canada",
            "year2004": 2.8,
            "year2005": 2.9,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }, {
            "country": "Japan",
            "year2004": 2.6,
            "year2005": 2.3,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }, {
            "country": "France",
            "year2004": 1.4,
            "year2005": 2.1,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }, {
            "country": "Brazil",
            "year2004": 2.6,
            "year2005": 4.9,
            "color": "#bfbffd",
            "color2": "#7474F0"
        }],
        "valueAxes": [{
            "unit": "%",
            "position": "left",
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "GDP grow in [[category]] (2017): <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "fillColorsField": "color",
            "lineAlpha": 0.2,
            "title": "2017",
            "type": "column",
            "valueField": "year2004"
        }, {
            "balloonText": "GDP grow in [[category]] (2018): <b>[[value]]</b>",
            "fillAlphas": 0.9,
            "fillColorsField": "color2",
            "lineAlpha": 0.2,
            "title": "2018",
            "type": "column",
            "clustered": false,
            "columnWidth": 0.5,
            "valueField": "year2005"
        }],
        "plotAreaFillAlphas": 0.1,
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": false
        }

    });
}


        </script>
           <!--Scripts used for system functionalities Developers decided to used downloaded CDN in case of internet/Power outage--><!-- jquery latest version -->
       <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>\

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
