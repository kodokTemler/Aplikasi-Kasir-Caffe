<?php
    $conn = mysqli_connect("localhost","root","","coffe_db");


    //   Admin
    // Tambah Data
    if (isset($_POST['tambahAdmin'])) {
        $username = $_POST['username'];
        $password = $_POST['password']; 

        $q_insert = "INSERT INTO tb_admin ( `username`, `password`) VALUES ('$username', '$password')";
    
        $InsertResult = mysqli_query($conn, $q_insert);
        if ($InsertResult) {
            header("Location: admin.php");
        } else {
            header("Location: admin.php");
        }
    }

    // edit data
    if (isset($_POST['deleteAdmin'])) {
        $id_admin = $_POST['id_admin'];
    
        // Membuat query delete
        $sql_delete = "DELETE FROM tb_admin WHERE id_admin = ?";
    
        // Menyiapkan statement
        if ($stmt = $conn->prepare($sql_delete)) {
            // Mengikat parameter
            $stmt->bind_param("i", $id_admin);
    
            // Menjalankan query
            if ($stmt->execute()) {
                // Redirect ke halaman dashboard jika berhasil
                header("Location: admin.php");
            } else {
                // Redirect ke halaman dashboard jika gagal
                echo "Error executing query: " . $stmt->error;
            }
    
            // Menutup statement
            $stmt->close();
        } else {
            // Menangani kesalahan dalam menyiapkan statement
            echo "Error preparing statement: " . $conn->error;
        }
    }
    
    // edit admin
    if (isset($_POST['editAdmin'])) {
        $id_admin = $_POST['id_admin'];
        $new_username = $_POST['username'];
        $new_password = $_POST['password'];
    
        // Membuat query update
        $sql_update = "UPDATE tb_admin SET username = ?, password = ? WHERE id_admin = ?";
    
        // Menyiapkan statement
        if ($stmt = $conn->prepare($sql_update)) {
            // Mengikat parameter
            $stmt->bind_param("ssi", $new_username, $new_password, $id_admin);
    
            // Menjalankan query
            if ($stmt->execute()) {
                // Redirect ke halaman dashboard jika berhasil
                header("Location: admin.php");
                exit(); // Pastikan script berhenti setelah redirect
            } else {
                // Menampilkan pesan error jika query gagal
                echo "Error executing query: " . $stmt->error;
            }
    
            // Menutup statement
            $stmt->close();
        } else {
            // Menampilkan pesan error jika statement gagal disiapkan
            echo "Error preparing statement: " . $conn->error;
        }
    }


    // produk
    // tambah produk
    if (isset($_POST['tambahProduk'])) {
        $nama_produk = $_POST['nama_produk'];
        $deskripsi_produk = $_POST['deskripsi_produk'];
        $harga_produk = $_POST['harga_produk'];
    
        // Handle file upload
        $target_dir = "../upload/menu/";
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["foto_produk"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Check if the target directory exists, if not create it
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
    
            if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                $foto_produk = basename($_FILES["foto_produk"]["name"]);
    
                // Insert data into the database
                $sql = "INSERT INTO tb_produk (nama_produk, foto_produk, deskripsi_produk, harga_produk)
                        VALUES ('$nama_produk', '$foto_produk', '$deskripsi_produk', '$harga_produk')";
    
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // hapus produk
    if (isset($_POST['deleteProduk'])) {
        $id = $_POST['id_produk'];

    // Membuat query delete
    $sql1_delete = "DELETE FROM tb_produk WHERE id_produk = ?";

    // Menyiapkan statement
    if ($stmt = $conn->prepare($sql1_delete)) {
        // Mengikat parameter
        $stmt->bind_param("i", $id);

        // Menjalankan query
        if ($stmt->execute()) {
            // Redirect ke halaman dashboard jika berhasil
            header("Location: index.php");
            exit;
        } else {
            // Menangani kesalahan dalam mengeksekusi query
            echo "Error executing query: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        // Menangani kesalahan dalam menyiapkan statement
        echo "Error preparing statement: " . $conn->error;
    }
}
    
    // edit produk
    if (isset($_POST['editProduk'])) {
        // Check if all required POST parameters are set
        if (isset($_POST['id_produk']) && isset($_POST['nama_produk']) && isset($_POST['deskripsi_produk']) && isset($_POST['harga_produk'])) {
            $id = $_POST['id_produk'];
            $nama_produk = $_POST['nama_produk'];
            $deskripsi_produk = $_POST['deskripsi_produk'];
            $harga_produk = $_POST['harga_produk'];
    
            // Default to current file if no new file is uploaded
            $foto_produk = isset($_POST['current_foto_produk']) ? $_POST['current_foto_produk'] : '';
    
            // Handle file upload if a new file is uploaded
            if (!empty($_FILES["foto_produk"]["name"])) {
                $target_dir = "../upload/menu/";
    
                // Ensure the directory exists
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true); // Create directory if it does not exist
                }
    
                $file_name = basename($_FILES["foto_produk"]["name"]);
                $target_file = $target_dir . $file_name;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
    
                // Check if file already exists and create unique file name
                if (file_exists($target_file)) {
                    $file_name = pathinfo($file_name, PATHINFO_FILENAME) . '_' . time() . '.' . $imageFileType;
                    $target_file = $target_dir . $file_name;
                }
    
                // Check file size
                if ($_FILES["foto_produk"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
    
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
    
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                        $foto_produk = $file_name;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
    
            // Prepare the UPDATE query
            $sql = "UPDATE tb_produk
                    SET nama_produk = ?, foto_produk = ?, deskripsi_produk = ?, harga_produk = ?
                    WHERE id_produk = ?";
            $stmt = $conn->prepare($sql);
    
            if ($stmt) {
                $stmt->bind_param("ssssi", $nama_produk, $foto_produk, $deskripsi_produk, $harga_produk, $id);
    
                // Execute the query
                if ($stmt->execute()) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $stmt->error;
                }
    
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
        } else {
            echo "Required POST parameters are missing.";
        }
    } 
    // else {
    //     echo "
    //     <script>
    //         console.log('Form not submitted');
    //     </script>
    //     ";
    // }


    // Transaksi
    // Delete Transaksi
    if (isset($_POST['deleteTransaksi'])) {
        $id_transaksi = $_POST['id_transaksi'];

    // Membuat query delete
    $deleteTransaksi = "DELETE FROM tb_transaksi WHERE id_transaksi = ?";

    // Menyiapkan statement
    if ($stmt = $conn->prepare($deleteTransaksi)) {
        // Mengikat parameter
        $stmt->bind_param("i", $id_transaksi);

        // Menjalankan query
        if ($stmt->execute()) {
            // Redirect ke halaman dashboard jika berhasil
            header("Location: index.php");
            exit;
        } else {
            // Menangani kesalahan dalam mengeksekusi query
            echo "Error executing query: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        // Menangani kesalahan dalam menyiapkan statement
        echo "Error preparing statement: " . $conn->error;
    }
}

// edit transaksi

    
?>