<?php

require_once('php/dbconnect.php');
require ('php/search.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>FOOD LOCATION | WEBSITE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="images/logo.JPG" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="css/fixed.css">
    <link rel="stylesheet" href="css/style2.css">
<style media="screen">
  #response ul{
        float: left;
        list-style: none;
        padding: 0px;
        border: 1px solid black;
        margin-top: 0px;
      }
#response input, #response ul{
        width:250px;
      }
#response li:hover ,#response .active {
        color:silver;
        background-color: blue;
      }
      /**/
.block1{

display: flex;

align-items: stretch;

}



.block1 .img1 {

margin-left: 200px;

margin-right: 30px;

margin-top: 20px;

margin-bottom: 20px;

border-radius: 10px;

width: 300px;



}



.block1 .img2 {

margin-left: 0px;

margin-right: 0px;

margin-top: 20px;

margin-bottom: 20px;

border-radius: 10px;

width: 300px;

}



.des {

  font-family : Comic Sans MS;

  color: #e84118;

}



.block2{

background-color: #afaaaa;

display: flex;

align-items: stretch;

justify-content: space-around;



}

.block2 .blockitem img{

margin-left: 70px;

width: 200px;

height: 200px;

border-radius: 100px;

}



.block2 .blockitem{

display: flex;

flex-direction: column;

width: 30%;

}

.block2 .blockitem p{

color:black;

}

</style>

</head>
<!-- icon logo -->

<body data-spy="scroll" data-target="#navbarResponsive">

    <!--Start Navigation Section -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
        <h2 style="font-size:30px;">FOOD LOCATION</h2>
        </a>
        <form id="search-sub" action="./index.php" method="get">
            <div class="search-box">
                <input id="searchBox" class="search-text" type="text" name="keywords" autocomplete="off" placeholder="Search..">
                <a id="search-btn" class="search-btn" href="./index.php">
                    <i class="fa fa-search"></i></a>
                <div id="response"></div>
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

    <!-- Start Slide Section -->

    <div class="wrap">
        <div id="arrow-left" class="arrow"></div>
        <div id="slider">
            <div class="slide slide1">
                <div class="slide-content">
                <h1 class="ml2 text-center" style="color:white;">Welcome To Food Location</h1>
                </div>
            </div>
            <div class="slide slide2">
                <div class="slide-content">
                <h1 class="ml4 text-center">
                <span class="letters letters-1">BOOK</span>
                <span class="letters letters-2">NOW</span>
                <span class="letters letters-3">Go!</span>
                </h1>
                </div>
            </div>
            <div class="slide slide3">
                <div class="slide-content">
                <h1 class="ml15">
                <span class="word">FOOD</span>
                <span class="word">LOCATION</span>
</h1>
                </div>
            </div>
        </div>
        <div id="arrow-right" class="arrow"></div>
    </div>

    <section class="block1">

      <div class="desc" style="flex-basis: 700px">  

      <h2 class="des">Description</h2>

        <div class="description">

            <h3 style="color:black">welcome to</h3>

            <h5>food location </h5>

        <p> Food Location permet de realiser des reservations en ligne 

        </p>

        </div>

        </div>

        <img src="images/res.jpg" class="img1" alt="" />

        <img src="images/res1.jpg" class="img2" alt="" />

    </section>





    <section class="block2">

        <div class="blockitem">

        <h3>Italien</h3>

            <img src="./images/res.jpg" alt="">

            <p>Specialité italienne</p>

        </div>

        <div class="blockitem">

            <h3>Mexican</h3>

            <img src="images/res.jpg" alt="">

            <p>Specialité Mexicainne</p>

        </div>

        <div class="blockitem">

            <h3>Orientale</h3>

            <img src="images/res.jpg" alt="">

            <p>Specialté Orientale</p>

        </div>





    </section>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
    <script src="js/test.js"></script>
       
    <!-- End Slide Section -->
    <section id="reservation" class="parallax-window">
        <div class="container offset">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-reservation padd-100">
                        <h2 class="section-title white-font">RESERVATION</h2>
                        <form action="#" method="post">
                            <div class="column">
                                <span>
                    <input type="text" name="name" placeholder="Name" disabled="disabled">
                </span>
                                <span>
                    <input type="text" name="contact_number" placeholder="Contact Number" disabled="disabled">
                </span>
                            </div>
                            <div class="column">
                                <span>
                        <input type="text" name="email" placeholder="Email Adress" disabled="disabled">
                    </span>
                                <span>
                        <input type="Number" name="num_person" placeholder="Number of Person" disabled="disabled">
                    </span>
                            </div>
                            <div class="column">
                                <span>
                        <input type="Date" name="book_date" disabled="disabled">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                                <span>
                        <input type="text" name="name_resto" placeholder="Name of the restaurant" disabled="disabled">
                    </span>
                            </div>
                            <div class="column">
                                <textarea name="message" placeholder="Message of Request" disabled="disabled"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button type="button" id="error" name="button">BOOK NOW</button>
                                <script>
                                    $("#error").click(function() {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'Oops...',
                                            text: 'You have to create an account ',
                                            footer: '<a href="php/sign_in.php">Already have account</a>'
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
    <!-- End Reservation Section -->
    <!-- Start Login Section -->

    <section class="loginsection">
        <div id="login"></div>
        <h2>Login</h2>
        <div class="container">
            <form class="login-box" action="php/login.php" method="post">
                <div class="row">
                    <div class="col-5">
                        <i class="fa fa-user" aria-hidden="true"> Username</i>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col-5">
                        <i class="fa fa-lock" aria-hidden="true"> Password  </i>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        <p><a href="php/forget.php">Forget password</a></p>
                    </div>

                </div>
                    <button type="submit" name="signin" class="btn btn-outline-success">SIGN IN</button>
            </form> 

            <p>Already have an account <a href="php/sign_in.php">SIGN UP</a></p>

            
        </div>
    </section>

    <!-- End Login Section -->
    <section id="about" class="about_section padding">
			<div class="container2">
				<!--<div class="col-sm-6 xs-padding">
					<div class="about_content">
						<h2 class="mb-20">Welcome to the restaurant</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias is veritatis nisi, consequatur, laborum libero a neque ducimus. Porrorem illum quo nostrum quisquam asperiores, blanditiis, consectetur. Possimus facilis velit voluptatibus!</p>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 xs-padding">
					<div class="about_img">
						<img src="img/about-1.jpg" alt="About">
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 xs-padding">
					<div class="about_img">
						<img src="img/about-2.jpg" alt="About">
					</div>-->
                <div class="list"><?php echo $list; ?></div>
                <div class="map" id="map"></div>    
			</div>
		</section><!-- /.about_section -->
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
                        <form action="#">
                            <input type="submit" value="Create An Account">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-bottom-text">All Right reserved by &copy;FoodLocation.2019</p>
    </footer>

    <!-- End Footer Section -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script  src="js/animation.js"></script>
    <script  src="./js/autocomplete.js"></script>
    <script src="./js/vendor.js"></script>
    <script src="./js/map.js"></script>
    <script  > 
        $(document).ready(function(){
    $('#search-btn').keypress(function(e){
        if(e.which == 13){
            $('#search-sub').submit();
            }
        }); 
    });

    </script>
</body>

</html>
