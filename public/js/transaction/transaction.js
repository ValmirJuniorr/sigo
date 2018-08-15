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


function answerTransactionForm(procedure_id,transaction_id) {
        $.ajax({
            type: 'GET',
            url: '/group_questions/read_group_questions',
            data:  {procedure_id:procedure_id,transaction_id:transaction_id},
            success: function (data) {
                var indice_details = 0;
                var field = "<form method='get' action='/transaction/store_transaction_result_procedure'>";
                field += "<input type='hidden' value="+transaction_id+" name='transaction_id'>";
                for(indice_details = 0; indice_details < data.length; indice_details++) {
                    var list_question = data[indice_details].questions;
                    var indice_details_question = 0;
                    var indice_details_question_numeric = 0;
                    var indice_details_question_checkbox = 0;
                    field += "<div class='col-sm-12 col-md-12 col-lg-12' style='margin-top: 15px; margin-bottom: 20px; border-top: 1px solid #ccc'><p style='font-size: 1.3em;'>" + data[indice_details].title + "</p></div>";
                    field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                      for(indice_details_question = 0; indice_details_question < list_question.length; indice_details_question ++){
                            if(list_question[indice_details_question].type == "TEXT"){
                              field += "<div class='card-body form-group col-sm-6 col-md-6 col-lg-6'>" +
                                  "<p>" + list_question[indice_details_question].title +"</p>" +
                                  "<input type='textarea'  name="+list_question[indice_details_question].id+" class='form-control' value= '"+list_question[indice_details_question].answer+"'>" +
                                  "</div>";
                            }
                      }
                    field += "</div>";
                    field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                    for(indice_details_question_numeric = 0; indice_details_question_numeric < list_question.length; indice_details_question_numeric ++){
                        if(list_question[indice_details_question_numeric].type == "NUMERIC"){
                            field += "<div class='form-group col-sm-2 col-md-2 col-lg-2'>" +
                                "<p>" + list_question[indice_details_question_numeric].title +"</p>" +
                                "<input type='number' name="+list_question[indice_details_question_numeric].id+" class='form-control' value= '"+list_question[indice_details_question_numeric].answer+"'>" +
                                "</div>";
                        }
                     }
                     field += "</div>";
                     field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                     for(indice_details_question_checkbox = 0; indice_details_question_checkbox < list_question.length; indice_details_question_checkbox ++){
                        if(list_question[indice_details_question_checkbox].type == "BOOLEAN"){
                            field += "<div class='col-sm-2 col-md-2 col-lg-2'>" +
                                "<input type='checkbox' name="+list_question[indice_details_question_checkbox].id+ '[]'  +" style='margin:4px 5px'>" + list_question[indice_details_question_checkbox].title + "</div>";
                          }
                        }
                    field += "</div>";
                   }
                field += "<div class='modal-footer' style='border-top: none'><button type='submit' class='btn btn-primary'>Salvar Alterações</button></div>";
                field += "</form>";
                var jfield = $(field);
                $('.form_modal_response').empty(); // Limpa os dados da tabela atual */
                $('.form_modal_response').append(jfield); // atualizar a tabela com os novos registro */
            }
        });
}
