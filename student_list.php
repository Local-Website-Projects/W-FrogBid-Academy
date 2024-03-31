<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
if(!isset($_SESSION['user'])){
   echo "
   <script>
   window.location.href = 'Login';
</script>
   ";
}

if(isset($_POST['update_data'])){
    $id= $db_handle->checkValue($_POST['id']);
    $s_name = $db_handle->checkValue($_POST['s_name']);
    $p_name = $db_handle->checkValue($_POST['p_name']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $s_phone = $db_handle->checkValue($_POST['s_phone']);
    $age = $db_handle->checkValue($_POST['age']);
    $class = $db_handle->checkValue($_POST['class']);
    $institution = $db_handle->checkValue($_POST['institution']);
    $address = $db_handle->checkValue($_POST['address']);

    $update_query = $db_handle->insertQuery("UPDATE `contest_data` SET `student_name`='$s_name',`parents_name`='$p_name',`phone`='$phone',`secondary_phone`='$s_phone',`class`='$class',`age`='$age',`institution`='$institution',`address`='$address',`updated_at`='$inserted_at' WHERE `id` = '$id'");
    if($update_query){
        echo "
        <script>
        alert('স্টুডেন্ট ডাটা এডিট সফল হয়েছে।');
        window.location.href = 'Student-List'
</script>
        ";
    } else {
        echo "
        <script>
        alert('দুঃখিত! কোনো সমস্যা হয়েছে।');
        window.location.href = 'Student-List'
</script>
        ";
    }
}


?>

<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>FrogBid Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="Home" class="logo logo-dark mt-3">
                        <img src="assets/fa-logo.png" style="height: 100px; width: auto;"/>
                    </a>

                    <a href="Home" class="logo logo-light">
                        <img src="assets/fa-logo.png" style="height: 100px; width: auto;"/>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                    </div>
                </form>
            </div>
            <!--<div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="icon-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        &lt;!&ndash; item&ndash;&gt;
                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                            <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                        </a>
                        &lt;!&ndash; item&ndash;&gt;
                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        &lt;!&ndash; item&ndash;&gt;
                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                            <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                        </a>

                        &lt;!&ndash; item&ndash;&gt;
                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                            <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        &lt;!&ndash; item&ndash;&gt;
                        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                            <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item" id="mode-setting-btn">
                        <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                        <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                    </button>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="grid" class="icon-lg"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/github.png" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="assets/images/brands/slack.png" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="icon-lg"></i>
                        <span class="badge bg-danger rounded-pill">5</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifications </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">James Lemire</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">It will seem like simplified English.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your order is placed</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 avatar-sm me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your item is shipped</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">If several languages coalesce the grammar</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Salena Layfield</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item right-bar-toggle me-2">
                        <i data-feather="settings" class="icon-lg"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium">Shawn L.</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        &lt;!&ndash; item&ndash;&gt;
                        <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock Screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                    </div>
                </div>

            </div>-->
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" data-key="t-menu">Menu</li>

                    <li>
                        <a href="Home">
                            <i data-feather="home"></i>
                            <span data-key="t-dashboard">ছাত্র ছাত্রী নিবন্ধন</span>
                        </a>
                    </li>
                    <li>
                        <a href="Student-List">
                            <i data-feather="list"></i>
                            <span data-key="t-dashboard">ছাত্র ছাত্রী তথ্য দেখুন</span>
                        </a>
                    </li>

                    <!--<li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="grid"></i>
                            <span data-key="t-apps">Apps</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li>
                                <a href="apps-calendar.html">
                                    <span data-key="t-calendar">Calendar</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-chat.html">
                                    <span data-key="t-chat">Chat</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <span data-key="t-email">Email</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="apps-email-inbox.html" data-key="t-inbox">Inbox</a></li>
                                    <li><a href="apps-email-read.html" data-key="t-read-email">Read Email</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <span data-key="t-invoices">Invoices</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="apps-invoices-list.html" data-key="t-invoice-list">Invoice List</a></li>
                                    <li><a href="apps-invoices-detail.html" data-key="t-invoice-detail">Invoice Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <span data-key="t-contacts">Contacts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="apps-contacts-grid.html" data-key="t-user-grid">User Grid</a></li>
                                    <li><a href="apps-contacts-list.html" data-key="t-user-list">User List</a></li>
                                    <li><a href="apps-contacts-profile.html" data-key="t-profile">Profile</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span data-key="t-authentication">Authentication</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="auth-login.html" data-key="t-login">Login</a></li>
                            <li><a href="auth-register.html" data-key="t-register">Register</a></li>
                            <li><a href="auth-recoverpw.html" data-key="t-recover-password">Recover Password</a></li>
                            <li><a href="auth-lock-screen.html" data-key="t-lock-screen">Lock Screen</a></li>
                            <li><a href="auth-logout.html" data-key="t-logout">Log Out</a></li>
                            <li><a href="auth-confirm-mail.html" data-key="t-confirm-mail">Confirm Mail</a></li>
                            <li><a href="auth-email-verification.html" data-key="t-email-verification">Email Verification</a></li>
                            <li><a href="auth-two-step-verification.html" data-key="t-two-step-verification">Two Step Verification</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="file-text"></i>
                            <span data-key="t-pages">Pages</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                            <li><a href="pages-maintenance.html" data-key="t-maintenance">Maintenance</a></li>
                            <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Coming Soon</a></li>
                            <li><a href="pages-timeline.html" data-key="t-timeline">Timeline</a></li>
                            <li><a href="pages-faqs.html" data-key="t-faqs">FAQs</a></li>
                            <li><a href="pages-pricing.html" data-key="t-pricing">Pricing</a></li>
                            <li><a href="pages-404.html" data-key="t-error-404">Error 404</a></li>
                            <li><a href="pages-500.html" data-key="t-error-500">Error 500</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="layouts-horizontal.html">
                            <i data-feather="layout"></i>
                            <span data-key="t-horizontal">Horizontal</span>
                        </a>
                    </li>

                    <li class="menu-title mt-2" data-key="t-components">Elements</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="briefcase"></i>
                            <span data-key="t-components">Components</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="ui-alerts.html" data-key="t-alerts">Alerts</a></li>
                            <li><a href="ui-buttons.html" data-key="t-buttons">Buttons</a></li>
                            <li><a href="ui-cards.html" data-key="t-cards">Cards</a></li>
                            <li><a href="ui-carousel.html" data-key="t-carousel">Carousel</a></li>
                            <li><a href="ui-dropdowns.html" data-key="t-dropdowns">Dropdowns</a></li>
                            <li><a href="ui-grid.html" data-key="t-grid">Grid</a></li>
                            <li><a href="ui-images.html" data-key="t-images">Images</a></li>
                            <li><a href="ui-modals.html" data-key="t-modals">Modals</a></li>
                            <li><a href="ui-offcanvas.html" data-key="t-offcanvas">Offcanvas</a></li>
                            <li><a href="ui-progressbars.html" data-key="t-progress-bars">Progress Bars</a></li>
                            <li><a href="ui-placeholders.html" data-key="t-progress-bars">Placeholders</a></li>
                            <li><a href="ui-tabs-accordions.html" data-key="t-tabs-accordions">Tabs & Accordions</a></li>
                            <li><a href="ui-typography.html" data-key="t-typography">Typography</a></li>
                            <li><a href="ui-video.html" data-key="t-video">Video</a></li>
                            <li><a href="ui-general.html" data-key="t-general">General</a></li>
                            <li><a href="ui-colors.html" data-key="t-colors">Colors</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="gift"></i>
                            <span data-key="t-ui-elements">Extended</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                            <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                            <li><a href="extended-sweet-alert.html" data-key="t-sweet-alert">SweetAlert 2</a></li>
                            <li><a href="extended-session-timeout.html" data-key="t-session-timeout">Session Timeout</a></li>
                            <li><a href="extended-rating.html" data-key="t-rating">Rating</a></li>
                            <li><a href="extended-notifications.html" data-key="t-notifications">Notifications</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i data-feather="box"></i>
                            <span class="badge rounded-pill bg-soft-danger text-danger float-end">7</span>
                            <span data-key="t-forms">Forms</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="form-elements.html" data-key="t-form-elements">Basic Elements</a></li>
                            <li><a href="form-validation.html" data-key="t-form-validation">Validation</a></li>
                            <li><a href="form-advanced.html" data-key="t-form-advanced">Advanced Plugins</a></li>
                            <li><a href="form-editors.html" data-key="t-form-editors">Editors</a></li>
                            <li><a href="form-uploads.html" data-key="t-form-upload">File Upload</a></li>
                            <li><a href="form-wizard.html" data-key="t-form-wizard">Wizard</a></li>
                            <li><a href="form-mask.html" data-key="t-form-mask">Mask</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="sliders"></i>
                            <span data-key="t-tables">Tables</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="tables-basic.html" data-key="t-basic-tables">Bootstrap Basic</a></li>
                            <li><a href="tables-datatable.html" data-key="t-data-tables">DataTables</a></li>
                            <li><a href="tables-responsive.html" data-key="t-responsive-table">Responsive</a></li>
                            <li><a href="tables-editable.html" data-key="t-editable-table">Editable</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="pie-chart"></i>
                            <span data-key="t-charts">Charts</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="charts-apex.html" data-key="t-apex-charts">Apexcharts</a></li>
                            <li><a href="charts-echart.html" data-key="t-e-charts">Echarts</a></li>
                            <li><a href="charts-chartjs.html" data-key="t-chartjs-charts">Chartjs</a></li>
                            <li><a href="charts-knob.html" data-key="t-knob-charts">Jquery Knob</a></li>
                            <li><a href="charts-sparkline.html" data-key="t-sparkline-charts">Sparkline</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="cpu"></i>
                            <span data-key="t-icons">Icons</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="icons-boxicons.html" data-key="t-boxicons">Boxicons</a></li>
                            <li><a href="icons-materialdesign.html" data-key="t-material-design">Material Design</a></li>
                            <li><a href="icons-dripicons.html" data-key="t-dripicons">Dripicons</a></li>
                            <li><a href="icons-fontawesome.html" data-key="t-font-awesome">Font Awesome 5</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="map"></i>
                            <span data-key="t-maps">Maps</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="maps-google.html" data-key="t-g-maps">Google</a></li>
                            <li><a href="maps-vector.html" data-key="t-v-maps">Vector</a></li>
                            <li><a href="maps-leaflet.html" data-key="t-l-maps">Leaflet</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="share-2"></i>
                            <span data-key="t-multi-level">Multi Level</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                    <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->

                </ul>


            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">ছাত্র ছাত্রীদের তথ্য</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
                                    <li class="breadcrumb-item active">ছাত্র ছাত্রীদের তথ্য</li>
                                </ol>
                            </div>


                        </div>
                    </div>
                </div>
                <?php
                if(isset($_GET['edit'])){
                    $edit_student = $db_handle->runQuery("select * from contest_data where id = {$_GET['edit']}");
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <h5 class="font-size-14 mb-4">ছাত্র ছাত্রীদের তথ্য</h5>
                                                <form action="#" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $edit_student[0]['id'];?>">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">ছাত্র/ছাত্রীর নামঃ / Student's Name: *</label>
                                                            <input type="text" name="s_name" class="form-control" placeholder="ছাত্র/ছাত্রীর নাম" value="<?php echo $edit_student[0]['student_name'];?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">অভিভাবকের নামঃ / Parent's Name: *</label>
                                                            <input type="text" name="p_name" class="form-control" placeholder="অভিভাবকের নাম" value="<?php echo $edit_student[0]['parents_name'];?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">মোবাইল নাম্বারঃ /Phone:  *</label>
                                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="মোবাইল নাম্বার" value="<?php echo $edit_student[0]['phone'];?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">বিকল্প মোবাইল নাম্বারঃ / Alternative Phone Number:</label>
                                                                <input type="text" name="s_phone" id="s_phone" class="form-control" placeholder="বিকল্প মোবাইল নাম্বার" value="<?php echo $edit_student[0]['secondary_phone'];?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">বয়সঃ / Age: </label>
                                                                <input type="number" name="age" class="form-control" placeholder="বয়স" value="<?php echo $edit_student[0]['age'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">শ্রেণীঃ / Class: </label>
                                                                <input type="text" name="class" class="form-control" placeholder="শ্রেণী" value="<?php echo $edit_student[0]['class'];?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="exampleDataList" class="form-label">শিক্ষা প্রতিষ্ঠানের নামঃ / School Name: </label>
                                                                <input class="form-control" list="datalistOptions" id="exampleDataList" name="institution" placeholder="Type to search..." value="<?php echo $edit_student[0]['institution'];?>">
                                                                <datalist id="datalistOptions">
                                                                    <option value="Saint Joseph's High School, Khulna">
                                                                    <option value="Khulna Zilla School">
                                                                    <option value="Lions School & College">
                                                                    <option value="Khulna Collegiate Girls' School & KCC Women's College">
                                                                    <option value="Khulna Government Model School & College">
                                                                    <option value="Government Coronation Secondary Girls' School">
                                                                    <option value="Rosedale International School and College">
                                                                    <option value="Sristy Central School and College, Khulna">
                                                                    <option value="Bangladesh Noubahini School & College">
                                                                    <option value="Islamabad Collegiate School">
                                                                    <option value="Khulna Government Girls' High School">
                                                                    <option value="Govt.Model High school">
                                                                    <option value="Khulna Power Station High School">
                                                                    <option value="GSS Ananda Niketan Model School">
                                                                    <option value="Khulna Collectorate Public School and College">
                                                                    <option value="Shaheed Sheikh Abu Naser Secondary School">
                                                                    <option value="Govt Laboratory High School, Khulna">
                                                                    <option value="UCEP Wazed Ali School">
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">ঠিকানাঃ / Address:</label>
                                                                <input type="text" name="address" class="form-control" placeholder="ঠিকানা" value="<?php echo $edit_student[0]['address'];?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="update_data" class="btn btn-primary w-md">নিবন্ধন করুন</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }else {
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <h5 class="font-size-14 mb-4">ছাত্র ছাত্রীদের তথ্য</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>ক্রমিক নং</th>
                                                            <th>নাম</th>
                                                            <th>অভিভাবকের নাম</th>
                                                            <th>ফোন নাম্বার</th>
                                                            <th>এডিট</th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        <?php
                                                        $fetch_studets = $db_handle->runQuery("select * from contest_data order by id desc");
                                                        $no_fetch_studets = $db_handle->numRows("select * from contest_data order by id desc");
                                                        for ($i=0; $i<$no_fetch_studets; $i++){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i+1;?></td>
                                                                <td><?php echo $fetch_studets[$i]['student_name'];?></td>
                                                                <td><?php echo $fetch_studets[$i]['parents_name'];?></td>
                                                                <td><?php echo $fetch_studets[$i]['phone'];?></td>
                                                                <td><a href="Student-List?edit=<?php echo $fetch_studets[$i]['id'];?>" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!-- end page title -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © FrogBid.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="#" class="text-decoration-underline">FrogBid</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

<script>
    document.getElementById("phone").addEventListener("input", function() {
        var inputValue = this.value.trim(); // Trim any leading or trailing spaces
        var regex = /^0[0-9]{10}$/; // Regex pattern to match number starting with 0 and having 11 digits in total

        if (regex.test(inputValue)) {
            // Valid input
            this.setCustomValidity(""); // Clear any existing validation message
        } else {
            // Invalid input
            this.setCustomValidity("মোবাইল নাম্বারটি সঠিক নয়। মোবাইল নাম্বারটি ০ দিয়ে শুরু হতে হবে এবং মোবাইল নাম্বারটি ১১ টি সংখ্যার হতে হবে।");
        }
    });
</script>

<script>
    document.getElementById("s_phone").addEventListener("input", function() {
        var inputValue = this.value.trim(); // Trim any leading or trailing spaces
        var regex = /^0[0-9]{10}$/; // Regex pattern to match number starting with 0 and having 11 digits in total

        if (inputValue === "" || regex.test(inputValue)) {
            // Valid input or empty input
            this.setCustomValidity(""); // Clear any existing validation message
        } else {
            // Invalid input
            this.setCustomValidity("বিকল্প মোবাইল নাম্বারটি সঠিক নয়। মোবাইল নাম্বারটি ০ দিয়ে শুরু হতে হবে এবং মোবাইল নাম্বারটি ১১ টি সংখ্যার হতে হবে।");
        }
    });
</script>

</body>

</html>
