@extends('layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection
@section('content')
    <body class="skin-blue">
        @include('layouts.nav')
        @include('layouts.aside')

        <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Dashboard</h3>
                                    <small>Últimos 15 dias</small>
                                </div>
                                <div class="box-body">

                                    @if(session('module_id') == 2)
                                        @section('custom-js')
                                            <script src="{{asset('js/dashboard/module_finance.js')}}"></script>
                                        @endsection

                                        <div class="col-md-6" id="pie_chart_resume_categories"></div>

                                        <div class="col-md-6">
                                            <div class="box box-primary">

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Últimos Gastos</h3>
                                                </div>

                                                <div class="box-body" style="height: 310px; max-height: 310px; padding: 0; overflow-y: auto;">
                                                    <table class="table" id="table_lasts_expenses">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vencimento</th>
                                                                <th>Valor</th>
                                                                <th>Descrição</th>
                                                                <th>Categoria</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12" id="line_chart_resume_expense_per_day"></div>

                                        @endif
                                    @if(session('module_id') == 4)

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        </div>


    </body>
@endsection

