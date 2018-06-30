@extends('layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/module.css')}}">
@endsection
@section('content')
    <body class="skin-blue" id="teste">
    @include('layouts.nav')
    @include('layouts.aside')

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dashboard</h3>


                            <small>Últimos 15 dias</small>


                        </div>
                        <div class="box-body">

                            @if(session('module_id') == 1)
                                @include('components.dashboards.include_procedures_dashboard')
                            @endif

                            @if(session('module_id') == 2)
                                @include('components.dashboards.include_financial_dashboard')
                            @endif

                            @if(session('module_id') == 4 or session('module_id') == 5)
                                @include('components.dashboards.include_nothing_dashboard')
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    </body>
@endsection

