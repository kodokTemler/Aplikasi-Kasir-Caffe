<?php
include '../controller/conn.php';

session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login'] != "admin"){
        header("Location: login.php");
    }
}else{
    header("Location: login.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - Admin</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <?php 
    include 'pages/header.php';
    ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php 
    include 'pages/sidebar.php';
    ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">

            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <a href="admin.php">
                            <div class="card-body">
                                <h5 class="card-title">Admin <span>| Karyawan</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                      $q = "SELECT COUNT(*) AS total FROM tb_admin";
                      $resCount = mysqli_query($conn, $q);
                      $countData = mysqli_fetch_assoc($resCount);
                      $totalAdmins = $countData['total'];
                        ?>
                                        <h6><?= $totalAdmins?> Admin</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <a href="transaksi.php">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi <span>| Money</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                      $q2 = "SELECT COUNT(*) AS total FROM tb_transaksi";
                      $resCount2 = mysqli_query($conn, $q2);
                      $countData2 = mysqli_fetch_assoc($resCount2);
                      $totalTransaksi = $countData2['total'];
                        ?>
                                        <h6><?= $totalTransaksi?> Transaksi</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <a href="produk.php">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Menu <span>| Menu</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-menu-up"></i>
                                    </div>
                                    <div class="ps-3">
                                        <?php
                     $q1 = "SELECT COUNT(*) AS total1 FROM tb_produk";
                     $resCount1= mysqli_query($conn, $q1);
                     $countData1 = mysqli_fetch_assoc($resCount1);
                     $totalAdmins1 = $countData1['total1'];
                     ?>
                                        <h6><?= $totalAdmins1;?> Menu</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Left side columns -->
                <!-- End Left side columns -->
            </div>

        </section>
    </main>
    <!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>