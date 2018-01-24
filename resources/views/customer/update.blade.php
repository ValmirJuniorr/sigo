@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection

@section('content')

    <body class="skin-blue" style="height: auto; min-height: 100%;">
    @include('layouts.nav')
    @include('layouts.aside')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cliente
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => array('CustomerController@update_customer','id' => $customer->id)))}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-body">

                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
@endsection

