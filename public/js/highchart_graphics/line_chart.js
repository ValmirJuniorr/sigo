function line_chart(id,url,args) {
    $.ajax({
        type: 'GET',
        url: url,
        data: args,
        success: function (data) {

            Highcharts.chart(id, {
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

                series: [
                    {
                        name: 'Despesa Total',
                        data: data['expenses']
                    },
                    {
                        name: 'Receita Total',
                        data: data['transactions_total']
                    },{
                        name: 'Margem de Contribuição Total',
                        data: data['transactions_parcial']
                    }
                ]
            });
             console.log(data);
        }
    });

}



