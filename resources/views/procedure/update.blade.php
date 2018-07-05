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

                    <div class="box">
                        <div class="box-body">

                            <div class="col-xs-6">

                                <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                    {{  Form::label('name', '* Nome') }}
                                    {{  Form::text('name', '',array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                </div>


                                <div class="col-lg-7">
                                    {{  Form::label('group', '* Grupo') }}
                                    <select name="type_question" id="type_question" class="form-control">
                                        <option value="1">Grupo 1</option>
                                        <option value="1">Grupo 2</option>
                                        <option value="1">Grupo 3</option>
                                        <option value="1">Grupo 4</option>
                                        <option value="1">Grupo 5</option>
                                        <option value="1">Grupo 6</option>
                                        <option value="1">Grupo 7</option>
                                        <option value="1">Grupo 8</option>
                                        <option value="1">Grupo 9</option>
                                        <option value="1">Grupo 10</option>
                                        <option value="1">Grupo 11</option>
                                        <option value="1">Grupo 12</option>
                                        <option value="1">Grupo 13</option>
                                        <option value="1">Grupo 14</option>
                                        <option value="1">Grupo 15</option>
                                        <option value="1">Grupo 16</option>

                                    </select>
                                </div>


                                <div class="col-lg-3">
                                    {{  Form::label('name', '* Tipo') }}
                                    <select name="type_question" id="type_question" class="form-control">
                                        <option value="1">Texto</option>
                                        <option value="2">Lógico</option>
                                        <option value="3">Numérico</option>
                                    </select>
                                </div>

                                <div class="col-lg-2" style="margin-top: 25px;">
                                    <button type="button" class="btn btn-block btn-primary">Salvar</button>
                                </div>



                            </div>

                            <div class="col-xs-6">
                                {{  Form::label('form', 'Formulário') }}

                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nome</th>
                                        <th>Grupo</th>
                                        <th style="width: 40px;">Tipo</th>
                                        <th style="width: 40px">Editar</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Pergunta 1</td>
                                        <td>Grupo1</td>
                                        <td>Numérico</td>
                                        <td>

                                            <a class="center">
                                                <i class="fa fa-edit" style="margin-left: 15px;"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    </tbody></table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    </body>
@endsection

