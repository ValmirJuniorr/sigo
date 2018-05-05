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
                            <h3 class="box-title">Prontuários</h3>
                            <div class="box-tools pull-right">
                                @role('store_transaction')
                                <a href="{{ action('CustomerController@create_customer') }}" class="btn btn-success btn-block ad-click-event">
                                        Novo Prontuário
                                </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12 box-body table-responsive no-border">
                                        <div class="box-body">
                                            <table class="table table-striped table-bordered datatable_data">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Cliente</th>
                                                    <th class="hide-on-med-and-down ">Cpf</th>
                                                    <th class="hide-on-med-and-down">Cidade</th>
                                                    <th>Prontuários</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($customers as $customer)
                                                     <tr>
                                                         <td>{{$customer->id}}</td>
                                                         <td>{{$customer->name}}</td>
                                                         <td class="hide-on-med-and-down ">{{$customer->cpf}}</td>
                                                         <td class="hide-on-med-and-down">{{$customer->city}}</td>
                                                         <td>
                                                             @role('update_transaction')
                                                             <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("TransactionController@show", ['id' => base64_encode($customer->id)])}}">Detalhes</a>
                                                             @endrole
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

