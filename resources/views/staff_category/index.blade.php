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
                            <h3 class="box-title">{{Lang::get('staff_category.staff_categories')}}</h3>
                            <div class="box-tools pull-right">
                                @role('store_staff_category')
                                <a href="{{ action('StaffCategoryController@create_staff_category') }}" class="btn btn-success btn-block ad-click-event">
                                    {{Lang::get('staff_category.new_staff_categories')}}
                                </a>
                                @endrole
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12 box-body table-responsive no-border">
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
                                                @foreach($staff_categories as $staff_category)
                                                    <tr>
                                                        <td>{{$staff_category->id}}</td>
                                                        <td>{{$staff_category->name}}</td>

                                                        <td class="center-elements">
                                                            @role('update_staff_category')
                                                            <a class="btn btn-primary btn-sm ad-click-event"  href="{{action("StaffCategoryController@update_staff_category", ['id' => base64_encode($staff_category->id)])}}">Editar</a>
                                                            @endrole
                                                        </td>
                                                        <td class="center-elements">
                                                            @role('delete_staff_category')
                                                            <a class="btn btn-danger btn-sm ad-click-event" onclick="return confirm('Você deseja excluir a Categoria de  funcionário?')" href="{{action("StaffCategoryController@delete_staff_category", ['id' => base64_encode($staff_category->id)])}}">Excluir</a>
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

