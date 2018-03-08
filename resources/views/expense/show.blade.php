@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection

@section('content')

    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Despesas
                <small>Detalhes de Despesas</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => array('ExpenseController@edit_expense','method' => 'POST','id' => $expense->id)))}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group date col-md-6">
                                            {{  Form::label('expire_expense_date', 'Vencimento') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                {{  Form::text('expire_expense_date', $value = Carbon\Carbon::parse($expense->expire_expense_date)->format('d-m-Y'),array('class' => 'form-control pull-right datepicker', 'placeholder' => 'Vencimento'))}}
                                            </div>
                                        </div>
                                        <div class="form-group date col-md-6">
                                            {{  Form::label('price', 'Valor') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                {{  Form::number('price', $expense->price,array('class' => 'form-control pull-right',"step" => "0.01", 'placeholder' => 'Valor','max' => '1000000'))}}
                                            </div>
                                        </div>
                                        <div class="form-group date col-md-12">
                                            {{  Form::label('expense_category_id', 'Categoria') }}
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-align-justify"></i>
                                                </div>
                                                <select name="expense_category_id" class="form-control">
                                                    <option value="{{$expense->expense_category_id}}">{{$expense->expense_category->name}}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group date col-md-12">
                                            {{  Form::label('description', 'Descrição') }}
                                            {{  Form::textarea('description', $expense->description,array('class' => 'form-control pull-right',    'placeholder' => 'Descrição'))}}
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        @if(!Calendar::before_today($expense->expire_expense_date))

                                        <div class="col-md-6">
                                                {{ Form::submit('Salvar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                        </div>
                                        <div class="col-md-6">
                                                <a href="{{action("ExpenseController@remove_expense", ['id' => $expense->id])}}" class="btn btn-block btn-flat btn-danger">
                                                    Remover</a>
                                        </div>
                                        @endif
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
                                                    {{  Form::text('expire_expense_routine_date', $expense->expire_expense_routine_date ? Carbon\Carbon::parse($expense->expire_expense_routine_date)->format('d-m-Y') : null,array('class' => 'form-control pull-right datepicker' , 'placeholder' => 'Lançamento'))}}
                                                </div>
                                            </div>

                                            <div class="form-group date col-md-6">
                                                {{  Form::label('number_of_days', 'Período (Dias)') }}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-sort-numeric-desc"></i>
                                                    </div>
                                                    {{  Form::number('number_of_days', $value = $expense->number_of_days,array('class' => 'form-control pull-right', 'placeholder' => 'Perído (Dias)'))}}
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

