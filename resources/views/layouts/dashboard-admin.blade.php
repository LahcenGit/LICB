<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Workload : Workload Project Management Admin  Bootstrap 5 Template" />
	<meta property="og:image" content="https:/workload.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>LICB+ | Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('dashboard/images/favicon.png')}}" />
	<link href="{{asset('dashboard/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('dashboard/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('dashboard/vendor/nouislider/nouislider.min.css')}}">

	<!-- Style css -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('dashboard/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/pickadate/themes/default.date.css')}}">
	
	<link rel="stylesheet" href="{{ asset('dashboard/vendor/select2/css/select2.min.css') }}">
	<link href="{{asset('dashboard/vendor/summernote/summernote.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/toastr/css/toastr.min.css') }}">

	<link rel="stylesheet" href="{{asset('plugins/image-master/image-uploader.min.css')}}">
	
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />





</head>

<style>

	.note-editor.note-frame .note-editing-area .note-editable{
		background-color: #202020;
		color: #202020;
	}

   /* blur statistique */

	.temp-body {
		filter: blur(4px);
		}
	.temp-body:before {
		content: "";
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: rgba(12, 12, 12, 0.2);
		z-index: 999;
		pointer-events: none;/* This will do all the magic !*/
	}
	
	.error {
        color: #B31810;
	}


</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="index.html" class="brand-logo">
				<img src="{{asset('dashboard/logo-dashboard.png')}}" alt="">

				<div class="brand-title">
					<h2 class="">Dashboard</h2>
					<span class="brand-sub-title">Panel Management Admin</span>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>

			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"/>
										<path d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z" fill="#717579"/>
									</svg>
                                    <span class="badge light text-white bg-blue rounded-circle">0</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">

										</ul>
									</div>
                                    <a class="all-notification" href="javascript:void(0);">En cours...  <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>

							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('dashboard/images/user.jpg') }}" width="20" height="20" alt=""/>
									<div class="header-info ms-3">
										<span class="fs-18 font-w500 mb-2">Admin.</span>
										<small class="fs-12 font-w400">administrateur</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>

                                    <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Déconnexion </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{url('admin')}}" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-layer-group"></i>
							<span class="nav-text">Catégories</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('admin/categories/create')}}">Ajouter</a></li>
							<li><a href="{{url('admin/categories')}}">Toutes les catégories</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-star"></i>
							<span class="nav-text">Marques</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('admin/marks/create')}}">Ajouter</a></li>
							<li><a href="{{url('admin/marks')}}">Toutes les marques</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="fas fa-shapes"></i>
							<span class="nav-text">Attributs</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('admin/attributes/create')}}">Ajouter</a></li>
                            <li><a href="{{url('admin/attributes')}}">Tous les attributs</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fab fa-product-hunt"></i>
							<span class="nav-text">Produits</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('admin/products/create')}}">Ajouter</a></li>
                            <li><a href="{{url('admin/products')}}">Tous les produits</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-shopping-basket"></i>
							<span class="nav-text">Commandes</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="#">Ajouter</a></li>
                            <li><a href="#">Toutes les commandes</a></li>
                        </ul>
                    </li>



                </ul>
				<div class="plus-box">
					<div class="text-center">
						<h4 class="fs-18 font-w600 mb-4">Page d'Accueil</h4>
						<a href="javascript:void(0);" class="btn btn-primary btn-rounded">Accéder <i class="fas fa-caret-right"></i></a>
					</div>
				</div>

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="#" target="_blank">LICB+</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('dashboard/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('dashboard/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('dashboard/vendor/apexchart/apexchart.js')}}"></script>

	<script src="{{asset('dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('dashboard/vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('dashboard/js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{asset('dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/js/plugins-init/datatables.init.j')}}s"></script>
	<script src="{{asset('dashboard/vendor/owl-carousel/owl.carousel.js')}}"></script>
	<script src="{{asset('dashboard/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('dashboard/js/custom.min.js')}}"></script>
	<script src="{{asset('dashboard/js/dlabnav-init.js')}}"></script>
	<script src="{{asset('dashboard/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('dashboard/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('dashboard/vendor/pickadate/picker.date.js')}}"></script>
	<script src="{{asset('dashboard/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
	<script src="{{asset('dashboard/js/plugins-init/pickadate-init.js')}}"></script>
	<script src="{{asset('dashboard/vendor/ckeditor/ckeditor.js')}}"></script>
	 <!-- All init script -->
	
    <script src="{{ asset('dashboard/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins-init/select2-init.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('dashboard/js/plugins-init/toastr-init.js') }}"></script>
	<script src="{{asset('dashboard/vendor/summernote/js/summernote.min.js')}}"></script>
    <!-- Summernote init -->
    <script src="{{asset('dashboard/js/plugins-init/summernote-init.js')}}"></script>
    <script src="{{asset('plugins/image-master/image-uploader.min.js')}}"></script>
	
	<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


	

	<script>
		function cardsCenter()
		{

			/*  testimonial one function by = owl.carousel.js */



			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: false,
				navText: ['', ''],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},
					800:{
						items:2
					},
					991:{
						items:2
					},
					1200:{
						items:3
					},
					1600:{
						items:4
					}
				}
			})
		}

		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000);
		});


	</script>




<script>
    $(document).ready(function() {
    $("textarea").css("color", "#202020");
	});
 </script>


<script>
	$('.input-photoPrincipale').imageUploader({
		imagesInputName: "photoPrincipale",
	});
	
	$('.input-photos').imageUploader({
		imagesInputName: "photos",
	});

	
</script>

@stack('add-attribute-scripts')
@stack('add-image-scripts')
@stack('add-multiple-image-scripts')
@stack('generate-attribute-scripts')
@stack('select-nice-scripts')
@stack('fixe-price-scripts')
@stack('search-product-scripts')
@stack('show-variation-scripts')
@stack('add-image-icone-scripts')
@stack('show-modal-scripts')
@stack('store-attribute-scripts')
@stack('show-modal-add-mark-scripts')
@stack('store-mark-scripts')

</body>
</html>
