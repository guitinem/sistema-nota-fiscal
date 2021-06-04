<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sistema Nota Fiscal - Dashboard</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{ asset("assets/dashboard/css/bootstrap.css") }}"/>
		<link rel="stylesheet" href="{{ asset("assets/dashboard/css/font-awesome.css")}} "/>

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{ asset("assets/dashboard/css/ace-fonts.css")}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{ asset("assets/dashboard/css/ace.css") }}" class="ace-main-stylesheet" id="main-ace-style" />

        @stack('head-imports')
    </head>
    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Sistema Nota Fiscal
						</small>
					</a>
                    <div class="navbar-buttons navbar-header pull-right" role="navigation">
                        <ul class="nav ace-nav">
                            <!-- #section:basics/navbar.user_menu -->
                            <li class="light-blue">
                                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                    <span class="user-info">
                                        <small>Welcome,</small>
                                        {{ Auth::user()->name }}
                                    </span>

                                    <i class="ace-icon fa fa-caret-down"></i>
                                </a>

                                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                    <li>
                                        <a href="profile.html">
                                            <i class="ace-icon fa fa-user"></i>
                                            Perfil
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="{{ route('dashboard.logout') }}">
                                            <i class="ace-icon fa fa-power-off"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- /section:basics/navbar.user_menu -->
                        </ul>
                    </div>
				</div>



				<!-- #section:basics/navbar.dropdown -->

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>
		<!-- /section:basics/navbar.layout -->

        {{-- Main Div --}}
        <div class="main-container" id="main-container">

            {{-- Side Bar --}}
            <script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar responsive compact">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
                    {{-- Notas Fiscais LI --}}
					<li id="sidebar-records" class="highlight hover">
						<a href="{{ route('dashboard.main') }}">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text"> Notas Fiscais </span>
						</a>

						<b class="arrow"></b>
					</li>

                    {{-- Usuários LI --}}
					<li id="sidebar-users" class="highlight hover">
						<a href="{{ route('dashboard.user.index') }}">
                            <i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Usuários </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
					</li>

				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				{{-- <!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script> --}}
			</div>

            {{-- Content --}}
            <div class="main-content">
                @yield('content')
            </div>

            {{-- Footer --}}
            <div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
        </div>

        <!--Master scripts-->
        @include('dashboard.scripts_master')

        <!--Custom scripts-->
        @stack('scripts')
    </body>
</html>
