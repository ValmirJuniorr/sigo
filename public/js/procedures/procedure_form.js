
function add_group(){


    $("#groups").append("" +
        "<div class=\"col-lg-6 group_form\"style=\"margin-left: 25%\">" +
        "<div class=\"box\">" +
        "<div class=\"box-body\">" +
        "<h4 class=\"box-title\"style=\"display: inline-block\">" +$("#group_name").val() + "</h4>" +
        "<div class=\"box-tools pull-right\">" +
        "<button type=\"button\"class=\"btn btn-box-tool\"data-toggle=\"tooltip\"title=\"\"data-widget=\"chat-pane-toggle\"data-original-title=\"Subir\">" +
        "<i class=\"fa fa-arrow-up\"></i></button>" +
        "<button type=\"button\"class=\"btn btn-box-tool\"data-toggle=\"tooltip\"title=\"\"data-widget=\"chat-pane-toggle\"data-original-title=\"Descer\">" +
        "<i class=\"fa fa-arrow-down\"></i></button>" +
        "<button type=\"button\"class=\"btn btn-box-tool\"data-toggle=\"tooltip\"title=\"\"data-widget=\"chat-pane-toggle\"data-original-title=\"Remover\">" +
        "<i class=\"fa fa-remove\"></i></button>" +
        "</div>" +
        "<table class=\"table table-bordered\">" +
        "<tbody>" +
        "<tr> <th>Nome</th> <th style=\"width: 40px;\">Tipo</th> <th style=\"width: 40px\">Editar</th> <th style=\"width: 40px\">Excluir</th> </tr>" +
        "<tr> <td>Pergunta 1</td> <td>Numérico</td> <td> <a class=\"center\"> <i class=\"fa fa-edit\"style=\"margin-left: 15px;\"></i> </a> </td> <td> <a class=\"center\"> <i class=\"fa fa-remove\"style=\"margin-left: 15px;\"></i> </a> </td> </tr>" +
        "</tbody></table>" +
        "<div>" +
        "<div class=\"form-group col-sm-12 col-md-6 col-lg-8\"> <label> Titulo </label> <input type='text' class = \"form-control\", required , placeholder = \"Nome\"> </div>" +
        "<div class=\"col-lg-2\"> <label> Tipo </label><select name=\"type_question\"id=\"type_question\"class=\"form-control\"> <option value=\"1\">Texto</option> <option value=\"2\">Lógico</option> <option value=\"3\">Numérico</option> </select> </div>" +
        "<div class=\"col-lg-2\"style=\"margin-top: 25px;\"> <button type=\"button\"class=\"btn btn-block btn-primary\">Adicionar</button> </div>" +
        "</div> </div> </div> </div>"
    );




}