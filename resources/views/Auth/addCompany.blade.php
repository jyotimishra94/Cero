<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>Cero</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        /* Custom Styles for Form */
        .custom-form {
            /* background-color: #f8f9fa; */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
            /* Box shadow added */

        }

        /* Style for Submit Button */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        /* Style for Heading */
        .form-heading {
            color: #000;
            /* Black color */
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Style for Company Name */
        .company-name {
            color: #000;
            /* Black color */
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="../../demo1/dist/index.html" class="d-lg-none">
                            <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">

                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="assets/media/avatars/300-1.jpg" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="assets/media/avatars/300-1.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
                                            <span class="menu-text">My Projects</span>
                                            <span class="menu-badge">
                                                <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title">My Subscription</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/billing.html" class="menu-link px-5">Billing</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">Payments</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                                                    <span class="ms-2" data-bs-toggle="tooltip" title="View your statements">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3">
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                        <span class="form-check-label text-muted fs-7">Notifications</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">My Statements</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title position-relative">Language
                                                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                                    <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
                                        </a>
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5 active">
                                                    <span class="symbol symbol-20px me-4">
                                                        <img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
                                                    </span>English</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">
                                                    <span class="symbol symbol-20px me-4">
                                                        <img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
                                                    </span>Spanish</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">
                                                    <span class="symbol symbol-20px me-4">
                                                        <img class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
                                                    </span>German</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">
                                                    <span class="symbol symbol-20px me-4">
                                                        <img class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
                                                    </span>Japanese</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/account/settings.html" class="menu-link d-flex px-5">
                                                    <span class="symbol symbol-20px me-4">
                                                        <img class="rounded-1" src="assets/media/flags/france.svg" alt="" />
                                                    </span>French</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{'logout'}}" class="menu-link px-5">Sign Out</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="../../demo1/dist/index.html">
                            <img alt="Logo" src="assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" />
                        </a>


                        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menummmenuuu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">

                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">

                        </div>

                    </div>
                    <!--end::sidebar menu-->
                    <!--begin::Footer-->
                    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
                        <a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
                            <span class="btn-label">Docs & Components</span>
                            <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Add Company Details
                                </h1>
                                <!--end::Title-->
                                @if(Session::has('success'))
                                <script>
                                    $(document).ready(function() {
                                        // Show success message using SweetAlert2
                                        var successMessage = "{{ Session::get('success') }}";

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: successMessage,
                                            showConfirmButton: false,
                                            timer: 5000 // Close the alert after 5 seconds
                                        });
                                    });
                                </script>
                                @endif

                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <div class="stepper stepper-links d-flex flex-column" id="kt_stepper_project" data-kt-stepper="true">
                                        @php
                                        $step = session('step') ?? 0;
                                        @endphp
                                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" role="tablist">
                                            <li class="nav-item mt-2" role="presentation">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $step == 0 ? 'active' : '' }}" data-bs-toggle="tab" href="#kt_tab_pane_1" aria-selected="true" role="company">Add Company</a>
                                            </li>
                                            <li class="nav-item mt-2" role="presentation">

                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $step == 1 ? 'active' : '' }}" <?php if (!empty($company->company_id)) { ?> data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" tabindex="-1" role="experience" <?php } ?>>Add Clients</a>
                                                <!-- <a id="addClientsTab" class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" tabindex="-1" role="experience" onclick="enableAddClientsTab()">Add Clients</a> -->
                                            </li>
                                            <li class="nav-item mt-2" role="presentation">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $step == 2 ? 'active' : '' }}" data-bs-toggle="tab" href="#kt_tab_pane_3" aria-selected="false" tabindex="-1" role="products">Add Services | Products</a>

                                            </li>



                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade  {{ $step == 0 ? 'active show' : 'hide' }}" id="kt_tab_pane_1" role="tabpanel">
                                                <!--begin::Step 1-->
                                                <div class="current" data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">


                                                        <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework custom-form" method="post" action="{{ route('companies.add') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">

                                                                <input type="hidden" class="form-control form-control-lg form-control-solid" name="company_id" placeholder="" value="{{ $company ? $company->company_id : '' }}">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Company Name</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="company_name" placeholder="" value="{{ $company ? $company->company_name : '' }}">
                                                                    @if ($errors->has('company_name'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('company_name') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Team Size</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="team_size" placeholder="" value="{{ $company ? $company->team_size : '' }}">
                                                                    @if ($errors->has('team_size'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('team_size') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row">
                                                                <div class="col-md-6 mb-8 fv-row fv-plugins-icon-container">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Logo</label>
                                                                    <input type="file" class="form-control form-control-lg form-control-solid" name="logo" accept=".pdf, .doc, .docs, .png, .jpg, .jpeg" />
                                                                    @if ($errors->has('logo'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('logo') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Official Website [URL]</label>
                                                                    <input type="url" class="form-control form-control-lg form-control-solid" name="official_website" placeholder="" value="{{ $company ? $company->official_website : '' }}">
                                                                    @if ($errors->has('official_website'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('official_website') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row">
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Pan Number</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="pan_number" placeholder="" value="{{ $company ? $company->pan_number : '' }}">
                                                                    @if ($errors->has('pan_number'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('pan_number') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 fv-row mb-8 fv-plugins-icon-container">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Upload PAN</label>
                                                                    <input type="file" class="form-control form-control-lg form-control-solid" name="pan_number_image" accept=".pdf, .doc, .docs, .png, .jpg, .jpeg" />
                                                                    @if ($errors->has('pan_number_image'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('pan_number_image') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">GST Number</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="gst_number" placeholder="" value="{{ $company ? $company->gst_number : '' }}">
                                                                    @if ($errors->has('gst_number'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('gst_number') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Total Experience</label>
                                                                    <div class="input-group">
                                                                        <!-- Year Input -->
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="experience_in_year" placeholder="Years" value="{{ $company ? $company->experience_in_year : '' }}">

                                                                        <!-- Month Dropdown -->
                                                                        <select class="form-select form-select-lg form-select-solid" name="experience_in_month">
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                            <option value="7">7</option>
                                                                            <option value="8">8</option>
                                                                            <option value="9">9</option>
                                                                            <option value="10">10</option>
                                                                            <option value="11">11</option>
                                                                        </select>
                                                                        <div class="text-center">
                                                                            <label class="form-label mb-3">Month(s)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row">
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Vertical specialization</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="specialization" placeholder="" value="{{ $company ? $company->specialization : '' }}">
                                                                </div>
                                                                <div class="col-md-6 mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Minimum Project Delivered [by budget]</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="min_project_amount" placeholder="Enter amount" value="{{ $company ? $company->min_project_amount : '' }}">
                                                                        <select class="form-select form-select-lg form-select-solid" name="min_project_currency">
                                                                            <option value="INR">INR</option>
                                                                            <option value="USD">USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Maximum Project Delivered [by budget]</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="max_project_amount" placeholder="Enter amount" value="{{ $company ? $company->max_project_amount : '' }}">
                                                                    <select class="form-select form-select-lg form-select-solid" name="max_project_currency">

                                                                        <option value="INR">INR</option>
                                                                        <option value="USD">USD</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!--end::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <!-- <button type="submit" name="submit" class="btn btn-success">Continue..</button> -->
                                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 1-->
                                                </form>
                                            </div>

                                            <div class="tab-pane fade {{ $step == 1 ? 'active show' : 'hide' }}" id="kt_tab_pane_2" role="tabpanel">

                                                <!--begin::Step 2-->
                                                <div data-kt-stepper-element="content" class="current">
                                                    <div class="container mt-3">
                                                        <button id="addClientButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewClients">Add New Client</button>
                                                        <table class="table table-bordered yajra-datatable">
                                                            <thead style="background-color:#009ef7;">
                                                                <tr>
                                                                    <th>S.N</th>
                                                                    <th>Client Name</th>
                                                                    <th>Project Title</th>
                                                                    <th>Description</th>
                                                                    <th>Highlights</th>
                                                                    <th>Project Size</th>
                                                                    <th>Project Duration</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="tab-pane fade {{ $step == 2 ? 'active show' : 'hide' }}" id="kt_tab_pane_3" role="tabpanel">


                                                <!-- Radio Button for Selecting Services or Products -->
                                                <div class="mb-10 fv-row">
                                                    <label class="required form-label mb-3">Would you like to add services or products?</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="service_or_product" value="services">
                                                        <label class="form-check-label" for="service">Services</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="service_or_product" value="products">
                                                        <label class="form-check-label" for="product">Products</label>
                                                    </div>
                                                </div>
                                                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('addServices') }}" enctype="multipart/form-data">
                                                    <!-- Fields for Services -->
                                                    @csrf
                                                    <div id="servicesFields" style="display: none;">

                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">

                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" name="company_id" placeholder="" value="{{ $company ? $company->company_id : '' }}">
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Services Categories</label>
                                                            <select class="form-control form-control-lg form-control-solid" name="parent_id" id="categoryDropdown">
                                                                <option value="">-----Select----</option>

                                                                @foreach ($categories as $category)
                                                                <option value="{{ $category->service_id; }}">{{ $category->service_desc}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Services Sub Categories</label>
                                                            <select class="form-control form-control-lg form-control-solid" name="sub_service_id" id="subCategoryDropdown">

                                                            </select>
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <div id="otherSubcategoryInputContainer" style="display: none;">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Other Subcategory</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="other_subcategory" id="otherSubcategoryInput">
                                                                @if ($errors->has('other_subcategory'))
                                                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('other_subcategory') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="mb-10 row">
                                                            <div class="col-md-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Services Name</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="service_desc" placeholder="" value="">
                                                                @if ($errors->has('service_desc'))
                                                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('service_desc') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Services Description</label>
                                                                <textarea class="form-control form-control-lg form-control-solid" name="serviceDesc" placeholder=""></textarea>
                                                                @if ($errors->has('serviceDesc'))
                                                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('serviceDesc') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="mb-10 row">
                                                            <div class="col-md-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Services Certifications</label>
                                                                <input type="file" class="form-control form-control-lg form-control-solid" name="service_certifications" accept=".pdf, .doc, .docx" />
                                                                @if ($errors->has('service_certifications'))
                                                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('service_certifications') }}</div>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Billing Type</label>
                                                                <select class="form-select form-select-lg form-select-solid" name="billing_type">
                                                                    <option value="hourly">Hourly</option>
                                                                    <option value="project based">Project Based</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <button type="Submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        <!-- Add other fields for Services here -->
                                                    </div>
                                                </form>


                                                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('addProducts') }}" enctype="multipart/form-data">
                                                    <!-- Fields for Products -->
                                                    @csrf
                                                    <div id="productsFields" style="display: none;">
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">

                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" name="company_id" placeholder="" value="{{ $company ? $company->company_id : '' }}">
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Product Categories</label>
                                                            <select class="form-control form-control-lg form-control-solid" name="parent_id" id="productCategoryDropdown">
                                                                <option value="">-----Select----</option>


                                                                @foreach ($productCategories as $productCategories)
                                                                <option value="{{ $productCategories->product_id; }}">{{ $productCategories->product_desc; }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Product Sub Categories</label>
                                                            <select class="form-control form-control-lg form-control-solid" name="sub_product_category_id" id="subProductCategoryDropdown">

                                                            </select>
                                                        </div>
                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <div id="otherSubProductcategoryInputContainer" style="display: none;">
                                                                <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Other Subcategory</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="other_productsubcategory" id="otherProductSubcategoryInput">
                                                                @if ($errors->has('other_productsubcategory'))
                                                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('other_productsubcategory') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Product Name</label>
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="product_desc" placeholder="" value="">
                                                                    @if ($errors->has('product_desc'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('product_desc') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Product Description</label>
                                                                    <textarea class="form-control form-control-lg form-control-solid" name="description" placeholder=""></textarea>
                                                                    @if ($errors->has('description'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('description') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="required form-label mb-3" style="font-weight: bold; font-size: 13px;">Product Certifications</label>
                                                                    <input type="file" class="form-control form-control-lg form-control-solid" name="certifications" accept=".pdf, .doc, .docx" />
                                                                    @if ($errors->has('certifications'))
                                                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('certifications') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Tentative Cost [per unit]</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="tentative_cost" placeholder="Enter amount" value="">
                                                                        @if ($errors->has('tentative_cost'))
                                                                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('tentative_cost') }}</div>
                                                                        @endif
                                                                        <select class="form-select form-select-lg form-select-solid" name="currency">
                                                                            <option value="INR">INR</option>
                                                                            <option value="USD">USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        <!-- Add other fields for Products here -->
                                                    </div>
                                                </form>


                                                <!-- ... rest of the form ... -->

                                            </div>

                                        </div>
                                        <!--begin::Nav-->
                                        <!--end::Nav-->
                                        <!--begin::Form-->
                                        <!--end::Form-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</body>
<!--end::Body-->


<!-- Modal -->


<!-- Modal for Edit Records -->
<div class="modal fade" tabindex="-1" id="kt_modal_1" class="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Client Details</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="" id="update-form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Client Name</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" id="client_name" name="client_name" placeholder="" value="">
                                @if ($errors->has('client_name'))
                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('client_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Project Title</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" id="project_title" name="project_title" placeholder="" value="">
                                @if ($errors->has('project_title'))
                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('project_title') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                        <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Description [Min:10, Max:400]</label>
                        <textarea class="form-control form-control-lg form-control-solid" id="description" name="description" rows="4" placeholder=""></textarea>
                        @if ($errors->has('description'))
                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('description') }}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Highlights</label>
                                <input type="text" class="form-control form-control-lg form-control-solid" id="highlights" name="highlights" placeholder="" value="">
                                @if ($errors->has('highlights'))
                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('highlights') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;"> Project Size [Financially]</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="project_size" name="project_size" placeholder="Enter amount" value="">
                                    @if ($errors->has('project_size'))
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('project_size') }}</div>
                                    @endif
                                    <select class="form-select form-select-lg form-select-solid" id="project_size_currency" name="project_size_currency">
                                        <option value="INR">INR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Project Duration</label>

                                <div class="input-group">
                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;"> Year[s]</label>
                                    <input type="text" class="form-control form-control-lg form-control-solid" id="project_duration_in_year" name="project_duration_in_year" placeholder="Years" value="">
                                    @if ($errors->has('project_duration_in_year'))
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('project_duration_in_year') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label class="form-label mb-3" style="visibility: hidden;">Placeholder for spacing</label>

                                <div class="input-group">
                                    <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;"> Month[s]</label>
                                    <select class="form-select form-select-lg form-select-solid" id="project_duration_in_month" name="project_duration_in_month">
                                        <option value="0">0 </option>
                                        <option value="1">1 </option>
                                        <option value="2">2 </option>
                                        <option value="3">3 </option>
                                        <option value="4">4 </option>
                                        <option value="5">5 </option>
                                        <option value="6">6 </option>
                                        <option value="7">7 </option>
                                        <option value="8">8 </option>
                                        <option value="9">9 </option>
                                        <option value="10">10 </option>
                                        <option value="11">11 </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="update-button" data-id="" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- END -->


<!-- Modal For Add Records -->




<div class="modal fade" tabindex="-1" id="addNewClients">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Clients</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="experience-form" class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('addclient.post') }}">
                    @csrf
                    <input type="hidden" class="form-control form-control-lg form-control-solid" id="client_name" name="companyId" placeholder="" value="">
                    <div class="mb-10 d-flex justify-content-between">
                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Client Name</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" id="client_name" name="clientName" placeholder="" value="">
                            @if ($errors->has('clientName'))
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('clientName') }}</div>
                            @endif
                        </div>
                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Project Title</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" id="project_title" name="projectTitle" placeholder="" value="">
                            @if ($errors->has('projectTitle'))
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('projectTitle') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-10 d-flex justify-content-between">
                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Description [Min:10, Max:400]</label>
                            <textarea class="form-control form-control-lg form-control-solid" id="description" name="desc" rows="4" placeholder=""></textarea>
                            @if ($errors->has('desc'))
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('desc') }}</div>
                            @endif
                        </div>

                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Highlights</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" id="highlights" name="projectHighlights" placeholder="" value="">
                            @if ($errors->has('projectHighlights'))
                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('projectHighlights') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-10 d-flex justify-content-between">
                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Project Size [Financially]</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg form-control-solid" id="project_size" name="projectSize" placeholder="Enter amount" value="">
                                @if ($errors->has('projectSize'))
                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('projectSize') }}</div>
                                @endif
                                <select class="form-select form-select-lg form-select-solid" id="project_size_currency" name="projectSizeCurrency">
                                    <option value="INR">INR</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>

                        <div class="fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" style="width: 48%;">
                            <label class="form-label mb-3" style="font-weight: bold; font-size: 13px;">Project Duration</label>
                            <div class="input-group">
                                <!-- Year Input -->
                                <input type="text" class="form-control form-control-lg form-control-solid" name="projectDurationInYear" placeholder="Years" value="">
                                @if ($errors->has('projectDurationInYear'))
                                <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('projectDurationInYear') }}</div>
                                @endif
                                <!-- Month Dropdown -->
                                <select class="form-select form-select-lg form-select-solid" name="projectDurationInMonth">
                                    <option value="0">0 month</option>
                                    <option value="1">1 month</option>
                                    <option value="2">2 months</option>
                                    <option value="3">3 months</option>
                                    <option value="4">4 months</option>
                                    <option value="5">5 months</option>
                                    <option value="6">6 months</option>
                                    <option value="7">7 months</option>
                                    <option value="8">8 months</option>
                                    <option value="9">9 months</option>
                                    <option value="10">10 months</option>
                                    <option value="11">11 months</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="add-button" class="btn btn-primary">Add</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('getExp') }}",
            columns: [{
                    data: 'client_experience_id',
                    name: 'client_experience_id',

                },
                {
                    data: 'client_name',
                    name: 'client_name'
                },
                {
                    data: 'project_title',
                    name: 'project_title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'highlights',
                    name: 'highlights'
                },
                {
                    data: 'project_size',
                    name: 'project_size',
                    render: function(data, type, full, meta) {
                        return full.project_size + ' ' + full.project_size_currency;
                    }
                },
                {
                    data: null,
                    name: 'project_duration',
                    render: function(data, type, full, meta) {
                        return full.project_duration_in_year + ' year[s] ' + full.project_duration_in_month + ' month[s]';
                    }
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });
</script>
<script src="assets/js/custom.js"></script>

</html>