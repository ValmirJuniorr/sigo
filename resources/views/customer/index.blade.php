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
                            <h3 class="box-title">Clientes</h3>
                            <div class="box-tools pull-right" style="margin-top:2px;">
                                @role('store_customer')
                                <a href="{{ action('UserController@create_user') }}" class="btn btn-success btn-sm ad-click-event">
                                    Cadastrar Cliente
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
                                            <table id="datatable_data" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nome</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($customers as $customer)
                                                    <tr>
                                                        <td>{{$customer->id}}</td>
                                                        <td>{{$customer->name}}</td>
                                                        @role('update_customer')
                                                        <td class="center-elements">
                                                            <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("CustomerController@update_customer", ['id' => base64_encode($customer->id)])}}">Editar</a>
                                                        </td>
                                                        @endrole
                                                        @role('delete_customer')
                                                        <td class="center-elements">
                                                            <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir o Usuário?')" href="{{action("CustomerController@delete_customer", ['id' => base64_encode($customer->id)])}}">Excluir</a>
                                                        </td>
                                                        @endrole()
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

