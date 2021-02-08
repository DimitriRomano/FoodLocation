<?php
require 'functions.php';
session_start();
logged_only();
error_reporting(0);
include('dbconnect.php');

require ('search.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>FOOD LOCATION | WEBSITE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/notif.css">
    <link rel="shortcut icon" href="logo.JPG" type="../image /x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>

    <link rel="stylesheet" href="../css/fixed.css">
    <style>
    
    </style>
</head>
<!-- icon logo -->
    <body data-spy="scroll" data-target="#navbarResponsive">
    <!--Start Navigation Section -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
              <h2 style="font-size:30px;">FOOD LOCATION</h2>
        </a>
        <form action="php/search.php" method="get">
            <div class="search-box">
                <input class="search-text" id="searchBox" type="text" name="keywords" autocomplete="off" placeholder="Search..">
                <a class="search-btn" href="php/search.php">
                    <i class="fa fa-search"></i></a>
            </div>
            <div id="response"></div>
        </form>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comment.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="resto.php">Resto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item avatar">
                    <a class="nav-link p-0" href="#">
                    <img src="../images/avatar.png" 
                    class="rounded-circle z-depth-0" alt="avatar image" height="35">
                     </a>
                </li>
            </ul>
        </div>
    </nav>
   <script>
    
   </script>
    <!-- End Navigation section -->

  <!-- Start Slide Section -->

  <div class="wrap">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">
            <div class="slide slide1">
                <div class="slide-content">

                </div>
            </div>
            <div class="slide slide2">
                <div class="slide-content">

                </div>
            </div>
            <div class="slide slide3">
                <div class="slide-content">

                </div>
            </div>
        </div>
        <div id="arrow-right" class="arrow"></div>
    </div>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
    <script src="../js/test.js"></script>

    <!-- End Slide Section -->

    <!-- Section Select Table -->
<section id="select-table">
    <h2 class="section-title sep-type-2 text-center">Select Your Table</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-14">
                <div class="carousel-table">
                    <div class="table-page">
                        <div class="item">
                            <span>1</span>
                            <p>reserved</p>
                            <img src="../images/table_8.png" alt="">
                        </div>
                        <div class="item">
                            <span>2</span>
                            <p>reserved</p>
                            <img src="../images/table_1.png" alt="">
                        </div>
                        <div class="item reserved">
                            <span>3</span>
                            <p>reserved</p>
                            <img src="../images/table_6.png" alt="">
                        </div>
                        <div class="item">
                            <span>4</span>
                            <p>reserved</p>
                            <img src="../images/table_1.png" alt="">
                        </div>
                        <div class="item reserved">
                            <span>5</span>
                            <p>reserved</p>
                            <img src="../images/table_8.png" alt="">
                        </div>
                        <div class="item reserved">
                            <span>6</span>
                            <p>reserved</p>
                            <img src="../images/table_8.png" alt="">
                        </div>

                        <div class="item">
                            <span>7</span>
                            <p>reserved</p>
                            <img src="../images/table_1.png" alt="">
                        </div>
                        <div class="item reserved">
                            <span>8</span>
                            <p>reserved</p>
                            <img src="../images/table_6.png" alt="">
                        </div>

                    </div>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Section Select Table -->

    <section id="reservation" class="parallax-window">
        <?php
          include("dbconnect.php");
        ?>
            <div class="container" class="offset">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-reservation padd-100">
                            <h1 class="section-title white-font">RESERVATION</h1>
                            <form action="#" method="post">
                                <div class="column">
                                    <span><input type="text" name="name" placeholder="Name" required></span>
                                    <span><input type="text" name="contact_number" placeholder="Contact Number" required ></span>
                                </div>
                                <div class="column">
                                    <span><input type="text" name="email" placeholder="Email Adress" required></span>
                                    <span><input type="Number" name="num_person" placeholder="Number of Person" required></span>
                                </div>
                                <div class="column">
                                    <span><input type="Date" name="book_date" placeholder="Booke Date" required><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    <span>
                                        <select class="form-control" name="name_resto" id="name_resto" placeholder="Name of the restaurant " required>
                                            <option value="" selected disabled hidden>Name of the restaurant</option>
                                            <?php
                                            include('dbconnect.php');
                                            $cat_sql = "SELECT * FROM restaurant";
                                            $cat_query = mysqli_query($dbconnect , $cat_sql);
                                            $cat_rs = mysqli_fetch_assoc($cat_query);
                                            do{
                                                echo '<option>'.$cat_rs['nameResto'].'</option>';
                                            }while ($cat_rs = mysqli_fetch_assoc($cat_query));

                                            ?>
                                            <?php
                                                include('reserv_bd.php');
                                            ?>
                                        </select>
                                    </span>
                                </div>
                                <div class="column">
                                    <textarea name="message" placeholder="Message of Request"></textarea>
                                </div>
                                <div class="submit-btn">
                                    <button type=submit name="submit1" id="error">Book Now</button>
                               <script>
                                    $("#error").click(function() {
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Good Job',
                                            text: ' Reservation Booking ',
                                        })
                                    });
                                </script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- Start Footer Section -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-one md-mb-30 sm-mb-30">
                        <h3>FoodLocation</h3>
                        <p>Trouvez des restaurants à proximité grâce à votre site FoodLocation.</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-two md-mb-30 sm-mb-30">
                        <h2>Useful Link</h2>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Menu</a></li>
                            <li><a href="#">Reservation</a></li>
                            <li><a href="#">login</a></li>
                            <li><a href="#">about</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-three sm-mb-30">
                        <h2>Follow us </h2>
                        <p>Please Follow us on our Social Media in order to keep updated</p>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-four sm-mb-30">
                        <h2>Sign IN</h2>
                        <p>Join Our Team FoodLocation</p>
                        <form action="">
                            <input type="submit" value="Create An Account">
                        </form>
                        <a href="logout.php">deconnecté</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-bottom-text">All Right reserved by &copy;FoodLocation.2019</p>
    </footer>
</body>
<script type="text/javascript" src="../js/app.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/mustache.js"></script>
    <script type="text/javascript" src="../js/jquery.notif.js"></script>
    <script type="text/javascript" src="../js/autocomplete.js"></script>

</html>
