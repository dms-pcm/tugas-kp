<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- <base href="../"> -->
		<title>LATIHAN KP 2 - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- PWA  -->
		<meta name="theme-color" content="#6777ef"/>
		<link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
		<link rel="manifest" href="{{ asset('/manifest.json') }}">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{asset('assets/plugins/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-gray">
		<div class="d-flex align-items-center" style="height:100vh;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-5">
						<img src="{{ asset('assets/img/login.png') }}" class="img-fluid"  />
					</div>
					<div class="col-md-2 text-center"></div>
					<div class="col-md-5 contents bg-white shadow mb-5 bg-body rounded" style="padding:2.5rem">
						<div class="form-block">
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST">
								@csrf
								<div class="text-left mb-10">
									<h1 class="text-dark mb-3">Selamat Datang</h1>
									<h3 class="text-muted fw-bold fs-4">Silahkan masuk untuk melanjutkan aktifitas</h3>
								</div>
								<div class="fv-row mb-7">
									<label class="form-label fs-6 fw-bolder text-dark">Username</label>
									<input class="form-control form-control-lg form-control-solid input-login" id="xa-username" type="text" placeholder="Masukkan Username" autocomplete="off" />
								</div>
								<div class="fv-row mb-7">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<input class="form-control form-control-lg form-control-solid input-login" type="password" id="xa-password" name="password"  placeholder="Masukkan Password"  autocomplete="off" />
								</div>
								<div class="text-center">
									<button type="button" id="btn-simpan" class="btn btn-lg btn-primary w-100 mb-5" onclick="login()">
										<span class="indicator-label">Masuk</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/plugins/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('assets/extends/configuration.js')}}"></script>
		<script src="{{asset('assets/extends/login.js')}}"></script>
		<script src="{{ asset('/sw.js') }}"></script>
		<script>
			if (!navigator.serviceWorker.controller) {
				navigator.serviceWorker.register("/sw.js").then(function (reg) {
					console.log("Service worker has been registered for scope: " + reg.scope);
				});
			}
		</script>
		<script>
			let baseUrl = "{{url('/')}}/";
			let urlApi = "{{url('/api')}}/";
			
			jQuery(document).ready(function () {
				$('.input-login').keyup(function(event){
					event.preventDefault();
					if (event.keyCode === 13) {
						login()
					}
				});
			});
		</script>
	</body>
</html>