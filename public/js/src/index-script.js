main = {

    initDashboardPageCharts: function(color1, color2) {

        gradientChartOptionsConfigurationWithTooltip = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                display: false
            },
            responsive: true,
            scales: {
                yAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(29,140,248,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 125,
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                }],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(225,78,202,0.0)',
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9a9a9a"
                    }
                }]
            }
        };

        var ctx = document.getElementById("chartLineFirst").getContext("2d");

        var data = {
            labels: ['', '', '', '', '', '', '', '', ''],
            datasets: [{
                label: "Data",
                fill: true,
                backgroundColor: color1,
                borderColor: color1,
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: color1,
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: color1,
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 0,
                data: [90, 75, 95, 90, 100, 110, 110, 140],
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltip
        });

        var ctx = document.getElementById("chartLineSecond").getContext("2d");

        var data = {
            labels: ['', '', '', '', '', '', '', '', ''],
            datasets: [{
                label: "Data",
                fill: true,
                backgroundColor: color2,
                borderColor: color2,
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: color2,
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: color2,
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 0,
                data: [80, 90, 110, 120, 120, 130, 150, 160],
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltip
        });

    },

};