<?php
	if (empty($_GET['id'])) {
		# code...
		echo "<script>alert('Pilih dulu yang ingin diedit!');
			window.location='?page=supplier';
		</script>";
	}else{
		$idUpdate =$_GET['id'];
		$query = "select * from supplier where id_supplier='$idUpdate'";
		$exe = mysqli_query($koneksi,$query);
		$data = mysqli_fetch_row($exe);
	}
	if (isset($_POST["update"])) {
		# code...
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$notelp = $_POST['notelp'];
		$query = "update supplier set nama_supplier='$nama',alamat ='$alamat',no_telp='$notelp' where id_supplier='$id'";
		$exe = mysqli_query($koneksi, $query);
		if ($exe) {
			# code...
			echo "<script>alert('Data Berhasil Diupdate');
					window.location='?page=supplier';
				</script>";
		}else{
			echo "<script>alert('Update Failed, Please Retry');'</script>";
		}
	}
?>
<div class="card">
		<div class="section">
    		<h5>Edit Supplier</h5>
		</div>
		<div class="divider"></div>
		<div class="col s12 m6 l6">
			<a href="?page=supplier" class="btn waves-effect waves-light">
				Batalkan tambah data, Kembali ke Tampil
			</a>
		</div>
		<div class="row">
			<form method="post" class="col s12">

				<div class="row">
                    <div class="input-field col s12">
                        <input readonly value="<?=$data[0]?>" id="id" type="text" name="id">
                        <label for="id">ID Supplier</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="ab" type="text" class="validate" name="nama" value="<?=$data[1]?>">
                        <label for="ab">Nama Supplier</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="ac" class="materialize-textarea" name="alamat"><?=$data[2]?></textarea>
                        <label for="ac">Alamat</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="ad" type="tel" class="validate" name="notelp" value="<?=$data[3]?>">
                        <label for="ad">Nomor Telepon</label>
                    </div>
                </div>
                <div class="row">
                    <button class="col s12 m6 btn waves-effect waves-light" type="submit" name="update">
                        Update
                    </button>
                    <button class="col s12 m6 btn waves-effect waves-light" type="reset">
                        Reset
                    </button>
                </div>
			</form>
		</div>
</div>
