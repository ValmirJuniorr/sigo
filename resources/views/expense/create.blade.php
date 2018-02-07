@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection

@section('content')

    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Despesas
                <small>Cadastro de Despesas</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => 'ExpenseController@store_expense','method' => 'POST'))}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group date col-md-6">
                                            {{  Form::label('expire_expense_date', 'Vencimento') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                {{  Form::text('expire_expense_date', $value = null,array('class' => 'form-control pull-right datepicker', 'placeholder' => 'Vencimento'))}}
                                            </div>
                                        </div>

                                        <div class="form-group date col-md-6">
                                            {{  Form::label('price', 'Valor') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                {{  Form::number('price', $value = null,array('class' => 'form-control pull-right' ,"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                                            </div>
                                        </div>

                                        <div class="form-group date col-md-12">
                                            {{  Form::label('expense_category_id', 'Categoria') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-align-justify"></i>
                                                </div>
                                                <select name="expense_category_id" class="form-control select2 select2-hidden-accessible">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group date col-md-12">
                                            {{  Form::label('description', 'Descrição') }}
                                            {{  Form::textarea('description', $value = null,array('class' => 'form-control pull-right',    'placeholder' => 'Descrição'))}}
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback role-checkbox">
                                        {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Despesa em Rotina</h3>
                                        </div>
                                        <div class="box-body">

                                            <div class="form-group date col-md-6">
                                                {{  Form::label('expire_expense_routine_date', 'Próximo Lançamento') }}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    {{  Form::text('expire_expense_routine_date', $value = null,array('class' => 'form-control pull-right datepicker' , 'placeholder' => 'Lançamento'))}}
                                                </div>
                                            </div>
                                            <div class="form-group date col-md-6">
                                                {{  Form::label('number_of_days', 'Período (Dias)') }}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-sort-numeric-desc"></i>
                                                    </div>
                                                    {{  Form::number('number_of_days', $value = null,array('class' => 'form-control pull-right', 'placeholder' => 'Perído (Dias)'))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-body">

                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
@endsection

