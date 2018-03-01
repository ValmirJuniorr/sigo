@extends('layouts.main')

@section('custom-css')
@endsection

@section('content')

    @include('layouts.nav')
    <body class="skin-blue">


        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Informações Gerais</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Informações de Segurança</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Atividade da Conta</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form role="form">
                                    <div class="row">
                                            <div class="col-md-8">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nome</label>
                                                            <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label>
                                                            <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="email">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">CPF</label>
                                                            <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Telefone</label>
                                                            <input class="form-control" disabled id="exampleInputPassword1" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tipo de Conta</label>
                                                    <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Data de Nascimento</label>
                                                    <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Sexo</label>
                                                    <input class="form-control" disabled id="exampleInputEmail1" placeholder="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Níveis de Acesso</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="box-group" id="accordion">
                                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                        <div class="panel box box-primary">
                                                            <div class="box-header with-border">
                                                                <h5>
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                                                        Collapsible Group Item #1
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                <div class="box-body">
                                                                    //mostrar as regras em um accordion
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Senha Antiga</label>
                                                    <input class="form-control"  id="exampleInputEmail1" placeholder="" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nova Senha</label>
                                                    <input class="form-control"  id="exampleInputEmail1" placeholder="" type="password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Confirmação da Nova Senha</label>
                                                    <input class="form-control"  id="exampleInputEmail1" placeholder="" type="password">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Trocar Senha</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">

                                            <!-- /.box-header -->
                                            <div class="box-body no-padding">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>IP</th>
                                                        <th>Data e Hora</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>192.168.0.1</td>
                                                        <td>15/11/2017, 16:13
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.col -->


                <!-- /.col -->
            </div>

        </section>

    </body>
@endsection

