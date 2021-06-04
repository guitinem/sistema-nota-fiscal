<!DOCTYPE html>
<html lang="en">
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
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive compact">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<ul class="nav nav-list">
                    {{-- Notas Fiscais LI --}}
					<li class="highlight hover active">
						<a href="index.html">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text"> Notas Fiscais </span>
						</a>

						<b class="arrow"></b>
					</li>

                    {{-- Usuários LI --}}
					<li class="highlight hover">
						<a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Usuários
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Layouts
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Top Menu
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-1.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-2.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 2
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-1.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Default Mobile Menu
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-2.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Mobile Menu 2
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="mobile-menu-3.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Mobile Menu 3
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<li class="">
								<a href="typography.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Typography
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Elements
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="buttons.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Buttons &amp; Icons
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="content-slider.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Content Sliders
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="treeview.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Treeview
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="jquery-ui.html">
									<i class="menu-icon fa fa-caret-right"></i>
									jQuery UI
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="nestable-list.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Nestable Lists
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Three Level Menu
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-leaf green"></i>
											Item #1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="#" class="dropdown-toggle">
											<i class="menu-icon fa fa-pencil orange"></i>

											4th level
											<b class="arrow fa fa-angle-down"></b>
										</a>

										<b class="arrow"></b>

										<ul class="submenu">
											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-plus purple"></i>
													Add Product
												</a>

												<b class="arrow"></b>
											</li>

											<li class="">
												<a href="#">
													<i class="menu-icon fa fa-eye pink"></i>
													View Products
												</a>

												<b class="arrow"></b>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
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

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
                    <div class="page-content">

                        <!-- /.page-header -->
                        <div class="page-header">
							<h1>
								Registros de Notas Fiscais
							</h1>
						</div>
                        <!-- /.page-header -->

                        {{-- Tabela de notas fiscais --}}
                        @if(count($records) != 0)
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                                @csrf
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th class="hidden-480">CPF</th>
                                                        <th class="hidden-480">Email</th>
                                                        <th>Nota Fiscal</th>
                                                        <th>Status</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($records as $record)
                                                        <tr id="tabela-invoice-{{ $record->id }}">
                                                            <td>{{ $record->name }}</td>
                                                            <td class="hidden-480" >{{ $record->cpf }}</td>
                                                            <td class="hidden-480">{{ $record->email }}</td>
                                                            <td class="text-center">
                                                                <button class="btn btn-grey btn-xs">
                                                                    <i class="ace-icon glyphicon glyphicon-picture bigger-120"></i>
                                                                </button>
                                                            </td>
                                                            <td id="tabela-invoice-status-{{ $record->id }}">
                                                                @if (is_null($record->status))
                                                                    <span class="label label-sm label-warning">Sem avaliação</span>
                                                                @elseif($record->status)
                                                                    <span class="label label-sm label-success">Aprovado</span>
                                                                @else
                                                                <span class="label label-sm label-danger">Reprovado</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                {{-- Menu de acoes tela cheia --}}
                                                                <div class="hidden-sm hidden-xs btn-group">
                                                                    <button class="btn btn-xs btn-success" onclick="alteraStatus('{{ $record->id }}', 1)">
                                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                                    </button>

                                                                    <button class="btn btn-xs btn-danger" onclick="alteraStatus('{{ $record->id }}', 0)">
                                                                        <i class="ace-icon fa fa-times bigger-120"></i>
                                                                    </button>

                                                                    <button class="btn btn-xs btn-warning" onclick="deletaRegistro('{{ $record->id }}')">
                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                    </button>
                                                                </div>

                                                                {{-- Menu de acoes mobile --}}
                                                                <div class="hidden-md hidden-lg">
                                                                    <div class="inline pos-rel">
                                                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                            <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                            <li>
                                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                                                                    <span class="blue">
                                                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                                                                    <span class="green">
                                                                                        <i class="ace-icon fa fa-times bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                                                                    <span class="red">
                                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- /.span -->
                                    </div><!-- /.row -->
                                </div><!-- /.col -->
                            </div>
                        {{-- Sem registro de notas fiscais --}}
                        @else
                            <div class="alert alert-block alert-info">
                                <p>
                                    <strong>
                                        Sem registros de notas fiscais!
                                    </strong>
                                    <p>
                                        Clique no botão para registrar uma nota fiscal
                                    </p>
                                </p>

                                <p>
                                    <button type="button" onclick="window.location='{{ url("notas") }}'" class="btn btn-sm btn-info"><i class="ace-icon glyphicon glyphicon-pencil"></i> Registrar</button>
                                </p>
                            </div>
                        @endif

                        {{-- Tabela de notas fiscais --}}
                    </div>
					<!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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
		</div><!-- /.main-container -->

		<!-- basic scripts -->


        <!-- ace settings handler -->
		<script src="{{ asset("assets/dashboard/js/jquery.js") }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src={{ asset("assets/dashboard/js/bootstrap.js") }}></script>

		<!-- page specific plugin scripts -->
		<script src={{ asset("assets/dashboard/js/jquery-ui.custom.js") }}></script>
		<script src={{ asset("assets/dashboard/js/jquery.ui.touch-punch.js") }}></script>
		<script src={{ asset("assets/dashboard/js/jquery.easypiechart.js") }}></script>
		<script src={{ asset("assets/dashboard/js/jquery.sparkline.js") }}></script>
		<script src={{ asset("assets/dashboard/js/flot/jquery.flot.js") }}></script>
		<script src={{ asset("assets/dashboard/js/flot/jquery.flot.pie.js") }}></script>
		<script src={{ asset("assets/dashboard/js/flot/jquery.flot.resize.js") }}></script>

		<!-- ace scripts -->
		<script src={{ asset("assets/dashboard/js/ace/elements.scroller.js") }}></script>
		<script src={{ asset("assets/dashboard/js/bootbox.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.colorpicker.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.fileinput.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.typeahead.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.wysiwyg.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.spinner.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.treeview.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.wizard.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/elements.aside.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.ajax-content.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.touch-drag.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.sidebar.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.sidebar-scroll-1.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.submenu-hover.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.widget-box.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.settings.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.settings-rtl.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.settings-skin.js") }}></script>
		<script src={{ asset("assets/dashboard/js/ace/ace.widget-on-reload.js") }}></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})

				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});


			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;

			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);

			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);


			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;

			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

			 });

				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});




				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}

				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}

				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}





				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });


				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			})
        </script>

        {{-- Custom JS --}}
        <script type="text/javascript">
            const urlRecord = "{{url('/dashboard/records')}}";

            /**
             * Altera o status do registro da nota fiscal
             *
             * @param id Identificador no banco
             * @param status Novo status do registro
             *
             */
            function alteraStatus(id, status) {
                bootbox.confirm({
                    message: `Deseja ${status ? 'aprovar' : 'reprovar'} está nota fiscal?`,
                    buttons: {
                        confirm: {
                            label: 'Sim',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Não',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result){
                            let payload = new FormData();
                            payload.append('status', status)
                            payload.append("_token", "{{ csrf_token() }}")

                            fetch(urlRecord + `/status/${id}`, {
                                method: 'POST',
                                body: payload
                            })
                            .then(response => response.json())
                            .then(json => {
                                $(`#tabela-invoice-status-${id}`).html(`
                                ${status ? '<span class="label label-sm label-success">Aprovado</span>' :
                                '<span class="label label-sm label-danger">Reprovado</span>'}`)
                            })
                        }
                    }
                });
            }

            /**
             * Remove o registro do banco
             *
             * @param id Identificador no banco
             */
            function deletaRegistro(id) {
                bootbox.confirm({
                       title: 'Deletar nota fiscal',
                    message: `Deseja deletar está nota fiscal?`,
                    buttons: {
                        confirm: {
                            label: 'Sim',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'Não',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result){
                            let payload = new FormData();
                            payload.append("_token", "{{ csrf_token() }}")

                            fetch(urlRecord + `/${id}`, {
                                method: 'POST',
                                body: payload
                            })
                            .then(response => response.json())
                            .then(json => {
                                console.log('ok')
                            })
                        }
                    }
                });
            }
		</script>
	</body>
</html>
