

/*--------------  bar chart 08 amchart start ------------*/

/*--------------  bar chart 08 amchart END ------------*/
/*--------------  bar chart 09 amchart start ------------*/
if ($('#ambarchart2').length) {
    var chart = AmCharts.makeChart("ambarchart2", {
        "type": "serial",
        "addClassNames": true,
        "theme": "light",
        "autoMargins": false,
        "marginLeft": 30,
        "marginRight": 8,
        "marginTop": 10,
        "marginBottom": 26,
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 8,
            "color": "#ffffff"
        },

        "dataProvider": [{
            "year": 2013,
            "income": 23.5,
            "expenses": 21.1,
            "color": "#7474f0"
        }, {
            "year": 2014,
            "income": 26.2,
            "expenses": 30.5,
            "color": "#7474f0"
        }, {
            "year": 2015,
            "income": 30.1,
            "expenses": 34.9,
            "color": "#7474f0"
        }, {
            "year": 2016,
            "income": 29.5,
            "expenses": 31.1,
            "color": "#7474f0"
        }, {
            "year": 2017,
            "income": 30.6,
            "expenses": 28.2,
            "dashLengthLine": 5,
            "color": "#7474f0"
        }, {
            "year": 2018,
            "income": 34.1,
            "expenses": 32.9,
            "dashLengthColumn": 5,
            "alpha": 0.2,
            "additional": "(projection)"
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "startDuration": 1,
        "graphs": [{
            "alphaField": "alpha",
            "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "title": "Income",
            "type": "column",
            "valueField": "income",
            "dashLengthField": "dashLengthColumn"
        }, {
            "id": "graph2",
            "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
            "bullet": "round",
            "lineThickness": 3,
            "bulletSize": 7,
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "lineColor": "#AA59FE",
            "useLineColorForBulletBorder": true,
            "bulletBorderThickness": 3,
            "fillAlphas": 0,
            "lineAlpha": 1,
            "title": "Expenses",
            "valueField": "expenses",
            "dashLengthField": "dashLengthLine"
        }],
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "tickLength": 0
        },
        "export": {
            "enabled": false
        }
    });
}

