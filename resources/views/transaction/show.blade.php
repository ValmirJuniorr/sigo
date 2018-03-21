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
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12 box-body table-responsive no-border">
                                        <div class="box-body">
                                            <div class="nav-tabs-custom">
                                                <h3>Prontuários do Cliente</h3>
                                                <div class="row col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px;">

                                                   <div class="row col-sm-7 col-md-7 col-lg-7" style="margin-top: 10px;">
                                                    <div class="form-group row col-sm-12 col-md-6 col-lg-6">
                                                        {{  Form::label('expense_category_id', 'Profissional') }}
                                                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                                                            <select name="expense_category_id" class="form-control select2-hidden-accessible">
                                                                <option></option>
                                                                @foreach($staffs as $staff)
                                                                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-sm-6 col-md-6 col-lg-6">
                                                        {{  Form::label('expense_category_id', 'Categoria do Procedimento') }}
                                                        <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                            <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                                                            <select name="expense_category_id" class="form-control select2-hidden-accessible">
                                                                <option></option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-sm-6 col-md-6 col-lg-6">
                                                           {{  Form::label('expense_category_id', 'Procedimento') }}
                                                           <div class="input-group date col-sm-11 col-md-11 col-lg-11">
                                                               <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                                                               <select name="expense_category_id" class="form-control select2-hidden-accessible">
                                                                   <option></option>
                                                                   @foreach($categories as $category)
                                                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                                                   @endforeach
                                                               </select>
                                                           </div>
                                                    </div>
                                                </div>
                                                <div class="row col-sm-5 col-md-5 col-lg-5" >

                                                    <div class="form-group row col-sm-12 col-md-12 col-lg-12">
                                                        <label for="description">Descrição do Procedimento</label>
                                                        <textarea class="form-control" id="description" rows="3" cols="50" ></textarea>
                                                    </div>
                                                    <div class="form-group has-feedback role-checkbox col-lg-offset-8 col-sm-12 col-md-4 col-lg-4" style="margin-top: 20px;">
                                                        {{ Form::submit('Adicionar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- tabs da page -->

                                                <div class="row col-sm-12 col-md-12 col-lg-12" style="margin-top: 60px;">
                                                    <ul class="nav nav-tabs">
                                                        @php  $flag_tab_ul = 0;  @endphp
                                                        @foreach($transactionOfCustomer as $category => $transactions)
                                                            @if($flag_tab_ul == 0)
                                                                <li class="active"><a href="#{{$category}}" data-toggle="tab">{{title_case($category)}}</a></li>
                                                                @php $flag_tab_ul = 1; @endphp
                                                            @else
                                                                <li><a href="#{{$category}}" data-toggle="tab">{{title_case($category)}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <div class="tab-content">
                                                        @php  $flag_tab_div = 0;  @endphp
                                                        @foreach($transactionOfCustomer as $category => $transactions)
                                                            @if($flag_tab_div == 0)
                                                                <div class="tab-pane active" id="{{$category}}">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Codigo</th>
                                                                            <th>Procedimento</th>
                                                                            <th>Valor</th>
                                                                            <th>Responsável</th>
                                                                            <th>Situação</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($transactions as $transaction)
                                                                            <tr>
                                                                                <td>{{$transaction->id}}</td>
                                                                                <td>{{$transaction->procedure->name}}</td>
                                                                                <td>{{$transaction->price}}</td>
                                                                                <td>{{$transaction->staff->name}}</td>
                                                                                <td>{{$transaction->transactionStatus->name}}</td>
                                                                                @if($transaction->paid)
                                                                                    <td><i class="fa fa-check-circle" style="color:#4ca20b; font-size: 22px;"></i></td>
                                                                                @else
                                                                                    <td><i class="fa fa-window-minimize" style="color:#009fe8; font-size: 16px;"></i></td>
                                                                                @endif
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                @php $flag_tab_div = 1; @endphp
                                                            @else
                                                                <div class="tab-pane" id="{{$category}}" >
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Codigo</th>
                                                                            <th>Procedimento</th>
                                                                            <th>Valor</th>
                                                                            <th>Responsável</th>
                                                                            <th>Situação</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($transactions as $transaction)
                                                                            <tr>
                                                                                <td>{{$transaction->id}}</td>
                                                                                <td>{{$transaction->procedure->name}}</td>
                                                                                <td>{{$transaction->price}}</td>
                                                                                <td>{{$transaction->staff->name}}</td>
                                                                                <td>{{$transaction->transactionStatus->name}}</td>
                                                                                @if($transaction->paid)
                                                                                   <td><i class="fa fa-check-circle" style="color:#4ca20b; font-size: 22px;"></i></td>
                                                                                @else
                                                                                    <td><i class="fa fa-window-minimize" style="color:#009fe8; font-size: 16px;"></i></td>
                                                                                @endif
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
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

