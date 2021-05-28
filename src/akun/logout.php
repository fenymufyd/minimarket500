<?php //file logout.php
	session_start();

	//SESSION
	session_unset();
	session_destroy();
	//COOKIE
	// unset($_SESSION['userName']);
	// unset($_SESSION['status']);

	//pindah ke index.php
	echo "<script>alert('Anda telah logout');
			window.location='../../';
		</script>";

	exit();
?>
