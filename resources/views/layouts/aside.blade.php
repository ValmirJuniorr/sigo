<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Trecho de código disponibiliza a pesquisa no menu de submodulos, contudo no momentos é inviável-->
        <!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input name="q" class="form-control" placeholder="Search..." type="text">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li><a class="menu-sidebar-a center-elements" href="" style="padding-left: 0px;border-left-width: 0px;">Dashboard</a></li>
            @foreach(show_sub_modules() as $sub_module)
                <li><a class="menu-sidebar-a" href="{{ action($sub_module->url) }}"><i class="{{$sub_module->icon}}"></i> <span>{{$sub_module->name}}</span></a></li>
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>