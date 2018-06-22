











function updateTransaction(transaction_id) {
    $.ajax({
        type: 'GET',
        url: '/transaction/showTransaction',
        data:  {id:transaction_id},
        success: function (data) {
            $('#code').val(transaction_id);
            $('#value_procedure').val(data.price);
            $('#cost_price').val(data.cost_price);
            $('#staff_transaction').append('<option id="staff_transaction_clear" selected value="' + data.staff_id + '">' + data.staff + '</option>');
            $('#situation_transaction').append('<option id="situation_transaction_clear" selected value="' + data.paid_id + '">' + data.paid + '</option>');
            $('#status_transaction').append('<option id="status_transaction_clear" selected value="' + data.status_id + '">' + data.status + '</option>');
            $('#description_transaction').val(data.description);
        }
    });

}

function update_select_by_id(id_first,url,id_second){
    var $selectDropdown =
        $("#" + id_second)
            .empty()
            .html(' ');
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        data: {id: $('#' + id_first).val()},
        success: function (data) {
            $selectDropdown.append(
                $("<option></option>")
                    .attr("value", null)
                    .text('')
            );
            jQuery.each(data, function (i, val) {
                $selectDropdown.append(
                    $("<option></option>")
                        .attr("value", val.id)
                        .text(val.name)
                );
            });
            $selectDropdown.material_select();
        },
        error: function (data) {
            $selectDropdown.material_select();
        }
    });
}
