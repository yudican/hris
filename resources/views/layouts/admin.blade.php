<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>HRIS</title>
	<link rel="icon" href="{{ asset('assets/server/img/logo msdhris.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/server/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('assets/server/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script src="{{ asset('assets/server/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
	<script src="{{ asset('js/service.js') }}"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/server/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/server/css/atlantis.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/server/css/demo.css') }}">
	@stack('style')
	<livewire:styles>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
					<img src="{{ asset('assets/server/img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

            <!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('assets/server/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
									
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{ asset('assets/server/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ Auth::user()->name }}</h4>
												<p class="text-muted">{{ Auth::user()->email }}</p>
												<form action="{{ route('logout') }}" method="post">
													@csrf
													{{ method_field('POST') }}
													<button type="submit" class="btn btn-xs btn-secondary btn-sm">Log Out</button>
												</form>
											</div>
										</div>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
            <!-- End Navbar -->
            
            <!-- Sidebar -->
			<div class="sidebar sidebar-style-2">			
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="{{ asset('assets/server/img/profile.jpg') }}" alt="avatar" class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										{{ Auth::user()->name }}
										<span class="user-level">online</span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							@foreach($menus as $menu)
								@if (!$menu->parent_id && !$menu->children->isEmpty())
								{{-- 
									$menu->permissions()->pluck('name')[0] -> Create	
									$menu->permissions()->pluck('name')[1] -> Read	
									$menu->permissions()->pluck('name')[2] -> Update	
									$menu->permissions()->pluck('name')[3] -> Delete	
								--}}
									@if(in_array($menu->permissions()->pluck('name')[1], auth()->user()->getPermissionsViaRoles()->pluck('name')->toArray()))
										<li class="nav-item {{ (request()->segment(1) == explode('.', $menu->url)[0]) ? 'active' : '' }}">
											<a data-toggle="collapse" href="#{{ $menu->id }}" class="collapsed" aria-expanded="false">
												<i class="{{ $menu->icon }}"></i>
												<p>{{ $menu->name }}</p>
												<span class="caret"></span>
											</a>
											<div class="collapse" id="{{ $menu->id }}">
												<ul class="nav nav-collapse">
													@foreach($menu->children as $child)
														@if(in_array($child->permissions()->pluck('name')[1], auth()->user()->getPermissionsViaRoles()->pluck('name')->toArray()))
															<li>
																<a href="{{ route($child->url)  }}">
																	<i class="{{ $child->icon }}"></i>
																	<p>{{ $child->name }}</p>
																</a>
															</li>
														@endif
													@endforeach
												</ul>
											</div>
										</li>
									@endif
								@else
									@if(in_array($menu->permissions()->pluck('name')[1], auth()->user()->getPermissionsViaRoles()->pluck('name')->toArray()))
										<li class="nav-item {{ (request()->segment(1) == explode('.', $menu->url)[0]) ? 'active' : '' }}">
											<a href="{{ $menu->url ? route($menu->url) : '#' }}" class="collapsed">
												<i class="{{ $menu->icon }}"></i>
												<p>{{ $menu->name }}</p>
												{{-- <span class="caret"></span> --}}
											</a>
										</li>
									@endif
								@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		<!-- End Sidebar -->

			<div class="main-panel">
				@yield('content')
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="http://www.themekita.com">
										ThemeKita
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										Help
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										Licenses
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
						</div>				
					</div>
				</footer>
			</div>
	</div>
	<!--   Core JS Files   -->
	@yield('modal')
	<script src="{{ asset('assets/server/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/server/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('assets/server/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/server/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/server/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Moment JS -->
	<script src="{{ asset('assets/server/js/plugin/moment/moment.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/server/js/atlantis.min.js') }}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets/server/js/setting-demo.js') }}"></script>
	<script src="{{ asset('assets/server/js/demo.js') }}"></script>


	@stack('script')
	@if (session()->has('success'))
	<script src="{{ url('assets/server/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
	<script>
		$(function(){
			let content = {
				message: "{{ session('success') }}",
				title: 'Success',
				icon: 'icon-check'
			}
			$.notify(content,{
					type: 'success',
					placement: {
						from: 'top',
						align: 'right'
					},
					time: 1000,
					delay: 2000,
				});
		})
	</script>
@endif
{{-- 
	

	<!-- jQuery Sparkline -->
	<script src="{{ asset('assets/server/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('assets/server/js/plugin/datatables/datatables.min.js') }}"></script>


	<!-- Bootstrap Toggle -->
	<script src="{{ asset('assets/server/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

	<!-- Dropzone -->
	<script src="{{ asset('assets/server/js/plugin/dropzone/dropzone.min.js') }}"></script>

	<!-- Fullcalendar -->
	<script src="{{ asset('assets/server/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

	<!-- DateTimePicker -->
	<script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="{{ asset('assets/server/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

	<!-- Bootstrap Wizard -->
	<script src="{{ asset('assets/server/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

	<!-- jQuery Validation -->
	<script src="{{ asset('assets/server/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

	<!-- Summernote -->
	<script src="{{ asset('assets/server/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

	<!-- Select2 -->
	<script src="{{ asset('assets/server/js/plugin/select2/select2.full.min.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('assets/server/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Owl Carousel -->
	<script src="{{ asset('assets/server/js/plugin/owl-carousel/owl.carousel.min.js') }}"></script>

	<!-- Magnific Popup -->
	<script src="{{ asset('assets/server/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script> --}}

	
	<livewire:scripts>
</body>
</html>
