<div class="container center" style="padding-top:20px;">
	<h4>Data Supplier</h4>
	<div class="divider" style="margin-bottom:10px;"></div>
	<div class="valign-wrapper">
		<?= $_SESSION['hakAkses'] >= 2 ?
		'
		<div class="col s12 m6 l6">
			<a href="?page=supplier&aksi=tambah" class="btn waves-effect waves-light">
				Tambah Data Supplier
				<i class="material-icons right">add</i>
			</a>
		</div>
		' : ''?>
		<div class="input-field col s12 <?= $_SESSION['hakAkses'] >= 2 ? 'm6 l6' : '' ?>">
			<i class="material-icons prefix">search</i>
			<input id="cari" type="text">
			<label for="cari">Cari Data</label>
		</div>
	</div>
<div class="row">

	<div class="center col s12">
			<table class="center-align bordered striped highlight responsive-table" id="tabel" align="center" style="border:3;">
				<thead>
					<tr>
						<th>#</th>
						<th>ID Supplier</th>
						<th>Nama Supplier</th>
						<th>Alamat</th>
						<th>No HP</th>
						<?= $_SESSION['hakAkses'] >= 2 ? "<th>Aksi</th>" : '' ?>
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
					$sql = "SELECT * FROM supplier ORDER BY id_supplier ASC LIMIT $hal1,5";
					$sql1 = "SELECT * FROM supplier ORDER BY id_supplier ASC";
					$res1 = mysqli_query($koneksi,$sql1);
				    $jml = mysqli_num_rows($res1);

					$result = mysqli_query($koneksi,$sql);
					if(!$res1||$jml==0){
						echo "<tr><td colspan='6'>Tidak ada data ditemukan</td></tr>";
					}else{
						while($rs = mysqli_fetch_row($result)){
							echo "<tr><td>".$no++."</td>";
							echo "<td>".$rs[0]."</td>";
							echo "<td>".$rs[1]."</td>";
							echo "<td>".$rs[2]."</td>";
							echo "<td>".$rs[3]."</td>";
							echo ($_SESSION['hakAkses'] >= 2 ? "<td>
							<a class='waves-effect waves-light btn-small' href='?page=supplier&aksi=edit&id=".$rs[0]."'>
							Ubah
							</a>
							<a class='waves-effect waves-light btn-small'
							onClick=\"javascript: return confirm('Konfirmasi delete');\"
							href='?page=supplier&aksi=hapus&id=".$rs[0]."'>Hapus
							</a>
							</td>
							</tr>" : '');
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
					echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=supplier'> ")."<i class='material-icons'>first_page</i></a></li>";
					echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=supplier&hal=".$prev."'>")."<i class='material-icons'>chevron_left</i></a></li>";
						for($b=1;$b<=$a;$b++){
						  echo "<li class='".(($hal==$b)?'active':'waves-effect')."'><a href='?page=supplier&hal=".$b."'>".$b."</a></li>";
						}
					echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=supplier&hal=".$next."'>")."<i class='material-icons'>chevron_right</i></a></li>";
					echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=supplier&hal=".$a."'>")."<i class='material-icons'>last_page</i></a></li>";
					echo "</ul>";

					// include "src/exporttabel.php";
					// include "src/tambah.php";
				?>
				<div class="row">
					<a href="src/supplier/fpdf-export-spl.php" class="btn-small waves-effect waves-light">
						Export Tabel Menjadi PDF
						<!-- <i class="material-icons right">add</i> -->
					</a>
				</div>
	</div>

</div>
</div>
