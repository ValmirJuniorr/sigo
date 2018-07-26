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

                        @foreach($groupQuestions as $groupQuestion)
                            <div id="groups">
                                    <div class="col-lg-6" style="margin-left: 25%">
                                    <div class="box">
                                        <div class="box-body">

                                            <h4 class="box-title" style="display: inline-block">{{$groupQuestion->title}}</h4>

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
                                                   @foreach($groupQuestion->questions as $question)
                                                    <td>{{$question->title}}</td>
                                                    <td>{{$question->type}}</td>
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
                                                   @endforeach 
                                                </tr>

                                                </tbody>
                                            </table>

                                            <!-- Form de cadastro das perguntas -->
                                            {{ Form::open(array('action' => array('GroupQuestionController@store', 'procedure_id' => $procedure->id)))}}
                                            
                                            <div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    {{  Form::label('name', '* Titulo') }}
                                                    {{  Form::text('name', '',array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                                </div>

                                                <div class="col-lg-3">
                                                    {{  Form::label('name', '* Tipo') }}
                                                    <select name="type_question" id="type_question" class="form-control">
                                                        <option value="1">Texto</option>
                                                        <option value="2">Lógico</option>
                                                        <option value="3">Numérico</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <button type="button" class="btn btn-block btn-primary">Adicionar</button>
                                                </div>

                                            </div>
                                            {{ Form::close() }}
                                            <!-- Fim do Form-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-6" style="margin-left: 25%">
                            <div class="box">
                                <div class="box-body">

                                    {{ Form::open(array('action' => array('GroupQuestionController@store', 'procedure_id' => $procedure->id)))}}
                                    <div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-9">
                                            {{  Form::label('name', '* Cabeçalho do Formulário') }}
                                            {{  Form::text('name', '',array('id' => 'group_name','class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                        </div>

                                        <div class="col-lg-3" style="margin-top: 25px;">
                                            <button type="submit" class="btn btn-block btn-primary">Adicionar</button>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
    </body>
@endsection

