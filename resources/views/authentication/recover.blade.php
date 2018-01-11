@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
@endsection

@section('title', ' - Recuperação de Senha')

@section('content')

    <body class="hold-transition login-page">
    <div class="login-box ">
        <div class="login-logo">
            <p class="bold">SIP</p>
            <p class="h3">Sistema de Integração Pública</p>
        </div>
        <div class="login-box-body">
            {{ Form::open(array())}}
            <div class="form-group has-feedback">
                {{  Form::text('username', $value = null,array('class' => 'form-control', 'placeholder' => 'Usuário'))}}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            {{  Form::submit('Enviar',array('class'=> 'btn btn-primary btn-block btn-flat'))}}
            {!! Form::close() !!}
        </div>
    </div>
    </body>
@endsection