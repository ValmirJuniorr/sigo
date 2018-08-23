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
                Cliente
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            {{--inicio--}}
            <div class="row">
                <div class="col-xs-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Dados do Cliente</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Linha do tempo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                {{ Form::open(array('action' => array('CustomerController@update','id' => $customer->id)))}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="box-body">
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('name', 'Nome') }}
                                                {{  Form::text('name', $value = $customer->name,array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('address', 'Endereço') }}
                                                {{  Form::text('address', $value = $customer->address,array('class' => 'form-control', 'placeholder' => 'Endereço'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cpf', 'CPF') }}
                                                {{  Form::text('cpf', $value = $customer->cpf,array('class' => 'form-control', 'placeholder' => 'CPF'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('rg', 'RG') }}
                                                {{  Form::text('rg', $value = $customer->rg,array('class' => 'form-control', 'placeholder' => 'RG'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('phone', 'Telefone') }}
                                                {{  Form::text('phone', $value = $customer->phone,array('class' => 'form-control', 'placeholder' => 'Telefone'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cell_phone', 'Celular') }}
                                                {{  Form::text('cell_phone', $value = $customer->cell_phone,array('class' => 'form-control', 'placeholder' => 'Celular'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('email', 'Email') }}
                                                {{  Form::text('email', $value = $customer->email,array('class' => 'form-control', 'placeholder' => 'Email'))}}
                                            </div>
                                            <div class="form-group date col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('birth_date', 'Data de Nascimento') }}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    {{  Form::text('birth_date', $value = $customer->birth_date,array('class' => 'form-control pull-right datepicker' , 'placeholder' => 'Data de Nascimento'))}}
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('city', 'Cidade') }}
                                                {{  Form::text('city', $value = $customer->city,array('class' => 'form-control', 'placeholder' => 'Cidade'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('neighborhood', 'Bairro') }}
                                                {{  Form::text('neighborhood', $value = $customer->neighborhood,array('class' => 'form-control', 'placeholder' => 'Bairro'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cep', 'Cep') }}
                                                {{  Form::text('cep', $value = $customer->cep,array('class' => 'form-control', 'placeholder' => 'Cep'))}}
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                @include('components.select_ufs')
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label>Género</label>
                                                <select name="gender" class="form-control">
                                                    @if($customer->gender)
                                                        <option value="1" selected>M</option>
                                                    @else
                                                        <option value="0" selected>F</option>
                                                    @endif
                                                    <option value="0">F</option>
                                                    <option value="1">M</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                                                {{ Form::submit('Editar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                                                <a class="btn btn-success btn-block btn-flat" href="{{action("CustomerController@read_customer")}}">Voltar</a>
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
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div style="overflow-y: scroll; height:500px">
                                    <ul class="timeline">
                                        <!-- timeline time label -->
                                        <li class="time-label"><span class="bg-blue">Histórico</span></li>
                                        <!-- /.timeline-label -->

                                    @foreach($transactions as $transaction)
                                        <!-- timeline item -->
                                            <li>
                                                @php
                                                    if($transaction->paid){
                                                        $title = "Pago";
                                                        $class = "fa fa-check-circle bg-green";

                                                    }else{
                                                        $title = "Inadiplente";
                                                        $class = "fa fa-times-circle bg-red";
                                                    }
                                                @endphp
                                                <i title="{{$title}}" data-toggle="tooltip" class="{{$class}}" ></i>
                                                <!--i class="fa fa-money bg-blue"></i-->
                                                <div class="timeline-item">
                                                    <span class="date"><i class="fa fa-calendar"></i> {{\App\Models\Util\Calendar::invert_date_to_dd_mm_yyyy($transaction->transaction_date)}}</span>

                                                    <h3 class="timeline-header">
                                                        @php
                                                            if($transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING){
                                                                $classIcon = "fa fa-exclamation-circle bg-yellow icon-circle";

                                                            }else{
                                                                $classIcon = "fa fa-check-circle bg-green icon-circle";
                                                            }
                                                        @endphp
                                                        <i title="{{$transaction->transactionStatus->name}}" data-toggle="tooltip" class="{{$classIcon}}" ></i>

                                                        <a href="{{action('TransactionController@page_transaction_receipt_print',['id' => $transaction->id])}}"
                                                           target="_blank">
                                                            {{$transaction->procedure->name}}
                                                        </a></h3>
                                                    <div class="timeline-body">
                                                        <a href="#"
                                                           onclick="answerTransactionFormCustomer('{{$transaction->procedure->id}}','{{$transaction->id}}')"
                                                           data-toggle="modal"
                                                           data-target="#modalAsnwerForm">
                                                            <i title="Formulário"
                                                               data-toggle="tooltip"
                                                               class="fa fa-wpforms"> Formulário</i>

                                                        </a>

                                                    </div>
                                                    <!--div-- class="timeline-footer">
                                                        <a
                                                           class="btn btn-primary btn-xs" target="_blank">Detalhar</a>
                                                    </div-->
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
            </div>
        </section>
    </div>
    @include('transaction.components.modal_asnwer_form_customer')
    </body>
@endsection

