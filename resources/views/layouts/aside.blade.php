<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li><a class="menu-sidebar-a center-elements" href="{{action('ModuleController@set_module_section' , ['id' => session('module_id')])}}" style="padding-left: 0px;border-left-width: 0px; background-color: {{session('module_color')}}; opacity: .75"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
            @foreach(show_sub_modules() as $sub_module)
                <li><a class="menu-sidebar-a" style="background-color: {{session('module_color')}}; opacity: .75"    href="{{ action($sub_module->url) }}"><i class="{{$sub_module->icon}}"></i> <span>{{$sub_module->name}}</span></a></li>
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>