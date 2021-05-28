<?php
    session_start();
    include("src/koneksi.php");
    if (!isset($_SESSION['userName'])) {
        $_SESSION['hakAkses'] = 0;
        $_SESSION['userName'] = null;
    }else{
		switch ($_SESSION['hakAkses'])
		{
			case "1":
				$tipe = "pelanggan";
				break;
			case "2":
				$tipe = "karyawan";
				break;
			case "3":
				$tipe = "admin";
				break;
			default:
				$tipe = "pengunjung";
				break;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/icon.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Tugas</title>
	<style type="text/css">
		body {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
		}

		th {
			cursor: pointer;
		}

		em{
			radius: 5px;
		    background-color: yellow;
		}

		.bungkus {
			padding-top: 20px;
		    padding-left: 310px;
		}

		@media only screen and (max-width : 992px) {
		  .bungkus {
			padding-left: 0;
		  }
		}

		#qwe {
			position: fixed;
			bottom: 0;
			right: 0;
		}
	</style>
</head>
<body>

	<header>
		<div class="navbar-fixed">
			<!-- Dropdown Structure -->
			<ul id="dropdown1" class="dropdown-content">
				<li><?= isset($_SESSION['userName']) ?
                '<a href="src/akun/logout.php">Logout</a>' :
                '<a href="src/akun/login.php">Login</a>
				<a href="src/akun/register.php">Daftar</a></li>' ?>
				</li>
			</ul>
			<nav>
				<div class="nav-wrapper">
					<div class="row">
						<div class="col s12">
							<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
							<a href="#!" class="brand-logo">Minimarket 500</a>

							<ul class="right hide-on-med-and-down">
								<li>Login sebagai : <?= $_SESSION['userName'] ? "$tipe - ".$_SESSION['userName']."" : "pengunjung" ?></li>
								<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons">more_vert</i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<main>
		<div class='bungkus'>
			<div class="row">

				<div class="col s12 m12 l9">
					<!-- KONTEN  -->
					<div class="card white">

							<?php //kalo pakai ini kada boleh lagi di include lain pakai get
                            $page = $aksi = "";
                            if (isset($_GET['page'])) {
                                if (isset($_GET['aksi'])) {
                                    $aksi = $_GET['aksi'];
                                } else {
                                    $aksi = "";
                                }
                                $page = $_GET['page'];
                            } else {
                                $page = "home";
                            }

                            if ($page == "home") {
                                include "src/home.php";
                            }

                            if ($page == "karyawan") {
                                if ($aksi == "") {
                                    include "src/karyawan/tampil-kar.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/karyawan/tambah-kar.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/karyawan/edit-kar.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/karyawan/hapus-kar.php";
                                }
                            }

                            if ($page == "penjualan") {
                                if ($aksi == "") {
                                    include "src/penjualan/tampil-pj.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/penjualan/tambah-pj.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/penjualan/edit-pj.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/penjualan/hapus-pj.php";
                                }
                            }

                            if ($page == "barang") {
                                if ($aksi == "") {
                                    include "src/barang/tampil-brg.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/barang/tambah-brg.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/barang/edit-brg.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/barang/hapus-brg.php";
                                }
                            }

                            if ($page == "pasokan") {
                                if ($aksi == "") {
                                    include "src/pasokan/tampil-pas.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/pasokan/tambah-pas.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/pasokan/edit-pas.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/pasokan/hapus-pas.php";
                                }
                            }

                            if ($page == "supplier") {
                                if ($aksi == "") {
                                    include "src/supplier/tampil-spl.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/supplier/tambah-spl.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/supplier/edit-spl.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/supplier/hapus-spl.php";
                                }
                            }

                            if ($page == "plg") {
                                if ($aksi == "") {
                                    include "src/pelanggan/tampil-plg.php";
                                }
                                if ($aksi == "tambah") {
                                    include "src/pelanggan/tambah-plg.php";
                                }
                                if ($aksi == "edit") {
                                    include "src/pelanggan/edit-plg.php";
                                }
                                if ($aksi == "hapus") {
                                    include "src/pelanggan/hapus-plg.php";
                                }
							}

                            if ($page == "beli") {
                                include "src/beli.php";
							}

							if ($page == "about") {
                                include "src/about.php";
                            }

                            if ($page == "kontak") {
                                include "src/kontak.php";
                            }

                            if ($page == "logout") {
                                include "src/logout.php";
                            }
                            ?>
					</div>
				</div>

			</div>
		</div>
		<!-- LINK/MENU BAGIAN SAMPING -->
		<aside>
			<ul class="sidenav sidenav-fixed" id="mobile-demo" style="top: 65px;">
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=home">
					<i class="material-icons prefix">home</i>
					<span>Home</span></a>
				</li>
		<?php if ($_SESSION['hakAkses']>=2) : ?>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=barang">
					<i class="material-icons prefix">widgets</i>
					<span>Data Barang</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=penjualan">
					<i class="material-icons prefix">storefront</i>
					<span>Data Penjualan</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=pasokan">
					<i class="material-icons prefix">home_work</i>
					<span>Data Pasokan</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=karyawan">
					<i class="material-icons prefix">people</i>
					<span>Data Karyawan</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=supplier">
					<i class="material-icons prefix">local_shipping</i>
					<span>Data Supplier</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=plg">
					<i class="material-icons prefix">record_voice_over</i>
					<span>Data Pelanggans</span></a>
				</li>
		<?php else : ?>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=about">
					<i class="material-icons prefix">help</i>
					<span>Tentang Kami</span></a>
				</li>
				<li>
					<a class="waves-effect waves-light waves-block" href="?page=kontak">
					<i class="material-icons prefix">contact_support</i>
					<span>Kontak</span></a>
				</li>
		<?php endif ?>
			</ul>
		</aside>

	</main>

	<footer class="page-footer bungkus">
		<div class="container">
			<div class="row">
			 <div class="col l6 s12">
			   <h5 class="white-text">Dibuat Oleh :</h5>
			   <p class="grey-text text-lighten-4">
				   <div class="col s6">Muhammad Rif'an</div>
				   <div class="col s6">: Direktur Proyek XD</div>
			   </p>
			 </div>
			 <div class="col l4 offset-l2 s12">
			   <h5 class="white-text">Link</h5>
			   <ul>
				 <li><a class="grey-text text-lighten-3" href="https://www.youtube.com/channel/UCBn_1MOcSiPHrEz5_GVEymQ">Official Youtube BPK Nurul Iman</a></li>
				 <li><a class="grey-text text-lighten-3" href="?page=about">Tentang Kami</a></li>
				 <li><a class="grey-text text-lighten-3" href="?page=kontak">Kontak Kami</a></li>
				 <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
			   </ul>
			 </div>
		   </div>
	   </div>
	   <div class="footer-copyright">
		   <div class="container">
		   © November 2019
		   </div>
	   </div>
	 </footer>
	 <div id="qwe"></div> <!--DIV UNTUK JAM-->
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.min.js"></script>
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->

	<script>
		$(document).ready(function(){
			M.AutoInit();
			// $(".dropdown-trigger").dropdown();

			// TABLE SORT
			$('th').click(function(){
				var table = $(this).parents('table').eq(0)
				var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
				this.asc = !this.asc
				if (!this.asc){rows = rows.reverse()}
				for (var i = 0; i < rows.length; i++){table.append(rows[i])}
			})
			function comparer(index) {
				return function(a, b) {
					var valA = getCellValue(a, index), valB = getCellValue(b, index)
					return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
				}
			}
			function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
			//TABLE SORT


			//PENCARIAN
			$("#cari").keyup(function () {
				var value = this.value.toLowerCase().trim();

				$("table tr").each(function (index) {
					if (!index) return;
					$(this).find("td").each(function () {
						var id = $(this).text().toLowerCase().trim();
						var not_found = (id.indexOf(value) == -1);
						$(this).closest('tr').toggle(!not_found);
						return not_found;
					});
				});
			});
			//PENCARIAN

			//JAM LIVE
			var now = new Date(<?php echo time() * 1000 ?>);
			function startInterval(){
				setInterval('updateTime();', 1000);
			}
			startInterval();//start it right away
			function updateTime(){
				var nowMS = now.getTime();
				nowMS += 1000;
				now.setTime(nowMS);
				var clock = document.getElementById('qwe');
				if(clock){
					clock.innerHTML = now.toTimeString();//adjust to suit
				}
			}
			//JAM LIVE
		});

	</script>

    </body>
</html>
