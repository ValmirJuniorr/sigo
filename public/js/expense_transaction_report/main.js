$(document).ready(function(){
    $("#search_button_expense_transactino").click(function(){

        var args = {
            start_date : $("#start_date").val(),
            end_date : $("#end_date").val(),
        };

        line_chart('line_chart_resume_expense_per_day','/expense/expense_by_day_with_dates',args);
    });
});