<?php
include '../controller/conn.php';
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
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item">Data Tables</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalTambah">
                                Tambah Data
                            </button>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Foto Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM tb_produk";
                                    $res = mysqli_query($conn, $q);
                                    $count = 1;
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        $id = $data['id_produk'];
                                        $nama_produk = $data['nama_produk'];
                                        $foto_produk = $data['foto_produk'];
                                        $deskripsi_produk = $data['deskripsi_produk'];
                                        $harga_produk = $data['harga_produk'];
                                    ?>
                                        <tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $nama_produk ?></td>
                                            <td>
                                                <img src="../upload/menu/<?= $foto_produk ?>" alt="<?= $nama_produk ?>"
                                                    style="width: 100px; height: auto" />
                                            </td>
                                            <td><?= $deskripsi_produk ?></td>
                                            <td><?= $harga_produk ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?= $id ?>">
                                                        Edit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalDelete<?= $id ?>">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal edit-->
                                        <div class="modal fade" id="exampleModalEdit<?= $id ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_produk" value="<?= $id; ?>" />
                                                        <div class="modal-body">
                                                            <div class="mb-3 row">
                                                                <label for="nama_produk"
                                                                    class="col-sm-3 col-form-label">Nama Produk</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nama_produk"
                                                                        name="nama_produk" value="<?= $nama_produk ?>"
                                                                        required />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="foto_produk"
                                                                    class="col-sm-3 col-form-label">Foto Produk</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" class="form-control mb-2"
                                                                        id="foto_produk" name="foto_produk"
                                                                        value="<?= $foto_produk ?>" />
                                                                    <img src="asset/img/menu/<?= $foto_produk ?>"
                                                                        alt="<?= $foto_produk ?>" class="img-fluid"
                                                                        style="max-width: 100px; height: auto" />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="deskripsi_produk"
                                                                    class="col-sm-3 col-form-label">Deskripsi</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="deskripsi_produk" id="deskripsi_produk"
                                                                        cols="30" rows="5" class="form-control"
                                                                        required><?= $deskripsi_produk ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="harga_produk"
                                                                    class="col-sm-3 col-form-label">Harga</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control"
                                                                        id="harga_produk" name="harga_produk" min="0"
                                                                        step="0.01" value="<?= $harga_produk ?>" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="editProduk">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Edit -->

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="exampleModalDelete<?= $id ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_produk" value="<?= $id; ?>" />
                                                            <p>Apakah anda yakin mau menghapus menu <?= $nama_produk ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger"
                                                                name="deleteProduk">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir Modal Delete -->
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Modal Tambah Data
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_produk"
                                                    name="nama_produk" required />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="foto_produk" class="col-sm-3 col-form-label">Foto Produk</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="foto_produk"
                                                    name="foto_produk" accept="image/*" required />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="deskripsi_produk"
                                                class="col-sm-3 col-form-label">Deskripsi</label>
                                            <div class="col-sm-9">
                                                <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30"
                                                    rows="5" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="harga_produk" class="col-sm-3 col-form-label">Harga</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="harga_produk"
                                                    name="harga_produk" min="0" step="0.01" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9 offset-sm-3 text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="tambahProduk">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir  -->
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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