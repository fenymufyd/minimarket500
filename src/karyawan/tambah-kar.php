<?php
    include "src/koneksi.php";
    include "src/id-otomatis.php";
    if(isset($_POST['submit'])) {
      if(!isset($_POST)){
        ?><script type='text/javascript'>alert("Tidak Boleh Kosong");</script><?php
      }else{
        $id   = $_POST['id'];
        $nama = $_POST['nama'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $almt = $_POST['almt'];
        $telp = $_POST['telp'];
        $levl = $_POST['levl'];

        $sql = "INSERT INTO karyawan VALUES('$id', '$nama','$user','$pass', '$almt', '$telp', '$levl')";
        $result = mysqli_query($koneksi, $sql);
        if($result){
          mysqli_close($koneksi);?><script type='text/javascript'>alert("berhasil");

            window.location="?page=karyawan";
          </script><?php
        }else{
          ?><script type='text/javascript'>alert("Gagal");
            </script><?php
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
            echo "<a href='?page=karyawan'>Kembali</a>";

        }
        mysqli_close($koneksi);
      }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="card">
<a href="?page=karyawan">Batalkan tambah data</a>
    <br><br>
    <form method="post">
        ID Karyawan
        <input type="text" name="id" value="<?php echo kode_auto("karyawan","id_karyawan","KAR-"); ?>" readonly> <br>
        Nama
        <input type="text" name="nama" required> <br>
        Username
        <input type="text" name="user" required> <br>
        Password
        <input type="password" name="pass" required> <br>
        Alamat
        <input type="text" name="almt" required> <br>
        telp
        <input type="tel" name="telp" required> <br>
        level
        <select name="levl">
          <option value="2">admin</option>
          <option value="1">karyawan</option>
        </select>
        <input type="submit" name="submit" value="Tambah">
        <input type="reset" value="Reset">
    </form>
  </body>
</html>
