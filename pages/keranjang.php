 <!-- shopping cart start -->
 <div class="shopping-cart">
     <?php
        $total_harga = 0;

        while ($data = mysqli_fetch_assoc($responsKeranjang)) {

            $total_harga = $total_harga + $data['harga_produk'];

        ?>

         <div class="card-item">
             <img src="upload/menu/<?= $data["foto_produk"] ?>" alt="<?= $data["nama_produk"] ?>" />
             <div class="item-detail">
                 <h3><?= $data["nama_produk"] ?></h3>
                 <div class="item-price">IDR <?= $data["harga_produk"] ?></div>
             </div>
             <form action="controller/keranjang.php" method="post">
                 <input type="text" value="<?= $data["id_transaksi"] ?>" name="id_produk" hidden>

                 <input type="text" value="deleteData" name="aksi" hidden>

                 <button type="submit"> <i data-feather="trash-2" class="remove-item"></i></button>
             </form>

         </div>
     <?php
        }
        ?>
     <div style="display: <?= ($total_harga > 0) ? "none" : "block" ?>">
         <center>
             <h1>Tidak ada data</h1>
         </center>
     </div>

     <div class="" style="display: <?= ($total_harga == 0) ? "none" : "block" ?>">
         <h2>Total: Rp. <?= number_format($total_harga) ?></h2>
         <input type="number" value="<?= $total_harga ?>" id="total_harga" hidden>
         <div>
             <div class="meja">
                 <span class="tombol">1</span>
                 <span class="tombol">2</span>
                 <span class="tombol">3</span>
                 <span class="tombol">4</span>
                 <span class="tombol">5</span>
                 <span class="tombol">6</span>
                 <span class="tombol">7</span>
                 <span class="tombol">8</span>
                 <span class="tombol">9</span>

             </div>

             <input type="text" value="" id="inputan" name="meja">

             <input type="text" value="checkout" name="aksi" hidden>

             <button type="button" style="background-color: blue; padding: 10px;
                color:white" onclick="submit()">submit meja</button>

         </div>
     </div>

 </div>