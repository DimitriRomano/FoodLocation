<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant</title>
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
              <h2 style="font-size:30px;">FOOD LOCATION</h2>
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
                    <a class="nav-link" href="php/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reservation">Reservation</a>
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
    <h1 class="text-center">NOM DU RESTO</h1>
    <img src="../images/logo.JPG" class="rounded float-left" alt="...">
    
  </div>

</body>
</html>