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
                Clientes
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => 'CustomerController@store','method' => 'POST'))}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="box-body">
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('name', '* Nome') }}
                                                {{  Form::text('name', $value = null,array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('address', '* Endereço') }}
                                                {{  Form::text('address', $value = null,array('class' => 'form-control', 'placeholder' => 'Endereço'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cpf', '* CPF') }}
                                                {{  Form::text('cpf', $value = null,array('class' => 'form-control','id' => 'cpf', 'placeholder' => 'CPF'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('rg', '* RG') }}
                                                {{  Form::text('rg', $value = null,array('class' => 'form-control', 'placeholder' => 'RG'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('phone', 'Telefone') }}
                                                {{  Form::text('phone', $value = null,array('class' => 'form-control', 'placeholder' => 'Telefone'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cell_phone', 'Celular') }}
                                                {{  Form::text('cell_phone', $value = null,array('class' => 'form-control', 'placeholder' => 'Celular'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('email', 'Email') }}
                                                {{  Form::text('email', $value = null,array('class' => 'form-control', 'placeholder' => 'Email'))}}
                                            </div>
                                            <div class="form-group date col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('birth_date', '* Data de Nascimento') }}
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    {{  Form::text('birth_date', $value = null,array('class' => 'form-control pull-right datepicker' , 'placeholder' => 'Data de Nascimento'))}}
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('city', '* Cidade') }}
                                                {{  Form::text('city', $value = null,array('class' => 'form-control', 'placeholder' => 'Cidade'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('neighborhood', 'Bairro') }}
                                                {{  Form::text('neighborhood', $value = null,array('class' => 'form-control', 'placeholder' => 'Bairro'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-3 col-lg-3">
                                                {{  Form::label('cep', '* Cep') }}
                                                {{  Form::text('cep', $value = null,array('class' => 'form-control', 'placeholder' => 'Cep'))}}
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                               @include('components.select_ufs')
                                            </div>
                                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                                <label>* Género</label>
                                                <select name="gender" class="form-control">
                                                    <option disabled selected>Género</option>
                                                    <option value="0">F</option>
                                                    <option value="1">M</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                                                {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
@endsection

