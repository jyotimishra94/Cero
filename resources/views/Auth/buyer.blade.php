<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
	<title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
	<meta charset="utf-8">
	<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel versions. Grab your copy now and get life-time updates for free.">
	<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony &amp; Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="article">
	<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme &amp; Template">
	<meta property="og:url" content="https://keenthemes.com/metronic">
	<meta property="og:site_name" content="Keenthemes | Metronic">
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8">
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">

	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css">

</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<style>
			body {
				background-image: url('assets/media/auth/bg10-dark.jpeg');
			}
		</style>
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<div class="d-flex flex-lg-row-fluid">
				<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
					<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency-dark.png" alt="">
				</div>
			</div>
			<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
				<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
					<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
						<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
							<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('registerBuyer') }}">
								@csrf
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Buyer Registration</h1>
								</div>
								<div id="step1">
									<div class="row">
										<div class="col-md-6 mb-8">
											<div class="fv-row fv-plugins-icon-container">
												<input type="text" placeholder="User Name" name="name" value="{{ old('name') }}" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('name'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('name') }}</div>
												@endif
											</div>
										</div>
										<div class="col-md-6 mb-8">
											<div class="fv-row fv-plugins-icon-container">
												<input type="text" placeholder="Email" value="{{ old('email') }}" name="email" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('email'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('email') }}</div>
												@endif
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 mb-8">
											<div class="fv-row fv-plugins-icon-container" data-kt-password-meter="true">
												<div class="mb-1">
													<div class="position-relative mb-3">
														<input class="form-control bg-transparent" type="password" value="{{ old('password') }}" placeholder="Password" name="password" autocomplete="off">
														<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
															<i class="ki-duotone ki-eye-slash fs-2"></i>
															<i class="ki-duotone ki-eye fs-2 d-none"></i>
														</span>
													</div>
													<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
														</div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
														</div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
														</div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
														</div>
													</div>
												</div>
												<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
												@if ($errors->has('password'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('password') }}</div>
												@endif
											</div>
										</div>
										<div class="col-md-6 mb-8">
											<div class="fv-row mb-8 fv-plugins-icon-container">
												<input placeholder="Repeat Password" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('password_confirmation'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
												@endif
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 mb-8">
											<div class="fv-row mb-8 fv-plugins-icon-container">
												<!--begin::phone-->
												<input type="text" placeholder="Mobile No." value="{{ old('phone') }}" name="phone" autocomplete="off" class="form-control bg-transparent">
												<!--end::phone-->
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('phone'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('phone') }}</div>
												@endif
											</div>
										</div>
										<div class="col-md-6 mb-8">
											<div class="fv-row mb-8 fv-plugins-icon-container">
												<input type="text" placeholder="Company" value="{{ old('company') }}" name="company" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('company'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('company') }}</div>
												@endif
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 mb-8">
											<div class="fv-row mb-8 fv-plugins-icon-container">
												<input type="text" placeholder="Industry" value="{{ old('industry') }}" name="industry" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('industry'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('industry') }}</div>
												@endif
											</div>
										</div>
										<div class="col-md-6 mb-8">
											<div class="fv-row mb-8 fv-plugins-icon-container">
												<input type="text" placeholder="Location" value="{{ old('location') }}" name="location" autocomplete="off" class="form-control bg-transparent">
												<div class="fv-plugins-message-container invalid-feedback"></div>
												@if ($errors->has('location'))
												<div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('location') }}</div>
												@endif
											</div>
										</div>
									</div>


									<div class="row">
										<div class="d-grid mb-10">
											<button type="submit" id="kt_sign_in_submit" class="btn btn-success">
												<span class="indicator-label">Register</span>
												<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
												</span>
											</button>
										</div>
									</div>
								</div>

								<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
									<a href="{{'/'}}" class="link-primary fw-semibold">Sign in</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var hostUrl = "assets/";
	</script>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/js/custom/authentication/sign-up/general.js"></script>
	<script>
		$("#kt_sign_up_step1").click(function() {
			$("#step1").hide();
			$("#step2").show();
		});
	</script>
	<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
		<defs id="SvgjsDefs1002"></defs>
		<polyline id="SvgjsPolyline1003" points="0,0"></polyline>
		<path id="SvgjsPath1004" d="M0 0 "></path>
	</svg>
</body>

</html>