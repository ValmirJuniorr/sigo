@section('custom-js')
    <script src="{{asset('js/dashboard/module_finance.js')}}"></script>
@endsection

<div class="col-md-6" id="pie_chart_resume_categories"></div>

<div class="col-md-6 hide-on-small-only">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Últimos
                    Gastos (15 Dias)</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Próximos
                    Gastos (15 Dias)</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box-body"
                     style="height: 310px; max-height: 310px; padding: 0; overflow-y: auto;">
                    <table class="table" id="table_last_expenses">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th class="center-elements">Detalhes</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="box-body"
                     style="height: 310px; max-height: 310px; padding: 0; overflow-y: auto;">
                    <table class="table" id="table_next_expenses">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th class="center-elements">Detalhes</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 hide-on-med-and-down" id="line_chart_resume_expense_per_day"></div>