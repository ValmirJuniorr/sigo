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
                Procedimentos
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('procedure.componets.form',['action' => 'ProcedureController@edit_procedure','procedure' => $procedure,'staff_categories' => $staff_categories])
                        </div>
                    </div>
                        <div class="col-lg-6" style="margin-left: 25%">
                            <div class="box">
                                <div class="box-body">

                                    <h4 class="box-title" style="display: inline-block">Titulo do Cabeçalho</h4>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Subir">
                                            <i class="fa fa-arrow-up"></i></button>
                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Descer">
                                            <i class="fa fa-arrow-down"></i></button>

                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Remover">
                                            <i class="fa fa-remove"></i></button>
                                    </div>

                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Nome</th>
                                            <th style="width: 40px;">Tipo</th>
                                            <th style="width: 40px">Editar</th>
                                            <th style="width: 40px">Excluir</th>
                                        </tr>
                                        <tr>
                                            <td>Pergunta 1</td>
                                            <td>Numérico</td>
                                            <td>

                                                <a class="center">
                                                    <i class="fa fa-edit" style="margin-left: 15px;"></i>
                                                </a>

                                            </td>
                                            <td>

                                                <a class="center">
                                                    <i class="fa fa-remove" style="margin-left: 15px;"></i>
                                                </a>

                                            </td>
                                        </tr>

                                        </tbody></table>

                                    <!-- FORM ADICIONAR PERGUNTA-->
                                    <div>

                                        <div class="form-group col-sm-12 col-md-6 col-lg-8">
                                            {{  Form::label('name', '* Titulo') }}
                                            {{  Form::text('name', '',array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                        </div>

                                        <div class="col-lg-2">
                                            {{  Form::label('name', '* Tipo') }}
                                            <select name="type_question" id="type_question" class="form-control">
                                                <option value="1">Texto</option>
                                                <option value="2">Lógico</option>
                                                <option value="3">Numérico</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-2" style="margin-top: 25px;">
                                            <button type="button" class="btn btn-block btn-primary">Adicionar</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" style="margin-left: 25%">
                            <div class="box">
                                <div class="box-body">

                                    <div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-10">
                                            {{  Form::label('name', '* Cabeçalho do Formulário') }}
                                            {{  Form::text('name', '',array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                        </div>

                                        <div class="col-lg-2" style="margin-top: 25px;">
                                            <button type="button" class="btn btn-block btn-primary">Adicionar</button>
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

