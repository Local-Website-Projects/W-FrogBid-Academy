<?php
session_start();
if(!isset($_SESSION['report'])){
    $_SESSION['report'] = 0;
}
?>

<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>FrogBid Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="FrogBid Academy" name="description" />
    <meta content="FrogBid" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

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
                <div class="card-body">
                    <div class="row g-4">
                        <?php
                        if($_SESSION['report'] == 1){
                            ?>
                            <div class="col-sm-12">
                                <div class="alert alert-success alert-dismissible fade show px-4 mb-0 text-center" role="alert">
                                    <i class="mdi mdi-check-all d-block display-4 mt-2 mb-3 text-success"></i>
                                    <h5 class="text-success">ছাত্র/ছাত্রী রেজিষ্ট্রেশন সফল হয়েছে।</h5>
                                    <p>বই সংগ্রহের জন্য আমাদের প্রতিনিধিকে এই ম্যাসেজটি দেখান।</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div><!-- end col -->
                            <?php
                            $_SESSION['report'] = 0;
                        }
                        if($_SESSION['report'] == 2){
                            ?>
                            <div class="col-sm-12">
                                <div class="alert alert-danger alert-dismissible fade show px-4 mb-0 text-center" role="alert">
                                    <i class="mdi mdi-block-helper d-block display-4 mt-2 mb-3 text-danger"></i>
                                    <h5 class="text-danger">দুঃখিত। রেজিষ্ট্রেশন সফল হয় নি।</h5>
                                    <p>পুনরায় চেষ্টা করুন।</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div><!-- end col -->
                            <?php
                            $_SESSION['report'] = 0;
                        }
                        if($_SESSION['report'] == 3){
                            ?>
                            <div class="col-sm-12">
                                <div class="alert alert-warning alert-dismissible fade show px-4 mb-0 text-center" role="alert">
                                    <i class="mdi mdi-block-helper d-block display-4 mt-2 mb-3 text-warning"></i>
                                    <h5 class="text-danger">এই মোবাইল নাম্বারটি দ্বারা পূর্বে রেজিষ্ট্রেশন করা হয়েছে।</h5>
                                    <p>নতুন ফোন নাম্বার দিয়ে চেষ্টা করুন।</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div><!-- end col -->
                            <?php
                            $_SESSION['report'] = 0;
                        }
                        ?>


                    </div><!-- end row -->
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <h5 class="font-size-14 mb-4">ছাত্র ছাত্রীদের তথ্য</h5>
                                            <form action="insert.php" method="post">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">ছাত্র/ছাত্রীর নামঃ / Student's Name: *</label>
                                                        <input type="text" name="s_name" class="form-control" placeholder="ছাত্র/ছাত্রীর নাম" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">অভিভাবকের নামঃ / Parent's Name: *</label>
                                                        <input type="text" name="p_name" class="form-control" placeholder="অভিভাবকের নাম" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-email-input">মোবাইল নাম্বারঃ /Phone:  *</label>
                                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="মোবাইল নাম্বার" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">বিকল্প মোবাইল নাম্বারঃ / Alternative Phone Number:</label>
                                                            <input type="text" name="s_phone" id="s_phone" class="form-control" placeholder="বিকল্প মোবাইল নাম্বার">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-email-input">বয়সঃ / Age: </label>
                                                            <input type="number" name="age" class="form-control" placeholder="বয়স">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">শ্রেণীঃ / Class: </label>
                                                            <input type="text" name="class" class="form-control" placeholder="শ্রেণী">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <h5 class="font-size-14 mb-3">আগ্রহের বিষয় / Interest</h5>
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="interest" id="formRadios1" value="Art">
                                                                <label class="form-check-label" for="formRadios1">
                                                                    আর্ট
                                                                </label>
                                                            </div>
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="interest" id="formRadios2" value="Coding">
                                                                <label class="form-check-label" for="formRadios2">
                                                                    কোডিং
                                                                </label>
                                                            </div>
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="interest" id="formRadios3" value="Graphic">
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
                                                            <label for="exampleDataList" class="form-label">শিক্ষা প্রতিষ্ঠানের নামঃ / School Name: </label>
                                                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="institution" placeholder="Type to search...">
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
                                                            <input type="text" name="address" class="form-control" placeholder="ঠিকানা">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <button type="submit" name="register" class="btn btn-primary w-md">নিবন্ধন করুন</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="assets/js/pages/sweetalert.init.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

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
