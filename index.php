<?php
include 'controller/conn.php';

$queryKeranjang = "SELECT * FROM view_keranjang WHERE status = 'belum bayar'";
$responsKeranjang = mysqli_query($conn, $queryKeranjang);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffe Star Id</title>
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- icons -->
    <script src="assets/node_modules/feather-icons/dist/feather.min.js"></script>
    <!-- Alpine JS -->
    <script src="assets/node_modules/alpinejs/dist/cdn.min.js"></script>

    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- app -->
    <script src="assets/src/app.js"></script>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-lylNggHs4-cqq6bK"></script>

</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Coffee<span>StarId</span>.</a>
        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search-btn"><i data-feather="search"></i></a>
            <a href="#" id="shopping-cart-btn"><i
                    data-feather="shopping-cart"></i><?= mysqli_num_rows($responsKeranjang) ?></a>
            <a href="#" id="hamberger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- search from start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here..." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- search from end -->

        <!-- shopping cart start -->
        <?php
        include 'pages/keranjang.php';
        ?>


        <!-- shopping cart end -->
    </nav>
    <!-- akhir navbar -->

    <!-- Hero Section Start -->
    <section id="home" class="hero">
        <main class="content">
            <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, rerum
                ex esse quidem in aspernatur.
            </p>
            <a href="#menu" class="cta">Pesan Sekarang</a>
        </main>
    </section>
    <!-- Hero Section end -->

    <!-- about section start -->
    <section id="about" class="about">
        <h2><span>Tentang </span>Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="assets/img/tentang-kami.jpg" alt="Tentang Kami" />
            </div>
            <div class="content">
                <h3>Kenapa Memilih Coffee Star Id ?</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente
                    architecto rerum molestiae adipisci maxime libero?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut
                    consequatur amet a laborum autem maxime eius excepturi molestiae
                    iusto iste.
                </p>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- menu section start -->
    <?php
    include 'pages/menu.php';
    ?>

    <!-- ---------------------------------- -->

    <!-- contact section start -->
    <section class="contact" id="contact">
        <h2><span>Kontak </span>Kami</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fuga
            tempora accusantium laboriosam, nesciunt vitae.
        </p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506.2705353796664!2d119.51190234554011!3d-5.136648113356687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefb4636e567a5%3A0xd262012d93cac617!2scoffe%20star!5e0!3m2!1sid!2sid!4v1721735483068!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="process_form.php" method="post">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" name="nama" placeholder="Nama" required />
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="tel" name="nomor_telepon" placeholder="Nomor Handphone" required />
                </div>

                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <!-- contact section end -->

    <!-- footer start -->
    <footer>
        <div class="sosials">
            <a href="https://www.instagram.com/coffee.starid?igsh=MTlraTAwMGM5YnNvMw==" target="_blank"><i
                    data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>
                Created by
                <a href="https://www.instagram.com/m.syahrurmdhan?igsh=MXRjN3BqNDVyODA1bA%3D%3D&utm_source=qr"
                    target="_blank">M.Syahru Ramadhan</a>
                ||
                <a href="https://www.instagram.com/janetmita_?igsh=MXc1b3pvb3hiMHpicA==" target="_blank">Janet Rante
                    Ta'dung</a>
                &copy; 2024
            </p>
        </div>
    </footer>

    <!-- footer end -->

    <!-- modal box item detail start -->
    <div class="modal" id="item-detail-modal">
        <div class="modal-container">
            <a href="#" class="close-icon">
                <i data-feather="x"></i>
            </a>
            <div class="modal-content">
                <img src="assets/img/menu/latte.jpg" alt="" />
                <div class="product-content">
                    <h3>Coffe Latte</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit
                        adipisci error saepe, consectetur ab autem ratione sed amet
                        suscipit voluptas.
                    </p>
                    <div class="product-price">IDR 10K</div>
                    <a href=""> <i data-feather="shopping-cart"></i>Add to cart </a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal box item detail end -->

    <!-- script -->
    <script>
        feather.replace();
    </script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>