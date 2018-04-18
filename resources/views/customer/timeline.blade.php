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
                        <div class="box-body">
                            <div style="overflow-y: scroll; height:500px">
                                <ul class="timeline">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                <span class="bg-blue">
                                    Procedimentos
                                </span>
                                    </li>
                                    <!-- /.timeline-label -->

                                @foreach($transactions as $transaction)
                                    <!-- timeline item -->
                                        <li>
                                            <!-- timeline icon -->
                                            @if($transaction->paid)
                                                <i title="Pago" data-toggle="tooltip" class="fa fa-check-circle bg-green" ></i>
                                            @else
                                                <i title="Inadiplente" data-toggle="tooltip" class="fa fa-times-circle bg-red"></i>
                                            @endif
                                            <!--i class="fa fa-money bg-blue"></i-->
                                            <div class="timeline-item">
                                                <span class="date"><i class="fa fa-calendar"></i> {{$transaction->transaction_date}}</span>

                                                <h3 class="timeline-header">
                                                    @if($transaction->transactionStatus->name == \App\Models\Util\Constants::TRANSACTION_STATUS_WARNING)
                                                        <i title="{{$transaction->transactionStatus->name}}" data-toggle="tooltip" class="fa fa-exclamation-circle bg-yellow icon-circle" ></i>
                                                    @else
                                                        <i title="{{$transaction->transactionStatus->name}}" data-toggle="tooltip" class="fa fa-check-circle bg-green icon-circle"></i>
                                                    @endif
                                                    <a href="#">
                                                        {{$transaction->procedure->name}}  {{show_money_mask($transaction->price)}}
                                                    </a></h3>

                                                <div class="timeline-body">

                                                    Descrição: {{$transaction->description}}
                                                </div>

                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Detalhar</a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                    @endforeach
                                    ...

                                </ul>
                            </div>

                        </div>

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

