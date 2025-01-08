<section id="menu" class="menu">
    <h2><span>Menu </span>Kami</h2>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis fuga
        tempora accusantium laboriosam, nesciunt vitae.
    </p>

    <div class="row">
        <?php
        $q = "SELECT * FROM tb_produk";
        $res = mysqli_query($conn, $q);
        $count = 1;

        while($data = mysqli_fetch_assoc($res)){
          $id = $data['id_produk'];
          $nama_produk = $data['nama_produk'];
          $foto_produk = $data['foto_produk'];
          $harga_produk = $data['harga_produk'];

        ?>
        <form action="controller/keranjang.php" method="POST">
            <input type="text" value="<?= $id?>" name="id_produk" hidden>
            <input type="text" value="tambahKeranjang" name="aksi" hidden>


            <div class="menu-card">
                <img src="upload/menu/<?=$foto_produk?>" alt="<?= $nama_produk ?>" class="menu-card-img" width="100%"
                    height="auto" />
                <h3 class="menu-card-title">- <?= $nama_produk?>-</h3>
                <p class="menu-card-price">IDR <?=$harga_produk?></p>
                <div class="product-icons">


                    <button type="submit" style="background-color: black; color:white;"><i
                            data-feather="shopping-cart"></i></button>
                    <button class="item-detail-button" style="background-color: black; color:white;">
                        <i data-feather="eye">
                        </i></button>
        </form>
    </div>
    </div>
    <?php
        }
        ?>
    </div>
</section>