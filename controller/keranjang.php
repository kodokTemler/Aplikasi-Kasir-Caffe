<?php
include "conn.php";
// print_r($_POST);

$url = "../index.php";

// Memeriksa apakah ada data yang diterima melalui POST
if(isset($_POST)){
    // Memeriksa apakah id_produk ada di dalam data POST
    $id_produk = isset($_POST["id_produk"]) ? $_POST["id_produk"] : null;

    // Memeriksa apakah aksi ada di dalam data POST
    if(isset($_POST["aksi"])){
        $aksi = $_POST["aksi"];

        if($aksi == "tambahKeranjang"){
            $sql = "INSERT INTO `tb_transaksi` (`id_transaksi`, `id_produk`, `meja`, `status`) VALUES (NULL, '$id_produk', NULL, 'belum bayar')";

            if(mysqli_query($conn, $sql)){
                echo "ok";
                header("Location: $url#menu");
                exit; // Pastikan untuk menghentikan eksekusi script setelah header redirection
            }else{
                echo "bad";
            }
        }

        if($aksi == "checkout"){
            // Proses checkout
            // echo "checkout";

            $meja = $_POST['meja'];
            $id_nota = uniqid();

            $sql = "UPDATE `tb_transaksi` SET `meja` = '$meja', `status` = 'sudah bayar', `id_nota` = '$id_nota' WHERE `tb_transaksi`.`status` = 'belum bayar';";

            if(mysqli_query($conn, $sql)) {
                echo "sukses";
                // header("Location: $url");
                // Pastikan untuk menghentikan eksekusi script setelah header redirection
            }else{
                echo "bad";
            }

            
        }

        if($aksi == "tambahData"){
            // Proses tambah data
        }

        if($aksi == "updateData"){
            // Proses update data
        }

        if($aksi == "deleteData"){
            // Proses delete data
            $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = $id_produk;";

            if(mysqli_query($conn, $sql)) {
                echo "ok";
                header("Location: $url");
                exit; // Pastikan untuk menghentikan eksekusi script setelah header redirection
            }else{
                echo "bad";
            }
        }
    } else {
        echo "No action specified.";
    }
} else {
    echo "No POST data received.";
}
?>