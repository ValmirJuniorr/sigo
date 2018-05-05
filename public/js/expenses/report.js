$(document).ready(function () {
    $("#search_button_expenses").click(function () {
        var args = {
            start_date: $("#start_date").val(),
            end_date: $("#end_date").val(),
            expense_category_ids: $("#expense_category_ids").val()
        };

        $.ajax({
            type: 'GET',
            url: '/expense/report/result_resume_expense',
            data: args,
            success: function (data) {
                $("#tb_expenses tbody tr").remove();

                jQuery.each(data["expenses"],function(i, val) {

                    $('#tb_expenses').append(
                        '<tr>' +
                            '<td>' + val.id + '</td> ' +
                            '<td>' + val.price+ ' R$</td> ' +
                            '<td>' + val.description + ' R$</td> ' +
                            '<td>' + val.expense_category.name + '</td>' +
                            '<td>' + val.expire_expense_date + '</td>' +
                        '</tr>'
                    );
                });

                $('#total_price').text(data['total_price'] + " R$");

                console.log(data);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }
        });


    });
});