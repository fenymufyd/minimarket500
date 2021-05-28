<div class="container center" style="padding-top:20px;">
	<h4>Data Karyawan</h4>
	<div class="divider" style="margin-bottom:10px;"></div>
	<div class="valign-wrapper">
		<?= $_SESSION['hakAkses'] >= 3 ?
		'
		<div class="col s12 m6 l6">
			<a href="?page=karyawan&aksi=tambah" class="btn waves-effect waves-light">
				Tambah Data Karyawan
				<i class="material-icons right">add</i>
			</a>
		</div>
		' : ''?>
		<div class="input-field col s12 <?= $_SESSION['hakAkses'] >= 3 ? 'm6 l6' : '' ?>">
			<i class="material-icons prefix">search</i>
			<input id="cari" type="text">
			<label for="cari">Cari Data</label>
		</div>
	</div>
<div class="row">

	<div class="center col s12" style="overflow:auto;">
		<table class="bordered striped highlight responsive-table" style="overflow:auto;" align="center" border="2">
			<thead>
				<tr>
					<th>#</th>
					<th>ID Karyawan</th>
					<th>Nama Karyawan</th>
					<th>Username</th>
		            <th>Password</th>
					<th>Alamat</th>
					<th>No HP</th>
					<th>Level</th>
					<?=($_SESSION['hakAkses'] >= 2 ? "<th>Aksi</th>" : '') ?>
				</tr>
			</thead>
			<tbody>
		<?php

				if(isset($_GET['hal'])){
				  $hal = $_GET['hal'];
				}else{
				  $hal = "1";
				}

				if($hal=="" || $hal=="1"){
				  $hal1 = 0;
				  $no = 1;
				}else{
				  $hal1=($hal*5)-5;
				  $no = $hal1 + 1;
				}

				$sql = "SELECT * FROM karyawan ORDER BY id_karyawan ASC LIMIT $hal1,5";
				$sql1 = "SELECT * FROM karyawan ORDER BY id_karyawan ASC";
				$res1 = mysqli_query($koneksi,$sql1);
				$jml = mysqli_num_rows($res1);

				$result = mysqli_query($koneksi,$sql);

				if(!$res1||$jml==0){
						echo "<tr><td colspan='9'>Tidak ada data ditemukan</td></tr>";
				}else{
						while($rs = mysqli_fetch_row($result)){
								echo "<tr><td>".$no++."</td>";
								echo "<td>".$rs[0]."</td>";
								echo "<td>".$rs[1]."</td>";
                                echo "<td>".$rs[2]."</td>";
								echo "<td>".(($_SESSION['hakAkses'] >= 3 || $_SESSION['userName'] === $rs[2]) ? "$rs[3]" : "*****")."</td>";
								echo "<td>".$rs[4]."</td>";
								echo "<td>".$rs[5]."</td>";
								echo "<td>".$rs[6]."</td>";
								echo (($_SESSION['hakAkses'] >= 3 || $_SESSION['userName'] === $rs[2]) ? "<td>
								<a class='waves-effect waves-light btn-small' href='?page=karyawan&aksi=edit&id=".$rs[0]."'>
								Ubah
								</a>
								<a class='waves-effect waves-light btn-small'
								onClick=\"javascript: return confirm('Konfirmasi delete');\"
								href='?page=karyawan&aksi=hapus&id=".$rs[0]."'>Hapus
								</a>" : "<td>
								<a class='btn-small disabled'>Ubah</a>
								<a class='btn-small disabled'>Hapus</a>");
								echo "</td></tr>";

						}
				}
				echo "</tbody>";
				echo "</table>";
				echo "Jumlah Data : ".$jml;
				$a = $jml/5;

				$a=ceil($a);
				$prev = $hal - 1;
				$next = $hal + 1;
				echo "<ul class='pagination'>";
				echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=karyawan'> ")."<i class='material-icons'>first_page</i></a></li>";
				echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=karyawan&hal=".$prev."'>")."<i class='material-icons'>chevron_left</i></a></li>";
					for($b=1;$b<=$a;$b++){
					  echo "<li class='".(($hal==$b)?'active':'waves-effect')."'><a href='?page=karyawan&hal=".$b."'>".$b."</a></li>";
					}
				echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=karyawan&hal=".$next."'>")."<i class='material-icons'>chevron_right</i></a></li>";
				echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=karyawan&hal=".$a."'>")."<i class='material-icons'>last_page</i></a></li>";
				echo "</ul>";
		?>
		<div class="row">
			<a href="src/karyawan/fpdf-export-kar.php" class="btn-small waves-effect waves-light">
				Export Tabel Menjadi PDF
				<!-- <i class="material-icons right">add</i> -->
			</a>
		</div>

	</div>

</div>
</div>
