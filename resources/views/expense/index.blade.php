@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">

    @endsection

@section('content')
    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Despesas</h3>

                            <div class="box-tools pull-right">
                                @role('store_expense')
                                <a href="{{ action('ExpenseController@create_expense') }}" class="btn btn-success btn-sm ad-click-event">
                                    Cadastrar de Despesa
                                </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable datatable_data" cellspacing="0" width="100%">
                                            <thead>
                                            <tr role="row">
                                                <th>Transação</th>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Vencimento</th>
                                                <th>Descrição</th>
                                                <th>Detalhes</th>
                                            </tr>
                                            </thead>
                                            <tbody class="aparence hide">
                                            @foreach ($expenses as $expense)
                                                <tr role="row" class="even {{ $expense->expire_expense_date < \Carbon\Carbon::now()->format('Y-m-d') ? 'bg-danger' : '' }}" >
                                                    <td>{{ $expense->id }}</td>
                                                    <td>{{ $expense->expense_category->name}}</td>
                                                    <td>{{ $expense->price }}</td>
                                                    <td>{{ Carbon\Carbon::parse($expense->expire_expense_date)->format('d-m-Y') }}</td>
                                                    <td>{{ str_limit($expense->description,30) }}</td>
                                                    <td class="center-elements">
                                                        <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("ExpenseController@show_expense", ['id' => base64_encode($expense->id)])}}">Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </body>
@endsection


