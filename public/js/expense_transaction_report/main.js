$(document).ready(function(){
    $("#search_button_expense_transactino").click(function(){

        var args = {
            start_date : $("#start_date").val(),
            end_date : $("#end_date").val(),
        };

        line_chart('line_chart_resume_expense_per_day','/expense/expense_by_day_with_dates',args);

        basic_pie_chart('pie_chart_expense_category','/expense/expense_by_category_with_dates',args,'Gráfico Categoria de Despesa');

        basic_pie_chart('pie_chart_transaction_category','/expense/report_expense_by_category',null,'Gráfico Categoria de Receitas');

        basic_column_chart('column_chart_transactions','/transaction/read_group_transaction_by_category',args,'Receitas por Operação');

    });
});