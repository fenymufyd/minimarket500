<?php
    include "src/koneksi.php";
    include "src/id-otomatis.php";
    if (isset($_POST['submit'])) {
        if (!isset($_POST)) {
            echo "<script type='text/javascript'>alert('Tidak Boleh Kosong');</script>";
        } else {
            $target = "img/".basename($_FILES['image']['name']);

            $id     = $_POST['id'];
            $nama   = $_POST['nama'];
            $desk   = $_POST['deskripsi'];
            $image  = $_FILES['image']['name'];
            $satuan = $_POST['satuan'];
            $harga  = $_POST['harga'];

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $bisaupload = true;
            } else {
                $bisaupload = false;
                echo "<script>alert('Image gagal diupload');
                window.location.href = window.location.href;
                </script>";
            }

            $stmt = $dbh->prepare("INSERT INTO barang
                (id_barang, nama_barang, deskripsi, gambar, satuan, harga_pokok, stok)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $a);
            $stmt->bindParam(2, $b);
            $stmt->bindParam(3, $c);
            $stmt->bindParam(4, $d);
            $stmt->bindParam(5, $e);
            $stmt->bindParam(6, $f);
            $stmt->bindParam(7, $g);

            // insert one row
            $a = $id;
            $b = $nama;
            $c = $desk;
            $d = $image;
            $e = $satuan;
            $f = $harga;
            $g = 0;

            if ($stmt->execute() && ($stmt->rowCount()>0) && $bisaupload) {
                $dbh = null;
                echo "<script type='text/javascript'>alert('berhasil');
                    window.location='?page=barang';</script>";
            } else {
                $dbh = null;
                echo "<script type='text/javascript'>alert('Gagal');</script>";
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
                echo "<a href='?page=barang'>Kembali</a>";
            }
            $dbh = null;
        }
    }
?>
<div class="container center" style="padding-top:20px;">
    <h4>Tambah Data Barang</h4>
    <div class="left">
        <a href="?page=barang" class="btn waves-effect waves-light">
            Batalkan tambah data
        </a>
    </div>
    <div class="divider" style="margin-bottom:10px;"></div>
    <div class="row">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input readonly value="<?= kode_auto("barang", "id_barang", "BAR-"); ?>" id="id" type="text" name="id">
                <label for="1">ID Barang</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="2"name="nama" class="validate">
                <label for="2">Nama Barang</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="barr" class="materialize-textarea" name="deskripsi"></textarea>
                <label for="barr">Deskripsi Barang</label>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>File Gambar Barang</span>
                <input type="file" accept="image/*" name="image">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="input-field col s12">
            <select name="satuan" id="3">
                <option value="" disabled selected>Pilih</option>
                <option value="PCS">PCS</option>
                <option value="KALENG">KALENG</option>
                <option value="SACHET">SACHET</option>
                <option value="BOTOL">BOTOL</option>
                <option value="DUS">DUS</option>
                <option value="DRUM">DRUM</option>
                <option value="GALON">GALON</option>
                <option value="BATANG">BATANG</option>
            </select>
            <label for="3">Satuan</label>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="number" id="4" name="harga" class="validate">
                <label for="4">Harga Pokok</label>
            </div>
        </div>
        <div class="row">
            <button class="col s12 btn waves-effect waves-light" type="submit" name="submit">
                Tambah
            </button>
        </div>
    </form>
    </div>
</div>
