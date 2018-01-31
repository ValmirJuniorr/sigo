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
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{ Form::open(array('action' => array('UserController@update','id' => $user->id)))}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-body">
                                        @foreach($submodules as $submodule)

                                            <div class="box-group" id="accordion">
                                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                                <div class="panel box box-primary">
                                                    <div class="box-header with-border">
                                                        <h5>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$submodule->name}}" aria-expanded="false" class="collapsed">
                                                                {{$submodule->name}}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="{{$submodule->name}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="box-body">
                                                            @foreach($submodule->roles as $role)
                                                                <p class="role-checkbox">
                                                                    {{--{{ Form::checkbox('roles['.$role->id.']') }}--}}
                                                                    {{ Form::checkbox('roles[]', $role->id, $user->role_checked($role->id)) }}
                                                                    <label>{{ $role->display }}</label>
                                                                </p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-body">
                                        <div class="form-group has-feedback">
                                            {{  Form::label('name', 'Nome') }}
                                            {{  Form::text('name', $value = $user->name,array('class' => 'form-control', 'placeholder' => 'Nome'))}}
                                        </div>
                                        <div class="form-group has-feedback">
                                            {{ Form::label('password', 'Senha') }}
                                            {{ Form::password('password',array('class' => 'form-control', 'disabled' => 'disabled', 'placeholder' => 'Senha')) }}
                                        </div>
                                        <div class="form-group has-feedback">
                                            {{ Form::label('password-confirm', 'Confirmação de Senha') }}
                                            {{ Form::password('password-confirm',array('class' => 'form-control', 'disabled' => 'disabled','placeholder' => 'Confirmação de Senha')) }}
                                        </div>
                                        <div class="form-group has-feedback">
                                            {{  Form::label('username', 'Nome de Usuário') }}
                                            {{  Form::text('username', $value = $user->username,array('class' => 'form-control', 'placeholder' => 'Nome de Usuário'))}}
                                        </div>
                                        <div class="form-group has-feedback">
                                            {{ Form::label('email', 'Email') }}
                                            {{  Form::email('email', $value = $user->email,array('class' => 'form-control', 'placeholder' => 'Email'))}}
                                        </div>
                                        <div class="form-group has-feedback">
                                            {{ Form::submit('Editar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                                        </div>
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

