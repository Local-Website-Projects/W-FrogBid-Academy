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

if (isset($_POST['update_data'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $s_name = $db_handle->checkValue($_POST['s_name']);
    $p_name = $db_handle->checkValue($_POST['p_name']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $s_phone = $db_handle->checkValue($_POST['s_phone']);
    $age = $db_handle->checkValue($_POST['age']);
    $class = $db_handle->checkValue($_POST['class']);
    $institution = $db_handle->checkValue($_POST['institution']);
    $address = $db_handle->checkValue($_POST['address']);
    $interest = $db_handle->checkValue($_POST['interest']);

    $update_query = $db_handle->insertQuery("UPDATE `contest_data` SET `student_name`='$s_name',`parents_name`='$p_name',`phone`='$phone',`secondary_phone`='$s_phone',`class`='$class',`age`='$age',`institution`='$institution',`address`='$address',`updated_at`='$inserted_at',`interest` = '$interest' WHERE `id` = '$id'");
    if ($update_query) {
        echo "
        <script>
        alert('স্টুডেন্ট ডাটা এডিট সফল হয়েছে।');
        window.location.href = 'Admit-Student-List'
</script>
        ";
    } else {
        echo "
        <script>
        alert('দুঃখিত! কোনো সমস্যা হয়েছে।');
        window.location.href = 'Admit-Student-List'
</script>
        ";
    }
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
                            <h4 class="mb-sm-0 font-size-18">অংশগ্রহণকারী ছাত্র / ছাত্রীর তথ্য</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
                                    <li class="breadcrumb-item active">অংশগ্রহণকারী ছাত্র / ছাত্রীর তথ্য</li>
                                </ol>
                            </div>


                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['edit'])) {
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
                                                    <input type="hidden" name="id"
                                                           value="<?php echo $edit_student[0]['id']; ?>">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">ছাত্র/ছাত্রীর নামঃ / Student's
                                                                Name: *</label>
                                                            <input type="text" name="s_name" class="form-control"
                                                                   placeholder="ছাত্র/ছাত্রীর নাম"
                                                                   value="<?php echo $edit_student[0]['student_name']; ?>"
                                                                   required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">অভিভাবকের নামঃ / Parent's Name:
                                                                *</label>
                                                            <input type="text" name="p_name" class="form-control"
                                                                   placeholder="অভিভাবকের নাম"
                                                                   value="<?php echo $edit_student[0]['parents_name']; ?>"
                                                                   required>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">মোবাইল
                                                                    নাম্বারঃ /Phone: *</label>
                                                                <input type="text" name="phone" id="phone"
                                                                       class="form-control" placeholder="মোবাইল নাম্বার"
                                                                       value="<?php echo $edit_student[0]['phone']; ?>"
                                                                       required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">বিকল্প মোবাইল নাম্বারঃ /
                                                                    Alternative Phone Number:</label>
                                                                <input type="text" name="s_phone" id="s_phone"
                                                                       class="form-control"
                                                                       placeholder="বিকল্প মোবাইল নাম্বার"
                                                                       value="<?php echo $edit_student[0]['secondary_phone']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="formrow-email-input">বয়সঃ
                                                                    / Age: </label>
                                                                <input type="number" name="age" class="form-control"
                                                                       placeholder="বয়স"
                                                                       value="<?php echo $edit_student[0]['age']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">শ্রেণীঃ / Class: </label>
                                                                <input type="text" name="class" class="form-control"
                                                                       placeholder="শ্রেণী"
                                                                       value="<?php echo $edit_student[0]['class']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <h5 class="font-size-14 mb-3">আগ্রহের বিষয় /
                                                                    Interest</h5>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="interest" id="formRadios1"
                                                                           value="Art" <?php if ($edit_student[0]['interest'] == 'Art') echo 'checked'; ?>>
                                                                    <label class="form-check-label" for="formRadios1">
                                                                        আর্ট
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="interest" id="formRadios2"
                                                                           value="Coding" <?php if ($edit_student[0]['interest'] == 'Coding') echo 'checked'; ?>>
                                                                    <label class="form-check-label" for="formRadios2">
                                                                        কোডিং
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="interest" id="formRadios3"
                                                                           value="Graphic" <?php if ($edit_student[0]['interest'] == 'Graphic') echo 'checked'; ?>>
                                                                    <label class="form-check-label" for="formRadios3">
                                                                        গ্রাফিক্স
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="exampleDataList" class="form-label">শিক্ষা
                                                                    প্রতিষ্ঠানের নামঃ / School Name: </label>
                                                                <input class="form-control" list="datalistOptions"
                                                                       id="exampleDataList" name="institution"
                                                                       placeholder="Type to search..."
                                                                       value="<?php echo $edit_student[0]['institution']; ?>">
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
                                                                <input type="text" name="address" class="form-control"
                                                                       placeholder="ঠিকানা"
                                                                       value="<?php echo $edit_student[0]['address']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button type="submit" name="update_data"
                                                                class="btn btn-primary w-md">নিবন্ধন করুন
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
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <h5 class="font-size-14 mb-4">অংশগ্রহণকারী ছাত্র / ছাত্রীর তথ্য</h5>
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
                                                            <th>এডিট</th>
                                                            <th>জমা গ্রহন</th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>
                                                        <?php
                                                        $fetch_studets = $db_handle->runQuery("select * from contest_data where status=1 order by id desc;");
                                                        $no_fetch_studets = $db_handle->numRows("select * from contest_data where status=1 order by id desc;");
                                                        for ($i = 0; $i < $no_fetch_studets; $i++) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i + 1; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['student_name']; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['parents_name']; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['phone']; ?></td>
                                                                <td><?php echo $fetch_studets[$i]['institution']; ?></td>
                                                                <td>
                                                                    <a href="Admit-Student-List?edit=<?php echo $fetch_studets[$i]['id']; ?>"
                                                                       class="btn btn-outline-secondary btn-sm edit"
                                                                       title="Edit">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a></td>
                                                                <td><a href="<?php
                                                                    if ($fetch_studets[$i]['unique_id'] == null) {
                                                                        echo "Submit-Student?edit=" . $fetch_studets[$i]['id'];
                                                                    } else {
                                                                        echo "Print_Receipt?id=" . $fetch_studets[$i]['id'];
                                                                    }
                                                                    ?>"
                                                                       class="btn btn-outline-secondary btn-sm edit me-2"
                                                                       title="Edit">
                                                                        <i class="fas fa-print"></i>
                                                                    </a>

                                                                    <a href="<?php
                                                                    if ($fetch_studets[$i]['unique_id'] == null) {
                                                                        echo "Submit-Student?edit=" . $fetch_studets[$i]['id'];
                                                                    } else {
                                                                        echo "Send-SMS?id=" . $fetch_studets[$i]['id'];
                                                                    }
                                                                    ?>"
                                                                       class="btn btn-outline-secondary btn-sm edit"
                                                                       title="Send SMS">
                                                                        <i class="fas fa-sms"></i>
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
