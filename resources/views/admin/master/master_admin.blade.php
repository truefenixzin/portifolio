<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY TITLE</title>
    <link rel="icon" href="{{asset('site/img/logo.png')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('back/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('back/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/summernote-0.8.18-dist/summernote-bs4.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="{{route('admin.logout')}}" role="button">
                    <i class="fas fa-sign-out-alt"> Sair</i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link">
            <img src="{{asset('assets/brand/.png')}}" alt="" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{{\Illuminate\Support\Facades\Auth::user()->name}}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin.home')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Inicio
                            </p>
                        </a>
                    </li>

                    @can('subir arquivos')
                        {{--                        menu slides--}}
{{--                        <li class="{{(strpos (Route :: currentRouteName (), 'admin.paybox') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">--}}
{{--                            <a class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-file-invoice-dollar"></i>--}}
{{--                                <p>Caixa </p>--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}

{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.paybox.create')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-edit nav-icon"></i>--}}
{{--                                        <p>Atualizar</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.paybox.index')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-money-check nav-icon"></i>--}}
{{--                                        <p>Gerenciar</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

                        <li class="
                            {{(strpos (Route :: currentRouteName (), 'admin.campaigns') === 0)
                            ? 'nav-item menu-is-opening menu-open'
                            : 'nav-item'}}">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-gifts"></i>
                                <p>
                                    Campanhas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.campaigns.create')}}" class="nav-link">
                                        <i class="far fa fa-comment-medical nav-icon"></i>
                                        <p>Cadastrar campanhas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.campaigns.index')}}" class="nav-link">
                                        <i class="far fa fa-list-ul nav-icon"></i>
                                        <p>Listar campanhas</p>
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a href="{{route('admin.commission.create')}}" class="nav-link">
                                        <i class="far fa fa-table nav-icon"></i>
                                        <p>Tabela de comissão</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>


                        <li class="{{(strpos (Route :: currentRouteName (), 'admin.slides') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-photo-video"></i>
                                <p>Recados </p>
                                <i class="fas fa-angle-left right"></i>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.slides.create')}}" class="nav-link">
                                        <i class="far fa fa-images nav-icon"></i>
                                        <p>Cadastrar Recados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.slides.index')}}" class="nav-link">
                                        <i class="far fa fa-list-ul nav-icon"></i>
                                        <p>Listar Recados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--                        menu destaques--}}
                        <li class="{{(strpos (Route :: currentRouteName (), 'admin.workers') === 0) || (strpos (Route :: currentRouteName (), 'admin.qualitys') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Destaques </p>
                                <i class="fas fa-angle-left right"></i>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.workers.create')}}" class="nav-link">
                                        <i class="far fa fa-users-cog nav-icon"></i>
                                        <p>Cadastrar Destaques</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.workers.index')}}" class="nav-link">
                                        <i class="far fa fa-user-edit nav-icon"></i>
                                        <p>Listar Destaques</p>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        {{--                    Menu Features--}}
                       {{--  <li class="{{(strpos (Route :: currentRouteName (), 'admin.news') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Noticias </p>
                                <i class="fas fa-angle-left right"></i>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.news.create')}}" class="nav-link">
                                        <i class="far fa fa-plus-square nav-icon"></i>
                                        <p>Cadastrar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.news.index')}}" class="nav-link">
                                        <i class="far fa fa-list-ol nav-icon"></i>
                                        <p>Listar</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    @endcan


{{--                    <li class="{{(strpos (Route :: currentRouteName (), 'admin.posts') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">--}}
{{--                        <a class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-comment"></i>--}}
{{--                            <p>--}}
{{--                                Comitê--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            @can('cadastrar comite')--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.posts.create')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-comment-medical nav-icon"></i>--}}
{{--                                        <p>Cadastrar</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('listar comite')--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.posts.index')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-list-ul nav-icon"></i>--}}
{{--                                        <p>Listar tudo</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="{{(strpos (Route :: currentRouteName (), 'admin.posts') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">--}}
{{--                        <a class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-bell"></i>--}}
{{--                            <p>--}}
{{--                                BLOG--}}
{{--                                <i class="fas fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            @can('cadastrar comite')--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.posts.create')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-comment-medical nav-icon"></i>--}}
{{--                                        <p>Cadastrar</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('listar comite')--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('admin.posts.index')}}" class="nav-link">--}}
{{--                                        <i class="far fa fa-list-ul nav-icon"></i>--}}
{{--                                        <p>Listar tudo</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                        </ul>--}}
{{--                    </li>--}}






                @can('cadastrar usuario')
                        <li class="{{(strpos (Route :: currentRouteName (), 'admin.users') === 0)? 'nav-item menu-is-opening menu-open': 'nav-item'}}">
                            <a class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Usuários
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.users.create')}}" class="nav-link">
                                        <i class="far fa fa-plus nav-icon"></i>
                                        <p>Cadastrar</p>
                                    </a>
                                </li>
                                @endcan
                                @can('listar usuarios')
                                    <li class="nav-item">
                                        <a href="{{route('admin.users.index')}}" class="nav-link">
                                            <i class="far fa fa-list nav-icon"></i>
                                            <p>Listar tudo</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

    </div>

    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            Todos os direitos reservados.
        </div>
        <strong>Copyright &copy; 2020
            - {{date_format(now(),'Y')}}</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/dist/summernote-0.8.18-dist/summernote-bs4.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200,
            minHeight: 200,
            maxHeight: 200

        });
    });
</script>
</body>
</html>

