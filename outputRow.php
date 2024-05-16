<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$time = date("Ymd-His");
if (isset($_POST['submit'])) {
    $query = $db_handle->checkValue($_POST['query']);
    $fetch_students = $db_handle->runQuery($query);
    $no_fetch_students = $db_handle->numRows($query);

    $tableValues = [];
    $columns = [];

    if (!empty($fetch_students)) {
        $columns = array_keys($fetch_students[0]);
    }

    foreach ($fetch_students as $row) {
        $tableValues[] = array_values($row);
    }

    array_unshift($tableValues, $columns);


    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=table_values_" . $time . ".xls");

    echo "<html xmlns:x=\"urn:schemas-microsoft-com:office:excel\">";
    echo "<head>";
    echo "<meta http-equiv=\"content-type\" content=\"application/vnd.ms-excel; charset=UTF-8\">";
    echo "<!--[if gte mso 9]><xml>";
    echo "<x:ExcelWorkbook>";
    echo "<x:ExcelWorksheets>";
    echo "<x:ExcelWorksheet>";
    echo "<x:Name>Sheet1</x:Name>";
    echo "<x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions>";
    echo "</x:ExcelWorksheet>";
    echo "</x:ExcelWorksheets>";
    echo "</x:ExcelWorkbook>";
    echo "</xml>";
    echo "<![endif]-->";
    echo "</head>";
    echo "<body>";

    echo "<table>";

    foreach ($tableValues as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . $cell . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    echo "</body></html>";

    echo "<script>
                 window.location.href = 'outputRow.php';
           </script>";
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
                            <h4 class="mb-sm-0 font-size-18">Download Data</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
                                    <li class="breadcrumb-item active">Download Data</li>
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
                                            <h5 class="font-size-14 mb-4">Download Data Query</h5>
                                            <form action="#" method="post">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Column Name </label>
                                                        <?php
                                                        $query = "SELECT * FROM contest_data";
                                                        $fetch_students = $db_handle->runQuery($query);

                                                        $columns = [];

                                                        if (!empty($fetch_students)) {
                                                            $columns = array_keys($fetch_students[0]);
                                                        }

                                                        echo implode(", ", $columns);
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Query *</label>
                                                        <input type="text" name="query" class="form-control"
                                                               placeholder="query"
                                                               value="" required>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit" name="submit"
                                                            class="btn btn-primary w-md">Download
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
