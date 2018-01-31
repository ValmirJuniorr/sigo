@extends('layouts.main')

@section('custom-css')
@endsection

@section('content')
    @include('layouts.nav')
    <body class="skin-blue">
            <div class="container">
                <section class="content">
                <div class="row">
                    @foreach(show_modules() as $module)
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box" style="height: 140px; background-color: {{$module->color}} ; margin-top: 40px; color: white;">
                                <div class="inner">
                                    <p style="font-size: 2em;">{{$module->name}}</p>
                                </div>
                                <a href="{{action('ModuleController@set_module_section',['id' => $module->id,'color' => $module->color])}}" class="small-box-footer" id="footer">Mais informações  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            </div>
    </body>
@endsection

