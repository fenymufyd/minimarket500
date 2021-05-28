<?php
    include "src/koneksi.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM pasokan WHERE id_pasok='$id'";
    $query = mysqli_query($koneksi, $sql);
    $sql2 = "UPDATE barang set stok = stok - '$jml' WHERE id_barang = '$idb'";
    $query2 = mysqli_query($koneksi, $sql);

    if(!$query){
      echo "Error : " . mysqli_error($koneksi);
    }else{
        mysqli_close($koneksi);
?>
        <script type="text/javascript">
          alert("Data dengan id "<?php echo $id ;?>" Dihapus.");

          window.location.href="?page=pasokan";
        </script>
      <noscript>
<?php

        header('Location: ?page=pasokan');
    }
?>
      </noscript>
