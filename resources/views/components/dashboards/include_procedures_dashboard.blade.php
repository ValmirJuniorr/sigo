@section('custom-js')
    <script src="{{asset('js/dashboard/module_procedure.js')}}"></script>
    <script src="{{asset('js/highchart_graphics/basic_pie_chart.js')}}"></script>
    <script src="{{asset('js/highchart_graphics/basic_column_chart.js')}}"></script>
    <script src="{{asset('js/highchart_graphics/line_chart.js')}}"></script>
@endsection

<div class="col-md-6 hide-on-med-and-down" id="line_chart_resume_transaction_per_day"></div>

<div class="col-md-6" id="pie_chart_transaction_category"></div>

<div class="col-md-12" id="column_chart_transactions"></div>

