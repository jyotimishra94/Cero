<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.8
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
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
                                    Edit Company Details
                                </h1>
                                <!--end::Title-->

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
                                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" role="tablist">
                                            <li class="nav-item mt-2" role="presentation">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" href="#kt_tab_pane_1" aria-selected="true" role="company">Add Company</a>
                                            </li>
                                            <li class="nav-item mt-2" role="presentation">
                                                
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5" <?php if(!empty($company->id)){ ?> data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" tabindex="-1" role="experience" <?php } ?>>Add Clients</a>
                                                <!-- <a id="addClientsTab" class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_2" aria-selected="false" tabindex="-1" role="experience" onclick="enableAddClientsTab()">Add Clients</a> -->
                                            </li>
                                            <li class="nav-item mt-2" role="presentation">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_3" aria-selected="false" tabindex="-1" role="products">Add Products</a>

                                            </li>
                                            <li class="nav-item mt-2" role="presentation">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab" href="#kt_tab_pane_4" aria-selected="false" tabindex="-1" role="services">Add Services</a>

                                            </li>


                                        </ul>
                                        <div class="panel panel-default">
                                            @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                            @endif
                                            @if (session('error'))
                                            <div class="alert alert-success">{{ session('error') }}</div>
                                            @endif
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
                                                <!--begin::Step 1-->
                                                <div class="current" data-kt-stepper-element="content">
                                                    <!--begin::Wrapper-->
                                                    <div class="w-100">
                                                      
                                                    @foreach ($company as $company)
                                                        <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ url('updateCompanies').'/'.$company->id}}">
                                                            @csrf
                                                           
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3">Company Name</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="company_name" placeholder="" value="{{$company->company_name}}">
                                                            </div>
                                                            @if ($errors->has('company_name'))
                                                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('company_name') }}</div>
                                                            @endif
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3">Team Size</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="team_size" placeholder="" value="{{$company->team_size}}">
                                                            </div>
                                                            @if ($errors->has('team_size'))
                                                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('team_size') }}</div>
                                                            @endif
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8 fv-plugins-icon-container">
                                                                <label class="required form-label mb-3">Logo</label>
                                                                <input type="file" class="form-control form-control-lg form-control-solid" name="logo" accept=".pdf, .doc, .docs, .png, .jpg, .jpeg" />
                                                            </div>

                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3">Official Website [URL]</label>
                                                                <input type="url" class="form-control form-control-lg form-control-solid" name="official_website" placeholder="" value="{{$company->official_website}}">
                                                            </div>
                                                            @if ($errors->has('official_website'))
                                                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('official_website') }}</div>
                                                            @endif
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3">Pan Number</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="pan_number" placeholder="" value="{{$company->pan_number}}">
                                                            </div>
                                                            @if ($errors->has('pan_number'))
                                                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('pan_number') }}</div>
                                                            @endif
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-8 fv-plugins-icon-container">
                                                                <label class="required form-label mb-3">Upload PAN</label>
                                                                <input type="file" class="form-control form-control-lg form-control-solid" name="pan_number_image" accept=".pdf, .doc, .docs, .png, .jpg, .jpeg" />
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="required form-label mb-3">GST Number</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="gst_number" placeholder="" value="{{$company->gst_number}}">
                                                            </div>
                                                            @if ($errors->has('gst_number'))
                                                            <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('gst_number') }}</div>
                                                            @endif
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="form-label mb-3">Total Experience </label>
                                                                <div class="input-group">
                                                                    <!-- Year Input -->
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="experience_in_year" placeholder="Years" value="{{$company->experience_in_year}}">

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

                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="form-label mb-3">Vertical specialization</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" name="specialization" placeholder="" value="{{$company->specialization}}">
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="form-label mb-3">Minimum Project Delivered [by budget]</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="min_project_amount" placeholder="Enter amount" value="{{$company->min_project_amount}}">
                                                                    <select class="form-select form-select-lg form-select-solid" name="min_project_currency">

                                                                        <option value="INR">INR</option>
                                                                        <option value="USD">USD</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <label class="form-label mb-3">Maximum Project Delivered [by budget]</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="max_project_amount" placeholder="Enter amount" value="{{$company->max_project_amount}}">
                                                                    <select class="form-select form-select-lg form-select-solid" name="max_project_currency">

                                                                        <option value="INR">INR</option>
                                                                        <option value="USD">USD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                            <!--end::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <!-- <button type="submit" name="submit" class="btn btn-success">Continue..</button> -->
                                                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Step 1-->
                                                </form>
                                            </div>
                                            
                                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                                @if(Session::has('success'))
                                                <div class="alert alert-success alert-full-width" id="success-alert">
                                                    {{Session::get('success')}}
                                                </div>
                                                @endif
                                                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('addclient.post') }}" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
                                                    @csrf
                                                    <!--begin::Step 2-->
                                                    <div data-kt-stepper-element="content" class="current">
                                                        <!--begin::Wrapper-->
                                                        <div class="w-100">
                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <div class="container mt-4">
                                                                    <button type="button" class="btn btn-primary mt-2 add-client-detail">Add Another Clients</button>
                                                                    <div class="accordion" id="accordionClientDetails">
                                                                        <div class="card">
                                                                            <div class="card-header" id="headingOne">
                                                                                <h2 class="mb-0">
                                                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                        <i class="bi bi-chevron-down"></i> <!-- Accordion Icon -->
                                                                                        <h2> Add Client Details </h2>
                                                                                    </button>
                                                                                </h2>
                                                                            </div>
                                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionClientDetails">
                                                                                <div class="card-body ">
                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Client Name</label>
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="client_name" placeholder="" value="">
                                                                                    </div>
                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Project Title</label>
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="project_title" placeholder="" value="">
                                                                                    </div>
                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Description [Min:10, Max:400]</label>
                                                                                        <textarea class="form-control form-control-lg form-control-solid" name="description" rows="4" placeholder=""></textarea>
                                                                                    </div>

                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Highlights</label>
                                                                                        <input type="text" class="form-control form-control-lg form-control-solid" name="highlights" placeholder="" value="">
                                                                                    </div>
                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3"> Project Size [Financially]</label>
                                                                                        <div class="input-group">`
                                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="project_size" placeholder="Enter amount" value="">
                                                                                            <select class="form-select form-select-lg form-select-solid" name="project_size_currency">

                                                                                                <option value="INR">INR</option>
                                                                                                <option value="USD">USD</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Project Duration</label>
                                                                                        <div class="input-group">
                                                                                            <!-- Year Input -->
                                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="project_duration_in_year" placeholder="Years" value="">

                                                                                            <!-- Month Dropdown -->
                                                                                            <select class="form-select form-select-lg form-select-solid" name="project_duration_in_month">
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
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                <button type="Submit" class="btn btn-success">Continue..</button>
                                                            </div>

                                                            <!--end::Input group-->
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Step 2-->

                                                    </div>
                                                </form>

                                            </div>
                                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
                                                    {{ csrf_field() }}
                                                    <!--begin::Step 2-->
                                                    <h1>Products</h1>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                                                <form class="mx-auto w-100 mw-600px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_create_campaign_stepper_form">
                                                    {{ csrf_field() }}
                                                    <!--begin::Step 2-->
                                                    <h1>Services</h1>
                                                </form>

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

    <script>
        $(document).ready(function() {
            var clientId = 1;
            $(".add-client-detail").click(function() {
                clientId++;
                var newClientDetail = `
                    <div class="card">
                        <div class="card-header" id="heading${clientId}">
                            <h2 class="mb-0">
                                
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${clientId}" aria-expanded="true" aria-controls="collapseOne">
                                  <i class="bi bi-chevron-down "></i> 
                                                                                        <h2> Client Details ${clientId} </h2>
                                                                                    </button>
                            </h2>
                        </div>
                        <div id="collapse${clientId}" class="collapse" aria-labelledby="heading${clientId}" data-parent="#accordionClientDetails">
                            <div class="card-body">
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                    <label class="form-label mb-3">Company Name</label>
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="minMaxProjects" placeholder="" value="">
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                    <label class="form-label mb-3">Project Title</label>
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="minMaxProjects" placeholder="" value="">
                            </div>
                            <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                    <label class="form-label mb-3">Description [Min:10, Max:400]</label>
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="minMaxProjects" placeholder="" value="">
                                                                                </div>
                                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                    <label class="form-label mb-3">Highlights</label>
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="minMaxProjects" placeholder="" value="">
                                                                                </div>
                                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3"> Project Size (Financially)</label>
                                                                                        <div class="input-group">
                                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="projectSize" placeholder="Enter amount" value="">
                                                                                            <select class="form-select form-select-lg form-select-solid" name="projectSizeCurrency">

                                                                                                <option value="1">INR</option>
                                                                                                <option value="2">USD</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Project Duration</label>
                                                                                        <div class="input-group">
                                                                                            <!-- Year Input -->
                                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="projectDurationYears" placeholder="Years" value="">

                                                                                            <!-- Month Dropdown -->
                                                                                            <select class="form-select form-select-lg form-select-solid" name="projectDurationMonths">
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
                              
                                                                                <button type="button" class="btn btn-danger remove-client-detail">
                                                                                        <i class="fas fa-trash"></i> 
                                                                                    </button>
                            </div>
                        </div>
                    </div>
                `;
                $("#accordionClientDetails").append(newClientDetail);
            });

            // Remove a set of client details fields
            $(document).on("click", ".remove-client-detail", function() {
                $(this).closest(".card").remove();
            });
        });
        
        /* Alert message */
        function hideSuccessAlert() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500);
                }, 2000);
            }
        }
        hideSuccessAlert();
        /* END */
    </script>

</body>
<!--end::Body-->

</html>