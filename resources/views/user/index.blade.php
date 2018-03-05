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
                            <h3 class="box-title">Administração de Usuários</h3>

                            <div class="box-tools pull-right">
                                @role('store_user')
                                    <a href="{{ action('UserController@create_user') }}" class="btn btn-success btn-sm ad-click-event">
                                        Cadastrar Usuário
                                    </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="col-sm-12 box-body table-responsive no-padding no-border">
                                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Id</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Nome</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Username</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1">Email</th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="2">Ações</th></tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr role="row" class="even">
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        @role('update_user')
                                                            <td class="center-elements">
                                                                <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("UserController@update_user", ['id' => base64_encode($user->id)])}}">Editar</a>
                                                            </td>
                                                        @endrole
                                                        @role('delete_user')
                                                            <td class="center-elements">
                                                                <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir o Usuário?')" href="{{action("UserController@delete_user", ['id' => base64_encode($user->id)])}}">Excluir</a>
                                                            </td>
                                                        @endrole()
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="center-elements"> @include('layouts.pagination', ['object' => $users]) </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


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

