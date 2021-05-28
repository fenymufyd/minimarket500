<?php
	include "src/koneksi.php";
	if (empty($_GET['id'])) {
		# code...
		echo "<script>alert('Pilih dulu yang ingin diedit!');
			window.location='?page=karyawan';
		</script>";
	}else{
		$idUpdate =$_GET['id'];
		$query = "select * from karyawan where id_karyawan='$idUpdate'";
		$exe = mysqli_query($koneksi,$query);
		$data = mysqli_fetch_row($exe);
	}
	if (isset($_POST["update"])) {
		# code...
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$almt = $_POST['almt'];
        $telp = $_POST['telp'];
        $levl = $_POST['levl'];
		$query = "update karyawan set nama_karyawan='$nama',username ='$user',password ='$pass',alamat ='$almt',no_telp='$telp', level='$levl' where id_karyawan='$id'";
		$result = mysqli_query($koneksi, $query);
		if ($result) {
			# code...
			echo "<script>alert('Data Berhasil Diupdate');
					window.location='?page=karyawan';
				</script>";
		}else{
			echo "<script>alert('Update Failed, Please Retry');'</script>";
		}
	}
?>
<div class="card">
	<div class="section">
		<h5>Edit Karyawan</h5>
	</div>
	<div class="divider"></div>
	<div class="col s12 m6 l6">
		<a href="?page=karyawan" class="btn waves-effect waves-light">
			Batal tambah data, Kembali ke Tampil
		</a>
	</div>

	<div class="row">
		<form method="post" class="col s12">

			<div class="row">
				<div class="input-field col s12">
					<input readonly value="<?=$data[0]?>" id="id" type="text" name="id">
					<label for="id">ID Karyawan</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="ab" type="text" class="validate" name="nama" value="<?=$data[1]?>">
					<label for="ab">Nama Karyawan</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="cc" type="text" class="validate" name="user" value="<?=$data[2]?>">
					<label for="cc">Username</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="dd" type="text" class="validate" name="pass" value="<?=$data[3]?>">
					<label for="dd">Password</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea id="ee" class="materialize-textarea" name="almt"><?=$data[4]?></textarea>
					<label for="ee">Alamat</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="ff" type="tel" class="validate" name="telp" value="<?=$data[5]?>">
					<label for="ff">Nomor Telepon</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
		            <select name="levl" id="3">
		                <option value="" disabled selected>Pilih</option>
						<option value="1" <?= ($data[6]==1) ? 'selected' : ''?> >Karyawan</option>
		                <option value="2" <?= ($data[6]==2) ? 'selected' : ''?> >Admin</option>
		            </select>
		            <label for="3">Level</label>
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
