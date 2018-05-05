@extends('layouts.main')

@section('content')
    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Relatório de despesas</h3>
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

                        <div class="form-group col-md-6">
                            @include('components.multi_select',['id' => 'expense_category_ids','set' => $expenseCategories ,'name'  => 'Centro de Custo'])
                        </div>

                    </div>

                    <div class="box-body col-md-2">
                        <button type="button" class="btn btn-block btn-primary" id="search_button_expenses">
                            Pesquisar
                        </button>
                    </div>
                </div>


                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin" id="tb_expenses">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Valor</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Total</th>
                                <th id="total_price">-</th>
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

    <script src="{{asset('js/expenses/report.js')}}"></script>

@endsection


@endsection


