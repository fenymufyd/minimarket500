<?php
error_reporting(E_ALL);
	if (empty($_GET['id'])) {
		# code...
		echo "<script>alert('Pilih dulu yang ingin diedit!');
			window.location='?page=barang';
		</script>";
	}else{
		$idUpdate =$_GET['id'];
		$query = "select * from barang where id_barang='$idUpdate'";
		$exe = mysqli_query($koneksi,$query);
		$rs = mysqli_fetch_row($exe);
	}

	if (isset($_POST['update'])) {
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

			$newname = md5(rand() * time());
			$filename = $_FILES["image"]["name"];
		    if (($_FILES["image"]["type"] == "image/*") && ($_FILES["image"]["size"] < 20000000)) {
		        if (file_exists($_FILES["image"]["name"])) {
		            echo "File name exists.";
		        } else {
		            move_uploaded_file($_FILES["image"]["tmp_name"], "img/$newname . $filename");
		        }
		    }

			// bindParam untuk execute berkali2, value untuk sekali saja
			$sql = "UPDATE barang SET nama_barang=:nama, deskripsi=:desk, gambar=:gbr, satuan=:satuan, harga_pokok=:harga, stok=stok WHERE id_barang=:id";
		    $stmt = $dbh->prepare($sql);
		    $stmt->bindValue(":nama", $nama, PDO::PARAM_STR);
		    $stmt->bindValue(":desk", $desk, PDO::PARAM_STR);
		    $stmt->bindValue(":gbr", $image, PDO::PARAM_STR);
		    $stmt->bindValue(":satuan", $satuan, PDO::PARAM_STR);
		    $stmt->bindValue(":harga", $harga, PDO::PARAM_STR);
		    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
		    $stmt->execute();

			$databaseErrors = $stmt->errorInfo();

            if ($stmt->execute() && ($stmt->rowCount()>0) && $bisaupload) {
                $dbh = null;
                echo "<script type='text/javascript'>alert('berhasil');
                    window.location='?page=barang';</script>";
            } else if(!empty($databaseErrors)) {
				$errorInfo = print_r($databaseErrors, true); # true flag returns val rather than print
   				$errorLogMsg = "error info: $errorInfo"; # do what you wish with this var, write to log file etc...
				// echo $errorLogMsg;
				echo 'Error occurred:'.implode(":",$stmt->errorInfo());
			} else {
                $dbh = null;
                echo "<script type='text/javascript'>alert('Gagal');</script>";
                echo "ERROR: Could not able to execute, " . $sql;
				echo 'Error occurred:'.implode(":",$stmt->errorInfo());
                echo "<a href='?page=barang'>Kembali</a>";
            }
            $dbh = null;
        }
    }
?>
<div class="container center" style="padding-top:20px;">
	<h4>Edit Barang</h4>
	<div class="divider" style="margin-bottom:10px;"></div>
	<div class="left">
		<a href="?page=barang" class="btn waves-effect waves-light">
			Batalkan ubah data
		</a>
	</div>
		<div class="row">
			<form method="post" class="col s12" enctype="multipart/form-data">
				<div class="row">
					<div class="input-field col s12">
						<input readonly value="<?= $rs[0] ?>" id="id" type="text" name="id">
						<label for="1">ID Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="2"name="nama" class="validate" value="<?= $rs[1] ?>">
						<label for="2">Nama Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="barr" class="materialize-textarea" name="deskripsi"><?= $rs[2] ?></textarea>
						<label for="barr">Deskripsi Barang</label>
					</div>
				</div>
				<div class="row">
					<div class="file-field input-field col s12">
						<div class="btn">
							<span>File Gambar Barang</span>
							<input type="file" accept="image/*" name="image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="satuan" id="3">
							<option value="PCS"		<?= $rs[4]=="PCS" ? "selected" : ""?> >PCS</option>
							<option value="KALENG"	<?= $rs[4]=="KALENG" ? "selected" : ""?>>KALENG</option>
							<option value="SACHET"	<?= $rs[4]=="SACHET" ? "selected" : ""?>>SACHET</option>
							<option value="BOTOL"	<?= $rs[4]=="BOTOL" ? "selected" : ""?>>BOTOL</option>
							<option value="DUS"		<?= $rs[4]=="DUS" ? "selected" : ""?>>DUS</option>
							<option value="DRUM"	<?= $rs[4]=="DRUM" ? "selected" : ""?>>DRUM</option>
							<option value="GALON"	<?= $rs[4]=="GALON" ? "selected" : ""?>>GALON</option>
							<option value="BATANG"	<?= $rs[4]=="BATANG" ? "selected" : ""?>>BATANG</option>
						</select>
						<label for="3">Satuan</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="number" id="4" name="harga" class="validate" value="<?= $rs[5] ?>">
						<label for="4">Harga Pokok</label>
					</div>
				</div>
                <div class="row">
                    <button class="col s12 btn waves-effect waves-light" type="submit" name="update">
                        Update
                    </button>
                </div>
			</form>
		</div>
</div>
