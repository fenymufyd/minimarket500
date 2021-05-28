<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
include '../koneksi.php';

include '../id-otomatis.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $email = mysqli_real_escape_string($koneksi, $_POST['email']);
  $password_1 = mysqli_real_escape_string($koneksi, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($koneksi, $_POST['password_2']);
  $tlp = mysqli_real_escape_string($koneksi, $_POST['telp']);
  $tgl = mysqli_real_escape_string($koneksi, $_POST['tgl']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username diperlukan"); }
  if (empty($email)) { array_push($errors, "Email diperlukan"); }
  if (empty($password_1)) { array_push($errors, "Password diperlukan"); }
  if (empty($tlp)) { array_push($errors, "Telepon diperlukan"); }
  if (empty($tgl)) { array_push($errors, "Tanggal LAhir diperlukan"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Password tidak sama");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM pelanggan WHERE nama='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($koneksi, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  $user_check_query2 = "SELECT * FROM karyawan WHERE username='$username' LIMIT 1";
  $result2 = mysqli_query($koneksi, $user_check_query2);
  $user2 = mysqli_fetch_assoc($result2);

    if ($user||$user2) { // if user exists
        if (($user['nama'] === $username) || ( $user2['username'] === $username )) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	// $password = md5($password_1);//encrypt the password before saving in the database
    $id     = kode_auto("pelanggan","id_pelanggan","PLG-");
    $a      = 1;
  	$query  = "INSERT INTO pelanggan (id_pelanggan, nama, email, password, telepon, tanggal, level)
  			  VALUES('$id', '$username', '$email', '$password_1', '$tlp', '$tgl','$a')";
  	$result = mysqli_query($koneksi, $query);

    if($result){
      mysqli_close($koneksi);
      $_SESSION['userName'] = $username;
      $_SESSION['hakAkses'] = $a;
      $_SESSION['success'] = "You are now logged in";
      // header('location: ../../');
      echo "<script type='text/javascript'>alert('berhasil');
        window.location='../../';
        </script>";
    }else{
        echo '<script type="text/javascript">alert("Gagal");</script>';
        echo "ERROR: Could not able to execute $query. " . mysqli_error($koneksi);
        echo "<a href='register.php'>Kembali</a>";
    }
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username diperlukan");
  }
  if (empty($password)) {
  	array_push($errors, "Password diperlukan");
  }

  if (count($errors) == 0) {
  	// $password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
        $_SESSION['userName'] = $username;
        $_SESSION['hakAkses'] = $data['level'];
        echo "<script>alert('berhasil');window.location.href='../../';</script>";
  	}else{
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
