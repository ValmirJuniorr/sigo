$(document).ready(function () {

    basic_pie_chart('pie_chart_transaction_category','/report/transaction/dashboard/transaction_by_category',null,'Gráfico Categoria de Receitas');

    basic_column_chart('column_chart_transactions','/report/transaction/dashboard/transaction_stack_collumn',null,'Receitas por Operação');

    line_chart('line_chart_resume_transaction_per_day','/report/transaction/dashboard/transaction_by_day',null);

});