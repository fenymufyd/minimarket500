<div class="section">
<marquee><h5>Selamat Datang <?= (isset($_SESSION['userName']) ? $_SESSION['userName'] : "pengunjung");?>, Di Minimarket 500</h5></marquee>
</div>
</div>

<?php if ($_SESSION['hakAkses']<=1) : ?>
<div class='row'>
<?php
    $sql = "SELECT * FROM barang WHERE STOK >= 1";
    $result = mysqli_query($koneksi, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $teks = strip_tags($row['deskripsi']);

        if(strlen($teks) > 60) {
          	//truncate string
          	$stringcut = substr($teks, 0, 500);

            // memastikan pemotongan hanya pada akhir kalimat supaya kalimat buritan kapal tidak menjadi burit...
            $teks = substr($stringcut, 0, strpos($stringcut, ' ', 65)).' ...
            <a href="?page=beli&id='.$row['id_barang'].'">Beli untuk lengkapnya!</a>';
        }
        //LOOPING KARTU BARANG BELI
        echo "
            <div class='col s12 m6 l4'>
                <div class='card hoverable'>
                    <div class='card-image'>
                        <div class='materialboxed'>
                        <img src='img/".$row['gambar']."'>
                        <span class='card-title red lighten-3'>".$row['nama_barang']."</span>
                        </div>
                        <a class='btn-floating tooltipped btn-large halfway-fab waves-effect waves-light red'
                        data-position='top' data-tooltip='Beli'
                        href='?page=beli&id=".$row['id_barang']."'>
                        <i class='material-icons'>shopping_cart</i>
                        </a>
                    </div>
                    <div class='card-content'>
                        <h6 class='grey-text text-darken-1'>Rp ".$row['harga_pokok']."</h6>
                        <p class='grey-text text-darken-1'>Stok Tersedia : ".$row['stok']."</p><br>
                        <p>".$teks."</p>
                    </div>
                </div>
            </div>";
        }
        ?>
<?php endif ?>

        </div>
<div>
