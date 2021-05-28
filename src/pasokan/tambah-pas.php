<?php
    include "src/koneksi.php";
    include "src/id-otomatis.php";
    if(isset($_POST['submit'])) {
      if(!isset($_POST)){
        ?><script type='text/javascript'>alert("Tidak Boleh Kosong");</script><?php
      }else{
        $id = $_POST['idp'];
        $ids = $_POST['ids'];
        $idb = $_POST['idb'];
        $har = $_POST['har'];
        $jml = $_POST['jml'];
        $tgl = $_POST['tgl'];

        $sql = "INSERT INTO pasokan VALUES('$id', '$ids', '$idb', '$har', '$jml', '$tgl')";
        $sql2 = "UPDATE barang set stok = stok + '$jml' WHERE id_barang = '$idb'";
        $result = mysqli_query($koneksi, $sql);
        $result2 = mysqli_query($koneksi, $sql2);
        if($result&&$result2){
          mysqli_close($koneksi);?><script type='text/javascript'>alert("berhasil");

            window.location="?page=pasokan";
          </script><?php
        }else{
          ?><script type='text/javascript'>alert("Gagal");
            </script><?php
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
            echo "<a href='?page=pasokan'>Kembali</a>";

        }
        mysqli_close($koneksi);
      }
        // header('Location:?page=pasokan');
        // Show message when user added
        // echo "Data Berhasil Ditambahkan. <a href='../index.php'>Lihat Users</a>";
    }
?>
<div class="card">
    <a href="?page=pasokan">Batalkan tambah data</a>
    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input readonly value="<?= kode_auto("pasokan","id_pasok","SPL-"); ?>" id="id" type="text" name="idp">
                <label for="id">ID Pasokan</label>
            </div>
        </div>
        <div class="input-field col s12">
            <select name="ids">
              <option value="" disabled selected>Pilih</option>
              <?php
              $nama = mysqli_query($koneksi,"SELECT * FROM supplier ORDER BY id_supplier ASC");
              while($row = mysqli_fetch_array($nama)){
                  echo "<option value='$row[0]'>".$row[0]." - ".$row[1]."</option>";
              }
              ?>
            </select>
            <label>Nama Supplier</label>
        </div>
        <div class="input-field col s12">
            <select name="idb">
              <option value="" disabled selected>Pilih</option>
              <?php
              $idbarang = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY id_barang ASC");
              while($row = mysqli_fetch_array($idbarang)){
                  echo "<option value='$row[0]'>".$row[0]." - ".$row[1]."</option>";
              }
              ?>
            </select>
            <label>Nama Barang yang disuplai</label>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="b" type="number" class="validate" name="har">
                <label for="b">Harga Dibeli</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="c" type="number" class="validate" name="jml">
                <label for="c">Jumlah Disuplai</label>
            </div>
        </div>
        Tanggal Penyuplaian
        <input type="text" name="tgl" class="datepicker">
        <div class="row">
            <button class="col s12 m12 btn waves-effect waves-light" type="submit" name="submit">
                Tambah
            </button>
            <button class="col s12 m4 btn waves-effect waves-light" type="reset">
                Reset
            </button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
     M.AutoInit();
    });
</script>
