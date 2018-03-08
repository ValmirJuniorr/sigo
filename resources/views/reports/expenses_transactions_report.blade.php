@extends('layouts.main')

@section('content')
    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumo Operacional</h3>
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
                        <select name="expense_category_id" class="form-control select select-hidden-accessible">
                            <option value="">Funcionário</option>
                            <option value="">Teste</option>
                            <option value="">Teste</option>
                            <option value="">Teste</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <select name="expense_category_id" class="form-control select select-hidden-accessible">
                            <option value="">Status Receita</option>
                            <option value="">Teste</option>
                            <option value="">Teste</option>
                            <option value="">Teste</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <select class="form-control select_2" name="states[]" multiple="multiple" data-placeholder="Centro de Custo" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>

                </div>

                <div class="box-body col-md-2">
                    <button type="button" class="btn btn-block btn-primary" id="search_button_expense_transactino">Pesquisar</button>
                </div>

                </div>

                <div class="box-body">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion-ios-pie-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Despesas</span>
                                <span class="info-box-number">5.875,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion-social-usd-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Receitas</span>
                                <span class="info-box-number">5.875,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="ion ion-ios-cart-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Orçamen. Aprovados</span>
                                <span class="info-box-number">150</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion-card"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Média Receita/Dia</span>
                                <span class="info-box-number">175,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                </div>


                <div class="box-body">

                    <div class="col-md-12" id="line_chart_resume_expense_per_day">

                    </div>
                </div>


            </div>
        </section>
    </div>

    </body>

    @section('custom-js')

        <script src="{{asset('js/expense_transaction_report/main.js')}}"></script>

        <script src="{{asset('js/highchart_graphics/line_chart.js')}}"></script>

        {{--<script>line_chart('line_chart_resume_expense_per_day',''/expense/expense_by_day'');</script>--}}

    @endsection


@endsection


