@extends('layouts.main')

@section('content')
    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <section class="content">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Resumo Operacional</h3>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Despesas</span>
                                <span class="info-box-number">5.875,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion md-cash"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Receitas</span>
                                <span class="info-box-number">5.875,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="ion ion-ios-cart-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Orçamen. Aprovados</span>
                                <span class="info-box-number">150</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Média Receita/Dia</span>
                                <span class="info-box-number">175,25 <small>R$</small></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </section>
    </div>

    </body>
@endsection


