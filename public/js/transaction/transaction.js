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


function answerTransactionForm(procedure_id) {
        $.ajax({
            type: 'GET',
            url: '/group_questions/read_group_questions',
            data:  {procedure_id:procedure_id},
            success: function (data) {
                var indice_details = 0;
                var field = "<form>";

                for(indice_details = 0; indice_details < data.length; indice_details++){
                    var list_question = data[indice_details].questions;
                    var indice_details_question = 0;

                    field += "<div class='form-group col-sm-12 col-md-12 col-lg-12' >" + data[indice_details].title + "</div>";


                      field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                      for(indice_details_question = 0; indice_details_question < list_question.length; indice_details_question++){
                            if(list_question[indice_details_question].type == "TEXT"){
                              field += "<div class='form-group col-sm-6 col-md-6 col-lg-6'>" +
                                  "<label>" + list_question[indice_details_question].title +"</label>" +
                                  "<input type='textarea' class='form-control'>" +
                                  "</div>";

                            }/*else if(list_question[indice_details_question].type == "BOOLEAN"){
                              field += "<div style='height:60px;' class='checkbox col-sm-5 col-md-5 col-lg-5'>" +
                                 "<label><input type='checkbox' value=''>" + list_question[indice_details_question].title +"</label>" +
                                 "</div>";

                            }else if(list_question[indice_details_question].type == "NUMERIC"){

                              field += "<div style='height:60px;' class=' col-sm-5 col-md-5 col-lg-5'>" +
                                 "<label>" + list_question[indice_details_question].title +"</label>" +
                                 "<input class='form-control' type='number' id=''>" +
                                 "</div>";
                            }*/

                      }
                    field += "</div>";
                    field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                      for(indice_details_question = 0; indice_details_question < list_question.length; indice_details_question++){
                            if(list_question[indice_details_question].type == "BOOLEAN"){
                              field += "<div class='checkbox col-sm-3 col-md-3 col-lg-3'>" +
                                 "<label><input type='checkbox' value=''>" + list_question[indice_details_question].title +"</label>" +
                                 "</div>";
                            }
                      }
                       field += "</div>";
field += "<div class='col-sm-12 col-md-12 col-lg-12'>";
                      for(indice_details_question = 0; indice_details_question < list_question.length; indice_details_question++){
                            if(list_question[indice_details_question].type == "NUMERIC"){
                              field += "<div class='form-group col-sm-4 col-md-4 col-lg-4'>" +
                                  "<label>" + list_question[indice_details_question].title +"</label>" +
                                  "<input type='number' class='form-control'>" +
                                  "</div>";
                            }
                      }
field += "</div>";

                  }
              //   field += "<div class='form-group'><button type='submit' class='btn btn-default'>Salvar Formulario</button></div>";


                 field += "<div class='modal-footer'><button type='submit' class='btn btn-primary'>Salvar Alterações</button></div>";


                 field += "</form>";
                var jfield = $(field);
                $('.form_modal_response').empty();  // Limpa os dados da tabela atual */
                $('.form_modal_response').append(jfield);  // atualizar a tabela com os novos registro */
            }
        });



}
