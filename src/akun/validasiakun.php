<?php
    // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    session_start();
    if(!$_SESSION['login']){ //Jika !tidak pernah login sebelumny
      ?><script type='text/javascript'>alert("login dulu b0ss");window.location.href="src/login.php";</script><?php
        header("Location:src/login.php");//Maka pergi login dulu
      exit();
    }
