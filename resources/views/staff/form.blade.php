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
                {{Lang::get('staff.staffs')}}
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => array($action,'id' => $staff->id)))}}
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="box-body">
                                        <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                            {{  Form::label('name', 'Nome') }}
                                            {{  Form::text('name', $value = $staff->name,array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                        </div>
                                        <div class="form-group has-feedback col-sm-12 col-md-6 col-lg-6">
                                            {{  Form::label('document', 'Documento') }}
                                            {{  Form::text('document', $value = $staff->document,array('class' => 'form-control', 'placeholder' => 'Documento'))}}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                            @include('components.select_ufs', ['value' => $staff->uf])
                                        </div>
                                        <div class="form-group has-feedback role-checkbox col-sm-12 col-md-2 col-lg-2 pull-right" style="margin-top: 20px;">
                                            {{ Form::submit($actionName,array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
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