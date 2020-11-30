var tab = 1,
    tbottom = $(".tabs-bottom");

$('.tab-1').click(function () {
    $('.about').css('display','none');
    $('.lessons').css('display','block');
    1 != tab && (tbottom.css({
        width: 50
    }), setTimeout(function () {
        tbottom.css({
            width: 173,
            marginLeft: 7
        })
    }, 100), tab = 1);
});

$('.tab-2').click(function () {
    $('.about').css('display','block');
    $('.lessons').css('display','none');
    2 != tab && (tbottom.css({
        width: 50,
        marginLeft: 130
    }), setTimeout(function () {
        tbottom.css({
            width: 148,
            marginLeft: 197
        })
    }, 100), tab = 2);
});


var spark = {
    chart: {
        id: 'spark1',
        group: 'sparks',
        type: 'line',
        height: 100,
        sparkline: {
            enabled: true
        },
        dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 1,
            opacity: 0.2,
        }
    },
    series: [{
        data: week
    }],
    stroke: {
        curve: 'smooth',
        width: 3
    },
    colors: ['#E9908A'],
    tooltip: {
        theme: 'dark',
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function formatter(val) {
                    return '';
                }
            }
        }
    }
}
new ApexCharts(document.querySelector("#spark"), spark).render();
