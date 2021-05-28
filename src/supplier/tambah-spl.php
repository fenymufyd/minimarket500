<?php
    include "src/koneksi.php";
    include "src/id-otomatis.php";
    if(isset($_POST['submit'])) {
      if(!isset($_POST)){
        ?><script type='text/javascript'>alert("Tidak Boleh Kosong");</script><?php
      }else{
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $sql = "INSERT INTO supplier VALUES('$id', '$nama', '$alamat', '$telp')";
        $result = mysqli_query($koneksi, $sql);
        if($result){
          mysqli_close($koneksi);?><script type='text/javascript'>alert("berhasil");

            window.location="?page=supplier";
          </script><?php
        }else{
          ?><script type='text/javascript'>alert("Gagal");
            </script><?php
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
            echo "<a href='?page=supplier'>Kembali</a>";
        }
        mysqli_close($koneksi);
      }
        // header('Location:?page=supplier');
        // Show message when user added
        // echo "Data Berhasil Ditambahkan. <a href='../index.php'>Lihat Users</a>";
    }
?>
    <div class="container center" style="padding-top:20px;">
        <h4>Tambah Data Supplier</h4>
        <div class="left">
            <a href="?page=supplier" class="btn waves-effect waves-light">
                Batalkan tambah data
            </a>
        </div>
    	<div class="divider" style="margin-bottom:10px;"></div>
        <div class="row">
            <form method="post" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input readonly value="<?= kode_auto("supplier","id_supplier","SP-"); ?>" id="id" type="text" name="id">
                        <label for="id">ID Supplier</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" name="nama">
                        <label for="first_name">Nama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" name="alamat"></textarea>
                        <label for="textarea1">Alamat</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="tele" type="tel" class="validate" name="telp">
                        <label for="tele">Telepon</label>
                    </div>
                </div>
                <div class="row">
                    <button class="col s12 m6 btn waves-effect waves-light" type="submit" name="submit">
                        Tambah
                    </button>
                    <!-- <button class="col s12 m6 btn waves-effect waves-light" type="reset">
                        Reset
                    </button> -->
                </div>
            </form>
        </div>
    </div>
