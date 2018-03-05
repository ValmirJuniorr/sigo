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
                            <h3 class="box-title">{{Lang::get('expense_category.expense_categories')}}</h3>
                            <div class="box-tools pull-right">
                                @role('store_expense_category')
                                <a href="{{ action('ExpenseCategoryController@create_expense_category') }}" class="btn btn-success btn-block ad-click-event">
                                    {{Lang::get('expense_category.new_expense_categories')}}
                                </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="col-sm-12 box-body table-responsive no-border">
                                        <div class="box-body box-body table-responsive no-border">
                                            <table class="table table-striped table-bordered datatable_data">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nome</th>
                                                    <th>Editar</th>
                                                    <th>Excluir</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($expense_categories as $expense_category)
                                                    <tr>
                                                        <td>{{$expense_category->id}}</td>
                                                        <td>{{$expense_category->name}}</td>

                                                        <td class="center-elements">
                                                            @role('update_expense_category')
                                                            <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("ExpenseCategoryController@update_expense_category", ['id' => base64_encode($expense_category->id)])}}">Editar</a>
                                                            @endrole
                                                        </td>
                                                        <td class="center-elements">
                                                            @role('delete_expense_category')
                                                            <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir a Categoria de  funcionário?')" href="{{action("ExpenseCategoryController@delete_expense_category", ['id' => base64_encode($expense_category->id)])}}">Excluir</a>
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

