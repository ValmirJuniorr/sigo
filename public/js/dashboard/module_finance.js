$(document).ready(function () {


    $.ajax({
        type: 'GET',
        url: '/expense/report_expense_by_cateogry',
        data: {},
        success: function( data ){

            Highcharts.chart('pie_chart_resume_categories', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Gráfico Categoria de Despesa'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: data
                }]
            });


            console.log(data);
        }
    });

    Highcharts.chart('line_chart_resume_expense_per_day', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly Average Temperature'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12','13','14','15']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 0, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6,2,3,4]
        }   ]
    });


    $.ajax({
        type: 'GET',
        url: '/expense/last_expenses',
        data: {},
        success: function( data ){
            jQuery.each(data, function(i, val) {
                $('#table_lasts_expenses').append('<tr> <td>'+ val.id+'</td> <td> ' + val.expire_expense_date + '</td> <td> '+ val.price+' R$</td> <td>'+ val.description +'</td> <td><span class="label label-success">Aprovado</span></td> </tr>');
                $('#table_lasts_expenses').append('<tr> <td>'+ val.id+'</td> <td> ' + val.expire_expense_date + '</td> <td> '+ val.price+' R$</td> <td>'+ val.description +'</td> <td><span class="label label-success">Aprovado</span></td> </tr>');
                $('#table_lasts_expenses').append('<tr> <td>'+ val.id+'</td> <td> ' + val.expire_expense_date + '</td> <td> '+ val.price+' R$</td> <td>'+ val.description +'</td> <td><span class="label label-success">Aprovado</span></td> </tr>');
                $('#table_lasts_expenses').append('<tr> <td>'+ val.id+'</td> <td> ' + val.expire_expense_date + '</td> <td> '+ val.price+' R$</td> <td>'+ val.description +'</td> <td><span class="label label-success">Aprovado</span></td> </tr>');
            });
            console.log(data);
        }
    });

    //Add row to table



});