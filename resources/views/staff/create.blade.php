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
                Especialistas
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => 'StaffController@store','method' => 'POST'))}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="box-body">
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('name', 'Nome') }}
                                                {{  Form::text('name', $value = null,array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                            </div>
                                            <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                                {{  Form::label('document', 'Documento') }}
                                                {{  Form::text('document', $value = null,array('class' => 'form-control', 'placeholder' => 'Documento'))}}
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                <label>UF</label>
                                                <select name="uf" class="form-control">
                                                    <option value="">Selecione</option>
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
                                            <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                                                {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
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

