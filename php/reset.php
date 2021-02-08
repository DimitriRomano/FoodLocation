<?php
 require_once 'db.php';
 require_once 'functions.php';
if(isset($_GET['idusers']) && isset($_GET['reset_token'])){
    $req = $pdo->prepare('SELECT * FROM users WHERE idusers = ? AND reset_token=? AND reset_att > DATE_SUB(NOW(),INTERVAL 30 MINUTE)');
    $req->execute([$_GET['idusers'], $_GET['reset_token']]);
    $user = $req->fetch();
        if($user){
        if(!empty($_POST)){
            if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_repeat']){
                $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE users SET password = ?, reset_att=NULL , reset_token=NULL')->execute([$password]);
                session_start();
                $_SESSION['auth']=$user;
                header('Location: index.php');
                exit();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forget</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/Bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo.JPG" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/fixed.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="img/nuno.png" alt="logo imag">
        </a>
        <form action="php/search.php" method="get">
            <div class="search-box">
                <input class="search-text" type="text" name="keywords" autocomplete="off" placeholder="Search..">
                <a class="search-btn" href="php/search.php">
                    <i class="fa fa-search"></i></a>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reservation">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->

  <div class="container" style="margin-top:20%;">
    <h1 class="mt-5">Verification de mot de passe</h1>
    <form action="" method="POST">
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <input type="password" name="password_repeat" class="form-control" placeholder="Password Repeat">
        <button type="submit" class="btn btn-primary" style="margin-top:0.1%;">Confirm</button>
    </div>
    </form>
  </div>

</body>
</html>