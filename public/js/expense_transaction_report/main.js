$(document).ready(function(){
    $("#search_button_expense_transactino").click(function(){
        var args = {
            start_date : $("#start_date").val(),
            end_date : $("#end_date").val(),
            staff_id : $('#staff_id').val(),
            status_id : $("#status_id").val(),
            expense_category_ids: $("#expense_category_ids").val(),
        };

        //console.log(args);

        line_chart('line_chart_resume_expense_per_day','/report/report_line_chart_expenses_transactions',args);

        basic_pie_chart('pie_chart_expense_category','/expense/expense_by_category_with_dates',args,'Gráfico Categoria de Despesa');

        basic_pie_chart('pie_chart_transaction_category','/transaction/read_group_transaction_by_category',args,'Gráfico Categoria de Receitas');

        basic_column_chart('column_chart_transactions','/transaction/resume_data_to_stack_collumn',args,'Receitas por Operação');

    });
});