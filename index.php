<!--
Developers: Aliester Alinsunurin, Allen Eidrian S. Ramos
Application Type: Poultry and Piggery Financial Management System

This is the Home File (index.php)
Contents:
1. Javascript based graphs for Data handling dynamically connected from MYSQL Database
2. Summarization of Business Expenses and Profits

-->
<?php require("./controller/db.php"); if(!isset($_SESSION['u_id'])){ redirect("./login.php");}

$pigsChart  = new getPigCounts();
$pigsChartDeceased  = new getPigDeceased();
$pigsChartExpenses = new getExpenses();
$pigsChartEstimate  = new getEstimatedProfit();
$pigsChartPercent = new getPercentRate();

echo "<script>console.log(".json_encode($pigsChartEstimate->getList1()).")</script>"
?>
<html class="no-js" lang="en">

<head>
<?php include("./partials/head.php"); ?>
    
</head>

<body onload="startTime()">
    
    <div class="page-container">
        <!-- sidebar menu partial -->
    <?php include("./partials/sidebar.php"); ?>
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include("./partials/header.php"); ?>
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pigs Count</h4>
                                        Per Month - This Year 
                                    </div>
                                </div>
                                <canvas id="coin_sales4" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Estimated Profit</h4>
                                        Per Month - This Year
                                    </div>
                                </div>
                                <canvas id="coin_sales5" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Percent Rate of Profit</h4>
                                        Per Month - This Year
                                    </div>
                                </div>
                                <canvas id="coin_sales6" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pig deceased</h4>
                                        Per Month - This Year
                                    </div>
                                </div>
                                <canvas id="coin_sales7" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Monthly Revenue</h4>
                            <select class="custome-select border-0 pr-3">
                                <option selected="">Last 30 Days</option>
                                <option value="0">Last 30 Days</option>
                            </select>
                        </div>
                        <div id="visitor_graph"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer partial-->
    <?php include("./partials/footer.php"); ?>
    </div>
  
    <!-- offset partial for notifications -->
    <?php include "./partials/offset.php"; ?>
    <!-- offset area end -->

    <!--Scripts used for system functionalities Developers decided to used downloaded CDN in case of internet/Power outage-->
    <!-- jquery latest version -->
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
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
/*--------------  coin_sales4 bar chart start ------------*/
if ($('#coin_sales4').length) {
    var ctx = document.getElementById("coin_sales4").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: "Pigs",
                data: <?php echo json_encode($pigsChart->getList()) ?>,
                backgroundColor: [
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#51F051',
                    '#39A839'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales4 bar chart End ------------*/

/*--------------  coin_sales5 bar chart start ------------*/
if ($('#coin_sales5').length) {
    var ctx = document.getElementById("coin_sales5").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: "Pigs",
                data: <?php echo json_encode($pigsChartEstimate->getList()) ?>,
                backgroundColor: [
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#51F051',
                    '#39A839'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales5 bar chart End ------------*/

/*--------------  coin_sales6 bar chart start ------------*/
if ($('#coin_sales6').length) {
    var ctx = document.getElementById("coin_sales6").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: "Percent Rate",
                data: <?php echo json_encode($pigsChartPercent->getList()) ?>,
                backgroundColor: [
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#51F051',
                    '#39A839'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales6 bar chart End ------------*/

/*--------------  coin_sales7 bar chart start ------------*/
if ($('#coin_sales7').length) {
    var ctx = document.getElementById("coin_sales7").getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: "Pigs",
                data: <?php echo json_encode($pigsChartDeceased->getList()) ?>,
                backgroundColor: [
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#39A839',
                    '#51F051',
                    '#51F051',
                    '#39A839'
                ]
            }]
        },
        // Configuration options go here
        options: {
            legend: {
                display: false
            },
            animation: {
                easing: "easeInOutBack"
            },
            scales: {
                yAxes: [{
                    display: !1,
                    ticks: {
                        fontColor: "#cccccc",
                        beginAtZero: !0,
                        padding: 0
                    },
                    gridLines: {
                        zeroLineColor: "transparent"
                    }
                }],
                xAxes: [{
                    display: !1,
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: !1
                    },
                    ticks: {
                        beginAtZero: !0,
                        padding: 0,
                        fontColor: "#cccccc"
                    }
                }]
            }
        }
    });
}

/*--------------  coin_sales7 bar chart End ------------*/


if ($('#visitor_graph').length) {

Highcharts.chart('visitor_graph', {
    chart: {
        type: 'areaspline'
    },
    title: false,
    yAxis: {
        title: false,
        gridLineColor: '#fbf7f7',
        gridLineWidth: 1
    },
    xAxis: {
        gridLineColor: '#fbf7f7',
        gridLineWidth: 1
    },
    series: [{
            name: 'Estimated PRofit',
            data: <?php echo json_encode($pigsChartEstimate->getList2()) ?>, 
            fillColor: 'rgba(57, 249, 79, 0.5)',
            lineColor: 'transparent'
        },
        {
            name: 'Total Real Profit',
            data: <?php echo json_encode($pigsChartEstimate->getList1()) ?>,
            fillColor: 'rgba(0, 186, 68, 0.5)',
            lineColor: 'transparent'
        }
    ]
});
}
    </script>
</body>

</html>
