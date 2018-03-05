
<header class="main-header">

    <!-- Logo -->
    <a href="{{ action('ModuleController@index') }}" class="logo hide-on-small-only" style="background-color: {{session('module_color')}};">
        <img src="{{asset('img/teeth.png')}}" style="width:40px; margin-top: -4px;">
        <span class=""><b>SIGO</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style="background-color: {{session('module_color')}}; opacity: 0.9" role="navigation">

        <a href="#" class="sidebar-toggle show-on-small inline click" data-toggle="push-menu" role="button" style="background: {{session('module_color')}}">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <a href="{{ action('ModuleController@index') }}" class="show-on-small inline center-icon click" style="background-color: {{session('module_color')}}; margin-left: 30%; position:absolute;">
            <img src="{{asset('img/teeth.png')}}" style="width:32px;">
            <span class="hide-on-small-only"><b>SIGO</b></span>
        </a>


        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                <!-- Notifications Menu -->
                {{--<li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Notificações</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-search text-aqua"></i> Teste teste
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> teste
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Ver todas</a></li>
                    </ul>
                </li>--}}

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <span class=""> <i class="fa fa-user-circle" style="width: 20px;"></i> {{explode(' ',trim(Auth::user()->name ))[0]}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">

                            <p>
                                {{Auth::user()->username}}
                                <small>Desenvolvedor</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('ProfileController@index') }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>

                            <div class="pull-right">
                                <a href="{{action('UserController@logout')}}" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>
                    <a href="#" data-toggle="control-sidebar"><i alt="Sair"  class="fa fa-sign-out"></i> </a>
                </li>--}}
            </ul>
        </div>
    </nav>
</header>