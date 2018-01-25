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
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
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
                                            <label>UF</label>
                                            <select name="uf" class="form-control">
                                                <option value="{{$customer->uf}}" selected>{{$customer->uf}}</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AM">AM</option>
                                                <option value="AP">AP</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MG">MG</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="PR">PR</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SE">SE</option>
                                                <option value="SP">SP</option>
                                                <option value="TO">TO</option>
                                            </select>
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

