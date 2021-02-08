<!DOCTYPE html>
<html>

<head>
    <title>FOOD LOCATION | WEBSITE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="shortcut icon" href="logo.JPG" type="../image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <link rel="stylesheet" href="css/fixed.css">

</head>
<!-- icon logo -->

<body data-spy="scroll" data-target="#navbarResponsive">
    <!--Start Navigation Section -->
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
                    <a class="nav-link" href="#home">Home</a>
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

    <!-- End Navigation section -->
    <section id="reservation" class="parallax-window">
        <script>
            function reser() {
                var x1 = document.getElementById('name').value;
                var x2 = document.getElementById('email').value;
                var x3 = document.getElementById('book_date').value;
                var x4 = document.getElementById('name_resto').value;
                var x5 = document.getElementById('nb_person').value;

                alert("Reservation : \n Mr." + x1 + "\n Email :" + x2 + "\n Date : " + x3 + "\n Restaurant: " + x4 + "\n Number of Person:" + x5);
            }
        </script>

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
                                    <span>
                    <input type="text" name="name" placeholder="Name">
                </span>
                                    <span>
                    <input type="text" name="contact_number" placeholder="Contact Number" >
                </span>
                                </div>
                                <div class="column">
                                    <span>
                        <input type="text" name="email" placeholder="Email Adress">
                    </span>
                                    <span>
                        <input type="Number" name="num_person" placeholder="Number of Person">
                    </span>
                                </div>
                                <div class="column">
                                    <span>
                        <input type="Date" name="book_date" placeholder="Booke Date">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                                    <span>
                                  <select class="form-control" name="name_resto" id="name_resto" placeholder="Name of the restaurant ">
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
                                    <button type=submit name="submit1" onclick="reser()" id="reserv">Book Now</button>
                                    <script>
                                        $("#reserv").click(function() {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'GOOD JOB !',
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
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-bottom-text">All Right reserved by &copy;FoodLocation.2019</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</body>

</html>
