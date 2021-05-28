<?php
    include "src/koneksi.php";
    include "src/id-otomatis.php";

    if (empty($_GET['id'])) {
		# code...
		echo "<script>alert('Pilih dulu yang ingin beli!');
			window.location='?page=home';</script>";
	} else {
		$idbeli =$_GET['id'];
		$query = "SELECT * FROM barang WHERE id_barang='$idbeli'";
		$exe = mysqli_query($koneksi,$query);
		$rs = mysqli_fetch_row($exe);
	}

    if(isset($_POST['submit']))
    {
        if(!isset($_SESSION['userName'])){
            echo "
            <script>
                alert('anda harus login dulu untuk membeli');
                window.location = 'src/akun/login.php';
            </script>";
        } else {

            if(!isset($_POST)||empty($_POST)) {
                echo "<script type='text/javascript'>alert('Tidak Boleh Kosong!');</script>";
            }else
            {
                $id = $_POST['id'];
                $id_barang = $_GET['id'];
                $nama_barang = $_POST['nama'];
                $nama_pembeli = $_POST['nmp'];
                $tanggal = date('M'." ".'d'.",".' Y');

                $harga_awal = $_POST['harga'];
                $jml = $_POST['jml'];
                $total = $harga_awal * $jml;

                $sql = "INSERT INTO penjualan
                (no_penjualan, id_barang, nama_barang, total_harga, tanggal_jual, jml_jual, nama)
                VALUES('$id', '$id_barang', '$nama_barang', '$total', '$tanggal', '$jml', '$nama_pembeli')";
                $result = mysqli_query($koneksi, $sql);
                if($result)
                {
                    mysqli_close($koneksi);
                    echo "<script type='text/javascript'>alert('berhasil membeli, silahkan tunggu paketnya di rumah anda');
                    window.location='?page=home';
                    </script>";
                }else
                {
                    echo "<script type='text/javascript'>alert('Gagal');
                    </script>";
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($koneksi);
                    echo "<a href='?page=home'>Kembali</a>";
                }

                mysqli_close($koneksi);
            }
        }
    }
?>

<div class="container center" style="padding-top:20px;">
	<h4>Pembelian Barang</h4>
	<div class="divider" style="margin-bottom:10px;"></div>
    <div class="col s12 m6 l6">
        <a href="?page=home" class="btn waves-effect waves-light">
            Batalkan pembelian
        </a>
    </div>
    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input readonly value="<?= kode_auto("penjualan","no_penjualan","PB-"); ?>" id="ida" type="text" name="id">
                    <label for="ida">No Penjualan</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input readonly id="nmbv" type="text" name="nama" value="<?= $rs[1] ?>" >
                    <label for="nmbv">Nama Barang</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <label class="left" for="xxx">Gambar Barang</label>
                    <img class="materialboxed" id="xxx" width="200" src="img/<?= $rs[3] ?>">
                </div>
                <div class="col s12 m6">
                    <label class="left" for="deskc">Deskripsi</label>
                    <blockquote id="deskc"><?= $rs[2] ?></blockquote>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input readonly id="c" type="number" name="harga" value="<?= $rs[5] ?>">
                    <label for="c">Harga</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="jmjm" type="number" class="validate" name="jml" step="1" min="1" max="<?= $rs[6] ?>" value="1"
                     required>
                    <label for="jmjm">Jumlah Dibeli</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input readonly placeholder="" id="kkk" type="text" name="totalh" value="<?= $rs[5] ?>">
                    <label for="kkk">Total Harga</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input readonly id="ccvx" type="text" name="nmp" value="<?= $_SESSION['userName'] ?? "pengunjung" ?>" >
                    <label for="ccvx">Nama Pembeli</label>
                </div>
            </div>

            <div class="row">
                <button class="col s12 m6 btn waves-effect waves-light" type="submit" name="submit">
                    Beli
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    let input = document.querySelector('#jmjm');
    input.oninput = handleInput;

    function handleInput(e){
        var harga = document.getElementById('c').value;
        var jumlh = document.getElementById('jmjm').value;
        var total = parseInt(harga) * parseInt(jumlh);
        if(!isNaN(total)){
            document.getElementById('kkk').value = total;
        }else{
            alert("bukan angka!");
            document.getElementById('kkk').value = 0;
        }
    }
</script>
