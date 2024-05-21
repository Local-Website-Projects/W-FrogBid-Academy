<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$current_date = date("d M, Y");
$id = $_GET['id'];
$student = $db_handle->runQuery("select * from contest_data where id = '$id'");
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

    <style>
        p{
            font-size: 12px;
            font-weight: bold;
        }
    </style>

</head>

<body>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div class="container-fluid" id="divToPrint" style="height: 374px; background-color: #eee;">
    <div class="row p-3">
        <div class="col-4">
            <img style="height: 80px; width: auto" src="assets/fa.png">
        </div>
        <div class="col-2 my-auto">
            <h1></h1>
        </div>
        <div class="col-6 my-auto">
            <div class="row">
                <div class="col-4"><p>Date</p></div>
                <div class="col-8"><p>: <?php echo $current_date;?></p></div>
            </div>
            <div class="row">
                <div class="col-4"><p>Participant ID</p></div>
                <div class="col-8"><p>: <?php echo $student[0]['unique_id'];?></p></div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Name</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['student_name'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Contact No</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['phone'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Age</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['age'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Class</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['class'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Parent's Name</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['parents_name'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Address</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['address'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Group</p>
                </div>
                <div class="col-8">
                    <p>: <?php echo $student[0]['contest_group'];?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>Participation Fee</p>
                </div>
                <div class="col-8">
                    <p>: <b>100 BDT</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 flex align-items-end justify-content-end">
        <div class="col-4">
            <p>Signature</p>
        </div>
    </div>

</div>
<!-- END layout-wrapper -->

<div class="container-fluid mt-5 text-end" id="printBtn">
    <button type="button" class="btn btn-primary pe-5 ps-5 me-2" onclick="printDiv();"><i class="fas fa-print"></i> Print</button>
    <a href="Send-SMS?id=<?php echo $student[0]['id'];?>" class="btn btn-secondary ps-5 pe-5"><i class="fas fa-sms"></i> Send SMS</a>
</div>

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

    function printDiv() {
        let printContents = document.getElementById("divToPrint").innerHTML;
        let originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;

        // Hide the button after it's clicked
        document.getElementById('printBtn').style.display = 'none';
    }

</script>

</body>

</html>
