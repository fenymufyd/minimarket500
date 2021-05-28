<?php
    include "src/koneksi.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM karyawan WHERE id_karyawan='$id'";
    $query = mysqli_query($koneksi, $sql);

    if(!$query){
      echo "Error : " . mysqli_error($koneksi);
    }else{
        mysqli_close($koneksi);
?>
        <script type="text/javascript">
          alert("Data dengan id "<?php echo $id ;?>" Dihapus.");

          window.location.href="?page=karyawan";
        </script>
      <noscript>
<?php

        header('Location: ?page=karyawan');
    }
?>
      </noscript>
