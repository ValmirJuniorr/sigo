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
                                    <div class="col-sm-12">
                                        <div class="box-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-justified">
                                                @php  $flag_tab_ul = 0;  @endphp
                                                @foreach($transactionOfCustomer as $category => $transactions)
                                                    @if($flag_tab_ul == 0)
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#{{$category}}" role="tab">{{$category}}</a>
                                                        </li>
                                                        @php $flag_tab_ul = 1; @endphp
                                                    @else
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#{{$category}}" role="tab">{{$category}}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <!-- Tab panels -->
                                            <div class="tab-content card">
                                                @php  $flag_tab_div = 0;  @endphp
                                                @foreach($transactionOfCustomer as $category => $transactions)
                                                    @if($flag_tab_div == 0)
                                                      <div class="tab-pane fade in show active" id="{{$category}}" role="tabpanel">
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
                                                                      <td>{{$transaction->paid}}</td>
                                                                  </tr>
                                                               @endforeach
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                        @php $flag_tab_div = 1; @endphp
                                                    @else
                                                        <div class="tab-pane fade" id="{{$category}}" role="tabpanel">
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
                                                                        <td>{{$transaction->paid}}</td>
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

