@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title', ' - Login')

@section('content')

<body class="hold-transition login-page" style="background-color: #3c8dbc" >
    <div class="login-box ">
        <div class="login-logo">
            <p class="bold white_text">SIGO</p>
            <p class="h3 white_text">Sistema Integrado Odontológico</p>
        </div>
        <div class="login-box-body">
                {{ Form::open(array('action' => 'UserController@do_login','method' => 'POST'))}}
                <div class="form-group has-feedback">
                    {{  Form::text('username', $value = "",array('class' => 'form-control', 'placeholder' => 'Usuário' , 'autoComplete' => 'off'))}}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{ Form::password('password',array('class' => 'form-control secure', 'required' => "required",'placeholder' => 'Senha')) }}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                {{  Form::submit('Entrar',array('class'=> 'btn btn-block btn-flat white_text' ,'style' => 'background-color: #3c8dbc'))}}
                {{ Form::close() }}
            {{--<a href="#">Esqueceu sua senha?</a>--}}
        </div>
    </div>


</body>
@endsection