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
                Usuários
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <div class="box box-body">
                        {{ Form::open(array('action' => 'UserController@store','method' => 'POST'))}}
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($submodules as $submodule)
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h5>
                                                <a class="box-title"> {{$submodule->name}}</a>
                                            </h5>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                            </div>
                                        </div>

                                        <div class="box-body">
                                            @foreach($submodule->roles as $role)
                                                <p class="role-checkbox">
                                                    {{ Form::checkbox('roles[]', $role->id, false) }}
                                                    <label>{{ $role->display }}</label>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                               <div class="box">
                                    <div class="form-group has-feedback">
                                        {{  Form::label('name', 'Nome') }}
                                        {{  Form::text('name', $value = null,array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                    </div>
                                    <div class="form-group has-feedback">
                                        {{ Form::label('password', 'Senha') }}
                                        {{ Form::password('password',array('class' => 'form-control', 'required' => "required",'placeholder' => 'Senha')) }}
                                    </div>
                                    <div class="form-group has-feedback">
                                        {{ Form::label('password-confirm', 'Confirmação de Senha') }}
                                        {{ Form::password('password-confirm',array('class' => 'form-control', 'required' => "required",'placeholder' => 'Confirmação de Senha')) }}
                                    </div>
                                    <div class="form-group has-feedback">
                                        {{  Form::label('username', 'Nome de Usuário') }}
                                        {{  Form::text('username', $value = null,array('class' => 'form-control', 'placeholder' => 'Nome de Usuário'))}}
                                    </div>
                                    <div class="form-group has-feedback">
                                        {{ Form::label('email', 'Email') }}
                                        {{  Form::email('email', $value = null,array('class' => 'form-control', 'placeholder' => 'Email'))}}
                                    </div>
                                    <div class="form-group has-feedback role-checkbox">
                                        {{ Form::submit('Cadastrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
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
        </section>
    </div>
    </body>
@endsection

