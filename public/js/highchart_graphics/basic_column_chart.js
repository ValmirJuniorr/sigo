function basic_column_chart(id,url,args,name) {
    $.ajax({
        type: 'GET',
        url: url,
        data: args,
        success: function( data ){

            console.log(data);

            Highcharts.chart(id, {
                chart: {
                    type: 'column'
                },
                title: {
                    text: name
                },
                xAxis: {
                    categories: data['name']
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total em Reais (R$)'
                    }
                },
                tooltip: {
                    formatter: function() {
                        var s = '<b>'+ this.x +'</b>',
                        sum = 0;

                        $.each(this.points, function(i, point) {
                            sum += point.y;
                        });


                        $.each(this.points, function(i, point) {
                            s += '<br/>'+ point.series.name +' : ' + point.y + ' R$ <b>(' + ((point.y / sum) * 100).toFixed(2) + " %)</b>" ;
                        });

                        s += '<br/>Total: '+sum + ' R$'

                        return s;
                    },
                    shared: true
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: [
                    {
                        name: 'Margem de Contribuição',
                        data: data['price']
                    },
                    {
                        name: 'Custo',
                        data: data['cost_price']
                    }
                ]
            });


            /*Highcharts.chart(id, {
                chart: {
                    type: 'column'
                },
                title: {
                    text:  name
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total em Reais (R$)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: 'Receita Total por Operação : <b>{point.y:.1f} R$</b>'
                },
                series: [{
                    name: 'Population',
                    data: data ,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });*/
        }
    });


}