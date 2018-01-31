
<header class="main-header">

    <!-- Logo -->

    <a href="{{ action('ModuleController@index') }}" class="logo" style="background-color: {{session('module_color')}};">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SIGO</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SIGO</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" style="background-color: {{session('module_color')}}; opacity: 0.9" role="navigation">


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
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">

                            <p>
                                {{ Auth::user()->username  }}
                                <small>Desenvolvedor</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('ProfileController@index') }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Ajuda</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i alt="Sair"  class="fa fa-sign-out"></i> </a>
                </li>
            </ul>
        </div>
    </nav>
</header>