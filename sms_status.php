<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
if (!isset($_SESSION['user'])) {
    echo "
   <script>
   window.location.href = 'Login';
</script>
   ";
}



?>

<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <title>FrogBid Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="FrogBid Academy" name="description"/>
    <meta content="FrogBid" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css"/>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

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
                        <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i>
                        </button>
                    </div>
                </form>
            </div>
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
                            <span data-key="t-dashboard">সকল ছাত্র / ছাত্রী</span>
                        </a>
                    </li>
                    <li>
                        <a href="Admit-Student-List">
                            <i data-feather="list"></i>
                            <span data-key="t-dashboard">অংশগ্রহণকারী ছাত্র / ছাত্রী</span>
                        </a>
                    </li>
                    <li>
                        <a href="SMS-Status">
                            <i data-feather="list"></i>
                            <span data-key="t-dashboard">SMS অবস্থা যাচাই</span>
                        </a>
                    </li>

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
                                                    <table id="datatable"
                                                           class="table table-bordered dt-responsive  nowrap w-100">
                                                        <thead>
                                                        <tr>
                                                            <th>ক্রমিক নং</th>
                                                            <th>নাম</th>
                                                            <th>অভিভাবকের নাম</th>
                                                            <th>ফোন নাম্বার</th>
                                                            <th>শিক্ষা প্রতিষ্ঠানের নাম</th>
                                                            <th>আগ্রহী</th>
                                                            <th> আগ্রহী নয় </th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        <?php
                                                        $fetch_studets = $db_handle->runQuery("select * from contest_data where status=0 order by id desc");
                                                        $no_fetch_studets = $db_handle->numRows("select * from contest_data where status=0 order by id desc");
                                                        for ($i = 0; $i < $no_fetch_studets; $i++) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['student_name']; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['parents_name']; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['phone']; ?></td>
                                                                <td><?php if($fetch_studets[$i]['participent_status'] == 0) {
                                                                    ?>
                                                                        <span class="badge bg-warning"> যোগাযোগ করা যায় নাই </span>
                                                                        <?php
                                                                    } if($fetch_studets[$i]['participent_status'] == 1) {
                                                                        ?>
                                                                        <span class="badge bg-success"> ইন্টারেস্টেড </span>
                                                                        <?php
                                                                    } if($fetch_studets[$i]['participent_status'] == 2) {
                                                                    ?>
                                                                        <span class="badge bg-danger"> ইন্টারেস্টেড নয় </span>
                                                                        <?php
                                                                    }

                                                                    ?></td>
                                                                <td>
                                                                    <a href="interested.php?id=<?php echo $fetch_studets[$i]['id']; ?>"
                                                                       class="btn btn-outline-secondary btn-sm edit"
                                                                       title="Interested">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a></td>
                                                                <td><a href="not_interested.php?id=<?php echo $fetch_studets[$i]['id']; ?>"
                                                                       class="btn btn-outline-secondary btn-sm edit"
                                                                       title="Not Interested">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </td>
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

                <!-- end page title -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © FrogBid.
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
    document.getElementById("phone").addEventListener("input", function () {
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
    document.getElementById("s_phone").addEventListener("input", function () {
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
