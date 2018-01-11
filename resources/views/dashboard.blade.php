@extends('layouts.main')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection

@section('content')

    <body class="skin-blue">
        @include('layouts.nav')
        @include('layouts.aside')



    </body>
@endsection

