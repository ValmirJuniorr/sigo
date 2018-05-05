@extends('layouts.main')

@section('content')
    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumo de Receitas</h3>
                </div>

                <div class="box-body">
                    <div class="box-body col-md-10">

                        <div class="form-group date col-md-2">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {{  Form::text('start_date', $value = null,array('class' => 'form-control pull-right datepicker','id' => 'start_date', 'placeholder' => 'Início'))}}
                            </div>
                        </div>

                        <div class="form-group date col-md-2">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {{  Form::text('end_date', $value = null,array('class' => 'form-control pull-right datepicker','id' => 'end_date', 'placeholder' => 'Fim'))}}
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            @include('components.select',['id' => 'staff_id' , 'set' => $staffs, 'default' => array('id' => null , 'value' => 'Funcionários')])
                        </div>

                        <div class="form-group col-md-3">
                            @include('components.multi_select',['id' => 'procedure_ids','set' => $procedures,'name'  => 'Procedimentos'])
                        </div>

                        <div class="form-group col-md-2">
                            @include('components.select',['id' => 'status_id' , 'set' => $transactionStatuses, 'default' => array('id' => null , 'value' => 'Status')])
                        </div>

                    </div>

                    <div class="box-body col-md-2">
                        <button type="button" class="btn btn-block btn-primary" id="search_button_expense_transactino">
                            Pesquisar
                        </button>
                    </div>
                </div>


                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="transactions">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Preço</th>
                                <th>Preço de Custo</th>
                                <th>Cliente</th>
                                <th>Procedimento</th>
                                <th>Funcionário</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Total</th>
                                <th id="total_price">-</th>
                                <th id="total_cost_price">-</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            </div>
        </section>
    </div>

    </body>

@section('custom-js')

    <script src="{{asset('js/transactions/report.js')}}"></script>

@endsection


@endsection


