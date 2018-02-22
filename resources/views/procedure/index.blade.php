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
                            <h3 class="box-title">Procedimentos</h3>
                            <div class="box-tools pull-right">
                                @role('store_procedure')
                                <a href="{{ action('ProcedureController@create_procedure') }}" class="btn btn-success btn-block ad-click-event">
                                        Novo Procedimento
                                </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="box-body">
                                            <table class="table table-striped table-bordered datatable_data">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nome</th>
                                                    <th>Tempo</th>
                                                    <th>Preço</th>
                                                    <th>Editar</th>
                                                    <th>Deletar</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($procedures as $procedure)
                                                    <tr>
                                                        <td>{{$procedure->id}}</td>
                                                        <td>{{$procedure->name}}</td>
                                                        <td>{{$procedure->procedure_time}}</td>
                                                        <td>{{$procedure->price}}</td>
                                                        @role('update_procedure')
                                                        <td class="center-elements">
                                                            <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("ProcedureController@show_procedure", ['id' => base64_encode($procedure->id)])}}">Editar</a>
                                                        </td>
                                                        @endrole
                                                        <td class="center-elements">
                                                            @role('delete_procedure')
                                                            <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir o Procedimento?')" href="{{action("ProcedureController@delete_procedure", ['id' => base64_encode($procedure->id)])}}">Excluir</a>
                                                            @endrole()
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

    </body>
@endsection

