<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>HRIS</title>
	<link rel="icon" href="{{ asset('assets/server/img/icon.ico') }}" type="image/x-icon"/>

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
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="{{ asset('assets/server/img/jm_denis.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="{{ asset('assets/server/img/chadengle.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="{{ asset('assets/server/img/mlane.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="{{ asset('assets/server/img/talha.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="{{ asset('assets/server/img/profile2.jpg') }}" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-danger rounded-circle">
														<i class="far fa-calendar-alt"></i>
													</div>
													<span class="text">Calendar</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-warning rounded-circle">
														<i class="fas fa-map"></i>
													</div>
													<span class="text">Maps</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-info rounded-circle">
														<i class="fas fa-file-excel"></i>
													</div>
													<span class="text">Reports</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-success rounded-circle">
														<i class="fas fa-envelope"></i>
													</div>
													<span class="text">Emails</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-primary rounded-circle">
														<i class="fas fa-file-invoice-dollar"></i>
													</div>
													<span class="text">Invoice</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<div class="avatar-item bg-secondary rounded-circle">
														<i class="fas fa-credit-card"></i>
													</div>
													<span class="text">Payments</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
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
												<p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
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
										<span class="user-level">Administrator</span>
										<span class="caret"></span>
									</span>
								</a>
								<div class="clearfix"></div>

								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="#profile">
												<span class="link-collapse">My Profile</span>
											</a>
										</li>
										<li>
											<a href="#edit">
												<span class="link-collapse">Edit Profile</span>
											</a>
										</li>
										<li>
											<a href="#settings">
												<span class="link-collapse">Settings</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<ul class="nav nav-primary">
							<li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
								<a href="{{ route('dashboard') }}" class="collapsed">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>
									{{-- <span class="caret"></span> --}}
								</a>
							</li>
							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Master Data</h4>
							</li>
							<li class="nav-item {{ (request()->segment(2) == 'lowongan') ? 'active' : '' }}">
								<a href="{{ route('lowongan.index') }}" class="collapsed">
									<i class="fas fa-layer-group"></i>
									<p>Lowongan</p>
									{{-- <span class="caret"></span> --}}
								</a>
							</li>
							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">User</h4>
							</li>
							<li class="nav-item {{ (request()->segment(2) == 'roles') ? 'active' : '' }}">
								<a href="{{ route('roles.index') }}" class="collapsed">
									<i class="fas fa-layer-group"></i>
									<p>Roles</p>
									{{-- <span class="caret"></span> --}}
								</a>
							</li>
							<li class="nav-item {{ (request()->segment(2) == 'permissions') ? 'active' : '' }}">
								<a href="{{ route('permissions.index') }}" class="collapsed">
									<i class="fas fa-layer-group"></i>
									<p>Permissions</p>
									{{-- <span class="caret"></span> --}}
								</a>
							</li>
							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Setting</h4>
							</li>
							<li class="nav-item {{ (request()->segment(2) == 'perusahaan') ? 'active' : '' }}">
								<a href="{{ route('perusahaan.index') }}" class="collapsed">
									<i class="fas fa-layer-group"></i>
									<p>Informasi Perusahaan</p>
									{{-- <span class="caret"></span> --}}
								</a>
							</li>
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

	
	
</body>
</html>
