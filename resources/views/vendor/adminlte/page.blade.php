@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
          <script src="{{ asset('js/app.js') }}"></script>
          <link rel="stylesheet" href="{{ asset('css/custom.css') }}">



    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="navbar-brand">
                            VNPT SPSM
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>SPSM</b>') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">VNPT SPSM</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <li>
                            @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                            @else
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                >
                                    <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                </a>
                                <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                                    @if(config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>

        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header">TRANG CHỦ</li>
                    <li class="active">
                            <a href="http://127.0.0.1:8000">
                                <i class="fa fa-fw fa-file "></i>
                                <span>Trang Chủ</span>
                                        </a>
                                </li>
                    <li class="header">MENUS</li>
                    <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-users "></i>
                                <span>Đơn Vị</span>
                                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                    <li class="">
                            <a href="http://127.0.0.1:8000/donvi">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Đơn vị chủ quản</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/daivt">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Đơn vị giám sát</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/nhanvien">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Nhân viên giám sát</span>
                                        </a>
                                </li>
                                </ul>
                                </li>
                    <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-gears "></i>
                                <span>Thiết Bị</span>
                                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                    <li class="">
                            <a href="http://127.0.0.1:8000/nhompi">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Nhóm thiết bị</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/pi">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Thiết bị lắp trạm</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/module">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Module chương trình</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/adcsnsr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Cảm biến ADC</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/output">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Danh mục điều khiển ra</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/param">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Tham Số chỉ dẫn thiết bị</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/alarm">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Danh Mục Cảnh Báo</span>
                                        </a>
                                </li>
                                </ul>
                                </li>
                    <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-calendar-minus-o "></i>
                                <span>Nhật ký</span>
                                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                    <li class="">
                            <a href="http://127.0.0.1:8000/logsnsr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Cảm Biến ADC</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/logalarm16">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Cảm Biến ON/OFF</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/logctrl">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Điều Khiển</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/adcsnsr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Camera</span>
                                        </a>
                                </li>
                                </ul>
                                </li>
                    <li class="active treeview menu-open">
                            <a href="#">
                                <i class="fa fa-fw fa-warning "></i>
                                <span>Cảnh Báo</span>
                                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                    <li class="active">
                            <a href="http://127.0.0.1:8000/logalarm">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Nhật Ký</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/logalarm/history">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Lịch Sử</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/logalarmneterr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Nhật ký mất kết nối</span>
                                        </a>
                                </li>
                    <li class="">
                            <a href="http://127.0.0.1:8000/adcsnsr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Bản Đồ</span>
                                        </a>
                                </li>
                                </ul>
                                </li>
                    <li class="header">ACTION</li>
                    <li class="active">
                            <a href="#">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Xóa log đã chọn</span>
                                        </a>
                                </li>
                    <li class="active">
                            <a href="#">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Xóa hết log cũ</span>
                                        </a>
                                </li>
                    <li class="active">
                            <a href="#" class = "show-logsnsr">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span >Chỉnh Cảm Biến ADC</span>
                                        </a>
                                </li>
                    <li class="active">
                            <a href="#" class = "show-logalarm16">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span >Thông Số Cảm biến ON/OFF</span>
                                        </a>
                                </li>
                    <li class="active">
                            <a href="#" class = "show-logctrl">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span >Trạng Thái Điều Khiển</span>
                                        </a>
                                </li>
                    <li class="active">
                            <a href="#">
                                <i class="fa fa-fw fa-circle-o "></i>
                                <span>Quan trắc thông số cảm biến</span>
                                        </a>
                                </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
   
    @stack('js')
    @yield('js')
@stop
