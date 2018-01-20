@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title', ' - Login')

@section('content')

<body class="hold-transition login-page" >
    <div class="login-box ">
        <div class="login-logo">
            <p class="bold">SIGO</p>
            <p class="h3">Sistema Integrado Odontologico</p>
        </div>
        <div class="login-box-body">
                {{ Form::open(array('action' => 'UserController@do_login','method' => 'POST'))}}
                <div class="form-group has-feedback">
                    {{  Form::text('username', $value = null,array('class' => 'form-control', 'placeholder' => 'Usuário'))}}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password('password',array('class' => 'form-control', 'required' => "required",'placeholder' => 'Senha')) }}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                {{  Form::submit('Entrar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
                {{ Form::close() }}
            <a href="#">Esqueceu sua senha?</a>
        </div>
    </div>


</body>
@endsection