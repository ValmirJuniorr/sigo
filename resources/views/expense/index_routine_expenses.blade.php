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
                            <h3 class="box-title">Despesas Agendadas</h3>
                            <div class="box-tools pull-right">
                                <a href="{{ action('ExpenseController@index') }}" class="btn btn-primary btn-sm ad-click-event">
                                    Voltar
                                </a>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="col-sm-12 box-body table-responsive no-border">
                                        <table class="table table-bordered table-hover  dataTable datatable_data" cellspacing="0" width="100%">
                                            <thead>
                                            <tr role="row">
                                                <th>Transação</th>
                                                <th>Categoria</th>
                                                <th>Valor</th>
                                                <th>Próximo Lançamento</th>
                                                <th>Detalhes</th>
                                            </tr>
                                            </thead>
                                            <tbody class="aparence hide">
                                            @foreach ($expenses as $expense)
                                                <tr role="row" class="even {{ $expense->expire_expense_date == \Carbon\Carbon::now()->format('Y-m-d') ? 'bg-info' : '' }}" >
                                                    <td>{{ $expense->id }}</td>
                                                    <td>{{ $expense->expense_category->name}}</td>
                                                    <td>{{ $expense->price }}</td>
                                                    <td>{{ Carbon\Carbon::parse($expense->expire_expense_routine_date)->format('d-m-Y') . ' (' . \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($expense->expire_expense_routine_date)) . ')'}}</td>
                                                    <td class="center-elements">
                                                        @role('update_expense')
                                                        <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("ExpenseController@show_routine_expense", ['id' => base64_encode($expense->id)])}}">Editar</a>
                                                        @endrole
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
        </section>
    </div>

    </body>
@endsection


