<div class="container center" style="padding-top:20px;">
	<h4>Data Penjualan</h4>
	<div class="divider" style="margin-bottom:10px;"></div>
	<div class="valign-wrapper">
		<div class="input-field col s12">
			<i class="material-icons prefix">search</i>
			<input id="cari" type="text">
			<label for="cari">Cari Data</label>
		</div>
	</div>
<div class="row">
	<div class="center col s12">
		<table class="tabel bordered striped highlight responsive-table" align="center" border="2">
			<thead>
				<tr>
					<th>#</th>
					<th>Nomor Penjualan</th>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Harga Penjualan</th>
					<th>Tanggal Penjualan</th>
					<th>Jumlah Dijual</th>
					<th>ID Karyawan</th>
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
				$sql = "SELECT * FROM penjualan ORDER BY no_penjualan ASC LIMIT $hal1,5";
				$sql1 = "SELECT * FROM penjualan ORDER BY no_penjualan ASC";
				$res1 = mysqli_query($koneksi,$sql1);
				$jml = mysqli_num_rows($res1);

				$result = mysqli_query($koneksi,$sql);

				if(!$result||$jml==0){
						echo "<tr><td colspan='10'>Tidak ada data ditemukan</td></tr>";
				}else{
						while($rs = mysqli_fetch_row($result)){
								echo "<tr><td>".$no++."</td>";
								echo "<td>".$rs[0]."</td>";
								echo "<td>".$rs[1]."</td>";
                                echo "<td>".$rs[2]."</td>";
								echo "<td>".$rs[3]."</td>";
								echo "<td>".$rs[4]."</td>";
								echo "<td>".$rs[5]."</td>";
								echo "<td>".$rs[6]."</td>";
								echo ($_SESSION['hakAkses'] >= 2 ? "<td>
								<a class='waves-effect waves-light btn-small'
								onClick=\"javascript: return confirm('Konfirmasi delete');\"
								href='?page=penjualan&aksi=hapus&id=".$rs[0]."'>Hapus
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
				echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=penjualan'> ")."<i class='material-icons'>first_page</i></a></li>";
				echo "<li class='".($hal==1?"disabled'><a href=''>":"waves-effect'><a href='?page=penjualan&hal=".$prev."'>")."<i class='material-icons'>chevron_left</i></a></li>";
					for($b=1;$b<=$a;$b++){
					  echo "<li class='".(($hal==$b)?'active':'waves-effect')."'><a href='?page=penjualan&hal=".$b."'>".$b."</a></li>";
					}
				echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=penjualan&hal=".$next."'>")."<i class='material-icons'>chevron_right</i></a></li>";
				echo "<li class='".($hal==$a?"disabled'><a href=''>":"waves-effect'><a href='?page=penjualan&hal=".$a."'>")."<i class='material-icons'>last_page</i></a></li>";
				echo "</ul>";
		?>
		<div class="row">
			<a href="src/penjualan/fpdf-export-pj.php" class="btn-small waves-effect waves-light">
				Export Tabel Menjadi PDF
				<!-- <i class="material-icons right">add</i> -->
			</a>
		</div>
</div>

</div>
</div>
