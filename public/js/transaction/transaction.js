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


function answerTransactionForm(transaction_id) {

        $.ajax({
            type: 'GET',
            url: '/testeApp',
            data:  {id:transaction_id},
            success: function (data) {
                var indice_details = 0;
                var field = "<form>";

                for(indice_details = 0; indice_details < data.length; indice_details++){
                    var list_question = data[indice_details].questions;
                    var indice_details_question = 0;

                    field +=  data[indice_details].title + "<hr>";
                      for(indice_details_question = 0; indice_details_question < list_question.length; indice_details_question++){

                          field += "<div class='form-group'>" +
                              "<label for='email'>" + list_question[indice_details_question].title +"</label>" +
                              "<input type='email' class='form-control' id='email'>" +
                              "</div>";

                      }
                }

                 field += "<button type='submit' class='btn btn-default'>Salvar Formulario</button>";
                 field += "</form>";
                var jfield = $(field);
                $('.form_modal_23443').empty();  // Limpa os dados da tabela atual */
                $('.form_modal_23443').append(jfield);  // atualizar a tabela com os novos registro */
            }
        });









/*
    $("#modal-form").empty();


    $("#modal-form").append('<div class="row col-sm-5 col-md-5 col-lg-5"><input type="text" name="mytext[]"/></div>');




    $("#modal-form").append("<input type=\"radio\" />" + transaction_id);

    $("#modal-form").append("<input type=\"checkbox\" /> test");*/

}