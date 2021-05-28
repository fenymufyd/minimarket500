<?php
    include "src/koneksi.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id_barang='$id'";
    $query = mysqli_query($koneksi, $sql);

    if(!$query){
      echo "Error : " . mysqli_error($koneksi);
    }else{
        mysqli_close($koneksi);
?>
        <script type="text/javascript">
          alert("Data dengan id "<?php echo $id ;?>" Dihapus.");

          window.location.href="?page=barang";
        </script>
      <noscript>
<?php

        header('Location: ?page=barang');
    }
?>
      </noscript>
