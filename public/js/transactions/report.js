$(document).ready(function () {
    $("#search_button_expense_transactino").click(function () {
        var args = {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            staff_id: $('#staff_id').val(),
            status_id: $("#status_id").val(),
        };

        $.ajax({
            type: 'GET',
            url: '/report/result_resume_transactions_report',
            data: args,
            success: function (data) {

                $("#transactions tbody tr").remove();

                jQuery.each(data['data'],function(i, val) {

                    $('#transactions').append(
                        '<tr>' +
                            '<td>' + val.id + '</td> ' +
                            '<td>' + val.price+ ' R$</td> ' +
                            '<td>' + val.cost_price + ' R$</td> ' +
                            '<td>' + val.customer_name + '</td>' +
                            '<td>' + val.procedure_name + '</td>' +
                            '<td>' + val.staff_name + '</td>' +
                            '<td>' + val.status_name + '</td>' +
                        '</tr>'
                    );
                });

                $('#total_price').text(data['total_price'] + " R$");
                $('#total_cost_price').text(data['total_cost_price'] + " R$");

                console.log(data);
            }
        });


    });
});