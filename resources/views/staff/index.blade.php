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
                            <h3 class="box-title">Especialistas</h3>
                            <div class="box-tools pull-right" style="margin-top:2px;">
                                <a href="{{ action('StaffController@create_staff') }}" class="btn btn-success btn-sm ad-click-event">
                                        Novo Especialista
                                </a>
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
                                                    <th>Documento</th>
                                                    <th>UF</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($staffs as $staff)
                                                    <tr>
                                                        <td>{{$staff->id}}</td>
                                                        <td>{{$staff->name}}</td>
                                                        <td>{{$staff->document}}</td>
                                                        <td>{{$staff->uf}}</td>
                                                        <td class="center-elements">
                                                            <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("StaffController@update_staff", ['id' => base64_encode($staff->id)])}}">Editar</a>
                                                        </td>
                                                        <td class="center-elements">
                                                            <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir o Especialista?')" href="{{action("StaffController@delete_staff", ['id' => base64_encode($staff->id)])}}">Excluir</a>
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

