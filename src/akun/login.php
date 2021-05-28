<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
            <div class="container" style="width:500px;">
                <div class="row card hoverable">
                    <div class="card-content">
    <h4 class="center blue-text">Login</h4>
    <form method="post" action="login.php">
    	<?php include('errors.php'); ?>
        <div class="row" style="margin-top:20px;">
            <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="username" name="username" type="text" class="validate">
            <label for="username">Username</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <i class="material-icons prefix">lock_outline</i>
            <input id="password" name="password" type="password" class="validate">
            <label for="password">Password</label>
            </div>
        </div>
        <div class="row "class="">
            <div class="col s12">
            <button class="col s12 btn waves-effect waves-light blue darken-4" type="submit" name="login_user">
                Login
            </button>
            </div>
        </div>
    	<p class="center">
    		Belum punya akun? <a href="register.php">Daftar</a>
    	</p>
    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../../js/materialize.min.js"></script>
</html>