/*--------------  bar chart 09 amchart END ------------*/
/*--------------  bar chart 10 amchart start ------------*/
if ($('#ambarchart3').length) {
    var chart = AmCharts.makeChart("ambarchart3", {
        "type": "serial",
        "theme": "light",
        "categoryField": "year",
        "rotate": true,
        "startDuration": 1,
        "categoryAxis": {
            "gridPosition": "start",
            "position": "left"
        },
        "trendLines": [],
        "graphs": [{
                "balloonText": "Income:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-1",
                "lineAlpha": 0.2,
                "title": "Income",
                "type": "column",
                "valueField": "income",
                "fillColorsField": "color"
            },
            {
                "balloonText": "Expenses:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-2",
                "lineAlpha": 0.2,
                "title": "Expenses",
                "type": "column",
                "valueField": "expenses",
                "fillColorsField": "color2"
            }
        ],
        "guides": [],
        "valueAxes": [{
            "id": "ValueAxis-1",
            "position": "top",
            "axisAlpha": 0
        }],
        "allLabels": [],
        "balloon": {},
        "titles": [],
        "dataProvider": [{
                "year": 2014,
                "income": 23.5,
                "expenses": 18.1,
                "color": "#7474f0",
                "color2": "#C5C5FD"
            },
            {
                "year": 2015,
                "income": 26.2,
                "expenses": 22.8,
                "color": "#7474f0",
                "color2": "#C5C5FD"
            },
            {
                "year": 2016,
                "income": 30.1,
                "expenses": 23.9,
                "color": "#7474f0",
                "color2": "#C5C5FD"
            },
            {
                "year": 2017,
                "income": 29.5,
                "expenses": 25.1,
                "color": "#7474f0",
                "color2": "#C5C5FD"
            },
            {
                "year": 2018,
                "income": 24.6,
                "expenses": 25,
                "color": "#7474f0",
                "color2": "#C5C5FD"
            }
        ],
        "export": {
            "enabled": false
        }

    });
}
/*--------------  bar chart 10 amchart END ------------*/
/*--------------  bar chart 11 amchart start ------------*/
if ($('#ambarchart4').length) {
    var chart = AmCharts.makeChart("ambarchart4", {
        "type": "serial",
        "theme": "light",
        "marginRight": 70,
        "dataProvider": [{
            "country": "USA",
            "visits": 3025,
            "color": "#8918FE"
        }, {
            "country": "China",
            "visits": 1882,
            "color": "#7474F0"
        }, {
            "country": "Japan",
            "visits": 1809,
            "color": "#C5C5FD"
        }, {
            "country": "Germany",
            "visits": 1322,
            "color": "#952FFE"
        }, {
            "country": "UK",
            "visits": 1122,
            "color": "#7474F0"
        }, {
            "country": "France",
            "visits": 1114,
            "color": "#CBCBFD"
        }, {
            "country": "India",
            "visits": 984,
            "color": "#FD9C21"
        }, {
            "country": "Spain",
            "visits": 711,
            "color": "#0D8ECF"
        }, {
            "country": "Netherlands",
            "visits": 665,
            "color": "#0D52D1"
        }, {
            "country": "Russia",
            "visits": 580,
            "color": "#2A0CD0"
        }, {
            "country": "South Korea",
            "visits": 443,
            "color": "#8A0CCF"
        }, {
            "country": "Canada",
            "visits": 441,
            "color": "#9F43FE"
        }],
        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left",
            "title": false
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<b>[[category]]: [[value]]</b>",
            "fillColorsField": "color",
            "fillAlphas": 0.9,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45
        },
        "export": {
            "enabled": false
        }

    });
}
/*--------------  bar chart 11 amchart END ------------*/
/*--------------  bar chart 12 amchart start ------------*/
if ($('#ambarchart5').length) {
    var chart = AmCharts.makeChart("ambarchart5", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "name": "John",
            "points": 35654,
            "color": "#7F8DA9"
        }, {
            "name": "Damon",
            "points": 65456,
            "color": "#FEC514"
        }, {
            "name": "Patrick",
            "points": 45724,
            "color": "#952FFE"
        }, {
            "name": "Mark",
            "points": 23654,
            "color": "#8282F1"
        }, {
            "name": "Natasha",
            "points": 35654,
            "color": "#2599D4"
        }, {
            "name": "Adell",
            "points": 55456,
            "color": "#2563D6"
        }, {
            "name": "Alessandro",
            "points": 13654,
            "color": "#9524D4"
        }],
        "valueAxes": [{
            "maximum": 80000,
            "minimum": 0,
            "axisAlpha": 0,
            "dashLength": 4,
            "position": "left"
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
            "bulletOffset": 10,
            "bulletSize": 52,
            "colorField": "color",
            "cornerRadiusTop": 8,
            "customBulletField": "bullet",
            "fillAlphas": 0.8,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "points"
        }],
        "marginTop": 0,
        "marginRight": 0,
        "marginLeft": 0,
        "marginBottom": 0,
        "autoMargins": false,
        "categoryField": "name",
        "categoryAxis": {
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": true,
            "tickLength": 10,
            "color": "#fff"
        },
        "export": {
            "enabled": false
        }
    });
}
/*--------------  bar chart 12 amchart END ------------*/
/*--------------  bar chart 13 amchart start ------------*/
if ($('#ambarchart6').length) {
    var chart = AmCharts.makeChart("ambarchart6", {
        "type": "serial",
        "theme": "light",
        "handDrawn": true,
        "handDrawScatter": 3,
        "legend": {
            "useGraphSettings": true,
            "markerSize": 12,
            "valueWidth": 0,
            "verticalGap": 0
        },
        "dataProvider": [{
            "year": 2014,
            "income": 23.5,
            "expenses": 18.1,
            "color": "#952FFE"
        }, {
            "year": 2015,
            "income": 26.2,
            "expenses": 22.8,
            "color": "#5182DE"
        }, {
            "year": 2016,
            "income": 30.1,
            "expenses": 23.9,
            "color": "#8282F1"
        }, {
            "year": 2017,
            "income": 29.5,
            "expenses": 25.1,
            "color": "#B369FE"
        }, {
            "year": 2018,
            "income": 24.6,
            "expenses": 25,
            "color": "#51ADDD"
        }],
        "valueAxes": [{
            "minorGridAlpha": 0.08,
            "minorGridEnabled": true,
            "position": "top",
            "axisAlpha": 0
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "title": "Income",
            "type": "column",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "valueField": "income"
        }, {
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "lineColor": "#AA59FE",
            "bulletColor": "#FFFFFF",
            "useLineColorForBulletBorder": true,
            "fillAlphas": 0,
            "lineThickness": 2,
            "lineAlpha": 1,
            "bulletSize": 7,
            "title": "Expenses",
            "valueField": "expenses"
        }],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": false
        }

    });
}

/*--------------  bar chart 13 amchart END ------------*/

/*--------------  bar chart 14 highchart start ------------*/
if ($('#socialads').length) {

    Highcharts.chart('socialads', {
        chart: {
            type: 'column'
        },
        title: false,
        xAxis: {
            categories: ['FB', 'TW', 'INS', 'G+', 'LINKD']
        },
        colors: ['#F5CA3F', '#E5726D', '#12C599', '#5F73F2'],
        yAxis: {
            min: 0,
            title: false
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'column'
            }
        },
        series: [{
                name: 'Closed',
                data: [51, 48, 64, 48, 84]
            }, {
                name: 'Hold',
                data: [83, 84, 53, 81, 88]
            }, {
                name: 'Pending',
                data: [93, 84, 53, 53, 48]
            },
            {
                name: 'Active',
                data: [430, 312, 348, 254, 258]
            }
        ]
    });
}
/*--------------  bar chart 14 highchart END ------------*/