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
                                    <div class="col-lg-12">
                                    <div class="box">
                                        <div class="box-body">

                                            <h4 class="box-title" style="display: inline-block">{{$groupQuestion->title}}</h4>

                                            <div class="box-tools pull-right">
                                                <a class="btn-box-tool" data-toggle="tooltip" title="" data-original-title="Subir"
                                                href="{{action("GroupQuestionController@change_prioriry",['group_question_id' => $groupQuestion->id, 'increment' => 1])}}">
                                                    <i class="fa fa-arrow-up"></i></a>
                                                <a class="btn-box-tool" data-toggle="tooltip" title="" data-original-title="Descer"
                                                href="{{action("GroupQuestionController@change_prioriry",['group_question_id' => $groupQuestion->id, 'increment' => -1])}}">
                                                    <i class="fa fa-arrow-down"></i></a>

                                                <a class="btn-box-tool" data-toggle="tooltip" title="" data-original-title="Remover"
                                                href="{{action("GroupQuestionController@remove",['id' => $groupQuestion->id])}}">
                                                    <i class="fa fa-remove"></i></a>
                                            </div>

                                            <table class="table table-bordered u-full-width demo">
                                                <tbody>
                                                <tr>
                                                    <th class="hide">ID</th>
                                                    <th>Nome</th>
                                                    <th style="width: 150px">Tipo</th>
                                                    <th style="width: 40px">Editar</th>
                                                    <th style="width: 40px">Excluir</th>
                                                    <th style="width: 40px">Prioridade</th>
                                                </tr>
                                                @foreach($groupQuestion->questions as $question)
                                                    <tr data-id="1">
                                                        <td class="hide" data-field="id">{{$question->id}}</td>
                                                        <td data-field="name">{{$question->title}}</td>
                                                        <td data-field="type">{{__('question_enum.'.$question->type)}}</td>
                                                        <td>
                                                          <a class="button button-small edit" title="Edit">
                                                            <i class="fa fa-pencil" style="margin-left: 15px"></i>
                                                          </a>
                                                        </td>
                                                            <td>
                                                            <a class="center"
                                                            href="{{action("QuestionController@remove",['id' => $question->id])}}">
                                                                <i class="fa fa-remove" style="margin-left: 15px;"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a class="btn-box-tool" style="margin-left: 5px;" data-toggle="tooltip" title="" data-original-title="Subir"
                                                            href="{{action("QuestionController@change_prioriry",['question_id' => $question->id, 'increment' => 1])}}">
                                                                <i class="fa fa-arrow-up"></i></a>
                                                            <a type="button" class="btn-box-tool" data-toggle="tooltip" title="" data-original-title="Descer"
                                                            href="{{action("QuestionController@change_prioriry",['question_id' => $question->id, 'increment' => -1])}}">
                                                                <i class="fa fa-arrow-down"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                            <!-- Form de cadastro das perguntas -->
                                            {{ Form::open(array('action' => array('QuestionController@store', 'group_question_id' => $groupQuestion->id)))}}

                                            <div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                    {{  Form::label('title', '* Titulo') }}
                                                    {{  Form::text('title', '',array('class' => 'form-control', 'required', 'placeholder' => 'Nome'))}}
                                                </div>

                                                <div class="col-lg-3">
                                                    {{  Form::label('name', '* Tipo') }}
                                                    <select name="type" id="type_question" class="form-control">
                                                        <option value="TEXT">Texto</option>
                                                        <option value="BOOLEAN">Lógico</option>
                                                        <option value="NUMERIC">Numérico</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <button type="submit" class="btn btn-block btn-primary">Adicionar</button>
                                                </div>

                                            </div>
                                            {{ Form::close() }}
                                            <!-- Fim do Form-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
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

@section('custom-js')

<script>
  $(function() {
    var pickers = {};

    $('table tr').editable({
      dropdowns: {
        type: ['Texto', 'Lógico','Numérico'],
        response: ['TEXT','BOOLEAN','NUMERIC']
      },
      edit: function(values) {
        $(".edit i", this)
          .removeClass('fa-pencil')
          .addClass('fa-save')
          .attr('title', 'Save');
      },
      save: function(values) {
        $(".edit i", this)
          .removeClass('fa-save')
          .addClass('fa-pencil')
          .attr('title', 'Edit');

          $.ajax({
              type: 'GET',
              url: '/question/edit',
              data: values,
              success: function (data) {
                  console.log(data);
              },
              error: function (request, status, error) {
                  console.log(request.responseText);
              }
          });
      },
      cancel: function(values) {
        $(".edit i", this)
          .removeClass('fa-save')
          .addClass('fa-pencil')
          .attr('title', 'Edit');

      }
    });
  });
</script>

@endsection
