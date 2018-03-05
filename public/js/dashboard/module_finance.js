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


    $.ajax({
        type: 'GET',
        url: '/expense/expense_by_day',
        data: {},
        success: function( data ){

            Highcharts.chart('line_chart_resume_expense_per_day', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        month: '%e. %b',
                        year: '%b'
                    },
                    title: {
                        text: 'Date'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Valor Total (R$)'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e. %b}: {point.y:.2f} R$'
                },

                plotOptions: {
                    spline: {
                        marker: {
                            enabled: true
                        }
                    }
                },

                series: [{
                    name: 'Gasto Total (dia)',
                    // Define the data points. All series have a dummy year
                    // of 1970/71 in order to be compared on the same x axis. Note
                    // that in JavaScript, months start at 0 for January, 1 for February etc.
                    data: data
                }]
            });
            // console.log(data);
        }
    });

    //Add row to table
    $.ajax({
        type: 'GET',
        url: '/expense/last_expenses',
        data: {},
        success: function( data ){
            jQuery.each(data['last_expense'], function(i, val) {
                date = new Date(val.expire_expense_date);
                date_now = new Date();
                $('#table_last_expenses').append(
                    '<tr> <td>'+ val.id+'</td> <td> ' +
                    val.expire_expense_date + '</td> <td> '+
                    val.price+' R$</td> <td>'+
                    val.description.substring(1,10) +"..."+'</td>' +
                    '<td><span style="font-weight: bold;">' +
                    val.expense_category.name+'</span></td><td class="center-elements">' +
                    '<a class="btn btn-primary btn-sm ad-click-event"  href="/expense/show_expense?id= ' + window.btoa(val.id)+ '">' +
                    '<i class="fa fa-edit"></i></a></td></tr>');
            });

            jQuery.each(data['next_expense'], function(i, val) {
                date = new Date(val.expire_expense_date);
                date_now = new Date();
                $('#table_next_expenses').append('<tr> <td>'+ val.id+'</td> <td> ' + val.expire_expense_date + '</td> <td> '+ val.price+' R$</td> <td>'+ val.description.substring(1,10) +"..."+'</td> <td><span style="font-weight: bold;">'+val.expense_category.name+'</span></td><td class="center-elements"><a class="btn btn-primary btn-sm ad-click-event"  href="/expense/show_expense?id= ' + window.btoa(val.id)+ '"><i class="fa fa-edit"></i></a></td></tr>');
            });
        }
    });
});