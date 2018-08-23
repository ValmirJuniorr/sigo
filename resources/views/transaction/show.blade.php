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
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12 box-body table-responsive no-border">
                                        <div class="box-body">
                                            <div class="nav-tabs-custom">
                                                <h3>{{$customer->name}} - {{show_cpf_mask($customer->cpf)}}</h3>
                                                <div class="row col-sm-12 col-md-12 col-lg-12"
                                                     style="margin-top: 10px;">
                                                    {{Form::open(array('action' => array('TransactionController@store','customer_id'=> $customer->id)))}}
                                                    <div class="row col-sm-7 col-md-7 col-lg-7"
                                                         style="margin-top: 10px;">
                                                        <div class="form-group row col-sm-12 col-md-6 col-lg-6">
                                                            {{  Form::label('expense_category_id', 'Profissional') }}
                                                            <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                                <div class="input-group-addon"><i
                                                                            class="fa fa-align-justify"></i></div>
                                                                <select name="staff_id" class="form-control">
                                                                    <option></option>
                                                                    @foreach($staffs as $staff)
                                                                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-sm-6 col-md-6 col-lg-6">
                                                            {{  Form::label('expense_category_id', 'Categoria do Procedimento') }}
                                                            <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                                <div class="input-group-addon"><i
                                                                            class="fa fa-align-justify"></i></div>
                                                                <select name="category_id" id="category_id"
                                                                        class="form-control"
                                                                        onchange="update_select_by_id('category_id','/procedure/get_procedure_by_category','procedure_id')">
                                                                    <option></option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row col-sm-6 col-md-6 col-lg-6">
                                                            {{  Form::label('expense_category_id', 'Procedimento') }}
                                                            <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                                <div class="input-group-addon"><i
                                                                            class="fa fa-align-justify"></i></div>
                                                                <select name="procedure_id" id="procedure_id"
                                                                        class="form-control"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-sm-5 col-md-5 col-lg-5">
                                                        <div class="form-group row col-sm-12 col-md-12 col-lg-12">
                                                            <label for="description">Descrição do Procedimento</label>
                                                            <textarea class="form-control" name="description"
                                                                      id="description" rows="3" cols="50"></textarea>
                                                        </div>
                                                        <div class="form-group has-feedback role-checkbox col-lg-offset-8 col-sm-12 col-md-4 col-lg-4"
                                                             style="margin-top: 20px;">
                                                            {{ Form::submit('Adicionar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                                        </div>
                                                    </div>
                                                    {{ Form::close() }}
                                                </div>

                                                <!-- tabs da page -->

                                                <div class="row col-sm-12 col-md-12 col-lg-12"
                                                     style="margin-top: 60px;">
                                                    <ul class="nav nav-tabs">
                                                        @php  $flag_tab_ul = 0;  @endphp
                                                        @foreach($transactionOfCustomer as $category => $transactions)
                                                            @if($flag_tab_ul == 0)
                                                                <li class="active"><a href="#{{$category}}"
                                                                                      data-toggle="tab">{{title_case($category)}}</a>
                                                                </li>
                                                                @php $flag_tab_ul = 1; @endphp
                                                            @else
                                                                <li><a href="#{{$category}}"
                                                                       data-toggle="tab">{{title_case($category)}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @php  $flag_tab_div = 0;  @endphp
                                                        @foreach($transactionOfCustomer as $category => $transactions)
                                                            @if($flag_tab_div == 0)
                                                                <div class="tab-pane active" id="{{$category}}"
                                                                     style="height: 300px;overflow-y: scroll;">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Codigo</th>
                                                                            <th>Data de realização</th>
                                                                            <th>Procedimento</th>
                                                                            <th>Valor</th>
                                                                            <th>Responsável</th>
                                                                            <th>Status</th>
                                                                            <th>Situação</th>
                                                                            <th>Editar</th>
                                                                            <th>Excluir</th>
                                                                            <th>Formulário</th>
                                                                            <th>Imprimir</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($transactions as $transaction)
                                                                            <tr>
                                                                                <td>{{$transaction->id}}</td>
                                                                                @if(isset($transaction->transaction_date))
                                                                                    <td>{{\Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y')}}</td>
                                                                                @else
                                                                                    <td>00-00-0000</td>
                                                                                @endif
                                                                                <td>{{$transaction->procedure->name}}</td>
                                                                                <td>{{$transaction->price}}</td>
                                                                                <td>{{$transaction->staff->name}}</td>
                                                                                @if($transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING)
                                                                                    <td>
                                                                                        <i title="{{$transaction->transactionStatus->name}}"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-exclamation-circle"
                                                                                           style="color:#f39a0d; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        <i title="{{$transaction->transactionStatus->name}}"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-check-circle"
                                                                                           style="color:#4ca20b; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @endif
                                                                                @if($transaction->paid)
                                                                                    <td><i title="Pago"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-check-circle"
                                                                                           style="color:#4ca20b; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @else
                                                                                    <td><i title="Inadiplente"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-times-circle"
                                                                                           style="color:#aa1111; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @endif
                                                                                @if(!$transaction->paid or $transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING)
                                                                                    <td>
                                                                                        <a href="#"
                                                                                           onclick="updateTransaction('{{$transaction->id}}')"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modalTransaction">
                                                                                            <i title="Editar"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-pencil"
                                                                                               style="font-size: 20px;"></i></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="{{action("TransactionController@delete_transaction", ['id' => $transaction->id])}}"
                                                                                           onclick="return confirm('Deseja realmente excluir a transação?')">
                                                                                            <i title="Remover"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-trash-o"
                                                                                               style="font-size: 20px;"></i></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="#"
                                                                                           onclick="answerTransactionForm('{{$transaction->procedure->id}}','{{$transaction->id}}')"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modalAsnwerForm">

                                                                                            <i title="Formulário"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-wpforms"
                                                                                               style="font-size: 20px;"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                @else
                                                                                    <td>-</td>
                                                                                    <td>-</td>
                                                                                    <td>-</td>
                                                                                @endif
                                                                                <td>
                                                                                    <a href="{{action('TransactionController@page_transaction_receipt_print',['id' => $transaction->id])}}"
                                                                                       target="_blank">
                                                                                        <i title="Imprimir"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-print"
                                                                                           style="font-size: 20px;"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                @php $flag_tab_div = 1; @endphp
                                                            @else
                                                                <div class="tab-pane" id="{{$category}}"
                                                                     style="height: 300px;overflow-y: scroll;">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Codigo</th>
                                                                            <th>Data de realização</th>
                                                                            <th>Procedimento</th>
                                                                            <th>Valor</th>
                                                                            <th>Responsável</th>
                                                                            <th>Status</th>
                                                                            <th>Situação</th>
                                                                            <th>Editar</th>
                                                                            <th>Excluir</th>
                                                                            <th>Formulário</th>
                                                                            <th>Imprimir</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($transactions as $transaction)
                                                                            <tr>
                                                                                <td>{{$transaction->id}}</td>
                                                                                @if(isset($transaction->transaction_date))
                                                                                    <td>{{\Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y')}}</td>
                                                                                @else
                                                                                    <td>00-00-0000</td>
                                                                                @endif
                                                                                <td>{{$transaction->procedure->name}}</td>
                                                                                <td>{{$transaction->price}}</td>
                                                                                <td>{{$transaction->staff->name}}</td>
                                                                                @if($transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING)
                                                                                    <td>
                                                                                        <i title="{{$transaction->transactionStatus->name}}"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-exclamation-circle"
                                                                                           style="color:#f39a0d; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @else
                                                                                    <td>
                                                                                        <i title="{{$transaction->transactionStatus->name}}"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-check-circle"
                                                                                           style="color:#4ca20b; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @endif
                                                                                @if($transaction->paid)
                                                                                    <td><i title="Pago"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-check-circle"
                                                                                           style="color:#4ca20b; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @else
                                                                                    <td><i title="Inadiplente"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-times-circle"
                                                                                           style="color:#aa1111; font-size: 20px;"></i>
                                                                                    </td>
                                                                                @endif
                                                                                @if(!$transaction->paid or $transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING)
                                                                                    <td>
                                                                                        <a href="#"
                                                                                           onclick="updateTransaction('{{$transaction->id}}')"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modalTransaction">
                                                                                            <i title="Editar"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-pencil"
                                                                                               style="font-size: 20px;"></i></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="{{action("TransactionController@delete_transaction", ['id' => $transaction->id])}}"
                                                                                           onclick="return confirm('Deseja realmente excluir a transação?')">
                                                                                            <i title="Remover"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-trash-o"
                                                                                               style="font-size: 20px;"></i></a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="#"
                                                                                           onclick="answerTransactionForm('{{$transaction->procedure->id}}','{{$transaction->id}}')"
                                                                                           data-toggle="modal"
                                                                                           data-target="#modalAsnwerForm">

                                                                                            <i title="Formulário"
                                                                                               data-toggle="tooltip"
                                                                                               class="fa fa-wpforms"
                                                                                               style="font-size: 20px;"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                @else
                                                                                    <td>-</td>
                                                                                    <td>-</td>
                                                                                    <td>-</td>
                                                                                @endif
                                                                                <td>
                                                                                    <a href="{{action('TransactionController@page_transaction_receipt_print',['id' => $transaction->id])}}"
                                                                                       target="_blank">
                                                                                        <i title="Imprimir"
                                                                                           data-toggle="tooltip"
                                                                                           class="fa fa-print"
                                                                                           style="font-size: 20px;"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    @include('transaction.components.modal')
    @include('transaction.components.modal_asnwer_form')
    </body>
@endsection
