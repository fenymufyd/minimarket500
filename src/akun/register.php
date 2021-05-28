<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengunjung</title>
    <link rel="stylesheet" href="../../css/icon.css">
    <link rel="stylesheet" type="text/css" href="../../css/materialize.min.css">
    <style media="screen">
        html, body, .bungkus {
            height: 100%;
        }
        .grandParentContaniner{
            display:table; height:100%; margin: 0 auto;
        }
        .parentContainer{
            display:table-cell; vertical-align:middle;
        }
    </style>
</head>
<body>
    <div class="grandParentContaniner">
        <div class="parentContainer">
            <div class="container" style="width:600px;">
                <div class="row card hoverable">
                    <div class="card-content">
                        <h4 class="center blue-text">Daftar Pelanggan</h4>

                        <form class="row s12" method="post" action="register.php">
                            <?php include('errors.php'); ?>
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
    							<input id="email" name="email" type="email" class="validate" value="<?= $email ?>">
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
    							<button class="col s12 btn waves-effect waves-light blue darken-4" type="submit" name="reg_user">
    								Daftar
    							</button>
    							<!-- </div> -->
    						</div>
                            <p class="center">
                                Sudah punya Akun? <a href="login.php">Login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../../js/materialize.min.js"></script>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function(){
        M.AutoInit();
        $('.datepicker').datepicker();
    });
</script>
</html>
