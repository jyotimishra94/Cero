<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>CERO</title>
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
    <link href="{{'assets/css/sweetalert2.min.css'}}" rel="stylesheet" type="text/css">
    <link href="{{'assets/css/style.bundle.css'}}" rel="stylesheet" type="text/css">
    <style>
        /* Custom class for full-width alert */
        .alert-full-width {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
            border-radius: 10;
            background-color: #00A000;
            color: #FFFFFF;
        }
    </style>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
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



                            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('verifiedOtp') }}">
                                @csrf
                                <div class="text-center mb-11">
                                    <h1 class="text-dark fw-bolder mb-3">Verify Email</h1>
                                </div>

                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                    <input type="text" placeholder="OTP" name="otp" id="otp" autocomplete="off" class="form-control bg-transparent">
                                    @if($errors->has('otp'))
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('otp') }}</div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> <!-- Use the appropriate column size based on your layout -->
                                        <button type="submit" id="kt_sign_in_submit" class="btn btn-success">
                                            <span class="indicator-label">Verify Email</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="resend_otp_button" class="btn btn-success" onclick="resendOTP()">Resend OTP</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{'assets/js/sweetalert2.all.min.js'}}" type="text/javascript"></script>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/js/custom.js"></script>
</body>




</html>