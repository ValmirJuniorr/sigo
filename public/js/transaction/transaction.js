
function modalTransaction(transaction_id,div) {
    $('#'+div).on('shown.bs.modal', function () {



    })
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
