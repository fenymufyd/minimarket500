<?php

    // initializing variables
    $username = "";
    $email    = "";
    $errors = array();

    include "src/koneksi.php";
    include "src/id-otomatis.php";
    include "src/akun/errors.php";
    if (isset($_POST['daftar'])) {
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
            echo "<script type='text/javascript'>alert('berhasil ditambahkan');
              window.location='?page=plg';
              </script>";
          }else{
              echo '<script type="text/javascript">alert("Gagal");</script>';
              echo "ERROR: Could not able to execute $query. " . mysqli_error($koneksi);
              echo "<a href='register.php'>Kembali</a>";
          }
        }
      }
?>
    <div class="container center" style="padding-top:20px;">
        <h4>Tambah Data pelanggan</h4>
        <div class="left">
            <a href="?page=plg" class="btn waves-effect waves-light">
                Batalkan tambah data
            </a>
        </div>
    	<div class="divider" style="margin-bottom:10px;"></div>
        <div class="row">
        <form class="row s12" method="post">
        <?php include('src/akun/errors.php'); ?>
                <div class="row" style="margin-top:20px;">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="username" name="username" type="text" class="validate" value="">
                    <label for="username">Username</label>
                    </div>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="input-field col s12">
                    <i class="material-icons prefix">contact_mail</i>
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password" name="password_1" type="password" class="validate">
                    <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input id="password-2" name="password_2" type="password" class="validate">
                    <label for="password-2">Konfirmasi Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">contact_phone</i>
                        <input id="tele" type="tel" class="validate" name="telp">
                        <label for="tele">Telepon</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" class="datepicker" name="tgl" id="birthdate">
                        <label for="birthdate" class="">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="row "class="">
                    <!-- <div class="col s12"> -->
                    <button class="col s12 btn waves-effect waves-light" type="submit" name="daftar">
                        Tambah Pelanggan
                    </button>
                    <!-- </div> -->
                </div>
            </form>
        </div>
    </div>
