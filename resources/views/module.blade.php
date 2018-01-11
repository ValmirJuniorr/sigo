@extends('layouts.main')

@section('custom-css')
@endsection

@section('content')

    @include('layouts.nav')

    <body class="skin-blue">

            <!-- utilitários -->
            <!-- iptu -->
            <!-- relatórios -->
            <div class="container">
                <section class="content-header">
                    <h1>Módulos do Sistema</h1>
                </section>

                <section class="content">
                <div class="row">

                    @foreach(show_modules() as $module)

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box" style="background-color: {{$module->color}} ; color: white;">
                                <div class="inner">
                                    <h3>{{$module->name}}</h3>

                                    <p>{{$module->description}}</p>
                                </div>

                                <a href="{{action('ModuleController@set_module_section',['id' => $module->id])}}" class="small-box-footer">
                                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    @endforeach

                </div>

            </section>
            </div>
    </body>
@endsection

